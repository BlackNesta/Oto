<?php

    require_once "db_connection.php";
    $nume = $prenume = $email = $telefon = $parola1 = $adresa = $parola2 = "";
    $err_nume = $err_prenume = $err_email = $err_telefon = $err_adresa = $err_parola1 = $err_parola2 ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // validare modificare nume
        if ($_SESSION["nume"] != ($_POST["nume"]) && !empty(trim($_POST["nume"])) && 
                                            preg_match("/^[a-zA-Z\-\s\']{2,20}$/",$_POST["nume"])) {
            $nume = ($_POST["nume"]);
        } elseif ($_SESSION["nume"] != trim($_POST["nume"])) {
            $err_nume = "Nume invalid.";
        }

        // validare modificare prenume
        if ($_SESSION["prenume"] != ($_POST["prenume"]) && !empty(trim($_POST["prenume"])) && 
                                                    preg_match("/^[a-zA-Z\-\s\']{2,20}$/",$_POST["prenume"])) {
            $prenume = ($_POST["prenume"]);
        } else if($_SESSION["prenume"] != trim($_POST["prenume"])) {
            $err_prenume = "Prenume invalid";
        }

        // validare modificare email
        if ($_SESSION["email"] != trim($_POST["email"]) && !empty(trim($_POST["email"])) && 
                                        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $try_email = trim($_POST["email"]);

            $sql = "SELECT id FROM users WHERE email = ?";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $try_email);

                // execut blocul sql
                if (mysqli_stmt_execute($stmt)) {
                    // salvez rezultatul in stmt
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $err_email = "Acest email este folosit.";
                    } else {
                        $email = $try_email;
                    }

                } else {
                    echo "Ooops! Ceva nu a functionat. Va rugam incercati mai tarziu";
                }
                mysqli_stmt_close($stmt);
            }
        } elseif($_SESSION["email"] != trim($_POST["email"])) {
            $err_email = "Email invalid.";
        }

        // validare modificare telefon
        if ($_SESSION["telefon"] != trim($_POST["telefon"]) && !empty(trim($_POST["telefon"])) && 
                                            preg_match('/^\(?07\d{2}\)?[-\s]?\d{3}[-\s]?\d{3}$/',$_POST["telefon"])) {
            $try_telefon = trim($_POST["telefon"]);

            $sql = "SELECT id FROM users WHERE telefon = ?";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $try_telefon);

                // execut blocul sql
                if (mysqli_stmt_execute($stmt)) {
                    // salvez rezultatul in stmt
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $err_telefon = "Acest numar de telefon este folosit.";
                    } else {
                        $telefon = $try_telefon;
                    }

                } else {
                    echo "Ooops! Ceva nu a functionat. Va rugam incercati mai tarziu";
                }
                mysqli_stmt_close($stmt);
            }
        } elseif ($_SESSION["telefon"] != trim($_POST["telefon"])) {
            $err_telefon = "Numar de telefon invalid.";
        }

        // validare adresa
        if ($_SESSION["adresa"] != ($_POST["adresa"]) && !empty(trim($_POST["adresa"]))) {
            $adresa = ($_POST["adresa"]);
        } elseif ($_SESSION["adresa"] != trim($_POST["adresa"])) {
            $err_adresa = "Adresa invalida.";
        }

        // validare parola
        if (strlen(trim($_POST["parola1"])) < 6 && !empty(trim($_POST["parola1"]))) { 
            $err_parola1 = "Parola trebuie sa aibe cel putin 6 caractere";
        } elseif (!empty(trim($_POST["parola1"]))) {
            $parola1 = trim($_POST['parola1']);
        }

        // validare confirmare parola
        if (empty(trim($_POST["parola2"])) && !empty(trim($_POST["parola1"]))) {
            $err_parola2 = "Nu ati reintrodus parola.";
        } else {
            $parola2 = trim($_POST["parola2"]);
            if (empty($err_parola1) && ($parola1 != $parola2)) {
                $err_parola2 = "Parolele nu corespund";
            } else {
                $parola1 = password_hash($parola1, PASSWORD_DEFAULT);
            }
        } 


        // verific daca toate datele ce doresc a fi modificate sunt valide
        if (empty($err_nume) && empty($err_prenume) && empty($err_email) && empty($err_telefon) &&
                                empty($err_adresa) && empty($err_parola1) && empty($err_parola2)) {
            
            $userid = $_SESSION["id"];
            
            // update nume
            if (!empty($nume)) {
                $sql = "UPDATE users SET nume=? WHERE id=$userid";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $nume);
                    if (mysqli_stmt_execute($stmt)) {
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                        $_SESSION["nume"] = $nume;
                        $ok_nume = "Nume schimbat cu succes";
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                    } else {
                        echo "Ceva nu a mers bine. Va rugam incercati mai tarziu.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }

            // update prenume
            if (!empty($prenume)) {
                $sql = "UPDATE users SET prenume=? WHERE id=$userid";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $prenume);
                    if (mysqli_stmt_execute($stmt)) {
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                        $_SESSION["prenume"] = $prenume;
                        //echo $_SESSION["prenume"];
                        $ok_prenume = "Prenume schimbat cu succes";
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                    } else {
                        echo "Ceva nu a mers bine. Va rugam incercati mai tarziu.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }


            // update email
            if (!empty($email)) {
                $sql = "UPDATE users SET email=? WHERE id=$userid";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    if (mysqli_stmt_execute($stmt)) {
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                        $_SESSION["email"] = $email;
                        $ok_email = "Email schimbat cu succes";
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                    } else {
                        echo "Ceva nu a mers bine. Va rugam incercati mai tarziu.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }

            // update telefon
            if (!empty($telefon)) {
                $sql = "UPDATE users SET telefon=? WHERE id=$userid";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $telefon);
                    if (mysqli_stmt_execute($stmt)) {
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                        $_SESSION["telefon"] = $telefon;
                        $ok_email = "Telefon schimbat cu succes";
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                    } else {
                        echo "Ceva nu a mers bine. Va rugam incercati mai tarziu.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }

            // update adresa
            if (!empty($adresa)) {
                $sql = "UPDATE users SET adresa=? WHERE id=$userid";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $adresa);
                    if (mysqli_stmt_execute($stmt)) {
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                        $_SESSION["adresa"] = $adresa;
                        $ok_adresa = "Adresa schimbata cu succes";
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                    } else {
                        echo "Ceva nu a mers bine. Va rugam incercati mai tarziu.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }

            // update parola
            if (!empty($parola1)) {
                $sql = "UPDATE users SET parola=? WHERE id=$userid";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $parola1);
                    if (mysqli_stmt_execute($stmt)) {
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                        $ok_email = "Parola schimbata cu succes";
                        //$message = "Cont creat cu succes.";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                    } else {
                        echo "Ceva nu a mers bine. Va rugam incercati mai tarziu.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }

            //header("location: ./login-register.php");
        }
        mysqli_close($conn);
    }
?>