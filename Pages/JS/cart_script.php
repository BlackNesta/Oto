<script>
    //localStorage.clear("cartProducts");  localStorage.clear("countProducts");
    
    var products = localStorage.getItem("cartProducts");
    var count = localStorage.getItem("countProducts");
    //console.log("products: " + products);
    //console.log("count: " + count);
    if (products == null || products == '[]')
      document.getElementById("produse").innerHTML = '<h2 style="text-align: center;">Nu aveti niciun produs in cos<h2>';
    else {
      LoadCartProducts(products, count).then(UpdateTotal);
    }

    function LoadCartProducts(productsIds, count) {
      return new Promise(resolve => {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("produse").innerHTML += this.responseText;
            resolve();
          }
        };
        xhttp.open("GET", "PHP/get_cart_products.php?items=" + productsIds + "&count=" + count, true);
        xhttp.send();
      });
    }

    function DeleteProduct(id_produs) {
      document.getElementById("produs" + id_produs).remove();

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

      if (products == null || products == '[]')
        document.getElementById("produse").innerHTML = '<h2 style="text-align: center;">Nu aveti niciun produs in cos<h2>';

    }

    function ChangeQuantity(id_produs, quantity) {
      productsObject = JSON.parse(localStorage.getItem("cartProducts"));;
      countObject = JSON.parse(localStorage.getItem("countProducts"));;

      //console.log("Before: " + productsObject + " | " + countObject);

      const index = Object.values(productsObject).indexOf(id_produs);
      countObject[index] = quantity;

      //console.log("After: " + productsObject + " | " + countObject);

      localStorage.setItem("cartProducts", JSON.stringify(productsObject));
      localStorage.setItem("countProducts", JSON.stringify(countObject));

      UpdateTotal();

    }

    function UpdateTotal() {
      total = 0;
      preturi = document.getElementsByClassName("pret-value");
      cantitati = document.getElementsByName("cantitate");
      for (i = 0; i < preturi.length; i++) {
        total += parseFloat(preturi[i].textContent) * parseFloat(cantitati[i].value);
      }
      document.getElementById("total-value").textContent = total.toFixed(2);
    }
  </script>