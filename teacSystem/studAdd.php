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
                            <li class="breadcrumb-item active">Öğrenci / <b>Ekle</b></li>
                        </ol>
                                            <form method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName" >Ad</label><input name="ogrAdi" class="form-control py-4" id="inputFirstName" type="text" placeholder="Öğrenci Adı" required/></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName" >Soyad</label><input name="ogrSoyadi" class="form-control py-4" id="inputLastName" type="text" placeholder="Öğrenci Soyadı" required/></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName" >No</label><input name="ogrNo" class="form-control py-4" id="inputFirstName" type="text" placeholder="Öğrenci Numarası" required/></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName" >Veli</label><input name="veli" class="form-control py-4" id="inputLastName" type="text" placeholder="Ad Soyad" required/></div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group mt-4 mb-0"><button type="submit" name="add" class="btn btn-primary btn-block">Ekle</button></div>
                                        </form>

                                        <?php
if ( isset( $_POST[ 'add' ] ) ) {
    $name = mysqli_real_escape_string( $con, $_POST[ "ogrAdi" ] );
    $surname = mysqli_real_escape_string( $con, $_POST[ "ogrSoyadi" ] );
    $no = mysqli_real_escape_string( $con, $_POST[ "ogrNo" ] );
    $veli = mysqli_real_escape_string( $con, $_POST[ "veli" ] );
    $oturum = $_SESSION[ 'Email' ];
    $sql = "SELECT * FROM users where email='$oturum'";
    $sonuc = mysqli_query( $con, $sql );
    $uye = mysqli_num_rows( $sonuc );
    if ( $uye == 1 ) {
        $row = mysqli_fetch_assoc( $sonuc );
        $sorgu = $row[ 'id' ];
        $result = mysqli_query( $con, "INSERT INTO student(name,surname,no,veli,teacID) 
						VALUES ('$name','$surname','$no','$veli','$sorgu')" );
        if ( $result ) {
            echo "Kayıt sisteme eklenmiştir!";
        } else {

            echo "Kayıt yapılamadı!";
        }
    }
}

?>

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
