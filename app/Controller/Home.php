<?php
namespace App\Controller;

use Zardak\Controller;
use Zardak\Template;
use \SimpleXMLElement;
use App\Error;
use App\Response;

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
            
            $games = $this->getContentsHome();
            $r = new Response($games);
            if($page == $home_entries[1]) {
                $r->sendResponseAsXML();
            }
            else {
                $r->sendResponseAsJson(); 
            }
        }

        $game_entries = array('games', 'games.xml', 'games.json');
        if (in_array($page, $game_entries)) {
            if (isset($_GET['q']) && !empty($_GET['q'])) {
                
                $games = $this->searchGamesByKeyword($_GET['q']);
                $r = new Response($games);

                if($page == $game_entries[1]) {
                    $r->sendResponseAsXML();
                }
                else {
                    $r->sendResponseAsJson();
                }
            }
            else {
                $this->badRequest($page, 'missed parameter q');
            }
        }
        else {
            $this->badRequest($page);
        }
    }

    public function games($game_title = null, $fragment = null) {
        
        if (!$game_title && !$fragment)
            $this->index('games');

        if ($fragment == 'header.xml' || $fragment == 'header' || $fragment == 'header.json') {
            $r = new Response($games);
            if ($fragment == 'header' || $fragment == 'header.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        if ($fragment == 'info.xml' || $fragment == 'info' || $fragment == 'info.json') {
            $r = new Response($games);
            if ($fragment == 'info' || $fragment == 'info.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        if ($fragment == 'leaderboard.xml' || $fragment == 'leaderboard' || $fragment == 'leaderboard.json') {
            $r = new Response($games);
            if ($fragment == 'leaderboard' || $fragment == 'leaderboard.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        if ($fragment == 'comments.xml' || $fragment == 'comments' || $fragment == 'comments.json') {
            $r = new Response($games);
            if ($fragment == 'comments' || $fragment == 'comments.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        if ($fragment == 'related_games.xml' || $fragment == 'related_games' || $fragment == 'related_games.json') {
            $r = new Response($games);
            if ($fragment == 'related_games' || $fragment == 'related_games.json') {
                $r->sendResponseAsJson();
            }
            else {
                $r->sendResponseAsXML();
            }
        }

        if ($fragment == 'gallery.xml' || $fragment == 'gallery' || $fragment == 'gallery.json') {
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

    private function getContentsHome() {
        return array('a'=> array(1,23,4));
    }

    private function searchGamesByKeyword($keyword) {
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