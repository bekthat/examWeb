<?php
require_once('vendor/db.php');
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Techno blog</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">TechnoBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Главная страница</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Админ панель</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_news.php">Добавить новость</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="mb-3">Вход на сайт</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form action="vendor/login_process.php" class="row g-4" method="post">
                                        <div class="col-12">
                                            <label>Имя пользователя: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" class="form-control" placeholder="Введите имя пользователя" name="name">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Пароль:<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="text" class="form-control" placeholder="Введите пароль" name="password">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <a href="register.php" class="float-end text-primary">Если нет аккаунта зарегистрируйтесь!</a>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-dark m-auto mt-4">Войти</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 bg-dark text-white text-center pt-5">
                                    <i class="bi bi-bootstrap"></i>
                                    <h2 class="fs-1">Добро пожаловать!!!</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>