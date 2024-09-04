<?php
session_start();
require 'config.php';
if (isset($_POST['submit']))
    {
        if(isset($_POST['user']) and isset($_POST['password'])){
 
             $link = mysql_connect("localhost", "u361662842_atorianso", "Ada2024@");
             mysql_select_db("u361662842_contacts_users", $link);
             $reponse = mysql_query("SELECT * FROM membres WHERE users='".$_POST['user']."' and password='".$_POST['password']."'");
             if(mysql_num_rows($reponse) == 1){
                //contient un admin
                $var = htmlspecialchars($var);
                $user = mysql_fetch_assoc($user);
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password; 
echo "<p>Bienvenue ".$_POST['user']."</p><p><a href='logout.php?action=logout' title='Déconnexion'>Se déconnecter</a></p>
                <p><a href='/basSQL/header.php'>Page membre</a></p>";
}
             else{
                //faux
                echo '<p style="color:#FF0000; font-weight:bold;">Vos identifiants sont incorrect.</p>';
             }
              
                
                  
         }
    };
            if (!isset($_POST['submit']))

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_icon'] = $user['icon'];
        header("Location: videos.php");
    exit;
} else {
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>
<!---------------- HTML form for login ------------------------------------------------->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="/styles.css">
    <script src="/script.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <img id="Logo Prod" src="/images/Ator/AtoProd.webp" alt="Un logo" title="Logo Ato">
        </div>
        <nav>
            <ul id="filters-nav">
                    <li><a href="/AtoProd.html"><img src="/icons/accueil.png" class="icon">Accueil</a></li>
                    <li><a href="/html/shows.html"><img src="/icons/cercle-de-jeu.png" class="icon">Publicités</a></li>
                    <li><a href="/basSQL/videos.php"><img src="/icons/bouton-facetime.png" class="icon">Vidéos</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/basSQL/videos.php"><img src="<?php echo $_SESSION['user_icon']; ?>" alt="User Icon" style="width:30px;height:30px;"></a></li>
                    <?php else: ?>
                    <?php endif; ?>
                    <li><a href="/html/teasers.html"><img src="/icons/bouton-jouer.png" class="icon">Teasers</a></li>
                    <li><a href="/html/spots.html"><img src="/icons/publicite-video.png" class="icon">Spots</a></li>
                    <li><a href="/html/originals.html"><img src="/icons/etoile.png" class="icon">Originaux</a></li>
                    <li><a href="/html/search.html"><img src="/icons/loupe.png" class="icon">Recherche</a></li>
                    <li><a href="/basSQL/albums.php"><img src="/icons/music_note_sound_audio_icon.png" class="icon">Musique</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/basSQL/albums.php"><img src="<?php echo $_SESSION['user_icon']; ?>" alt="User Icon" style="width:30px;height:30px;"></a></li>
                    <?php else: ?>
                    <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div id="side-nav" class="side-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/basSQL/header.php"><img src="/icons/bouton-daccueil.png " class="icon">Accueil</a>
        <a href="/basSQL/contact.php"><img src="/icons/carnet-de-contacts.png " class="icon">Contact</a>
        <a href="/basSQL/login.php"><img src="/icons/connexion.png " class="icon">Connexion</a>
        <a href="/basSQL/registers.php"><img src="/icons/sauver.png " class="icon">Enregistrement</a>
        <a href="/basSQL/logout.php"><img src="/icons/deconnexion.png " class="icon">Déconnexion</a>
        <a href="/basSQL/profile.php"><img src="/icons/utilisateur.png " class="icon">Profile</a>
        <a href="/basSQL/settings.php"><img src="/icons/parametres.png " class="icon">Paramètres</a>
        <a href="/credits.html"><img src="/icons/credits.png " class="icon">Crédits</a>
        <a href="/links.html"><img src="/icons/lien-2.png " class="icon">Links</a>
        <a href="/projet_dataViz/index.html"><img src="/icons/meteo.png " class="icon">Météo ClimaX</a>
    </div>
    <span class="openbtn" onclick="openNav()">&#9776; Menu</span>
    <div class="custom-cursor"></div>
            <div class="custom-cursor-before"></div>
    <main>
        <section class="login-section">
            <h2>Connexion</h2>
            <form action="/basSQL/header.php" method="post">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Se connecter</button>
            </form>
        </section>
    </main>
    <div class="icon-master2">
                <center><p><form action="/AtoProd.html" method="GET" class="icon2">
                    <input type="submit" value="< Retour"></form></p></center>
            </div>
    <footer>
        <center><p>©Copyright 2024 by Atorianzo. All rights reserved.</p></center>
    </footer>
</body>
</html>

