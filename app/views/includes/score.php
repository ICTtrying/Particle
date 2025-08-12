<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="scores">
        <p id="score">0</p>
        <p id="highscore">0</p>
    </div>

    <style>
        #scores {
            color: white;
            font-size: 24px;
            font-weight: 900;
            background-color: rgba(115, 115, 115, 0.5);
            padding: 10px;
            border-radius: 15px;
            border: 3px solid #040404ff;
            z-index: 7;
        }
    </style>

    <script>
    const score = localStorage.getItem('score') || 0;
    const highscore = localStorage.getItem('highscore') || 0;
    document.getElementById('score').innerText = `Score: ${score}`;
    document.getElementById('highscore').innerText = `Highscore: ${highscore}`;
    </script>
</body>
</html>