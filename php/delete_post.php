<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $query = "SELECT * FROM posts WHERE id = ?";
    $stmt = $conn_posts->prepare($query);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "Post not found.";
        $stmt->close();
        $conn_posts->close();
        exit();
    }

    $stmt->close();
} else {
    echo "Post ID not provided.";
    $conn_posts->close();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    $conn_posts = new mysqli($host, $username, $password, $database);

    if ($conn_posts->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn_posts->connect_error);
    }

    $delete_query = "DELETE FROM posts WHERE id = ?";
    $delete_stmt = $conn_posts->prepare($delete_query);
    $delete_stmt->bind_param("i", $post_id);

    if ($delete_stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du post : " . $delete_stmt->error;
    }

    $delete_stmt->close();
    $conn_posts->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Post</title>
    <link rel="stylesheet" type="text/css" href="../css/delete.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: block;
            
        }   

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:100px;
            width: 300px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
</head>
<body>
    <div class="navbar">
        <?php include '../html/nav.html'; ?>
    </div>
    

    <div class="container">
        <h1>Delete Post</h1>
        <p>Are you sure you want to delete the following post?</p>
        <div class="post">
            <h3><?php echo $post['title']; ?></h3>
            <p><?php echo $post['content']; ?></p>
        </div>
        <form action="delete_post.php?id=<?php echo $post_id; ?>" method="post">
            <button type="submit" name="confirm_delete">Confirm Delete</button>
        </form>
        <a href="index.php">Cancel</a>
    </div>
    <footer>
        <?php include '../html/footer.html'; ?>
    </footer>


</body>
</html>
