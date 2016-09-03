<?php

require('../plugins/fpdf17/fpdf.php');
require('../config/koneksi.php');
require('../config/fungsi_rupiah.php');
require('../config/fungsi_indotgl.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}
function LoadDataFromSQL($sql)
{
	$hasil=mysql_query($sql) or die(mysql_error());

	$data = array();
	while($rows=mysql_fetch_array($hasil)){
		$data[] = $rows;

}
	return $data;
}

	// Colored table
	function FancyTableSuratJalan($header, $data)
	{
		// Column widths
	    $w = array(10, 100, 40, 40);
	    // Header
	    for($i=0;$i<count($header);$i++)
	        $this->Cell($w[$i],7,$header[$i],1,0,'C');
	    $this->Ln();
	    // Data
	    $no=0;
	    foreach($data as $row)
	    {
	    	$no++;
	        $this->Cell($w[0],6,$no,'LR',0,'C');
	        $this->Cell($w[1],6,$row[0],'LR');
	        $this->Cell($w[2],6,$row[1],'LR',0,'C');
	        $this->Cell($w[3],6,$row[2],'LR',0,'C');
	        $this->Ln();
	    }
	    // Closing line
	    $this->Cell(array_sum($w),0,'','T');
		}
	
}

$pdf = new PDF();

$query=mysql_query("SELECT * FROM vsurat_jalan
WHERE id_penjualan='$_GET[id]'");
$r=mysql_fetch_array($query);

// Column headings
$header = array('No', 'Nama Barang', 'Qty', 'Satuan');

// Data loading
$query="SELECT nama_barang,jumlah,satuan FROM vdetail_penjualan WHERE id_penjualan='$r[id_penjualan]'"; 
$data = $pdf->LoadDataFromSQL($query);

$pdf->SetFont('Arial','',10);
$pdf->AddPage();
//logo
$pdf->Image('logo.png',35,8,25);
$pdf->SetFont('Arial','',14);
$pdf->MultiCell(0, 5, 'GYPSUM GRIYA INDAH',0,'C');
$pdf->ln(2);
$pdf->SetFont('Arial','B',8);
$pdf->MultiCell(0, 5, 'Showroom : Jl.Raya Bogares Kidul, Pangkah - Tegal, Jawa Tengah',0,'C');
$pdf->MultiCell(0, 5, 'Telp./Fax.(0283) 6195567 Email : gypsum_griyaindah@yahoo.com',0,'C');
$pdf->Line(10,28,200,28);
$pdf->Line(10,29,200,29);
$pdf->ln(3);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,5,'Tegal , '.tgl_indo($r['tgl_pengiriman']),0,0,'R');
$pdf->ln(2);

$pdf->Cell(25,5,'Kepada Yth.',0,0,'L');
$pdf->ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,5,$r['nama_pelanggan'],0,0,'L');
$pdf->ln();
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,5,$r['alamat'],0,0,'L');
$pdf->ln(5);

$pdf->SetFont('Arial','',14);
$pdf->MultiCell(0, 5, 'S U R A T  J A L A N',0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 1, '----------------------------------------',0,0,'C');
$pdf->ln(1);

$pdf->Cell(0,7,'No.'.$r['id_pengiriman'],0,0,'C');

$pdf->ln(10);
$pdf->Cell(0,5,'No.Nota : '.$r['id_penjualan'],0,0,'L');
$pdf->Cell(-190,5,'No.Kendaraan : '.$r['no_kendaraan'],0,0,'C');
$pdf->Cell(0,5,'Driver : '.$r['nama_driver'],0,0,'R');
$pdf->ln(5);


$pdf->FancyTableSuratJalan($header,$data);

$pdf->ln(15);
$pdf->Cell(95,5,'Tanda Terima',0,0,'L');
$pdf->Cell(10,5,'Driver',0,0,'C');
$pdf->Cell(0,5,'Kepala Gudang',0,0,'R');
$pdf->ln(15);
$pdf->Cell(95,5,'(.....................)',0,0,'L');
$pdf->Cell(10,5,'(  '.$r['nama_driver'].'  )',0,0,'C');
$pdf->Cell(0,5,'( Fakhruroji )',0,0,'R');

$pdf->Output();


?>
