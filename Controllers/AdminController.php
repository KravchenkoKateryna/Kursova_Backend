<?php

namespace Controllers;

use Core\Controller;
use Models\Users;
use Core\Core;
use Models\Items;
use Models\Categories;
use Models\Event;

class AdminController extends Controller
{
    public function action_index()
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

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
}