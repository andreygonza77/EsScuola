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
    $new_id = sizeof($_SESSION["tavoli"]) + 1;
    $_SESSION["tavoli"][$new_id] = ["comande" => []];
}

if(isset($_POST["azione"]) && $_POST["azione"] === "aggiungi_comanda"){
    $t = $_POST["tavolo"];
    $piatto = trim($_POST["piatto"]);
    $prezzo = floatval($_POST["prezzo"]);
    $note = trim($_POST["note"]);

    if($piatto && $prezzo > 0){
        $_SESSION["tavoli"][$t]["comande"][] = [
            "piatto" => $piatto,
            "prezzo" => $prezzo,
            "note" => $note
        ];
    }
}

if(isset($_POST["azione"]) && $_POST["azione"] === "chiudi_tavolo"){
    $t = $_POST["tavolo"];
    unset($_SESSION["tavoli"][$t]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Tavoli</title>
</head>
<body>

    <h2>Bentornato, <?php echo $_SESSION["username"]; ?>!</h2>

    <form method="post">
        <input type="hidden" name="azione" value="aggiungi_tavolo">
        <input type="submit" value="Aggiungi Tavolo">
    </form>

    <h3>Tavoli attivi</h3>

    <?php
    if(empty($_SESSION["tavoli"])){
        echo "<p>Al momento non hai tavoli da servire!</p>";
    }

    foreach($_SESSION["tavoli"] as $num => $tavolo){
        echo "<div>";
        echo "<h4>Tavolo $num</h4>";

        if(empty($tavolo["comande"])){
            echo "<p>Nessuna comanda da fare</p>";
        } else {

            echo "<ul>";
            $totale = 0;

            foreach($tavolo["comande"] as $comanda){
                echo "<li><b>".$comanda["piatto"]."</b> - ".$comanda["prezzo"]."€";
                if($comanda["note"] !== ""){
                    echo " (<i>".$comanda["note"]."</i>)";
                }
                echo "</li>";

                $totale += $comanda["prezzo"];
            }

            echo "</ul>";
            echo "<p><b>Totale:</b> $totale €</p>";
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
    ?>


    <form action="target.php" method="post">
        <input type="submit" name="logout" value="Fine turno (Logout)">
    </form>

</body>
</html>
