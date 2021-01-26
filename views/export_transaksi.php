<?php
//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

// include 'fpdf/fpdf.php';

// //Connect to your database
// include("connection.php");
require('libraries/fpdf181/fpdf.php');
require("connection.php");


//Select the Products you want to show in your PDF file


//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.

//Create a new PDF file
$pdf = new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

$pdf->setTitle("Daftar Transaksi");
$pdf->SetFont('Arial', 'B', 15);
// Move to the right
$pdf->Cell(65);
// Framed title
$pdf->Cell(50, 10, 'Daftar Transaksi', 1, 0, 'C');
// Line break
$pdf->Ln(20);

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232, 232, 232);
//Bold Font for Field Name
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(15);
$pdf->Cell(35, 6, 'ID Member', 1, 0, 'L', 1);
$pdf->SetX(50);
$pdf->Cell(30, 6, 'ID Mobil', 1, 0, 'L', 1);
$pdf->SetX(80);
$pdf->Cell(35, 6, 'Tanggal Pinjam', 1, 0, 'L', 1);
$pdf->SetX(115);
$pdf->Cell(40, 6, 'Tanggal Kembali', 1, 0, 'L', 1);
$pdf->SetX(155);
$pdf->Cell(35, 6, 'Total Harga', 1, 0, 'L', 1);
$pdf->Ln();

$result = mysqli_query($kon, "select * from tbl_pesanan");
$number_of_products = mysqli_num_rows($result);

//Initialize the 3 columns and the total
$column_nama = "";
$column_mobil = "";
$tgl_pinjam = "";
$tgl_kembali = "";
$total = "";

//For each row, add the field to the corresponding column
while ($row = mysqli_fetch_array($result)) {
    $nama = $row["id_pemesan"];
    $mobil = $row["id_mobil"];
    $start = $row["tgl_pinjam"];
    $end = $row["tgl_kembali"];
    $harga = "Rp" . $row["harga"];

    $column_nama = $column_nama . $nama . "\n";
    $column_mobil = $column_mobil . $mobil . "\n";
    $tgl_pinjam = $tgl_pinjam . $start . "\n";
    $tgl_kembali = $tgl_kembali . $end . "\n";
    $total = $total . $harga . "\n";

    $pdf->SetFont('Arial', '', 12);
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(15);
    $pdf->MultiCell(35, 6, $column_nama, 1);
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(50);
    $pdf->MultiCell(30, 6, $column_mobil, 1);
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(80);
    $pdf->MultiCell(35, 6, $tgl_pinjam, 1);
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(115);
    $pdf->MultiCell(40, 6, $tgl_kembali, 1);
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(155);
    $pdf->MultiCell(35, 6, $total, 1);
}
mysqli_close($kon);


$pdf->Output();
