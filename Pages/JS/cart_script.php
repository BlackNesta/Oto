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
  //console.log("Local products: " + localProducts);
  //console.log("Local count: " + localCount);

  if (loggedin) {
    if (localProducts != null && localProducts != '[]')
      MoveLocalToDb(localProducts, localCount, userId).then(LoadUserCartProducts(userId)).then(UpdateTotal);
    else
      LoadUserCartProducts(userId).then(UpdateTotal);
  } else {
    if (localProducts == null || localProducts == '[]')
      document.getElementById("produse").innerHTML = '<h2 style="text-align: center;">Nu aveti niciun produs in cos<h2>';
    else {
      LoadLocalCartProducts(localProducts, localCount).then(UpdateTotal);
    }
  }

  function MoveLocalToDb(productsIds, count, userId) {
    localStorage.clear("cartProducts");
    localStorage.clear("countProducts");
    return new Promise(resolve => {
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          //document.getElementById("produse").innerHTML += this.responseText;
          setTimeout(() => {
            resolve();
          }, 200)
        }
      };
      xhttp.open("GET", "PHP/cart/cart_local_to_db.php?items=" + productsIds + "&count=" + count + "&userId=" + userId, true);
      xhttp.send();
    });
  }

  function LoadUserCartProducts(userId) {
    //console.log("LoadUserCartProducts...");
    return new Promise(resolve => {
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("produse").innerHTML += this.responseText;
          resolve();
        }
      };
      xhttp.open("GET", "PHP/cart/get_user_cart_products.php?userId=" + userId, true);
      xhttp.send();
    });
  }

  function LoadLocalCartProducts(productsIds, count) {
    return new Promise(resolve => {
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("produse").innerHTML += this.responseText;
          resolve();
        }
      };
      xhttp.open("GET", "PHP/cart/get_local_cart_products.php?items=" + productsIds + "&count=" + count, true);
      xhttp.send();
    });
  }

  function DeleteProduct(id_produs) {

    document.getElementById("produs" + id_produs).remove();

    if (loggedin) {
      DeleteProductFromDB(userId, id_produs);
    } else {

      productsObject = JSON.parse(localStorage.getItem("cartProducts"));;
      countObject = JSON.parse(localStorage.getItem("countProducts"));;

      //console.log("Before: " + productsObject + " | " + countObject);

      const index = Object.values(productsObject).indexOf(id_produs);
      delete productsObject[index];
      delete countObject[index];

      products = JSON.stringify(productsObject);
      count = JSON.stringify(countObject);

      //console.log("After: " + productsObject + " | " + countObject);

      products = products.replace("null", "");
      products = products.replace("[,", "[");
      products = products.replace(",]", "]");
      products = products.replace(",,", ",");

      count = count.replace("null", "");
      count = count.replace("[,", "[");
      count = count.replace(",]", "]");
      count = count.replace(",,", ",");

      //console.log("After strings: " + products + " | " + count);

      localStorage.setItem("cartProducts", products);
      localStorage.setItem("countProducts", count);

    }

    UpdateTotal();
  }

  function DeleteProductFromDB(userId, id_produs) {
    return new Promise(resolve => {
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          resolve();
        }
      };
      xhttp.open("GET", "PHP/cart/delete_cart_product.php?userId=" + userId + "&id_produs=" + id_produs, true);
      xhttp.send();
    });
  }

  function ChangeQuantity(id_produs, quantity) {

    if (loggedin) {
      ChangeQuantityFromDB(userId, id_produs, quantity);
    } else {

      productsObject = JSON.parse(localStorage.getItem("cartProducts"));;
      countObject = JSON.parse(localStorage.getItem("countProducts"));;

      //console.log("Before: " + productsObject + " | " + countObject);

      const index = Object.values(productsObject).indexOf(id_produs);
      countObject[index] = quantity;

      //console.log("After: " + productsObject + " | " + countObject);

      localStorage.setItem("cartProducts", JSON.stringify(productsObject));
      localStorage.setItem("countProducts", JSON.stringify(countObject));

    }

    UpdateTotal();

  }

  function ChangeQuantityFromDB(userId, id_produs, quantity) {
    return new Promise(resolve => {
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          resolve();
        }
      };
      xhttp.open("GET", "PHP/cart/change_quantity_cart_product.php?userId=" + userId + "&id_produs=" + id_produs + "&quantity=" + quantity, true);
      xhttp.send();
    });
  }

  function UpdateTotal() {

    products = document.getElementsByClassName("produs");
    if (products.length == 0)
      document.getElementById("produse").innerHTML = '<h2 style="text-align: center;">Nu aveti niciun produs in cos<h2>';


    total = 0;
    preturi = document.getElementsByClassName("pret-value");
    cantitati = document.getElementsByName("cantitate");
    for (i = 0; i < preturi.length; i++) {
      total += parseFloat(preturi[i].textContent) * parseFloat(cantitati[i].value);
    }
    document.getElementById("total-value").textContent = total.toFixed(2);
  }
</script>