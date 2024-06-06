<?php
  $this->title = "Події";
?>

<div class="container">
  <h1>Події</h1>

  <div class="row">
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
            <th scope="col">Відображення</th>
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
            <td><?php echo $event['isShow'] ? 'Так' : 'Ні'; ?> </td>

            <td>

              <a href="/events/edit/<?= $event['id'] ?>" class="btn btn-primary">Редагувати</a>
              <a href="/events/delete/<?= $event['id'] ?>" class="btn btn-danger">Видалити</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>