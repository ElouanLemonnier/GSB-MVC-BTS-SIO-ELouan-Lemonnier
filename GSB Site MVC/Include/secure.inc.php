<?php
//Demarage d'une session
session_start();
//Si la variable de session 'id' est nulle alors l'utilisateur est redirigé vers la page de connexion
if($_SESSION['id'] == null){
	header('Location: ../Vue/v_connexion.php');
	exit();
}
?>