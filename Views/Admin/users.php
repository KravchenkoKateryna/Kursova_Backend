<?php
  $this->title = "Панель адміністратора - Користувачі";

?>

<script src="/js/UserSetting.js"></script>

<div class="container">
  <h1>Користувачі</h1>

  <div class="row">
    <div class="col-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Логін</th>
            <th scope="col">Ім'я</th>
            <th scope="col">Прізвище</th>
            <th scope="col">Телефон</th>
            <th scope="col">Адмін</th>
            <th scope="col">Дії</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($users as $user) : ?>
          <tr>
            <th scope="row"><?= $user['id'] ?></th>
            <td><span style="cursor: pointer;" onclick="editLogin(<?php echo $user['id'] ?>)"><span
                  id="login<?php echo $user['id'] ?>"><?php echo $user['login']; ?></span>✏️</span>
            <td><span style="cursor: pointer;" onclick="editName(<?php echo $user['id'] ?>)"><span
                  id="firstName<?php echo $user['id'] ?>"><?php echo $user['firstName']; ?></span>✏️</span>
            </td>
            <td><span style="cursor: pointer;" onclick="editLastName(<?php echo $user['id'] ?>)"><span
                  id="lastName<?php echo $user['id'] ?>"><?php echo $user['lastName']; ?></span>✏️</span>
            <td><span style="cursor: pointer;" onclick="editPhone(<?php echo $user['id'] ?>)"><span
                  id="phone<?php echo $user['id'] ?>"><?php echo $user['phone']; ?></span>✏️</span>
            <td><?= $user['isAdmin' ] ? 'Так' : 'Ні' ?></td>
            <td>
              <a href=" /users/changeAdminStatus/<?= $user['id'] ?>" class="btn btn-primary">Змінити статус адміна</a>
              <a href="/users/delete/<?= $user['id'] ?>" class="btn btn-danger">Видалити</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>