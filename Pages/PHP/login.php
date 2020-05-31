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
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //verific daca s-a introdus un username
    if(empty(($_POST["lusername"]))){
        $lusername_err = "Introdu un username.";
    } 
    else{
        $lusername = ($_POST["lusername"]);
    }
    
    // verific daca s-a introdus o parola
    if(empty(($_POST["lparola"]))){
        $lpassword_err = "Introdu o parola.";
    } 
    else{
        $lpassword = ($_POST["lparola"]);
    }
    
    // verific daca introducerea datelor s-a realizat
    if(empty($lusername_err) && empty($lpassword_err)){

        $sql = "SELECT id, username, parola FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Execut blocul sql
            mysqli_stmt_bind_param($stmt, "s", $lusername);
            if(mysqli_stmt_execute($stmt)){
               
                //salvez rezultatul interogarii cu baza de date
                mysqli_stmt_store_result($stmt);
                
                // Daca exista o linie in baza de date inseamna ca a fost introdus un username valid
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // atribui fiecarei coloane o variabila
                    mysqli_stmt_bind_result($stmt, $id, $lusername, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        //verific daca parola introdusa este aceeasi cu parola hashuita din baza de date
                        //if(password_verify($lpassword, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $lusername;                            
                            
                            header("location: ./main.php");
                        //} else{
                            //$lpassword_err = "Ati introdus parola gresita.";
                        //}
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