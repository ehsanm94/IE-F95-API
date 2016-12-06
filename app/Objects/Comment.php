<?php
namespace App\Objects;

use App\Models\Player as PlayerModel;
use App\Models\Game as GameModel;
use App\Response;

class Comment
{
    private $comments;

    public function __construct($comments)
    {
        $this->comments = $comments;
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
        $obj['comment'] = array();
        foreach ($this->comments as $comment) {
            $item = array();
            $item['text'] = $comment->getText();
            $item['rate'] = $comment->getRate();
            $item['date'] = $comment->getDate();

            $player_model = PlayerModel::getPlayerById($comment->getPlayerId());
            $player = new Player($player_model);
            $item['player'] = $player->getJSONArray();

            $game_model = GameModel::getGamesById($comment->getGameId());
            $game = new Game($game_model);

            $obj['comment'][] = array_merge($item, $game->getXMLArray());
        }
        return $obj;
    }

    public function getJSONArray() {
        $obj = array();
        foreach ($this->comments as $comment) {
            $item = array();
            $item['text'] = $comment->getText();
            $item['rate'] = $comment->getRate();
            $item['date'] = $comment->getDate();

            $player_model = PlayerModel::getPlayerById($comment->getPlayerId());
            $player = new Player($player_model);
            $item['player'] = $player->getJSONArray();

            $game_model = GameModel::getGamesById($comment->getGameId());
            $game = new Game($game_model);
            $item['game'] = $game->getJSONArray();

            $obj[] = $item;
        }
        return $obj;
    }
}