<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detalles del evento | Honvivo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/animate.min.css">
    <link rel="stylesheet" href="./css/fontawesome-all.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/slick.css">
    <link rel="stylesheet" href="./css/slick-theme.css">
    <link rel="stylesheet" href="./css/nouislider.min.css">
    <link rel="stylesheet" href="./css/magnific-popup.css">
    <link rel="stylesheet" href="style.css">
    <script src="./js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <div id="preloader"></div>
    <a href="#wrapper" data-type="section-switch" class="scrollup">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <div id="wrapper" class="wrapper">
        <?php include 'view/template/header.php'; ?>
        <!-- Listing Banner Area Start Here -->
        <section class="single-listing-carousel-wrap">
            <div class="slick-carousel slick-navigation-layout2" data-slick='{
                "slidesToShow": 3,
                "slidesToShowTab": 3,
                "slidesToShowMobile": 2,
                "slidesToScroll": 1,
                "speed": 600,
                "autoplaySpeed": 2000,
                "dots": false,
                "arrows": true,
                "infinite": true,
                "lazyLoad": "progressive",
                "pauseOnHover": true,
                "autoplay": false,
                "centerMode": true,
                "adaptiveHeight": false,
                "rtl": false,
                "prevArrow": "<span class=\"slick-prev slick-navigation\"><i class=\"flaticon-back\"></i></span>",
                "nextArrow": "<span class=\"slick-next slick-navigation\"><i class=\"flaticon-right-arrow\"></i></span>"
            }'>
                
            </div>
        </section>
        <section class="single-listing-wrap-layout2 padding-bottom-7 bg--accent">
            <div class="single-listing-summary-wrap2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-6">
                            <div class="single-listing-summary2">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="media">
                                            <?php
                                            include_once 'conn.php';
                                            $idEvento = $_GET['evento'] ?? null;
                                            if ($idEvento) {
                                                try {
                                                    $stmt = $pdo->prepare("SELECT e.*, 
                                                        ci.ciudad AS nombreCiudad, 
                                                        ca.categoria AS nombreCategoria, 
                                                        u.nombre AS nombreUsuario, 
                                                        u.ubicacion, 
                                                        u.ubicacionlink, 
                                                        e.whatsapp AS whatsappUsuario, 
                                                        e.facebook,
                                                        GROUP_CONCAT(a.amenidad SEPARATOR ', ') AS amenidades
                                                        FROM eventos AS e
                                                        LEFT JOIN ciudades AS ci ON e.idciudad = ci.idciudad
                                                        LEFT JOIN categorias AS ca ON e.idcategoria = ca.idcategoria
                                                        LEFT JOIN usuarios AS u ON e.idusuario = u.idusuario
                                                        LEFT JOIN amenidades AS a ON u.idusuario = a.idusuario
                                                        WHERE e.idevento = :idevento
                                                        GROUP BY e.idevento");
                                                    $stmt->bindValue(':idevento', $idEvento, PDO::PARAM_INT);
                                                    $stmt->execute();
                                                    $evento = $stmt->fetch(PDO::FETCH_ASSOC);

                                                    if ($evento) {
                                                        echo "<div class='media-body space-md'>";
                                                        echo "<h2 class='item-title'>".htmlspecialchars($evento['titulo'])."</h2>";
                                                        echo "</div>";
                                                    } else {
                                                        echo "<p>Evento no encontrado.</p>";
                                                    }
                                                } catch (\PDOException $e) {
                                                    echo 'Error: ' . $e->getMessage();
                                                }
                                            } else {
                                                echo "<p>ID de evento no especificado.</p>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 col-12">
                                    <div class="entry-meta-date"><i class="far fa-calendar-alt"></i>
                                        <?php 
                                        setlocale(LC_TIME, 'es_ES.UTF-8', 'Spanish_Spain', 'Spanish');
                                        if (isset($evento['fecha'])) {
                                            $fecha = DateTime::createFromFormat('Y-m-d', $evento['fecha']);
                                            if ($fecha) {
                                                echo htmlspecialchars($fecha->format('F j, Y'));
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-4 col-sm-12 col-12">
                                    <div class="entry-meta-location"><i class="fas fa-map-marker-alt"></i> 
                                        <?php 
                                        if (isset($evento['nombreCiudad'])) {
                                            echo htmlspecialchars($evento['nombreCiudad']);
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="item-status">
                                        <div class="status-open">
                                            <?php echo htmlspecialchars($evento['nombreCategoria']); ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="single-listing-share2">
                                <div class="row gutters-15">
                                    <div class="col-4">
                                        <a href="<?php echo htmlspecialchars($evento['linkexterno']); ?>" class="item-btn" target="_blanck"><i class="fas fa-share-alt"></i>Link</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="<?php echo htmlspecialchars($evento['facebook']); ?>" class="item-btn" target="_blanck"><i class="fas fa-share-alt"></i>Facebook</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="https://wa.me/<?php echo $evento['whatsappUsuario'] ?>" class="item-btn" target="_blanck"><i class="fas fa-share-alt"></i>whatsapp</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-listing-box-layout2">
                            <div class="listygo-text-box listing-details-info">
                            <h2 class="tab-content-title"><?php echo htmlspecialchars($evento['tprincipal']); ?></h2>
                                <p><?php echo htmlspecialchars($evento['tsecundario']); ?></p>
                                <div>
                                    <?php 
                                    if (isset($evento['amenidades'])) {
                                        $amenidades = explode(', ', $evento['amenidades']);
                                        echo "<ul><b>AMENIDADES</b>";
                                        foreach ($amenidades as $amenidad) {
                                            echo "<li>🟩 ".htmlspecialchars($amenidad)."</li>";
                                        }
                                        echo "</ul>";
                                    } else {
                                        echo "<ul><b>AMENIDADES</b><li>🟥 No hay amenidades disponibles</li></ul>";
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                <div class="col-sm-6 col-12">
                                    <b>Foto del Evento</b>
                                    <div class="gallery-box-layout2 zoom-gallery">
                                        <?php if (!empty($evento['idevento'])): ?>
                                            <img src="getEventoImagevento.php?idevento=<?php echo htmlspecialchars($evento['idevento']); ?>" alt="Foto del Evento" class="img-fluid">
                                            <a href="getEventoImagevento.php?idevento=<?php echo htmlspecialchars($evento['idevento']); ?>" class="popup-zoom"></a>
                                        <?php else: ?>
                                            <img src="./img/author/defaultFoto.png" alt="Imagen por defecto" class="img-fluid">
                                            <a href="./img/author/defaultFoto.png" class="popup-zoom"></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                    <div class="col-sm-6 col-12">
                                        <b>Galeria del establecimiento</b>
                                        <div class="gallery-box-layout2 zoom-gallery">
                                            <img src="img/listing/listing-14.jpg" alt="listing" class="img-fluid">
                                            <a href="./img/listing/listing-15.jpg" class="popup-zoom">3<i class="fa fa-plus"
                                                    aria-hidden="true"></i></a>
                                            <a href="./img/listing/listing-16.jpg" class="popup-zoom d-none"></a>
                                            <a href="./img/listing/listing-17.jpg" class="popup-zoom d-none"></a>
                                        </div>
                                    </div>
                                </div>
                                <p><?php echo htmlspecialchars($evento['tpie']); ?></p>
                            </div>
   
                            <div class="related-listing">
                                <?php
                                $queryProximosEventos = "SELECT eventos.*, ciudades.ciudad AS nombreCiudad, usuarios.nombre AS nombreUsuario, usuarios.ubicacion, usuarios.ubicacionlink, eventos.whatsapp AS whatsappUsuario
                                FROM eventos
                                LEFT JOIN ciudades ON eventos.idciudad = ciudades.idciudad
                                LEFT JOIN usuarios ON eventos.idusuario = usuarios.idusuario
                                WHERE eventos.fecha >= CURDATE()
                                ORDER BY eventos.fecha ASC";
                                $stmtProximosEventos = $pdo->prepare($queryProximosEventos);
                                $stmtProximosEventos->execute();
                                $eventosProximos = $stmtProximosEventos->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <h2 class="related-title">Recomendaciones de eventos proximos</h2>
                                <div id="owl-nav1" class="nav-control-layout3">
                                    <span class="rt-prev">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                    <span class="rt-next">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                </div>
                            </div>
                            <?php
                            echo "<div class='rc-carousel listing-box-grid' data-custom-nav='#owl-nav1' data-loop='true'
                                data-items='4' data-margin='30' data-autoplay='false' data-autoplay-timeout='5000'
                                data-smart-speed='2000' data-dots='false' data-nav='false' data-nav-speed='false'
                                data-r-x-small='1' data-r-x-small-nav='false' data-r-x-small-dots='false'
                                data-r-x-medium='1' data-r-x-medium-nav='false' data-r-x-medium-dots='false'
                                data-r-small='1' data-r-small-nav='false' data-r-small-dots='false' data-r-medium='2'
                                data-r-medium-nav='false' data-r-medium-dots='false' data-r-large='2' data-r-large-nav='false'
                                data-r-large-dots='false' data-r-extra-large='2' data-r-extra-large-nav='false'
                                data-r-extra-large-dots='false'>";
                                foreach ($eventosProximos as $eventoProximo) {
                                    echo "<div class='product-box'>";
                                    echo "<div class='item-img bg--gradient-50'>";
                                    echo "<img src='img/listing/listing-1-1.jpg' alt='Listing' class='img-fluid grid-view-img'>"; // Reemplazar con la imagen del evento
                                    echo "<img src='img/listing/listing-1-2.jpg' alt='Listing' class='img-fluid list-view-img'>"; // Reemplazar con una imagen adicional si es necesario
                                    echo "<div class='item-logo'><img src='img/listing/logo1.png' alt='Logo'></div>"; // Reemplazar con el logo si es necesario
                                    echo "</div>";
                                    echo "<div class='item-content'>";
                                    echo "<h3 class='item-title'><a href='evento.php?evento=" . htmlspecialchars($evento['idevento']) . "'>" . htmlspecialchars($evento['titulo']) . "</a></h3>"; // Título del evento
                                    echo "<ul class='contact-info'>";
                                    echo "<li><i class='fas fa-map-marker-alt'></i>" . htmlspecialchars($evento['ubicacion']) . "</li>"; // Ubicación del evento
                                    echo "</ul>";
                                    echo "<ul class='meta-item'>";
                                    echo "<li class='item-btn'><a href='evento.php?evento=" . htmlspecialchars($evento['idevento']) . "' class='btn-fill'>Details</a></li>";
                                    echo "</ul>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                               echo" </div>";
                                ?>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                    <?php
                    if ($evento) {
                        //informacion del usuario que subio el evento
                        echo "<div class='widget widget-follow-us2 widget-box-padding'>";
                        echo "<div class='item-logo2'><img src='getImage.php?idusuario=" . htmlspecialchars($evento['idusuario']) . "' alt='Logo del usuario' class='usuario-imagen'></div>";
                        echo "<h4 class='item-title'>" . htmlspecialchars($evento['nombreUsuario']) . "</h4>"; // Nombre del usuario
                        echo "<div class='item-info'>";
                        echo "<ul class='block-list'>";
                        echo "<li><i class='flaticon-phone-call'></i>" . htmlspecialchars($evento['whatsapp']) . "</li>"; // Número de WhatsApp
                        echo "</ul>";
                        echo "</div>";
                        echo "<a href='perfil_usuario.php?idusuario=" . htmlspecialchars($evento['idusuario']) . "' class='item-btn'><i class='fas fa-rss'></i>Ver Perfil</a>";
                        echo "</div>";
                    } else {
                        echo "<p>Evento no encontrado.</p>";
                    }
                    ?>
                       <div class="widget widget-information widget-box-padding">
                            <h3 class="widget-title">Informacion</h3>
                            <ul class="block-list">
                                <li class="block-list-item"><i class="fas fa-map-marker-alt"></i><?php echo htmlspecialchars($evento['ubicacion']); ?></li>
                                <li class="block-list-item"><i class="far fa-clock"></i><?php echo htmlspecialchars($evento['fecha']) . ' a las ' . htmlspecialchars($evento['hora']); ?></li>
                                <li class="block-list-item"><i class="fas fa-globe"></i><a href="<?php echo htmlspecialchars($evento['linkexterno']); ?>">Visitar Sitio Web</a></li>
                                <li class="block-list-item"><i class="fas fa-dollar-sign"></i><?php echo htmlspecialchars($evento['pregeneral']); ?> - PREVENTA GENERAL</li>
                                <li class="block-list-item"><i class="fas fa-dollar-sign"></i><?php echo htmlspecialchars($evento['pgeneral']); ?> - GENERAL</li>
                                <li class="block-list-item"><i class="fas fa-dollar-sign"></i><?php echo htmlspecialchars($evento['previp']); ?> - PREVENTA VIP</li>
                                <li class="block-list-item"><i class="fas fa-dollar-sign"></i><?php echo htmlspecialchars($evento['pvip']); ?> - VIP</li>
                            </ul>
                        </div>
                        <div class="widget widget-poster widget-box-padding">
                            <div class="item-img">
                                <img src="img/figure/sidebar-figure.jpg" alt="Poster" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'view/template/footer.php'; ?>
    </div>

    <!-- Modal Start-->
    <?php include 'view/template/modal.php'; ?>
    <!-- Modal End-->

    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/plugins.js"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="./js/jquery.counterup.min.js"></script>
    <script src="./js/waypoints.min.js"></script>
    <script src="./js/nouislider.min.js"></script>
    <script src="./js/wNumb.js"></script>
    <script src="./js/jquery.magnific-popup.min.js"></script>
    <script src="./js/imagesloaded.pkgd.min.js"></script>
    <script src="./js/smoothscroll.min.js"></script>
    <script src="./js/slick.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>
    <script src="./js/validator.min.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>