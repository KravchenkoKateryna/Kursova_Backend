<?php
  $this->title = "Панель адміністратора";
?>

<div class="container">
  <h1>Панель адміністратора</h1>
  <div class="row mb-5 mt-5">
    <div class="col-6">
      <a href="/admin/users" class="btn btn-light"
        style="width: 100%; height:150px; display: flex; align-items: center; justify-content: center;">
        <h3>Користувачі</h3>
      </a>
      <p>Кількість зареєстрованих користувачів: <?= $users_count ?></p>
    </div>

    <div class="col-6">
      <a href="/admin/products" class="btn btn-light"
        style="width: 100%; height:150px; display: flex; align-items: center; justify-content: center;">
        <h3>Товари</h3>
      </a>
      <p>Кількість товарів: <?= $products_count ?></p>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-6">
      <a href="/admin/orders" class="btn btn-light"
        style="width: 100%; height:150px; display: flex; align-items: center; justify-content: center;">
        <h3>Замовлення</h3>
      </a>
      <p>Кількість замовлень: <?= $orders_count ?></p>
    </div>

    <div class="col-6">
      <a href="/admin/events" class="btn btn-light"
        style="width: 100%; height:150px; display: flex; align-items: center; justify-content: center;">
        <h3>Події</h3>
      </a>
      <p>Кількість подій: <?= $events_count ?></p>
    </div>
  </div>

</div>