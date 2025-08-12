<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        #titlegame {
            font-size: 90px;
            color: white;
            text-align: center;
            margin-bottom: 20px;
            z-index: 1;
        }
        #gameover {
            font-size: 100px;
            color: red;
            text-align: center;
            z-index: 1;
        }
    </style>
    <span id="gameover">game over</span>
    <span id="titlegame">Particle</span>
    <div class="text">
    <p>Welcome to Particle, a simple game made by Wesley B.</p>
    <p>this game is made with a MVC structure, in PHP.</p>
    <p>lets get started!</p>
    </div>
    

    <style>
        #titlegame {
            font-size: clamp(60px, 11vw, 90px);
            top: clamp(5%, 12vw, 12%);
        }
        #gameover {
            font-size: clamp(60px, 12vw, 100px);
            top: 0%;
        }
        .text p {
            font-size: clamp(15px, 2vw, 18px);
            margin: 0;
        }
    </style>

             
</body>
</html>