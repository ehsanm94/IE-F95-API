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

	public static function getSimilarGames($q)
	{
		return Model::raw('SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id WHERE games.title LIKE ?', array('%' . $q . '%'));
	}

	public static function getGamesByName($game_title)
	{
		return Model::raw("SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id WHERE games.title = '$game_title'");
	}

	public static function getGameIdByName($game_title)
	{
		$game = Model::queryOn(self::$table)
			->where('title', $game_title)
			->first()
			->get();
		if ($game) {
			return $game->getId();
		}
		return null;
	}

	public static function getRelatedGamesByName($game_title)
	{
		$game_id = self::getGameIdByName($game_title);
		return Model::raw("SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id JOIN related_games ON related_games.related_game = games.id WHERE related_games.game_id = ?", array($game_id));
	}
}