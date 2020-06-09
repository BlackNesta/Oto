<script>
    userId =
        <?php
        if (isset($_SESSION["id"]))
            echo $_SESSION["id"];
        else
            echo 0;
        ?>;

    function addProductInCart(id_produs) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
            }
        };
        xhttp.open("GET", "PHP/insert_product_in_cartDB.php?userId=" + userId + "&id_produs=" + id_produs, true);
        xhttp.send();
    }

    function deleteProductFromFav(id_produs) {

        const product = document.getElementById(id_produs);
        product.remove();

        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
            }
        };
        xhttp.open("GET", "PHP/delete_product_from_favDB.php?userId=" + userId + "&id_produs=" + id_produs, true);
        xhttp.send();
    }
</script>