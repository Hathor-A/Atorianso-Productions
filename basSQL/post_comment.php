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

if (!isset($_SESSION['user_id'])) {
    header("Location: videos.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$video_id = $_POST['video_id'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comments (user_id, video_id, comment) VALUES (:user_id, :video_id, :comment)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':video_id', $video_id);
$stmt->bindParam(':comment', $comment);

if ($stmt->execute()) {
    header("Location: videos.php?video_id=" . $video_id);
    exit;
} else {
    echo "Erreur lors de l'ajout du commentaire.";
}
