<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body> 
    <form action="pages/gestionePrenotazione.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" value="" required><br>
        <label for="cognome">Cognome:</label><br>
        <input type="text" name="cognome" id="cognome" value="" required><br>

        <label for="numeroTavolo">Numero del tavolo:</label><br>
        <select name="numeroTavolo" id="numeroTavolo" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>

        <label for="orario">Orario:</label><br>
        <input type="time" name="orario" id="orario" value="" required><br>

        <label for="note">Eventuali note:</label><br>
        <input type="text" name="note" id="note" value=""><br>


        <input type="radio" id="parcheggioCustodito" name="parcheggio" value="parcheggioCustodito" required>
        <label for="parcheggioCustodito">Parcheggio Custodito</label><br>
        <input type="radio" id="parcheggiNonoCustodito" name="parcheggio" value="parcheggioNonCustodito" required>
        <label for="parcheggioNonCustodito">Parcheggio Non Custodito</label><br>
        <input type="radio" id="noParcheggio" name="parcheggio" value="noParcheggio" required>
        <label for="noParcheggio">No Parcheggio</label><br>

        <label for="">Inserire cosa si desidera</label><br>
        <div class="checkbox-group" required>
        <input type="checkbox" id="antipasto" name="cibo" value="Antipasto">
        <label for="antipasto"> Antipasto (€5) </label><br>
        <input type="checkbox" id="primo" name="cibo" value="Primo">
        <label for="primo"> Primo (€6)</label><br>
        <input type="checkbox" id="secondo" name="cibo" value="Secondo">
        <label for="secondo"> Secondo (€7) </label><br>
        </div>
        

        <input type="submit" value="Invia">
    </form>

</body>
</html>