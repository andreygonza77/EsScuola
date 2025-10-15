<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
    $const = 100;

    $array = array();
    for ($i=0; $i < $const; $i++) { 
        $contatore = 0;
        if($i % 3 == 0)
            array_push($array, $i);
        $contatore++;
        }

    echo("<table class='table'> <tr>");
        for ($i=0; $i < sizeof($array); $i++) { 
            $value = $array[$i];
            echo("<td>$value</td>");
        }
    echo("</tr> </table>");
    
    $quantita = sizeof($array);
    $somma = 0;
    for ($i=0; $i < $quantita ; $i++) { 
        $somma += $array[$i];
    }
    $media = ($somma/$quantita);
    
    echo("<p> La media e' $media , i numeri sono $quantita");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>