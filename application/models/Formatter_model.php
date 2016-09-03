<?php

class Formatter_model extends CI_Model {


	//fungsi format rupiah 
	function format_rupiah($rp) {

		$hasil = "Rp." . number_format($rp, 0, "", ".") . "";
		return $hasil;

	}

	function format_tanggal($tgl){

				$tanggal = substr($tgl,8,2);
				$bulan   = $this->getBulan(substr($tgl,5,2));
				$tahun   = substr($tgl,0,4);
				return $tanggal.' '.$bulan.' '.$tahun;	 
	}

	function format_tanggal_lengkap($tgl){

			$tanggal = substr($tgl,8,2);
			$bulan   = $this->getBulan(substr($tgl,5,2));
			$tahun   = substr($tgl,0,4);
			$jam     =substr($tgl,11,8);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam;		 
			
	}		

	function getBulan($bln){

				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
	}

	function hari_ini(){

		date_default_timezone_set('Asia/Jakarta');
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		$hari = date("w");
		$hari_ini = $seminggu[$hari];

		return $hari_ini;
	}

	function tanggal_sekarang(){

		date_default_timezone_set('Asia/Jakarta');
		$tgl=date('Y-m-d');
		$tanggal = substr($tgl,8,2);
		$bulan = $this->getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;	
		
	}



	

	// $tgl_sekarang = date("Ymd");
	// $tgl_skrg     = date("d");
	// $bln_sekarang = date("m");
	// $thn_sekarang = date("Y");
	// $jam_sekarang = date("H:i:s");

	// $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
	//                     "Juni", "Juli", "Agustus", "September", 
	//                     "Oktober", "November", "Desember");

}

?>