<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Listygo | Event Details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Normalize Css -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernizr Js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
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
                            <h1>Proximos eventos</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <?php
        include_once 'conn.php'; // Asegúrate de incluir tu conexión a la base de datos
        $eventosPorPagina = 3; // Puedes cambiar este número según tus necesidades

        $idUsuario = $_GET['idusuario'] ?? null;

        if ($idUsuario) {
            try {
                $stmt = $pdo->prepare("SELECT usuarios.*, ciudades.ciudad AS nombreCiudad FROM usuarios
                LEFT JOIN ciudades ON usuarios.idciudad = ciudades.idciudad
                WHERE usuarios.idusuario = :idusuario");
                $stmt->bindValue(':idusuario', $idUsuario, PDO::PARAM_INT);
                $stmt->execute();
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($usuario) {
                    $stmtTotal = $pdo->prepare("SELECT COUNT(*) FROM eventos WHERE idusuario = :idUsuario");
                    $stmtTotal->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
                    $stmtTotal->execute();
                    $totalEventos = $stmtTotal->fetchColumn();
                    $totalPaginas = ceil($totalEventos / $eventosPorPagina);

                    // Obtén la página actual de la URL
                    $paginaActual = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                    $paginaActual = max(1, min($paginaActual, $totalPaginas)); // Asegúrate de que la página actual sea válida
                    $inicio = ($paginaActual - 1) * $eventosPorPagina;
                    try {
                        $queryEventos = "SELECT eventos.*, ciudades.ciudad, categorias.categoria, IFNULL(eventos.fotoevento, 'ruta_default_imagen_evento') AS fotoEvento
                        FROM eventos 
                        LEFT JOIN ciudades ON eventos.idciudad = ciudades.idciudad 
                        LEFT JOIN categorias ON eventos.idcategoria = categorias.idcategoria
                        WHERE eventos.idusuario = :idUsuario 
                        ORDER BY eventos.fecha ASC, eventos.hora ASC
                        LIMIT :inicio, :eventosPorPagina";
    
                        $stmtEventos = $pdo->prepare($queryEventos);
                        $stmtEventos->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
                        $stmtEventos->bindValue(':inicio', $inicio, PDO::PARAM_INT);
                        $stmtEventos->bindValue(':eventosPorPagina', $eventosPorPagina, PDO::PARAM_INT);
                        $stmtEventos->execute();
                        $eventosUsuario = $stmtEventos->fetchAll(PDO::FETCH_ASSOC);
                    } catch (\PDOException $e) {
                        echo 'Error al obtener eventos: ' . $e->getMessage();
                    }
                } else {
                    echo "<p>Usuario no encontrado.</p>";
                }
            } catch (\PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        } else {
            echo "<p>ID de usuario no especificado.</p>";
        }
        ?>


        <!-- Event Area Start Here -->
        <section class="single-event-wrap padding-top-6 padding-bottom-7 bg--accent">
            <div class="container">
                <div class="row">
                <div class="col-lg-8">
                    <div class="single-event-box">
                    <div class="listing-box-list">
                        <?php if (!empty($eventosUsuario)): ?>
                            <?php foreach ($eventosUsuario as $evento): ?>
                                <div class="product-box">
                                <div class="item-img bg--gradient-50">
                                        <div class="item-status status-open active"><?php echo htmlspecialchars($evento['categoria']); ?></div>
                                        <?php if (!empty($evento['fotoevento'])): ?>
                                            <img src="getEventoImage.php?idevento=<?php echo htmlspecialchars($evento['idevento']); ?>" alt="Imagen del Evento" class="">
                                        <?php else: ?>
                                            <img src="img/author/defaulEvento.png" alt="Imagen por defecto" class="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title"><a href="evento.php?evento=<?php echo htmlspecialchars($evento['idevento']); ?>"><?php echo htmlspecialchars($evento['titulo']); ?></a></h3>
                                        <ul class="contact-info">
                                            <li><i class="fas fa-map-marker-alt"></i><?php echo htmlspecialchars($evento['ciudad']); ?></li>
                                            <li><i class="far fa-calendar-alt"></i><?php echo htmlspecialchars($evento['fecha']); ?></li>
                                        </ul>
                                        <ul class="meta-item">
                                            <li class="item-btn"><a href="evento.php?evento=<?php echo htmlspecialchars($evento['idevento']); ?>" class="btn-fill">Ver Detalles</a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No hay eventos para mostrar.</p>
                        <?php endif; ?>
                        <ul class="pagination-layout1">
                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <li class="<?php echo $i == $paginaActual ? 'active' : ''; ?>">
                                    <a href="?idusuario=<?php echo $idUsuario; ?>&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>

                    </div>

                    </div>
                </div>


                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">

                        <div class="widget widget-follow-us2 widget-box-padding">
                            <?php if (isset($usuario)): ?>
                                <div class="item-logo2">
                                    <img src="getImage.php?idusuario=<?php echo htmlspecialchars($usuario['idusuario']); ?>" alt="Logo del usuario" class="usuario-imagen">
                                </div>
                                <h4 class="item-title"><?php echo htmlspecialchars($usuario['nombre']); ?></h4>
                                <div class="item-info">
                                    <ul class="block-list">
                                        <li><i class="flaticon-email"></i><?php echo htmlspecialchars($usuario['correo']); ?></li>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <p>¡Ups! Ocurrio un error usuario no encontrado.</p>
                            <?php endif; ?>
                        </div>

                        <div class="widget widget-information widget-box-padding">
                        <h3 class="widget-title">Ubicación del establecimiento</h3>
                        <ul class="block-list">
                            <?php if (isset($usuario)): ?>
                                <li class="block-list-item"><i class="fas fa-map-marker-alt"></i><?php echo htmlspecialchars($usuario['ubicacion']); ?>, <?php echo htmlspecialchars($usuario['nombreCiudad']); ?></li>
                                <li class="block-list-item"><i class="fas fa-globe"></i><a href="<?php echo htmlspecialchars($usuario['ubicacionlink']); ?>">Ver en google maps</a></li>
                            <?php else: ?>
                                <p>¡Ups! Ocurrió un error. Usuario no encontrado.</p>
                            <?php endif; ?>
                        </ul>
                    </div>



                    </div>

                </div>
            </div>
        </section>
        <!-- Event Area End Here -->
        <!-- Footer Area Start Here -->
        <?php include 'view/template/footer.php'; ?>
        <!-- Footer Area End Here -->
    </div>
    
    <!-- Modal Start-->
    <?php include 'view/template/modal.php'; ?>
    <!-- Modal End-->
    
    <!-- Jquery Js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins Js -->
    <script src="js/plugins.js"></script>
    <!-- Counterup Js -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Waypoints Js -->
    <script src="js/waypoints.min.js"></script>
    <!-- Countdown js -->
    <script src="js/jquery.countdown.min.js"></script>
    <!-- Smoothscroll Js -->
    <script src="js/smoothscroll.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
</body>

</html>