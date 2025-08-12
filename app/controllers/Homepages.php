<?php

class Homepages extends BaseController
{

    public function index($firstname = NULL, $infix = NULL, $lastname = NULL)
    {
        $data = [
            'title' => 'Homepagina',
        ];
        $this->view('homepages/index', $data);
    }

     public function StartGame() 
     {
         $data = [
             'title' => 'Gamestarted',
         ];
         $this->view('game/index', $data);
     }

     public function StartTutorial() 
     {
         $data = [
             'title' => 'Tutorialstarted',
         ];
         $this->view('game/tutorial', $data);
     }
}