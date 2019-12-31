<?php
//include file config.php
include('../config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id = $_GET['id'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysql_query("SELECT * FROM data_penduduk WHERE id='$id'") or die(mysql_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysql_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysql_query("DELETE FROM data_penduduk WHERE id='$id'") or die(mysql_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="list_penduduk.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="list_penduduk.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="list_penduduk.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="list_penduduk.php";</script>';
}

?>