<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= URLROOT; ?>/public/css/gamecontainer.css">
</head>

<body>
    <div id="gamecontainer">
        <div id="game-content" style="display:none;">
            <?php require_once APPROOT . '/views/includes/countdown.php'; ?>
            <?php require_once APPROOT . '/views/includes/collisionCheck.php'; ?>
            <?php require_once APPROOT . '/views/includes/character.php'; ?>
            <?php require_once APPROOT . '/views/includes/enemy.php'; ?>
            <?php require_once APPROOT . '/views/includes/particle.php'; ?>
            <?php require_once APPROOT . '/views/includes/lives.php'; ?>
            <?php require_once APPROOT . '/views/includes/timer&score.php'; ?>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', function() {
            document.getElementById('game-content').style.display = 'block';
            });
        </script>
    </div>

    <script>
        let highscore = localStorage.getItem('highscore') || 0;
        function startgame() {
            startcountdown();
        }
        function endgame() {
            localStorage.setItem('score', score);
            console.log('endgame called');
            ongoingGame = false;
            document.getElementById('game-content').style.display = 'none';
            console.log('Game Over');
            if (highscore < score) {
                localStorage.setItem('highscore', score);
                sessionStorage.setItem('highscore_submitted', 0);
                highscore = score;
            } 
            resetlives();
            window.location.href = "<?= URLROOT; ?>/Leaderboard/index"; // Redirect to Gameover page
        }
        startgame();

        const enemy = document.getElementById('enemy');

        function damageAnimation() {
            const gameContainer = document.getElementById('gamecontainer');
            gameContainer.style.animation = 'damageAnimation 5s forwards';
            enemy.style.animation = 'visibleanimation 0.3s forwards';

            setTimeout(() => {
                enemy.style.opacity = 1;
                enemy.style.animation = '';
                damageCooldown = false; // Reset cooldown after animation
                gameContainer.style.animation = '';
            }, 5000);
        }

        function collisioneffect() {
            const enemy = document.getElementById('enemy');

            // Stap 1: Maak zichtbaar
            enemy.style.opacity = 1;
            enemy.style.animation = 'visibleanimation 0.3s forwards';

            // Stap 2: Na 5 seconden verstoppen
            setTimeout(() => {
                enemy.style.animation = 'hideanimation 0.15s forwards';
                setTimeout(() => {
                    enemy.style.opacity = 0;
                }, 150); // Wait for the hideanimation to finish before setting opacity
            }, 5000);
        }
        let cancollide = true;

        function collisioneffectplayer() {
            if (cancollide === true) {
                cancollide = false;
                console.log('damage');
                character.style.animation = 'damageAnimation 5s forwards';
                setTimeout(() => {
                    cancollide = true;
                    character.style.animation = '';
                }, 5000);
            }
        };

        function hideanimation() {
            enemy.style.opacity = 0;
            enemy.style.animation = 'hideanimation 0.15s forwards';

        };

        createparticle(); // Start creating particles
    </script>
    <style>
        @keyframes damageAnimation {
            0% {
                box-shadow: inset 0 0 80px 20px rgb(24, 24, 24);
            }

            11% {
                box-shadow: inset 0 0 70px 18px rgba(244, 17, 17, 0.5);
            }

            22% {
                box-shadow: inset 0 0 60px 16px rgb(24, 24, 24);
            }

            33% {
                box-shadow: inset 0 0 50px 14px rgba(244, 17, 17, 0.5);
            }

            44% {
                box-shadow: inset 0 0 40px 12px rgb(24, 24, 24);
            }

            55% {
                box-shadow: inset 0 0 30px 10px rgba(244, 17, 17, 0.5);
            }

            66% {
                box-shadow: inset 0 0 20px 8px rgb(24, 24, 24);
            }

            77% {
                box-shadow: inset 0 0 10px 4px rgba(244, 17, 17, 0.5);
            }

            100% {
                box-shadow: inset 0 0 0px 0px rgb(24, 24, 24);
            }
        }

        @keyframes visibleanimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes hideanimation {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        body {
            user-select: none;
            -webkit-user-drag: none;
        }
    </style>
</body>

</html>