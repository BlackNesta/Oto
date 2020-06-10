<script>
    loggedin =
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
            echo 'true';
        else
            echo 'false';
        ?>;
    if (loggedin) {

        userId =
            <?php
            if (isset($_SESSION["id"]))
                echo $_SESSION["id"];
            else
                echo 0;
            ?>;
        document.getElementById("message-notloeggedin").style.display = "none";
    } else {
        document.getElementById("add-recenzie").style.display = "none";
    }

    /* source pt slideshow: https://www.w3schools.com/w3css/w3css_slideshow.asp  */
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

    var offset = 0;

    async function InitReviewsTab() {
        var scrollHeight = document.documentElement.scrollHeight;
        var clientHeight = document.documentElement.clientHeight;

        while (clientHeight >= scrollHeight && offset <= <?php echo $recenzii_number['n'] ?>) {
            await LoadReviews(<?php echo $id_produs ?>, 1, offset);
            offset += 1;
            scrollHeight = document.documentElement.scrollHeight;
            clientHeight = document.documentElement.clientHeight;
        }
    }

    function LoadReviews(id, n, offset) {
        return new Promise(resolve => {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("recenzii").innerHTML += this.responseText;
                    resolve();
                }
            };
            xhttp.open("GET", "PHP/get_reviews.php?id=" + id + "&n=" + n + "&offset=" + offset, true);
            xhttp.send();
        });
    }

    window.addEventListener('scroll', () => {
        var recenzii = document.getElementById('recenzii-container');
        if (recenzii.style.display == "block") {

            const {
                scrollTop,
                scrollHeight,
                clientHeight
            } = document.documentElement;
            if (clientHeight + scrollTop >= scrollHeight - 1) {
                LoadReviews(<?php echo $id_produs ?>, 3, offset);
                offset += 3;
            }
        }
    });
    window.addEventListener('resize', () => {
        InitReviewsTab();
    });

    function addProductInCart(id_produs) {
        if (!loggedin) {
            //console.log("nelogat");
            var products = JSON.parse(localStorage.getItem("cartProducts"));
            var count = JSON.parse(localStorage.getItem("countProducts"));
            //console.log("Before: " + products + " | " + count);
            if (products == null) {
                products = [];
                count = [];
            }
            const index = Object.values(products).indexOf(id_produs);
            if (index > -1) {
                count[index] = parseInt(count[index]) + 1;
            } else {
                products.push(id_produs);
                count.push(1);
            }

            //console.log("After: " + products + " | " + count);
            localStorage.setItem("cartProducts", JSON.stringify(products));
            localStorage.setItem("countProducts", JSON.stringify(count));

        } else {
            //console.log("logat");
            insertProductInCartDB(userId, id_produs);
        }
    }

    function insertProductInCartDB(userId, id_produs) {
        return new Promise(resolve => {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    resolve();
                }
            };
            xhttp.open("GET", "PHP/insert_product_in_cartDB.php?userId=" + userId + "&id_produs=" + id_produs, true);
            xhttp.send();
        });
    }

    function addProductInFav(id_produs){
        if (!loggedin) {
            window.location.href = "./login-register.php";
        }
        else{
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                }
            };
            xhttp.open("GET", "PHP/insert_product_in_FavDB.php?userId=" + userId + "&id_produs=" + id_produs, true);
            xhttp.send();
        }
    }

    function postReview() {
        textArea = document.getElementById("textarea");

        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                document.getElementById("recenzii").innerHTML = "";
                textArea.value = "";
                offset = 0;
                InitReviewsTab();
            }
        };

        const prenume = <?php 
            if (isset($_SESSION['prenume']))
                echo '"' . $_SESSION['prenume'] . '"';
            else echo '""'; ?>;
        const nume = <?php 
            if (isset($_SESSION['nume']))
                echo  '"' . $_SESSION['nume'] . '"';
            else echo '""'; ?>;
        xhttp.open("GET", "PHP/post_review.php?userName=" + prenume + " " + nume + "&id_produs=" + <?php echo $id_produs ?> + "&text=" + textArea.value, true);
        xhttp.send();
    }
</script>