<?php

class Age {

	public $tglLahir, $today, $now;
	public $tahun, $bulan, $tanggal;

	function __construct(){

		$this->tglLahir = '';
		$this->today = date ("Y-m-d");
		$this->now = time();
		$this->tahun = 0;
		$this->bulan = 0;
		$this->tanggal = 0;
	}

	function cekUmur($i_tglLahir){
		list($this->tahun, $this->bulan, $this->tanggal) = explode('-', $i_tglLahir);

		$time_lahir = mktime(0,0,0,$this->bulan,$this->tanggal,$this->tahun);


		$selisih = $this->now - $time_lahir;

		$tahun = floor($selisih/(60*60*24*365));
		$bulan = round($selisih % (60*60*24*365) / (60*60*24*30));
		$hari = round($selisih % ((60*60*24*365)) % (60*60*24));
		
		return $tahun." Tahun ".$bulan." Bulan ".$hari." Hari ";	
	}
}


?>