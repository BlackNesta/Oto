<?php
include "db_connection.php";

$sql = "SELECT * FROM produse_cos 
    Where id_user=" . $_GET['userId'] . " AND  id_produs=" . $_GET['id_produs'];
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $produs = mysqli_fetch_assoc($result);
    $sql = "UPDATE produse_cos 
    Set cantitate=" . $produs['cantitate'] . "+1 
    Where id_user=" . $_GET['userId'] . " AND  id_produs=" . $_GET['id_produs'];
} else
    $sql = "INSERT INTO produse_cos
        VALUES (" . $_GET['userId'] . ", " . $_GET['id_produs']  . ", 1)";
#echo $sql;
mysqli_query($conn, $sql);
