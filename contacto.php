<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Honvivo | Contacto</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!-- Normalize Css -->
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="./css/animate.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="./css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernizr Js -->
    <script src="./js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- ScrollUp Start Here -->
    <a href="#wrapper" data-type="section-switch" class="scrollup">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <!-- ScrollUp End Here -->
    <div id="wrapper" class="wrapper">
        <!-- Header Area Start Here -->
        <?php include 'view/template/header.php'; ?>
        <!-- Header Area End Here -->
        <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common inner-page-top-margin overlay-dark-40" data-bg-image="img/figure/inner-page-banner1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Contactanos</h1>
                            <ul>
                                <li>
                                    <a href="./">Honvivo</a>
                                </li>
                                <li>Contacto</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Contact Page Area Start Here -->
        <section class="contact-page-wrap bg--accent">
            <div class="single-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-box">
                                <h2 class="item-heading">CONTACTANOS</h2>
                                <p>Puedes comunicarte con nosotros para obtener mayor información sobre nuestros servicios y planes.</p>
                                <p>Te responderemos en breve.</p>
                                <form class="contact-form-box" method="POST" id="contact-form">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <input type="text" placeholder="Tu Nombre" class="form-control" name="name"
                                                data-error="Nombre es requerido" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <input type="email" placeholder="Tu Correo Electronico" class="form-control" name="email"
                                                data-error="Correo Electronico es requerido" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <input type="text" placeholder="Asunto" class="form-control" name="subject"
                                                data-error="Asunto es requerido" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <textarea placeholder="Tu Mensaje" class="textarea form-control" name="message"
                                                id="form-message" rows="7" cols="20" data-error="Mensaje es requerido"
                                                required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group mb-0 mt-3">
                                            <button type="submit" class="item-btn">Enviar Correo</button>
                                        </div>
                                    </div>
                                    <div class="form-response"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="google-map-wrap-layout2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3869.741746036516!2d-87.1806944!3d14.0924167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTTCsDA1JzMyLjciTiA4N8KwMTAnNTAuNSJX!5e0!3m2!1ses-419!2smx!4v1706636603465!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
        <!-- Contact Page Area End Here -->
        <!-- Brand Area Start Here -->
        <?php include 'view/template/brand.php'; ?>
        
        <!-- Brand Area End Here -->
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
    <!-- Smoothscroll Js -->
    <script src="./js/smoothscroll.min.js"></script>
    <!-- Owl Carousel Js -->
    <script src="./js/owl.carousel.min.js"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>
    <!-- Validator js -->
    <script src="./js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="./js/main.js"></script>
</body>

</html>