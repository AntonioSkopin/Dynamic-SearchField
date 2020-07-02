<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $connectie = new PDO("mysql:host=$servername;dbname=personen", $username, $password);
        $connectie->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        die("Error: " . $ex->getMessage());
    }