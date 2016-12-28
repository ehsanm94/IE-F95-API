<?php
namespace App\Objects;

use App\Response;
use App\Models\Game;
use App\Objects\Game as GameObject;

class GamesList
{
    private $games;
    private $count;

    public function __construct($games, $count)
    {
        $this->games = $games;
        $this->count = $count;
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
        $obj = array();
        $obj['games'] = array();

        $games_obj = new GameObject($this->games);
        $obj['games'][] = $games_obj->getXMLArray();
        $obj['count'] = $this->count;

        return array('games_list' => $obj);
    }

    public function getJSONArray() {
        $obj = array();

        $games_obj = new GameObject($this->games);
        $obj['games'] = $games_obj->getJSONArray();
        $obj['count'] = $this->count;

        return array('games_list' => $obj);
    }
}