<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn_users->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['user_id'] = $user_id;
            header("Location: index.php");
            exit();
        } else {
            header("Location: signin.php?error=incorrect_password");
            exit();
        }
    } else {
        header("Location: signin.php?error=user_not_found");
        exit();
    }

    $stmt->close();
    $conn_users->close();
} else {
    header("Location: signin.php");
    exit();
}
?>
