<?php
//Contient le nécéssaire pour se connecter à la BDD
include('../Include/connexion_bdd.inc.php');
//Préparation de la requête de sélection
$req = $bdd->prepare('SELECT id, libelle, montant FROM fraisforfait');*
//Exécution
$req->execute();
$data = $req->fetchAll();
//Création de 2 array, libelles et montants
$libelles = array();
$montants = array();

foreach($data as $cat){
	//Assignation des valeurs récupérée en BDD
	$libelles[$cat['id']]=$cat['libelle'];
	$montants[$cat['id']]=$cat['montant'];
}
//Préparation de la requete de sélection
$req = $bdd->prepare('SELECT idFraisForfait, quantite FROM lignefraisforfait WHERE mois = ?');
//Exécuiton
$req->execute(array($nmois));
$data = $req->fetchAll();
//Création d'une variable de format monétaire
$fmt = numfmt_create("fr_FR", NumberFormatter::CURRENCY);
//Création d'une variable TotalF qui vaut 0
$totalF = 0;
//Boucle d'affichage des frais forfaitaires
foreach($data as $cat){
	echo '<p>';
	echo $libelles[$cat['idFraisForfait']]. " : ".$cat['quantite']. ' x '. $montants[$cat['idFraisForfait']];
	echo ' = ';
	$produitForfait = $cat['quantite'] * $montants[$cat['idFraisForfait']];
	$totalF += $produitForfait;
	echo numfmt_format_currency($fmt, $produitForfait, 'EUR');
	echo '</p>';

}

?>