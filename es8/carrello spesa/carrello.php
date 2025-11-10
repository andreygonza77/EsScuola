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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Carrello</title>
</head>
<body>
    <?php
    if($_SESSION["qta"] == 0){
        echo "Il carrello è vuoto";
    }
    else if($_SESSION["qta"] == 1){
        echo("Hai messo nel carrello " . $_SESSION["qta"] . " articolo ");
        foreach($_SESSION["carrello"] as $x){
                    echo "<br>" . $x["id"] . ": ";
                    echo "<br>" . $x["nome"] . ", €";
                    echo $x["prezzo"] . "<br>";
                }
    }
        
    else{
        echo("Hai messo nel carrello " . $_SESSION["qta"] . " articoli");
        foreach($_SESSION["carrello"] as $x){
                    echo "<br>" . $x["id"] . ":";
                    echo "<br>" . $x["nome"] . ", €";
                    echo $x["prezzo"] . "<br>";
                }
    }
    ?>
    <form action="prodotti.php" method="post">
        <input type="submit" name="prodotti" value="Torna indietro">
    </form>

    <form action="carrello.php" method="post">
        <input type="submit" name="cancella" value="Cancella carrello" class="bg-danger">
    </form>

    <form action="checkout.php" method="post">
        <input type="submit" name="checkout" value="Vai al checkout" class="bg-primary">
    </form>

    <?php
        if(isset($_POST["prodotti"])){
            header("Location: prodotti.php");
            exit;
        }

        if(isset($_POST["cancella"])){
            session_destroy();
            header("Location: carrello.php");
            exit;
        } 
        
        if(isset($_POST["checkout"])){
            session_destroy();
            header("Location: checkout.php");
            exit;
        } 

    ?>
</body>
</html>