<?php
namespace App\Models;

use Zardak\Model;

class Comment extends Model
{
    private static $table = 'comments';

    public static function getLastComments($limit){
    	return Model::queryOn(self::$table)
    		->orderBy('id', 'DESC')
    		->limit($limit)
    		->get();
    }
}