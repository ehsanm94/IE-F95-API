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
        $obj = array();
        if ($this->resources) {
            $obj['images'] = array();
            $obj['videos'] = array();
            $obj['images']['image'] = array();
            $obj['videos']['video'] = array();
            foreach ($this->resources as $resource) {
                $item = array();
                if ($resource->getType() == 0) {
                    $item['title'] = $resource->getTitle();
                    $item['views'] = $resource->getViews();
                    $item['url'] = $resource->getUrl();
                    $obj['images']['image'][] = $item;
                }
                else if ($resource->getType() == 1) {
                    $item['title'] = $resource->getTitle();
                    $item['views'] = $resource->getViews();
                    $item['url'] = $resource->getUrl();
                    $obj['videos']['video'][] = $item;
                }
            }
        }

        return array('gallery' => $obj);
    }

    public function getJSONArray() {
        $obj = array();
        if ($this->resources) {
            $obj['images'] = array();
            $obj['videos'] = array();
            foreach ($this->resources as $resource) {
                $item = array();
                if ($resource->getType() == 0) {
                    $item['title'] = $resource->getTitle();
                    $item['views'] = $resource->getViews();
                    $item['url'] = $resource->getUrl();
                    $obj['images'][] = $item;
                }
                else if ($resource->getType() == 1) {
                    $item['title'] = $resource->getTitle();
                    $item['views'] = $resource->getViews();
                    $item['url'] = $resource->getUrl();
                    $obj['videos'][] = $item;
                }
            }
        }

        return array('gallery' => $obj);
    }
}