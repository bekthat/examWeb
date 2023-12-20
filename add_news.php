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
    <form action="vendor/add_news.php" method="post" enctype="multipart/form-data">
        <label for="title">Заголовок:</label>
        <input type="text" name="title" id="title" required>

        <label for="content">Содержание:</label>
        <textarea name="content" id="content" required></textarea>

        <label for="category">Категория:</label>
        <input type="text" name="category" id="category" required>

        <label for="image">Изображение:</label>
        <input type="file" name="image" id="image">

        <input type="submit" value="Добавить статью">
    </form>
</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>