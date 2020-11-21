<!DOCTYPE html>
<?php
$current_page='anasayfa';

?>
<html lang="en">
<?php
session_start();
require_once( "../settings.php" );
if ( empty( $_SESSION[ 'Email' ] ) ) {
    echo "Yetkisiz erişim";
    echo "<img width='100'src='../images/681735.png'>";
    header( "Refresh: 4; ../index.php" );
    exit();
}
if ( isset( $_GET[ 'logout' ] ) ) {
    session_destroy();
    unset( $_SESSION[ 'email' ] );
    header( "location: ../index.php" );
}

?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-Özel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
	
        <?php include("teachMenu2.php"); ?>
        <div id="layoutSidenav">
            <?php include("teachMenu.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        
                    <h1 class="mt-4">Öğrenci</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Öğrenci / <b>Seç</b></li>
                        </ol>
                        <?php

if ( isset( $_POST[ "sec" ] ) ) {
    echo "Öğrenci Seçildi!";
    $veri = $_POST[ 'sec' ];
    $_SESSION[ 'ogrenci' ]=$veri;
    $sql = "SELECT*FROM student Where ID='$veri'";
    $result = mysqli_query( $con, $sql );
    $deger = mysqli_num_rows( $result );

    if ( $deger == 1 ) {
        $row = mysqli_fetch_assoc( $result );
        echo "<b> ", $row[ "name" ], ' ', $row[ "surname" ], "</b></br></br>";

    }
}

?>
                    <div class="grid grid1">
                    

<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Öğrenci Listesi</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                               
                                                <th>Öğrenci No</th>
                                                <th>Öğrenci Adı</th>
                                                <th>Öğrenci Soyadı</th>
                                                <th>Öğrenci Veli</th>
                                                <th>İşlem</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>#</th>
                                            <th>Öğrenci No</th>
                                                <th>Öğrenci Adı</th>
                                                <th>Öğrenci Soyadı</th>
                                                <th>Öğrenci Veli</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
  $sayac = 0;
  $sql = "SELECT*FROM users Where email='$email'";

  $result = mysqli_query( $con, $sql );
  $deger = mysqli_num_rows( $result );
  if ( $deger == 1 ) {
      $row = mysqli_fetch_assoc( $result );
      $id = $row[ "id" ];
      $sql = "SELECT*FROM student Where teacID='$id'";
      $result = mysqli_query( $con, $sql );
      while ( $row = mysqli_fetch_array( $result ) ) {
          $sayac += 1;

          ?>
          <form action="" method="post">
  <tr>
    <th scope="row"><?php $veri=$row['ID']; echo $sayac;?></th>
    <td><?php echo $row["no"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["surname"]; ?></td>
    <td><?php echo $row["veli"];?></td>
    <td><button name="sec" type="submit" name="lesson"  value="<?php echo $veri?>" class="btn btn-success">Seç</button></td>
  </tr>
  <?php }}?>
  </div>
</form>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                      


                    </div>
                </main>
                <?php include("teachFooter.php"); ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
