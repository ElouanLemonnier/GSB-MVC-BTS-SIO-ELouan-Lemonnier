<?php
	//Création d'un tableau contenant le nom des mois
	$liste_mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre', ];
	//Récupération du numéro de mois actuel et de l'année
	$nmois = date('n');
	$nannee = date('Y');
	//Si le numéro de jour est inférieur à 20 alors la valeur de index_mois est égale à nmois -2
	if(date('j')<20){
		$index_mois = $nmois - 2;
	}
	//Sinon index_mois est égal à nmois -1
	else {
		$index_mois = $nmois - 1;
	}
	//Ces boucles gèrent l'affichage des mois dans le bon ordre pour renseigner ou modifier une fiche
	for ($i=$index_mois; $i >= 0; $i--) { 
		$moisdb = ($i+1).'-'.$nannee;
		echo '<option value="'.$moisdb.'">'.$liste_mois[$i]. " ".$nannee.'</option>';
	}
	for ($i=11; $i >= $index_mois+1; $i--) { 
		$moisdb = ($i+1).'-'.($nannee-1);
		echo '<option value="'.$moisdb.'">'.$liste_mois[$i]. " ".($nannee-1).'</option>';
	}
?>