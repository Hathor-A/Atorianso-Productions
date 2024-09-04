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

if (isset($_POST['video_id'])) {
    $video_id = $_POST['video_id'];

    $sql_update_views = "UPDATE video_views SET views = views + 1 WHERE video_id = :video_id";
    $stmt_update_views = $conn->prepare($sql_update_views);
    $stmt_update_views->bindParam(':video_id', $video_id);
    $stmt_update_views->execute();

    echo "Views updated successfully";
}
