<?php 
  $this->title = "Додати товар"; 
?>

<div class="container">
  <h1>Додати товар</h1>
  <div class="col-12">
    <form action="/items/add" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Назва</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="description">Опис</label>
        <input type="text" class="form-control" id="description" name="description" required>
      </div>
      <div class="form-group">
        <label for="category">Категорія</label>
        <select class="form-control" id="category" name="category" required>
          <?php foreach ($categories as $category) : ?>
          <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="price">Ціна</label>
        <input type="text" class="form-control" id="price" name="price" required>
      </div>
      <div class="form-group">
        <label for="images">Зображення</label>
        <input type="text" class="form-control" id="image" name="image" required>
      </div>
      <button type="submit" class="btn btn-primary mt-2">Додати</button>
    </form>
  </div>
</div>