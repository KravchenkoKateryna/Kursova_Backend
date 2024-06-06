<?php

namespace Models;

use Core\Model;
use Core\Core;

/**
 * @property int $id ID користувача
 * @property string $login Логін користувача
 * @property string $password Пароль користувача
 * @property string $firstname Ім'я користувача
 * @property string $lastname Прізвище користувача
 * @property string $phone Телефон користувача
 * @property bit $isAdmin Чи є користувач адміном
 */

class Users extends Model
{
    public static $table_name = 'users';

    public static function find_by_login_password($login, $password)
    {
        $rows = self::find_by_condition(['login' => $login, 'password' => $password]);
        if (!empty($rows)) {
            return $rows[0];
        } else
            return null;
    }

    public static function find_by_login($login)
    {
        $rows = self::find_by_condition(['login' => $login]);
        if (!empty($rows)) {
            return $rows[0];
        } else
            return null;
    }

    public static function is_user_logged()
    {
        return !empty(Core::get()->session->get('user'));
    }

    public static function is_user_admin()
    {
        $user = Core::get()->session->get('user');

        if (!empty($user)) {
            return $user["isAdmin"] == 1;
        } else {
            return false;
        }
    }

    public static function login_user($user)
    {
        Core::get()->session->set('user', $user);
    }

    public static function logout_user()
    {
        Core::get()->session->remove('user');
    }

    public static function register_user($login, $password, $firstname, $lastname, $phone)
    {
        $user = new Users();
        $user->login = $login;
        $user->password = $password;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->phone = $phone;
        $user->isAdmin = false;
        $user->save();
    }

    public static function edit_user($id, $login, $password, $firstname, $lastname, $phone, $isAdmin)
    {
        $user_obj = new Users();
        $user = $user_obj->find_by_id($id);
        $user["login"] = $login ?? $user["login"];
        $user["Password"] = $password ?? $user["Password"];
        $user["firstName"] = $firstname ?? $user["firstName"];
        $user["lastName"] = $lastname ?? $user["lastName"];
        $user["phone"] = $phone ?? $user["phone"];
        $user["isAdmin"] = $isAdmin ?? $user["isAdmin"];
        $user_obj->set_fields_array($user);

        $user_obj->save();
    }
}