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
    <?php include "header.php" ;
        session_start();
 
        // Verific daca nu sunt deja logat
        if(!isset($_SESSION["loggedin"])){
            header("location: ./login-register.php");
            exit;
        }
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

            <form class="right" mathod="post" autocomplete="off">
                <div class="date">
                    <div class="linie-date">
                        <label for="nume">Nume: </label>
                        <input type="text" name="nume" id="nume" value=<?php echo $_SESSION["nume"]?> disabled="disabled">
                    </div>
                    <div class="linie-date">
                        <label for="prenume">Prenume: </label>
                        <input type="text" name="prenume" id="prenume"  value=<?php echo $_SESSION["prenume"]?> disabled="disabled">
                    </div>
                    <div class="linie-date">
                        <label for="email">Email: </label>
                        <input type="text" name="email" id="email"  value=<?php echo $_SESSION["email"]?>>
                    </div>
                    <div class="linie-date">
                        <label for="teleon">Telefon: </label>
                        <input type="text" name="telefon" id="teleon" value=<?php echo $_SESSION["telefon"]?> >
                    </div>
                    
                    <div class="linie-date">
                        <label for="adresa">Adresa: </label>
                        <input type="text" name="adresa" id="adresa"value=<?php echo $_SESSION["adresa"]?> >
                    </div>
                    <div class="linie-date">
                        <label for="parola">Parola: </label>
                        <input type="password" name="parola" id="parola">
                    </div>
                    <div class="linie-date">
                        <label for="reparola">Confirma parola: </label>
                        <input type="password" name="reparola" id="reparola">
                    </div>
                    <div class="btn">
                        <input type="submit" value="Update" class="button">
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
            <div class="comanda">
                <span>112</span>
                <span>29. 02. 1999</span>
                <span class="align-center">426.90 Ron</span>
                <span>Livrare</span>
                <span class="align-center">Cash</span>
                <button class="button btn-comanda" onclick="displayComanda(1)">Vezi comanda</button>
            </div>
            <div class="detalii-comanda">
                <div class="produs produs-header">
                    <div>Nume</div>
                    <div>Cod produs</div>
                    <div>Pret</div>
                </div>
                <div class="produs">
                    <div>Jucarie1</div>
                    <div>125356</div>
                    <div>400.00</div>
                </div>
                <div class="produs">
                    <div>Jucarie2</div>
                    <div>125356</div>
                    <div>423.90</div>
                </div>
            </div>

        </div>
        <div class="comanda-container">
            <div class="comanda">
                <span>122</span>
                <span>09. 12. 2020</span>
                <span class="align-center">62.49 Ron</span>
                <span>Procesare</span>
                <span class="align-center">Card</span>
                <button class="button btn-comanda" onclick="displayComanda(2)">Vezi comanda</button>
            </div>
            <div class="detalii-comanda">
                <div class="produs produs-header">
                    <div>Nume</div>
                    <div>Cod produs</div>
                    <div>Pret</div>
                </div>
                <div class="produs">
                    <div>Jucarie1</div>
                    <div>125356</div>
                    <div>400.00</div>
                </div>
                <div class="produs">
                    <div>Jucarie2</div>
                    <div>125356</div>
                    <div>423.90</div>
                </div>
            </div>
        </div>
        <!-- 
            <div class="comandav2">
                <div>
                    <span>ID Comanda</span>
                    <span>123</span>
                </div>
                <div>
                    <span>Data</span>
                    <span>0.9.12.2019</span>
                </div>
                <div>
                    <span>Total</span>
                    <span>0.9.12.2019</span>
                </div>
                <div>
                    <span>Status</span>
                    <span>0.9.12.2019</span>
                </div>
                <div>
                    <span>Plata</span>
                    <span>0.9.12.2019</span>
                </div>
                <div>
                    <span>Detalii</span>
                    <span>0.9.12.2019</span>
                </div>
            </div>
        -->
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