<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        #particle {
            position: absolute;
            top: 30%;
            left: 30%;
            width: 0px;
            height: 0px;
            background-color: black;
            border-radius: 50%;
            box-shadow: 0 0 0px 0px rgba(255,255,255,0.6);
            animation: particleAnimation 2s linear;
        }
        #particle2 {
            position: absolute;
            top: 30%;
            left: 30%;
            width: 0px;
            height: 0px;
            background-color: black;
            border-radius: 50%;
            box-shadow: 0 0 0px 0px rgba(255,255,255,0.6);
            animation: particleAnimation2 2s linear 1s;
        }

        @keyframes particleAnimation {
            0% {
                background-color: black;
                width: 5px;
                height: 5px;
                box-shadow: 0 0 0px 0px rgba(255,255,255,0.0);
                transform: translate(-50%, -50%);
            }
            70% {
                background-color: #222;
                width: 15px;
                height: 15px;
                box-shadow: 0 0 10px 4px rgba(255,255,255,0.7);
                transform: translate(-50%, -50%);
            }
            100% {
                background-color: white;
                width: 20px;
                height: 20px;
                box-shadow: 0 0 20px 8px rgba(255,255,255,0.9);
                transform: translate(-50%, -50%);
            }

        }

        @keyframes particleAnimation2 {
            0% {
                background-color: black;
                width: 5px;
                height: 5px;
                box-shadow: 0 0 0px 0px rgba(255,255,255,0.0);
                transform: translate(-50%, -50%);
            }
            70% {
                background-color: #222;
                width: 15px;
                height: 15px;
                box-shadow: 0 0 10px 4px rgba(255,255,255,0.7);
                transform: translate(-50%, -50%);
            }
            100% {
                background-color: white;
                width: 20px;
                height: 20px;
                box-shadow: 0 0 20px 8px rgba(255,255,255,0.9);
                transform: translate(-50%, -50%);
            }
        }
    </style>
    <div id="particle"></div>
    <div id="particle2"></div>
    <script>
    function loopparticle() {
        const particle = document.getElementById("particle");
        particle.style.left = Math.random() * 80 + 10 + "%";
        particle.style.top = Math.random() * 80 + 10 + "%";
        particle.style.animation = "none";
        void particle.offsetWidth;
        particle.style.animation = "particleAnimation 2s linear";
        particle.addEventListener("animationend", loopparticle, { once: true });
    }

    function loopparticle2() {
        const particle2 = document.getElementById("particle2");
        particle2.style.left = Math.random() * 80 + 10 + "%";
        particle2.style.top = Math.random() * 80 + 10 + "%";
        particle2.style.animation = "none";
        void particle2.offsetWidth;
        particle2.style.animation = "particleAnimation2 2s linear";
        particle2.addEventListener("animationend", () => {
            loopparticle2();
        }, { once: true });
    }

    document.addEventListener("DOMContentLoaded", loopparticle);
    document.addEventListener("DOMContentLoaded", () => {
        setTimeout(loopparticle2, 1000);
    });
</script>
</body>
</html>