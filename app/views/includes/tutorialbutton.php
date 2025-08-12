<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .startTutorialbutton {
            display: inline-block;
            padding: 10px 25px;
            margin-top: 10px;
            width: 150px;
            background: linear-gradient(to right,rgb(54, 54, 54), rgb(90, 90, 90));
            color: white;
            text-decoration: none;
            border-radius: 10px;
            border: 3px solid rgb(8, 6, 1);
            font-size: 16px;
            font-size: 16px;
            font-weight: bold;
            z-index: 1;
            transition: width 0.3s;
        }

        .startTutorialbutton:hover {
            width: 160px;
        }
    </style>
    <a class="startTutorialbutton" href="<?= URLROOT; ?>/homepages/Gameover">Tutorial</a>
</body>

</html>