<?php
//Appel du fichier modele pour appeler des fonction
require_once('../Modele/modele.php');
//Appel de la fonction getId pour récupérer l'id de la session
$id = getId();
//On récupère le mois
$mois = $_POST['Mois'];
//Création d'un array nommé quantite
$quantite = array();
//Création d'un tableau contenant les id de type de frais
$idFraisForfait = ['ETP', 'KM', 'NUI', 'REP'];
//On assigne chaque variable récupérée dans le formulaire à l'array quantite
foreach ($idFraisForfait as $idFF) {
	$quantite[$idFF] = $_POST[$idFF];
}
//On récupère les variables de la ligne de frais hors forfait
$libelle = $_POST['Nom'];
$date = $_POST['Date'];
$montant = $_POST['Prix'];

if (isset($libelle) && isset($date) && isset($montant)){
	//Si elle ne sont pas vide on appelle la fonction remplirLigneHF qui sert à créer une ligne de frais hors forfait et à l'assigner à la fiche de frais
	remplirLigneHF($id, $mois,$libelle ,$date ,$montant);
}
//On modifie la fiche de frais  grâce la fonction modifierFiche
modifierFiche($id, $mois, $quantite);
//On redirige l'utilisateur vers la page précédente
header('Location: ../Vue/v_compte.php');
?>