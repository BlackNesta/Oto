<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acount</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="./CSS/header.css" />
  <link rel="stylesheet" href="./CSS/login-register-style.css" />
</head>

<body>
  <?php 
    include "header.php";
    include "./PHP/db_connection.php"; 
    include "./PHP/login.php"; 
    include "./PHP/register.php"; 
  ?>


  <div class="fomrs-container">
    <form class="box" action="#" method="post">
      <h1>Login</h1>
      <input type="text" name="lusername" class="form-control" value="" placeholder="Nume de utilizator">
      <div class="help-block"><?php echo $lusername_err; ?></div> 

      <input type="password" name="lparola" placeholder="Parola" value="">
      <div class="help-block"><?php echo $lpassword_err; ?></div>

      <input type="submit" name="login" value="Login">
    </form>
    <form class="box" action="#" method="post">
      <h1>Register</h1>
      <input type="text" name="rusername" placeholder="Nume de utilizator">
      <div class="help-block"><?php echo $err_rusername; ?></div> 

      <input type="text" name="nume" placeholder="Nume">
      <div class="help-block"><?php echo $err_nume; ?></div> 

      <input type="text" name="prenume" placeholder="Prenume">
      <div class="help-block"><?php echo $err_prenume; ?></div> 

      <input type="text" name="email" placeholder="Email">
      <div class="help-block"><?php echo $err_email; ?></div> 

      <input type="password" name="rparola1" placeholder="Parola">
      <div class="help-block"><?php echo $err_rparola; ?></div> 

      <input type="password" name="rparola2" placeholder="Confirma parola">
      <div class="help-block"><?php echo $err_crparola; ?></div> 
      
      <input type="submit" name="register" value="Register">
    </form>
  </div>
</body>

</html>