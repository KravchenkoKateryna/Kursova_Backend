<?php
  $this->title = 'Замовлення';

  /** @var array $order */

?>

<div class="container">
  <h1>Замовлення №<?= $order['id'] ?></h1>
  <p>Дата: <?= $order['date'] ?></p>
  <p>Статус: <?= $order['status'] ?></p>
  <p>Сума: <?= $order['totalPrice'] ?> грн</p>
  <p>Ім'я: <?= $order['delivery_info']['firstName'] ?></p>
  <p>Телефон: <?= $order['delivery_info']['phone'] ?></p>
  <p>Адреса: <?= $order['delivery_info']['address'] ?></p>
  <p>Коментар: <?= $order['delivery_info']['comment'] ?></p>
  <p>Товари:</p>
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
      <?php  foreach ($order['Items'] as $product) : ?>
      <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['title'] ?></td>
        <td><?= $product['price'] ?> грн</td>
        <td><?= $product['amount'] ?></td>
        <td><?= $product['price'] * $product['amount'] ?> грн</td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>