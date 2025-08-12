<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="opacitytest">
        <img id="enemy" src="<?= URLROOT ?>/public/img/enemy.png" alt="enemy">
    </div>
    <script>
        const enemyY = 5;
        const enemyX = 5;

        // Set the enemy position
        document.getElementById('enemy').style.top = `${enemyY}px`;
        document.getElementById('enemy').style.left = `${enemyX}px`;

        //walk to random position
        setInterval(() => {
            if (typeof ongoingGame === 'undefined' || !ongoingGame) return; // Prevent error if ongoingGame is not defined or false
            const enemy = document.getElementById('enemy');
            const randomX = Math.floor(Math.random() * (window.innerWidth));
            const randomY = Math.floor(Math.random() * (window.innerHeight));
            // walk to random position
            enemy.style.transition = 'top 2s linear, left 2s linear, transform 0.2s linear';
            enemy.style.top = `${randomY}px`;
            enemy.style.left = `${randomX}px`;
            // rotate enemy to face the new position
            const rect = enemy.getBoundingClientRect();
            const currentX = rect.left + rect.width / 2; // chatGPT did this
            const currentY = rect.top + rect.height / 2; // chatGPT did this
            const targetX = randomX + rect.width / 2; // chatGPT did this
            const targetY = randomY + rect.height / 2; // chatGPT did this
            const angle = Math.atan2(targetY - currentY, targetX - currentX) * (180 / Math.PI); // chatGPT did this
            enemy.style.transform = `rotate(${angle}deg)`;  // chatGPT did this

        }, 1000)
    </script>
    <style>
        #enemy {
            width: 24vmin;
            height: 24vmin;
            position: absolute;
            top: <?= $enemyY; ?>px;
            left: <?= $enemyX; ?>px;
            user-select: none;
            pointer-events: none;
            -webkit-user-drag: none;
        }

        @keyframes visibleanimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</body>

</html>