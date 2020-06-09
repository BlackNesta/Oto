<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Online Toys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="./CSS/header.css" />
  <link rel="stylesheet" href="./CSS/favorite-style.css" />
</head>

<body>
  <?php include "header.php";
  session_start();

  // Verific daca nu sunt deja logat
  if (!isset($_SESSION["loggedin"])) {
    header("location: ./login-register.php");
    exit;
  }
  ?>
  <section>
    <div class="section-title">Favorite</div>

    <?php
    include "./PHP/afiseaza_favorite.php";
    ?>
  </section>
  <?php include "JS/favorite_script.php" ?>
</body>

</html>