<?php

namespace Controllers;

use Core\Core;
use Core\Template;
use Core\Controller;

class ReviewController extends Controller
{
    public function action_index()
    {
        $reviews = \Models\Reviews::find_all();

        if (isset($reviews)) {
            for ($i = 0; $i < count($reviews); $i++) {
                $user = \Models\Users::find_by_id($reviews[$i]["userId"])["firstName"];
                $reviews[$i]["user"] = $user;
            }
        }

        $this->template->set_param("reviews", $reviews);
        $this->template->set_param("isAdmin", \Models\Users::is_user_admin());
        
        return $this->render();
    }

    public function action_submit()
    {
        if ($this->is_post) {
            $review = new \Models\Reviews();
            $review->userId = Core::get()->session->get('user')['id'];
            $review->comment = $this->post->comment;
            var_dump($this->post->rating);
            $review->rating = $this->post->rating;
            $review->date = date('Y-m-d H:i:s');
            $review->save();
        }

        return $this->redirect('/review');
    }

    public function action_delete($params)
    {
        if (\Models\Users::is_user_admin()) {
            \Models\Reviews::delete_by_id($params[0]);
        }

        return $this->redirect('/review');
    }
}