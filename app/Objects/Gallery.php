<?php
namespace App\Objects;

use App\Response;

class Gallery
{
    private $resources;

    public function __construct($resources)
    {
        $this->resources = $resources;
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
        return $this->getJSONArray();
    }

    public function getJSONArray() {
        $obj = array();
        if ($this->resources) {
            $obj['image'] = array();
            $obj['video'] = array();
            foreach ($this->resources as $resource) {
                $item = array();
                if ($resource->getType() == 0) {
                    $item['title'] = $resource->getTitle();
                    $item['views'] = $resource->getViews();
                    $item['url'] = $resource->getUrl();
                    $obj['image'][] = $item;
                }
                else if ($resource->getType() == 1) {
                    $item['title'] = $resource->getTitle();
                    $item['views'] = $resource->getViews();
                    $item['url'] = $resource->getUrl();
                    $obj['video'][] = $item;
                }
            }
        }

        return array('gallery' => $obj);
    }
}