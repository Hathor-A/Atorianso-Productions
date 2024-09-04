<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section Search</title>
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
                <li><a href="/basSQL/header.php"><div class="icon-master"><img src="/icons/accueil.png" class="icon"></div>Accueil</a></li>
                <li><a href="/basSQL/clips.php"><div class="icon-master"><img src="/icons/bouton-facetime.png" class="icon"></div>Clips</a></li>
                <li><a href="/basSQL/shows.php"><div class="icon-master"><img src="/icons/cercle-de-jeu.png" class="icon"></div>Publicités</a></li>
                <li><a href="/basSQL/videos.php"><div class="icon-master"><img src="/icons/bouton-facetime.png" class="icon"></div>Vidéos</a></li>
                <li><a href="/basSQL/teasers.php"><div class="icon-master"><img src="/icons/bouton-jouer.png" class="icon"></div>Teasers</a></li>
                <li><a href="/basSQL/spots.php"><div class="icon-master"><img src="/icons/publicite-video.png" class="icon"></div>Spots</a></li>
                <li><a href="/basSQL/originals.php"><div class="icon-master"><img src="/icons/etoile.png" class="icon"></div>Originaux</a></li>
                <li><a href="/basSQL/mariages.php"><div class="icon-master"><img src="/icons/anneaux-de-mariage.png" class="icon"></div>Mariages</a></li>
                <li><a href="/basSQL/search.php"><div class="icon-master"><img src="/icons/loupe.png" class="icon"></div>Recherche</a></li>
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
        <a href="/basSQL/logout.php"><img src="/icons/deconnexion.png " class="icon">Déconnexion</a>
        <a href="/basSQL/profile.php"><img src="/icons/utilisateur.png " class="icon">Profile</a>
        <a href="/basSQL/settings.php"><img src="/icons/parametres.png " class="icon">Paramètres</a>
        <a href="/credits.html"><img src="/icons/credits.png " class="icon">Crédits</a>
        <a href="/links.html"><img src="/icons/lien-2.png " class="icon">Links</a>
        <a href="/projet_dataViz/index.html"><img src="/icons/meteo.png " class="icon">Météo ClimaX</a>
        <a href="/basSQL/index.php"><img src="/icons/god_problem_evil_red_hell_icon.png " class="icon">ChatGPT</a>
    </div>
        <span class="openbtn" onclick="openNav()">&#9776; Menu</span>
        <div class="custom-cursor"></div>
            <div class="custom-cursor-before"></div>
    <main>
        <h1>Recherche</h1>
            
        </div>
                <center><img id="Logo Prod" src="/images/Logos/logo-google-1999-2.png" alt="Un logo" title="Logo Google" width="150"></center>

        <section class="content-section" id="shows">
        <center><form action="https://www.google.com/search" method="GET" target="_blank">
            <input type="search" name="q" placeholder="Recherche Google">
            <input type="submit" value="Go!">
          </form></center>
        </section>

        <center><img id="Logo Prod" src="/images/Logos/youtube-logo-youtube-icon-transparent-free-png.webp" alt="Un logo" title="Logo Youtube" width="150"></center>

        <section class="content-section" id="shows">
            <center><form action="https://www.youtube.com/results" method="GET" target="_blank">
                <input type="search" name="search_query" placeholder="Recherche YouTube">
                <input type="submit" value="Go!">
              </form></center>
            </section>
    </main>

    <footer>
        <section class="credits-section">
            <p>&copy; 2024 Atorianzo. Tous droits réservés.</p>
            <p>Ce site web a été créé avec le soutien précieux de <strong><a href="https://adatechschool.fr/ecole/">Ada Tech School</strong></a>____________</p>
            <p>Réalisé par <strong>Atorianzo</strong>, basé à <strong>Lyon, France</strong>.</p>
            <p>Chez Atorianzo Production, nous nous engageons à produire le meilleur de nous-mêmes et à réaliser les rêves de chacun et chacune.</p>
        </section>
        <center><p>©Copyright 2024 by Atorianzo. All rights reversed.</p></center>
    </footer>
</body>
</html>
