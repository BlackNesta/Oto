<?php
include "../db_connection.php";

    $sql = "UPDATE produse_cos
    Set cantitate=" . $_GET['quantity'] . "
    Where id_user=" . $_GET['userId'] . " AND  id_produs=" . $_GET['id_produs'];
    mysqli_query($conn, $sql);
    echo $sql;
?>
