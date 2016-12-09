<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');

$id = $_GET['id'];

if(!is_numeric($id)){
	exit('Access Forbidden');
};

$siswa = new Siswa();
$data = $siswa->deleteSiswa($id);

if(empty($data)){
	echo "data berhasil dihapus";
}

?>
<a href="siswa.php">Kembali</a>