<!DOCTYPE html>
<html>
<head>
    <title>Snake Game</title>
    <link rel="stylesheet" href="/styles.css">
    <script src="/script.js"></script>
    
    <style>
        .game-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .game-board {
            display: grid;
            grid-template-columns: repeat(20, 20px);
            grid-template-rows: repeat(10, 20px);
            gap: 1px;
            background-color: #f2f2f2;
        }

        .game-cell {
            width: 20px;
            height: 20px;
            background-color: #fff;
        }

        .snake {
            background-color: #333;
        }

        .food {
            background-color: #ff6666;
        }

        .controls {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .controls button,.start-button {
            margin: 0 5px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .start-button {
            margin-top: 20px;
        }
    </style>
</head>
<header>
        <div class="logo">
            <div class="logoVideo">
            <a href="/show_video/Logo ATO.html"><img id="Logo Prod" src="/images/Ator/AtoProd.webp" alt="Un logo" title="Logo Ato"></a>
            </div>
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
                <li><a href="../basSQL/albums.php"><div class="icon-master"><img src="/icons/music_note_sound_audio_icon.png" class="icon"></div>Musique</a></li>
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
<body>
    <div class="custom-cursor"></div>
            <div class="custom-cursor-before"></div>
    <div class="game-container">
        <div class="game-board"></div>
        <div class="controls">
            <button id="upBtn">Up</button>
            <button id="leftBtn">Left</button>
            <button id="downBtn">Down</button>
            <button id="rightBtn">Right</button>
        </div>
        <button class="start-button" id="startBtn">Start</button>
    </div>

    <script>
    alert("Après un long break, j'ai décidé de jouer au Serpent\n\n\n\n\n")
        const WIDTH = 20;
        const HEIGHT = 10;

        let snake = [
            { x: 5, y: 5 },
            { x: 4, y: 5 },
            { x: 3, y: 5 }
        ];
        let direction = 'right';
        let food = generateFood();
        let gameInterval = null;

        function gameLoop() {
            drawGame();

            const head = Object.assign({}, snake[0]);
            if (direction === 'up') {
                head.y--;
            } else if (direction === 'down') {
                head.y++;
            } else if (direction === 'left') {
                head.x--;
            } else if (direction === 'right') {
                head.x++;
            }

            snake.unshift(head);
            if (head.x === food.x && head.y === food.y) {
                food = generateFood();
            } else {
                snake.pop();
            }

            if (checkCollision()) {
                clearInterval(gameInterval);
                alert('Game Over!');
            }
        }

        function drawGame() {
            const gameBoard = document.querySelector('.game-board');
            gameBoard.innerHTML = '';

            for (let y = 0; y < HEIGHT; y++) {
                for (let x = 0; x < WIDTH; x++) {
                    const cell = document.createElement('div');
                    cell.classList.add('game-cell');

                    if (isSnake(x, y)) {
                        cell.classList.add('snake');
                    } else if (x === food.x && y === food.y) {
                        cell.classList.add('food');
                    }

                    gameBoard.appendChild(cell);
                }
            }
        }

        function isSnake(x, y) {
            for (let i = 0; i < snake.length; i++) {
                if (snake[i].x === x && snake[i].y === y) {
                    return true;
                }
            }
            return false;
        }

        function generateFood() {
            let food;
            do {
                food = {
                    x: Math.floor(Math.random() * WIDTH),
                    y: Math.floor(Math.random() * HEIGHT)
                };
            } while (isSnake(food.x, food.y));

            return food;
        }

        function checkCollision() {
            const head = snake[0];
            if (head.x < 0 || head.x >= WIDTH || head.y < 0 || head.y >= HEIGHT) {
                return true;
            }

            for (let i = 1; i < snake.length; i++) {
                if (head.x === snake[i].x && head.y === snake[i].y) {
                    return true;
                }
            }

            return false;
        }

        function setDirection(newDirection) {
            direction = newDirection;
        }

        document.getElementById('upBtn').addEventListener('click', () => setDirection('up'));
        document.getElementById('leftBtn').addEventListener('click', () => setDirection('left'));
        document.getElementById('downBtn').addEventListener('click', () => setDirection('down'));
        document.getElementById('rightBtn').addEventListener('click', () => setDirection('right'));
        document.getElementById('startBtn').addEventListener('click', () => {
            if (gameInterval) {
                clearInterval(gameInterval);
            }
            snake = [
                { x: 5, y: 5 },
                { x: 4, y: 5 },
                { x: 3, y: 5 }
            ];
            direction = 'right';
            food = generateFood();
            gameInterval = setInterval(gameLoop, 600);
        });
    </script>
            <div class="icon-master2">
                <center><p><form action="/AtoProd.html" method="GET" class="icon2">
                    <input type="submit" value="< Retour"></form></p></center>
            </div>
    <footer>
        <section class="credits-section">
            <p>&copy; 2024 Atorianzo. Tous droits réservés.</p>
            <p>Ce site web a été créé avec le soutien précieux de <strong><a href="https://adatechschool.fr/ecole/">Ada Tech School</strong></a>____________</p>
            <p>Réalisé par <strong>Atorianzo</strong>, basé à <strong>Lyon, France</strong>.</p>
            <p>Chez Atorianzo Production, nous nous engageons à produire le meilleur de nous-mêmes et à réaliser les rêves de chacun et chacune.</p>
        </section>
        <center><p>©Copyright 2024 by Atorianzo. All rights reserved.</p></center>
    </footer>
</body>
</html>