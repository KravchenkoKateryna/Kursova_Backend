<?php
$this->title = "Редагування події";
?>

<div class="container">
  <h1>Редагування події</h1>
  <form action="/events/edit/<?= $event["id"]?>" method="post">
    <div class="form-group">
      <label for="event_name">Назва</label>
      <input type="text" class="form-control" id="event_name" name="event_name" value="<?= $event["title"] ?>">
    </div>
    <div class="form-group">
      <label for="event_date">Дата</label>
      <input type="date" class="form-control" id="event_date" name="event_date" value="<?= $event["date"] ?>">
    </div>
    <div class="form-group">
      <label for="event_time">Час</label>
      <input type="time" class="form-control" id="event_time" name="event_time" value="<?= $event["time"] ?>">
    </div>
    <div class="form-group">
      <label for="event_place">Місце проведення</label>
      <input type="text" class="form-control" id="event_place" name="event_place" value="<?= $event["place"] ?>">
    </div>
    <div class="form-group">
      <label for="event_description">Опис</label>
      <textarea class="form-control" id="event_description"
        name="event_description"><?= $event["description"] ?></textarea>
    </div>
    <div class="form-group">
      <label for="event_price">Ціна</label>
      <input type="text" class="form-control" id="event_price" name="event_price" value="<?= $event["price"] ?>">
    </div>
    <div class="form-group">
      <label for="event_image">Зображення</label>
      <input type="text" class="form-control" id="event_image" name="event_image" value="<?= $event["image"] ?>">
    </div>

    <button type="submit" class="btn btn-primary">Зберегти</button>
  </form>
</div>