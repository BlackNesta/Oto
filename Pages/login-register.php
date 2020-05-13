<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acount</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./header.css" />
    <link rel="stylesheet" href="./login-register-style.css" />
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

    <div class="fomrs-container">
        <form class="box" action="#" method="post">
            <h1>Login</h1>
            <input type="text" name="username" placeholder="Nume de utilizator">
            <input type="password" name="parola" placeholder="Parola">
            <input type="submit" name="login" value="Login">
        </form>
        <form class="box" action="#" method="post">
            <h1>Register</h1>
            <input type="text" name="username" placeholder="Nume de utilizator">
            <input type="text" name="name" placeholder="Nume">
            <input type="text" name="first-name" placeholder="Prenume">
            <input type="text" name="Email" placeholder="Email">
            <input type="password" name="parola" placeholder="Parola">
            <input type="password" name="parola2" placeholder="Confirma parola">
            <input type="submit" name="Register" value="Register">
        </form>
    </div>
</body>

</html>