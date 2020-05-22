<?php

    function ExistaEmail($email) {
        return ("select count(email) from users where username = " . $email == 1);
    }

    if ($_GET["rparola1"] == $_GET["rparola2"] && !ExistaUser($_GET["rusernme"]) && !ExistaEmail($_GET["email"])) {
        $sql = "insert into users values (" . $_GET["rusername"] . ", " . $_GET["name"] . ", "
            . $_GET["first-name"] . ", ". $_GET["rparola1"]; 
    }