<?php
include '../includes/functions.php';
require('../includes/pdf/fpdf.php');
if (!isset($_SESSION["id_Pegawai"]))
    header("Location: ../index.php?error=2");
$query = "SELECT kode_menu,nama,jenis,harga FROM data_menu WHERE keterangan='divalidasi'";
$sql = mysqli_query($conn, $query);
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
	array_push($data, $row);
}
 
#setting judul laporan dan header tabel
$judul = "Daftar Menu";
$header = array(
		array("label"=>"kode", "length"=>30, "align"=>"L"),
		array("label"=>"Nama Menu", "length"=>50, "align"=>"L"),
		array("label"=>"Jenis", "length"=>80, "align"=>"L"),
		array("label"=>"Harga", "length"=>30, "align"=>"L")
	);
 
#sertakan library FPDF dan bentuk obje
$pdf = new FPDF();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
	$i = 0;
	$pdf->Cell($header[0]['length'], 5, $baris['kode_menu'], 1, '0', $kolom['align'], $fill);
	$pdf->Cell($header[1]['length'], 5, $baris['nama'], 1, '0', $kolom['align'], $fill);
	$pdf->Cell($header[2]['length'], 5, $baris['jenis'], 1, '0', $kolom['align'], $fill);
	$pdf->Cell($header[3]['length'], 5, "Rp.".$baris['harga'], 1, '0', $kolom['align'], $fill);
	$i++;
	$fill = !$fill;
	$pdf->Ln();
}

#output file PDF
$pdf->Output();
?>