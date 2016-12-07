<?php
namespace App\Models;

use Zardak\Model;

class Leaderboard extends Model
{
    private static $table = 'leaderboard';

    public static function getLeaderboard($game_title)
    {
        $game_id = Game::getGameIdByName($game_title);
        return Model::queryOn(self::$table)
            ->where('game_id', $game_id)
            ->orderBy('score', 'DESC')
            ->limit(10)
            ->get();
    }
}