<?php
include "PHP/db_connection.php";

if (empty($_GET["id"])) {
    header('Location: produs.php?id=1');
}
$id_produs = $_GET['id'];

$result_produs = mysqli_query($conn, "SELECT * FROM produse where id='" . $id_produs . "'");

if (!$result_produs)
    die("Database access failed: " . mysqli_error($conn));

if (mysqli_num_rows($result_produs) == 0) {
    $title = "Produs inexistent";
} else {
    $produs = mysqli_fetch_assoc($result_produs);
    $title = $produs['nume'];
}

?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/header.css" />
    <link rel="stylesheet" href="./CSS/produs.css" />
</head>

<body>
    <?php
    include "header.php";
    session_start();

    if (mysqli_num_rows($result_produs) == 0) {
        echo '<h1 style="text-align:center;"> Produsul cu id ' . $id_produs . ' nu a fost gasit.';
        exit();
    }

    $result_img = mysqli_query($conn, "SELECT * FROM imagini_produs where id_produs='" . $produs["id"] . "'");
    $img_prd = mysqli_fetch_assoc($result_img);
    ?>

    <div class="section top">
        <div class="slider-container">
            <div class="slides">
                <?php
                for ($i = 1; $i <= 5; $i++)
                    if ($img_prd['img' . $i] != NULL)
                        echo '<img class="slide-img" src="img/' . $img_prd["img" . $i] . '" alt="img' . $i . '" onclick="currentDiv(' . $i . ')">';
                ?>
            </div>
            <div class="slide-curent-container">
                <?php
                for ($i = 1; $i <= 5; $i++)
                    if ($img_prd['img' . $i] != NULL)
                        echo '<img class="slide-curent" src="img/' . $img_prd["img" . $i] . '" alt="img' . $i . '">';
                ?>
            </div>

        </div>

        <div class="produs">
            <div class="produs-title"><?php echo $produs['nume'] ?></div>
            <div class="produs-detalii">
                <div class="pret"><?php echo $produs['pret'] ?> lei</div>
                <div>
                    <button onclick="addProductInCart(<?php echo $id_produs ?>)">Adauga in Cos</button>
                </div>
                <div>
                    <button>Adauga la Favorite</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section bot">
        <div class="tabs-container">
            <?php
            $counter_result = mysqli_query(
                $conn,
                "SELECT count(*) as n FROM  recenzii_produs where id_produs='" . $produs["id"] . "'"
            );
            $recenzii_number = mysqli_fetch_assoc($counter_result);
            ?>
            <div class="tab" onclick="displayTab(1)">Descriere</div>
            <div class="tab" onclick="displayTab(2)">Specificatii</div>
            <div class="tab" onclick="displayTab(3), InitReviewsTab()">Recenzii
                <span style="font-size: 0.7em">(<?php echo $recenzii_number['n'] ?>)</span></div>
        </div>
        <div class="content">
            <div class="tab-content">
                <?php
                echo '<b>' . $produs['nume'] . '</b><br><br>';
                echo '&emsp;' . $produs['descriere'];
                ?>
            </div>
            <div class="tab-content specs">
                <div>Categorie:&nbsp; <?php echo $produs['categorie'] ?></div>
                <div>Destinatar:&nbsp; <?php echo $produs['destinatar'] ?></div>
                <div>Varsta:&nbsp; <?php echo $produs['varsta'] ?></div>
            </div>
            <div class="tab-content" id="recenzii-container">
                <div class="add-recenzie">
                    <div class="rec_header autor">
                        Adauga o recenzie:
                    </div>
                    <textarea id="textarea" class="text" name="textarea" rows="5" maxlength="500"></textarea>
                    <button onclick="postReview()"> Posteaza </button>
                </div>
                <div id="recenzii">

                </div>
            </div>
        </div>
    </div>

    <?php include "JS/produs_script.php" ?>

</body>

</html>