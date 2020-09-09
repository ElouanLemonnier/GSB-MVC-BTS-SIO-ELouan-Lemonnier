<?php
//Sers à la sécurisation du site
if(session_id() == '') {
    include('../Include/secure.inc.php');
}

function login(){
	//Contient le nécéssaire pour se connecter à la BDD
	include('../Include/connexion_bdd.inc.php');
	//Selectionne tous les ids, login et mdp de tous les visiteurs
    $identifiants = $bdd -> query('SELECT id, login, mdp FROM visiteur');
    
    return $identifiants;
}

function getId(){
	//Sers à assigner la variable de session id à la variable $id
	$id = $_SESSION['id'];

	return $id;
}

function getNom(){

	include('../Include/connexion_bdd.inc.php');
	//On récupère la variable de session id
	$id = $_SESSION['id'];
	//Selectionne le nom et le prénom de l'utilisateur
	$req = $bdd->prepare('SELECT nom, prenom FROM visiteur WHERE id = ?');
	$req->execute(array($id));

	return $req;
}

function verifFiche($id, $mois){

	include('../Include/connexion_bdd.inc.php');

	//Compte le nombre fiche existente  pour cet id et ce mois ci 
	$verifFiche = $bdd->prepare('SELECT COUNT(idVisiteur) AS total FROM fichefrais WHERE idVisiteur = ? AND mois = ?');
	$verifFiche-> execute(array($id, $mois));
	$data = $verifFiche->fetchAll();
	//$Fiche existe prend la valeur récupérée en base de donnée si elle est différente de 0
	$ficheExiste = $data[0]['total'] != 0;
	return $ficheExiste;
}

function creationFiche(){

	include('../Include/connexion_bdd.inc.php');
	//On récupère le mois au format de la BDD
	$mois = $_POST['Mois'];
	//On récupère la variable de session id
	$id = $_SESSION['id'];
	//On prépare la requête d'insertion dans la BDD
	$creaFiche =  $bdd->prepare('INSERT INTO fichefrais (idVisiteur, mois, nbJustificatif, montantValide, dateModif, idEtat) VALUES (?, ?, ?, ?, ?, ?)');
	//Puis on l'éxécute avec les valeurs récupérer par le controleur
	$creaFiche -> execute(array($id, $mois, 0, 0, date('Y-m-d'), 'CR'));
}

function lectureFiche($id, $mois){

	include('../Include/connexion_bdd.inc.php');
	//Création d'un tableau contenant les id de type de frais
	$idFraisForfait = ['ETP', 'KM', 'NUI', 'REP'];
	//Création d'un array nommé quantite
	$quantites = array();
	//Préparation de la requête de sélection
	$lectureFiche =  $bdd->prepare('SELECT quantite FROM lignefraisforfait WHERE idVisiteur = ? AND mois = ? AND idFraisForfait = ? ');

	foreach ($idFraisForfait as $idff) {
		//Et on l'exécute autant de fois qu'il y a de type de frais
		$lectureFiche -> execute(array($id, $mois, $idff));
		$data = $lectureFiche -> fetchAll();
		$quantites[] = $data[0]['quantite'];
	}
	return $quantites;
}

function remplirFiche($id, $mois, $quantite){

	include('../Include/connexion_bdd.inc.php');
	//Création d'un tableau contenant les id de type de frais
	$idFraisForfait = ['ETP', 'KM', 'NUI', 'REP'];
	//Préparation de la requête d'insertion dans la BDD
	$insertLigneFrais = $bdd-> prepare('INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES (?, ?, ?, ?)');
	foreach ($idFraisForfait as $idFF) {
		if (!empty($quantite[$idFF])) {
		//Et on l'exécute autant de fois qu'il y a de type de frais (Si la variable n'est pas vide)
		$insertLigneFrais-> execute(array($id, $mois, $idFF, $quantite[$idFF]));
		}
	}
}

function modifierFiche($id, $mois, $quantite){

	include('../Include/connexion_bdd.inc.php');
	//Création d'un tableau contenant les id de type de frais
	$idFraisForfait = ['ETP', 'KM', 'NUI', 'REP'];
	//Préparation del a requête de modification dans la base de données
	$insertLigneFrais = $bdd-> prepare('UPDATE lignefraisforfait SET quantite = ? WHERE idVisiteur = ? AND mois = ? AND idFraisForfait = ?');
	foreach ($idFraisForfait as $idFF) {
		if (isset($quantite[$idFF])) {
		//Et on l'exécute autant de fois qu'il y a de type de frais (Si la variable n'est pas vide)
		$insertLigneFrais-> execute(array($quantite[$idFF], $id, $mois, $idFF));
		}
	}
}

function remplirLigneHF($id, $mois, $libelle, $date ,$montant){

	include('../Include/connexion_bdd.inc.php');
	//Préparation et exécution de la requête d'insertion dans la BDD
	$insertLigneFraisHF = $bdd-> prepare('INSERT INTO lignefraishorsforfait (idVisiteur, mois,  libelle, date, montant) VALUES (?,?,?,?,?) ');
	$insertLigneFraisHF-> execute(array($id, $mois, $libelle, $date, $montant));

}
?>