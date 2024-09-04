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
                $user_id = mysql_fetch_assoc($user);
                $_SESSION['user'] = $user_id;
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

$data = json_decode(file_get_contents('php://input'), true);
$comment_id = $data['comment_id'];

$sql = "UPDATE comments SET likes = likes + 1 WHERE id = comment_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':comment_id', $comment_id);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['video_id'], $_SESSION['user_id'])) {
    $video_id = $_POST['video_id'];
    $user_id = $_SESSION['user_id'];
    $is_like = isset($_POST['like']) ? 1 : 0;
}
    
    $sql = "INSERT INTO likes_dislikes (video_id, user_id, is_like) VALUES (:video_id, :user_id, :is_like)
            ON DUP";
            
    return "/header.php";
?>
