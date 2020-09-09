<?php
//Demarage d'une session
session_start();
header('Location: ../Vue/v_connexion.php');
//On vérifie si les variable de login et mot de passe ne sont pas nulle
if (isset($_POST['login']) && $_POST['mdp'])
{
	//Appel du fichier modele pour appeler des fonction
	require('../Modele/modele.php');
	//Appel de la fonction login pour récupérer les identifiants dans la BDD
    $identifiants = login();
    while($data = $identifiants->fetch()){
    	//Cette boucle vérifie le mot de passe et l'identifiant 
		if($data['login'] == $_POST['login'] && $data['mdp'] == $_POST['mdp']){
			//Si les identifiants sont bons  on régénere l'id de session et on assigne celui de la BDD a celui de la variable de session
			session_regenerate_id();
			$_SESSION['id'] = $data['id'];
			//Puis on redirige l'utilisateurs sur la page suivante
			header('Location: ../Vue/v_compte.php');
			exit();
			
		}
    }
	require('../vue/v_connexion.php');
	echo 'Mauvais nom d\'utilisateur ou mot de passe';
}
else 
	{
		//Si aucune corrélation n'est trouvée l'utilisateur est redirigé sur la page de connexion
		require('../vue/v_connexion.php');
		echo 'Mauvais nom d\'utilisateur ou mot de passe';
	}

?>