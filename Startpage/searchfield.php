<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Field</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        const showHint = str => {
            if (str.length == 0) { // Check if input string is empty
                document.getElementById("naamHint").innerHTML = "";
                return;
            } else {
                let xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        // Checks if request is finished and response is ready
                        // Checks if status is OK

                        // Sets suggestions to response data
                        document.getElementById("naamHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "gethint.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>
    
    <div class="container">
        <h1>Zoek een naam op uit de database</h1>
        <form action="" autocomplete="off">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" onkeyup="showHint(this.value)">
        </form>
        <h3>Suggesties:</h3>
        <div class="namen">
            <h2 id="naamHint"></h2>
        </div>
    </div>
    
    <footer>
        <p>Antonio Skopin &copy; | </p>
        <a href="../Login/loginpage.php">Login</a>
    </footer>
</body>
</html>