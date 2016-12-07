<?php
namespace App\Objects;

use App\Models\Category as CategoryModel;
use App\Response;

class Game
{
    private $games;

    public function __construct($games)
    {
        $this->games = $games;
    }

    public function sendJSON($single = false) {
        $response_array = $this->getJSONArray();
        if ($single) {
            $response_array['game'] = array_pop($response_array);
        }
        $response_array = $single ? $response_array : array ('games' => $response_array);
        $response = new Response($response_array);
        $response->sendResponseAsJson();
    }

    public function sendXML($single = false) {
        $response_array = $single ? $this->getXMLArray() : array ('games' => $this->getXMLArray());
        $response = new Response($response_array);
        $response->sendResponseAsXML();
    }


    public function getXMLArray() {
        $obj = array();

        if ($this->games) {
            $obj['game'] = array();
            foreach ($this->games as $game) {
                $item = array();

                $item['title']                  = $game->getTitle();
                $item['abstract']               = $game->getAbstract();
                $item['info']                   = $game->getInfo();
                $item['number_of_comments']     = $game->getComments();
                $item['big_image']              = $game->getBigImage();
                $item['small_image']            = $game->getSmallImage();

                $categoryModel = CategoryModel::getCategories($game->getId());
                $categories = new Category($categoryModel);

                $obj['game'][] = array_merge($item, $categories->getXMLArray());
            }
        }
        return $obj;
    }

    public function getJSONArray() {
        $obj = array();

        foreach ($this->games as $game) {
            $item = array();

            $item['title']                = $game->getTitle();
            $item['abstract']             = $game->getAbstract();
            $item['info']                 = $game->getInfo();
            $item['number_of_comments']   = $game->getComments();
            $item['big_image']            = $game->getBigImage();
            $item['small_image']          = $game->getSmallImage();

            $categoryModel = CategoryModel::getCategories($game->getId());
            $categories = new Category($categoryModel);

            $obj[] = array_merge($item, $categories->getJSONArray());
        }

        return $obj;
    }
}