<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon-48x48.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo aos_loader('aos');?>" rel="stylesheet">
  <link href="<?php echo bootstrap_loader('bootstrap.min');?>" rel="stylesheet">
  <link href="<?php echo icon_loader('bootstrap-icons');?>" rel="stylesheet">
  <link href="<?php echo box_loader('boxicons.min');?>" rel="stylesheet">
  <link href="<?php echo glight_loader('glightbox.min');?>" rel="stylesheet">
  <link href="<?php echo swiper_loader('swiper-bundle.min');?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo css_loader('style');?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Squadfree - v4.7.0
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  
  <title><?php echo $title; ?></title>

  <link href="<?php echo css_loader('app');?>" rel="stylesheet">
</head>
<body>
	 <!-- ======= Header ======= -->
  	<header id="header">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="<?php echo site_url(); ?>"><span>Climat</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo site_url(); ?>">Accueil</a></li>
          <li><a class="nav-link scrollto" href="<?php echo site_url("Actualite/listeActu"); ?>">Listes des actualités</a></li>

          
        </ul>
       
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  		<main id="main">

			
            <?php include($template); ?>

				
		 </main>	

<footer id="footer">
    

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>CLIMAT</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/ -->
        Designed by Hasinna Rakoto.
      </div>
    </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
			

	<script src="<?php echo js_loader('app');?>"></script>

</body>

</html>