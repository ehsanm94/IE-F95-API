<?php
namespace App\Models;

use Zardak\Model;

class Category extends Model
{
    private static $table = 'categories';

    public static function getCategories($game_id){
        return Model::queryOn('games_categories, categories')
            ->constraint('categories.id', 'games_categories.category_id')
            ->where('games_categories.game_id', $game_id)
            ->get('categories.id as id, categories.name as name');
    }

    public static function getAll()
    {
        return Model::queryOn(self::$table)
            ->get();
    }
}