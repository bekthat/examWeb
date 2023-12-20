<?php
require_once('vendor/db.php');

// Получаем идентификатор статьи из URL-параметра
if (isset($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
    $user_id = $_GET['user_id'];
    // Получаем данные статьи из базы данных
    $article_query = "SELECT articles.*, users.username as author_name FROM articles JOIN users ON articles.author_id = users.id WHERE articles.id = ?";
    $stmt = mysqli_prepare($connect, $article_query);
    mysqli_stmt_bind_param($stmt, 'i', $article_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $article = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    // Получаем комментарии для данной статьи
    $comments_query = "SELECT * FROM comments WHERE article_id = ?";
    $stmt = mysqli_prepare($connect, $comments_query);
    mysqli_stmt_bind_param($stmt, 'i', $article_id);
    mysqli_stmt_execute($stmt);
    $comments_result = mysqli_stmt_get_result($stmt);
    $comments = mysqli_fetch_all($comments_result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);

    // Добавление комментария
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['comment'])) {
            $comment_content = $_POST['comment'];
            $user_id = $_SESSION['user_id'];

            $insert_comment_query = "INSERT INTO comments (article_id, user_id, content) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($connect, $insert_comment_query);
            mysqli_stmt_bind_param($stmt, 'iss', $article_id, $user_id, $comment_content);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // Перенаправляем, чтобы избежать повторной отправки формы
            header("Location: display_article.php?article_id=$article_id");
            exit();
        }
    }
} else {
    // Если не указан идентификатор статьи, перенаправляем на главную страницу или другую страницу
    header('Location: index.php');
    exit();
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article: <?php echo $article['title']; ?></title>
    <!-- Добавьте вашу CSS-разметку для стилей, если необходимо -->
</head>
<body>

<div>
    <h1><?php echo $article['title']; ?></h1>
    <p><?php echo $article['content']; ?></p>

    <?php if (!empty($article['image_data'])) : ?>
        <?php $imageBase64 = base64_encode($article['image_data']); ?>
        <img src="data:image/jpeg;base64,<?php echo $imageBase64; ?>" alt="Article Image">
    <?php endif; ?>

    <p>Category: <?php echo $article['category']; ?></p>
    <p>Author: <?php echo $article['author_name']; ?></p>
</div>

<hr>

<div>
    <h2>Comments</h2>
    <?php foreach ($comments as $comment) : ?>
        <div>
            <p><?php echo $comment['content']; ?></p>
            <p>Comment by: <?php echo $article['author_name']; ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</div>

<hr>

<div>
    <h2>Add a Comment</h2>
    <form method="post">
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" required></textarea>
        <br>
        <input type="submit" value="Add Comment">
    </form>
</div>

</body>
</html>
