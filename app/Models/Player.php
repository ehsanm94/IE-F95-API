<?php
namespace App\Models;

use Zardak\Model;

class Player extends Model
{
    private static $table = 'players';

    public static function getPlayerById($id) {
        return Model::queryOn(self::$table)
            ->where('id', $id)
            ->first()
            ->get();
    }

    public static function getPlayerByName($name) {
        return Model::queryOn(self::$table)
            ->where('name', $name)
            ->first()
            ->get();
    }
}