<?php
namespace App\Objects;

use App\Models\Category as GameModel;
use App\Response;

class Category
{
    private $categories;

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    public function sendJSON() {
        $response = new Response($this->getJSONArray());
        $response->sendResponseAsJson();
    }

    public function sendXML() {
        $response = new Response(array('categories' => $this->getXMLArray()));
        $response->sendResponseAsXML();
    }


    public function getXMLArray() {
        $obj = array();

        foreach ($this->categories as $category) {
            $obj[] = $category->getName();
        }

        return array('category' => $obj);
    }

    public function getJSONArray() {
        $obj = array();

        foreach ($this->categories as $category) {
            $obj[] = $category->getName();
        }

        return $obj;
    }
}