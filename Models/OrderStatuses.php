<?php

namespace Models;

use Core\Model;

/**
 * @property int $id ID
 * @property string $status Назва
 */
    
class OrderStatuses extends Model
{
    public static $table_name = 'orderstatuses';

    public static function get_status($id)
    {
        return self::find_by_condition(['id' => $id]);
    }
}