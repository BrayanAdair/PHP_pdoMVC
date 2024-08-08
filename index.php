<?php
//include('php/auth.php');

include 'conn.php';
?>
<!Doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Honvivo | Inicio</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="./img/favicon.ico">
  <link rel="stylesheet" href="./css/normalize.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/animate.min.css">
  <link rel="stylesheet" href="./css/fontawesome-all.min.css">
  <link rel="stylesheet" href="./fonts/flaticon.css">
  <link rel="stylesheet" href="./css/slick.css">
  <link rel="stylesheet" href="./css/slick-theme.css">
  <link rel="stylesheet" href="./css/owl.carousel.min.css">
  <link rel="stylesheet" href="./css/owl.theme.default.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="./js/modernizr-3.6.0.min.js"></script>
</head>

<body>
  <div id="preloader"></div>
  <a href="#wrapper" data-type="section-switch" class="scrollup">
    <i class="fas fa-angle-double-up"></i>
  </a>
  <div id="wrapper" class="wrapper">
    <!-- Header Area Start Here -->
    <?php include 'view/home/header.php'; ?>
    <!-- Header Area End Here -->

    <!-- Main Banner Area Start Here -->
    <section class="main-banner-wrap-layout1 bg-common overlay-dark-30 bg--gradient-top-30"
      data-bg-image="img/figure/portada.jpg">
      <div class="container">
        <div class="main-banner-box-layout1">
          <p class="item-sub-title">Descubre los mejores eventos en tu ciudad</p>
          <h1 class="item-title">Entretenimiento a un click de distancia</h1>
          <?php include 'view/home/formBuscar.php'; ?>

          <?php include 'view/home/categorySmall.php'; ?>
        </div>
      </div>
    </section>
     <!-- Brand Area Start Here -->
     <?php include 'view/template/brand.php'; ?>
        
      <!-- Brand Area End Here -->
      
    <!-- Main Banner Area End Here -->

    <!-- Feature Area Start Here -->
    <?php include 'view/home/featured-cities.php'; ?>
    <!-- Feature Area End Here -->

    <!-- Category Area Start Here -->
    <?php include 'view/home/category.php'; ?>
    <!-- Category Area End Here -->

    <!-- Listing Area Start Here -->
    <?php include 'view/home/featured-events.php'; ?>
    <!-- Listing Area End Here -->

    <!-- Footer Area Start Here -->
    <?php include 'view/template/footer.php'; ?>
    <!-- Footer Area End Here -->
  </div>
  <!-- Modal Start-->
  <?php include 'view/template/modal.php'; ?>
  <!-- Modal End-->

  <!-- Jquery Js -->
  <script src="./js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap Js -->
  <script src="./js/popper.min.js"></script>
  <!-- Bootstrap Js -->
  <script src="./js/bootstrap.min.js"></script>
  <!-- Plugins Js -->
  <script src="./js/plugins.js"></script>
  <!-- Imagesloaded Js -->
  <script src="./js/imagesloaded.pkgd.min.js"></script>
  <!-- Isotope js -->
  <script src="./js/isotope.pkgd.min.js"></script>
  <!-- Silk Cauosel JS -->
   <!-- Owl Carousel Js -->
   <script src="./js/owl.carousel.min.js"></script>
  <script src="./js/slick.min.js"></script>
  <!-- Parallaxie JS -->
  <script src="./js/parallaxie.js"></script>
  <!-- Smoothscroll Js -->
  <script src="./js/smoothscroll.min.js"></script>
  <!-- Custom Js -->
  <script src="./js/main.js"></script>
</body>

</html>