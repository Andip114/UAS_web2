<?php
session_start();
include('../config.php');
if(empty($_SESSION['username'])){
  header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysql_query($sqlupdate);
?>
<!DOCTYPE html>
<html>
<?php
$user = $_SESSION['username'];
$query = mysql_query("SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysql_fetch_array($query);
?>
<head>
  <title>Halo, <?php echo $data['fullname']; ?> - SI Kependudukan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/datatables/css/jquery.dataTables.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
  -->
</head>
<body class="sidebar-mini fixed">
  <div class="wrapper">
    <header class="main-header hidden-print"><a class="logo" href="index.php" style="font-size:13pt">Sistem Informasi Desa Politeknik</a>
      <nav class="navbar navbar-static-top">
        <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
        <div class="navbar-custom-menu">
          <ul class="top-nav">
            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
              <ul class="dropdown-menu settings-menu">
                <li><a href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar hidden-print">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image"><img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"></div>
          <div class="pull-left info">
            <p style="margin-top:-5px;"><?php echo $data['fullname']; ?></p>
            <p class="designation"><?php echo $data['job_title']; ?></p>
            <p class="designation" style="font-size:6pt;">Aktivitas Terakhir: <?php echo $data['last_activity'] ?></p>
          </div>
        </div>
        <ul class="sidebar-menu">
          <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
          <?php
          $v = $_SESSION['username'];
          $query = mysql_query("SELECT * FROM users WHERE username='$v'");
          $users = mysql_fetch_array($query);
          echo "";

          ?>
          <!-- <li><a href="history.php"><i class="fa fa-list-alt"></i><span>Daftar List</span></a></li> -->
          <li class="treeview"><a href="#"><i class="fa fa-database"></i><span>Data</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="list_penduduk.php"><i class="fa fa-circle-o"></i>Data Penduduk</a></li>
              <li><a href="list_kelahiran.php"><i class="fa fa-circle-o"></i>Data Kelahiran</a></li>
              <li><a href="list_kematian.php"><i class="fa fa-circle-o"></i>Data Kematian</a></li>
              
            </ul>
          </li>
          <li><a href="about.php"><i class="fa fa-info"></i><span>Tentang</span></a></li>
          <li><a href="help.php"><i class="fa fa-question-circle"></i><span>Bantuan</span></a></li>
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
      <div class="page-title">
        <div>
          <h1><i class="fa fa-table"></i>  Sistem Informasi Kependudukan Desa</h1>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li><a href="index.php">Dashboard</a></li>
            <li>Data Penduduk</li>
          </ul>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <h1 class="text-center">Data Penduduk</h1>
        <div class="row">
          <div class="col-xs-12">

           <div class="form-group">
            <a href="tambah_penduduk.php" class="btn btn-primary fa fa-plus">Tambah</a>
            <a href="excel_kelahiran.php" class="btn btn-primary fa fa-download">Cetak Data</a>
          </div>


          <!-- /.box-header -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="box-body table-responsive no-padding ">
                    <table id="file" class="table table-bordered table-hover ">
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
                         <th>AKSI</th>
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
                        <td>
                        <a href="edit_penduduk.php?id='.$data['id'].'" class="fa fa-edit">Edit</a>
                        <a href="delete_penduduk.php?id='.$data['id'].'" class="fa fa-trash" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Hapus</a>
                        </td>
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
                 </div>
                 <!-- Modal Tambah -->
                 <div aria-hidden="true" aria-labelledby="myModalLabel" role="modal-body" tabindex="-1" id="tambah-data" class="modal fade">
                  <div class="modal-body">
                    <div class="modal-content">

                      <div class="container" style="margin-bottom: 30px">
                        <b><h2>Tambah Kelahiran</h2></b> 
                        <hr>
                        <?php
                        if(isset($_POST['submit'])){
                          $NIK            = $_POST['NIK'];
                          $nama           = $_POST['nama'];
                          $alamat         = $_POST['alamat'];
                          $dusun          = $_POST['dusun'];
                          $tempat_lahir   = $_POST['tempat_lahir'];
                          $tanggal_lahir  = $_POST['tanggal_lahir'];
                          $jenis_kelamin  = $_POST['jenis_kelamin'];
                          $status_perkawinan          = $_POST['status_perkawinan'];
                          $pekerjaan      = $_POST['pekerjaan'];
                          $gol_darah          = $_POST['gol_darah'];
                          $agama          = $_POST['agama'];
                          $pendidikan = $_POST['pendidikan'];
                          $ibu        = $_POST['ibu'];
                          $ayah       = $_POST['ayah'];
                          $no_kk      = $_POST['no_kk'];

                          $cek = mysql_query("SELECT * FROM data_penduduk WHERE id='$id'") or die(mysql_error($koneksi));

                          if(mysql_num_rows($cek) == 0){
                            $sql = mysql_query("INSERT INTO data_penduduk(NIK, nama, alamat, dusun, tempat_lahir, tanggal_lahir, jenis_kelamin, status_perkawinan, pekerjaan, gol_darah, agama, pendidikan, ibu, ayah, no_kk ) VALUES('$NIK', '$nama', '$alamat', '$dusun' , '$tempat_lahir' , '$tanggal_lahir', '$jenis_kelamin', '$status_perkawinan' , '$pekerjaan', '$gol_darah', '$agama' , '$pendidikan', '$ibu', '$ayah' , '$no_kk')") or die(mysql_error($koneksi));

                            if($sql){
                              echo '<script>alert("Berhasil menambahkan data."); document.location="list_penduduk.php";</script>';
                            }else{
                              echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                            }
                          }else{
                            echo '<div class="alert alert-warning">Gagal, NIK sudah terdaftar.</div>';
                          }
                        }
                        ?>

                        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
                        <!-- Bootstrap Js CDN -->
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
                        <script src="../assets/js/jquery-2.1.4.min.js"></script>

                        <script type="text/javascript">
                          $(document).ready(function() {
                            $('#file').dataTable({
                              "bPaginate": true,
                              "bLengthChange": true,
                              "bFilter": true,
                              "bInfo": true,
                              "bAutoWidth": true,
                              "order": [0, "asc"]
                            });
                          });
                        </script>
                        <script src="../assets/js/essential-plugins.js"></script>
                        <script src="../assets/js/bootstrap.min.js"></script>
                        <script src="../assets/plugins/datatables/js/jquery.dataTables.js"></script>
                        <script src="../assets/js/plugins/pace.min.js"></script>
                        <script src="../assets/js/main.js"></script>

                      </body>
                      </html>