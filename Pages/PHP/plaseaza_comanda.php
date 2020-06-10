<?php
include "db_connection.php";

$total = intval($_GET["livrare"]);

$sql = 'INSERT INTO comenzi (id_user, data, total, status, plata)
    VALUES (' . $_GET["userId"] . ',CURRENT_DATE(), 0, "procesare", "' . $_GET["plata"] . '")';
mysqli_query($conn, $sql);


$result = mysqli_query($conn, "SELECT max(id) as id_comanda FROM comenzi");
$id_comanda = mysqli_fetch_assoc($result)['id_comanda'];


if ($_GET["userId"] != 0) {
    $produse_cos = mysqli_query($conn, "SELECT * FROM  produse_cos where id_user='" . $_GET['userId'] . "'");

    while ($produs_cos =  mysqli_fetch_assoc($produse_cos)) {
        $produs = mysqli_fetch_assoc(mysqli_query(
            $conn,
            "SELECT * FROM  produse where id='" . $produs_cos['id_produs'] . "'"
        ));
        mysqli_query($conn, "UPDATE produse SET vandute = vandute + " . $produs_cos['cantitate'] . " where id = " . $produs_cos['id_produs']);
        $total +=  $produs['pret'] * $produs_cos['cantitate'];

        $sql = "INSERT INTO produse_comanda (id_comanda, id_produs, nume, pret, cantitate)
        VALUES ($id_comanda," . $produs_cos['id_produs'] . ',"' . $produs['nume'] . '", ' . $produs['pret'] . ", " . $produs_cos['cantitate'] . ")";
        //echo $sql;
        mysqli_query($conn, $sql);
    }

    mysqli_query($conn, "DELETE FROM produse_cos where id_user='" . $_GET['userId'] . "'");
} else {
    $produse = explode(",", trim($_GET["items"], "[]"));
    $count = explode(",", trim($_GET["count"], "[]"));
    for ($i = 0; $i < count($produse); $i++) {
        $produs =  mysqli_fetch_assoc(mysqli_query(
            $conn,
            "SELECT * FROM  produse where id='" . $produse[$i] . "'"
        ));
        mysqli_query($conn, "UPDATE produse SET vandute = vandute + " . $count[$i] . " where id = " . $produs['id']);
        $total +=  $produs['pret'] * $count[$i];
        //echo "+=".$produs['pret']." * $count[$i]";

        $sql = "INSERT INTO produse_comanda (id_comanda, id_produs, nume, pret, cantitate)
        VALUES ($id_comanda," . $produs['id'] . ',"' . $produs['nume'] . '", ' . $produs['pret'] . ", " . $count[$i] . ")";
        //echo $sql;
        mysqli_query($conn, $sql);
    }
}

mysqli_query($conn, "UPDATE comenzi SET total = $total where id = $id_comanda ");
