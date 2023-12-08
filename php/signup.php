<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <title>Sign Up</title>
    <script src="../js/script.js" defer></script>
    <style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        #message-container {
            margin-top: 20px;
        }
    </style>

</head>
<body>
    <div class="navbar">
        <?php include '../html/nav.html'; ?>
    </div>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="signupProcess.php" method="post" onsubmit="return validateForm()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Sign Up</button>
        </form>

        <p>Already have an account? <a href="signin.php">Sign In</a></p>
    </div>
    <footer>
        <?php include '../html/footer.html'; ?>
    </footer>
</body>
</html>
