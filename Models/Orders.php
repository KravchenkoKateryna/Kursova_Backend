<?php

namespace Models;

use Core\Model;

/**
 * @property int $id ID
 * @property string $userId  ID користувача
 * @property string $Items  Товари
 * @property string $totalPrice  Загальна вартість
 * @property string $statusId Статус замовлення
 * @property string $address Адреса доставки
 * @property string $date Дата замовлення
 * @property string $delivery_info Інформація про доставку
 * @property string $comment Коментар
 */
class Orders extends Model
{
    public static $table_name = 'orders';

    public static function get_all()
    {
        $orders = self::find_all();

        for ($i = 0; $i < count($orders); $i++) {
            $orders[$i]["status"] = OrderStatuses::get_status($orders[$i]["statusId"])[0]["status"];
        }
        return $orders;
    }

    public static function create($order){
        $ord = new Orders();
        $ord->userId = $order['user_id'];
        $ord->Items = $order['items'];
        $ord->totalPrice = $order['total_price'];
        $ord->statusId = $order['statusId'];
        $ord->address = $order['address'];
        $ord->date = $order['date'];
        $ord->delivery_info = $order['delivery_info'];
        $ord->comment = $order['comment'];
        $ord->save();
    }

    public static function edit_order($id, $statusId, $address, $delivery_info, $comment)
    {
  
        $order = self::find_by_id($id);
       
        $order["statusId"] = $statusId;
        $order["address"] = $address;
        $order["delivery_info"] = json_encode($delivery_info);
        $order["comment"] = $comment;

        $order_obj = new Orders();
        $order_obj->set_fields_array($order);
        
        $order_obj->save(false);
    }

    public static function find_order_by_id($id)
    {
        $order = self::find_by_id($id);
        if (empty($order)) {
            return null;
        }
        $order["status"] = OrderStatuses::get_status($order["statusId"])[0]["status"];
        $order["Items"] = json_decode($order["Items"], true);
        $order["delivery_info"] = json_decode($order["delivery_info"], true);
        return $order;
    }
}