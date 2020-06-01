<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <title>Online Toys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="./CSS/header.css" />
  <link rel="stylesheet" href="./CSS/main-style.css" />
</head>

<body>
  <?php
  include "header.php";
  include "PHP/db_connection.php";
  session_start();
  ?>

  <div id="slider">
    <figure>
      <img src="img/banner1.png" alt="banner1">
      <img src="img/banner2.png" alt="banner2">
      <img src="img/banner3.png" alt="banner3">
      <img src="img/banner4.png" alt="banner4">
      <img src="img/banner1.png" alt="banner1">
    </figure>
  </div>

  <div id="categorii">
    <button class="drop-btn">Categorii </button>
    <div class="dropup-content">
      <a href="pagina-produse.php?c=bebelusi">Jucării bebeluși</a>
      <a href="pagina-produse.php?c=creative">Jucării creative</a>
      <a href="pagina-produse.php?c=plus">Jucării de pluș</a>
      <a href="pagina-produse.php?c=masini">Mașini, trenulețe</a>
      <a href="pagina-produse.php?c=papusi">Păpuși</a>
    </div>
  </div>
  <div id="title-produse"> Cele mai populare jucarii</div>
  <div id="produse">
    <?php

    $result_produse = mysqli_query($conn, "SELECT id, nume, pret FROM produse ORDER BY vandute desc limit 10");

    if (!$result_produse)
      die("Database access failed: " . mysqli_error($conn));

    if (mysqli_num_rows($result_produse) > 0) {
      while ($produs = mysqli_fetch_assoc($result_produse)) {
        $result_img = mysqli_query($conn, "SELECT img1 FROM imagini_produs where id_produs='" . $produs["id"] . "'");
        $img_prd = mysqli_fetch_assoc($result_img);

        echo
          '<div class="produs">
            <a href="produs.php?id=' . $produs["id"] . '">
              <img src="img/' . $img_prd["img1"] . '" alt="img-produs">
              <div class="nume">' . $produs["nume"] . '</div>
            </a>
            <div class="details">
              <span class="price">' . $produs["pret"] . ' lei</span>
              <button onclick="addProductInCart(' . $produs["id"] . ')" >Adauga in cos</button>
            </div>
          </div>';
      }
    }

    mysqli_close($conn);
    ?>
  </div>
  <script>
    loggedin =
      <?php
      if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
        echo 'true';
      else
        echo 'false';
      ?>;
    if (loggedin)
      userId = 
      <?php 
      if (isset($_SESSION["id"]))
        echo $_SESSION["id"];
      else
        echo 0;
      ?>;

    function addProductInCart(id_produs) {
      if (!loggedin) {

        var products = JSON.parse(localStorage.getItem("cartProducts"));
        var count = JSON.parse(localStorage.getItem("countProducts"));
        //console.log("Before: " + products + " | " + count);
        if (products == null) {
          products = [];
          count = [];
        }
        const index = Object.values(products).indexOf(id_produs);
        if (index > -1) {
          count[index] = parseInt(count[index]) + 1;
        } else {
          products.push(id_produs);
          count.push(1);
        }

        //console.log("After: " + products + " | " + count);
        localStorage.setItem("cartProducts", JSON.stringify(products));
        localStorage.setItem("countProducts", JSON.stringify(count));
      } else {
        //console.log("logat");
        insertProductInCartDB(userId, id_produs);
      }
    }

    function insertProductInCartDB(userId, id_produs) {
      return new Promise(resolve => {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            resolve();
          }
        };
        xhttp.open("GET", "PHP/insert_product_in_cartDB.php?userId=" + userId + "&id_produs=" + id_produs, true);
        xhttp.send();
      });
    }
  </script>
</body>

</html>