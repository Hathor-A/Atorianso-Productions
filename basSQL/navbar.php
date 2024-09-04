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

// Récupération des utilisateurs ---------------------->
    $sql_users = "SELECT * FROM users";
    $stmt_users = $conn->prepare($sql_users);
    $stmt_users->execute();
    $users = $stmt_users->fetchAll(PDO::FETCH_ASSOC);
?>
<!---------- HTML Form -------------------------------->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atorianso Production</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="custom-cursor"></div>
            <div class="custom-cursor-before"></div>
    <nav class="navbar">
        <div class="nav-container">
            <a href="Atoprod.php" class="nav-logo">VotreLogo</a>
            <div class="nav-menu">
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
                <!-- Autres liens de menu -->
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="profile.php">
                        <img src="/icons/boy_guy_male_man_men_icon.png" alt="User Icon" class="user-icon">
                    </a>
                <?php else: ?>
                    <a href="login.php">Connexion</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <script src="/script.js"></script>
</body>
</html>
