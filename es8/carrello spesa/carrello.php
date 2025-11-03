<?php
session_start();
if(!isset($_SESSION["carrello"])){
    $_SESSION["carrello"] = [];    
}
 $prodotti = [
    1 => ["nome" => "Pennarello", "prezzo" => 2.0],
    2 => ["nome" => "Gomma", "prezzo" => 1.5],
    3 => ["nome" => "Appuntalapis", "prezzo" => 4.0],
    4 => ["nome" => "Forbici", "prezzo" => 100],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    ?>
</body>
</html>