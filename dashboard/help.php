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
  <!--  HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
    if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') -->
  
</head>
<body class="sidebar-mini fixed">
  <div class="wrapper">
    <header class="main-header hidden-print"><a class="logo" href="index.php" style="font-size:13pt">Sistem Informasi Desa Politeknik</a>
      <nav class="navbar navbar-static-top">
        <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
        <div class="navbar-custom-menu">
          <ul class="top-nav">
            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user fa-lg"></i></a>
              <ul class="dropdown-menu settings-menu">
                <li><a href="profil.php"><i class="fa fa-male fa-lg"></i>Profil</a></li>
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
            <li><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
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
            <h1><i class="fa fa-question-circle"></i> Bantuan Sistem Informasi Kependudukan</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Bantuan</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <legend>Bantuan Penggunaan SI Kependudukan</legend>
                <li>Menu Dashboard merupakan statistik dari penggunaan sistem informasi ini.</li>
                <li>Menu Data terbagi 3 yakni Data Penduduk, Data Kelahiran dan Data Kematian</li>
                <li>Menu Tentang merupakan tentang dari Sistem Informasi ini.</li>
                <li>Menu Bantuan merupakan menu untuk membantu penggunaan Sistem Informasi ini.</li>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/essential-plugins.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/pace.min.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
