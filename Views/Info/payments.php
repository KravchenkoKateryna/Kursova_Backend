<?php

use Core\Config;  

$this->title = 'Оплата';
?>

<div class="container">
  <h1>Оплата</h1>

  <div class="row mt-5">
    <div class="col-md-3 text-center">
      <img src="/images/payments.png" alt="Оплата" class="card-img-top" style="height: 200px; width: 200px;">
    </div>
    <div class="col-md-9">
      <p>Оплата можлива на карту Приватбанку.</p>
      <p>Номер карти: 1234 5678 1234 5678</p>
      <p>Призначення платежу: Оплата за квіти</p>
      <p>Після оплати зв'яжіться з нами для уточнення деталей доставки.</p>

      <p>Телефон: <?php echo Config::get()->phone; ?></p>
    </div>
  </div>
</div>