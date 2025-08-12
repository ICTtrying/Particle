<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <span id="character">
    </span>
    <?php
    // Character looks
    $heightcharacter = 3;
    $widthcharacter = 3;
    $shadowblur = 100;
    $shadowwidth = 70;
    $shadowcolor = 'white';
    $charactery = 50; // Y position of the character
    $characterx = 50; // X position of the character
    ?>

    <style>
        #character {
            width: <?= $widthcharacter; ?>vw;
            height: <?= $heightcharacter; ?>vw;
            background-color: black;
            border-radius: 50%;
            box-shadow: 0 0 <?= $shadowblur ?>px <?= $shadowwidth ?>px <?= $shadowcolor ?>, inset 0 0 5px 1px white;
            position: absolute;
            top: <?= $charactery; ?>vh;
            left: <?= $characterx; ?>vw;
            transform: translate(-50%, -50%);
            user-select: none;
            outline: none;
            pointer-events: none;
            caret-color: transparent;
            z-index: 1000;
        }
    </style>

    <script>
        let shadowBlur = <?= $shadowblur ?>;
        let shadowWidth = <?= $shadowwidth ?>;
        const shadowColor = '<?= $shadowcolor ?>';
        const character = document.getElementById('character');
        let targetX = window.innerWidth / 2;
        let targetY = window.innerHeight / 2;
        let currentX = targetX;
        let currentY = targetY;
        let damageCooldown = false;


        document.addEventListener('mousemove', function(e) {
            targetX = e.clientX;
            targetY = e.clientY;
        });
        document.addEventListener('touchmove', function(e) {
            if (e.touches.length > 0) {
                targetX = e.touches[0].clientX;
                targetY = e.touches[0].clientY;
            }
        });

        function animateCharacter() {
            // Move a smaller fraction towards the target position (slower lerp)
            currentX += (targetX - currentX) * 0.03;
            currentY += (targetY - currentY) * 0.03;

            character.style.left = currentX + 'px';
            character.style.top = currentY + 'px';
            checkcollision();
            requestAnimationFrame(animateCharacter);
        }

        // slowly dim the character shadow
        function dimshadow() {
            if (ongoingGame === true) {
                animateCharacter();
                setInterval(() => {
                    if (shadowBlur > 0) shadowBlur -= 0.5;
                    if (shadowWidth > 0) shadowWidth -= 0.5;
                    character.style.boxShadow = `0 0 ${shadowBlur}px ${shadowWidth}px ${shadowColor}, inset 0 0 5px 1px white`;
                }, 300);
            } else {
                shadowBlur = 100; // Reset shadow blur when game is not ongoing
                shadowWidth = 70; // Reset shadow width when game is not ongoing
                character.style.boxShadow = `0 0 ${shadowBlur}px ${shadowWidth}px ${shadowColor}, inset 0 0 5px 1px white`;
            }
        }
    </script>
</body>

</html>