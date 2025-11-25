<?php
    // Connexion à MariaDB
    $mysqli = new mysqli('DATA', 'monuser', 'password', 'mabase');

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $insert = "INSERT INTO mabase.matable (compteur)
               SELECT COUNT(*) + 1 FROM mabase.matable;";

    if ($mysqli->query($insert) === TRUE) {
        echo "Count updated<br />";
    } else {
        echo "Erreur INSERT : " . $mysqli->error . "<br />";
    }

    $result = $mysqli->query("SELECT * FROM mabase.matable");

    if ($result) {
        echo "Count : " . $result->num_rows . "<br />";
        $result->close();
    } else {
        echo "Erreur SELECT : " . $mysqli->error . "<br />";
    }

    $mysqli->close();
?>
