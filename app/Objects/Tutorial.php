<?php
namespace App\Objects;

use Damev\Damev;
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
            $item['date']        = Damev::getJDate($tutorial->getDate());

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
            $item['date']        = Damev::getJDate($tutorial->getDate());

            $game_model = GameModel::getGamesById($tutorial->getGameId());
            $game = new Game($game_model);
            $game_array = $game->getJSONArray();
            $item['game'] = $game_array[0];

            $obj[] = $item;
        }

        return $obj;
    }
}