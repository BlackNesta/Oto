<?php

    include "db_connection.php";

    $id_user = $id_comanda = $data = $total = $status = $plata = $id_produs = $nume_produs = $cantitate = $pret = "";
    
    $sql = "SELECT * FROM comenzi";

    $comenzi = mysqli_query($conn, $sql);

    $index = 0;
    while ($comanda = mysqli_fetch_assoc($comenzi)) {
        $index++;
        $id_user = $comanda["id_user"];
        $id_comanda = $comanda["id"];
        $data = $comanda["data"];
        $total = $comanda["total"];
        $status = $comanda["status"];
        $plata = $comanda["plata"];

        echo "<div class='comanda'>
                    <span>$id_comanda</span>
                    <span>$id_user</span>
                    <span>$data</span>
                    <span class='align-center'>$total Ron</span>
                    <span class='align-center'>$plata</span>
                    <button class='button btn-comanda' onclick='displayComanda($index)'>Vezi comanda</button>
                </div>";

        echo "<div class='detalii-comanda'>";

        echo "<div class='produs produs-header'>
                    <div>ID Produs</div>
                    <div>Nume Produs</div>
                    <div>Cantitate</div>
                    <div>Pret</div>
                </div>";

        $sql = "SELECT id_produs, nume, pret, cantitate FROM produse_comanda WHERE id_comanda = $id_comanda";

        $produse = mysqli_query($conn, $sql);
        while ($produs = mysqli_fetch_assoc($produse)) {
            $id_produs = $produs["id_produs"];
            $nume_produs = $produs["nume"];
            $pret = $produs["pret"];
            $cantitate = $produs["cantitate"];

            echo "<div class='produs'>
                        <div>$id_produs</div>
                        <div>$nume_produs</div>
                        <div>$cantitate</div>
                        <div>$pret</div>
                    </div>";
        }

        echo "</div>";
    }
?>