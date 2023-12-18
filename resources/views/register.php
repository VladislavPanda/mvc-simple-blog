<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/assets/css/tiny-slider.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/glightbox.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/assets/css/flatpickr.min.css">

    <title>Регистрация</title>
</head>
<body>

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<?php
    /** @var \Core\View\View $view */
    echo $view->include('header', ['categories']);
?>

<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="heading">
                    <form action="/register" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Email"
                                       name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="login" class="col-sm-2 col-form-label">Логин</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="login" placeholder="Логин"
                                       name="login" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Пароль</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password"
                                       name="password" placeholder="Пароль" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_repeat" class="col-sm-2 col-form-label">Повторите пароль</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_repeat"
                                       name="password_repeat" placeholder="Повторите пароль" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-2 col-form-label">Имя</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="first_name" placeholder="Имя"
                                       name="first_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="second_name" class="col-sm-2 col-form-label">Фамилия</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="second_name" placeholder="Фамилия"
                                       name="second_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-2 col-form-label">Отчество</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="last_name" placeholder="Отчество"
                                       name="last_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="customFile" class="col-sm-2 col-form-label">Фото профиля</label>
                            <div class="col-sm-10">
                                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        /** @var array $errors */
                        if ($errors) {
                            foreach ($errors as $error) {
                    ?>
                                <p><?php echo $error; ?></p>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<?php echo $view->include('footer'); ?>

<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/tiny-slider.js"></script>
<script src="/assets/js/flatpickr.min.js"></script>
<script src="/assets/js/aos.js"></script>
<script src="/assets/js/glightbox.min.js"></script>
<script src="/assets/js/navbar.js"></script>
<script src="/assets/js/counter.js"></script>
<script src="/assets/js/custom.js"></script>
</body>
</html>
