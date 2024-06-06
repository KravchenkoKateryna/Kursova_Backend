<?php
  $this->title = "Панель адміністратора - Товари";
?>

<div class="container">
  <h1>Товари</h1>

  <div class="row mb-3">
    <div class="col-12">
      <a href="/items/add" class="btn btn-success">Додати товар</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Назва</th>
            <th scope="col">Опис</th>
            <th scope="col">Категорія</th>
            <th scope="col">Ціна</th>
            <th scope="col">Зображення</th>
            <th scope="col">Дії</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($products as $product) : ?>
          <tr>
            <th scope="row"><?= $product['id'] ?></th>
            <td><span style="cursor: pointer;" onclick="editName(<?php echo $product['id'] ?>)"><span
                  id="title<?php echo $product['id'] ?>"><?php echo $product['title']; ?></span>✏️</span>
            <td><span style="cursor: pointer;" onclick="editDescription(<?php echo $product['id'] ?>)"><span
                  id="description<?php echo $product['id'] ?>"><?php echo $product['description']; ?></span>✏️</span>
            <td><span style="cursor: pointer;" onclick="editCategory(<?php echo $product['id'] ?>)"><span
                  id="category<?php echo $product['id'] ?>"><?php echo $product['category']; ?></span>✏️</span>
            <td><span style="cursor: pointer;" onclick="editPrice(<?php echo $product['id'] ?>)"><span
                  id="price<?php echo $product['id'] ?>"><?php echo $product['price']; ?></span>✏️</span>
            <td><span style="cursor: pointer;" onclick="editImage(<?php echo $product['id'] ?>)"><span
                  id="image<?php echo $product['id'] ?>"><?php echo $product['images']; ?></span>✏️</span>
            <td>
              <a href="/products/delete/<?= $product['id'] ?>" class="btn btn-danger">Видалити</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="/js/ProductSetting.js"></script>