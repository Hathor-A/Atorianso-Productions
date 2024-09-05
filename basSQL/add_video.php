<?php
session_start();
require 'config.php';
// Récupération des catégories
$sql_categories = "SELECT * FROM categories";
$stmt_categories = $conn->prepare($sql_categories);
$stmt_categories->execute();
$categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

?>

<!--------------------- HTML form  ------------------------------------>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Vidéo</title>
    <link rel="stylesheet" href="/Atorianso-Productions/styles.css">
    <script src="/Atorianso-Productions/script.js"></script>
</head>
<body>
<header>
        <div class="logo">
            <img id="Logo Prod" src="/Atorianso-Productions/images/Ator/AtoProd.webp" alt="Un logo" title="Logo Ato">
        </div>
        <nav>
            <ul id="filters-nav">
                    <li><a href="/Atorianso-Productions/AtoProd.html"><div class="icon-master"><img src="/Atorianso-Productions/icons/accueil.png" class="icon"></div>Accueil</a></li>
                    <li><a href="/Atorianso-Productions/basSQL/clips.php"><div class="icon-master"><img src="/Atorianso-Productions/icons/bouton-facetime.png" class="icon"></div>Clips</a></li>
                    <li><a href="/Atorianso-Productions/basSQL/add_video.php"><div class="icon-master"><img src="//Atorianso-Productionsicons/silhouette-de-roue-dentee.png" class="icon"></div>Catégories</a></li>
                    <li><a href="/Atorianso-Productions/basSQL/videos.php"><div class="icon-master"><img src="/Atorianso-Productions/icons/bouton-facetime.png" class="icon"></div>Vidéos</a></li>
                    <li><a href="/Atorianso-Productions/html/teasers.html"><div class="icon-master"><img src="/Atorianso-Productions/icons/bouton-jouer.png" class="icon">T</div>easers</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/Atorianso-Productions/basSQL/videos.php"><div class="icon-master"><img src="<?php echo $_SESSION['user_icon']; ?>" alt="User Icon" style="width:30px;height:30px;"></a></li>
                    <?php else: ?>
                    <?php endif; ?>
                    <li><a href="/Atorianso-Productions/html/spots.html"><div class="icon-master"><img src="/Atorianso-Productions/icons/publicite-video.png" class="icon"></div>Spots</a></li>
                    <li><a href="/Atorianso-Productions/html/originals.html"><div class="icon-master"><img src="/Atorianso-Productions/icons/etoile.png" class="icon"></div>Originaux</a></li>
                    <li><a href="/Atorianso-Productions/html/search.html"><div class="icon-master"><img src="/Atorianso-Productions/icons/loupe.png" class="icon"></div>Recherche</a></li>
                    <li><a href="/Atorianso-Productions/basSQL/albums.php"><div class="icon-master"><img src="/Atorianso-Productions/icons/music_note_sound_audio_icon.png" class="icon"></div>Musique</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/Atorianso-Productions/basSQL/albums.php"><img src="<?php echo $_SESSION['user_icon']; ?>" alt="User Icon" style="width:30px;height:30px;"></a></li>
                    <?php else: ?>
                    <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div id="side-nav" class="side-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/Atorianso-Productions/AtoProd.html"><img src="/Atorianso-Productions/icons/bouton-daccueil.png " class="icon">Accueil</a>
        <a href="/Atorianso-Productions/basSQL/contact.php"><img src="/Atorianso-Productions/icons/carnet-de-contacts.png " class="icon">Contact</a>
        <a href="/Atorianso-Productions/basSQL/login.php"><img src="/Atorianso-Productions/icons/connexion.png " class="icon">Connexion</a>
        <a href="/Atorianso-Productions/basSQL/registers.php"><img src="/Atorianso-Productions/icons/sauver.png " class="icon">Enregistrement</a>
        <a href="/Atorianso-Productions/basSQL/logout.php"><img src="/Atorianso-Productions/icons/deconnexion.png " class="icon">Déconnexion</a>
        <a href="/Atorianso-Productions/basSQL/profile.php"><img src="/Atorianso-Productions/icons/utilisateur.png " class="icon">Profile</a>
        <a href="/Atorianso-Productions/basSQL/settings.php"><img src="/Atorianso-Productions/icons/parametres.png " class="icon">Paramètres</a>
        <a href="/Atorianso-Productions/credits.html"><img src="/Atorianso-Productions/icons/credits.png " class="icon">Crédits</a>
        <a href="/Atorianso-Productions/links.html"><img src="/Atorianso-Productions/icons/lien-2.png " class="icon">Links</a>
        <a href="/Atorianso-Productions/projet_dataViz/index.html"><img src="/Atorianso-Productions/icons/meteo.png " class="icon">Météo ClimaX</a>
    </div>
        <span class="openbtn" onclick="openNav()">&#9776; Menu</span>
        <div class="custom-cursor"></div>
            <div class="custom-cursor-before"></div>
    <main>   
    <form action="insert_video.php" method="POST">
        <label for="categories">Catégorie:</label>
        <select name="categories" id="categories" required>
            <option value="Clips">Clips</option>
            <option value="Teasers">Teasers</option>
            <option value="Publicites">Publicités</option>
            <option value="Freestyles">Freestyles</option>
            <option value="SpotsOriginaux">Spots Originaux</option>
            <option value="Mariages">Mariages</option>
        </select>
        <br>

        <label for="title">Titre:</label>
        <input type="text" name="title" id="title" required>
        <br>

        <label for="/Atorianso-Productions/videos/Atoprod/">Chemin du fichier:</label>
        <input type="text" name="/Atorianso-Productions/videos/Atoprod/" id="/Atorianso-Productions/videos/Atoprod/" required>
        <br>

        <button type="submit">Ajouter</button>
    </form>
    </main>
    <br><br><br><br>
    <footer>
        <center><p>©Copyright 2024 by Atorianzo. All rights reserved.</p></center>
    </footer>
</body>
</html>