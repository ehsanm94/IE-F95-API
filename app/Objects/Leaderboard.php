<?php
namespace App\Objects;

use App\Models\Player as PlayerModel;
use App\Response;

class Leaderboard
{
    private $leaderboard;

    public function __construct($leaderboard)
    {
        $this->leaderboard = $leaderboard;
    }

    public function sendJSON() {
        $response = new Response(array('leaderboard' => $this->getJSONArray()));
        $response->sendResponseAsJson();
    }

    public function sendXML() {
        $response = new Response(array('leaderboard' => $this->getXMLArray()));
        $response->sendResponseAsXML();
    }


    public function getXMLArray() {
        $obj = array();
        if ($this->leaderboard) {
            $obj['record'] = array();
            foreach ($this->leaderboard as $lead) {
                $item = array();
                $item['score'] = $lead->getScore();
                $item['level'] = $lead->getLevel();
                $item['displacement'] = $lead->getDisplacement();

                $player_model = PlayerModel::getPlayerById($lead->getPlayerId());
                $player = new Player($player_model);
                $item['player'] = $player->getXMLArray();

                $obj['record'][] = $item;
            }
        }
        return $obj;
    }

    public function getJSONArray() {
        $obj = array();
        if ($this->leaderboard) {
            foreach ($this->leaderboard as $lead) {
                $item = array();
                $item['score'] = $lead->getScore();
                $item['level'] = $lead->getLevel();
                $item['displacement'] = $lead->getDisplacement();

                $player_model = PlayerModel::getPlayerById($lead->getPlayerId());
                $player = new Player($player_model);
                $item['player'] = $player->getXMLArray();

                $obj[] = $item;
            }
        }
        return $obj;
    }
}