<?php
session_start();
require 'config.php';
// Vérifiez si l'utilisateur est connecté ------------------------------------->
if (isset($_SESSION['user_id'])) {
    // Récupérez les informations de l'utilisateur si nécessaire
    $user_id = $_SESSION['user_id'];
    // Query pour obtenir les informations de l'utilisateur depuis la base de données
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);// Code pour obtenir l'utilisateur de la base de données

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_icon'] = $user['icon'];
        header("Location: videos.php");
    exit;
} else {
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}
