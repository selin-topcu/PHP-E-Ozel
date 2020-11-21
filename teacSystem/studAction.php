<!DOCTYPE html>
<?php
$current_page = 'anasayfa';
?>
<html lang="en">
<?php
session_start();
require_once("../settings.php");
if (empty($_SESSION['Email'])) {
    echo "Yetkisiz erişim";
    echo "<img width='100'src='../images/681735.png'>";
    header("Refresh: 4; ../index.php");
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: ../index.php");
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

                    <h1 class="mt-4">Test</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Test / Kavramlar / Kırmızı / <b>Sonuç</b></li>
                    </ol>

                    <?php



                    //rka--> kırmızı 1. bildirim 1. soru kontrolü 
                    if (isset($_SESSION['ogrenci'])) {
                        if(isset($_POST['rk1'])){
                            echo "rk1";
                        }
                        if (isset($_POST['rk1a']) && isset($_POST['rk1b']) && isset($_POST['rk1c']) && isset($_POST['rk1d'])) {
                            $toplam = 0;
                            if (isset($_POST['rk1a'])) {

                                $rk1 = $_POST['rk1a'];
                                $toplam = $rk1;

                                $ogrenci = $_SESSION['ogrenci'];
                                $dersad = "Kırmızı";
                                $bildirimno = "1";
                                $bildirimno2 = "a";


                                $bul = "SELECT *FROM student_state WHERE ogrID='$ogrenci' and dersad='Kırmızı' and bildirimno='1' and bildirimno2='a'";
                                $sonuc = mysqli_query($con, $bul);
                                $islem = mysqli_num_rows($sonuc);

                                if ($islem == 1) {
                                    $row = mysqli_fetch_assoc($sonuc);
                                    $id = $row['ID'];

                                    $result = mysqli_query($con, "UPDATE student_state SET durum='$rk1' WHERE ID='$id'");
                                    if ($result) {
                                        echo "1.Yanıt Güncellendi!<br>";
                                    } else {
                                        echo "1.Yanıt Güncellenemedi!<br>";
                                    }
                                } else if ($islem == 0) {
                                    $result = mysqli_query($con, "INSERT INTO student_state(ogrID,dersad,bildirimno,bildirimno2,durum) 
                                VALUES ('$ogrenci','$dersad','$bildirimno','$bildirimno2','$rk1')");
                                    if ($result) {
                                        echo "1.Yanıt Kaydedildi!<br>";
                                    } else {
                                        echo "1.Yanıt Kaydedilemedi!<br>";
                                    }
                                }
                            }

                            //rkb--> kırmızı 1. bildirim 2. soru kontrolü 
                            if (isset($_POST['rk1b'])) {

                                $rk1 = $_POST['rk1b'];
                                $toplam = $toplam + $rk1;


                                $ogrenci = $_SESSION['ogrenci'];
                                $dersad = "Kırmızı";
                                $bildirimno = "1";
                                $bildirimno2 = "b";


                                $bul = "SELECT *FROM student_state WHERE ogrID='$ogrenci' and dersad='Kırmızı' and bildirimno='1' and bildirimno2='b'";
                                $sonuc = mysqli_query($con, $bul);
                                $islem = mysqli_num_rows($sonuc);

                                if ($islem == 1) {
                                    $row = mysqli_fetch_assoc($sonuc);
                                    $id = $row['ID'];

                                    $result = mysqli_query($con, "UPDATE student_state SET durum='$rk1' WHERE ID='$id'");
                                    if ($result) {
                                        echo "2.Yanıt Güncellendi!<br>";
                                    } else {
                                        echo "2.Yanıt Güncellenemedi!<br>";
                                    }
                                } else if ($islem == 0) {
                                    $result = mysqli_query($con, "INSERT INTO student_state(ogrID,dersad,bildirimno,bildirimno2,durum) 
                            VALUES ('$ogrenci','$dersad','$bildirimno','$bildirimno2','$rk1')");
                                    if ($result) {
                                        echo "2.Yanıt Kaydedildi!<br>";
                                    } else {
                                        echo "2.Yanıt Kaydedilemedi!<br>";
                                    }
                                }
                            }

                            //rkc--> kırmızı 1. bildirim 3. soru kontrolü 
                            if (isset($_POST['rk1c'])) {

                                $rk1 = $_POST['rk1c'];
                                $toplam = $toplam + $rk1;

                                $ogrenci = $_SESSION['ogrenci'];
                                $dersad = "Kırmızı";
                                $bildirimno = "1";
                                $bildirimno2 = "c";


                                $bul = "SELECT *FROM student_state WHERE ogrID='$ogrenci' and dersad='Kırmızı' and bildirimno='1' and bildirimno2='c'";
                                $sonuc = mysqli_query($con, $bul);
                                $islem = mysqli_num_rows($sonuc);

                                if ($islem == 1) {
                                    $row = mysqli_fetch_assoc($sonuc);
                                    $id = $row['ID'];

                                    $result = mysqli_query($con, "UPDATE student_state SET durum='$rk1' WHERE ID='$id'");
                                    if ($result) {
                                        echo "3.Yanıt Güncellendi!<br>";
                                    } else {
                                        echo "3.Yanıt Güncellenemedi!<br>";
                                    }
                                } else if ($islem == 0) {
                                    $result = mysqli_query($con, "INSERT INTO student_state(ogrID,dersad,bildirimno,bildirimno2,durum) 
                            VALUES ('$ogrenci','$dersad','$bildirimno','$bildirimno2','$rk1')");
                                    if ($result) {
                                        echo "3.Yanıt Kaydedildi!<br>";
                                    } else {
                                        echo "3.Yanıt Kaydedilemedi!<br>";
                                    }
                                }
                            }

                            //rkd--> kırmızı 1. bildirim 4. soru kontrolü 
                            if (isset($_POST['rk1d'])) {

                                $rk1 = $_POST['rk1d'];
                                $toplam = $toplam + $rk1;

                                $ogrenci = $_SESSION['ogrenci'];
                                $dersad = "Kırmızı";
                                $bildirimno = "1";
                                $bildirimno2 = "d";


                                $bul = "SELECT *FROM student_state WHERE ogrID='$ogrenci' and dersad='Kırmızı' and bildirimno='1' and bildirimno2='d'";
                                $sonuc = mysqli_query($con, $bul);
                                $islem = mysqli_num_rows($sonuc);

                                if ($islem == 1) {
                                    $row = mysqli_fetch_assoc($sonuc);
                                    $id = $row['ID'];

                                    $result = mysqli_query($con, "UPDATE student_state SET durum='$rk1' WHERE ID='$id'");
                                    if ($result) {
                                        echo "4.Yanıt Güncellendi!<br>";
                                    } else {
                                        echo "4.Yanıt Güncellenemedi!<br>";
                                    }
                                } else if ($islem == 0) {
                                    $result = mysqli_query($con, "INSERT INTO student_state(ogrID,dersad,bildirimno,bildirimno2,durum) 
                            VALUES ('$ogrenci','$dersad','$bildirimno','$bildirimno2','$rk1')");
                                    if ($result) {
                                        echo "4.Yanıt Kaydedildi!<br>";
                                    } else {
                                        echo "4.Yanıt Kaydedilemedi!<br>";
                                    }
                                }
                            }
                            echo '<a href="renk.php">Teste Devam Et</a></div>';
                            /*
                            Sonuç ekranı
                            echo $toplam . " Doğru<br>";
                            if ($toplam > 2) {
                                $sonuc_rk1 = "&#10004";
                                echo "&#10004; Test Başarılı!";
                            } else {
                                $sonuc_rk1 = "&#10060";
                                echo "&#10060; Test Başarısız!";
                            }
                            */
                         
                        
                    }
                        else {
                            echo ' <div class="alert alert-danger">
        Soruların Hepsine Yanıt Verdiğinizden Emin Olun! Testi Tekrar Uygulayın  <a href="renk.php">Geri Dön</a>
      </div>';
                        }
                    } else {
                        echo ' <div class="alert alert-danger">
        Öğrenci Seçimi Yapınız! <a href="studTotal.php">Seç</a>
      </div>';
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