<?php

namespace Models;

use Core\Model;
use Core\Core;

/**
 * @property int $id ID
 * @property string $title Назва 
 * @property string $description Опис 
 * @property string $categoryId Категорія
 * @property string $price Ціна
 * @property string[] $images Масив шляхів до зображень
 */

class Items extends Model
{
    public static $table_name = 'items';

    public static function get_items_by_category($category_id)
    {
        return self::find_by_condition(['id' => $category_id]);
    }

    public static function get_item_by_id($id)
    {
        $rows = self::find_by_condition(['id' => $id]);
        if (!empty($rows)) {
            return $rows[0];
        } else
            return null;
    }
    
    public static function find_all()
    {
       $arr = Core::get()->db->select(static::$table_name, '*');
       
        if (count($arr) > 0) {
            foreach ($arr as &$item) {
                $item['category'] = Categories::get_category_by_id($item['id'])['title'];
            }
            
            return $arr;
        } else {
            return null;
        }
    }
}