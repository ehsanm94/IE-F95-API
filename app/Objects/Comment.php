<?php
namespace App\Objects;

use Damev\Damev;
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
        $response = new Response(array('comments' => $this->getJSONArray()));
        $response->sendResponseAsJson();
    }

    public function sendXML() {
        $response = new Response(array('comments' => $this->getXMLArray()));
        $response->sendResponseAsXML();
    }


    public function getXMLArray() {
        $obj = array();
        if ($this->comments) {
            $obj['comment'] = array();
            foreach ($this->comments as $comment) {
                $item = array();
                $item['text'] = $comment->getText();
                $item['rate'] = $comment->getRate();
                $item['date'] = Damev::getJDate($comment->getDate());

                $player_model = PlayerModel::getPlayerById($comment->getPlayerId());
                $player = new Player($player_model);
                $item['player'] = $player->getXMLArray();

                $game_model = GameModel::getGamesById($comment->getGameId());
                $game = new Game($game_model);

                $obj['comment'][] = array_merge($item, $game->getXMLArray());
            }
        }
        return $obj;
    }

    public function getJSONArray() {
        $obj = array();
        if ($this->comments) {
            foreach ($this->comments as $comment) {
                $item = array();
                $item['text'] = $comment->getText();
                $item['rate'] = intval($comment->getRate());
                $item['date'] = Damev::getJDate($comment->getDate());

                $player_model = PlayerModel::getPlayerById($comment->getPlayerId());
                $player = new Player($player_model);
                $item['player'] = $player->getJSONArray();

                $game_model = GameModel::getGamesById($comment->getGameId());
                $game = new Game($game_model);
                $game_array = $game->getJSONArray();
                $item['game'] = $game_array[0];

                $obj[] = $item;
            }
        }
        return $obj;
    }
}