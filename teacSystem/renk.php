<!DOCTYPE html>
<?php
$current_page = 'renk-mavi';
?>
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
<html lang="en">

<head>


	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>E-Özel</title>
	<link href="css/styles.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/bootstrap-image-checkbox.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

	<style>
		::-webkit-scrollbar {
			width: 0px;
			/* Remove scrollbar space */
			background: transparent;
			/* Optional: just make scrollbar invisible */
		}

		/* Optional: show position indicator in red */
		::-webkit-scrollbar-thumb {
			background: #FF0000;
		}

		.modal-full {
			min-width: 100%;
			margin: 0;
		}

		.modal-full .modal-content {
			min-height: 100vh;
		}

		.card-columns {
			@include media-breakpoint-only(lg) {
				column-count: 4;
			}

			@include media-breakpoint-only(xl) {
				column-count: 5;
			}
		}

		* {
			box-sizing: border-box
		}


		/* Style tab links */


		.tablink {
			background-color: #555;
			color: white;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			font-size: 17px;
			width: 25%;
		}

		.tablink:hover {
			background-color: #007bff;
		}


		/* Style the tab content (and add height:100% for full page content) */
		.tabcontent {
			color: black;
			display: none;
			padding: 10px 10px;
			height: 100%;
			background-color: grey;
		}

		.bs-example {
			margin: 20px;
		}

		.accordion .fa {
			margin-right: 0.5rem;
		}

		/* bildirim geçiş css kodları*/

		#regForm {
			background-color: #ffffff;
			margin: 100px auto;
			font-family: Raleway;
			padding: 40px;
			width: 100%;
			min-width: 300px;
		}



		input {
			padding: 10px;
			width: 100%;
			font-size: 17px;
			font-family: Raleway;
			border: 1px solid #aaaaaa;
		}

		/* Mark input boxes that gets an error on validation: */
		input.invalid {
			background-color: #ffdddd;
		}

		/* Hide all steps by default: */
		.tab {
			display: none;
		}


		/* Make circles that indicate the steps of the form: */
		.step {
			height: 15px;
			width: 15px;
			margin: 0 2px;
			background-color: #bbbbbb;
			border: none;
			border-radius: 50%;
			display: inline-block;
			opacity: 0.5;
		}

		.step.active {
			opacity: 1;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
			background-color: #4CAF50;
		}

		/* bildirim geçiş css kodları bitiş*/
	</style>
</head>

<body class="sb-nav-fixed">
	<?php include("teachMenu2.php"); ?>

	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<?php include("teachMenu.php"); ?>
		</div>


		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">


					<ol class="breadcrumb mb-4" style="margin-top: 20px;">
						<li class="breadcrumb-item active">Öğrenci: <b>
								<?php
								if (empty($_SESSION['ogrenci'])) {
									echo 'Seçilmemiş </b><a href="studTotal.php">(seç)</a></li>';
								} else {
									$veri1 = $_SESSION['ogrenci'];
									$sql = "SELECT*FROM student Where ID='$veri1'";
									$result = mysqli_query($con, $sql);
									$deger = mysqli_num_rows($result);

									if ($deger == 1) {
										$row = mysqli_fetch_assoc($result);
										echo "<b>", $row["name"], ' ', $row["surname"], "</b>";
									}
									echo ' </b><a href="studTotal.php">(değiştir)</a></li>';
								}


								?>
					</ol>
					<!--card-->
					<div class="card mb-4">

						<!--cardbody-->
						<div class="card-body">


							<button class="tablink" onclick="openMenu('kirmizi', this, 'grey')" id="defaultOpen">Kırmızı</button>
							<button class="tablink" onclick="openMenu('sari', this, 'grey')">Sarı</button>
							<button class="tablink" onclick="openMenu('mavi', this, 'grey')">Mavi</button>
							<button class="tablink" onclick="openMenu('yesil', this, 'grey')">Yeşil</button>

							<!-- Kırmızı Rengi  -->
							<div id="kirmizi" class="tabcontent">

								<ol class="breadcrumb mb-4" style="margin-top: 70px;">
									<li class="breadcrumb-item active">Kavramlar</li>
									<li class="breadcrumb-item active">Renk</li>
									<li class="breadcrumb-item "><b>Kırmızı</b></li>
								</ol>
								<div class="card mt-3 tab-card">
									<!-- Kırmızı Rengi Bildirim Menü -->
									<div class="card-header tab-card-header">
										<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">1</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">2</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">3</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Four" aria-selected="false">4</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="Five" aria-selected="false">5</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="six-tab" data-toggle="tab" href="#six" role="tab" aria-controls="Six" aria-selected="false">6</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="seven-tab" data-toggle="tab" href="#seven" role="tab" aria-controls="Seven" aria-selected="false">7</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="eight-tab" data-toggle="tab" href="#eight" role="tab" aria-controls="Eight" aria-selected="false">8</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="nine-tab" data-toggle="tab" href="#nine" role="tab" aria-controls="Nine" aria-selected="false">9</a>
											</li>
										</ul>
									</div>
									<!-- Kırmızı Rengi Bildirim Menü Bitiş-->
									<!-- Kırmızı Rengi Bildirimler -->
									<div class="tab-content" id="myTabContent">
										<!-- Kırmızı Rengi 1. Bildirim -->
										<div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
											<h5 class="card-title">1. Bildirim</h5>
											<p class="card-text">Aynı cinste, dört farklı renkte (kırmızı, sarı, mavi, yeşil), aynı tipte, her renkten birer tane nesne arasından “Kırmızı olanı göster.” denildiğinde kırmızı olanı gösterir. <ul class="list-inline">
											</p>

											<button href="#" data-target="#theModal-1" data-toggle="modal" title="Bildirim Başarılı!" type="button" class="btn btn-light" onclick="openFullscreen();">Görüntüle</button>

											<!-- Kırmızı Rengi 1. Bildirim -->
											<div class="modal fade" id="theModal-1" style="z-index:9999999;" role="dialog">
												<div class="modal-dialog modal-full">
													<div class="modal-content">
														<div class="modal-footer"><button type="button" onclick="closeFullscreen();" class="btn btn-light" data-dismiss="modal">Kapat</button></div>
														<div class="modal-body">
															<form name="rk1"  id="regForm" action="studAction.php" onsubmit="return validateForm()" method="post" required>
																<!-- Kırmızı 1. Bildirim A -->
																<div class="tab">
																	<div class="form-group form-group-image-checkbox is-invalid">
																		<label>Önündekilere bak, kırmızı renkli olanı göster?</label>
																		<div class="row" style=" margin-top: 2%; margin-bottom: 2%;   margin-left: 2%; margin-right:2%;">
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1a1" name="rk1a" value="0" > 
																					<label class="custom-control-label" for="rk1a1"> <img src="assets/img/r.k.1.a.1.jpg" alt="#" class="img-fluid" > </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1a2" name="rk1a" value="0" >
																					<label class="custom-control-label" for="rk1a2"> <img src="assets/img/r.k.1.a.2.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1a3" name="rk1a" value="0" >
																					<label class="custom-control-label" for="rk1a3"> <img src="assets/img/r.k.1.a.3.jpg" alt="#" class="img-fluid" > </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1a4" name="rk1a" value="1" >
																					<label class="custom-control-label" for="rk1a4"> <img src="assets/img/r.k.1.a.4.jpg" alt="#" class="img-fluid" > </label>
																				</div>
																			</div>
																		</div>
																	</div>


																</div>
																<!-- Kırmızı 1. Bildirim A Bitiş -->

																<!-- Kırmızı 1. Bildirim B -->
																<div class="tab">
																	<div class="form-group form-group-image-checkbox is-invalid">
																		<label>B-Kırmızı olanı göster!</label>
																		<div class="row" style=" margin-top: 2%; margin-bottom: 2%;   margin-left: 2%; margin-right:2%;">
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1b1" name="rk1b" value="1" required="required">
																					<label class="custom-control-label" for="rk1b1"> <img src="assets/img/r.k.1.b.1.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1b2" name="rk1b" value="0" required="required">
																					<label class="custom-control-label" for="rk1b2"> <img src="assets/img/r.k.1.b.2.jpg" alt="#" class="img-fluid" > </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1b3" name="rk1b" value="0" required="required">
																					<label class="custom-control-label" for="rk1b3"> <img src="assets/img/r.k.1.b.3.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1b4" name="rk1b" value="0" required="required">
																					<label class="custom-control-label" for="rk1b4"> <img src="assets/img/r.k.1.b.4.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																		</div>
																	</div>


																</div>
																<!-- Kırmızı 1. Bildirim B Bitiş -->
																<!-- Kırmızı 1. Bildirim C -->
																<div class="tab">
																	<div class="form-group form-group-image-checkbox is-invalid">
																		<label>C-Kırmızı olanı göster!</label>
																		<div class="row" style=" margin-top: 2%; margin-bottom: 2%;   margin-left: 2%; margin-right:2%;">
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1c1" name="rk1c" value="0" required="required">
																					<label class="custom-control-label" for="rk1c1"> <img src="assets/img/r.k.1.c.1.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1c2" name="rk1c" value="1" required="required">
																					<label class="custom-control-label" for="rk1c2"> <img src="assets/img/r.k.1.c.2.jpg" alt="#" class="img-fluid" > </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1c3" name="rk1c" value="0" required="required">
																					<label class="custom-control-label" for="rk1c3"> <img src="assets/img/r.k.1.c.3.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1c4" name="rk1c" value="0" required="required">
																					<label class="custom-control-label" for="rk1c4"> <img src="assets/img/r.k.1.c.4.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																		</div>
																	</div>


																</div>
																<!-- Kırmızı 1. Bildirim C Bitiş -->
																<!-- Kırmızı 1. Bildirim D -->
																<div class="tab">
																	<div class="form-group form-group-image-checkbox is-invalid">
																		<label>D-Kırmızı olanı göster!</label>
																		<div class="row" style=" margin-top: 2%; margin-bottom: 2%;   margin-left: 2%; margin-right:2%;">
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1d1" name="rk1d" value="0" required="required">
																					<label class="custom-control-label" for="rk1d1"> <img src="assets/img/r.k.1.d.1.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1d2" name="rk1d" value="0" required="required">
																					<label class="custom-control-label" for="rk1d2"> <img src="assets/img/r.k.1.d.2.jpg" alt="#" class="img-fluid" > </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1d3" name="rk1d" value="1" required="required">
																					<label class="custom-control-label" for="rk1d3"> <img src="assets/img/r.k.1.d.3.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="custom-control custom-radio image-checkbox">
																					<input type="radio" class="custom-control-input" id="rk1d4" name="rk1d" value="0" required="required">
																					<label class="custom-control-label" for="rk1d4"> <img src="assets/img/r.k.1.d.4.jpg" alt="#" class="img-fluid"> </label>
																				</div>
																			</div>
																		</div>
																	</div>


																</div>
																<!-- Kırmızı 1. Bildirim D Bitiş -->
																<div style="overflow:auto;">
																	<div style="float:right;">
																		<button class="btn btn-light" type="button" id="prevBtn" onclick="nextPrev(-1)">Geri</button>
																		<button  class="btn btn-light"  type="button" id="nextBtn" onclick="nextPrev(1)">İleri</button>
																	</div>
																</div>
																<!-- Circles which indicates the steps of the form: -->
																<div style="text-align:center;margin-top:40px;">
																	<span class="step"></span>
																	<span class="step"></span>
																	<span class="step"></span>
																	<span class="step"></span>
																</div>


															</form>

														</div>
													</div>
												</div>
											</div>

										</div>
										<!-- Kırmızı Rengi 1. Bildirim Bitiş-->

										<!-- Kırmızı Rengi 2. Bildirim Başlangıç-->
										<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
											<h5 class="card-title">2. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Bildirimi Görüntülemek İçin Tıklayınız!">Durum</a></li>
												</ul>
											</p>
											<a href="#" data-target="#theModal-2" data-toggle="modal">
												<div class="col span_1_of_3">
													<center>
														<span>
															<h3>Voucher 2</h3>
														</span>
													</center>
												</div>
											</a>
											<div class="modal fade" id="theModal-2" style="z-index:9999999;" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">Title 2</div>
														<div class="modal-body">
															This is modal 2
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
											<h5 class="card-title">3. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="four" role="tabpanel" aria-labelledby="four-tab">
											<h5 class="card-title">4. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="five" role="tabpanel" aria-labelledby="five-tab">
											<h5 class="card-title">5. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="six" role="tabpanel" aria-labelledby="six-tab">
											<h5 class="card-title">6. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="seven" role="tabpanel" aria-labelledby="seven-tab">
											<h5 class="card-title">7. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="eight" role="tabpanel" aria-labelledby="eight-tab">
											<h5 class="card-title">8. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="nine" role="tabpanel" aria-labelledby="nine-tab">
											<h5 class="card-title">9. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>

									</div>
									<!-- Kırmızı Rengi Bildirim Bitiş -->

								</div>

							</div>
							<!-- Kırmızı Rengi Bİtiş  -->
							<!-- Sarı Rengi  -->
							<div id="sari" class="tabcontent">
								<ol class="breadcrumb mb-4" style="margin-top: 70px;">
									<li class="breadcrumb-item active">Kavramlar</li>
									<li class="breadcrumb-item active">Renk</li>
									<li class="breadcrumb-item "><b>Sarı</b></li>
								</ol>
								<div class="card mt-3 tab-card">
									<div class="card-header tab-card-header">
										<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">1</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">2</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">3</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Four" aria-selected="false">4</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="Five" aria-selected="false">5</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="six-tab" data-toggle="tab" href="#six" role="tab" aria-controls="Six" aria-selected="false">6</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="seven-tab" data-toggle="tab" href="#seven" role="tab" aria-controls="Seven" aria-selected="false">7</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="eight-tab" data-toggle="tab" href="#eight" role="tab" aria-controls="Eight" aria-selected="false">8</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="nine-tab" data-toggle="tab" href="#nine" role="tab" aria-controls="Nine" aria-selected="false">9</a>
											</li>
										</ul>
									</div>

									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
											<h5 class="card-title">1. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>

										</div>
										<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
											<h5 class="card-title">2. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
											<h5 class="card-title">3. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="four" role="tabpanel" aria-labelledby="four-tab">
											<h5 class="card-title">4. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="five" role="tabpanel" aria-labelledby="five-tab">
											<h5 class="card-title">5. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="six" role="tabpanel" aria-labelledby="six-tab">
											<h5 class="card-title">6. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="seven" role="tabpanel" aria-labelledby="seven-tab">
											<h5 class="card-title">7. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="eight" role="tabpanel" aria-labelledby="eight-tab">
											<h5 class="card-title">8. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>
										<div class="tab-pane fade p-3" id="nine" role="tabpanel" aria-labelledby="nine-tab">
											<h5 class="card-title">9. Bildirim Kavram Kartları</h5>
											<p class="card-text">
												<ul class="list-inline">
													<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Önceki Bildirimi Tamamlayınız!">Görüntüle</a></li>
												</ul>
											</p>
										</div>

									</div>


								</div>

							</div>
							<!-- Sarı Rengi Bitiş -->
							<!-- Mavi Rengi  -->
							<div id="mavi" class="tabcontent">
								<ol class="breadcrumb mb-4" style="margin-top: 70px;">
									<li class="breadcrumb-item active">Kavramlar</li>
									<li class="breadcrumb-item active">Renk</li>
									<li class="breadcrumb-item "><b>Mavi</b></li>
								</ol>


							</div>
							<!-- Mavi Rengi Bitiş -->
							<!-- Yeşil Rengi  -->
							<div id="yesil" class="tabcontent">
								<ol class="breadcrumb mb-4" style="margin-top: 70px;">
									<li class="breadcrumb-item active">Kavramlar</li>
									<li class="breadcrumb-item active">Renk</li>
									<li class="breadcrumb-item "><b>Mavi</b></li>
								</ol>


							</div>
							<!-- Yeşil Rengi Bitiş -->



						</div>
						<!--cardbody-->
					</div>
					<!--card-->






					<script>
						// üst menü
						function openMenu(pageName, elmnt, color) {
							var i, tabcontent, tablinks;
							tabcontent = document.getElementsByClassName("tabcontent");
							for (i = 0; i < tabcontent.length; i++) {
								tabcontent[i].style.display = "none";
							}
							tablinks = document.getElementsByClassName("tablink");
							for (i = 0; i < tablinks.length; i++) {
								tablinks[i].style.backgroundColor = "";
							}
							document.getElementById(pageName).style.display = "block";
							elmnt.style.backgroundColor = color;
						}


						// üst menüde ilk sayfa açıldığında id="defaultOpen" ile yazılan yerin görüntülenmesi
						document.getElementById("defaultOpen").click();
					</script>

					<script>
						//bildirimin içindeki geçişler
						
						var currentTab = 0; // Current tab is set to be the first tab (0)
						showTab(currentTab); // Display the current tab

						function showTab(n) {
							// This function will display the specified tab of the form...
							var x = document.getElementsByClassName("tab");
							x[n].style.display = "block";
							//... and fix the Previous/Next buttons:
							if (n == 0 || n==null) {
								document.getElementById("prevBtn").style.display = "none";
							} else {
								document.getElementById("prevBtn").style.display = "inline";
							}
							if (n == (x.length - 1)) {
								document.getElementById("nextBtn").innerHTML = "Kaydet";
							} else {
								document.getElementById("nextBtn").innerHTML = "İleri";
							}
							//... and run a function that will display the correct step indicator:
							fixStepIndicator(n)
						}

						function nextPrev(n) {
							// This function will figure out which tab to display
							var x = document.getElementsByClassName("tab");
							// Exit the function if any field in the current tab is invalid:
							if (n == 1 && !validateForm()) return false;
							// Hide the current tab:
							x[currentTab].style.display = "none";
							// Increase or decrease the current tab by 1:
							currentTab = currentTab + n;
							// if you have reached the end of the form...
							if (currentTab >= x.length) {
								// ... the form gets submitted:
								document.getElementById("regForm").submit();
								return false;
							}
							// Otherwise, display the correct tab:
							showTab(currentTab);
						}

						function validateForm() {
							// This function deals with validation of the form fields
							var x, y, i, valid = true;
							x = document.getElementsByClassName("tab");
							y = x[currentTab].getElementsByTagName("input");
							// A loop that checks every input field in the current tab:
							for (i = 0; i < y.length; i++) {
								// If a field is empty...
								if (y[i].value == "") {
									// add an "invalid" class to the field:
									y[i].className += " invalid";
									// and set the current valid status to false
									valid = false;
								}
							}
							// If the valid status is true, mark the step as finished and valid:
							if (valid) {
								document.getElementsByClassName("step")[currentTab].className += " finish";
							}
							return valid; // return the valid status
						}

						function fixStepIndicator(n) {
							// This function removes the "active" class of all steps...
							var i, x = document.getElementsByClassName("step");
							for (i = 0; i < x.length; i++) {
								x[i].className = x[i].className.replace(" active", "");
							}
							//... and adds the "active" class on the current step:
							x[n].className += " active";
						}
					</script>
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