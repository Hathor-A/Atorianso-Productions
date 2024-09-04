<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categories = $_POST['category'];
    $title = $_POST['title'];
    $track_path = $_POST['track_path'];

    // Déterminer la table à insérer
    $table = '';
    switch ($categories) {
        case 'Clips':
            $table = 'Clips';
            break;
        case 'Teasers':
            $table = 'Teasers';
            break;
        case 'Publicites':
            $table = 'Publicites';
            break;
        case 'Freestyles':
            $table = 'Freestyles';
            break;
        case 'SpotsOriginaux':
            $table = 'SpotsOriginaux';
            break;
        case 'Mariages':
            $table = 'Mariages';
            break;
        default:
            die('Catégorie non valide.');
    }

    // Insérer les données
    $stmt = $pdo->prepare("INSERT INTO $table (category_id, title, track_path) VALUES (:category_id, :title, :track_path)");
    $stmt->execute(['category_id' => 1, 'title' => $title, 'track_path' => $track_path]);

    echo 'Données insérées avec succès.';
}
?>,