<!DOCTYPE html>
<html lang="en">
<head>

     <title>Hydro - Landing Page Template</title>
<!-- 
Hydro Template 
http://www.templatemo.com/tm-509-hydro
-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">
	<style>


/* Hide scrollbar for Chrome, Safari and Opera */
.example::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE and Edge */
.example {
    -ms-overflow-style: none;
}
</style>
</head>
	
<body class="example">
<?php 
include("header.php");
include("main.php");
include("footer.php");
?>

     <!-- MODAL -->
     <section class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
               <div class="modal-content modal-popup">

                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>

                    <div class="modal-body">
                         <div class="container-fluid">
                              <div class="row">

                                   <div class="col-md-12 col-sm-12">
                                        <div class="modal-title">
                                             <h2>E - ÖZEL</h2>
                                        </div>

                                        <!-- NAV TABS -->
                                        <ul class="nav nav-tabs" role="tablist">
                                             <li class="active"><a href="#sign_up" aria-controls="sign_up" role="tab" data-toggle="tab">Hesap Oluştur</a></li>
                                             <li><a href="#sign_in" aria-controls="sign_in" role="tab" data-toggle="tab">Giriş Yap</a></li>
                                        </ul>

                                        <!-- TAB PANES -->
                                        <div class="tab-content">
                                             <div role="tabpanel" class="tab-pane fade in active" id="sign_up">
                                                  <form action="login.php" method="post" autocomplete="off">
                                                       <input type="text" class="form-control" name="name" placeholder="Ad" required>
                                                       <input type="text" class="form-control" name="surname" placeholder="Soyad" required>
                                                       <input type="telephone" class="form-control" name="telephone" placeholder="Telefon" required>
                                                       <input type="email" class="form-control" name="email" placeholder="Email" required>
													   <font color="white" style="float:left; opacity:0.5;">Doğum Tarihi</font> 
													   <input type="date" class="form-control" name="dtarih" placeholder="Doğum Tarihi" required>
                                                       <input type="text" class="form-control" name="okul" placeholder="Okul Adı" required>
													   <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                       <input type="submit" class="form-control" name="kayit" value="Kayıt Ol">
                                                  </form>
                                             </div>

                                             <div role="tabpanel" class="tab-pane fade in" id="sign_in">
                                                  <form action="login.php" method="post" autocomplete="off">
                                                       <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                       <input type="password" class="form-control" name="password" placeholder="Şifre" required>
                                                       <input type="submit" class="form-control" name="enter" value="Giriş">
                                                       <a href="https://www.facebook.com/templatemo">Şifremi Unuttum?</a>
                                                  </form>
                                             </div>
                                        </div>
                                   </div>

                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

    
 <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
	</body>
	</html>