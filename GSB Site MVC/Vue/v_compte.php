<!-- Le controleur est appelé pour pouvoir afficher le nom de l'utilisateur sur la page -->
<?php
require('../Controleur/c_compte.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>GSB</title>
    <!-- Lien pour les polices, certains caractères spéciaux et le fichier CSS -->
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
            <a href="../Vue/v_connexion.php">
                <!-- Appel de la classe bouton et de la sous classe boutonD dans le fichier CSS (Elle sera appelée sur les pages v_compte) -->
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
    <!-- Appel de la classe caseFiche dans le fichier CSS -->
    <div class="caseFiche">
        <h2><i class="fas fa-edit"></i></h2>
        <h3>Créer ou modifier une fiche de frais</h3>
        <!-- Le formulaire envoi les données vers la vue v_renseigner --> 
        <form action="../Vue/v_renseigner.php" method="post">
            <label for="mois-select">Sélectionner un mois :</label>
            <select name="mois" id="mois-select">
                <!-- On inclut un fichier qui sert à montrer les mois dans le bon ordre -->
                <?php
                include('../Include/choixMois.inc.php');
                ?>
            </select>
            <input type="submit" name="submit" class="bouton" value="Accéder à la fiche de frais">
        </form>
        <p>Pour rappel : La fiche du mois en cours n'est pas accessible avant le 20.</p>
    </div>
    <div class="caseFiche">
        <h2><i class="fas fa-search"></i></h2>
        <h3>Consulter une fiche de frais</h3>
        <!-- Le formulaire envoi les données vers la vue v_renseigner --> 
        <form action="../Vue/v_consulter.php" method="post">
            <label for="mois-select">Sélectionner un mois :</label>
            <select name="mois" id="mois-select-consult">
                <!-- On inclut un fichier qui sert à montrer seulement les mois qui correspondent à une fiche de frais déjà existente -->
                <?php
                include('../Include/choixMoisConsult.inc.php');
                ?>
            </select>
            <input type="submit" name="submit" class="bouton" value="Accéder à la fiche de frais">
        </form>
    </div>
</body>
</html>
