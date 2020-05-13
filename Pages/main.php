<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <title>Online Toys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="./header.css" />
  <link rel="stylesheet" href="./main-style.css" />
</head>

<body>
  <header>
    <div class="logo-container">
      <a href="main.php">
        <img class="logo" src="./img/toy.png" alt="logo" />
      </a>
      <h4 class="logo-title">Online Toys</h4>
    </div>
    <div class="search-box">
      <input class="search-text" type="text" placeholder="Search.." name="search">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
      </button>
    </div>
    <div class="nav">
      <a class="nav_comp" href="account.php">
        <img class="nav_img" src="./img/account_icon.png" alt="acount" />
        <div class="nav_text">Cont</div>
      </a>
      <a class="nav_comp" href="favorite.php">
        <img class="nav_img" src="./img/heart_incon.png" alt="favorites" />
        <div class="nav_text">Favorite</div>
      </a>
      <a class="nav_comp" href="cart.php">
        <img class="nav_img" src="./img/cart_icon.png" alt="cart" />
        <div class="nav_text">Cos</div>
      </a>
    </div>
  </header>


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
    <!-- Varianta dropdown pozitie relativa 
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
    -->
  </div>

  <div id="title-produse"> Cele mai populare jucarii</div>
  <div id="produse">
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

</body>

</html>