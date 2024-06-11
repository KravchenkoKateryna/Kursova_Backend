<?php
$this->title = "Додати подію";

?>
<div class="container mt-5">
  <h1>Додати подію</h1>
  <div class="row">
    <div class="col-md-6">
      <form action="/events/add" method="post">
        <div class="form-group">
          <label for="title">Назва</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
          <label for="description">Опис</label>
          <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
          <label for="date">Дата</label>
          <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
          <label for="time">Час</label>
          <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="form-group">
          <label for="place">Місце</label>
          <input type="text" class="form-control" id="place" name="place" required>
        </div>
        <div class="form-group">
          <label for="price">Ціна</label>
          <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
          <label for="image">Зображення</label>
          <input type="text" class="form-control" id="image" name="image" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Додати</button>
      </form>
    </div>
  </div>
</div>