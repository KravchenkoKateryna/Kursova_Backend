<?php

namespace Models;

use Core\Model;
use Core\Core;

/**
 * @property int $id ID
 * @property string $title Назва 
 * @property string $description Опис 
 * @property string $date Дата
 * @property string $time Час
 * @property string $place Місце проведення
 * @property string $price Ціна
 * @property string $image Шлях до зображення
 * @property bit $isShow Чи показувати на сайті
 */

class Event extends Model
{
    public static $table_name = 'event';

    public static function get_events()
    {
        return self::find_all();
    }

    public static function add_event($event_name, $event_date, $event_time, $event_place, $event_description)
    {
        $event = new Event();
        $event->title = $event_name;
        $event->date = $event_date;
        $event->time = $event_time;
        $event->place = $event_place;
        $event->description = $event_description;
        $event->isShow = 1;
        $event->save();
    }

    public static function edit_event($id, $event_name, $event_date, $event_time, $event_place, $event_description)
    {
        $event = self::get_event_by_id($id);
        if (!empty($event)) {
            $event->title = $event_name;
            $event->date = $event_date;
            $event->time = $event_time;
            $event->place = $event_place;
            $event->description = $event_description;
            $event->save();
        }
    }

    public static function delete_event($id)
    {
        $event = self::get_event_by_id($id);
        if (!empty($event)) {
            $event->delete();
        }
    }

    public static function change_show_event($id)
    {
        $event = self::get_event_by_id($id);
        if (!empty($event)) {
            $event->isShow = !$event->isShow;
            $event->save();
        }
    }
}

?>