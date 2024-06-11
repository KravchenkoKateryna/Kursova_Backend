<?php
    $this->title = "Панель адміністратора - Замовлення";
    
    /** @var array $orders */
?>

<div class="container">
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
            <a href="/admin/order/<?= $order['id'] ?>" class="btn btn-primary">Детальніше</a>
            <a href="/admin/deleteOrder/<?= $order['id'] ?>" class="btn btn-danger">Видалити</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>
</div>