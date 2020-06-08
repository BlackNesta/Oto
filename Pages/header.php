<header>
  <div class="logo-container">
    <a href="main.php">
      <img class="logo" src="./img/toy.png" alt="logo" />
    </a>
    <h4 class="logo-title">Online Toys</h4>
  </div>
  <div class="search-box">
    <div class="search-box-top">
      <input class="search-text" type="text" placeholder="Search.." id="searchInput">
      <button onclick="search()" type="submit" class="searchButton">
        <i class="fa fa-search"></i>
      </button>
    </div>
    <div id="search-results">
      <div class="categorii">
        <a href="pagina-produse.php?c=toate">
          <div class="result" id="toate">
            Toate jucariile
          </div>
        </a>
        <a href="pagina-produse.php?c=bebelusi">
          <div class="result" id="bebelusi">
            Categorie: bebelusi
          </div>
        </a>
        <a href="pagina-produse.php?c=creative">
          <div class="result" id="creative">
            Categorie: creative
          </div>
        </a>
        <a href="pagina-produse.php?c=plus">
          <div class="result" id="plus">
            Categorie: plus
          </div>
        </a>
        <a href="pagina-produse.php?c=masini">
          <div class="result" id="masini">
            Categorie: masini
          </div>
        </a>
        <a href="pagina-produse.php?c=papusi">
          <div class="result" id="papusi">
            Categorie: papusi
          </div>
        </a>
      </div>
      <div id="produse-result">

      </div>
    </div>
  </div>
  <div class="nav">
    <a class="nav_comp" href="account.php">
      <img class="nav_img" src="./img/account_icon.png" alt="acount" />
      <div class="nav_text">Cont</div>
    </a>
    <a class="nav_comp" href="favorite.php">
      <img class="nav_img" src="./img/heart_incon.png" alt="favorites" />
      <div class="nav_text">Favorite</div>
    </a>
    <a class="nav_comp" href="cart.php">
      <img class="nav_img" src="./img/cart_icon.png" alt="cart" />
      <div class="nav_text">Cos</div>
    </a>
  </div>
</header>
<script>
  const searchInput = document.getElementById("searchInput");
  const categorii = ["toate", "bebelusi", "creative", "plus", "masini", "papusi"];

  searchInput.addEventListener('keyup', (e) => {
    const searchString = e.target.value.toLowerCase();
    if (searchString != "") {
      for (i = 0; i < 6; i++)
        if (categorii[i].includes(searchString))
          document.getElementById(categorii[i]).style.display = "block";
        else
          document.getElementById(categorii[i]).style.display = "none";
      LoadResults(searchString);
    } else {
      document.getElementById("produse-result").innerHTML = "";
      for (i = 0; i < 6; i++)
        document.getElementById(categorii[i]).style.display = "block";
    }
  });

  function LoadResults(searchString) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("produse-result").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "PHP/get_search_results.php?searchString=" + searchString, true);
    xhttp.send();
  };
</script>