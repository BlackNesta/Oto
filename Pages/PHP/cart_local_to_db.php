<?php
    include "db_connection.php";

    $produse = explode(",", trim($_GET["items"], "[]"));
    $count = explode(",", trim($_GET["count"], "[]"));
    for ($i = 0; $i < count($produse); $i++) {
        $sql = "INSERT INTO produse_cos
        VALUES ('" . $_GET['userId'] . "', '" . $produse[$i]  . "', '" . $count[$i] . "')";
        mysqli_query($conn, $sql);
        //echo $sql;
    }
?>
