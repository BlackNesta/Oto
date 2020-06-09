<?php
$servername = "localhost";
$username = "client";
$password = "client";
$data_base = "otodb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $data_base);

if (!isset($_GET["type"]))
    return;


$fileName = $_GET["type"] . '.csv';

header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

$fp = fopen('php://output', 'w');

if ($_GET["type"] == "recenzii") {

    $recenzii = mysqli_query(
        $conn,
        "SELECT * FROM  recenzii_produs"
    );

    //fwrite($fp, 'id,id_produs,autor,data,text/n');
    //fputcsv($fp, array("id", "id_produs", "autor", "data", "text"));
    $recenzie = mysqli_fetch_assoc($recenzii);
    fputcsv($fp, array_keys($recenzie));
    fputcsv($fp, $recenzie);
    while ($recenzie = mysqli_fetch_assoc($recenzii)) {
        //fwrite($fp, $recenzie['id'] . ',' . $recenzie['id_produs'] . ',' . $recenzie['autor'] . ',' . $recenzie['data'] . ',' . $recenzie['text'] . '\n');
        fputcsv($fp, $recenzie);
    }
} else if ($_GET["type"] == "comenzi") {

    $sql = "SELECT * FROM comenzi";

    $comenzi = mysqli_query($conn, $sql);

    fputcsv($fp, array("id","id_user","data","total","status","plata"));
    while ($comanda = mysqli_fetch_assoc($comenzi)) {
        fputcsv($fp, $comanda);

        $sql = "SELECT * FROM produse_comanda WHERE id_comanda = " . $comanda['id'];

        $produse = mysqli_query($conn, $sql);

        $produs = mysqli_fetch_assoc($produse);
        fputcsv($fp, array_keys($produs));
        fputcsv($fp, $produs);
        while ($produs = mysqli_fetch_assoc($produse)) {
            fputcsv($fp, $produs);
        }
    }
}
fclose($fp);
