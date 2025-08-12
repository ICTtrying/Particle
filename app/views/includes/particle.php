<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <span id="particle"></span>

    <style>
        .particle {
            width: 1vw;
            height: 1vw;
            background-color: red;
            border-radius: 50%;
            opacity: 0.8;
            box-shadow: 0 0 16px 14px rgba(255, 0, 0, 0.5);
            border: 1px solid black;
            transform: translate(-50%, -50%);
            animation: particleAnimation 2s infinite;
            position: absolute;
            z-index: 1001;
        }

        @keyframes particleAnimation {
            0% {
                width: 1vw;
                height: 1vw;
            }

            50% {
                width: 1.3vw;
                height: 1.3vw;
            }

            100% {
                width: 1vw;
                height: 1vw;
            }
        }
    </style>

    <script>
            let noParticlepresent = true;

            function createparticle() {
                if (noParticlepresent === true) {
                    noParticlepresent = false;
                    const newParticle = document.createElement('span');
                    newParticle.className = 'particle';
                    newParticle.style.top = Math.random() * 100 + 'vh';
                    newParticle.style.left = Math.random() * 100 + 'vw';
                    document.body.appendChild(newParticle);
                    setTimeout(() => {
                        newParticle.remove();
                        noParticlepresent = true;
                        setTimeout(createparticle, Math.random() * 4500 + 2000);
                    }, 2000);
                }
            }

            // Start the particle creation loop
            createparticle();
    </script>
</body>

</html>