<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_post'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $query = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
        $stmt = $conn_posts->prepare($query);
        $stmt->bind_param("ssi", $title, $content, $post_id);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour du post : " . $stmt->error;
        }

        $stmt->close();
    }

    $query = "SELECT * FROM posts WHERE id = ?";
    $stmt = $conn_posts->prepare($query);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "Post not found.";
        exit();
    }

    $stmt->close();
    $conn_posts->close();
} else {
    echo "Post ID not provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Modify Post</title>
    <link rel="stylesheet" type="text/css" href="../css/modify.css">
</head>
<body>
    <div class="navbar">
        <?php include '../html/nav.html'; ?>
    </div>
    <br><br><br>
    <div class="container">
        <h1>Modify Post</h1>
        <form action="modify_post.php?id=<?php echo $post_id; ?>" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="4" required><?php echo $post['content']; ?></textarea>

            <button type="submit" name="update_post">Update Post</button>
        </form>
        <a href="index.php">Back to Posts</a>
    </div>
    <footer>
        <?php include '../html/footer.html'; ?>
    </footer>


</body>
</html>
