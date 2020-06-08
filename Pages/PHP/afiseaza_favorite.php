<?php

    include "db_connection.php";

    $id_user = $_SESSION["id"];
    $sql = "SELECT id_produs FROM produse_favorite where id_user = $id_user";

    $produse_favorite = mysqli_query($conn, $sql);

    while ($produs_favorit = mysqli_fetch_assoc($produse_favorite)) {
        $id_produs = $produs_favorit["id_produs"];

        $sql = "SELECT * FROM produse WHERE id = $id_produs";
        $produs = mysqli_query($conn, $sql);
        $produs = mysqli_fetch_assoc($produs);

        $nume = $produs["nume"];
        $pret = $produs["pret"];

        echo "<div class='produs' id='$id_produs'>
                <a href='./produs.php?id=" . $produs['id'] . "'><img src='img/toy" . $produs['id'] . "img1.png' /></a>
                <div class='detalii-produs'>
                <span class='produs-title'>$nume</span>
                <span class='pret'>Pret:$pret</span>
                </div>
                <div class='detalii-produs'>
                <span>
                    <input onclick='addProductInCart($id_produs)' type='submit' value='Adauga in cos' class='button'>
                </span>
                <span>
                    <input onclick='deleteProductFromFav($id_produs)' type='submit' value='Sterge' class='button'>
                </span>
                </div>
            </div>";
  
    }
    
    ?>