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

// code PHP modifié ---------------------------------------------------------------->$_COOKIE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categories = $_POST['category'];
    $title = $_POST['title'];
    $track_path = $_POST['track_path']; 
    $categories = $_GET['category'];

// Déterminer la table à sélectionner
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

// Sélectionner les données
$stmt = $pdo->query("SELECT * FROM $table");
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Insérer les données
$stmt = $pdo->prepare("INSERT INTO $table (category_id, title, track_path) VALUES (:category_id, :title, :track_path)");
$stmt->execute(['category_id' => 1, 'title' => $title, 'track_path' => $track_path]);

echo 'Données insérées avec succès.';
}

// --------------- FIN PHP Modifié --------------------------------------------------------->
// Récupération des catégories
$sql_categories = "SELECT * FROM categories WHERE name = 'videos'";
$stmt_categories = $conn->prepare($sql_categories);
$stmt_categories->execute();
$categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

// Récupération des vues des vidéos

$sql_videos = "SELECT videos.*, video_views.views, categories.name as category_name
                FROM videos 
                JOIN video_views ON videos.id = video_views.video_id
                JOIN categories ON videos.category_id = categories.id";
$stmt_videos = $conn->prepare($sql_videos);
$stmt_videos->execute();
$videos = $stmt_videos->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section Vidéos</title>
    <link rel="stylesheet" href="/styles.css">
    <script src="/script.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <img id="Logo Prod" src="/images/Ator/AtoProd.webp" alt="Un logo" title="Logo Ato">
        </div>
        <nav>
            <ul id="filters-nav">
                    <li><a href="/basSQL/header.php"><div class="icon-master"><img src="/icons/accueil.png" class="icon"></div>Accueil</a></li>
                    <li><a href="/basSQL/clips.php"><div class="icon-master"><img src="/icons/bouton-facetime.png" class="icon"></div>Clips</a></li>
                    <li><a href="/basSQL/shows.php"><div class="icon-master"><img src="/icons/cercle-de-jeu.png" class="icon"></div>Publicités</a></li>
                    <li><a href="/basSQL/videos.php"><div class="icon-master"><img src="/icons/bouton-facetime.png" class="icon"></div>Vidéos</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/basSQL/videos.php"><div class="icon-master"><img src="<?php echo $_SESSION['user_icon']; ?>" alt="User Icon" style="width:30px;height:30px;"></a></li>
                    <?php else: ?>
                    <?php endif; ?>
                    <li><a href="/basSQL/teasers.php"><div class="icon-master"><img src="/icons/bouton-jouer.png" class="icon"></div>Teasers</a></li>
                    <li><a href="/basSQL/spots.php"><div class="icon-master"><img src="/icons/publicite-video.png" class="icon"></div>Spots</a></li>
                    <li><a href="/basSQL/originals.php"><div class="icon-master"><img src="/icons/etoile.png" class="icon"></div>Originaux</a></li>
                    <li><a href="/basSQL/mariages.php"><div class="icon-master"><img src="/icons/anneaux-de-mariage.png" class="icon"></div>Mariages</a></li>
                    <li><a href="/basSQL/search.php"><div class="icon-master"><img src="/icons/loupe.png" class="icon"></div>Recherche</a></li>
                    <li><a href="/basSQL/albums.php"><div class="icon-master"><img src="/icons/music_note_sound_audio_icon.png" class="icon"></div>Musique</a></li>
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
        <h1>Vidéos</h1>
        <div class="videos-container">
            <div class="video-row">
            <?php foreach ($videos as $video): ?>
            <section class="content-section">
                <div class="video-card">
                    <img src="<?php echo htmlspecialchars($video['thumbnail']); ?>" alt="<?php echo htmlspecialchars($video['title']); ?>">
                    <h3><?php echo htmlspecialchars($video['title']); ?></h3>
                    <p><?php echo htmlspecialchars($video['description']); ?></p>
                    <p>Catégorie : <?php echo htmlspecialchars($video['category_name']); ?></p>
                    <p>Vues : <?php echo $video['views']; ?></p>
                    <div class="video-wrapper">
                        <button class="play-btn" data-src="<?php echo htmlspecialchars($video['video_path']); ?>">Play</button>
                            <video id="video_id" controls style="display: none;">
                                <source type="video/mp4">
                                <track id="subtitles-track" label="French" kind="subtitles" srclang="fr" src="subtitles-fr.vtt" default>
                                    <!-- Ajoutez des pistes de sous-titres pour chaque langue -->
                            Votre navigateur ne supporte pas l'élément vidéo.
                            </video>
                    <div>
                        <div class="comments-section">
                        <h4>Commentaires</h4>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <form action="post_comment.php" method="post">
                                <input type="hidden" name="video_id" value="<?php echo $video['id']; ?>">
                                <textarea name="comment" required></textarea>
                                <button type="submit">Commenter</button>
                            </form>
                        <?php else: ?>
                        <?php endif; ?>
                        <?php
                        $sql_comments = "SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE comments.video_id = :video_id ORDER BY comments.created_at DESC";
                        $stmt_comments = $conn->prepare($sql_comments);
                        $stmt_comments->bindParam(':video_id', $video['id']);
                        $stmt_comments->execute();
                        $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment">
                                <p><strong><?php echo htmlspecialchars($comment['username']); ?>:</strong> <?php echo htmlspecialchars($comment['comment']); ?></p>
                                <p><?php echo $comment['created_at']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="likes-dislikes">
                        <form action="/basSQL/videos.php" method="post">
                            <input type="hidden" name="video_id" value="<?php echo $video['id']; ?>">
                            <input type="hidden" name="type" value="like">
                            <button type="submit">👍</button>
                        </form>
                        <form action="/basSQL/videos.php" method="post">
                            <input type="hidden" name="video_id" value="<?php echo $video['id']; ?>">
                            <input type="hidden" name="type" value="dislike">
                            <button action="/basSQL/videos.php"type="submit">👎</button>
                        </form>
                        </div>
                    </div>
                </div>
                </section>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <section class="credits-section">
            <p>&copy; 2024 Atorianzo. Tous droits réservés.</p>
            <p>Ce site web a été créé avec le soutien précieux de <strong><a href="https://adatechschool.fr/ecole/">Ada Tech School</strong></a>____________</p>
            <p>Réalisé par <strong>Atorianzo</strong>, basé à <strong>Lyon, France</strong>.</p>
            <p>Chez Atorianzo Production, nous nous engageons à produire le meilleur de nous-mêmes et à réaliser les rêves de chacun et chacune.</p>
        </section>
        <center><p>©Copyright 2024 by Atorianzo. All rights reversed.</p></center>
    </footer>
</body>
</html>
