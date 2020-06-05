<?php

    require_once "db_connection.php";
    //$message ="";
    $rusername = $nume = $prenume = $email = $rparola = $crparola = "";
    $err_rusername = $err_nume = $err_prenume = $err_email = $err_rparola = $err_crparola = "";
    if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["register"]))) {
        // validare username
        if (empty(trim($_POST["rusername"]))) {
            $err_rusername = "Nu ati introdus un nume de utilizator";
        } else {
            $sql = "SELECT id FROM users WHERE username = ?";
            $rusername = trim($_POST["rusername"]);
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $rusername);

                // execut blocul sql
                if (mysqli_stmt_execute($stmt)) {
                    // salvez rezultatul in stmt
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $err_rusername = "Acest nume de utilizator este folosit.";
                    }

                } else {
                    echo "Ooops! Ceva nu a functionat. Va rugam incercati mai tarziu";
                }
                mysqli_stmt_close($stmt);
            }
        }

        // validare parola
        if (empty(trim($_POST["rparola1"]))) {
            $err_rparola = "Introduceti o parola";
        } elseif (strlen(trim($_POST["rparola1"])) < 6) { 
            $err_rparola = "Parola trebuie sa aibe cel putin 6 caractere";
        } else {
            $rparola = trim($_POST['rparola1']);
        }

        // validare confirmare parola
        if (empty(trim($_POST["rparola2"]))) {
            $err_crparola = "Reintroduceti parola.";
        } else {
            $crparola = trim($_POST["rparola2"]);
            if (empty($err_rparola) && ($rparola != $crparola)) {
                $err_crparola = "Parolele nu corespund";
            } else {
                $rparola = password_hash($rparola, PASSWORD_DEFAULT);
            }
        } 

        // validare nume
        if (empty(trim($_POST["nume"])) || !preg_match("/^[a-zA-Z ]*$/",$_POST["nume"])) {
            $err_nume = "Nu ati introdus un nume valid";
        } else {
            $nume = trim($_POST["nume"]);
        }

        // validare prenume
        if (empty(trim($_POST["prenume"])) || !preg_match("/^[a-zA-Z ]*$/",$_POST["prenume"])) {
            $err_prenume = "Nu ati introdus un prenume valid";
        } else {
            $prenume = trim($_POST["prenume"]);
        }

        // validare email
        if (empty(trim($_POST["email"])) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $err_email = "Nu ati introdus o adresa de email valida";
        } else {
            $email = trim($_POST["email"]);
            $sql = "SELECT id FROM users WHERE email = ?";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);

                // execut blocul sql
                if (mysqli_stmt_execute($stmt)) {
                    // salvez rezultatul in stmt
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $err_email = "Acest email este folosit.";
                    }

                } else {
                    echo "Ooops! Ceva nu a functionat. Va rugam incercati mai tarziu";
                }
                mysqli_stmt_close($stmt);
            }
            
        }

        // verific daca nu sunt erori
        if (empty($err_rusername) && empty($err_rparola) && empty($err_crparola) && empty($err_nume) && empty($err_prenume) && empty($err_email)) {
            $sql = "INSERT INTO users (username, parola, nume, prenume, email)  VALUES(?, ?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssss", $rusername, $rparola, $nume, $prenume, $email);
                if (mysqli_stmt_execute($stmt)) {
                    //$message = "Cont creat cu succes.";
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    header("location: ./login-register.php");
                    //$message = "Cont creat cu succes.";
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                } else {
                    echo "Ceva nu a mers bine. Va rugam incercati mai tarziu.";
                }
                mysqli_stmt_close($stmt);
            }
        } 
        mysqli_close($conn);
    }

?>