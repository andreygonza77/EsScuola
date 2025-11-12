<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Tabella</title>
</head>
<body>
    <div class="container"> 
        <table class="table text-center mt-3">
        <tr>
            <th colspan="3">Dati inseriti nel form</th>
            <th>Output prodotto dal server</th>
        </tr>
        <tr>
            <th>Nome</th>
            <th>Età</th>
            <th>Frequenza</th>
            <th>Output</th>
        </tr>
                
        <?php
            $nome = $_POST["nome"];
            $eta = $_POST["eta"];
            $frequenza = $_POST["frequenza"];
            
            $guadagno = isset($_POST['guadagno']) ? $_POST['guadagno'] : 0;
            $contatore = isset($_POST['contatore']) ? $_POST['contatore'] : 0;


            $sconto = 0;
            $prezzo = 45; // al mese
            if($eta < 18 || $eta >= 65){
                $prezzo = 35;
            }

            

            if(strcmp($frequenza, "Bimestrale") == 0){
                $sconto = 0.10;
            }
            else if(strcmp($frequenza, "Trimestrale") == 0){
                $sconto = 0.15; 
            }
            else if(strcmp($frequenza, "Annuale") == 0){
                $sconto = 0.20;
            }

            $totale = ($prezzo - ($prezzo * $sconto)) * 12;
            
            echo("<tr>
                    <td>$nome</td>
                    <td>$eta</td>
                    <td>$frequenza</td>
                    <td>Il prezzo per un anno è $totale 
                </tr>"
            );
            $guadagno += $totale;
            $contatore++;
        ?>
        </table>

        <form action="../index.php" method="post">
            <input type="hidden" name="guadagno" value="<?php echo $guadagno; ?>">
            <input type="hidden" name="contatore" value="<?php echo $contatore; ?>">
            <input type="submit" value="Torna indietro">
        </form>

        <form action="./risultati.php" method="post" class="mt-3">
            <input type="hidden" name="guadagno" value="<?php echo $guadagno?>">
            <input type="hidden" name="contatore" value="<?php echo $contatore?>">
            <input type="submit" value="Controlla risultati">
        </form>
        
    </div>
    
</body>
</html>