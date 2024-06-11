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
    $sort = 'id';
    $price_low = 0;
    $price_high = 1000000;
    
    if ($this->is_post){
      $sort = $this->post->sort ?? 'id';
      $price_low = $this->post->price_low ?? 0;
      $price_high = $this->post->price_high ?? 1000000;
    }



    $items = Items::get_items_by_category(Categories::GetCategoryId('Квіти'), $sort, ['price' => [$price_low, $price_high]]);
  
    $this->template->set_param('items', $items);
    $this->template->set_template_file_path('Views/Items/items.php');
    $this->template->set_param('title', 'Квіти');
    
    return $this->render();
  }

  public function action_item($params){
    $item = Items::get_item_by_id($params[0]);
    $this->template->set_param('item', $item);
    $this->template->set_param('title', $item['title']);

    return $this->render();
  }

  public function action_bouquets($params = [])
  {
    $sort = 'id';
    $price_low = 0;
    $price_high = 1000000;
    
    if ($this->is_post){
      $sort = $this->post->sort ?? 'id';
      $price_low = $this->post->price_low ?? 0;
      $price_high = $this->post->price_high ?? 1000000;
    }

    $items = Items::get_items_by_category(Categories::GetCategoryId('Букети'), $sort, ['price' => [$price_low, $price_high]]);
  
    $this->template->set_param('items', $items);
    $this->template->set_template_file_path('Views/Items/items.php');
    $this->template->set_param('title', 'Букети');
    
    return $this->render();
  }

  public function action_gifts($params = [])
  {
    $sort = 'id';
    $price_low = 0;
    $price_high = 1000000;
    
    if ($this->is_post){
      $sort = $this->post->sort ?? 'id';
      $price_low = $this->post->price_low ?? 0;
      $price_high = $this->post->price_high ?? 1000000;
    }



    $items = Items::get_items_by_category(Categories::GetCategoryId('Подарунки'), $sort, ['price' => [$price_low, $price_high]]);
  
    $this->template->set_param('items', $items);
    $this->template->set_template_file_path('Views/Items/items.php');
    $this->template->set_param('title', 'Подарунки');
    
    return $this->render();
  }
  
  public function action_accessories($params = [])
  {
    $sort = 'id';
    $price_low = 0;
    $price_high = 1000000;
    
    if ($this->is_post){
      $sort = $this->post->sort ?? 'id';
      $price_low = $this->post->price_low ?? 0;
      $price_high = $this->post->price_high ?? 1000000;
    }



    $items = Items::get_items_by_category(Categories::GetCategoryId('Аксесуари'), $sort, ['price' => [$price_low, $price_high]]);
  
    $this->template->set_param('items', $items);
    $this->template->set_template_file_path('Views/Items/items.php');
    $this->template->set_param('title', 'Аксесуари');
    
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
            
      $item = new Items();
      $item->title = $title;
      $item->description = $description;
      $item->category_id = $category;
      $item->price = $price;
      $item->images = $image;
      $item->save();

      return $this->redirect('/admin/products');
    }

    $categories = Categories::find_all();
    $this->template->set_param('categories', $categories);

    return $this->render();
  }

  public function action_search(){
    $search = $this->post->query;
    
    $items = Items::search_by_title($search);
    $this->template->set_param('items', $items);
    $this->template->set_template_file_path('Views/Items/items.php');
    $this->template->set_param('title', 'Результати пошуку');
    $this->template->set_param('search', true);
    
    return $this->render();
  }

  public function action_delete($params){
    if (!Users::is_user_admin()) {
      return $this->redirect('/');
    }

    Items::delete_by_condition(['id' => $params[0]]);
    return $this->redirect('/admin/products');
  }

  public function action_edit($params){
    if (!Users::is_user_admin()) {
      return $this->redirect('/');
    }

    $item = Items::get_item_by_id($params[0]);
    $categories = Categories::find_all();
    $this->template->set_param('categories', $categories);
    $this->template->set_param('item', $item);

    if ($this->is_post) {
      $title = $this->post->title;
      $description = $this->post->description;
      $category = $this->post->category;
      $price = $this->post->price;
      $images = $this->post->images;
            
      $item = new Items();
      $item->id = $params[0];
      $item->title = $title;
      $item->description = $description;
      $item->category_id = $category;
      $item->price = $price;
      $item->images = $images;
      $item->save(false);

      return $this->redirect('/admin/products');
    }

    return $this->render();
  }
}