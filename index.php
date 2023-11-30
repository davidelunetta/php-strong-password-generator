<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP-password-generator</title>
</head>
<body>
    <div class="mt-5 container d-flex flex-column align-items-center">
    <h1>Strong Password Generator</h1>
    <h2 class="text-light">Genera una password sicura</h2>
    <form action="index.php" method="GET">
        <label for="passwordLength">Inserisci la lunghezza della password:</label>
        <input type="number" id="passwordLength" name="passwordLength" min="1" max="25" required>
        <button type="submit">Genera Password</button>
        <button type="reset">Reset</button>
    </form>
    </div>
    <?php
    include 'functions.php';

    if (isset($_GET['passwordLength'])) {
        $passwordLength = $_GET['passwordLength'];
        
        if (is_numeric($passwordLength) && $passwordLength > 0) {
            $generatedPassword = generateRandomPassword($passwordLength);
            echo "<p>La password generata è: <strong>$generatedPassword</strong></p>";
        } else {
            echo "<p>Inserisci una lunghezza valida per la password.</p>";
        }
    } else {
        // Se non è stata fornita una lunghezza, non mostrare la password
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            echo "<p>Inserisci una lunghezza per generare la password.</p>";
        }
    }
    ?>

</body>
</html>