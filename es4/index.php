<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 4</title>
</head>

<body>   
    <?php
        $utenti = isset($_POST["utenti"]) ? $_POST["utenti"] : 0; 
        $guadagni = isset($_POST["guadagni"]) ? $_POST["guadagni"] : 0;
    ?>

    <form action="./pages/target.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" value="" required><br>

        <label for="eta">Età:</label><br>
        <input type="number" name="eta" id="eta" value="" required><br><br>

        <label>Scegliere frequenza di pagamento:</label><br>

        <input type="radio" name="frequenza" id="mensile" value="Mensile" required>
        <label for="mensile">Mensile</label><br>

        <input type="radio" name="frequenza" id="bimestrale" value="Bimestrale" required>
        <label for="bimestrale">Bimestrale</label><br>

        <input type="radio" name="frequenza" id="trimestrale" value="Trimestrale" required>
        <label for="trimestrale">Trimestrale</label><br>

        <input type="radio" name="frequenza" id="annuale" value="Annuale" required>
        <label for="annuale">Annuale</label><br><br>

        <input type="hidden" name="utenti" value="<?php echo $utenti ?>">
        <input type="hidden" name="guadagni" value="<?php echo $guadagni?>">
        <input type="submit" value="Invia">
    </form>

</body>

</html>