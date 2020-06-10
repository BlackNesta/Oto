<?php
$servername = "localhost";
$username = "client";
$password = "client";
$data_base = "otodb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $data_base);

if (!isset($_GET["type"]))
    return;

require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();


if ($_GET["type"] == "recenzii") {

    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(190, 20, 'Recenzii', 0, 1, 'C');
    $pdf->SetFont('Times', '', 12);

    $recenzii = mysqli_query(
        $conn,
        "SELECT * FROM  recenzii_produs"
    );
    while ($recenzie = mysqli_fetch_assoc($recenzii)) {
        $pdf->Cell(0, 6, "id: " .  $recenzie['id'] . ", id_produs: " . $recenzie['id_produs'], 0, 1);
        $pdf->Cell(0, 6, "autor: " . $recenzie['autor'] . ", data: " . $recenzie['data'], 0, 1);
        $pdf->Cell(0, 6, 'text: "' . $recenzie['autor'] . '"', 0, 1);
        $pdf->Cell(0, 5, "", 0, 1);
    }
    $pdf->Output();
} else if ($_GET["type"] == "comenzi") {

    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(190, 20, 'Comenzi', 0, 1, 'C');
    $pdf->SetFont('Times', '', 12);

    $sql = "SELECT * FROM comenzi";

    $comenzi = mysqli_query($conn, $sql);

    while ($comanda = mysqli_fetch_assoc($comenzi)) {
        $pdf->Cell(0, 10, "", 0, 1);
        $pdf->Cell(0, 6, "id: " .  $comanda['id'] . ", id_user: " . $comanda['id_user'], 0, 1);
        $pdf->Cell(0, 6, "data: " .  $comanda['data'] . ", status: " . $comanda['status'], 0, 1);
        $pdf->Cell(0, 6, "total: " .  $comanda['total'] . ", plata: " . $comanda['plata'], 0, 1);
        $sql = "SELECT * FROM produse_comanda WHERE id_comanda = " . $comanda['id'];

        $produse = mysqli_query($conn, $sql);
        $pdf->Cell(30, 6, "id_produs", 0, 0, "C");
        $pdf->Cell(80, 6, "nume", 0, 0, "C");
        $pdf->Cell(40, 6, "pret", 0, 0, "C");
        $pdf->Cell(20, 6, "cantitate", 0, 0, "C");
        $pdf->Cell(0, 5, "", 0, 1);
        while ($produs = mysqli_fetch_assoc($produse)) {
            $pdf->Cell(30, 6, $produs['id_produs'], 0, 0, "C");
            $pdf->Cell(80, 6, $produs['nume'], 0, 0, "C");
            $pdf->Cell(40, 6, $produs['pret'], 0, 0, "C");
            $pdf->Cell(20, 6, $produs['cantitate'], 0, 0, "C");
            $pdf->Cell(0, 5, "", 0, 1);
        }
    }
    $pdf->Output();
}
