<?php
if (empty($_GET["c"])) {
  header('Location: pagina-produse.php?c=toate');
}
$c_array = array("toate", "bebelusi", "creative", "plus", "masini", "papusi");
if (!in_array($_GET["c"], $c_array)) {
  header('Location: pagina-produse.php?c=toate');
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <title>Online Toys - Jucarii</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="./CSS/header.css" />
  <link rel="stylesheet" href="./CSS/pagina-produse.css" />
</head>

<body>
  <?php
  include "header.php";
  ?>
  <div id="section">
    <div class="filtre-container">

      <div class="checkbox-filtre">
        <input type="checkbox" name="filtreCB" id="filtreCB">
        <label for="filtreCB">
          <span class="filtre-title">Filtre</span>
        </label>

        <div class="filtre">
          <div class="filtru-container">
            <div class="filtru-title"> Categorie </div>
            <div class="filtru">
              <input id="toate" type="radio" name="categorie" value="toate" onclick="setCategorie('toate')">
              <label for="toate"><span class="radio">Toate jucăriile</span></label>
            </div>
            <div class="filtru">
              <input id="bebelusi" type="radio" name="categorie" value="bebelusi" onclick="setCategorie('bebelusi')">
              <label for="bebelusi"><span class="radio">Jucării bebeluși</span></label>
            </div>
            <div class="filtru">
              <input id="creative" type="radio" name="categorie" value="creative" onclick="setCategorie('creative')">
              <label for="creative"><span class="radio">Jucării creative</span></label>
            </div>
            <div class="filtru">
              <input id="plus" type="radio" name="categorie" value="plus" onclick="setCategorie('plus')">
              <label for="plus"><span class="radio">Jucării de pluș</span></label>
            </div>
            <div class="filtru">
              <input id="masini" type="radio" name="categorie" value="masini" onclick="setCategorie('masini')">
              <label for="masini"><span class="radio">Mașini,trenulețe</span></label>
            </div>
            <div class="filtru">
              <input id="papusi" type="radio" name="categorie" value="papusi" onclick="setCategorie('papusi')">
              <label for="papusi"><span class="radio">Păpuși</span></label>
            </div>
          </div>

          <div class="filtru-container">
            <div class="filtru-title"> Pret - lei </div>
            <div class="filtru">
              <input id="0-50" type="Checkbox" name="pret" value="0-50" onclick="updatePret()">
              <label for="0-50"><span class="checkbox">0-50</span></label>
            </div>
            <div class="filtru">
              <input id="50-100" type="Checkbox" name="pret" value="50-100" onclick="updatePret()">
              <label for="50-100"><span class="checkbox">50-100</span></label>
            </div>
            <div class="filtru">
              <input id="100-150" type="Checkbox" name="pret" value="100-150" onclick="updatePret()">
              <label for="100-150"><span class="checkbox">100-150</span></label>
            </div>
            <div class="filtru">
              <input id="150-200" type="Checkbox" name="pret" value="150-200" onclick="updatePret()">
              <label for="150-200"><span class="checkbox">150-200</span></label>
            </div>
            <div class="filtru">
              <input id="200-250" type="Checkbox" name="pret" value="200-250" onclick="updatePret()">
              <label for="200-250"><span class="checkbox">200-250</span></label>
            </div>
            <div class="filtru">
              <input id="250-999" type="Checkbox" name="pret" value="250-999" onclick="updatePret()">
              <label for="250-999"><span class="checkbox">250+</span></label>
            </div>
          </div>
          <div class="filtru-container">
            <div class="filtru-title">
              <span>Destinatar</span>
              <img src="./img/question_mark.png" alt="question_mark">
              <span class="explicatie">Filtru exclusiv: va selecta doar jucariile care au exact destinatarul ales ( baieti, fete sau baieti-fete) </span>
            </div>
            <div class="filtru">
              <input id="baieti" type="Checkbox" name="destinatar" value="baieti" onclick="updateDestinatar()">
              <label for="baieti"><span class="checkbox">baieti</span></label>
            </div>
            <div class="filtru">
              <input id="fete" type="Checkbox" name="destinatar" value="fete" onclick="updateDestinatar()">
              <label for="fete"><span class="checkbox">fete</span></label>
            </div>
          </div>
          <div class="filtru-container">
            <div class="filtru-title">
              <span>Varsta</span>
              <img src="./img/question_mark.png" alt="question_mark">
              <span class="explicatie">Filtru inclusiv: va selecta jucariile care sunt destinate cel putin unei categorii de varsta alese </span>
            </div>
            <div class="filtru">
              <input id="prescolari" type="Checkbox" name="varsta" value="prescolari" onclick="updateVarsta()">
              <label for="prescolari"><span class="checkbox">prescolari</span></label>
            </div>
            <div class="filtru">
              <input id="scolari" type="Checkbox" name="varsta" value="scolari" onclick="updateVarsta()">
              <label for="scolari"><span class="checkbox">scolari</span></label>
            </div>
            <div class="filtru">
              <input id="adolescenti" type="Checkbox" name="varsta" value="adolescenti" onclick="updateVarsta()">
              <label for="adolescenti"><span class="checkbox">adolescenti</span></label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="top-bar">
      <div class="ordonare-container container">
        Ordoneaza dupa:
        <select id="ordonare" name="ordonare" onchange="setOrd(value)">
          <option value="id">ID</option>
          <option value="nume">Nume</option>
          <option value="vandute" selected>Cele mai vandute</option>
          <option value="pret-ASC">Pret crescator</option>
          <option value="pret-DESC">Pret descrescator</option>
        </select>
      </div>
      <div class="prod-per-pagina-container container">
        Produse pe pagina:
        <select id="prod-per-pagina" name="prod-per-pagina" onchange="setProdPerPagina(value)">
          <option value="3">3</option>
          <option value="4" selected>4</option>
          <option value="6">6</option>
          <option value="10">10</option>
          <option value="18">18</option>
          <option value="32">32</option>
        </select>
      </div>
      <div class="nr-produse-container container">
        Numar produse: <span id="nr-produse"> </span>
      </div>
      <div class="paginare-container container">
        Pagina <span id="pagina-curenta">
          1</span>
        din
        <span id="nr-pagini">1</span>
      </div>
    </div>

    <div id="produse-container">

    </div>

    <div id="bot-bar">

    </div>

  </div> <!-- section -->
</body>

<script>
  var categorie, pret, destinatar, varsta, nr_produse, nr_pagini, prod_per_pagina = 4,
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
</script>

</html>