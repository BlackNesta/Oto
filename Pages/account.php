<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Toys</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/header.css" />
    <link rel="stylesheet" href="./CSS/account-style.css" />
</head>

<body>
    <?php
    session_start();
    // Daca nu stun logat redirectionez spre login
    if (!isset($_SESSION["loggedin"])) {
        header("location: ./login-register.php");
        exit;
    }
    if (isset($_SESSION["id"]))
        if ($_SESSION["id"] == 1) {
            header("location: ./admin.php");
            exit;
        }
    include "header.php";
    include "./PHP/detalii_cont.php";
    ?>

    <section class="account">
        <div class="title">
            Contul meu:
            <span class="username"><?php echo $_SESSION["username"] ?></span>
        </div>
        <div class="date-flex">
            <section class="left">
                <div class="account-img">
                    <img src="./img/account_icon.png" alt="account">
                </div>
                <div class="btn">
                    <a href="logout.php"><input type="submit" name="" value="Logout" class="button"></a>
                </div>
            </section>

            <form class="right" action="#" method="post">
                <div class="date">
                    <div class="linie-date">
                        <label for="nume">Nume: </label>
                        <input type="text" name="nume" id="nume" value="<?php echo $_SESSION["nume"] ?>">
                    </div>
                    <div class="help-block"><?php echo $err_nume; ?></div>

                    <div class="linie-date">
                        <label for="prenume">Prenume: </label>
                        <input type="text" name="prenume" id="prenume" value="<?php echo $_SESSION["prenume"]; ?>">
                    </div>
                    <div class="help-block"><?php echo $err_prenume; ?></div>

                    <div class="linie-date">
                        <label for="email">Email: </label>
                        <input type="text" name="email" id="email" value="<?php echo $_SESSION["email"] ?>">
                    </div>
                    <div class="help-block"><?php echo $err_email; ?></div>

                    <div class="linie-date">
                        <label for="teleon">Telefon: </label>
                        <input type="text" name="telefon" id="teleon" value="<?php echo $_SESSION["telefon"] ?>">
                    </div>
                    <div class="help-block"><?php echo $err_telefon; ?></div>

                    <div class="linie-date">
                        <label for="adresa">Adresa: </label>
                        <input type="text" name="adresa" id="adresa" value="<?php echo $_SESSION["adresa"] ?> ">
                    </div>
                    <div class="help-block"><?php echo $err_adresa; ?></div>

                    <div class="linie-date">
                        <label for="parola1">Parola: </label>
                        <input type="password" name="parola1" id="parola1">
                    </div>
                    <div class="help-block"><?php echo $err_parola1; ?></div>

                    <div class="linie-date">
                        <label for="parola2">Confirma parola: </label>
                        <input type="password" name="parola2" id="parola2">
                    </div>
                    <div class="help-block"><?php echo $err_parola2; ?></div>

                    <div class="btn">
                        <input type="submit" name="update" value="Update" class="button">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="comenzi">
        <div class="title">Comenzile mele</div>
        <div class="header-comenzi">
            <span>ID Comanda</span>
            <span>Data</span>
            <span class="align-center">Total</span>
            <span>Status</span> <!-- Procesare, Livrare, Livrat -->
            <span class="align-center">Plata</span>
            <span>Detalii</span>
        </div>
        <div class="comanda-container">
            <?php
            include "./PHP/comenzile_mele.php";
            ?>

        </div>
    </section>
</body>
<script>
    function displayComanda(slideIndex) {
        var i;
        var comanda = document.getElementsByClassName("detalii-comanda");
        var button = document.getElementsByClassName("btn-comanda")
        /*for (i = 0; i < comanda.length; i++) {
            comanda[i].style.display = "none";
        }*/
        if (comanda[slideIndex - 1].style.display == "block")
            comanda[slideIndex - 1].style.display = "none";
        else
            comanda[slideIndex - 1].style.display = "block";

        if (button[slideIndex - 1].textContent == "Vezi comanda")
            button[slideIndex - 1].textContent = "Ascunde comanda";
        else
            button[slideIndex - 1].textContent = "Vezi comanda"
    }
</script>

</html>