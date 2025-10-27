<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contact.php</h1>
    <?php
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $messaggio = $_POST["messaggio"];
        $errori = [];

        function sanitize_input($info){
            $info = trim($info); //toglie spazi vuoti
            $info = stripslashes($info); //toglie backslash
            $info = htmlspecialchars($info); //anti xss toglie caratteri speciali
            return $info;
        }

        $nome = sanitize_input($_POST["nome"] ?? "");
        $email = sanitize_input($_POST["email"] ?? "");
        $messaggio = sanitize_input($_POST["messaggio"] ?? "");

        if(!preg_match("/^[a-zA-ZÀ-ÿ' -]{2,}$/u", $nome))
            $errori[] = "Errore: inserire un nome valido";
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errori[] = "Errore: inserire una email valida";
        if(strlen($messaggio) > 300)
            $errori[] = "Errore: il messaggio non può avere più di 300 caratteri";


        if(empty($errori)){ 
            header("Location:done.php");
            exit;

        }
        else{
            echo("<p> Attenzione: ci sono errori nella compilazione del form</p>");
            foreach($errori as $errore){
                echo($errore);
            }
        }
    ?>

</body>
</html>