<?php
//Appel du fichier modele pour appeler des fonction
require_once('../Modele/modele.php');

//Appel de la fonction getNom pour pouvoir afficher le nom et prénom de l'utilisateur
$req = getNom();
$data = $req->fetchAll();
$nom = $data[0]['nom'];
$prenom = $data[0]['prenom'];
//Création d'un tableau qui sert à l'indication du mois de la fiche renseignée ou modifiée
$liste_mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
$mois = $_POST['mois'];
//Reformation du mois pour pouvoir le chercher en BDD
$a = substr($mois, -4);
$m = substr($mois, 0, -5);
$moisDB = $m . '-' . $a; 
//Création d'un tableau contenant les id de type de frais
$idFraisForfait = ['ETP', 'KM', 'NUI', 'REP'];
//Création d'une variable id à laquelle on assigne la valeur de la variable de session ID
$id = $_SESSION['id'];
//Appel de la fonction verifFiche pour vérifier l'existence de la fiche
$testFiche = verifFiche($id, $moisDB);
//Création de 4 variable vide permettant de créer une fiche
$etp = "";
$km = "";
$nui = "";
$rep = "";
//Création de la variable controleur qui servira à rediriger la page vers le bon controleur
$controleur = "c_creation.php";
if ($testFiche) {
	//Si la fiche existe la fonction lecture fiche va lire les données pour qu'elles soient assignées à leur variables respectives
	$quantites = lectureFiche($id, $moisDB);
	$etp = $quantites[0];
	$km = $quantites[1];
	$nui = $quantites[2];
	$rep = $quantites[3];
	$controleur = "c_modification.php";
}

?>