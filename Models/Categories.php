<?php

namespace Models;

use Core\Model;
use Core\Core;

/**
 * @property int $id ID
 * @property string $title Назва 

 */

class Categories extends Model
{
    public static $table_name = 'categories';

    public static function get_category_by_id($id)
    {
        $rows = self::find_by_condition(['id' => $id]);
        if (!empty($rows)) {
            return $rows[0];
        } else
            return null;
    }

    public static function GetCategoryId($title)
    {
        $rows = self::find_by_condition(['title' => $title]);
        if (!empty($rows)) {
            return $rows[0]['id'];
        } else
            return null;
    }
}