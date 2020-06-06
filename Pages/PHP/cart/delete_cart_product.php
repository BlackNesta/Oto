<?php
include "../db_connection.php";

    $sql = "DELETE FROM produse_cos 
    Where id_user=" . $_GET['userId'] . " AND  id_produs=" . $_GET['id_produs'];
    mysqli_query($conn, $sql);
?>
