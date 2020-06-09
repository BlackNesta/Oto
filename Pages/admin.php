<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Toys</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/header.css" />
    <link rel="stylesheet" href="./CSS/admin-style.css" />
</head>

<body>
    <?php
    session_start();
    // Daca nu stun logat redirectionez spre login
    if (!isset($_SESSION["loggedin"])) {
        header("location: ./login-register.php");
        exit;
    }
    if (isset($_SESSION["id"]))
        if ($_SESSION["id"] != 1) {
            header("location: ./main.php");
            exit;
        }
    include "header.php";
    ?>

    <div class="title"> Administrare site </div>
    <div class="logout">
        <a href="logout.php"><input type="submit" name="" value="Logout" class="button"></a>
    </div>
    <div class='container'>
        <div class="title-container">
            <span>Recenzii:</span>
            <span class="stacs">
            <span> <a href="PHP/statistics/csv.php?type=recenzii">CSV</a> </span>
                <span><a href="PHP/statistics/pdf.php?type=recenzii">PDF</a></span>
            </span>
        </div>
        <div class="list" id="recenzii">
        </div>
    </div>
    <div class='container'>
        <div class="title-container">
            <span>Comenzi:</span>
            <span class="stacs">
                <span> <a href="PHP/statistics/csv.php?type=comenzi">CSV</a> </span>
                <span><a href="PHP/statistics/pdf.php?type=comenzi">PDF</a></span>
            </span>
        </div>
        <div class="header-comenzi">
            <span>ID Comanda</span>
            <span>ID user</span>
            <span>Data</span>
            <span class="align-center">Total</span>
            <span class="align-center">Plata</span>
            <span>Detalii</span>
        </div>
        <div id="comenzi">
            <?php
            include "PHP/toate_comenzile.php";
            ?>
        </div>
    </div>

    <?php include "JS/admin_script.php" ?>

</body>

</html>