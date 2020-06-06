<?php
include "../db_connection.php";

$produse_cos = mysqli_query($conn, "SELECT * FROM  produse_cos where id_user='" . $_GET['userId'] . "'");
while ($produs_cos =  mysqli_fetch_assoc($produse_cos)) {
    $produs = mysqli_fetch_assoc(mysqli_query(
        $conn,
        "SELECT * FROM  produse where id='" . $produs_cos['id_produs'] . "'"
    ));
    echo '<div class="produs" id="produs' .  $produs['id'] . '" >
            <a href="./produs.php?id=' . $produs['id'] . '"><img src="img/toy' . $produs['id'] . 'img1.png" /></a>
            <div class="detalii-produs">
            <span class="produs-title">'
        . $produs['nume'] .
        '</span>
            <span>
                <label for="cantitate">Cantitate:</label>
                <input type="number" name="cantitate" onchange="ChangeQuantity(' .  $produs['id'] . ', value)" id="cantitate" value=' . $produs_cos['cantitate'] . ' min="1"></span>
            </span>
            </div>
            <div class="detalii-produs">
            <span class="pret">Pret: <span class="pret-value">' . $produs['pret'] . '</span>Ron</span>
            <span>
                <input type="submit" onclick="DeleteProduct(' .  $produs['id'] . ')" value="Sterge" class="button">
            </span>
            </div>
        </div>';
}
?>
