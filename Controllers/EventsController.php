<?php

namespace Controllers;

use Core\Controller;
use Models\Users;
use Models\Event;
use Core\Core;


class EventsController extends Controller
{
    public function action_index()
    {
        $events = Event::get_events();
        $this->template->set_param('events', $events);
        
        return $this->render();
    }

    public function action_show($params){
        $event = Event::find_by_id($params[0]);

        if (empty($event)) {
            return $this->redirect('/events');
        }
        $this->template->set_param('event', $event);
        
        return $this->render();
    }

    public function action_add()
    {
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        if ($this->is_post) {
            $title = $this->post->title;
            $date = $this->post->date;
            $time = $this->post->time;
            $place = $this->post->place;
            $description = $this->post->description;
            $price = $this->post->price;
            $image = $this->post->image;
            $isShow = $this->post->isShow??0;

            if (empty($title)) {
                $this->add_error_massege('Введіть назву події');
            }
            if (empty($date)) {
                $this->add_error_massege('Введіть дату події');
            }
            if (empty($time)) {
                $this->add_error_massege('Введіть час події');
            }
            if (empty($place)) {
                $this->add_error_massege('Введіть місце проведення події');
            }
            if (empty($description)) {
                $this->add_error_massege('Введіть опис події');
            }
            if (!is_numeric($price)) {
                $this->add_error_massege('Введіть ціну події');
            }
            if (empty($image)) {
                $this->add_error_massege('Виберіть зображення події');
            }
            if (!$this->is_error_massage_exist()) {
                Event::add_event($title, $date, $time, $place, $description, $price, $image, $isShow);
                return $this->redirect('/admin/events');
            }
        }
        return $this->render();

    }

    public  function action_edit($params){
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        $event = Event::find_by_id($params[0]);

        if (empty($event)) {
            return $this->redirect('/events');
        }

        if ($this->is_post) {
            $event_name = $this->post->event_name;
            $event_date = $this->post->event_date;
            $event_time = $this->post->event_time;
            $event_place = $this->post->event_place;
            $event_description = $this->post->event_description;

            if (empty($event_name)) {
                $this->add_error_massege('Введіть назву події');
            }
            if (empty($event_date)) {
                $this->add_error_massege('Введіть дату події');
            }
            if (empty($event_time)) {
                $this->add_error_massege('Введіть час події');
            }
            if (empty($event_place)) {
                $this->add_error_massege('Введіть місце проведення події');
            }
            if (empty($event_description)) {
                $this->add_error_massege('Введіть опис події');
            }
            if (!$this->is_error_massage_exist()) {
                Event::edit_event($event["id"], $event_name, $event_date, $event_time, $event_place, $event_description);
                return $this->redirect('/events');
            }
        }

        $this->template->set_param('event', $event);
        return $this->render();
    }

    public function action_delete($params){
        if (!Users::is_user_admin()) {
            return $this->redirect('/');
        }

        $event = Event::find_by_id($params[0]);

        if (empty($event)) {
            return $this->redirect('/events');
        }

        Event::delete_event($event["id"]);
        return $this->redirect('/events');
    }
}
?>