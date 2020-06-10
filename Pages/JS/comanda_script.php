<script>
    loggedin =
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
            echo 'true';
        else
            echo 'false';
        ?>;
    if (loggedin)
        userId =
        <?php
        if (isset($_SESSION["id"]))
            echo $_SESSION["id"];
        else
            echo 0;
        ?>;
    var localProducts = localStorage.getItem("cartProducts");
    var localCount = localStorage.getItem("countProducts");

    function hidePJ() {
        var PJ = document.getElementsByClassName("PJ");
        for (i = 0; i < PJ.length; i++) {
            PJ[i].style.visibility = "hidden";
            PJ[i].style.position = "absolute";
        }
    }

    function showPJ() {
        var PJ = document.getElementsByClassName("PJ");
        for (i = 0; i < PJ.length; i++) {
            PJ[i].style.visibility = "visible";
            PJ[i].style.position = "static";
        }
    }

    function plaseazaComanda() {
        plata_options = document.getElementsByName("plata");
        for (var i = 0, length = plata_options.length; i < length; i++) {
            if (plata_options[i].checked) {
                plata = plata_options[i].value;
                break;
            }
        }
        livrare_options = document.getElementsByName("livrare");
        for (var i = 0, length = livrare_options.length; i < length; i++) {
            if (livrare_options[i].checked) {
                livrare = livrare_options[i].value;
                break;
            }
        }
        if (loggedin)
            comandaUser(plata, livrare);
        else
            comandaVizitator(plata, livrare).then(clearLocalStorage());
    }

    function comandaUser(plata, livrare) {
        return new Promise(resolve => {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    setTimeout(() => {
                        resolve();
                    }, 200)
                }
            };
            xhttp.open("GET", "PHP/plaseaza_comanda.php?userId=" + userId + "&plata=" + plata + "&livrare=" + livrare, true);
            xhttp.send();
        });
    }

    function comandaVizitator(plata, livrare) {
        return new Promise(resolve => {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    setTimeout(() => {
                        resolve();
                    }, 200)
                }
            };
            xhttp.open("GET", "PHP/plaseaza_comanda.php?userId=" + 0 + "&items=" + localProducts + "&count=" + localCount + "&plata=" + plata + "&livrare=" + livrare, true);
            xhttp.send();
        });
    }

    function clearLocalStorage() {
        localStorage.removeItem("cartProducts");
        localStorage.removeItem("countProducts");
    }
</script>