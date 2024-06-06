<?php

namespace Controllers;

use Core\Controller;
use Models\Users;
use Core\Core;

class CartController extends Controller
{
    public function action_index()
    {
        return $this->render();
    }

    public function action_add()
    {
        if ($this->is_post) {
            $product_id = $this->post->product_id;
            $quantity = $this->post->quantity;

            if (empty($product_id)) {
                $this->add_error_massege('Виберіть товар');
            }
            if (empty($quantity)) {
                $this->add_error_massege('Введіть кількість');
            }
            if (!$this->is_error_massage_exist()) {
                $cart = Core::get()->session->get('cart');
                if (empty($cart)) {
                    $cart = [];
                }
                if (empty($cart[$product_id])) {
                    $cart[$product_id] = 0;
                }
                $cart[$product_id] += $quantity;
                Core::get()->session->set('cart', $cart);
                Core::get()->template->set_param('products', $cart);

                return $this->redirect('/cart');
            }
        }
        return $this->redirect('/');
    }

    public function action_remove()
    {
        if ($this->is_post) {
            $product_id = $this->post->product_id;
            $quantity = $this->post->quantity;

            if (empty($product_id)) {
                $this->add_error_massege('Виберіть товар');
            }
            if (empty($quantity)) {
                $this->add_error_massege('Введіть кількість');
            }
            if (!$this->is_error_massage_exist()) {
                $cart = Core::get()->session->get('cart');
                if (empty($cart)) {
                    $cart = [];
                }
                if (!empty($cart[$product_id])) {
                    $cart[$product_id] -= $quantity;
                    if ($cart[$product_id] <= 0) {
                        unset($cart[$product_id]);
                    }
                }
                Core::get()->session->set('cart', $cart);
                return $this->redirect('/cart');
            }
        }
        return $this->redirect('/');
    }
}