<?php

namespace Controllers;

use Core\Template;
use Core\Controller;

class SiteController extends Controller
{
    public function action_index()
    {
        return $this->render();
    }

    public function action_error($code)
    {
        http_response_code($code);
        
        switch ($code) {
            case 404:
                $this->template->set_param('code', $code);
                $this->template->set_param('message', 'Сторінку не знайдено');
                break;
            default:
                $this->template->set_param('code', $code);
                $this->template->set_param('message', 'Помилка');
                break;
        }
        
        return $this->render();
    }
}