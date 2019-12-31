<?php
//memasukkan file config.php
include('../config.php');
?>
<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_penduduk.xls");
?>
<table border="2" cellpadding="10">
  <thead>
    <tr>

     <th>NO.</th>
     <th>NIK</th>
     <th>NAMA</th>
     <th>ALAMAT</th>
     <th>DUSUN</th>
     <th>TEMPAT LAHIR</th>
     <th>TANGGAL LAHIR</th>
     <th>JENIS KELAMIN</th>
     <th>STATUS PERKAWINAN</th>
     <th>PEKERJAAN</th>
     <th>GOL. DARAH</th>
     <th>AGAMA</th>
     <th>PENDIDIKAN</th>
     <th>IBU</th>
     <th>AYAH</th>
     <th>NO. KK</th>
   </tr>
 </thead>
 <tbody>
  <?php
				//query ke database SELECT tabel data_penduduk urut berdasarkan id yang paling besar
  $sql = mysql_query("SELECT * FROM data_penduduk ORDER BY id DESC") or die(mysql_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
  if(mysql_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
   $no = 1;
					//melakukan perulangan while dengan dari dari query $sql
   while($data = mysql_fetch_assoc($sql)){
						//menampilkan data perulangan
    echo '
    <tr>
    <td>'.$no.'</td>
    <td>'.$data['NIK'].'</td>
    <td>'.$data['nama'].'</td>
    <td>'.$data['alamat'].'</td>
    <td>'.$data['dusun'].'</td>
    <td>'.$data['tempat_lahir'].'</td>
    <td>'.$data['tanggal_lahir'].'</td>
    <td>'.$data['jenis_kelamin'].'</td>
    <td>'.$data['status_perkawinan'].'</td>
    <td>'.$data['pekerjaan'].'</td>
    <td>'.$data['gol_darah'].'</td>
    <td>'.$data['agama'].'</td>
    <td>'.$data['pendidikan'].'</td>
    <td>'.$data['ibu'].'</td>
    <td>'.$data['ayah'].'</td>
    <td>'.$data['no_kk'].'</td>
    </tr>
    ';
    $no++;
  }
				//jika query menghasilkan nilai 0
}else{
 echo '
 <tr>
 <td colspan="6">Tidak ada data.</td>
 </tr>
 ';
}
?>

<tbody>
</table>