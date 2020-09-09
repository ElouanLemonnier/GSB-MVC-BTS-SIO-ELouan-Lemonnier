<?php
//Création d'une nouvelle variable PDO
try{
	$bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8', 'root', '');
}
catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>