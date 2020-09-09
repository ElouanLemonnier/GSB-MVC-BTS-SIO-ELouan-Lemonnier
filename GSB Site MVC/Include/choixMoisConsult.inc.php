<?php
	//Contient le nécéssaire pour se connecter à la BDD
	include('connexion_bdd.inc.php');
	//Création d'un tableau contenant le nom des mois
	$liste_mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre', ];
	//Récupération du numéro de mois actuel et de l'année
	$nmois = date('n');
	$nannee = date('Y');
	//Préparation de la requête qui compte le nombre mois différent dans la table fichefrais
	$req = $bdd->prepare('SELECT COUNT(mois) AS total FROM fichefrais WHERE mois = ?');
	//Si le numéro de jour est inférieur à 20 alors la valeur de index_mois est égale à nmois -2
	if(date('j')<20){
		$index_mois = $nmois - 2;
	}
	//Sinon index_mois est égal à nmois -1
	else {
		$index_mois = $nmois - 1;
	}
	for ($i=$index_mois; $i >= 0; $i--) {
		//Création d'une variable qui prend la valeur du mois tel qu'il est écrit dans la BDD 
		$moisdb = ($i+1).'-'.$nannee;
		//Execution de la requête de comptage
		$req->execute(array($moisdb));
		$data = $req->fetchAll();
		if($data[0]['total'] != 0){
			//Si le total est différent de 0 alors on ajoute une option correspondant au mois de la boucle
			echo '<option value="'.$moisdb.'">'.$liste_mois[$i]. " ".$nannee.'</option>';
		}
	}
	//Même boucle mais pour l'année précédente
	for ($i=11; $i >= $index_mois+1; $i--) { 
		//Création d'une variable qui prend la valeur du mois tel qu'il est écrit dans la BDD 
		$moisdb = ($i+1).'-'.($nannee-1);
		//Execution de la requête de comptage
		$req->execute(array($moisdb));
		$data = $req->fetchAll();
		if($data[0]['total'] != 0){
			//Si le total est différent de 0 alors on ajoute une option correspondant au mois de la boucle mais en enlevant 1 à l'année
			echo '<option value="'.$moisdb.'">'.$liste_mois[$i]. " ".($nannee-1).'</option>';
		}
	}
?>