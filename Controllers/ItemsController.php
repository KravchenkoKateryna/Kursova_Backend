<?php

namespace Controllers;

use Core\Controller;
use Models\Users;
use Core\Core;
use Models\Items;
use Models\Categories;

class ItemsController extends Controller 
{
  public function action_index()
  {
    return $this->render();
  }

  public function action_flowers()
  {
    return $this->render();
  }

  public function action_bouquets($params = [])
  {
    if (isset($params[0])) {
      $item = Items::get_item_by_id($params[0]);
      $this->template->set_param('item', $item);
      $this->template->set_param('title', $item['title']);
      $this->template->set_template_file_path("Views/Items/item.php");

      return $this->render();
    }
    
    $items = Items::get_items_by_category(Categories::GetCategoryId('Букети'));
    $this->template->set_param('bouquets', $items);
    
    
    return $this->render();
  }

  public function action_add(){
    if (!Users::is_user_admin()) {
      return $this->redirect('/');
    }

    if ($this->is_post) {
      $title = $this->post->title;
      $description = $this->post->description;
      $category = $this->post->category;
      $price = $this->post->price;
      $image = $this->post->image;

      // copy images to the server
      $image = Core::get()->upload_image($image);
            
      $item = new Items();
      $item->title = $title;
      $item->description = $description;
      $item->categoryId = $category;
      $item->price = $price;
      $item->images = $image;
      $item->save();

      return $this->redirect('/admin/products');
    }

    $categories = Categories::find_all();
    $this->template->set_param('categories', $categories);

    return $this->render();
  }
}