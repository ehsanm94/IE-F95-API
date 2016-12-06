<?php
namespace App\Objects;

use App\Models\Game as GameModel;
use App\Response;

class Tutorial
{
    private $tutorials;

    public function __construct($tutorial)
    {
        $this->tutorials = $tutorial;
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

        foreach ($this->tutorials as $tutorial) {
            $item = array();

            $item['title']       = $tutorial->getTitle();
            $item['date']        = $tutorial->getDate();

            $game_model = GameModel::getGamesById($tutorial->getGameId());
            $game = new Game($game_model);

            $obj[] = array_merge($item, $game->getXMLArray());
        }

        return array ('tutorial' => $obj);
    }

    public function getJSONArray() {
        $obj = array();

        foreach ($this->tutorials as $tutorial) {
            $item = array();

            $item['title']       = $tutorial->getTitle();
            $item['date']        = $tutorial->getDate();

            $game_model = GameModel::getGamesById($tutorial->getGameId());
            $game = new Game($game_model);
            $item['game'] = $game->getJSONArray();

            $obj[] = $item;
        }

        return $obj;
    }
}