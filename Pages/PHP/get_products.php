<?php
include "db_connection.php";

$sql = "SELECT id, nume, pret FROM produse";
if ($_GET['c'] != "toate")
    $sql = $sql . " WHERE categorie ='" . $_GET['c'] . "'";
else
    $sql = $sql . " WHERE categorie IS NOT NULL";

if (!empty($_GET['pret'])) {
    $intervale = explode(",", $_GET['pret']);
    $sql = $sql . " AND ( ";
    for ($i = 0; $i < count($intervale); $i++) {
        if ($i != 0)
            $sql = $sql . " OR ";
        $limite_interval =  explode("-", $intervale[$i]);
        $sql = $sql . " ( " . $limite_interval[0] . " <= pret AND pret <= " . $limite_interval[1] . ")";
    }
    $sql = $sql . " ) ";
}

if (!empty($_GET['dest']))
    $sql = $sql . " AND destinatar ='" . $_GET['dest'] . "'";

if (!empty($_GET['varsta'])) {
    $varste = explode(",", $_GET['varsta']);
    // Varianta multipla exclusiva
    /*
            foreach ($varste as $varsta) 
            $sql = $sql . " AND varsta LIKE '%" . $varsta . "%'";
            */
    // Varianta multipla inclusiva
    $sql = $sql . " AND ( ";
    for ($i = 0; $i < count($varste); $i++) {
        if ($i != 0)
            $sql = $sql . " OR ";
        $sql = $sql . " varsta LIKE '%v" . $varste[$i] . "%'";
    }
    $sql = $sql . " ) ";
}

$ord = explode("-", $_GET['ord']);
$sql = $sql . " ORDER BY " . $ord[0];
if (count($ord) == 2)
    $sql = $sql . " " . $ord[1];

if (!empty($_GET['page'])) {
    $offset = ($_GET['page'] - 1) * $_GET['limit'];
    $sql = $sql . " LIMIT " . $offset . ", " . $_GET['limit'];
} else
    $sql = $sql . " LIMIT " . $_GET['limit'];


$result_produse = mysqli_query($conn, $sql);
//Afisare string interogare de control: echo $sql;
if (mysqli_num_rows($result_produse) == 0)
    echo '<div class="mesaj_back"> Nu au fost gasite produse conform criteriilor selectate. </div>';
else {
    while ($produs = mysqli_fetch_assoc($result_produse)) {
        $result_img = mysqli_query($conn, "SELECT img1 FROM imagini_produs where id_produs='" . $produs["id"] . "'");
        $img_prd = mysqli_fetch_assoc($result_img);

        echo
            '<div class="produs">
                            <a href="produs.php?id=' . $produs["id"] . '">
                                    <img src="img/' . $img_prd["img1"] . '" alt="img-produs">
                                    <div class="nume">' . $produs["nume"] . '</div>
                                    </a>
                                    <div class="details">
                                    <span class="price">' . $produs["pret"] . ' lei</span>
                                    <button>Adauga in cos</button>
                                    </div>
                                </div>';
    }
}
