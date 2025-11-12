<?php
session_start();

if(!isset($_SESSION["login"]) || $_SESSION["login"] === false){
    header("Location: login.php");
    exit;
}

$_SESSION["error"] = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <p> Bentornato, <?php echo $_SESSION["username"]; ?>! </p>
    <form action="" method="post">
        <input type="submit" value="Aggiungi tavolo">
    </form>

    <form action="" method="post">
        <input type="submit" value="Aggiungi comanda">
    </form>

    <form action="./target.php" method="post">
        <input type="submit" value="Fine turno" name="logout">
    </form>

</body>
</html>