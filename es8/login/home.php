<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Welcome, admin!
    <form action="logout.php" method="post">
        <input type="submit" value="Logout" name="logout">
    </form>

    <?php 
    if(isset($_POST["logout"])){
        if($_POST["logout"]){
            header("Location: logout.php");
            exit;
        }
        }
    ?>
</body>
</html>