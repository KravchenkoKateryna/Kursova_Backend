<?php
  $this->title = 'Замовлення';

  /** @var array $order */
  /** @var array $statuses */

?>

<div class="container">
  <h1>Замовлення №<?= $order['id'] ?></h1>
  <p>Дата: <?= $order['date'] ?></p>
  <form action="/admin/order/<?= $order['id'] ?>" method="post">
    <div class="form-group">
      <label for="name">Ім'я</label>
      <input type="text" class="form-control" id="name" name="name" value="<?= $order['delivery_info']['firstName'] ?>">

      <label for="phone">Телефон</label>
      <input type="text" class="form-control" id="phone" name="phone" value="<?= $order['delivery_info']['phone'] ?>">

      <label for="address">Адреса</label>
      <input type="text" class="form-control" id="address" name="address"
        value="<?= $order['delivery_info']['address'] ?>">

      <label for="status">Статус</label>
      <select class="form-control" id="status" name="status">
        <?php foreach ($statuses as $status) : ?>
        <option value="<?= $status["id"] ?>" <?= $status["status"] === $order['status'] ? 'selected' : '' ?>>
          <?= $status["status"] ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Зберегти</button>
  </form>
  <p>Сума: <?= $order['totalPrice'] ?> грн</p>
  <p>Коментар: <?= $order['delivery_info']['comment'] ?></p>
  <h2>Товари:</h2>
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
      <?php foreach ($order['Items'] as $product) : ?>
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