<?php
namespace App\Models;

use Zardak\Model;

class Tutorial extends Model
{
    private static $table = 'tutorials';

    public static function getLastTutorials($limit){
    	return Model::queryOn(self::$table)
    		->orderBy('id', 'DESC')
    		->limit($limit)
    		->get();
    }
}