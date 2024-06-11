<?php
  $this->title = 'Кошик';
?>

<script src="/js/cart.js"></script>

<div class="container">
  <h1>Кошик</h1>
  <div class="cart">
    <?php if (empty($products)): ?>
    <p>Кошик порожній</p>
    <?php else: ?>
    <div class="cart-table">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Товар</th>
            <th scope="col">Кількість</th>
            <th scope="col">Ціна</th>
            <th scope="col">Всього</th>
            <th scope="col">Дії</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
          <tr>
            <td><?= $product['title'] ?></td>
            <td id="amount<?=$product['id']?>"><?= $cart[$product['id']] ?></td>
            <td><?= $product['price'] ?> грн</td>
            <td><?= $cart[$product['id']] * $product['price'] ?> грн</td>
            <td>

              <!-- +1 -->
              <a onclick="addToCart(<?= $product['id'] ?>)" class="btn btn-primary">+</a>
              <!-- -1 -->
              <a onClick="removeFromCart(<?= $product['id'] ?>)" class="btn btn-primary">-</a>
              <!-- Delete -->
              <a onClick="deleteFromCart(<?= $product['id'] ?>)" class="btn btn-danger">Видалити</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="total">
        <p>Загальна сума: <?= $total ?> грн</p>
        <a href="/cart/order" class="btn btn-primary">Оформити замовлення</a>
        <a href="/cart/clear" class="btn btn-danger">Очистити кошик</a>
      </div>
    </div>
    <?php endif; ?>

  </div>
</div>