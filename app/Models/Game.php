<?php
namespace App\Models;

use Zardak\Model;

class Game extends Model
{
    private static $table = 'games';

    public static function getGames($limit) {
    	return Model::raw('SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments, AVG(comments.rate) as rate FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id LIMIT ' . $limit);
    }

    public static function getLastGames($limit) {
    	return Model::raw('SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments, AVG(comments.rate) as rate FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id ORDER BY games.id DESC LIMIT ' . $limit);
    }

	public static function getGamesById($game_id)
	{
		return Model::raw('SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments, AVG(comments.rate) as rate FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id WHERE games.id = ?', array($game_id));
	}

	public static function getSimilarGames($q)
	{
		return Model::raw('SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments, AVG(comments.rate) as rate FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id WHERE games.title LIKE ?', array('%' . $q . '%'));
	}

	public static function getGamesByName($game_title)
	{
		return Model::raw("SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments, AVG(comments.rate) as rate FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id WHERE games.title = '$game_title'");
	}

	public static function getRelatedGamesByName($game_title)
	{
		$game_id = self::getGameIdByName($game_title);
		return Model::raw("SELECT * FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments, AVG(comments.rate) as rate FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id JOIN related_games ON related_games.related_game = games.id WHERE related_games.game_id = ?", array($game_id));
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

	public static function getGamesList($filters, $offset = 0) {
		$limit = $offset == 0 ? 3 : mt_rand(1,3);
		$rates 		= empty($filters['rates']) 		? '' : $filters['rates'];
		$categories = empty($filters['categories']) ? '' : $filters['categories'];

		$rate_section = '';
		$category_section = '';

		if ($rates)
		{
			$rate_section .= '(';
			foreach ($rates as $rate) 
			{
				if ($rate_section != '(') $rate_section .= ' OR ';
				$rate_section .= "(rate >= " . $rate . " AND " . "rate < " . ($rate + 1) . ") ";
			}
			$rate_section .= ')';
		}

		if ($categories) 
		{
			if ($rate_section != '') $category_section .= ' AND ';
			$category_section .= '(';
			foreach ($categories as $category) 
			{
				if ($category_section != '(' && $category_section != ' AND (' ) $category_section .= 'OR ';
				$category_section .= 'name = "' . $category . '" ';
			}
			$category_section .= ')';
		}
    	$games = Model::raw('SELECT DISTINCT games.id, title, abstract, info, rate, comments, big_image, small_image FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments, AVG(comments.rate) as rate FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id JOIN games_categories JOIN categories ON games_categories.category_id = categories.id' . ($rate_section || $category_section ? ' WHERE ' : '') . $rate_section . $category_section . 'ORDER BY games.id');
		
		$all = self::countGameList($filters);
		$ans = array();

		for ($i = $offset; ($i < $offset + $limit) && $i < $all; $i++) {
			$ans[] = $games[$i];
		}

		return $ans;
	}

	public static function countGameList($filters) {
		$rates 		= empty($filters['rates']) 		? '' : $filters['rates'];
		$categories = empty($filters['categories']) ? '' : $filters['categories'];

		$rate_section = '';
		$category_section = '';

		if ($rates)
		{
			$rate_section .= '(';
			foreach ($rates as $rate) 
			{
				if ($rate_section != '(') $rate_section .= ' OR ';
				$rate_section .= "(rate >= " . $rate . " AND " . "rate < " . ($rate + 1) . ") ";
			}
			$rate_section .= ')';
		}

		if ($categories) 
		{
			if ($rate_section != '') $category_section .= ' AND ';
			$category_section .= '(';
			foreach ($categories as $category) 
			{
				if ($category_section != '(' && $category_section != ' AND (' ) $category_section .= 'OR ';
				$category_section .= 'name = "' . $category . '" ';
			}
			$category_section .= ')';
		}
		$res = Model::raw('SELECT DISTINCT count(DISTINCT games.id) as counts FROM (SELECT games.id as game_id, COUNT(comments.game_id) as comments, AVG(comments.rate) as rate FROM comments RIGHT OUTER JOIN games ON games.id = comments.game_id GROUP BY games.id) as t1 RIGHT OUTER JOIN games on t1.game_id = games.id JOIN games_categories JOIN categories ON games_categories.category_id = categories.id' . ($rate_section || $category_section ? ' WHERE ' : '') . $rate_section . $category_section . 'ORDER BY games.id');
		return $res[0]->getCounts();
	}
}
