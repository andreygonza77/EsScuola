<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="contact.php" method="post" id="form" onsubmit="return validateForm()">
            <h1>Scrivi</h1>
            <label for="nome">Nome*</label>
            <input type="text" name="nome" id="nome" required><br>
            <label for="email">Email*</label>
            <input type="text" name="email" id="email" required><br>
            <label for="messaggio">Messaggio (opzionale)</label><br>
            <textarea name="messaggio" id="messaggio" cols="30" rows="10" maxlength="300"></textarea><br>
            <input type="submit" value="Invia" id="submit">
            <p id="errore"></p>
        </form>
    </div>
</body>

<script>
    const nome = document.getElementById("nome");
    const email = document.getElementById("email");
    const messaggio = document.getElementById("messaggio");
    const submit = document.getElementById("submit");
    const errore = document.getElementById("errore");

    const nomeRegex = /^[A-Za-zÀ-ÿ\s]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    let errori = [];
    function validateForm() {
        errore.innerHTML = "";
        
        if (nome.value === "")
            errori.push("Errore: il campo nome non può essere vuoto");
        else if (!nomeRegex.test(nome.value)) {
            errori.push("Errore: il campo nome ha caratteri non ammessi");
        }

        if (email.value === "")
            errori.push("Errore: il campo email non può essere vuoto");
        else if (!emailRegex.test(email.value)) {
            errori.push("Errore: il campo email ha caratteri non ammessi");
        }
        if (messaggio.length > 300) {
            errori.push("Errore: Il messaggio può contenere al massimo 300 caratteri.");
        }

        if (errori.length > 0) {
            errore.innerHTML = errori.join("<br>");
            return false;
        }

        return true;
    }
</script>

</html>