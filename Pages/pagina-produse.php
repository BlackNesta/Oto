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
  <title>Online Toys</title>
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
              <label for="masini"><span class="radio">Mașini-trenulețe</span></label>
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
            <div class="filtru-title"> Destinatar </div>
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
            <div class="filtru-title"> Varsta </div>
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


    <div id="produse-container">

    </div> <!-- section -->
</body>
<script>
  var categorie, pret, destinatar, varsta;
  // initializare pagina:
  PageInit();

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

    document.getElementById(categorie).checked = true;
    if (pret != null) {
      split_pret = pret.split('-');
      var checkboxes = document.querySelectorAll('input[type=checkbox][name="pret"]')
      for (var i = 0; i < checkboxes.length; i++) {
        if (parseInt(checkboxes[i].value.split('-')[0]) >= parseInt(split_pret[0]) &&
          parseInt(checkboxes[i].value.split('-')[1]) <= parseInt(split_pret[1])) {
          checkboxes[i].checked = true
        }
        console.log(checkboxes[i].value.split('-')[0] + '>=' + split_pret[0] + ' && ' + checkboxes[i].value.split('-')[1] + '<=' + split_pret[1])
      }
    }
    if (destinatar != null)
      destinatar.split(",").forEach(function(entry) {
        document.getElementById(entry).checked = true;
      })
    if (varsta != null)
      varsta.split(",").forEach(function(entry) {
        document.getElementById(entry).checked = true;
      })

    changeURL_content();
  }

  function setCategorie(value) {
    categorie = value;
    changeURL_content();
  }

  function updatePret() {
    pret = "";
    var checkboxes = document.querySelectorAll('input[type=checkbox][name="pret"]')

    var first_checked,
      last_checked;

    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked == true) {
        last_checked = i;
        if (first_checked == null)
          first_checked = i;
      }
    }

    if (first_checked == null) {
      pret = null;
    } else {

      for (var i = first_checked; i < last_checked; i++)
        checkboxes[i].checked = true

      if (first_checked == last_checked)
        pret = checkboxes[first_checked].value;
      else {
        split1 = checkboxes[first_checked].value.split("-");
        split2 = checkboxes[last_checked].value.split("-");
        pret = split1[0] + '-' + split2[1];
      }

    }

    changeURL_content();

  }

  function updateDestinatar() {

    destinatar = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox][name="destinatar"]:checked')
    if (checkboxes.length == 0)
      destinatar = null;
    for (var i = 0; i < checkboxes.length; i++) {
      destinatar.push(checkboxes[i].value)
    }
    changeURL_content();

  }

  function updateVarsta() {

    varsta = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox][name="varsta"]:checked')

    if (checkboxes.length == 0)
      varsta = null;
    for (var i = 0; i < checkboxes.length; i++) {
      varsta.push(checkboxes[i].value)
    }
    changeURL_content();

  }

  function changeURL_content() {
    var url_parameters = '?c=' + categorie;
    if (pret != null)
      url_parameters += '&pret=' + pret;
    if (destinatar != null)
      url_parameters += '&dest=' + destinatar;
    if (varsta != null)
      url_parameters += '&varsta=' + varsta;
    history.replaceState({}, null, 'pagina-produse.php' + url_parameters);

    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("produse-container").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "PHP/get_products.php" + url_parameters, true);
    xhttp.send();
  }
</script>

</html>