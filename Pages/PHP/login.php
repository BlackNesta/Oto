<?php
session_start();
 
// Verific daca nu sunt deja logat
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./main.php");
    exit;
}
 
require_once "db_connection.php";
 
$lusername = $lpassword = "";
$lusername_err = $lpassword_err = "";
$nume = $prenume = $telefon = $email = $adresa = "";
 
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["login"]))){

    //verific daca s-a introdus un username
    if(empty(trim(($_POST["lusername"])))){
        $lusername_err = "Nu ati introdus numele de utilizator.";
    } 
    else{
        $lusername = trim($_POST["lusername"]);
    }
    
    // verific daca s-a introdus o parola
    if(empty(trim(($_POST["lparola"])))){
        $lpassword_err = "Nu ati introdus parola.";
    } 
    else{
        $lpassword = trim($_POST["lparola"]);
    }
    
    // verific daca introducerea datelor s-a realizat
    if(empty($lusername_err) && empty($lpassword_err)){

        $sql = "SELECT id, username, parola, nume, prenume, telefon, email, adresa FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Execut blocul sql
            mysqli_stmt_bind_param($stmt, "s", $lusername);
            if(mysqli_stmt_execute($stmt)){
               
                //salvez rezultatul interogarii cu baza de date
                mysqli_stmt_store_result($stmt);
                
                // Daca exista o linie in baza de date inseamna ca a fost introdus un username valid
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // atribui fiecarei coloane o variabila
                    mysqli_stmt_bind_result($stmt, $id, $lusername, $hashed_password, $nume, $prenume, $telefon, $email, $adresa);
                    if(mysqli_stmt_fetch($stmt)){
                        //verific daca parola introdusa este aceeasi cu parola hashuita din baza de date
                        if(password_verify($lpassword, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $lusername;     
                            $_SESSION["nume"] = $nume;        
                            $_SESSION["prenume"] = $prenume;        
                            $_SESSION["telefon"] = $telefon;        
                            $_SESSION["email"] = $email; 
                            $_SESSION["adresa"] = $adresa;        
                            
                            header("location: ./main.php");
                        } else{
                            $lpassword_err = "Ati introdus parola gresita.";
                        }
                    }
                } else{
                    $lusername_err = "Nu exista un cont cu acest username.";
                }
            } else{
                echo "Oops! Ceva nu a mers bine.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($conn);
}
?>