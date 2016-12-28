<?php
namespace App\Controller;

use App\Error;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Leaderboard;
use App\Models\Gallery;
use App\Models\Game;
use App\Objects\Category as CategoryObject;
use App\Objects\Comment as CommentObject;
use App\Objects\Gallery as GalleryObject;
use App\Objects\Game as GameObject;
use App\Objects\GamesList as GamesListObject;
use App\Objects\Homepage as HomepageObject;
use App\Objects\Leaderboard as LeaderboardObject;
use App\Response;
use Zardak\Controller;
use Zardak\Template;

class Home extends Controller
{
    public function index($page = null) {
        if ($page == '.xml') {
            $page = 'home.xml';
        }
        else if ($page == '.json' || $page == null) {
            $page = 'home';
        }

        $home_entries = array('home', 'home.xml', 'home.json');
        if (in_array($page, $home_entries)) {

            $homepage = new HomepageObject();
            if($page == $home_entries[1]) {
                $homepage->sendXML();
            }
            else {
                $homepage->sendJSON();
            }
        }

        $game_entries = array('games', 'games.xml', 'games.json');
        if (in_array($page, $game_entries)) {
            if (isset($_GET['q']) && !empty($_GET['q'])) {
                
                $games_model = Game::getSimilarGames($_GET['q']);
                $games = new GameObject($games_model);

                if($page == $game_entries[1]) {
                    $games->sendXML();
                }
                else {
                    $games->sendJSON();
                }
            }
            else {
                $this->badRequest($page, 'missed parameter q');
            }
        }

        $category_entries = array('categories', 'categories.xml', 'categories.json');
        if (in_array($page, $category_entries)) {
            $categoriesModel = Category::getAll();
            $categories = new CategoryObject($categoriesModel);
            if($page == $category_entries[1]) {
                $categories->sendXML();
            }
            else {
                $categories->sendJSON();
            }
        }

        $games_list_entries = array('games_list', 'games_list.xml', 'games_list.json');
        if (in_array($page, $games_list_entries)) {
            if (!isset($_POST['filters']) || empty($_POST['filters'])) {
                $this->badRequest($page, "You must send 'filters' parameter via POST request to this API!");
            }

            $filters = json_decode($_POST['filters'], true);

            if (!isset($filters['rates'])) {
                $this->badRequest($page, "filters must have 'rates' index");
            }
            
            if (!isset($filters['categories'])) {
                $this->badRequest($page, "filters must have 'categories' index");
            }

            $offset = 0;
            if (isset($_GET['offset']) && !empty($_GET['offset'])) {
                $offset = intval($_GET['offset']);
            }

            $games_model = Game::getGamesList($filters, $offset);
            $count_game_list = Game::countGameList($filters);
            $games = new GamesListObject($games_model, $count_game_list);

            if($page == $games_list_entries[1]) {
                $games->sendXML();
            }
            else {
                $games->sendJSON();
            }
        }
    
        $this->badRequest($page);
    }

    public function games($game_title = null, $fragment = null) {
        if (!$game_title && !$fragment)
            $this->index('games');

        if (
            $fragment == 'header.xml' || $fragment == 'header' || $fragment == 'header.json' ||
            $fragment == 'info.xml' || $fragment == 'info' || $fragment == 'info.json'
        ) {
            $game_model = Game::getGamesByName($game_title);
            $game = new GameObject($game_model);
            if ($fragment == 'header' || $fragment == 'header.json' || $fragment == 'info' || $fragment == 'info.json') {
                $game->sendJSON(true);
            }
            else {
                $game->sendXML(true);
            }
        }

        if ($fragment == 'leaderboard.xml' || $fragment == 'leaderboard' || $fragment == 'leaderboard.json') {
            $leaderboard_model = Leaderboard::getLeaderboard($game_title);
            $leaderboard = new LeaderboardObject($leaderboard_model);
            if ($fragment == 'leaderboard' || $fragment == 'leaderboard.json') {
                $leaderboard->sendJSON();
            }
            else {
                $leaderboard->sendXML();
            }
        }

        if ($fragment == 'comments.xml' || $fragment == 'comments' || $fragment == 'comments.json') {
            $offset = 0;
            if (isset($_GET['offset']) && !empty($_GET['offset'])) {
                $offset = intval($_GET['offset']);
            }
            $comment_model = Comment::getCommentsByGameName($game_title, $offset);
            $comments = new CommentObject($comment_model);
            if ($fragment == 'comments' || $fragment == 'comments.json') {
                $comments->sendJSON();
            }
            else {
                $comments->sendXML();
            }
        }

        if ($fragment == 'related_games.xml' || $fragment == 'related_games' || $fragment == 'related_games.json') {
            $games_model = Game::getRelatedGamesByName($game_title);
            $game = new GameObject($games_model);
            if ($fragment == 'related_games' || $fragment == 'related_games.json') {
                $game->sendJSON();
            }
            else {
                $game->sendXML();
            }
        }

        if ($fragment == 'gallery.xml' || $fragment == 'gallery' || $fragment == 'gallery.json') {
            $resources = Gallery::items($game_title);
            $gallery = new GalleryObject($resources);
            if ($fragment == 'gallery' || $fragment == 'gallery.json') {
                $gallery->sendJSON();
            }
            else {
                $gallery->sendXML();
            }
        }

        $this->badRequest($fragment);
    }

    private function badRequest($page, $message = null) {
        $r = new Response(null, false, Error::badRequest($message));
        if (strpos($page, '.xml')) {
            $r->sendResponseAsXML();
        }
        else {
            $r->sendResponseAsJson();
        }
    }

    public function test() {
        $chain = array(
            'home',
            'base'
        );
        $tpl = new Template($chain);
        $tpl->render();
    }
}