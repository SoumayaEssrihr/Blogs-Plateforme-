<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin.css">
    <style>
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 70px;
        }
    </style>
    <title>Sign In</title>
    <script src="../js/script.js" defer></script>
</head>
<body>
    <div class="navbar">
        <?php include '../html/nav.html'; ?>
    </div>
    <div class="container">
        <h1>Welcome back !</h1>

        <form action="signinProcess.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Sign In</button>
        </form>

        <p>Don't have an account? <a href="signup.php" >Sign Up</a></p>
    </div>
    <footer>
        <?php include '../html/footer.html'; ?>
    </footer>


</body>
</html>
