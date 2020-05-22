<?php
    include "db_connection.php";

    function ExistaUser($user) {
        return ("select count(username) from users where username = " . $user);
    }

    function VerificaParola($user, $pass) {
        if ($pass == "select parola from users where username = " . $user) {
            return true;
        }
        return false;
    }

    if (!ExistaUser($_GET["lusername"])) {
        echo "Nu exista un cont asociat acestui username.";
    }

    else {
        if (VerificaParola($_GET["lusername"] , $_GET["lpassword"]) == false) {
            echo "Nu ati introdus parola corecta";
        }
        else {
            echo "Logare reusita!";
        }
    }
