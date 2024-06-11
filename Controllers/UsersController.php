<?php

namespace Controllers;

use Core\Controller;
use Models\Users;
use Core\Core;
use Models\Orders;

class UsersController extends Controller
{
    public function action_login()
    {
        if (Users::is_user_logged()) {
            return $this->redirect('/');
        }

        if ($this->is_post) {
            $user = Users::find_by_login_password($this->post->login, $this->post->password);
            if (!empty($user)) {
                Users::login_user($user);
                return $this->redirect('/');
            } else {
                $this->add_error_massege('Невірний логін та/або пароль');
            }
        }
        return $this->render();
    }

    public function action_register()
    {
        if (Users::is_user_logged()) {
            return $this->redirect('/');
        }
        
        if ($this->is_post) {
            $user = Users::find_by_login($this->post->login);
            if (!empty($user)) {
                $this->add_error_massege('Користувач з таким логіном вже існує');
            }

            $firstname = $this->post->firstname;
            $lastname = $this->post->lastname;

            if (strlen($this->post->login) === 0) {
                $this->add_error_massege('Введіть логін');
            }
            if (strlen($this->post->password) === 0) {
                $this->add_error_massege('Введіть пароль');
            }
            if ($this->post->password != $this->post->password2) {
                $this->add_error_massege('Паролі не співпадають');
            }
            if (strlen($firstname) === 0) {
                $this->add_error_massege('Введіть ім\'я');
            }
            if (strlen($lastname) === 0) {
                $this->add_error_massege('Введіть прізвище');
            }
            if (!$this->is_error_massage_exist()) {
                Users::register_user(
                    $this->post->login,
                    $this->post->password,
                    $this->post->firstname,
                    $this->post->lastname,
                    $this->post->phone
                );
                return $this->redirect('/users/registersuccess');
            }
        }

        return $this->render();
    }

    public function action_registersuccess()
    {
        if (Users::is_user_logged()) {
            return $this->redirect('/');
        }
        
        return $this->render();
    }

    public function action_logout()
    {
        Users::logout_user();
        Core::get()->session->remove('user');
        Core::get()->session->remove('cart');
        
        return $this->redirect('/users/login');
    }

    public function action_setting(){
        $this->template->set_param('userId', Core::get()->session->get('user')['id']);
        
        return $this->render();
    }

    public function action_saveEdit(){
        $user = Core::get()->session->get('user');

        if (!empty($user)) {
            Users::edit_user(
                $this->post->id,
                $this->post->email,
                $this->post->password,
                $this->post->firstName,
                $this->post->lastName,
                $this->post->phone,
                $this->post->isAdmin
            );
        } 
        Core::get()->session->set('user', Users::find_by_id($user['id']));
        
        return $this->redirect('/users/setting');
    }

    public function action_delete($params)
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        Users::delete_by_id($params[0]);

        return $this->redirect('/admin/users');
    }

    public function action_changeAdminStatus($params){
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }
        $id = $params[0];
        $user = Users::find_by_id($id);

        $user['isAdmin'] = !$user['isAdmin'];
        
        Users::edit_user(
            $user['id'],
            $user['login'],
            "",
            $user['firstName'],
            $user['lastName'],
            $user['phone'],
            $user['isAdmin']
        );

        return $this->redirect('/admin/users');
    }

    public function action_orders(){
        $orders = Users::find_all_orders();
        $this->template->set_param('orders', $orders);
        return $this->render();
    }

    public function action_order($params){
        $order = Orders::find_order_by_id($params[0]);

        if (empty($order)) {
            return $this->redirect('/users/orders');
        }

        if ($order['userId'] != Core::get()->session->get('user')['id']) {
            return $this->redirect('/users/orders');
        }

        $this->template->set_param('order', $order);
        return $this->render();
    }
}