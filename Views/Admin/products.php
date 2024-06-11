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
            <th scope="col" style="width: 30%;">Опис</th>
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
            <!-- TODO -->
            <th scope="row"><?= $product['id'] ?></th>
            <td><span style="cursor: pointer;"><span
                  id="title<?php echo $product['id'] ?>"><?php echo $product['title']; ?>
            <td><span style="cursor: pointer; width: 30%;"><span
                  id="description<?php echo $product['id'] ?>"><?php echo $product['description'] ; ?>
            <td><span style="cursor: pointer;"><span
                  id="category<?php echo $product['id'] ?>"><?php echo $product['category']; ?>
            <td><span style="cursor: pointer;"><span
                  id="price<?php echo $product['id'] ?>"><?php echo $product['price']; ?>
            <td><span style="cursor: pointer;"><img src="<?php echo $product['images']; ?>"
                  style="width: 100px; height: 100px;"> </span></td>
            <td>
              <a href="/items/edit/<?= $product['id'] ?>" class="btn btn-primary mb-2"
                style="width: 100%;">Редагувати</a>
              <a href="/items/delete/<?= $product['id'] ?>" class="btn btn-danger" style="width: 100%;">Видалити</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="/js/ProductSetting.js"></script>