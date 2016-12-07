<?php
namespace App\Models;

use Zardak\Model;

class Gallery extends Model
{
    private static $table = 'gallery';

    public static function items($game_title){
        if ($game_id = Game::getGameIdByName($game_title)) {
            return Model::queryOn(self::$table)
                ->where('game_id', $game_id)
                ->get();
        }
        return null;
    }
}