<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URLROOT; ?>/public/css/style.css">

</head>

<body>
    <div class="startscreen text-center align-middle">
        <?php require_once APPROOT . '/views/includes/particlestartscreen.php'; ?>
        <?php require_once APPROOT . '/views/includes/title.php'; ?>
        <?php require_once APPROOT . '/views/includes/tutorialbutton.php'; ?>
        <?php require_once APPROOT . '/views/includes/startgamebutton.php'; ?>
        <a id="leaderboardbutton" href="<?= URLROOT; ?>/Leaderboard/index">Leaderboard</a>
        <link rel="stylesheet" href="<?= URLROOT; ?>/public/css/leaderboard.css">
        <?php require_once APPROOT . '/views/includes/score.php'; ?>


<!--de tekst hieronder heb ik mogelijk gemaakt door chatGPT / The code below, is made possible by ChatGPT -->
        <div id="highscores">
            <h2 id="title">Highscores</h2>
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Highscore</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rank = 1;
                    foreach ($data['scores'] as $score) : ?>
                        <tr>
                            <td><?= $rank++; ?></td>
                            <td><?= htmlspecialchars($score->name); ?></td>
                            <td><?= htmlspecialchars($score->highscore); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <form id="scoreForm" action="<?= URLROOT; ?>/leaderboard/Addhighscore" method="post">
            <input type="hidden" id="scoreinput" name="score">
            <input type="hidden" id="name" name="name" value="unknown">
        </form>
            
        <script>
            (function() {
            if (!window.location.pathname.includes('/Leaderboard/index')) {
                window.location.href = "<?= URLROOT; ?>/Leaderboard/index/";
                return;
            }

            function addHighScoreOnce() {
                if (sessionStorage.getItem('highscore_submitted') === '1') return;

                let highscore = localStorage.getItem('highscore');
                if (highscore === null) return;

                highscore = parseInt(highscore, 10);
                if (isNaN(highscore)) {
                console.warn('No valid highscore found.');
                return;
                }

                document.getElementById('scoreinput').value = highscore;
                sessionStorage.setItem('highscore_submitted', '1');
                document.getElementById('scoreForm').submit();
            }

            addHighScoreOnce();

            <?php
            $scores = $data['scores'] ?? [];
            ?>

            const highscores = <?= json_encode(array_column($scores, 'highscore')); ?>;
            const names = <?= json_encode(array_column($scores, 'name')); ?>;
            console.log(highscores, names);
            })();
        </script>
    </div>
</body>

</html>