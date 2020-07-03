<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h1>Login</h1>
            <form method="post" autocomplete="off">
                <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam">
                <br>
                <input type="password" name="wachtwoord" placeholder="Wachtwoord">
                <br>
                <input type="submit" name="login" value="Log in">
            </form>
            <?php
                // Check if login button is clicked
                if (@$_POST["login"]) {
                    // Filter input
                    $gebruikersnaam = filter_input(INPUT_POST, "gebruikersnaam", FILTER_SANITIZE_STRING);
                    $wachtwoord = filter_input(INPUT_POST, "wachtwoord", FILTER_SANITIZE_STRING);
                    
                    // Check if fields are empty
                    if (trim($gebruikersnaam) === "" || trim($wachtwoord) === "") {
                        echo "<p style='color: red;'>Niet alle velden zijn ingevuld</p>";
                    } else {
                        include "../Database/database-connection.php";
                        
                        // Creates query to check if input values are matching the database data
                        $query = $connection->prepare("SELECT * FROM admin 
                        WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord");
                        
                        // Bind parameters
                        $query->bindParam("gebruikersnaam", $gebruikersnaam);
                        $query->bindParam("wachtwoord", $wachtwoord);

                        // Execute the query
                        $query->execute();

                        if ($query->rowCount() == 1) {
                            echo "<p style='color: green;'>Succesvol ingelogd.</p>";
                        } else {
                            echo "<p style='color: red;'>Onjuiste gegevens zijn ingevuld.</p>";
                        }
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>