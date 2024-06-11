<?php

/** @var string $title */
/** @var string $content */

use Models\Users;
use Controllers\CartController;

if (empty($title)) {
    $title = '';
}
if (empty($content)) {
    $content = '';
}

?>
<!doctype html>
<html lang="uk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <link href="/css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100" style="background-color: #ffe7eb;">
  <header class="p-3 mb-3 border-bottom bg-pink-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 link-secondary text-white">Головна</a></li>
          <li><a href="/items" class="nav-link px-2 link-body-emphasis text-white">Товари</a></li>
          <li><a href="/events" class="nav-link px-2 link-body-emphasis text-white">Події</a></li>
        </ul>
        <div class="cart me-3">
          <a href="/cart" class="link-secondary">
            <img src="/images/cart.png" , alt="cart" width="32" height="32">
            <?php if (!empty($_SESSION['cart'])) : ?>
            <span class="badge bg-primary rounded-pill"><?= CartController::get_cart_count() ?></span>
            <?php endif; ?>
          </a>
        </div>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="/items/search" method="post">
          <input type="search" class="form-control" placeholder="Пошук..." aria-label="Search" name="query">
        </form>
        <?php if (!Users::is_user_logged()) : ?>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/users/login" class="nav-link px-2 link-body-emphasis text-white">Вхід</a></li>
          <li><a href="/users/register" class="nav-link px-2 link-body-emphasis text-white">Реєстрація</a></li>
        </ul>
        <?php else : ?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="/images/profile.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <?php if (Users::is_user_admin()) : ?>
            <li><a class="dropdown-item" href="/admin">Адмін панель</a></li>
            <?php endif; ?>
            <li><a class="dropdown-item" href="/users/orders">Мої замовлення</a></li>
            <li><a class="dropdown-item" href="/users/setting">Налаштування</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/users/logout">Вийти</a></li>
          </ul>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <div>
    <?= $content ?>
  </div>

  <footer class="py-3 mt-auto bg-pink-dark">
    <div class="container">
      <div class="row">
        <div class="col-2 text-white">© 2024 Kravchenko </div>
        <div class="col-4"></div>
        <div class="col-6">
          <ul class="nav">
            <li class="nav-item"><a href="/info/payments" class="nav-link px-2 text-white">Оплата</a></li>
            <li class="nav-item"><a href="/info/delivery" class="nav-link px-2 text-white">Доставка</a></li>
            <li class="nav-item"><a href="/info/contacts" class="nav-link px-2 text-white">Контакти</a></li>
            <li class="nav-item"><a href="/info/about" class="nav-link px-2 text-white">Про нас</a></li>
            <li class="nav-item btn btn-outline-success"><a href="/review" class="nav-link text-white">Відгуки</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>