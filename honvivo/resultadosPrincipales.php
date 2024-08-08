<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Resultados | Honvivo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="/js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <div id="preloader"></div>
    <a href="#wrapper" data-type="section-switch" class="scrollup">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <div id="wrapper" class="wrapper">
        <?php include 'header.php'; ?>
        <!-- Listing Area Start Here -->
        <section class="inner-page-top-margin padding-top-6 padding-bottom-7 bg--accent">
            <div class="container">
                <div class="row">
                    <div class="order-lg-2 col-lg-8">
                        <div class="item-sorting-wrap">
                            <div class="row">
                                <div class="col-sm-6 col-12 d-flex align-items-center">
                                    <div class="item-sorting-title">
                                        Mostrando resultados:
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 d-flex align-items-center justify-content-sm-end">
                                    <div class="layout-switcher">
                                        <ul>
                                            <li class="active"><a class="product-view-trigger" href="#" data-type="listing-box-grid"><i
                                                        class="fa fa-th-large"></i></a></li>
                                            <li><a href="#" data-type="listing-box-list" class="product-view-trigger"><i
                                                        class="fa fa-list"></i></a></li>
                                            <li><a href="#busqueda" data-type="listing-box-list" class=""><i
                                                        class="fa fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="listing-view" class="listing-box-grid">
                        <?php
                            include_once 'conn.php';
                            setlocale(LC_TIME, 'es_ES.UTF-8', 'Spanish_Spain', 'Spanish');

                            // Definir cuántos eventos quieres mostrar por página
                            $eventosPorPagina = 6;

                            try {
                                $tituloEvento = $_POST['InputEvento'] ?? null;
                                $idCiudad = $_POST['SelectCiudad'] ?? null;
                                $fechaEvento = $_POST['InputFecha'] ?? null;
                                $idCategoria = $_POST['SelectCategoria'] ?? null;

                                // Consulta para contar el total de eventos (ajustar según tus filtros)
                                $queryTotal = "SELECT COUNT(*) FROM eventos WHERE 1=1";

                                if (!empty($tituloEvento)) {
                                    $queryTotal .= " AND titulo LIKE :tituloEvento";
                                }
                                if (!empty($idCiudad)) {
                                    $queryTotal .= " AND idciudad = :idCiudad";
                                }
                                if (!empty($fechaEvento)) {
                                    $queryTotal .= " AND fecha = :fechaEvento";
                                }
                                if (!empty($idCategoria)) {
                                    $queryTotal .= " AND idcategoria = :idCategoria";
                                }

                                $stmtTotal = $pdo->prepare($queryTotal);

                                if (!empty($tituloEvento)) {
                                    $stmtTotal->bindValue(':tituloEvento', '%' . $tituloEvento . '%');
                                }
                                if (!empty($idCiudad)) {
                                    $stmtTotal->bindValue(':idCiudad', $idCiudad, PDO::PARAM_INT);
                                }
                                if (!empty($fechaEvento)) {
                                    $stmtTotal->bindValue(':fechaEvento', $fechaEvento);
                                }
                                if (!empty($idCategoria)) {
                                    $stmtTotal->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
                                }

                                $stmtTotal->execute();
                                $totalEventos = $stmtTotal->fetchColumn();
                                $totalPaginas = ceil($totalEventos / $eventosPorPagina);

                                // Obtener la página actual desde la URL
                                $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                $paginaActual = max(1, min($paginaActual, $totalPaginas));
                                $inicio = ($paginaActual - 1) * $eventosPorPagina;

                            // QUERY PRINCIPAL PARA MOSTRAR LOS RESULTADOS PRINCIPALES
                            $query = "SELECT eventos.*, ciudades.ciudad AS nombreCiudad, categorias.categoria AS nombreCategoria, 
                            usuarios.ubicacion, usuarios.nombre AS nombreUsuario, usuarios.fotouser, eventos.fecha, eventos.hora
                            FROM eventos 
                            LEFT JOIN ciudades ON eventos.idciudad = ciudades.idciudad 
                            LEFT JOIN categorias ON eventos.idcategoria = categorias.idcategoria
                            LEFT JOIN usuarios ON eventos.idusuario = usuarios.idusuario
                            WHERE 1=1";

                            if (!empty($tituloEvento)) {
                            $query .= " AND eventos.titulo LIKE :tituloEvento";
                            }
                            if (!empty($idCiudad)) {
                            $query .= " AND eventos.idciudad = :idCiudad";
                            }
                            if (!empty($fechaEvento)) {
                            $query .= " AND eventos.fecha = :fechaEvento";
                            }
                            if (!empty($idCategoria)) {
                            $query .= " AND eventos.idcategoria = :idCategoria";
                            }

                            $query .= " ORDER BY eventos.fecha ASC, eventos.hora ASC";
                            $query .= " LIMIT :inicio, :eventosPorPagina"; // Agregar límites para paginación

                            $stmt = $pdo->prepare($query);

                            if (!empty($tituloEvento)) {
                            $stmt->bindValue(':tituloEvento', '%' . $tituloEvento . '%');
                            }
                            if (!empty($idCiudad)) {
                            $stmt->bindValue(':idCiudad', $idCiudad, PDO::PARAM_INT);
                            }
                            if (!empty($fechaEvento)) {
                            $stmt->bindValue(':fechaEvento', $fechaEvento);
                            }
                            if (!empty($idCategoria)) {
                            $stmt->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
                            }

                            $stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
                            $stmt->bindValue(':eventosPorPagina', $eventosPorPagina, PDO::PARAM_INT);

                            $stmt->execute();
                            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


                                echo "<div class='row'>";
                                foreach ($resultados as $evento) {
                                    echo "<div class='col-md-6 col-12'>";
                                    echo "<div class='product-box'>";
                                    echo "<div class='item-img bg--gradient-50'>";
                                    echo "<div class='item-status status-open active'>" . htmlspecialchars($evento['nombreCategoria']) . "</div>";
                                    echo "<div class='item-status status-save active'> mostrar segunda categoria </div>";

                                    echo "<img src='getEventoImage.php?idevento=" . htmlspecialchars($evento['idevento']) . "' alt='Imagen del Evento' class='img-fluid grid-view-img'>";


                                    if (!empty($evento['idusuario'])) {
                                        echo "<div class='item-logo'>
                                                <img src='getImage.php?idusuario=" . htmlspecialchars($evento['idusuario']) . "' alt='Logo del usuario' class='usuario-imagen'>
                                                <p class='item-paragraph'>" . htmlspecialchars($evento['nombreUsuario']) . "</p>
                                              </div>";
                                    } else {
                                        echo "<div class='item-logo'>
                                                <img src='/img/author/default.png' alt='Logo Default' class='usuario-imagen'>
                                              </div>";
                                    }
                                    echo "</div>";
                                    echo "<div class='item-content'>";
                                    echo "<h3 class='item-title'><a href='evento.php?evento=" . htmlspecialchars($evento['idevento']) . "'>" . htmlspecialchars($evento['titulo']) . "</a></h3>";
                                    // Suponiendo que idusuario se relaciona con una tabla de usuarios para obtener el nombre del usuario
                                    echo "<div class='row'> ";
                                    if ($evento['fecha']) {
                                        $fecha = DateTime::createFromFormat('Y-m-d', $evento['fecha']);
                                        if ($fecha) {
                                            $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE, 
                                                                               null, IntlDateFormatter::GREGORIAN);
                                            $fechaFormateada = $formatter->format($fecha);
                                            echo "<div class='col'> <b>" . htmlspecialchars($fechaFormateada) . "</b> </div>";
                                        }
                                    }
                                    if (!empty($evento['hora'])) {
                                        $hora = DateTime::createFromFormat('H:i:s', $evento['hora']);
                                        if ($hora) {
                                            $horaFormateada = $hora->format('h:i A'); // 'h:i A' formateará la hora en formato 12 horas con AM o PM
                                            echo "<div class='col'> <b>" . htmlspecialchars($horaFormateada) . "</b> </div>";
                                        } else {
                                            echo "<div class='col'> <b>Error en formato de hora</b> </div>";
                                        }
                                    } else {
                                        echo "<div class='col'> <b>No hay hora definida</b> </div>";
                                    }
                                    echo "</div>";
                                    
                                    echo "<ul class='contact-info'>";
                                    echo "<li><i class='fas fa-map'></i>" . htmlspecialchars($evento['nombreCiudad']) . "</li>";
                                    echo "<li><i class='fas fa-map-marker-alt'></i>" . htmlspecialchars($evento['ubicacion']) . "</li>";
                                    echo "<li><i class='flaticon-phone-call'></i><a href='#'>" . htmlspecialchars($evento['whatsapp']) . "</a></li>";
                                    echo "<li><i class='fas fa-globe'></i><a href='" . htmlspecialchars($evento['linkexterno']) . "'>Comprar Boletos</a></li>";
                                    echo "</ul>";
                                    if (!$evento['free']) { // Si 'free' es falso, muestra los precios
                                        echo "<div class='row'>";
                                        echo "<div class='col'>";
                                        echo "<b>General</b>";
                                        echo "<p>" . htmlspecialchars($evento['pgeneral']) . "</p>";
                                        echo "</div>";
                                        echo "<div class='col'>";
                                        echo "<b>Vip</b>";
                                        echo "<p>" . htmlspecialchars($evento['pvip']) . "</p>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='row'>";
                                        echo "<div class='col'>";
                                        echo "<p><b>Preventa General:</b> " . htmlspecialchars($evento['pregeneral']) . "</p>";
                                        echo "</div>";
                                        echo "<div class='col'>";
                                        echo "<p><b>Preventa VIP:</b> " . htmlspecialchars($evento['previp']) . "</p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    echo "<ul class='meta-item'>";
                                    echo "<li class='item-btn'><a href='#' class='btn-fill'>Detalles</a></li>";
                                    echo "<li class='ctg-name'><a href='evento.php?evento=" . htmlspecialchars($evento['idevento']) . "'><i class='flaticon-chef'></i>Ver mas detalles</a></li>";
                                    echo "<li class='entry-meta'>";
                                    echo "<ul>";
                                    echo "<li class='tooltip-item ctg-icon' data-tips='Restaurant'><a href='#'><i class='flaticon-chef'></i></a></li>";
                                    echo "<li class='tooltip-item' data-tips='COMPARTIR'><a href='javascript:void(0);' class='share-btn' data-event-url='https://honvivo.test/evento.php?evento=" . htmlspecialchars($evento['idevento']) . "'><i class='fas fa-share'></i></a></li>";

                                    
                                    echo "</ul>";
                                    echo "</li>";
                                    echo "</ul>";
                                    echo "</div>"; 
                                    echo "</div>"; 
                                    echo "</div>"; 
                                }
                                echo "</div>";
                            } catch (\PDOException $e) {
                                echo 'Error: ' . $e->getMessage();
                            }
                            ?>
                           <ul class="pagination-layout1">
                            <?php if ($paginaActual > 1): ?>
                                <li><a href="?pagina=<?php echo $paginaActual - 1; ?>">&laquo;</a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <li class="<?php echo $i == $paginaActual ? 'active' : ''; ?>">
                                    <a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($paginaActual < $totalPaginas): ?>
                                <li><a href="?pagina=<?php echo $paginaActual + 1; ?>">&raquo;</a></li>
                            <?php endif; ?>
                        </ul>

                        </div>

                        
                    </div>
                    <div class="order-lg-1 col-lg-4 sidebar-widget-area sidebar-break-md">
                        <div class="widget widget-box-padding widget-filter" id="busqueda">
                            <form id="BusquedaHome" action="resultadosPrincipales.php" method="post" class="category-search-form">

                            
                            <h3 class="widget-title">Nueva Búsqueda</h3>
                            <div class="input-group stylish-input-group">
                            <input type="text" name="InputEvento" placeholder="Evento" class="form-control" id="InputEvento">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <i class="flaticon-search"></i>
                                    </button>
                                </span>
                            </div>
                           
                            <div class="input-group">
                            <select name="SelectCiudad" class="form-control" id="SelectCiudad">
                                <option value="">Ciudad</option>
                                <?php
                                                    try {
                                                        $stmt = $pdo->prepare("SELECT idciudad, ciudad FROM ciudades");
                                                        $stmt->execute();
                                                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($result as $row) {
                                                            echo '<option value="' . $row['idciudad'] . '">' . $row['ciudad'] . '</option>';
                                                        }
                                                    } catch (\PDOException $e) {
                                                        echo 'Error: ' . $e->getMessage();
                                                    }
                                                    ?>
                            </select>
                            </div>
                            <div class="input-group">
                            <input type="date" name="InputFecha" placeholder="Fecha" class="form-control" id="InputFecha">
                            </div>
                            <div class="input-group">
                            <select name="SelectCategoria" class="form-control">
                                <option value="">Categoria</option>
                                <?php
                                                    try {
                                                        $stmt = $pdo->prepare("SELECT idcategoria, categoria FROM categorias");
                                                        $stmt->execute();
                                                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($result as $row) {
                                                            echo '<option value="' . $row['idcategoria'] . '">' . $row['categoria'] . '</option>';
                                                        }
                                                    } catch (\PDOException $e) {
                                                        echo 'Error: ' . $e->getMessage();
                                                    }
                                                    ?>
                            </select>
                            </div>
                     
                            <div class="form-group mb-0">
                            <button type="submit" class="item-btn">Buscar</button>
                            </div>
                            </form>
                        </div>
                        <div class="widget widget-poster widget-box-padding">
                            <div class="item-img">
                                <img src="img/figure/sidebar-figure.jpg" alt="Poster" class="img-fluid">
                            </div>
                        </div>
                        <div class="widget widget-poster widget-box-padding">
                            <div class="item-img">
                                <img src="img/figure/sidebar-figure.jpg" alt="Poster" class="img-fluid">
                            </div>
                        </div>
                        <div class="widget widget-contact-info">
                            <div class="bg-icon">
                                <i class="flaticon-phone-call"></i>
                            </div>
                            <h4 class="item-title">¿Quieres publicitar algo aqui?</h4>
                            <p>Contactanos para mostrar tu publicidad a mas personas</p>
                            <div class="contact-number">+52 5565 0489 69</div>
                        </div>
       
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer Area Start Here -->
        <?php include 'footer.php'; ?>
        <!-- Footer Area End Here -->
    </div>
    <!-- Modal Start-->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="title-default-bold mb-none">Ingresar Sesión</div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="login-form" method="POST" action="php/login.php">
            <input class="main-input-box" type="text" name="correo" placeholder="Correo" required />
            <input class="main-input-box" type="password" name="contrasena" placeholder="Contraseña" required />
            <div class="inline-box mb-5 mt-4">
              <div class="checkbox checkbox-primary">
                <input id="checkbox1" type="checkbox">
                <label for="checkbox1">Recuérdame</label>
              </div>
              <label class="lost-password"><a href="#">¿Olvidaste tu contraseña?</a></label>
            </div>
            <div class="inline-box mb-5 mt-4">
              <button class="btn-fill" type="submit" value="Login">Iniciar Sesión</button>
              <a href="#" class="btn-register"><i class="fas fa-user"></i>Regístrate aquí!</a>
            </div>
          </form>
          <label>Ingresa sesión con tus redes sociales</label>
          <div class="login-box-social">
            <ul>
              <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="#" class="google"><i class="fab fa-google-plus-g"></i></a></li>
            </ul>
          </div>
          <?php
                // Muestra un mensaje de error si existe
                if (isset($error_message)) {
                    echo "<p style='color: red;'>$error_message</p>";
                }
                ?>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal End-->
    <!-- Jquery Js -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins Js -->
    <script src="/js/plugins.js"></script>
    <!-- Owl Carousel Js -->
    <script src="/js/owl.carousel.min.js"></script>
    <!-- Silk Cauosel JS -->
    <script src="/js/slick.min.js"></script>
    <!-- Select 2 Js -->
    <script src="/js/select2.full.min.js"></script>
    <!-- Smoothscroll Js -->
    <script src="/js/smoothscroll.min.js"></script>
    <!-- Custom Js -->
    <script src="/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
//toatr mensajes:
toastr.options = {
                    closeButton: true,
                    debug: false,
                    newestOnTop: false,
                    progressBar: true,
                    positionClass: "toast-bottom-right",
                    preventDuplicates: false,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut"
                };
                function toastExito(mensaje) {
                    toastr.success(mensaje, "Exito");
                }
                function toastError(mensaje) {
                    toastr.error(mensaje, "Error");
                }
                function toastInfo(mensaje) {
                    toastr.info(mensaje, "Informacion");
                }
                function toastWarning(mensaje) {
                    toastr.warning(mensaje, "Atención");
                }

//copiar link
        document.addEventListener('DOMContentLoaded', function() {
            var shareButtons = document.querySelectorAll('.share-btn');
            shareButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    var url = event.currentTarget.getAttribute('data-event-url');
                    if (!url) {
                        console.error('URL no encontrada');
                        return;
                    }
                    copyToClipboard(url);
                });
            });
        });

        function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        toastInfo('Link copiado al portapapeles');
    }).catch(function(err) {
        toastr.error('Error al copiar al portapapeles');
    });
}

    </script>
</body>

</html>