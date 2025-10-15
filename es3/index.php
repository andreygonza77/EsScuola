<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 3</title>
</head>
<body>
    <form action="pages/target.php" method="get">
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" value=""><br>
    <label for="cognome">Cognome:</label><br>
    <input type="text" name="cognome" value=""><br><br>
        <label for="materia">Materia preferita:</label><br>
        <input type="radio" name="materia" value="Informatica">
        <label for="materia">Informatica</label><br>
        <input type="radio" name="materia" value="Sistemi e reti">
        <label for="materia">Sistemi e reti</label><br>
        <input type="radio" name="materia" value="TPSIT">
        <label for="materia">TPSIT</label><br><br>
    <input type="submit" value="Invia"> 
    </form>

</body>
</html>