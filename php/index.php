<?php
session_start();
require_once 'config.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_post'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn_posts->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $title, $content);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        echo "Erreur lors de l'ajout du post : " . $stmt->error;
    }

    $stmt->close();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT posts.*, users.username AS owner_username, users.id AS owner_id FROM posts
          JOIN users ON posts.user_id = users.id
          ORDER BY posts.id DESC";
$result = $conn_posts->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <style>
        .create-post-section {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <?php include '../html/nav.html'; ?>
    </div>
    
    <div class="container">
    
        <div class="create-post-section">
        
            <h1> Welcome! </h1>
            <form action="index.php" method="post">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="4" required></textarea>

                <button type="submit" name="create_post">Create Post</button>
            </form>
            <p id="signout"><a href="logout.php">Sign Out</a></p>
        </div>

        <div class="posts-section">
            <br>
            
            <h2>Existing Posts</h2>
            <br>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='post'>";
                        echo "<h3>{$row['title']}</h3>";
                        echo "<p>{$row['content']}</p>";
                        echo "<p>Owner: {$row['owner_username']}</p>";

                         if ($user_id == $row['owner_id']) {
                            echo "<a href='modify_post.php?id={$row['id']}'>Modify</a>";
                            echo "<a href='delete_post.php?id={$row['id']}'>Delete</a>";
                        }
                        
                        echo "</div>";
                    }
                } else {
                    echo "<p>No posts available.</p>";
                }

                $conn_posts->close();
                ?><br><br>
        </div>
    </div>
    <footer>
        <?php include '../html/footer.html'; ?>
    </footer>
    <style>
        #searchInput {
            padding: 5px;
            margin-right: 5px;
}
    </style>

</body>
</html>
