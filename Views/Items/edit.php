<?php
  $this->title = "Панель адміністратора - Товари";
?>

<div class="container">
  <h1>Відредагувати товар</h1>


  <div class="row">
    <div class="col-12">
      <form action="/items/edit/<?= $item['id'] ?>" method="post">
        <div class="mb-3">
          <label for="title" class="form-label">Назва</label>
          <input type="text" class="form-control" id="title" name="title" value="<?= $item['title'] ?>">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Опис</label>
          <textarea class="form-control" id="description" name="description"
            rows="3"><?= $item['description'] ?></textarea>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Категорія</label>
          <select class="form-select" id="category" name="category">
            <?php foreach ($categories as $category) : ?>
            <option value="<?= $category['id'] ?>"
              <?php if ($category['id'] == $item['category_id']) echo 'selected'; ?>>
              <?= $category['title'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Ціна</label>
          <input type="text" class="form-control" id="price" name="price" value="<?= $item['price'] ?>">
        </div>
        <div class="mb-3">
          <label for="images" class="form-label">Зображення</label>
          <input type="text" class="form-control" id="images" name="images" value="<?= $item['images'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </div>
  </div>
</div>