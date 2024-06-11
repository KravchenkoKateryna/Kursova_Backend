<?php
  $this->title = 'Оформлення замовлення';
?>

<h1 class="text-center">Деталі замовлення</h1>

<div class="container">
  <div class="row">
    <div class="col-4">
      <h2> Контактні дані </h2>
      <ul>
        <li>Ім'я: <?=$delivery_info['firstName']?></li>
        <li>Прізвище: <?=$delivery_info['lastName']?></li>
        <li>Телефон: <?=$delivery_info['phone']?></li>
        <li>Адреса: <?=$delivery_info['address']?></li>
        <li>Email: <?=$delivery_info['login']?></li>
        <li>Дата замовлення: <?=date('Y-m-d H:i:s')?></li>
        <li>Коментар: <?=$delivery_info['comment']?></li>
      </ul>
    </div>
    <div class="col-8">
      <h2> Замовлені товари </h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Назва</th>
            <th scope="col">Ціна</th>
            <th scope="col">Кількість</th>
            <th scope="col">Сума</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($products as $product) : ?>
          <tr>
            <th scope="row"><?= $product['id'] ?></th>
            <td><?php echo $product['title']; ?>
            <td><?php echo $product['price']; ?>
            <td><?php echo $cart[$product['id']]; ?>
            <td><?php echo $product['price'] * $cart[$product['id']]; ?>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <h2> Загальна сума: <?=$total?></h2>
    </div>
    <div class="col-12">
      <a href="/cart/submit/" class="btn btn-primary">Підтвердити замовлення</a>
    </div>
  </div>
</div>