<?php
session_start();
require_once('db.php');

// Регистрация нового пользователя
$username = $_POST['name'];
$password = $_POST['password'];

mysqli_query($connect, "INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES (NULL, '$username', '$password', 'user')");
header('Location: ../login.php');