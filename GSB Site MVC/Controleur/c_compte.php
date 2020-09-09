<?php
//Appel du fichier modele pour appeler des fonction
require_once('../Modele/modele.php');

//Appel de la fonction getNom pour pouvoir afficher le nom et prénom de l'utilisateur
$req = getNom();
$data = $req->fetchAll();
$nom = $data[0]['nom'];
$prenom = $data[0]['prenom'];
?>