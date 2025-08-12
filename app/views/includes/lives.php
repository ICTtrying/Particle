<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        #lives {
            position: absolute;
            top: 10px;
            right: 20px;
            display: flex;
            gap: 10px;
        }
        #lives img {
            width: clamp(3em, 4vw, 4em);
            height: clamp(2em, 4vw, 3em);
        }
    </style>
    <div id="lives">
        <img id="heart" src="<?= URLROOT ?>/public/img/heart.png" alt="heart">
        <img id="heart2" src="<?= URLROOT ?>/public/img/heart.png" alt="heart">
        <img id="heart3" src="<?= URLROOT ?>/public/img/heart.png" alt="heart">
    </div>
    <script>
        let lives = 3; // Start with 3 lives
        const heart = document.getElementById('heart');
        const heart2 = document.getElementById('heart2');
        const heart3 = document.getElementById('heart3');

        function loseLife() {
            if (lives > 0) {
                lives--;
                updateDisplay();
            }
        }
        function resetlives() {
            console.log('resetlives called');
            lives = 3; // Reset lives to 3
            heart.style.display = 'block';
            heart2.style.display = 'block';
            heart3.style.display = 'block';
        }

        function updateDisplay() {
            heart.style.display = lives >= 1 ? 'block' : 'none';
            heart2.style.display = lives >= 2 ? 'block' : 'none';
            heart3.style.display = lives >= 3 ? 'block' : 'none';

            if (lives <= 0) {
                console.log('Game Over');
                endgame(); // Call endgame function when lives reach 0
            }
        }
    </script>
</body>
</html>