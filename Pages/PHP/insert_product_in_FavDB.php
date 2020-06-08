<?php
include "db_connection.php";

$sql = "INSERT INTO produse_favorite
        VALUES (" . $_GET['userId'] . ", " . $_GET['id_produs']  . ")";
echo $sql;
mysqli_query($conn, $sql);
