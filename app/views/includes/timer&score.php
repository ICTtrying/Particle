<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .timer-score-container {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 24px;
            align-items: center;
        }
        #timer {
            font-size: clamp(1.5em, 3vw, 4em);
            font-weight: bold;
            background: #262626ff;
            padding: 5px 10px;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
            color: #fff;
        }
        #score {
            font-size: clamp(1em, 3vw, 4em);
            font-weight: bold;
            background: #717171ff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        @media (max-width: 720px) {
            .timer-score-container {
                left: 16px;
                transform: none;
            }
        }
    </style>
    <div class="timer-score-container">
        <div id="timer">
            00:00
        </div>
        <div id="score">
            Score: <span id="score-value">0</span>
        </div>
    </div>
    <script>
    let timerInterval;
    let secondsElapsed = 0;
    let score = 0;

    function startTimer() {
        if (timerInterval) return; // Prevent multiple intervals
        timerInterval = setInterval(() => {
            secondsElapsed++;
            const minutes = String(Math.floor(secondsElapsed / 60)).padStart(2, '0');
            const seconds = String(secondsElapsed % 60).padStart(2, '0');
            document.getElementById('timer').textContent = `${minutes}:${seconds}`;
        }, 1000);
    }

    function increaseScore() {
        score++;
        document.getElementById('score-value').textContent = score;
    }
    </script>
</body>
</html>