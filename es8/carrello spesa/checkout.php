<?php
    session_start();
    if(isset($_POST["ConfermaOrdine"])) {
        echo "Grazie per l'ordine";
        session_destroy();
        header("Location: checkout.php");
        exit;
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Checkout</title>
</head>
<body>
    <?php
    if(!isset($_SESSION["qta"])){
        echo "Grazie per l'ordine!";
    }
    else if($_SESSION["qta"] != 0){
            $totale = 0;
            echo "Carrello:";
            foreach($_SESSION["carrello"] as $x){
                $totale += $x["prezzo"];
                echo "<br>" . $x["id"] . ": ";
                echo "<br>" . $x["nome"] . ", €";
                echo $x["prezzo"] . "<br>";
            }
            echo "Prezzo totale del carrello: €" . $totale;
        }  
        else echo "Non hai articoli nel carrello";

    ?>

    <form action="prodotti.php" method="post">
        <input type="submit" value="Aggiungi altri prodotti">
    </form>
    <form action="carrello.php" method="post">
        <input type="submit" value="Visualizza il carrello">
    </form>
    <form action="checkout.php" method="post">
        <input type="submit" value="Conferma ordine" name="ConfermaOrdine" class="bg-success">
    </form>
</body>
</html>