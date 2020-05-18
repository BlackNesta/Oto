<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <title>Online Toys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="/CSS/header.css" />
  <link rel="stylesheet" href="./CSS/pagina-produse.css" />
</head>

<body>
  <?php include "header.php" ?>

  <?php
  //echo $_GET['c'];
  $_GET['c'] = 7;
  //echo $_GET['c'];
  ?>
  <div id="section">
    <div class="filtre-container">

      <div class="checkbox-filtre">
        <input type="checkbox" name="filtreCB" id="filtreCB">
        <label for="filtreCB">
          <span class="filtre-title">Filtre</span>
        </label>

        <div class="filtre">
          <div class="filtru-container">
            <div class="filtru-title"> Categorie </div>
            <div class="filtru">
              <input id="r1" type="radio" name="categorie" value="bebelusi">
              <label for="r1"><span class="radio">Jucării bebeluși</span></label>
            </div>
            <div class="filtru">
              <input id="r2" type="radio" name="categorie" value="creative">
              <label for="r2"><span class="radio">Jucării creative</span></label>
            </div>
            <div class="filtru">
              <input id="r3" type="radio" name="categorie" value="plus">
              <label for="r3"><span class="radio">Jucării de pluș</span></label>
            </div>
            <div class="filtru">
              <input id="r4" type="radio" name="categorie" value="masini">
              <label for="r4"><span class="radio">Mașini-trenulețe</span></label>
            </div>
            <div class="filtru">
              <input id="r5" type="radio" name="categorie" value="papusi">
              <label for="r5"><span class="radio">Păpuși</span></label>
            </div>
          </div>
          <div class="filtru-container">
            <div class="filtru-title"> Pret - lei </div>
            <div class="filtru">
              <input id="pret1" type="Checkbox" name="pret" value="0-50">
              <label for="pret1"><span class="checkbox">0-50</span></label>
            </div>
            <div class="filtru">
              <input id="pret2" type="Checkbox" name="pret" value="50-100">
              <label for="pret2"><span class="checkbox">50-100</span></label>
            </div>
            <div class="filtru">
              <input id="pret3" type="Checkbox" name="pret" value="100-150">
              <label for="pret3"><span class="checkbox">100-150</span></label>
            </div>
            <div class="filtru">
              <input id="pret4" type="Checkbox" name="pret" value="150-200">
              <label for="pret4"><span class="checkbox">150-200</span></label>
            </div>
            <div class="filtru">
              <input id="pret5" type="Checkbox" name="pret" value="200-250">
              <label for="pret5"><span class="checkbox">200-250</span></label>
            </div>
          </div>
          <div class="filtru-container">
            <div class="filtru-title"> Destinatar </div>
            <div class="filtru">
              <input id="d1" type="Checkbox" name="destinatar" value="baieti">
              <label for="d1"><span class="checkbox">baieti</span></label>
            </div>
            <div class="filtru">
              <input id="d2" type="Checkbox" name="destinatar" value="fete">
              <label for="d2"><span class="checkbox">fete</span></label>
            </div>
          </div>
          <div class="filtru-container">
            <div class="filtru-title"> Varsta </div>
            <div class="filtru">
              <input id="v1" type="Checkbox" name="varsta" value="prescolari">
              <label for="v1"><span class="checkbox">prescolari</span></label>
            </div>
            <div class="filtru">
              <input id="v2" type="Checkbox" name="varsta" value="scolari">
              <label for="v2"><span class="checkbox">scolari</span></label>
            </div>
            <div class="filtru">
              <input id="v3" type="Checkbox" name="varsta" value="adolescenti">
              <label for="v3"><span class="checkbox">adolescenti</span></label>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="produse-container">
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk.png" alt="img-produs">
          <div class="nume">Birou</div>
        </a>
        <div class="details">
          <span class="price">$199.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk2.png" alt="img-produs">
          <div class="nume">Birou2</div>
        </a>
        <div class="details">
          <span class="price">$299.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk3.png" alt="img-produs">
          <div class="nume">Birou3</div>
        </a>
        <div class="details">
          <span class="price">$399.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk.png" alt="img-produs">
          <div class="nume">Birou</div>
        </a>
        <div class="details">
          <span class="price">$199.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk2.png" alt="img-produs">
          <div class="nume">Birou2</div>
        </a>
        <div class="details">
          <span class="price">$299.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk3.png" alt="img-produs">
          <div class="nume">Birou3</div>
        </a>
        <div class="details">
          <span class="price">$399.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk.png" alt="img-produs">
          <div class="nume">Birou</div>
        </a>
        <div class="details">
          <span class="price">$199.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk2.png" alt="img-produs">
          <div class="nume">Birou2</div>
        </a>
        <div class="details">
          <span class="price">$299.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk3.png" alt="img-produs">
          <div class="nume">Birou3</div>
        </a>
        <div class="details">
          <span class="price">$399.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk.png" alt="img-produs">
          <div class="nume">Birou</div>
        </a>
        <div class="details">
          <span class="price">$199.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>
      <div class="produs">
        <a href="produs.php">
          <img src="img/desk2.png" alt="img-produs">
          <div class="nume">Birou2</div>
        </a>
        <div class="details">
          <span class="price">$299.99</span>
          <button>Adauga in cos</button>
        </div>
      </div>

    </div>

  </div> <!-- section -->
</body>
<script>

</script>

</html>