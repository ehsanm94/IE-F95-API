<?php
namespace App\Models;

use Zardak\Model;

class Comment extends Model
{
    private static $table = 'comments';

    public static function getLastComments($limit){
    	return Model::queryOn(self::$table)
    		->orderBy('id', 'DESC')
    		->limit($limit)
    		->get();
    }

	public static function getCommentsByGameName($game_title, $offset = 0)
	{
		$limit = $offset == 0 ? 3 : mt_rand(1,3);
		if ($game_id = Game::getGameIdByName($game_title)) {
			return Model::queryOn(self::$table)
				->where('game_id', $game_id)
				->orderBy('id', 'DESC')
				->limit($limit)
				->offset($offset)
				->get();
		}
		else {
			return null;
		}
	}
}