<?php
  $this->title = 'Кошик';
?>

<div class="container">
  <h1>Кошик</h1>
  <div class="cart">
    <?php if (empty($products)): ?>
    <p>Кошик порожній</p>
    <?php else: ?>
    <div class="cart-table">
      <div class="cart-table-header">
        <div class="cart-table-header__product">Товар</div>
        <div class="cart-table-header__quantity">Кількість</div>
        <div class="cart-table-header__price">Ціна</div>
        <div class="cart-table-header__total">Всього</div>
      </div>
      <?php foreach ($products as $product): ?>
      <div class="cart-table-row">
        <div class="cart-table-row__product">
          <a href="/product/<?php echo $product->id; ?>">
            <img src="<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>">
            <?php echo $product->name; ?>
          </a>
        </div>
        <div class="cart-table-row__quantity">
          <form action="/cart/add" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
            <input type="number" name="quantity" value="<?php echo $cart[$product->id]; ?>" min="1">
            <button type="submit">Оновити</button>
          </form>
          <form action="/cart/remove" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
            <input type="number" name="quantity" value="<?php echo $cart[$product->id]; ?>" min="1">
            <button type="submit">Видалити</button>
          </form>
        </div>
        <div class="cart-table-row__price"><?php echo $product->price; ?> грн</div>
        <div class="cart-table-row__total"><?php echo $product->price * $cart[$product->id]; ?> грн</div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="cart-total">
      <div class="cart-total__text">Загальна сума:</div>
      <div class="cart-total__price"><?php echo $total; ?> грн</div>
    </div>
    <div class="cart-buttons">
      <a href="/cart/checkout" class="cart-buttons__checkout">Оформити замовлення</a>
      <a href="/cart/clear" class="cart-buttons__clear">Очистити кошик</a>
    </div>
    <?php endif; ?>
  </div>
</div>