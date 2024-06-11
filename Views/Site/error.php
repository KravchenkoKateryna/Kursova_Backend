<?php 
    /** @var int $code Код помилки */
    /** @var string $message Повідомлення про помилку */

    $this->title = 'Error '.$code;
?>

<link rel="stylesheet" href="/css/error.css">

<div class="error-container">
  <h1><?php echo $code; ?></h1>
  <h2><?php echo $message; ?></h2>
  <p><img src="https://funik.ru/wp-content/uploads/2019/09/2d6eb7a31dcc04431ab0-2.jpg" width="445px" />
  </p>
  <a href="/index">Return to Home</a>
</div>