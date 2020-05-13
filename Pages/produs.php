<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <title>Online Toys</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/header.css" />
    <link rel="stylesheet" href="/CSS/produs.css" />
</head>

<body>
    <?php include "header.php" ?>

    <div class="section top">
        <div class="slider-container">
            <div class="slides">
                <img class="slide-img" src="img/toy1.png" alt="img1" onclick="currentDiv(1)">
                <img class="slide-img" src="img/toy2.png" alt="img2" onclick="currentDiv(2)">
                <img class="slide-img" src="img/toy3.png" alt="img3" onclick="currentDiv(3)">
                <img class="slide-img" src="img/toy4.png" alt="img4" onclick="currentDiv(4)">
                <img class="slide-img" src="img/toy5.png" alt="img5" onclick="currentDiv(5)">
            </div>
            <div class="slide-curent-container">
                <img class="slide-curent" src="img/toy1.png" alt="img1">
                <img class="slide-curent" src="img/toy2.png" alt="img2">
                <img class="slide-curent" src="img/toy3.png" alt="img3">
                <img class="slide-curent" src="img/toy4.png" alt="img4">
                <img class="slide-curent" src="img/toy5.png" alt="img5">
            </div>

        </div>

        <div class="produs">
            <div class="produs-title">
                Jucarie de plus Mappy Fluffy Friends, Ursul cu pui</div>
            <div class="produs-detalii">
                <div class="pret">99 lei</div>
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
                content1<br>
                content1<br>
            </div>
            <div class="tab-content">
                content2
            </div>
            <div class="tab-content">
                content3
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