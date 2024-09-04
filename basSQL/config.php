<?php
$servername = "localhost"; // adresse du serveur de base de données
$username = "u361662842_atorianso";
$password = "Ada2024@";
$dbname = "u361662842_contacts_users";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connexion échouée: " . $e->getMessage();
}?>
