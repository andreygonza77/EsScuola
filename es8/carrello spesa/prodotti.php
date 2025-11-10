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
        $_SESSION["carrello"] = [];
    }

    if(!isset($_SESSION["info"])) $_SESSION["info"] = "";
    else{
        foreach($prodotti as $id => $prodotto){
            if(isset($_POST["$id"])){
                $_SESSION["info"] = "<p class='text-success'> Hai aggiunto " . $prodotto["nome"] . " nel carrello. " . ($_SESSION["qta"] + 1) . " articoli totali aggiunti </p>";
                $_SESSION["qta"]++;
                $_SESSION["carrello"][] = [
                    "id" => $_SESSION["qta"],
                    "nome" => $prodotto["nome"],
                    "prezzo" => $prodotto["prezzo"]
                ];
                header("Location: prodotti.php");
                exit;
            };
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Prodotti</title>
</head>
<body>
    <?php
    echo $_SESSION["info"] . "<br>";
    foreach($prodotti as $id => $prodotto){
        echo '<form action="" method="post">';
        echo $prodotto["nome"] . " ";
        echo "€" . $prodotto["prezzo"] . '<input type="submit" value="Aggiungi">' . '<input type="hidden" name="' . $id . '">' ;
        echo '</form> <br>';
    }

    ?>

    <form action="carrello.php" method="post">
        <input type="submit" value="Visualizza carrello" name="carrello">
    </form>

    <?php
        if(isset($_POST["carrello"])){
            header("Location: carrello.php");
            exit;
        }
    ?>
</body>
</html>