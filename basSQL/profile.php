<?php
session_start();
require 'config.php';
// Récupération des utilisateurs
    $sql_users = "SELECT * FROM users";
    $stmt_users = $conn->prepare($sql_users);
    $stmt_users->execute();
    $users = $stmt_users->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
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
                    <li><a href="/html/shows.html"><div class="icon-master"><img src="/icons/cercle-de-jeu.png" class="icon"></div>Publicités</a></li>
                    <li><a href="/html/clips.html"><div class="icon-master"><img src="/icons/bouton-facetime.png" class="icon"></div>Clips</a></li>
                    <li><a href="/html/teasers.html"><div class="icon-master"><img src="/icons/bouton-jouer.png" class="icon"></div>Teasers</a></li>
                    <li><a href="/html/spots.html"><div class="icon-master"><img src="/icons/publicite-video.png" class="icon"></div>Spots</a></li>
                    <li><a href="/html/originals.html"><div class="icon-master"><img src="/icons/etoile.png" class="icon"></div>Originaux</a></li>
                    <li><a href="/html/search.html"><div class="icon-master"><img src="/icons/loupe.png" class="icon"></div>Recherche</a></li>
                    <li><a href="../basSQL/albums.php"><div class="icon-master"><img src="/icons/music_note_sound_audio_icon.png" class="icon"></div>Musique</a></li>
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
        <h2>Bienvenue, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Ceci est votre page de profil.</p>
        
        <section class="contact-section">
    <h2>Choisir une Icône</h2>
        <form action="/basSQL/header.php" method="post">
            <label for="icon">Sélectionnez votre icône :</label>
            <select name="icon" id="icon" img src="/icons/">
                <option value="boy_guy_male_man_men_icon.png" <?php if ($currentIcon === '/icons/boy_guy_male_man_men_icon.png') echo 'selected'; ?>>Icône 1</option>
                <option value="eastern_muslim_male_arab_arabian_icon.png" <?php if ($currentIcon === '/icons/eastern_muslim_male_arab_arabian_icon.png') echo 'selected'; ?>>Icône 2</option>
                <option value="themis_blind_femida_justice_lawer_icon.png" <?php if ($currentIcon === '/icons/themis_blind_femida_justice_lawer_icon.png') echo 'selected'; ?>>Icône 3</option>
                <option value="guard_male_man_password_power_icon.png" <?php if ($currentIcon === '/icons/guard_male_man_password_power_icon.png') echo 'selected'; ?>>Icône 4</option>
                <option value="woman_china_chinese_japanese_femine_icon.png" <?php if ($currentIcon === '/icons/woman_china_chinese_japanese_femine_icon.png') echo 'selected'; ?>>Icône 5</option>
                <option value="god_problem_evil_red_hell_icon.png" <?php if ($currentIcon === '/icons/god_problem_evil_red_hell_icon.png') echo 'selected'; ?>>Icône 6</option>
                <option value="woman_chief_femine_sexy_lady_icon.png" <?php if ($currentIcon === '/icons/woman_chief_femine_sexy_lady_icon.png') echo 'selected'; ?>>Icône 7</option>
                <option value="harlem_boss_african_chief_afroamerican_icon.png" <?php if ($currentIcon === '/icons/harlem_boss_african_chief_afroamerican_icon.png') echo 'selected'; ?>>Icône 8</option>
                <option value="caucasian_boss_head_chief_director_icon.png" <?php if ($currentIcon === '/icons/caucasian_boss_head_chief_director_icon.png') echo 'selected'; ?>>Icône 9</option>
                <!-- Ajouter plus d'options d'icônes ici --------------->
            </select>
            <button type="submit">Mettre à jour</button>
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


