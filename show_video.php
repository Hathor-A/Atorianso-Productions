<?php
session_start();
require 'config.php';

$video_id = $_GET['video_id'];

// ------------------ Le Fetch video details ------------------------------------------------>
$sql = "SELECT * FROM videos WHERE id = :video_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':video_id', $video_id);
$stmt->execute();
$video = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ------------------ La mise a Jour par vue de la video par l'utilisateur -------------------------------------------------->
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO views (user_id, video_id) VALUES (:user_id, :video_id)
            ON DUPLICATE KEY UPDATE view_count = view_count + 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':video_id', $video_id);
    $stmt->execute();
    
}

// ------------------ Le Fetch des commentaires -------------------------------->
$sql = "SELECT comments.*, users.username, users.icon FROM comments
        JOIN users ON comments.user_id = users.id
        WHERE comments.video_id = :video_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':video_id', $video_id);
$stmt->execute();
$result = $stmt->get_result();
$comments = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!--------------------- HTML form pour les VIDEO ------------------------------------>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($video['title']); ?></title>
    <link rel="stylesheet" href="/styles.css">
    <!--<link rel="stylesheet" href="/reset.css">-->
    <script src="/script.js"></script>
</head>
<body>
    <header>
    <div class="logo">
            <img src="/images/Ator/AtoProd.webp" alt="Un logo" title="Logo Ato">>
        </div>
        <nav>
            <ul id="filters-nav">
                <li><a href="/AtoProd.html"><div class="icon-master"><img src="/icons/accueil.png " class="icon"></div> Accueil</a></li>
                <li><a href="/html/shows.html"><div class="icon-master"><img src="/icons/cercle-de-jeu.png " class="icon"></div> Publicités</a></li>
                <li><a href="/html/clips.html"><div class="icon-master"><img src="/icons/bouton-facetime.png " class="icon"></div> Clips</a></li>
                <li><a href="/html/teasers.html"><div class="icon-master"><img src="/icons/bouton-jouer.png " class="icon"></div> Teasers</a></li>
                <li><a href="/html/spots.html"><div class="icon-master"><img src="/icons/publicite-video.png " class="icon"></div> Spots</a></li>
                <li><a href="/html/originals.html"><div class="icon-master"><img src="/icons/etoile.png " class="icon"></div> Originaux</a></li>
                <li><a href="/html/search.html"><div class="icon-master"><img src="/icons/loupe.png " class="icon"></div> Recherche</a></li>
                <li><a href="../basSQL/albums.php"><div class="icon-master"><img src="/icons/music_note_sound_audio_icon.png" class="icon"></div> Musique</a></li>
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
        <section class="content-section" id="shows">
        <h1><?php echo htmlspecialchars($video['title']); ?></h1>
        <video src="<?php echo htmlspecialchars($video['video_path']); ?>" controls></video>
        <p>Nombre de vues : <?php echo htmlspecialchars($video['view_count']); ?></p>

        <?php if (isset($_SESSION['user_id'])): ?>
        <form action="post_comment.php" method="post">
            <textarea name="comment" required></textarea>
            <input type="hidden" name="video_id" value="<?php echo htmlspecialchars($video_id); ?>">
            <button type="submit">Commenter</button>
        </form>
        <?php else: ?>
        <p><a href="login.php">Connectez-vous</a> pour laisser un commentaire.</p>
        <?php endif; ?>

        <div class="comments">
            <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <img src="<?php echo htmlspecialchars($comment['icon']); ?>" alt="User Icon" style="width:30px;height:30px;">
                <span><?php echo htmlspecialchars($comment['username']); ?></span>
                <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                <button onclick="likeComment(<?php echo $comment['id']; ?>)">👍 <?php echo $comment['likes']; ?></button>
                <button onclick="dislikeComment(<?php echo $comment['id']; ?>)">👎 <?php echo $comment['dislikes']; ?></button>
            </div>
            <?php endforeach; ?>
        </div>
        </section>
    </main>
    <footer>
        <center><p>©Copyright 2024 by Atorianzo. All rights reversed.</p></center>
    </footer>
</body>
</html>
