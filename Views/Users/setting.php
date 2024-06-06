<?php
$this->title = "Налаштування профілю";

use Core\Core;

/** @var int $userId */

?>

<script src="/js/UserSetting.js"></script>
<h1>Налаштування профілю</h1>
<div class="row mt-5">
  <div class="col-md-3 text-center">
    <img src="/images/user.png" alt="Профіль" class="card-img-top" style="height: 200px; width: 200px;">
  </div>
  <div class="col-md-9">
    <div class="profile__info">
      <div class="profile__info-row">
        <label for="name">Ім'я:</label>
        <span id="firstName<?php echo $userId ?>"><?php echo Core::get()->session->get('user')["firstName"]; ?></span>
        <span style="cursor: pointer;" onclick="editName(<?php echo $userId ?>)">✏️</span>
      </div>
      <div class="profile__info-row">
        <label for="name">Прізвище:</label>
        <span id="lastName<?php echo $userId ?>"><?php echo Core::get()->session->get('user')["lastName"]; ?></span>
        <span style="cursor: pointer;" onclick="editLastName(<?php echo $userId ?>)">✏️</span>
      </div>
      <div class=" profile__info-row">
        <label for="email">Email:</label>
        <span id="email<?php echo $userId ?>"><?php echo Core::get()->session->get('user')["login"]; ?></span>
        <span style="cursor: pointer;" onclick="editEmail(<?php echo $userId ?>)">✏️</span>
      </div>
      <div class="profile__info-row">
        <label for="phone">Телефон:</label>
        <span id="phone<?php echo $userId ?>"><?php echo Core::get()->session->get('user')["phone"]; ?></span>
        <span style="cursor: pointer;" onclick="editPhone(<?php echo $userId ?>)">✏️</span>
      </div>
      <div class="profile__info-row">
        <label for="password">Пароль:</label>
        <?php echo "********"; ?>
        <span style="cursor: pointer;" onclick="editPassword(<?php echo $userId ?>)">✏️</span>
      </div>
    </div>
  </div>
</div>