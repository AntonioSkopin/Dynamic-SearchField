<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=personen", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        die("Error: " . $ex->getMessage());
    }