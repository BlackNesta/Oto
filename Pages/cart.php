<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Online Toys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="/CSS/header.css" />
  <link rel="stylesheet" href="./CSS/cart-style.css" />
</head>

<body>
  <?php include "header.php" ?>

  <section>
    <div class="section-title">Cosul meu</div>
    <div class="produs">
      <a href="./produs.php"><img src="img/toy4.png" /></a>
      <div class="detalii-produs">
        <span class="produs-title">Ursulet de plus foarte dragalas</span>
        <span class="cantitate">
          <label for="cantitate">Cantitate:</label>
          <input type="number" name="cantitate" id="cantitate" value="1" min="1"></span>
        </span>
      </div>
      <div class="detalii-produs">
        <span class="pret">Pret: 299Ron</span>
        <span>
          <input type="submit" value="Sterge" class="button">
        </span>
      </div>
    </div>

    <div class="produs">
      <a href="./produs.php"><img src="img/toy2.png" /></a>
      <div class="detalii-produs">
        <span class="produs-title">
          Ursulet de plus foarte pufos
        </span>
        <span>
          <label for="cantitate">Cantitate:</label>
          <input type="number" name="cantitate" id="cantitate" value="1" min="1"></span>
        </span>
      </div>
      <div class="detalii-produs">
        <span class="pret">Pret: 399Ron</span>
        <span>
          <input type="submit" value="Sterge" class="button">
        </span>
      </div>
    </div>

    <div class="produs">
      <a href="./produs.php"><img src="img/toy1.png" /></a>
      <div class="detalii-produs">
        <span class="produs-title">Ursulet de plus pufos si dragalas</span>
        <span>
          <label for="cantitate">Cantitate:</label>
          <input type="number" name="cantitate" id="cantitate" value="1" min="1"></span>
        </span>
      </div>
      <div class="detalii-produs">
        <span class="pret">Pret: 599Ron</span>
        <span>
          <input type="submit" value="Sterge" class="button">
        </span>
      </div>
    </div>

    <div class="total-comanda">
      <div class="pret">
        Total: 900Ron
      </div>
      <div class="comanda-btn">
        <a href="comanda.php"><input type="submit" value="Finalizeaza comanda" class="button last-btn"></a>
      </div>
    </div>
  </section>
</body>

</html>