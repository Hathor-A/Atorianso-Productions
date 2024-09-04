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

    // Récupération des albums
    $sql_albums = "SELECT * FROM albums";
    $stmt_albums = $conn->prepare($sql_albums);
    $stmt_albums->execute();
    $albums = $stmt_albums->fetchAll(PDO::FETCH_ASSOC);
?>

<!--------------------- HTML form pour l'Album ------------------------------------>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section Musique</title>
    <link rel="stylesheet" href="/styles.css">
    <script src="/script.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <div class="logoVideo">
            <a href="/show_video/The helical model - our Galaxy is a vortex.html"><img id="Logo Prod" src="/images/Ator/AtoProd.webp" alt="Un logo" title="Logo Ato"></a>
            </div>
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
        <h1>Musiques</h1>
        <section class="content-section_3">
            <div class="card-container_2">
                <div class="albums-container">
                    <?php foreach ($albums as $album): ?>
                        <div class="album-card">
                            <!--<div style="height:300px;">-->
                            <img src="<?php echo htmlspecialchars($album['album_cover']); ?>" alt="<?php echo htmlspecialchars($album['title']); ?>"><!--</div>-->
                            <h3><?php echo htmlspecialchars($album['title']); ?></h3>
                            <p>Par <?php echo htmlspecialchars($album['artist']); ?></p>
                            <?php
                            // Récupération des chansons de l'album
                            $sql_songs = "SELECT * FROM songs WHERE album_id = :album_id";
                            $stmt_songs = $conn->prepare($sql_songs);
                            $stmt_songs->bindParam(':album_id', $album['id']);
                            $stmt_songs->execute();
                            $songs = $stmt_songs->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <div class="songs-list">
                                <?php foreach ($songs as $song): ?>
                                    <div class="song-item">
                                        <p><?php echo htmlspecialchars($song['title']); ?></p>
                                        <audio controls>
                                            <source src="<?php echo htmlspecialchars($song['track_path']); ?>" type="audio/mp3">
                                            Votre navigateur ne supporte pas l'élément audio
                                        </audio>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
            <div class="icon-master2">
                <p><form action="/AtoProd.html" method="GET" class="icon2">
                    <input type="submit" value="< Retour"></form></p>
            </div>
        <section class="credits-section2">
            <p>&copy; 2024 Atorianzo. Tous droits réservés.</p>
            <p> UNDAZYLIUM disponible ici <center><a href="http://raygaymusic.free.fr/undazylium.htm"><img src="/images/Ator/Undazylium.webp" class="icon"></center></p>
            <p> TAHI KRAW disponible ici <center><a href="https://tahikraw.bandcamp.com/community"><img src="/images/Ator/Tahi_Kraw.png" class="icon"></center></p>
            <p> MON DRAGON disponible ici <center><a href="http://kapitainekomandant.free.fr/mondragon/Home.html"><img src="/images/Ator/Mon_Dragon.webp" class="icon"></center></p>
            <p>Chez Atorianzo Production, nous nous engageons à produire le meilleur de nous-mêmes et à réaliser les rêves de chacun et chacune.</p>
        </section>
        <footer>
            <center><p>©Copyright 2024 by Atorianzo. All rights reserved.</p></center>
        </footer>
    
</body>
</html>
