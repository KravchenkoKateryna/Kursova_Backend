<?php
  $this->title = "Події";

  /** @var array $events */
?>

<div class="container">
  <h1>Події</h1>

  <div class="row">
    <div class="col-12">
      <a href="/events/add" class="btn btn-primary">Додати подію</a>
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Назва</th>
            <th scope="col">Опис</th>
            <th scope="col">Дата</th>
            <th scope="col">Час</th>
            <th scope="col">Місце</th>
            <th scope="col">Ціна</th>
            <th scope="col">Зображення</th>
            <th scope="col">Дії</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($events as $event) : ?>
          <tr>
            <th scope="row"><?= $event['id'] ?></th>
            <td><?php echo $event['title']; ?>
            <td>
              <?php echo strlen($event['description']) > 100 ? substr($event['description'], 0, 100) . '...' : $event['description']; ?>
            <td><?php echo $event['date']; ?>
            <td><?php echo $event['time']; ?>
            <td><?php echo $event['place']; ?>
            <td><?php echo $event['price']; ?>
            <td><?php echo $event['image']; ?>

            <td>

              <a href="/events/edit/<?= $event['id'] ?>" class="btn btn-primary" style="width:100%;">Редагувати</a>
              <a href="/events/delete/<?= $event['id'] ?>" class="btn btn-danger mt-1" style="width:100%;">Видалити</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>