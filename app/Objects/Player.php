<?php
namespace App\Objects;

use App\Response;

class Player
{
    private $player;

    public function __construct($player)
    {
        $this->player = $player;
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
        return $this->getJSONArray();
    }

    public function getJSONArray() {
        $obj = array();

        $obj['name']    = $this->player->getName();
        $obj['avatar']  = $this->player->getAvatar();

        return $obj;
    }
}