<?php
include "db_connection.php";

$sql = "SELECT max(id) as counter from recenzii_produs";
$conuterValue = mysqli_fetch_assoc(mysqli_query($conn, $sql))["counter"] + 1;
 echo $conuterValue;
$sql = "INSERT INTO recenzii_produs 
        VALUES ( " . $conuterValue . ", " . $_GET['id_produs'] . ',"' . $_GET['userName']  . '", CURRENT_DATE(), "' . $_GET['text']  . '" )';
echo $sql;
mysqli_query($conn, $sql);
