<?php
    session_start();

    $prodotti = [
    1 => ["nome" => "Pennarello", "prezzo" => 2.0],
    2 => ["nome" => "Gomma", "prezzo" => 1.5],
    3 => ["nome" => "Appuntalapis", "prezzo" => 4.0],
    4 => ["nome" => "Forbici", "prezzo" => 100]
    ];
    if (!isset($_SESSION["qta"])) {
        $_SESSION["qta"] = 0;
    }
    else{
        $_SESSION["carrello"] = [];
        foreach($prodotti as $id){
            if(isset($_POST["aggiungi"])){
                $_SESSION["carrello"][] = $id->nome;
                $_SESSION["qta"]++;
            }
        }
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
    <?php
    foreach($prodotti as $id => $prodotto){
        echo '<form action="" method="post">';
        echo $prodotto["nome"] . " ";
        echo "€" . $prodotto["prezzo"] . '<input type="submit" value="Aggiungi"' . '<input type="hidden" value="' . $id . '" name="aggiungi">' ;
        echo '</form> <br>';
    }
    ?>

    <form action="carrello.php" method="post">
        <input type="submit" value="Visualizza carrello">
    </form>

    <?php
        
    ?>
</body>
</html>