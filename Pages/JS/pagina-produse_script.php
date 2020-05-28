<script>
  var categorie, pret, destinatar, varsta, nr_produse, nr_pagini, prod_per_pagina = 8,
    pagina_curenta = 1,
    ord = 'vandute';
  // initializare pagina:
  PageInit();

  function getCurentURL_parameters() {
    var url_parameters = '?c=' + categorie;
    if (pret != null)
      url_parameters += '&pret=' + pret;
    if (destinatar != null)
      url_parameters += '&dest=' + destinatar;
    if (varsta != null)
      url_parameters += '&varsta=' + varsta;
    if (pagina_curenta != 1)
      url_parameters += '&page=' + pagina_curenta;
    return url_parameters;
  }

  function PageInit() {
    categorie = "<?php echo $_GET["c"] ?>";
    pret =
      <?php if (empty($_GET['pret']))
        echo 'null';
      else
        echo '"' . $_GET['pret'] . '"' ?>;
    destinatar =
      <?php if (empty($_GET['dest']))
        echo 'null';
      else
        echo '"' . $_GET['dest'] . '"' ?>;
    varsta = <?php if (empty($_GET['varsta']))
                echo 'null';
              else
                echo '"' . $_GET['varsta'] . '"' ?>;
    pagina_curenta = <?php if (empty($_GET['page']))
                        echo '1';
                      else
                        echo '"' . $_GET['page'] . '"' ?>;
    document.getElementById(categorie).checked = true;
    if (pret != null)
      pret.split(",").forEach(function(entry) {
        document.getElementById(entry).checked = true;
      })
    if (destinatar != null)
      destinatar.split(",").forEach(function(entry) {
        document.getElementById(entry).checked = true;
      })
    if (varsta != null)
      varsta.split(",").forEach(function(entry) {
        document.getElementById(entry).checked = true;
      })

    changeContent(getCurentURL_parameters());
  }

  function setCategorie(value) {
    categorie = value;
    pagina_curenta = 1;
    changeURL();
  }

  function updatePret() {
    pret = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox][name="pret"]:checked')
    if (checkboxes.length == 0)
      pret = null;
    for (var i = 0; i < checkboxes.length; i++) {
      pret.push(checkboxes[i].value)
    }
    pagina_curenta = 1;
    changeURL();

  }

  function updateDestinatar() {

    destinatar = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox][name="destinatar"]:checked')
    if (checkboxes.length == 0)
      destinatar = null;
    for (var i = 0; i < checkboxes.length; i++) {
      destinatar.push(checkboxes[i].value)
    }
    pagina_curenta = 1;
    changeURL();

  }

  function updateVarsta() {

    varsta = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox][name="varsta"]:checked')

    if (checkboxes.length == 0)
      varsta = null;
    for (var i = 0; i < checkboxes.length; i++) {
      varsta.push(checkboxes[i].value)
    }
    pagina_curenta = 1;
    changeURL();

  }

  function setOrd(ordine) {
    ord = ordine;
    pagina_curenta = 1;
    changeURL();
  }

  function setProdPerPagina(prod_nr) {
    prod_per_pagina = prod_nr;
    pagina_curenta = 1;
    changeURL();
  }

  function changeURL() {
    var url_parameters = getCurentURL_parameters();
    history.replaceState({}, null, 'pagina-produse.php' + url_parameters);

    changeContent(url_parameters);
  }

  function changeContent(url_parameters) {

    changeProduseList(url_parameters);

    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        nr_produse = this.responseText;
        document.getElementById("nr-produse").innerText = nr_produse;
        nr_pagini = parseInt((nr_produse - 1) / prod_per_pagina, 10) + 1;
        document.getElementById("nr-pagini").innerText = nr_pagini;

        document.getElementById("bot-bar").innerHTML = "";
        if (nr_pagini > 1)
          for (i = 1; i <= nr_pagini; i++) {
            if (i == pagina_curenta) {
              pageElement = '<div class="page" id="pageS" onclick="selectPage(' + i + ')"> ' + i + ' </div>';
            } else
              pageElement = '<div class="page" id="page" onclick="selectPage(' + i + ')"> ' + i + ' </div>';
            document.getElementById("bot-bar").innerHTML += pageElement;
          }

      }
    };
    xhttp.open("GET", "PHP/get_products_number.php" + url_parameters, true);
    xhttp.send();
  }

  function changeProduseList(url_parameters) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("produse-container").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "PHP/get_products.php" + url_parameters + '&limit=' + prod_per_pagina + '&ord=' + ord, true);
    xhttp.send();

  }

  function selectPage(pageNr) {
    var pages = document.getElementsByClassName("page");
    for (i = 0; i < pages.length; i++) {
      pages[i].style.backgroundColor = "wheat";
      pages[i].style.color = "black";
    }
    pages[pageNr - 1].style.backgroundColor = "brown";
    pages[pageNr - 1].style.color = "white";
    document.getElementById("pagina-curenta").innerText = pageNr;
    pagina_curenta = pageNr;

    change_page();
  }

  function change_page(url_parameters) {
    var url_parameters = getCurentURL_parameters();
    history.replaceState({}, null, 'pagina-produse.php' + url_parameters);

    changeProduseList(url_parameters);
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("produse-container").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "PHP/get_products.php" + url_parameters + '&limit=' + prod_per_pagina + '&ord=' + ord, true);
    xhttp.send();
  }
  <?php include "addProductInCart.js" ?>
</script>