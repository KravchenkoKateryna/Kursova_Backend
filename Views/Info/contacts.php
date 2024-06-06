<?php

use Core\Config;

$this->title = 'Контакти';
?>

<div class="container">
  <h1>Контакти</h1>
  <div class="row mt-5">
    <div class="col-md-3 text-center">
      <img src="/images/contacts.png" alt="Контакти" class="card-img-top" style="height: 200px; width: 200px;">
    </div>
    <div class="col-md-9">
      <p>Наші контакти:</p>
      <p>Телефон: <?php echo Config::get()->phone; ?></p>
      <p>Адреса: <?php echo Config::get()->adress; ?></p>
      <p>Email: <?php echo Config::get()->adminEmail; ?></p>
    </div>
  </div>
</div>