<!DOCTYPE html>
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
<title>Tüm Öğrenciler</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/magnific-popup.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="css/templatemo-style.css">
</head>
<body>
<!-- PRE LOADER
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>
-->
<div class="container">
  <div class="row">
    <div class="xe col-md-12 col-sm-12 " style="position: fixed;top:0; z-index:-1">
      <h1 class="baslik text-white text-center">Ders Paneli</h1>
      <?php
      echo $email = $_SESSION[ "Email" ];
      ?>
      <button class="user"> </button>
    </div>
  </div>
  <div class="row"> 
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
    <!------ Include the above in your HEAD tag ----------> 
    
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
    <!------ Include the above in your HEAD tag ---------->
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <?php
    include( "menu.php" );
    ?>
  </div>
  <div class="grid grid1">
    <?php
    if ( isset( $_POST[ "lesson" ] ) ) {
        echo "Seçilen Öğrenci:";
        $veri = $_POST[ 'lesson' ];
        $sql = "SELECT*FROM student Where ID='$veri'";
        $result = mysqli_query( $con, $sql );
        $deger = mysqli_num_rows( $result );

        if ( $deger == 1 ) {
            $row = mysqli_fetch_assoc( $result );
            echo "<h1><b><i>", $row[ "name" ], ' ', $row[ "surname" ], "</b></i></h1>";

        }
    }

    ?>
    <div class="row"> </div>
  </div>
</div>
<!-- SCRIPTS --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.stellar.min.js"></script> 
<script src="js/jquery.magnific-popup.min.js"></script> 
<script src="js/smoothscroll.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>