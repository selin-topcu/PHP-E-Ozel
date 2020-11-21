<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'e-ozel');
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    mysqli_query($con, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    
    if($con){
        // echo "Bağlantı başarılı";
    }
    else{
        echo "Bağlantıda problem var!";
        echo mysqli_connect_error($baglanti);
    }
?>