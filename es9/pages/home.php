<?php
session_start();

if(!isset($_SESSION["login"]) || $_SESSION["login"] === false){
    header("Location: login.php");
    exit;
}

$_SESSION["error"] = "";

if(!isset($_SESSION["tavoli"])){
    $_SESSION["tavoli"] = [];
}

if(isset($_POST["azione"]) && $_POST["azione"] === "aggiungi_tavolo"){
    $n = sizeof($_SESSION["tavoli"]) + 1;
    $_SESSION["tavoli"][$n] = ["comande" => []];
    header("Location: home.php");
    exit;
}

if(isset($_POST["azione"]) && $_POST["azione"] === "aggiungi_comanda"){
    $t = $_POST["tavolo"];
    $piatto = $_POST["piatto"];
    $prezzo = floatval($_POST["prezzo"]);
    $note = $_POST["note"];
    if($piatto && $prezzo > 0){
        $_SESSION["tavoli"][$t]["comande"][] = [
            "piatto" => $piatto,
            "prezzo" => $prezzo,
            "note" => $note
        ];
    }
    header("Location: home.php");
    exit;
}

if(isset($_POST["azione"]) && $_POST["azione"] === "chiudi_tavolo"){
    $t = $_POST["tavolo"];
    unset($_SESSION["tavoli"][$t]);
    header("Location: home.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
<!--<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>-->
</head>
<body>
    <h1> Bentornato, <?php echo $_SESSION["username"]; ?>!  <h1> 
    <form action="" method="post">
        <input type="submit" value="Aggiungi tavolo">
        <input type="hidden" name="azione" value="aggiungi_tavolo">
    </form>

    <h3>Tavoli attivi: </h3>
    <?php

    if(sizeof($_SESSION["tavoli"]) === 0) echo "Al momento non hai tavoli da servire";
    else{
        foreach($_SESSION["tavoli"] as $num => $tavolo){
            echo "<div><h4>Tavolo $num</h4>";
            if(empty($tavolo["comande"])){
                echo "Nessuna comanda da fare";
            }
            else{
                $totale = 0;

                foreach($tavolo["comande"] as $comanda){
                    echo $comanda["piatto"] . " €" . $comanda["prezzo"] . " " . $comanda["note"] . "<br>";
                    $totale += $comanda["prezzo"];
                }
                 echo "<p>Totale del tavolo: €" . $totale . "</p>"; 
            }
            echo "
            <form action='home.php' method='post'>
            <input type='hidden' name='azione' value='aggiungi_comanda'>
            <input type='hidden' name='tavolo' value='$num'>
            Piatto: <input type='text' name='piatto' required>
            Prezzo: <input type='number' name='prezzo' required>
            Note aggiuntive: <input type='text' name='note'>
            <input type='submit' value='Aggiungi Comanda'>
            </form>
            ";

            echo "
            <form action='home.php' method='post'>
                <input type='hidden' name='azione' value='chiudi_tavolo'>
                <input type='hidden' name='tavolo' value='$num'>
                <input type='submit' value='Chiudi Tavolo'>
            </form>
            ";

            echo "</div>";
        }
    }
    ?>
    <form action="./target.php" method="post">
        <input type="submit" value="Fine turno" name="logout">
    </form>

</body>
</html>