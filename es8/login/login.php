<?php 
    session_start();
    $username = "admin";
    $password = "1234";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        :root { --bg:#f4f7fb; --card:#fff; --accent:#2b7cff; --muted:#6b7280; }
        body { margin:0; font-family:system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial; background:var(--bg); color:#111; display:flex; align-items:center; justify-content:center; min-height:100vh; }
        .card { background:var(--card); padding:28px; border-radius:10px; box-shadow:0 6px 30px rgba(3,10,36,0.08); width:100%; max-width:420px; }
        h1 { margin:0 0 12px; font-size:20px; }
        p.sub { margin:0 0 18px; color:var(--muted); font-size:14px; }
        label { display:block; font-size:13px; margin-bottom:6px; color:var(--muted); }
        input[type="email"], input[type="password"] { width:100%; padding:10px 12px; border:1px solid #e6e9ef; border-radius:8px; font-size:15px; box-sizing:border-box; }
        .row { margin-bottom:14px; }
        .actions { display:flex; align-items:center; justify-content:space-between; gap:12px; }
        .btn { background:var(--accent); color:#fff; padding:10px 16px; border:none; border-radius:8px; cursor:pointer; font-weight:600; }
        .btn:active { transform:translateY(1px); }
        .muted-link { color:var(--muted); font-size:14px; text-decoration:none; }
        .inline { display:flex; align-items:center; gap:8px; }
        .error { color:#cc0000; font-size:13px; display:none; margin-top:8px; }
        .show-pass { font-size:13px; color:var(--muted); cursor:pointer; background:none; border:none; padding:0; }
    </style>
</head>
<body>
    <main class="card" aria-labelledby="login-heading">
        <h1 id="login-heading">Sign in to your account</h1>
        <p class="sub">Enter your email and password to continue.</p>

        <form method="post" action="home.php" id="loginForm" novalidate>
            <div class="row">
                <label for="username">Username</label>
                <input id="username" name="username" type="username" autocomplete="username" required placeholder="Example"/>
            </div>

            <div class="row">
                <label for="password">Password</label>
                <div style="display:flex;gap:8px">
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
    if($_POST["username"] === $username && $_POST["password"] === $password){
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("Location: home.php");
        exit;
    }
    ?>
</body>
</html>