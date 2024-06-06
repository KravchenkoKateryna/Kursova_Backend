<?php 
    /** @var int $code Код помилки */
    /** @var string $message Повідомлення про помилку */

    $this->title = 'Error '.$code;
?>

<link rel="stylesheet" href="/css/error.css">

<div class="error-container">
  <h1><?php echo $code; ?></h1>
  <h2><?php echo $message; ?></h2>
  <a href="index">Return to Home</a>
</div>