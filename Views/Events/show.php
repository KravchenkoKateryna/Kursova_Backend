<?php
$this->title = "Подія".$this->event['title'];

/** @var array $event */
?>

<div class="container">
  <h1 class="text-center"><?php echo $this->event['title']; ?></h1>
  <div class="row text-center">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <img src="<?php echo $this->event['image']; ?>" alt="<?php echo $this->event['title']; ?>" class="img-fluid">
    </div>
    <div class="col-md-2"></div>
  </div>
  <div class="row mb-5">
    <div>
      <p><?php echo $this->event['description']; ?></p>
      <p>Дата:
        <?php echo $this->event['date']; if ($this->event['date'] < date('Y-m-d')) echo " (Подія вже відбулася)"; ?><br>
        Місце: <?php echo $this->event['place']; ?><br>
        Час: <?php echo $this->event['time']; ?><br>
        Ціна: <?php echo $this->event['price'] ? $this->event['price'] . " грн" : "Безкоштовно"; ?></p>
    </div>
    <div class="col-md-4">
      <form action="/events/join" method="post">
        <input type="hidden" name="event_id" value="<?php echo $this->event['id']; ?>">
      </form>
    </div>
  </div>
</div>