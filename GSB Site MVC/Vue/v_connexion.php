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
    <!-- Appel de la classe logo dans le fichier CSS (Elle sera appelée sur chaque page) -->
        <div class="logo">
            <img src="../images/logoGSB.png">
        </div>
    <!-- Appel de la classe titre dans le fichier CSS (Elle sera appelée sur chaque page) -->
        <div class="titre">
            <h1>Bienvenue sur le site de Galaxy Swiss Bourdin</h1>
        </div>
    </header>
    <!-- Appel de la classe fondBleu dans le fichier CSS -->
    <div class="fondBleu">
        <h3>Formulaire de connexion</h3>
       	<!-- La classe form sera appelée pour chaque formulaire -->
        <div class="form">    
         	<!-- Le formulaire envoi les données vers le controleur c_connexion --> 
            <form action="../Controleur/c_connexion.php" method="post">
                <p><input type="text" placeholder="Identifiant" name="login"></p>
                <p><input type="password" placeholder="Mot de passe" name="mdp"></p>
                <input class="boutonConnec" type="submit" name="Se connecter">
            </form>
        </div>
    </div>

</body>
</html>