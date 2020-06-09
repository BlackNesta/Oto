<?php
    include "db_connection.php";
    session_start();

    //finalizare comanda logat
    if (isset($_SESSION["loggedin"])) {
        $id_user = $_SESSION["id"];
        
        // salvare pret
        $sql = "select sum(pc.cantitate * p.pret) as pret from produse_cos pc join produse p on pc.id_produs = p.id";
        $getpret = mysqli_query($conn, $sql);
        $getpret = mysqli_fetch_assoc($getpret);
        $pret = $getpret["pret"];

        //salvare data
        $data = date('d/m/Y H:i:s');

        // setare status implicit drept COMANDA PLASATA
        $status = "COMANDA PLASATA";

        // salvare metoda de plata
        // TODO...




        // selectarea produselor din cosul userului
        $sql = "select * from produse_cos where id_user = $id_user";
        $cos = mysqli_query($conn, $sql);
        if (mysqli_num_rows($cos) == 0) {
            header("location: ./main.php");
        } else {
            while ($produs = mysqli_fetch_assoc($cos)) {
                $id_user = $produs["id_user"];
                $id_produs = $produs["id_produs"];
                $cantitate = $produs["cantitate"];
            }
        }

    } else { // finalizare comanda nelogat

    }
?>