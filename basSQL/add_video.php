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
                    <li><a href="/AtoProd.html"><div class="icon-master"><img src="/icons/accueil.png" class="icon"></div>Accueil</a></li>
                    <li><a href="/basSQL/clips.php"><div class="icon-master"><img src="/icons/bouton-facetime.png" class="icon"></div>Clips</a></li>
                    <li><a href="/basSQL/add_video.php"><div class="icon-master"><img src="/icons/silhouette-de-roue-dentee.png" class="icon"></div>Catégories</a></li>
                    <li><a href="/basSQL/videos.php"><div class="icon-master"><img src="/icons/bouton-facetime.png" class="icon"></div>Vidéos</a></li>
                    <li><a href="/html/teasers.html"><div class="icon-master"><img src="/icons/bouton-jouer.png" class="icon">T</div>easers</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/basSQL/videos.php"><div class="icon-master"><img src="<?php echo $_SESSION['user_icon']; ?>" alt="User Icon" style="width:30px;height:30px;"></a></li>
                    <?php else: ?>
                    <?php endif; ?>
                    <li><a href="/html/spots.html"><div class="icon-master"><img src="/icons/publicite-video.png" class="icon"></div>Spots</a></li>
                    <li><a href="/html/originals.html"><div class="icon-master"><img src="/icons/etoile.png" class="icon"></div>Originaux</a></li>
                    <li><a href="/html/search.html"><div class="icon-master"><img src="/icons/loupe.png" class="icon"></div>Recherche</a></li>
                    <li><a href="/basSQL/albums.php"><div class="icon-master"><img src="/icons/music_note_sound_audio_icon.png" class="icon"></div>Musique</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/basSQL/albums.php"><img src="<?php echo $_SESSION['user_icon']; ?>" alt="User Icon" style="width:30px;height:30px;"></a></li>
                    <?php else: ?>
                    <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div id="side-nav" class="side-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/AtoProd.html"><img src="/icons/bouton-daccueil.png " class="icon">Accueil</a>
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

        <label for="/videos/Atoprod/">Chemin du fichier:</label>
        <input type="text" name="/videos/Atoprod/" id="/videos/Atoprod/" required>
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