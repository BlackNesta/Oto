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
$result_produse = mysqli_query($conn, $sql);
// Afisare string interogare de control: echo $sql;
    echo mysqli_num_rows($result_produse);

