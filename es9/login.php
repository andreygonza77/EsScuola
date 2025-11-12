<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="pages/target.php" method="post">
        <label for="username">Username*:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password*:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <?php
        if(isset($_SESSION["error"]) && $_SESSION["error"] === "error"){
            echo "Username o password errati.";
            $_SESSION["error"] = "";
        }
    ?>
</body>
</html>