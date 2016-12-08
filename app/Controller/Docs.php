<?php
namespace App\Controller;

use \Zardak\Template;

class Docs
{
    public static function index()
    {
        $views_chain = array(
            'docs',
            'base' => array(
                'resources' => array(
                    'style/css/docs.css',
                ),
                'title' => 'Amirkabir Studio API Documents'
            ),
        );
        $tpl = new Template($views_chain);
        $tpl->render();
        exit();
    }
}