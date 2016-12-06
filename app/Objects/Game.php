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

    public function sendJSON() {
        $response = new Response($this->getJSONArray());
        $response->sendResponseAsJson();
    }

    public function sendXML() {
        $response = new Response($this->getXMLArray());
        $response->sendResponseAsXML();
    }


    public function getXMLArray() {
        $obj = array();

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

            $obj[] = array_merge($item, $categories->getXMLArray());
        }
        return array ('game' => $obj);
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