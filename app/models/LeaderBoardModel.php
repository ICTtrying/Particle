<?php
class LeaderBoardModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllScores()
    {
        $sql = 'SELECT  ldrb.id
                       ,ldrb.name
                        ,ldrb.highscore

                FROM leaderboard as ldrb
                ORDER BY ldrb.highscore DESC limit 5';


        $this->db->query($sql);

        return $this->db->resultSet();
    }
}
