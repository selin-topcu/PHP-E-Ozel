<!DOCTYPE html>
<html lang="en">

<head>

	<title>E-Özel</title>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>


	<?php
	session_start();
	require_once("settings.php");

	if (isset($_POST["kayit"])) {

		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$telephone = $_POST["telephone"];
		$Email = $_POST["email"];
		$date = $_POST["dtarih"];
		$school = $_POST["okul"];
		$pass = $_POST["password"];
		$date1 = date("Y-m-d");

		$result = mysqli_query($con, "INSERT INTO users (name,surname,telephone,email,birthDate,school,password,date) 
		VALUES ('$name','$surname','$telephone','$Email','$date','$school','$pass','$date1')");
			

		if ($result) {
			echo "Üyelik bilgileriniz sisteme başarıyla kaydedilmiştir.";
			echo "<br>";
			echo "Üyeliğiniz onaylandıktan sonra kayıt olduğunuz e-posta adresine bilgilendirme mesajı atılacaktır.";
		} else {
			echo "Kayıt yapılamadı!";
		}
	} else if (isset($_POST["enter"])) {
		
		 $pass = mysqli_real_escape_string($con, $_POST["password"]);
		 $Email = mysqli_real_escape_string($con, $_POST["email"]);

		$sql = "SELECT * FROM users WHERE email ='$Email' and password='$pass'";
	
		
		$result = mysqli_query($con, $sql);

		$uyeSayisi = mysqli_num_rows($result);

		if ($uyeSayisi == 1) {
			$row = mysqli_fetch_assoc($result);

			if ($row["type"] == 0){
				echo '<div class="alert alert-info" role="alert">
				<h4 class="alert-heading">Oturum Açma İşlemi Başarılı</h4>
				<hr>
				<p>Hoş geldiniz, ' . $row["name"] . ' ' . $row["surname"] . '</p>
				<p class="mb-0">
				Üyeliğiniz henüz onaylanmamıştır. Ana sayfaya yönlendiriliyorsunuz...
				</p>
				</div>';
				header("Refresh: 4; index.php");
				exit();
			}

			echo '<div class="alert alert-success" role="alert">
			<h4 class="alert-heading">Oturum Açma İşlemi Başarılı</h4>
			<hr>
			<p>Hoş geldiniz, ' . $row["name"] . ' ' . $row["surname"] . '</p>
			<p class="mb-0">
			Ana sayfaya yönlendiriliyorsunuz...
			</p>
			</div>';
				
			$_SESSION['Email'] = $row["email"];
			if ($row["type"] == 2) header("Refresh: 4; teacSystem/index.php");
			else if ($row["type"] == 1)  header("Refresh: 4; admin.php");
		} else {
				echo '<div class="alert alert-danger" role="alert">
			<h4 class="alert-heading">Oturum Açma İşlemi Başarısız</h4>
			<hr>
			<p>Böyle bir kullanıcı bulunamadı, lütfen tekrar deneyiniz.</p>
			<p class="mb-0">
			Oturum Açma sayfasına yönlendiriliyorsunuz...
			</p>
			</div>';
				header("Refresh: 4; index.php");
			}
		}

	?>
	<!-- SCRIPTS -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/custom.js"></script>

</body>

</html>