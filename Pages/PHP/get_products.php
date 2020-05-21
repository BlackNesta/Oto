<?php
    include "db_connection.php";

    $sql = "SELECT id, nume, pret FROM produse";
    if ($_GET['c'] != "toate")
        $sql = $sql . " WHERE categorie ='" . $_GET['c'] . "'";
    else
        $sql = $sql . " WHERE categorie IS NOT NULL";
    if (!empty($_GET['dest']))
        $sql = $sql . " AND destinatar ='" . $_GET['dest'] . "'";
    if (!empty($_GET['varsta'])) {
        $varste = explode(",", $_GET['varsta']);
        // Varianta multipla exclusiva
        /*
        foreach ($varste as $varsta) 
        $sql = $sql . " AND varsta LIKE '%" . $varsta . "%'";
        */
        // Varianta multipla inclusiva
        $sql = $sql . " AND ( ";
        for ($i = 0; $i < count($varste); $i++) {
            if ($i != 0)
            $sql = $sql . " OR ";
            $sql = $sql . " varsta LIKE '%v" . $varste[$i] . "%'";
        }
        $sql = $sql . " ) ";
        
    }
    $result_produse = mysqli_query($conn, $sql);
    echo $sql;
    if (mysqli_num_rows($result_produse) > 0) {
        while ($produs = mysqli_fetch_assoc($result_produse)) {
            $result_img = mysqli_query($conn, "SELECT img1 FROM imagini_produs where id_produs='" . $produs["id"] . "'");
            $img_prd = mysqli_fetch_assoc($result_img);

            echo
                '<div class="produs">
                        <a href="produs.php?id=' . $produs["id"] . '">
                                <img src="img/' . $img_prd["img1"] . '" alt="img-produs">
                                <div class="nume">' . $produs["nume"] . '</div>
                                </a>
                                <div class="details">
                                <span class="price">' . $produs["pret"] . ' lei</span>
                                <button>Adauga in cos</button>
                                </div>
                            </div>';
        }
    }
?>