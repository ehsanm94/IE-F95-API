<?php
namespace App\Models;

use Zardak\Model;

class Game extends Model
{
    private static $table = 'games';

    public static function getGames($limit) {
    	return Model::raw('SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id LIMIT ' . $limit);
    }

    public static function getLastGames($limit) {
    	return Model::raw('SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id ORDER BY games.id DESC LIMIT ' . $limit);
    }

	public static function getGamesById($game_id)
	{
		return Model::raw('SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id WHERE games.id = ?', array($game_id));
	}
}