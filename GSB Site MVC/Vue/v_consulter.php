<!-- Le controleur est appelé pour pouvoir afficher le nom de l'utilisateur sur la page -->
<?php
require("../Controleur/c_consulter.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>GSB</title>
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC|Open+Sans&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/8bcae88b06.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../GSB.css">
</head>
<body>
	<header>
	<!-- Appel de la classe ID dans le fichier CSS -->
        <div class="ID">
            <!-- Appel des variables nom et prenom du controleur -->
			<h4><?php echo $nom; ?><br><?php echo $prenom; ?>
			</h4>
			<a href="GSBConnection.php">
				<button class="bouton boutonD" type="button">
	    			Deconnexion
				</button>
			</a>
		</div>
		<div class="logo">
			<img src="../images/logoGSB.png">
		</div>
		<div class="titre">
			<h1>Bienvenue sur le site de Galaxy Swiss Bourdin</h1>
		</div>
	</header>
	<!-- Appel de la classe fondBlancCons dans le fichier CSS -->
	<div class="fondBlancCons">
		<div>
			<!-- Appel de la classe btnDroite dans le fichier CSS -->
			<p class="btndroite">
				<a href="v_compte.php">
					<button class="bouton" type="button">Retour</button>
				</a>
			</p>
			<h2>
			<!-- Appel de la classe mois dans le fichier CSS -->
			<div class="mois">		
				<?php
					echo 'Fiche de frais du mois '. $nmois;
					
				?>
			</div>
			</h2>
			<!-- Appel de la classe ficheR dans le fichier CSS -->
			<div class="ficheR">
				<p>
					<h3>Frais forfaitaires</h3>
					<!-- Fichier qui sert à l'affichage des frais forfaitaires -->
					<?php
					include('../Include/fraisforfait.inc.php');
					?>
					<h3>Frais hors forfait</h3>
					<!-- Fichier qui sert à l'affichage des frais non forfaitaires -->
					<?php
					include('../Include/fraishorsforfait.inc.php');
					?>
					<!-- Pour afficher les prix au format monétaire -->
					<h3>Total du remboursement : <?php echo numfmt_format_currency($fmt, $totalFHF, 'EUR');?></h3>

			</div>
		</div>
		
			
		</div>
	</div>
</body>
</html>