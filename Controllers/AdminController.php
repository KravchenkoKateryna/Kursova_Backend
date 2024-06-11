<?php

namespace Controllers;


use Core\Core;
use Core\Controller;
use Models\Users;
use Models\Items;
use Models\Categories;
use Models\Event;
use Models\Orders;
use Models\OrderStatuses;

class AdminController extends Controller
{
    public function action_index()
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        $users = Users::find_all();
        $users_count = count($users);

        $products = Items::find_all();
        $products_count = count($products);

        $events = Event::get_events();
        $events_count = count($events);

        $orders = Orders::get_all();
        $orders_count = count($orders);

        $this->template->set_param('users_count', $users_count);
        $this->template->set_param('products_count', $products_count);
        $this->template->set_param('events_count', $events_count);
        $this->template->set_param('orders_count', $orders_count);

        return $this->render();
    }

    public function action_users()
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        $users = Users::find_all();
        $this->template->set_param('users', $users);
        
        return $this->render();
    }

    public function action_products()
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        $products = Items::find_all();
        $this->template->set_param('products', $products);
        
        return $this->render();
    }

    public function action_events()
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        $events = Event::get_events();

        $this->template->set_param('events', $events);

        return $this->render();
    }

    public function action_orders()
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        $orders = Orders::get_all();
        $this->template->set_param('orders', $orders);
        
        return $this->render();
    }

    public function action_order ($params)
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        $order = Orders::find_order_by_id($params[0]);
        
        if (empty($order)) {
            return $this->redirect('/admin/orders');
        } 

        if($this->is_post) {
            $post_data = $this->post->get_all();
            $order['statusId'] = $post_data['status'];
            $order['address'] = $post_data['address'];
            $order['delivery_info']['firstName'] = $post_data['name'];
            $order['delivery_info']['phone'] = $post_data['phone'];
            
            Orders::edit_order(
                $order['id'],
                $order['statusId'],
                $order['address'],
                $order['delivery_info'],
                $order['comment']
            );

            return $this->redirect('/admin/orders');
        }

        $this->template->set_param('order', $order);

        $statuses = OrderStatuses::find_all();
        $this->template->set_param('statuses', $statuses);
        
        return $this->render();
    }

    public function action_deleteOrder($params)
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        Orders::delete_by_id($params[0]);
        return $this->redirect('/admin/orders');
    }
}