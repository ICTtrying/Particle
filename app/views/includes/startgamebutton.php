<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .startgamebutton {
            display: inline-block;
            padding: 10px 50px;
            margin: 10px;
            width: 200px;
            background: linear-gradient(to right,rgb(125, 84, 6), rgb(255, 235, 13));
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 10px;
            border: 3px solid rgb(8, 6, 1);
            font-size: 16px;
            z-index: 1;
            transition: width 0.3s;
        }

        .startgamebutton:hover {
            width: 210px;
        }
    </style>
    <a class="startgamebutton" href="<?= URLROOT; ?>/Homepages/StartGame">Start Game</a>
</body>

</html>