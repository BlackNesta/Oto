<?php
    include "db_connection.php";

    // Initialize the session
    session_start();
 
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $myusername = mysqli_real_escape_string($conn, $_POST['lusername']);
        $mypassword = mysqli_real_escape_string($conn, $_POST["lparola"]);

        $sql = "SELECT id FROM users WHERE username = '$myusername' and parola = '$mypassword'";
      
        $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['username'] = $myusername;
            header("Location: ./main.php");
        }
        else {
            $error = "Wrong username or password";
        }
    }
    
