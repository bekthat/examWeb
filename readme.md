## Задание для экзамена по ПМ 06 Рарзработка web-реурсов

### Техническое задание для экзамена - [Ссылка на задание](https://disk.yandex.ru/d/7kafAIQGytMBxA)

### Примеры логики для back-end части
1. Подключение к базе данных
```php
<?php
    $connect = mysqli_connect('localhost', 'root','','exam');
    if(!$connect){
        die('Database connect error!');
    }
?>
```
2. Логика регистрации на сайте
```php
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

```

3. Логика входа на сайт
```php
<?php
session_start();
require_once('db.php');

// Регистрация нового пользователя
$username = $_POST['name'];
$password = $_POST['password'];

mysqli_query($connect, "INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES (NULL, '$username', '$password', 'user')");
header('Location: ../login.php');
?>
```

4. Логика добавление статьи на сайт
```php
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

?>
```
6. Что вам нужно доделать?
- Админ панель: Вам нужно будет реализовать страницу админа(какие функционалы должны реализовать описано внизу)
 - Отображение пользователей сайта 
 - Удалить пользователя
 - Удалить статью
 - Удалить комментарий