<?php

//update 9 dec
//by fitri 

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/m_nationality.php');

$id = $_GET['a'];

if(!is_numeric($id)){
	exit('Access Forbidden');
}

$siswa = new siswa();
$data = $siswa->readSiswa($id);
$nation = new nationality();
$data_nation = $nation -> readAllNationality();

if(empty($data)){
	exit('Siswa not found');
}

$dt = $data[0];
	
?>

<h1>Edit Data Siswa</h1>
<form action="editsiswa.php" method="post" enctype="multipart/form-data">

	
NIS :<br><br>
<input type="text" name="in_nis" readonly="true" value="<?php echo $dt['id_siswa']; ?>"><br><br>
Nama Lengkap :<br><br>
<input type="text" name="in_name" value="<?php echo $dt['full_name']; ?>"><br><br>
Email :<br><br>
<input type="text" name="in_email" value="<?php echo $dt['nationality']?>"><br><br>
Kewarganegaraan :<br><br>
<select name="in_nation">
	<option value="">--Pilih Negara--</option>
	<?php foreach ($data_nation as $n) : ?>
	<?php $s = ($dt['id_nationality'] == $n['id_nationality'])?"selected":"" ?>
	<option value="<?php echo $n['id_nationality']?>" <?php echo $s?>>
		<?php echo $n['nationality']?>
	</option>	
	<?php endforeach?>
</select><br><br>
Foto : <input type="file" name="in_foto"><br>
<input type="submit" name="kirim" value="Simpan">

</form>
