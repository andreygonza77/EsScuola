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
    <main class="card" aria-labelledby="login-heading">
        <h1 id="login-heading">Sign in to your account</h1>
        <p class="sub">Enter your email and password to continue.</p>

        <form method="post" id="loginForm" novalidate>
            <div class="row">
                <label for="username">Username</label>
                <div >
                   <input id="username" name="username" type="username" autocomplete="username" required placeholder="Example"/>
                </div>
            </div>

            <div class="row">
                <label for="password">Password</label>
                <div >
                    <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="••••••••" />
                </div>
            </div>

            <div class="row">
                <button class="btn" type="submit">Sign in</button>
                <div id="formError" class="error" role="alert"></div>
            </div>
        </form>
    </main>

    <?php
    $username = "admin";
    $password = "1234";
    $user = isset($_POST["username"]) ? $_POST["username"] : " ";
    $pass = isset($_POST["password"]) ? $_POST["password"] : " ";

    if($user === $username && $pass === $password){
        $_SESSION["username"] = $username;
        header("Location: home.php");
        exit;
    }
    ?>
</body>
</html>