<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Online Toys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="./CSS/header.css" />
  <link rel="stylesheet" href="./CSS/cart-style.css" />
</head>

<body>
  <?php include "header.php" ?>

  <section>
    <div class="section-title">Cosul meu</div>
    <div id="produse">

    </div>
    <div class="total-comanda">
      <div class="pret">
        Total: <span id="total-value">900<span>Ron
      </div>
      <div class="comanda-btn">
        <a href="comanda.php"><input type="submit" value="Finalizeaza comanda" class="button last-btn"></a>
      </div>
    </div>
  </section>

  <script>
    //localStorage.clear("cartProducts");
    var products = localStorage.getItem("cartProducts");
    console.log((products));
    if (products == null || products == '[]')
      document.getElementById("produse").innerHTML = '<h2 style="text-align: center;">Nu aveti niciun produs in cos<h2>';
    else
    {
      LoadCartProducts(products).then(UpdateTotal);
    }

    function LoadCartProducts(products) {
      return new Promise(resolve => {
        var i, cont, val;
        var ids = '',
          count = '';
        productsArray = Object.values(JSON.parse(products));
        //console.log(productsArray);
        while (productsArray.length != 0) {
          i = 0, cont = 0;
          val = productsArray[i];
          while (i < productsArray.length) {
            if (val == productsArray[i]) {
              productsArray.splice(i, 1);
              cont++;
            } else
              i++;
          }
          if (ids == '') {
            ids += val;
            count += cont;
          } else {
            ids += ',' + val;
            count += ',' + cont;
          }
        }
        console.log(productsArray);
        console.log(ids);
        console.log(count);

        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("produse").innerHTML += this.responseText;
            resolve();
          }
        };
        xhttp.open("GET", "PHP/get_cart_products.php?items=" + ids + "&count=" + count, true);
        xhttp.send();
      });
    }

    function DeleteProduct(id_produs) {
      document.getElementById("produs" + id_produs).remove();
      products = products.replace(id_produs, "");
      products = products.replace("[,", "[");
      products = products.replace(",]", "]");
      products = products.replace(",,", ",");
      console.log(products);
      localStorage.setItem("cartProducts", products);
    }

    function UpdateTotal() {
      total = 0;
      preturi = document.getElementsByClassName("pret-value");
      cantitati = document.getElementsByName("cantitate");
      for (i = 0; i < preturi.length; i++){
        total += parseFloat(preturi[i].textContent)*parseInt(cantitati[i].value);
      }
      document.getElementById("total-value").textContent = total;
    }
  </script>
</body>

</html>