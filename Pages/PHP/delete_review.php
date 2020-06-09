<?php
    include "db_connection.php";

    $sql = "DELETE FROM recenzii_produs WHERE id =" . $_GET['id_review'];
    //echo $sql;
    mysqli_query($conn, $sql);
?>
