<?php
 $this->title = 'Оформлення замовлення';
?>

<div class="container">
  <h1>Оформлення замовлення</h1>
  <form action="/cart/details" method="post">
    <div class="form-group">
      <label for="firstName">Ім'я</label>
      <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $user["firstName"] ?>">
    </div>
    <div class="form-group">
      <label for="lastName">Прізвище</label>
      <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $user["lastName"] ?>">
    </div>
    <div class="form-group">
      <label for="phone">Телефон</label>
      <input type="text" class="form-control" id="phone" name="phone" value="<?= $user["phone"] ?>">
    </div>
    <div class="form-group">
      <label for="login">Email</label>
      <input type="email" class="form-control" id="login" name="login" value="<?= $user["login"] ?>">
    </div>
    <div class="form-group">
      <label for="address">Адреса</label>
      <input type="text" class="form-control" id="address" name="address" value="">
    </div>

    <div class="form-group">
      <label for="comment">Коментар</label>
      <textarea class="form-control" id="comment" name="comment"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Оформити замовлення</button>
  </form>
</div>