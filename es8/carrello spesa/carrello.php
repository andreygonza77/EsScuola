<?php
session_start();
if(!isset($_SESSION["qta"])){
    $_SESSION["qta"] = 0; 
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
    if($_SESSION["qta"] == 0){
        echo "Il carrello è vuoto";
    }
    else if($_SESSION["qta"] == 1){
        echo("Hai messo nel carrello " . $_SESSION["qta"] . " articolo");
        foreach($_SESSION["carrello"] as $prodotto){
            echo "<p>" . "</p>";
        }
    }
        
    else{
        echo("Hai messo nel carrello " . $_SESSION["qta"] . " articoli");
        foreach($_SESSION["carrello"] as $prodotto){
            echo "<p>" . $prodotto["nome"] . "</p>";
        }
    }
    ?>
    <form action="prodotti.php" method="post">
        <input type="submit" value="Torna indietro">
    </form>

    <form action="carrello.php" method="post">
        <input type="submit" name="cancella" value="Cancella carrello">
    </form>

    <?php
        if(isset($_POST["cancella"])){
            session_destroy();
            header("Location: carrello.php");
            exit;
        } 
            
    ?>
</body>
</html>