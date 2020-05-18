<?php

if (empty($_GET["id"])) {
    header('Location: produs.php?id=1');
}
$id_produs = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <title>Online Toys</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/header.css" />
    <link rel="stylesheet" href="./CSS/produs.css" />
</head>

<body>
    <?php
    include "header.php";
    include "PHP/db_connection.php";

    $result_produs = mysqli_query($conn, "SELECT * FROM produse where id='" . $id_produs . "'");

    if (!$result_produs)
        die("Database access failed: " . mysqli_error($conn));

    if (mysqli_num_rows($result_produs) == 0) {
        echo '<h1 style="text-align:center;"> Produsul cu id ' . $id_produs . ' nu a fost gasit.';
        exit();
    }

    $produs = mysqli_fetch_assoc($result_produs);

    $result_img = mysqli_query($conn, "SELECT * FROM imagini_produs where id_produs='" . $produs["id"] . "'");
    $img_prd = mysqli_fetch_assoc($result_img);
    ?>

    <div class="section top">
        <div class="slider-container">
            <div class="slides">
                <?php
                for ($i = 1; $i <= 5; $i++)
                    if ($img_prd['img' . $i] != NULL)
                        echo '<img class="slide-img" src="img/' . $img_prd["img" . $i] . '" alt="img' . $i . '" onclick="currentDiv(' . $i . ')">';
                ?>
            </div>
            <div class="slide-curent-container">
            <?php
                for ($i = 1; $i <= 5; $i++)
                    if ($img_prd['img' . $i] != NULL)
                        echo '<img class="slide-curent" src="img/' . $img_prd["img" . $i] . '" alt="img' . $i . '">';
                ?>
                <img class="slide-curent" src="img/toy1.png" alt="img1">
                <img class="slide-curent" src="img/toy2.png" alt="img2">
                <img class="slide-curent" src="img/toy3.png" alt="img3">
                <img class="slide-curent" src="img/toy4.png" alt="img4">
                <img class="slide-curent" src="img/toy5.png" alt="img5">
            </div>

        </div>

        <div class="produs">
            <div class="produs-title"><?php echo $produs['nume'] ?></div>
            <div class="produs-detalii">
                <div class="pret"><?php echo $produs['pret'] ?> lei</div>
                <div>
                    <button>Adauga in Cos</button>
                </div>
                <div>
                    <button>Adauga al Favorite</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section bot">
        <div class="tabs-container">
            <div class="tab" onclick="displayTab(1)">Descriere</div>
            <div class="tab" onclick="displayTab(2)">Specificatii</div>
            <div class="tab" onclick="displayTab(3)">Recenzi</div>
        </div>
        <div class="content">
            <div class="tab-content">
                <?php
                echo '<b>'.$produs['nume'].'</b><br>';
                 echo '&emsp;'.$produs['descriere'];
                ?>
            </div>
            <div class="tab-content">
                <div>Categorie:&nbsp; <?php echo $produs['categorie']?></div>
                <div>Destinatar:&nbsp; <?php echo $produs['destinatar']?></div>
                <div>Varsta:&nbsp; <?php echo $produs['varsta']?></div>
            </div>
            <div class="tab-content">
            <?php
                
                ?>
            </div>
        </div>
    </div>

    <script>
        /* source: https://www.w3schools.com/w3css/w3css_slideshow.asp  */
        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("slide-curent");
            var dots = document.getElementsByClassName("slide-img");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].style.opacity = "60%";
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].style.opacity = "100%";
        }

        function displayTab(slideIndex) {
            var i;
            var content = document.getElementsByClassName("tab-content");
            var tabs = document.getElementsByClassName("tab");
            for (i = 0; i < content.length; i++) {
                content[i].style.display = "none";
            }
            for (i = 0; i < tabs.length; i++) {
                tabs[i].style.color = "white";
                tabs[i].style.backgroundColor = "brown";
                tabs[i].style.opacity = "70%";
            }
            content[slideIndex - 1].style.display = "block";
            tabs[slideIndex - 1].style.color = "black";
            tabs[slideIndex - 1].style.backgroundColor = "wheat";
            tabs[slideIndex - 1].style.opacity = "100%";
        }
    </script>
</body>

</html>