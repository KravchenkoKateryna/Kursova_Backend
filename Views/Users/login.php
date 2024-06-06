<?php

/** @var string $error_massage Повідомлення про помилку */
$this->title = "Вхід на сайт";
?>

<link href="/css/login.css" rel="stylesheet">
<section class="gradient-form">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo">
                </div>
                <form method="post" action="">
                  <p>Введіть дані для входу</p>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Email адреса</label>
                    <input name="login" type="email" class="form-control" placeholder="Email адреса" />
                  </div>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Пароль</label>
                    <input type="password" name="password" class="form-control" placeholder="Пароль" />
                  </div>
                  <div class="text-center pt-1 mb-2 pb-1">
                    <button data-mdb-button-init data-mdb-ripple-init
                      class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Увійти</button>
                  </div>
                  <?php if (!empty($error_massage)) : ?>
                  <div class="text-center pt-1 mb-2 pb-1" style="color: red;" role="alert">
                    <?= $error_massage ?>
                  </div>
                  <?php endif; ?>
                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Не маєте акаунту?</p>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger"
                      onclick="location.href='/users/register'">Зареєструватись</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Ми більше ніж просто компанія.</h4>
                <p class="small mb-0">Доставимо вам ваше свято вчасно та якісно.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>