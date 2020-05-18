<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <title>Online Toys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="./CSS/header.css" />
  <link rel="stylesheet" href="./CSS/main-style.css" />
</head>

<body>
  <?php
  include "header.php";
  include "PHP/db_connection.php"
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
      <a href="pagina-produse.php?c=1">Jucării bebeluși</a>
      <a href="pagina-produse.php?c=2">Jucării creative</a>
      <a href="pagina-produse.php?c=3">Jucării de pluș</a>
      <a href="pagina-produse.php?c=4">Mașini, trenulețe</a>
      <a href="pagina-produse.php?c=5">Păpuși</a>
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
            <a href="produs.php?id='.$produs["id"] .'">
              <img src="img/' . $img_prd["img1"] . '" alt="img-produs">
              <div class="nume">' . $produs["nume"] . '</div>
            </a>
            <div class="details">
              <span class="price">' . $produs["pret"] . ' lei</span>
              <button>Adauga in cos</button>
            </div>
          </div>';
      }
    }

    mysqli_close($conn);
    ?>
  </div>
</body>

</html>