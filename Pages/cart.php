<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Online Toys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="./CSS/header.css" />
  <link rel="stylesheet" href="./CSS/cart-style.css" />
</head>

<body>
  <?php include "header.php" ?>

  <section>
    <div class="section-title">Cosul meu</div>
    <div id="produse">

    </div>
    <div class="total-comanda">
      <div class="pret">
        Total: <span id="total-value">900</span>Ron
      </div>
      <div class="comanda-btn">
        <a href="comanda.php"><input type="submit" value="Finalizeaza comanda" class="button last-btn"></a>
      </div>
    </div>
  </section>

  <?php include "JS/cart_script.php" ?>
</body>

</html>