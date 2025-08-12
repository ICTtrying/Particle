<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        #countdown {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 10em;
            color: white;
            text-align: center;
            z-index: 1050;
        }
    </style>
    <div id="countdown"></div>
    <script>
        function startcountdown() {
            let countdownnumber = 3;
            const countdownElement = document.getElementById('countdown');
            countdownElement.innerHTML = countdownnumber;
            const countdownInterval = setInterval(() => {
                countdownnumber--;
                countdownElement.innerHTML = countdownnumber;
                if (countdownnumber <= 0) {
                    clearInterval(countdownInterval);
                    countdownElement.innerHTML = "GO!";
                    countdownElement.style.color = "green";
                    setTimeout(() => {
                        countdownElement.style.display = "none";
                        ongoingGame = true;
                        createparticle();
                        dimshadow();
                        startTimer();
                    }, 1000);
                }
            }, 1000);
        }
    </script>
</body>

</html>