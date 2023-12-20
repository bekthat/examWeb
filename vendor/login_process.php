<?php
session_start();
require_once('db.php');

// Получаем данные из формы входа
$username = $_POST['name'];
$password = $_POST['password'];

// Проверка наличия пользователя с введенными данными
$result = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
$user = mysqli_fetch_assoc($result);

if($user) {
    // Успешный вход - устанавливаем сессию и перенаправляем на главную страницу
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    header('Location: ../index.php'); // Замените index.php на вашу главную страницу
} else {
    // Ошибка входа - перенаправляем на страницу входа с сообщением об ошибке
    header('Location: ../login.php?error=1'); // Замените login.php на вашу страницу входа
}
exit();
?>