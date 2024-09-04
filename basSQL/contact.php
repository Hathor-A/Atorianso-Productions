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

if ($conn->$error) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    
    if ($stmt->execute()) {
        echo "Message envoyé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->$error;
    }
}
?>
<!--------------------- HTML form for contact ------------------------------------>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="/styles.css">
    <!--<link rel="stylesheet" href="/reset.css">-->
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
        <section class="contact-section">
            <h2>Contactez-nous</h2>
            <form id="contact-form" action="AtoProd.html" method="post" >
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </section>
    </main>
    <div class="icon-master2">
                <center><p><form action="/AtoProd.html" method="GET" class="icon2">
                    <input type="submit" value="< Retour"></form></p></center>
            </div>
    <footer>
        <center><p>©Copyright 2024 by Atorianzo. All rights reversed.</p></center>
    </footer>
</body>
</html>

