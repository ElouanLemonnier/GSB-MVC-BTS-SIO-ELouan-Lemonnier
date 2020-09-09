<?php
//Contient le nécéssaire pour se connecter à la BDD
include('../Include/connexion_bdd.inc.php');
//Préparation de la requête de sélection
$req = $bdd->prepare('SELECT libelle, date, montant FROM lignefraishorsforfait WHERE mois = ?');
//Exécution
$req->execute(array($nmois));
$data = $req->fetchAll();
//Création d'une variable de format monétaire
$fmt = numfmt_create("fr_FR", NumberFormatter::CURRENCY);
//Boucle d'affichage des frais non forfaitaires
foreach($data as $cat){
	echo '<p>';
	echo $cat['libelle']. ", le ".$cat['date']. ' - '. numfmt_format_currency($fmt, $cat['montant'], 'EUR');
	echo '</p>';
}
//Si le montant n'est pas nul alors Le total des frais forfaitaires et non forfaitaires est égal montant des 2 totaux
if (isset($cat['montant'])){  
	$totalHF =  $cat['montant'];
	$totalFHF = $totalF + $totalHF;
}
//Si le montant n'est pas nul alors Le total des frais forfaitaires et non forfaitaires est égal montant du total des frais forfaitaires uniquement
else{
	$totalFHF = $totalF;
	echo 'Pas de frais hors forfait pour ce mois ci.';
}


?>