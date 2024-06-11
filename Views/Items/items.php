<?php
if (!isset($search)) {
    $search = false;
}
?>

<script src="/js/cart.js"></script>

<div class="container">
  <h1><?= $this->title ?></h1>
  <?php if (!empty($items)) : ?>
  <?php if (!$search) : ?>
  <div class="row">
    <div class="col-12">
      <form action="/items/<?php echo \Core\Core::get()->action_name ?>" method="post">
        <div class="row">
          <div class="col-4">
            <div class="input-group mb-3">
              <label for="sort" class="input-group-text">Сортувати за</label>
              <select class="form-select" id="sort" name="sort">
                <option value="id" selected>По замовчуванню</option>
                <option value="price">Ціною</option>
                <option value="title">Назвою</option>
              </select>
            </div>
          </div>
          <div class="col-4">
            <div class="input-group mb-3">
              <label for="price" class="input-group-text">Ціна</label>
              <input type="text" class="form-control" id="price" name="price_low" placeholder="0">
              <input type="text" class="form-control" id="price" name="price_high" placeholder="2000">
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary">Фільтрувати</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php endif; ?>
  <div class="row">
    <?php foreach ($items as $item) : ?>
    <div class=" col-md-4">
      <div class="card shadow-sm h-100">
        <img src="<?= explode(',', $item['images'])[0]; ?>" class="card-img-top" alt="..."
          style="height: 225px;  object-fit: contain;">
        <div class="card-body">
          <p class="card-text"><?= $item['title']; ?></p>
          <p class="card-text"><?= $item['price']; ?> грн</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group" style="margin: auto;">
              <a href="/items/item/<?= $item['id']; ?>" class="btn btn-sm btn-outline-secondary">Детальніше</a>
              <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart"
                onclick="addToCart(<?= $item['id']; ?>)">Додати в кошик</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
  <?php else : ?>
  <h2>Товарів не знайдено</h2>
  <?php endif; ?>
</div>