<?php
require_once 'config.php';

session_start();

if (isset($_SESSION['user_id'])) {
    session_destroy();

    header("Location: signin.php");
    exit();
} else {
    header("Location: signin.php");
    exit();
}
?>
