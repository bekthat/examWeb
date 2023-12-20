<?php
    require_once('vendor/db.php');

    // Запрос к базе данных для получения всех статей с именами авторов
    $result = mysqli_query($connect, "SELECT articles.*, users.username as author_name FROM articles JOIN users ON articles.author_id = users.id ORDER BY articles.id DESC");

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <h3>Технический блог</h3>
    </div>
    <div class="container">
        <div class="row">

                <?php
                // Проверка наличия статей
                if (mysqli_num_rows($result) > 0) {
                    while ($article = mysqli_fetch_assoc($result)) {
                        // Вывод карточки для каждой статьи
                        echo '<div class="col-3 p-4">';
                        echo '<div class="card">';
                        echo '<h3>'  . $article['title'] . '</h3>';
                         // Проверка наличия изображения
                        if (!empty($article['image_data'])) {
                            $imageBase64 = base64_encode($article['image_data']);
                            echo '<img class="card-img-top" src="data:image/jpeg;base64,' . $imageBase64 . '" alt="Article Image">';
                        }
                        echo '<p>' . $article['content'] . '</p>';
                        echo '<p> Категория: ' . $article['category'] . '</p>';
                        echo '<p> Автор: ' . $article['author_name'] . '</p>';
                        echo '<a href="display_article.php?article_id=' . $article['id'] . '">Read more</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No articles found</p>';
                }

                mysqli_close($connect);
                ?>
        </div>
    </div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>