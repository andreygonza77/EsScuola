<?php
session_start();

if(!isset($_SESSION["contatore"])){
    $_SESSION["contatore"] = 1;
}
else{
    $_SESSION["contatore"]++;
}
    if(isset($_POST["azzera"])){
        session_destroy();
        header("Location: visite.php");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visite</title>
</head>
<body>
    <?php
    foreach($_SESSION as $c)
        echo "<p> Sei stato qui $c volte </p>";
    ?>
    <form method="post">
        <input type="submit" value="Azzera" name="azzera">
    </form>
    
</body>
</html>