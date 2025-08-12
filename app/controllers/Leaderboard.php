<?php

class Leaderboard extends BaseController
{
    private $LeaderBoardModel;

    public function __construct()
    {
        $this->LeaderBoardModel = $this->model('LeaderBoardModel');
    }


    public function index()
    {
        // Get all scores from the model
        $scores = $this->LeaderBoardModel->getAllScores();

        // Prepare data for the view
        $LeaderBoardData = [
            'title' => 'Leaderboard',
            'scores' => $scores,
        ];

        $this->view('homepages/index', $LeaderBoardData);
    }

    public function Addhighscore()
    {
        // Debug log
        error_log('Addhighscore called');
        $data = [
            'title'   => 'Leaderboard',
            'scores'  => $this->LeaderBoardModel->getAllScores(),
            'message' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize input (FILTER_SANITIZE_STRING deprecated)
            $name  = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
            $score = isset($_POST['score']) ? (int)$_POST['score'] : 0;

            if ($name !== '' && $score > 0) {
                // Insert directly (model has no insert method in provided code)
                $db = new Database();
                $db->query('INSERT INTO leaderboard (name, highscore) VALUES (:name, :highscore)');
                $db->bind(':name', $name, PDO::PARAM_STR);
                $db->bind(':highscore', $score, PDO::PARAM_INT);
                $db->execute();

                // Redirect (PRG pattern) to avoid form resubmission
                header('Location: ' . URLROOT . '/leaderboard');
                exit;
            } else {
                $data['message'] = 'Invalid name or score.';
            }
        }

        // Always (re)load top scores for the view
        $data['scores'] = $this->LeaderBoardModel->getAllScores();

        $this->view('homepages/index', $data);
    }
}
