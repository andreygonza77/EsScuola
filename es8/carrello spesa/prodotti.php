<?php
    session_start();

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
    foreach($prodotti as $id => $prodotto){
        echo '<form action="carrello.php" method="get">';
        echo $prodotto["nome"] . " ";
        echo "€" . $prodotto["prezzo"] . '<input type="submit" value="Aggiungi"' ;
        echo '</form> <br>';
    }
    ?>

    <form action="carrello.php" method="get">
        <input type="submit" value="Visualizza carrello">
    </form>

    <?php
        
    ?>
</body>
</html>