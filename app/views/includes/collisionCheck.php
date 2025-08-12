<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        function checkcollision() {
            if (damageCooldown === true) {
                return;
            } else {
                const enemy = document.getElementById('enemy');
                if (!enemy) return; // Prevent error if enemy does not exist
                const enemyRect = enemy.getBoundingClientRect();
                const rect = character.getBoundingClientRect();
                const characterRectLeftlight = rect.left - shadowBlur;
                const characterRectRightlight = rect.right + shadowBlur;
                const characterRectToplight = rect.top - shadowBlur;
                const characterRectBottomlight = rect.bottom + shadowBlur;
                // hitbox player
                const characterRectLeft = rect.left;
                const characterRectRight = rect.right;
                const characterRectTop = rect.top;
                const characterRectBottom = rect.bottom;
                //hitbox particle
                checkParticleCollision()


                if (
                    characterRectLeftlight < enemyRect.right &&
                    characterRectRightlight > enemyRect.left &&
                    characterRectToplight < enemyRect.bottom &&
                    characterRectBottomlight > enemyRect.top
                ) {
                    // in vision
                    if (shadowBlur > 0) {
                        collisioneffect();
                    } else {
                        console.log('Game Over');
                        endgame();
                    }
                } else {
                    // not visible
                    hideanimation();
                }

                if (
                    characterRectLeft < (enemyRect.right - 30) &&
                    characterRectRight > (enemyRect.left + 30) &&
                    characterRectTop < (enemyRect.bottom - 20) &&
                    characterRectBottom > (enemyRect.top + 20)
                ) {
                    // Collision detected
                    collisioneffectplayer();
                    damageAnimation();
                    damageCooldown = true
                    loseLife();
                }

            }
        }

        function checkParticleCollision() {
            const particles = document.querySelector('.particle');
            if (!particles) return;
            const particleRect = particles.getBoundingClientRect();
            if (!character) return;
            const charRect = character.getBoundingClientRect();

            if (
                charRect.left < particleRect.right &&
                charRect.right > particleRect.left &&
                charRect.top < particleRect.bottom &&
                charRect.bottom > particleRect.top
            ) {
                
                particles.remove();
                shadowBlur += 12;
                shadowWidth += 12;
                createparticle();
                increaseScore();
            }
        }
    </script>
</body>

</html>