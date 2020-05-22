<?php
    //include "db_connection.php";

    function ExistaUser($user) {
        return ("select count(username) from users where username = " . $user == 1);
    }

    function VerificaParola($user, $pass) {
        if ($pass == "select parola from users where username = " . $user) {
            return true;
        }
        return false;
    }

    if (!ExistaUser($_GET["lusername"])) {
        $message =  "Nu exista un cont asociat acestui username.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    else {
        if (VerificaParola($_GET["lusername"] , $_GET["lpassword"]) == false) {
            $message = "Nu ati introdus parola corecta";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else {
            $message =  "Logare reusita!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
