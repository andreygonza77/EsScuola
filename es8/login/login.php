<?php 
session_start();

$error = "";

$username = "admin";
$password = "1234";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["username"] ?? "";
    $pass = $_POST["password"] ?? "";

    if ($user === $username && $pass === $password) {
        $_SESSION["username"] = $username;
        header("Location: home.php");
        exit;
    } else {
        $error = "Wrong username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container">
    <main class="card p-4 mt-5">
        <h1>Sign in to your account</h1>
        <p>Enter your email and password to continue.</p>

        <form method="post" id="loginForm" novalidate>
            <div class="mb-3">
                <label for="username">Username</label>
                <input id="username" name="username" class="form-control" required placeholder="Example" />
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" required placeholder="••••••••" />
            </div>

            <button class="btn btn-primary" type="submit">Sign in</button>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </main>
</div>
</body>
</html>
