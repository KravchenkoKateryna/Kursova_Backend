<?php
$this->title = "Букети";
?>


<div class="container">
  <h1>Букети</h1>
  <?php foreach ($bouquets as $bouquet) : ?>
  <div class="row">
    <div class="col-12">
      <div class="card" style="width: 18rem;">
        <img src="<?=  explode(',', $bouquet['images'])[0] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $bouquet['title'] ?></h5>
          <p class="card-text">
            <?= strlen($bouquet['description']) > 64 ? substr($bouquet['description'], 0, 64) . '...' : $bouquet['description'] ?>
          </p>
          <p class="card-text"><?= $bouquet['price'] ?> грн</p>
          <a href="/items/bouquets/<?= $bouquet['id'] ?>" class="btn btn-primary">Детальніше</a>
          <a href="/cart/add/<?= $bouquet['id'] ?>" class="btn btn-success">Купити</a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>