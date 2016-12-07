<?php
namespace App\Controller;

use App\Objects\HomePage;
use Zardak\Controller;
use App\Error;
use App\Response;
use App\Models\Game;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Player;
use App\Models\Tutorial;
use App\Objects\Game as GameObject;
use App\Objects\Comment as CommentObject;
use App\Objects\Homepage as HomepageObject;
use App\Objects\Category as CategoryObject;

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
    
        $this->badRequest($page);
    }

    public function games($game_title = null, $fragment = null) {
        if (!$game_title && !$fragment)
            $this->index('games');

        if ($fragment == 'header.xml' || $fragment == 'header' || $fragment == 'header.json') {
            /**
             * game {game_title, image, rate, #comments, categories {name}, }
             */
            $game_model = Game::getGamesByName($game_title);
            $game = new GameObject($game_model);
            if ($fragment == 'header' || $fragment == 'header.json') {
                $game->sendJSON();
            }
            else {
                $game->sendXML();
            }
        }

        if ($fragment == 'info.xml' || $fragment == 'info' || $fragment == 'info.json') {
            /**
             * text
             */
            $r = new Response($games);
            if ($fragment == 'info' || $fragment == 'info.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        if ($fragment == 'leaderboard.xml' || $fragment == 'leaderboard' || $fragment == 'leaderboard.json') {
            /**
             * leaderboard { game {} , player {name, avatar, record {place, score, displacement}}}
             */
            $r = new Response($games);
            if ($fragment == 'leaderboard' || $fragment == 'leaderboard.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        if ($fragment == 'comments.xml' || $fragment == 'comments' || $fragment == 'comments.json') {
            /**
             * comments { game {}, comment {date, rate, text, player {avatar, name}}, #comments}
             */
            $r = new Response($games);
            if ($fragment == 'comments' || $fragment == 'comments.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        if ($fragment == 'related_games.xml' || $fragment == 'related_games' || $fragment == 'related_games.json') {
            /**
             * game {game_title, image, rate, #comments, categories {name}, }
             */
            $r = new Response($games);
            if ($fragment == 'related_games' || $fragment == 'related_games.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        if ($fragment == 'gallery.xml' || $fragment == 'gallery' || $fragment == 'gallery.json') {
            /**
             * gallery {title, view, type, url}
             */
            $r = new Response($games);
            if ($fragment == 'gallery' || $fragment == 'gallery.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        $this->badRequest($fragment);
    }

    private function searchGamesByKeyword($keyword) {
        /**
         * search { game {game_title, image, rate, #comments, categories {name}, } }
         */
        return array('key' => $keyword);
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
}

/**
 * All objects:
 *      + game {title, abstract, info, big_image, small_image. categories{}, #comments}
 *      + category {name}
 *      + player {name, avatar}
 *      + gallery: resources{title, views, type, url}
 *      + comment {palyer{}, game_title, rate, date, text}
 *      + leaderboard : records {player{}, level, score, displacement}
 *      + toturial {name, date, image, game_title}
 */