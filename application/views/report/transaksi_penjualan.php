<?php
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

	// //Page header
	function Header()
	{
		$this->Image('assets/images/logo.png',35,8,25);
		$this->MultiCell(0, 5, 'GYPSUM GRIYA INDAH',0,'C');
		$this->ln(2);
		$this->SetFont('Arial','B',8);
		$this->MultiCell(0, 5, 'Showroom : Jl.Raya Bogares Kidul, Pangkah - Tegal, Jawa Tengah',0,'C');
		$this->MultiCell(0, 5, 'Telp./Fax.(0283) 6195567 Email : gypsum_griyaindah@yahoo.com',0,'C');
		$this->Line(10,28,200,28);
		$this->Line(10,29,200,29);
		$this->Ln(7);
	}

	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),200,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().'',0,0,'R');
	}

	// Simple table
	function BasicTable($header, $results)
	{
		// Header
		foreach($header as $col)
			$this->Cell(40,7,$col,1);
		$this->Ln();
		// Data
		foreach($results as $key)
		{
			foreach($key as $col)
				$this->Cell(40,6,$col,1);
			$this->Ln();
		}
	}

	// Better table
	function ImprovedTable($header, $results)
	{
		// Column widths
		$w = array(40, 35, 40, 45);
		// Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		// Data
		$no = 1;
		foreach($results as $key)
		{
			$this->Cell($w[0],6,$no,'LR');
			$this->Cell($w[1],6,$key->id_penjualan,'LR');
			$this->Cell($w[2],6,$key->nama_pelanggan,'LR',0,'R');
			$this->Cell($w[3],6,$key->alamat,'LR',0,'R');
			$this->Ln();
			$no++;
		}
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}

	// Colored table
	function FancyTable($header, $results,$grand_total)
	{
		$f = new Formatter_model();

		// Colors, line width and bold font
		$this->SetFillColor(192,192,192);
		$this->SetTextColor(0,0,0);
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('Arial','B',10);
		// Header
		$w = array(15, 30, 50, 65,30);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('Arial','',10);
		// Data
		$fill = false;
		$no = 1;
		foreach($results as $key)
		{
			$this->Cell($w[0],6,$no,'LR',0,'C',$fill);
			$this->Cell($w[1],6,$key->id_penjualan,'LR',0,'C',$fill);
			$this->Cell($w[2],6,$key->nama_pelanggan,'LR',0,'R',$fill);
			$this->Cell($w[3],6,$key->alamat,'LR',0,'R',$fill);
			$this->Cell($w[4],6,$f->format_rupiah($key->total),'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
			$no++;
		}

		$this->Cell($w[0]+$w[1]+$w[2]+$w[3],6, 'JUMLAH', '1', 0, 'C', 1);
		$this->Cell($w[4], 6, $f->format_rupiah($grand_total), '1', 0, 'R', 1);
		// Closing line
		//$this->Cell(array_sum($w),0,'','T');


	}
}

foreach ($grand_total as $r) { $grand_total = $r->grand_total; }


$pdf = new PDF();
// Column headings
$header = array('No', 'Id Penjualan', 'Nama Pelanggan', 'Alamat','Total');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
//$pdf->AddPage();
//$pdf->BasicTable($header,$results);
//$pdf->AddPage();
//$pdf->ImprovedTable($header,$results);
$pdf->AddPage();
$pdf->FancyTable($header,$results,$grand_total);
$pdf->Output();
?>
