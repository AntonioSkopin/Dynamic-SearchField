<?php
    include "./database-connectie.php";

    $query = $connectie->prepare("SELECT * FROM persoon");
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    // Get the q parameter from URL
    $q = $_REQUEST["q"];

    $hint = "<br>";

    // Lookup all hints from array if $q is different from ""
    if ($q !== "") {
        $q = strtolower($q); // Lowercase all letters in q
        $len = strlen($q); // Get length of string q
        foreach ($data as &$name) {
            if (stristr($q, substr($name["naam"], 0, $len))) {
                if ($hint === "") {
                    $hint = $name["naam"];
                } else {
                    $hint .= "<br>" . "- " . $name["naam"] . "";
                }
            }
        }
    }

    // Output "no suggestion" if no hint was found or output correct values
    echo $hint === "<br>" ? "<br>Geen naam gevonden" : $hint;