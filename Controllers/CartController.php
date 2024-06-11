<?php

namespace Controllers;

use Core\Core;
use Core\Controller;
use Models\Users;
use Models\Items;
use Models\Orders;

class CartController extends Controller
{
    public function action_index()
    {
        $cart = Core::get()->session->get('cart');
        $products = [];
        if (!empty($cart)) {
            foreach ($cart as $product_id => $quantity) {
                $products[] = Items::find_by_id($product_id);
            }
        }else{
            $products = [];
        }

        $total_price = 0;
        foreach ($products as $product) {
            $total_price += $product["price"] * $cart[$product["id"]];
        }
        
        $this->template->set_param('products', $products);
        $this->template->set_param('cart', $cart);
        $this->template->set_param('total', $total_price);

        return $this->render();
    }

    public function action_add($params)
    {
        if ($this->is_post) {
            $product_id = $params[0];
            
            $cart = Core::get()->session->get('cart');
            if (empty($cart)) {
                $cart = [];
            }
            if (empty($cart[$product_id])) {
                $cart[$product_id] = 0;
            }

            $cart[$product_id] += 1;
            Core::get()->session->set('cart', $cart);
        }

        return (['status' => 'ok']);
    }

    public function action_remove($params)
    {
        if ($this->is_post) {
            $product_id = $params[0];
            $cart = Core::get()->session->get('cart');
            
            if (empty($cart)) {
                $cart = [];
            }
            if (empty($cart[$product_id])) {
                $cart[$product_id] = 0;
            }
            if ($cart[$product_id] > 0) {
                $cart[$product_id] -= 1;
                if ($cart[$product_id] == 0) {
                    unset($cart[$product_id]);
                }
            }

            Core::get()->session->set('cart', $cart);
        }

        return (['status' => 'ok']);
    }

    public function action_delete($params)
    {
        if ($this->is_post) {
            $product_id = $params[0];
            $cart = Core::get()->session->get('cart');
            if (empty($cart)) {
                $cart = [];
            }
            if (isset($cart[$product_id])) {
                unset($cart[$product_id]);
            }
            Core::get()->session->set('cart', $cart);
        }

        return (['status' => 'ok']);
    }

    public function action_clear()
    {
        Core::get()->session->set('cart', []);
        
        return $this->redirect('/cart');
    }

    public function action_order()
    {
        $this->template->set_param('user', Core::get()->session->get('user'));

        return $this->render();    
    }

    public function action_details()
    {
        $cart = Core::get()->session->get('cart');
        $products = [];
        if (!empty($cart)) {
            foreach ($cart as $product_id => $quantity) {
                $products[] = Items::find_by_id($product_id);
            }
        }else{
            $products = [];
        }

        $total_price = 0;
        foreach ($products as $product) {
            $total_price += $product["price"] * $cart[$product["id"]];
        }
        
        $this->template->set_param('products', $products);
        $this->template->set_param('cart', $cart);
        $this->template->set_param('total', $total_price);
        
        $delivery_info = [
            'firstName' => $this->post->firstName,
            'lastName' => $this->post->lastName,
            'phone' => $this->post->phone,
            'login' => $this->post->login,
            'address' => $this->post->address,
            'comment' => $this->post->comment,
        ];

        $this->template->set_param('delivery_info', $delivery_info);
        Core::get()->session->set('delivery_info', $delivery_info);

        return $this->render();
    }

    public function action_submit()
    {
        $cart = Core::get()->session->get('cart');
        
        $products = [];
        if (!empty($cart)) {
            foreach ($cart as $product_id => $quantity) {
                $products[$product_id] = Items::find_by_id($product_id);
                $products[$product_id]["amount"] = $cart[$product_id];
            }
        }else{
            $products = [];
        }

        $total_price = 0;
        foreach ($products as $product) {
            $total_price += $product["price"] * $product["amount"];
        }

        $delivery_info = Core::get()->session->get('delivery_info');
        $user = Core::get()->session->get('user');
        
        $order = [
            'user_id' => $user['id'],
            'total_price' => $total_price,
            'statusId' => '1',
            'delivery_info' => json_encode($delivery_info),
            'items' => json_encode($products),
            'comment' => $delivery_info['comment'],
            'address' => $delivery_info['address'],
            'date' => date('Y-m-d H:i:s'),
        ];
        
        $order_id = Orders::create($order);
        Core::get()->session->set('cart', []);
        $this->template->set_template_file_path('Views/Cart/success.php');

        return $this->render();
    }

    public static function get_cart_count()
    {
        $cart = Core::get()->session->get('cart');
        $count = 0;
        if (!empty($cart)) {
            foreach ($cart as $product_id => $quantity) {
                $count += $quantity;
            }
        }

        return $count;
    }

    
}