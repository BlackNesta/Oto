<?php
    include "db_connection.php";
    $recenzii = mysqli_query(
        $conn,
        "SELECT id, autor, data, text FROM  recenzii_produs where id_produs='" . $_GET['id'] . "'
                 order by id desc limit ". $_GET['offset'] . "," . $_GET['n']
    );

    while ($recenzie = mysqli_fetch_assoc($recenzii)) {
        echo '<div class="recenzie">
                <div class="rec_header">
                    <div class="autor">' . $recenzie['autor'] . '</div>
                    <div class="data">' . $recenzie['data'] . '</div>
                </div>
                <div class="text"> &emsp;' . $recenzie['text'] . '</div>
              </div> ';
    }
?>