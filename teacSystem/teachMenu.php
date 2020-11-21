
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menü</div>
                 
                            <a class="nav-link" href="index.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Anasayfa</a
                            >
                            <div class="sb-sidenav-menu-heading">ÖĞRENCİ</div>
                            <a class="nav-link" href="studTotal.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Seç</a>
                                <a class="nav-link" href="studAdd.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Ekle</a>
                                
                            <div class="sb-sidenav-menu-heading">Kavramlar</div>
                            <a class="nav-link" href="renk.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Renk</a
                            >
							
							
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"> </div>
                        Hoşgeldiniz
                        <?php
         $sql = "SELECT*FROM users Where email='$email'";
        $result = mysqli_query( $con, $sql );
        $deger = mysqli_num_rows( $result );

        if ( $deger == 1 ) {
            $row = mysqli_fetch_assoc( $result );
            echo "<b>", $row[ "name" ], ' ', $row[ "surname" ], "</b>";

        }


    ?>
                    </div>
                </nav>
            </div>
            
        
<script>
var elem = document.documentElement;
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}
</script>
