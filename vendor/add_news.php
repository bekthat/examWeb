<?php
session_start();
require_once('db.php');

// Проверка, что пользователь вошел в систему
if (!isset($_SESSION['user_id'])) {
    // Если пользователь не вошел, перенаправляем на страницу входа
    header('Location: ../login.php');
    exit();
}

// Проверка, что форма была отправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $author_id = $_SESSION['user_id']; // Предполагаем, что пользователь уже вошел в систему

    // Проверяем, есть ли изображение для загрузки
    if ($_FILES['image']['error'] == 0) {
        $tmpName = $_FILES['image']['tmp_name'];

        // Читаем содержимое файла в виде бинарных данных
        $image_data = file_get_contents($tmpName);
    } else {
        // Если изображение не загружено, устанавливаем значение по умолчанию или NULL, в зависимости от вашего предпочтения
        $image_data = NULL;
    }

    // Вставляем данные в базу данных, используя параметры для безопасности
    $query = "INSERT INTO `articles` (`title`, `content`, `image_data`, `category`, `author_id`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $query);

    mysqli_stmt_bind_param($stmt, 'ssssi', $title, $content, $image_data, $category, $author_id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header('Location: ../index.php'); // Перенаправляем на главную страницу
    exit();
}

