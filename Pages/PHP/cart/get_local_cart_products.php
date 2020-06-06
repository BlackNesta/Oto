<?php
    include "../db_connection.php";

    $produse = explode(",", trim($_GET["items"], "[]"));
    $count = explode(",", trim($_GET["count"], "[]"));
    for ($i = 0; $i < count($produse); $i++) {
        $produs =  mysqli_fetch_assoc(mysqli_query(
            $conn,
            "SELECT * FROM  produse where id='" . $produse[$i] . "'"
        ));
        echo '<div class="produs" id="produs' .  $produs['id'] . '" >
            <a href="./produs.php?id=' . $produs['id'] . '"><img src="img/toy' . $produs['id'] . 'img1.png" /></a>
            <div class="detalii-produs">
            <span class="produs-title">'
            . $produs['nume'] .
            '</span>
            <span>
                <label for="cantitate">Cantitate:</label>
                <input type="number" name="cantitate" onchange="ChangeQuantity(' .  $produs['id'] . ', value)" id="cantitate" value=' . $count[$i] . ' min="1"></span>
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