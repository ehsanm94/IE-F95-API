<?php
namespace App\Objects;

use App\Models\Game as GameModel;
use App\Models\Comment as CommentModel;
use App\Models\Tutorial as TutorialModel;
use App\Response;

class Homepage
{
    private $slider_items,
            $new_games,
            $comments,
            $tutorials;

    public function __construct($type = 'json')
    {
        $slider_games   = GameModel::getGames(10);
        $last_games     = GameModel::getLastGames(5);
        $last_comments  = CommentModel::getLastComments(5);
        $last_tutorials = TutorialModel::getLastTutorials(5);

        $this->slider_items = new Game($slider_games);
        $this->new_games    = new Game($last_games);
        $this->comments     = new Comment($last_comments);
        $this->tutorials    = new Tutorial($last_tutorials);
    }

    public function sendJSON() {
        $response = new Response($this->getJSONArray());
        $response->sendResponseAsJson();
    }

    public function sendXML() {
        $response = new Response($this->getXMLArray());
        $response->sendResponseAsXML();
    }

    public function getXMLArray() {
        $homepage = array(
            'slider'    => $this->slider_items->getXMLArray(),
            'new_games' => $this->new_games->getXMLArray(),
            'comments'  => $this->comments->getXMLArray(),
            'tutorials' => $this->tutorials->getXMLArray(),
        );
        return array('homepage' => $homepage);
    }

    public function getJSONArray() {
        $homepage = array(
            'slider'    => $this->slider_items->getJSONArray(),
            'new_games' => $this->new_games->getJSONArray(),
            'comments'  => $this->comments->getJSONArray(),
            'tutorials' => $this->tutorials->getJSONArray(),
        );
        return array('homepage' => $homepage);
    }
}