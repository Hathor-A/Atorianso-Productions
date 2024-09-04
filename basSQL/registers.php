<?php
session_start();
require 'config.php';
?>

<!-- HTML form for registration -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
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
                <li><a href="/basSQL/albums.php"><div class="icon-master"><img src="/icons/music_note_sound_audio_icon.png" class="icon"></div>Musique</a></li>
            </ul>
        </nav>
    </header>
    <div id="side-nav" class="side-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/basSQL/header.php"><img src="/icons/bouton-daccueil.png " class="icon">Accueil</a>
        <a href="/basSQL/contact.php"><img src="/icons/carnet-de-contacts.png " class="icon">Contact</a>
        <a href="/basSQL/login.php"><img src="/icons/connexion.png " class="icon">Connexion</a>
        <a href="/basSQL/registers.php"><img src="/icons/sauver.png " class="icon">Enregistrement</a>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];//-
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);//-
            $email = $_POST['email'];//-
            $icon = $_POST['icon'];//-

            $sql = "INSERT INTO users (username, password, email, icon) VALUES (:username, :password, :email, :icon)";//-
            $stmt = $conn->prepare($sql);//-

            $stmt->bindParam(':username', $username);//-
            $stmt->bindParam(':password', $password);//-
            $stmt->bindParam(':email', $email);//-
            $stmt->bindParam(':icon', $icon);//-

    if ($stmt->execute()) {//+
        $_SESSION['user_id'] = $conn->lastInsertId();//+
        $_SESSION['username'] = $username;//+
        $_SESSION['user_icon'] = $icon; //+
        header("Location: header.php");//+
        exit;//+
        // Check if $conn object has an 'error' property before accessing it//+
        if (property_exists($conn, 'error')) {//+
            echo "Error: " . $sql . "<br>" . $conn->error;//+
        } else {//+
            echo "Error: " . $sql . "<br>Database connection error.";//+
        }//+
    }//+
}//+
?>//+
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
        <section class="contact-section">
            <h2>Inscription</h2>
            <form action="login-form" method="post">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="icon">Sélectionnez votre icône :</label>
                <select name="user" id="icon">
                    <option value="/icons/boy_guy_male_man_men_icon.png">Icône 1</option>
                    <option value="/icons/eastern_muslim_male_arab_arabian_icon.png">Icône 2</option>
                    <option value="/icons/themis_blind_femida_justice_lawer_icon.png">Icône 3</option>
                    <option value="/icons/guard_male_man_password_power_icon.png">Icône 4</option>
                    <option value="/icons/woman_china_chinese_japanese_femine_icon.png">Icône 5</option>
                    <option value="/icons/god_problem_evil_red_hell_icon.png">Icône 6</option>
                    <option value="/icons/woman_chief_femine_sexy_lady_icon.png">Icône 7</option>
                    <option value="/icons/harlem_boss_african_chief_afroamerican_icon.png">Icône 8</option>
                    <option value="/icons/caucasian_boss_head_chief_director_icon.png">Icône 9</option>
                    <!-- Ajouter plus d'options d'icônes ici -->
                </select>
                <button type="submit">S'inscrire</button>
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
