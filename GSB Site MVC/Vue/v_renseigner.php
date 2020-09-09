<!-- Le controleur est appelé pour pouvoir afficher le nom de l'utilisateur sur la page -->
<?php
require('../Controleur/c_renseigner.php');
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
	<!-- Appel de la classe fondBlancRens dans le fichier CSS -->
	<div class="fontBlancRens">
		<div class="mois">		
			<?php
				echo 'Fiche de frais du mois '. $mois;
			?>
		</div>
		<!-- Appel de la classe form et de la sous classe formFicheFrais dans le fichier CSS -->
		<div class="form formFicheFrais">
			<form action="../Controleur/<?php echo $controleur; ?>" method="post">
				<fieldset>
					<legend>Frais forfaitaires</legend>
					<p><input type="text" placeholder="Forfait Etape" name="ETP" value="<?php echo $etp; ?>"></p>
					<p><input type="text" placeholder="Frais kilometriques" name="KM" value="<?php echo $km; ?>"></p>
					<p><input type="text" placeholder="Nuitee hotel" name="NUI" value="<?php echo $nui; ?>"></p>
					<p><input type="text" placeholder="Repas restaurant" name="REP" value="<?php echo $rep; ?>"></p>
					<p><input type="hidden" name="Mois" value="<?php echo $mois; ?>"></p>
				</fieldset>
				<fieldset>
					<legend>Autres frais</legend>
					<p><input type="text" placeholder="Date" name="Date">
	  				<input type="text" placeholder="Nom" name="Nom">
	  				<input type="text" placeholder="Prix" name="Prix"></p>
				</fieldset>
				<p><input type="submit" name="Valider"></p>
			</form>
		</div>
	</div>
</body>
</html>