<?php
$this->title = "Історія замовлень";

?>

<div class="container">
  <h1>Історія замовлень</h1>

  <?php if (empty($orders)) : ?>
  <p>Історія замовлень порожня</p>
  <?php else : ?>
  <div class="orders">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Дата</th>
          <th scope="col">Статус</th>
          <th scope="col">Сума</th>
          <th scope="col">Дії</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $order) : ?>
        <tr>
          <td><?= $order['id'] ?></td>
          <td><?= $order['date'] ?></td>
          <td><?= $order['status'] ?></td>
          <td><?= $order['totalPrice'] ?> грн</td>
          <td>
            <a href="/users/order/<?= $order['id'] ?>" class="btn btn-primary">Детальніше</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>
</div>