<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Online Toys</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/header.css" />
    <link rel="stylesheet" href="/CSS/comanda-style.css" />
</head>

<body>
    <?php include "header.php" ?>
    
    <section>
        <div class="title">Detalii comanda</div>

        <div class="client">
            <div class="selector-container">
                <div class="selector" onclick="hidePJ()">
                    <input type="radio" name="tip-persoana" id="fizica" checked>
                    <label for="fizica">
                        <span class="filtre-title">
                            <div>Persoana fizica</div>
                        </span>
                    </label>
                </div>
                <div class="selector" onclick="showPJ()">
                    <input type="radio" name="tip-persoana" id="juridica">
                    <label for="juridica">
                        <span class="filtre-title">
                            <div>Persoana juridica</div>
                        </span>
                    </label>
                </div>
            </div>

            <div class="date">
                <div class="linie-date">
                    <label for="nume">Nume: </label>
                    <input type="text" name="nume" id="nume" value="Popescu">
                </div>
                <div class="linie-date">
                    <label for="prenume">Prenume: </label>
                    <input type="text" name="prenume" id="prenume" value="Ion">
                </div>
                <div class="linie-date">
                    <label for="teleon">Telefon: </label>
                    <input type="tel" name="telefon" id="teleon" value="+40">
                </div>
                <div class="linie-date">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" value="yonutz_boss@yahoo.com">
                </div>
                <div class="linie-date">
                    <label for="adresa">Adresa: </label>
                    <input type="text" name="adresa" id="adresa">
                </div>
                <div class="linie-date PJ">
                    <label for="numecompanie">Nume companie: </label>
                    <input type="text" name="numecompanie" id="numemecompanie">
                </div>
                <div class="linie-date  PJ">
                    <label for="cui">Cod unic de Inregistrare: </label>
                    <input type="text" name="cui" id="cui">
                </div>
                <div class="linie-date  PJ">
                    <label for="banca">Banca: </label>
                    <input type="text" name="banca" id="banca">
                </div>
                <div class="linie-date  PJ">
                    <label for="cont">Cont: </label>
                    <input type="text" name="cont" id="cont">
                </div>
                <div class="linie-date  PJ">
                    <label for="sediu">Sediul central: </label>
                    <input type="text" name="sediu" id="sediu">
                </div>
            </div>
        </div>

        <div class="options-container">
            <div class="title">Metoda de plata </div>
            <div class="selector">
                <input type="radio" name="plata" id="card" checked>
                <label for="card">
                    <div>Plata cu cardul</div>
                </label>
            </div>
            <div class="selector">
                <input type="radio" name="plata" id="ordin">
                <label for="ordin">
                    <div>Ordin de plata</div>
                </label>
            </div>
            <div class="selector">
                <input type="radio" name="plata" id="ramburs">
                <label for="ramburs">
                    <div> ramburs la curier</div>
                </label>
            </div>
        </div>

        <div class="options-container">
            <div class="title">Livrare </div>
            <div class="selector">
                <input type="radio" name="livrare" id="standard" checked>
                <label for="standard">
                    <div>Standard (Gratuit)</div>
                </label>
            </div>
            <div class="selector">
                <input type="radio" name="livrare" id="rapida">
                <label for="rapida">
                    <div>Livrare rapida (20Ron)</div>
                </label>
            </div>
        </div>

        <div class="rezumat">
            <div>Pret produse: 480Ron</div>
            <div>Pret Livare: 20Ron</div>
            <div>Total: 500 Ron</div>
            <input type="submit" value="Plaseaza comanda">
        </div>
    </section>
</body>
<script>
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
</script>

</html>