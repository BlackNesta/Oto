<?php
include "db_connection.php";

$sql = "SELECT id, nume FROM produse where LOWER(nume) LIKE '%" . $_GET['searchString'] . "%'";

$result_produse = mysqli_query($conn, $sql);

while ($produs = mysqli_fetch_assoc($result_produse)) {
    echo
        '<a href="produs.php?id=' . $produs['id'] . '">
            <div class="result">
                ' . $produs['nume'] . '
             </div>
        </a>';
}
