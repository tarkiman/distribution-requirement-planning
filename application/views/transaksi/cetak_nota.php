<?php
require(echo base_url().'assets/plugins/fpdf/fpdf17/fpdf.php');

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
	function FancyTableNotaPenjualan($header, $data,$grand_total)
	{
		// Column widths
	    $w = array(10, 60, 20, 30,30,40);
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
	        $this->Cell($w[4],6,format_rupiah($row[3]),'LR',0,'R');
	        $this->Cell($w[5],6,format_rupiah($row[4]),'LR',0,'R');	        
	        $this->Ln();
	    }

	    $this->Cell($w[0]+$w[1]+$w[2]+$w[3]+$w[4],6, 'JUMLAH', '1', 0, 'C');
		$this->Cell($w[5], 6, format_rupiah($grand_total), '1', 0, 'R');
	    // Closing line
	    //$this->Cell(array_sum($w),0,'','T');
		}
	
}

$pdf = new PDF();

$query=mysql_query("SELECT * FROM vnota_penjualan
WHERE id_penjualan ='$_GET[id]'");
$r=mysql_fetch_array($query);
$grand_total=mysql_fetch_array(mysql_query("SELECT SUM(jumlah*harga_jual) AS `grand_total` FROM vnota_penjualan WHERE id_penjualan='$_GET[id]'"));

// Column headings
$header = array('No', 'Nama Barang', 'Qty', 'Satuan','Harga','Total');

// Data loading
$query="SELECT nama_barang,jumlah,satuan,harga_jual,jumlah*harga_jual AS `total`
FROM vnota_penjualan
WHERE id_penjualan='$_GET[id]'"; 
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
$pdf->MultiCell(0, 5, 'N O T A   F A K T U R',0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0, 1, '----------------------------------------',0,0,'C');
$pdf->ln(1);

$pdf->Cell(0,7,'No.'.$r['id_penjualan'],0,0,'C');

$pdf->ln(10);
// $pdf->Cell(0,5,'No.Nota : '.$r['id_penjualan'],0,0,'L');
// $pdf->Cell(-190,5,'No.Kendaraan : '.$r['no_kendaraan'],0,0,'C');
// $pdf->Cell(0,5,'Driver : '.$r['nama_driver'],0,0,'R');
// $pdf->ln(5);


$pdf->FancyTableNotaPenjualan($header,$data,$grand_total['grand_total']);

$pdf->ln(15);
$pdf->Cell(95,5,'Tanda Terima',0,0,'L');
$pdf->Cell(0,5,'Hormat Kami,',0,0,'R');
$pdf->ln(15);
$pdf->Cell(95,5,'(.....................)',0,0,'L');
$pdf->Cell(0,5,'( Suwarto )',0,0,'R');

$pdf->Output();


?>
