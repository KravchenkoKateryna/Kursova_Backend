<?php
  $this->title = "Події";

  /** @var array $events */
?>

<div class="container">
  <h1>Події</h1>
  <div class="row">
    <?php  
    if (empty($events)): ?>
    <p>Активних подій немає. Перевіряйте оновлення на цьому сайті.</p>
    <?php else: ?>
    <?php foreach ($events as $event): ?>
    <div class="row mb-5">
      <div class="col-md-4">
        <img src="<?php echo $event["image"]; ?>" alt="<?php echo $event["title"]; ?>" class="img-fluid">

        <a href="/events/show/<?php echo $event["id"]; ?>" class="btn btn-primary mt-3">Детальніше</a>
      </div>
      <div class="col-md-8">
        <h2><?php echo $event["title"]; ?></h2>
        <p><?php $shortDescription = strlen($event["description"]) > 250 ? substr($event["description"], 0, 250) . "..." : $event["description"];
          echo $shortDescription; ?></p>
        <p>Дата:
          <?php echo $event["date"]; 
          $event_date = strtotime($event["date"]);
          $current_date = strtotime(date("Y-m-d"));
          if ($event_date < $current_date) echo " (Подія вже відбулася)"; ?><br>
          Місце: <?php echo $event["place"]; ?><br>
          Час: <?php echo $event["time"]; ?><br>
          Ціна: <?php echo $event["price"] ? $event["price"] . " грн" : "Безкоштовно"; ?></p>
      </div>
    </div>

    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>