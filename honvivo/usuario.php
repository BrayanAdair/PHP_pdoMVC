<?php
include('php/auth.php');
if (isset($_SESSION["fotouser"])) {
    // Código para mostrar la imagen...
} else {
    // Mostrar imagen predeterminada o manejar la ausencia de la imagen de alguna manera
}
include("conn.php");
?>
<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Honvivo | Mi Perfil</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.ico">
    <!-- Normalize Css -->
    <link rel="stylesheet" href="/css/normalize.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="/css/main.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/css/animate.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/css/fontawesome-all.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="/css/select2.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Modernizr Js -->
    <script src="/js/modernizr-3.6.0.min.js"></script>

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
        <?php include 'header.php'; ?>
        <!-- Header Area End Here -->
        <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common inner-page-top-margin overlay-dark-40"
            data-bg-image="img/figure/inner-page-banner1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Mi Perfil</h1>
                            <ul>
                                <li>
                                    <a href="index.html">Inicio</a>
                                </li>
                                <li>Mi perfil</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- My Account Area Start Here -->
        <section class="my-account-wrap padding-top-10 padding-bottom-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <ul class="nav nav-tabs my-account-nav">
                            <li><a class="active" href="#dashboard" data-toggle="tab"
                                    aria-expanded="false">Mis Datos</a></li>
                            <li><a href="#listings" data-toggle="tab" aria-expanded="false">Mis Eventos</a></li>
                            
                            <li><a href="#account-details" data-toggle="tab" aria-expanded="false">Subir Evento</a>
                            </li>
                            <li><a href="php/logout.php" aria-expanded="false">Salir</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="my-account-content tab-content">
                            <!-- INICIO SUBIR EVENTOS -->
                            <div class="tab-pane active show" id="dashboard">
                                <div class="dashboard">
                                    <div class="media box-padding media-none--xs">

                                    <div class="media">
                                    <?php if(isset($_SESSION["id"]) && $_SESSION["id"] != ""): ?>
                                        <img src="php/decodeImg.php" alt="Perfil" class="perfil-imagen">
                                    <?php else: ?>
                                        <img src="img/author/default.png" alt="Perfil"> 
                                    <?php endif; ?>


                                        <div class="media-body">
                                            <?php
                                           if (isset($_SESSION["nombre"]) && isset($_SESSION["correo"])) {
                                            echo "<h2>" . $_SESSION["nombre"] . "</h2>";
                                            echo "<h3><span>Email :</span> " . $_SESSION["correo"] . "</h3>";
                                        
                                            // Mostrar ID Ciudad
                                            if (isset($_SESSION["idciudad"])) {
                                                try {
                                                    $stmt = $pdo->prepare("SELECT ciudad FROM ciudades WHERE idciudad = :idciudad");
                                                    $stmt->execute(['idciudad' => $_SESSION["idciudad"]]);
                                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                                    if ($result) {
                                                        echo "<h3><span>Ciudad :</span> " . $result['ciudad'] . "</h3>";
                                                    } else {
                                                        echo "<h3><span>Ciudad :</span> No disponible</h3>";
                                                    }
                                                } catch (\PDOException $e) {
                                                    echo 'Error: ' . $e->getMessage();
                                                }
                                            } else {
                                                echo "<h3><span>Ciudad :</span> No disponible</h3>";
                                            }
                                            
                                        
                                            // Añadir una línea para mostrar el teléfono
                                            if (isset($_SESSION["telefono"])) {
                                                echo "<h3><span>Teléfono :</span> " . $_SESSION["telefono"] . "</h3>";
                                            } else {
                                                echo "<h3><span>Teléfono :</span> No disponible</h3>";
                                            }
                                        } else {
                                            echo "<h2>Usuario no identificado</h2>";
                                            echo "<h3><span>Email :</span> No disponible</h3>";
                                            echo "<h3><span>Ciudad :</span> No disponible</h3>";
                                            echo "<h3><span>Teléfono :</span> No disponible</h3>";
                                        }
                                            ?>
                                            <p>¡Bienvenido a tu perfil!, aquí podrías subir, editar y eliminar tus eventos pero recuerda que para subir un evento necesitas tener tu informacion personal completa de lo contrario no podras subir eventos.</p>

                                        </div>
                                    </div>
                                    </div>
                                      <!-- forms -->
                                      <form action="php/update_user.php" method="post" enctype="multipart/form-data">
                                <div class="account-details listing-form box-padding">
                                    <div class="inner-box">
                                        <h3 class="inner-item-heading2">Informacion Personal</h3>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Nombre</label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="" class="form-control" name="nombre">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>E-mail</label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="" class="form-control" name="correo">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Contraseña</label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="" class="form-control" name="contrasena">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Foto Perfil</label>
                                                <div class="form-group">
                                                    <input type="file" class="form-control" name="perfil">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                                    <div class="inner-box">
                                        <h3 class="inner-item-heading2">Informacion de Ubicación</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ubicación</label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="" class="form-control" name="ubicacion">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Ciudad</label>
                                                <div class="form-group">
                                                <select name="SelectCiudad" class="form-control" id="SelectCiudad">
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
                                            </div>
                                     
                                        
                                            <div class="col-md-6">
                                                <label>Link de tu ubicacion</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="ubicacionlink">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Telefono - WhatsApp</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="telefono">
                                                </div>
                                            </div>
                                            <div class="row justify-content-md-center">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-lg btn-primary">Actualizar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <?php
                                    $amenidades = array();
                                    if (isset($_SESSION["id"])) {
                                        try {
                                            $stmtAmenidades = $pdo->prepare("SELECT idamenidad, amenidad FROM amenidades WHERE idusuario = :idusuario");
                                            $stmtAmenidades->execute(['idusuario' => $_SESSION["id"]]);
                                            $amenidades = $stmtAmenidades->fetchAll(PDO::FETCH_ASSOC);
                                        } catch (\PDOException $e) {
                                            echo 'Error: ' . $e->getMessage();
                                        }
                                    }
                                    ?>
                                <form action="php/agregarAmenidad.php" method="post">
                                <div class="inner-box">
                                    <h3 class="inner-item-heading2">Amenidades del lugar</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Nombre de la amenidad</label>
                                            <div class="form-group">
                                                <input type="text" placeholder="" class="form-control" name="nombreAmenidad">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-lg btn-primary">Agregar a Tabla</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead scope="row">
                                        <tr>
                                            <th scope="col">Amenidad</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($amenidades as $amenidad): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($amenidad['amenidad']); ?></td>
                                            <td>
                                            <a href="php/eliminarAmenidad.php?id=<?php echo $amenidad['idamenidad']; ?>">Eliminar</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                                </div>
                            
                                    <!-- aqui -->
                                </div>
                            </div>

                            <!-- FIN DETALLES PERFIL -->
                            <div class="tab-pane fade" id="listings">
                                <div class="listing-box-list">

                                <?php
                                if (isset($_SESSION["id"]) && $_SESSION["id"] != "") {
                                    $eventosPorPagina = 4; 
                                    try {
                                        //
                                        $queryTotal = "SELECT COUNT(*) FROM eventos WHERE idusuario = :idUsuario";
                                        $stmtTotal = $pdo->prepare($queryTotal);
                                        $stmtTotal->bindValue(':idUsuario', $_SESSION["id"], PDO::PARAM_INT);
                                        $stmtTotal->execute();
                                        $totalEventos = $stmtTotal->fetchColumn();
                                        $totalPaginas = ceil($totalEventos / $eventosPorPagina);
                                        $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                        $paginaActual = max(1, min($paginaActual, $totalPaginas));
                                        $inicio = ($paginaActual - 1) * $eventosPorPagina;
                                        //
                                        $query = "SELECT eventos.*, ciudades.ciudad FROM eventos 
                                        LEFT JOIN ciudades ON eventos.idciudad = ciudades.idciudad 
                                        WHERE idusuario = :idUsuario 
                                        ORDER BY fecha ASC, hora ASC 
                                        LIMIT :inicio, :eventosPorPagina";
                                        $stmt = $pdo->prepare($query);
                                        $stmt->bindValue(':idUsuario', $_SESSION["id"], PDO::PARAM_INT);
                                        $stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
                                        $stmt->bindValue(':eventosPorPagina', $eventosPorPagina, PDO::PARAM_INT);
                                        $stmt->execute();
                                        $eventosUsuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                
                                        if ($eventosUsuario) {
                                            foreach ($eventosUsuario as $evento) {
                                                echo "<div class='product-box'>";
                                                echo "<div class='item-img bg--gradient-50'>";
                                                echo "<div class='item-status status-open active'>ACTIVO</div>";
                                                // Ruta de la imagen por defecto
                                                if (!empty($evento['fotoevento'])) {
                                                    // Utilizar getEventoImage.php para mostrar la imagen
                                                    $urlImagenEvento = 'getEventoImage.php?idevento=' . $evento['idevento'];
                                                    echo "<img src='{$urlImagenEvento}' alt='Imagen del Evento' class='img-fluid list-view-img imagen-evento-usuario'>";
                                                } else {
                                                    // Si no hay imagen, mostramos una imagen por defecto
                                                    echo "<img src='img/author/defaulEvento.png' alt='Imagen por defecto' class='img-fluid list-view-img imagen-evento-usuario'>";
                                                }
                                                echo "</div>";
                                                echo "<div class='item-content'>";
                                                echo "<h3 class='item-title'><a href='evento.php?evento=" . htmlspecialchars($evento['idevento']) . "'>" . htmlspecialchars($evento['titulo']) . "</a></h3>";
                                                echo "<ul class='contact-info'>";
                                                echo "<li><i class='fas fa-map-marker-alt'></i>Ciudad: " . htmlspecialchars($evento['ciudad']) . "</li>";
                                                echo "<li><i class='far fa-calendar-alt'></i>" . htmlspecialchars($evento['fecha']) . "</li>";
                                                echo "</ul>";
                                                echo "<ul class='meta-item'>";
                                                echo "<button class='botoneditar' data-toggle='modal' data-target='#modalFormulario" . $evento['idevento'] . "'>Editar</button>";
                                                echo "<li class='item-btn'><a href='php/eliminarEvento.php?idevento=" . $evento['idevento'] . "' class='btn-fill'>Eliminar</a></li>";
                                                echo "</ul>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                        } else {
                                            echo "<p>No hay eventos para mostrar.</p>";
                                        }
                                    } catch (\PDOException $e) {
                                        echo 'Error: ' . $e->getMessage();
                                    }
                                } else {
                                    echo "<p>Usuario no autenticado. Por favor, inicie sesión.</p>";
                                }
                                
                                
                                echo '<ul class="pagination-layout1">';
                                if ($paginaActual > 1) {
                                    echo '<li><a href="?pagina=' . ($paginaActual - 1) . '"><i class="flaticon-back"></i></a></li>';
                                }
                                for ($i = 1; $i <= $totalPaginas; $i++) {
                                    echo '<li' . ($i == $paginaActual ? ' class="active"' : '') . '><a href="?pagina=' . $i . '">' . $i . '</a></li>';
                                }
                                if ($paginaActual < $totalPaginas) {
                                    echo '<li><a href="?pagina=' . ($paginaActual + 1) . '"><i class="flaticon-right-arrow"></i></a></li>';
                                }
                                echo '</ul>';
                            
                                ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <!-- SUBIR EVENTOS -->
                            <form action="php/new_evento.php" method="post" enctype="multipart/form-data">
                                <div class="account-details listing-form box-padding">
                                    <div class="inner-box">
                                        <h3 class="inner-item-heading2">Publicar Evento</h3>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Titulo</label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="" class="form-control" name="titulo" maxlength="50" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>fecha</label>
                                                <div class="form-group">
                                                    <input type="date" placeholder="" class="form-control" name="fecha" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Hora</label>
                                                <div class="form-group">
                                                    <input type="time" placeholder="" class="form-control" name="hora" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>WhatsApp</label>
                                                <div class="form-group">
                                                <input type="text" class="form-control" name="whatsapp" maxlength="50" value="<?php echo isset($_SESSION["telefono"]) ? $_SESSION["telefono"] : ''; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Link Externo</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="linkexterno" maxlength="50" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Subtitulo</label>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" name="tprincipal" maxlength="100" required> </textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Texto informativo</label>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" name="tsecundario" maxlength="500" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Informacion extra</label>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" name="tpie" maxlength="100" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Foto del evento</label>
                                                <div class="form-group">
                                                    <input type="file" placeholder="" class="form-control" name="fotoevento" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-box">
                                        <h3 class="inner-item-heading2">Precios y Categoria</h3>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                <label>¿Es gratis el evento?</label>
                                                </div>
                                                <div class="col">
                                                    <label>
                                                    <input type="radio" class="form-control" name="eventoGratis" value="1"> Sí
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label>
                                                    <input type="radio" class="form-control" name="eventoGratis" value="0" checked> No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-6" name="divprecios">
                                                <label>Preventa</label>
                                                <div class="form-group">
                                                    <input type="number" placeholder="" class="form-control" name="pregeneral" max="999999" >
                                                </div>
                                            </div>
                                            <div class="col-md-6" name="divprecios">
                                                <label>general</label>
                                                <div class="form-group">
                                                    <input type="number" placeholder="" class="form-control" name="pgeneral" max="999999" >
                                                </div>
                                            </div>
                                            <div class="col-md-6" name="divprecios">
                                                <label>Preventa VIP</label>
                                                <div class="form-group">
                                                    <input type="number" placeholder="" class="form-control" name="previp" max="999999" >
                                                </div>
                                            </div>
                                            <div class="col-md-6" name="divprecios">
                                                <label>VIP</label>
                                                <div class="form-group">
                                                    <input type="number" placeholder="" class="form-control" name="pvip" max="999999" >
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-12">
                                                <label>Categoria</label>
                                                <div class="form-group">
                                                <select class="form-control" name="idcategoria" required>
                                                <?php
                                                try {
                                                    $stmt = $pdo->prepare("SELECT idcategoria, categoria FROM categorias");
                                                    $stmt->execute();
                                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result as $row) {
                                                        echo '<option value="' . $row['idcategoria'] . '">' . $row['categoria'] . '</option>';
                                                    }
                                                } catch (PDOException $e) {
                                                    echo 'Error: ' . $e->getMessage();
                                                }
                                                ?>
                                            </select>

                                                </div>
                                            </div>
                                            <div class="row justify-content-md-center">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-lg btn-primary">Actualizar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- FIN SUBIR EVENTOS -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- My Account Area End Here -->
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
<?php foreach ($eventosUsuario as $evento): ?>
    <div class="modal fade" id="modalFormulario<?php echo $evento['idevento']; ?>" role="dialog">
        <div class="modal-dialog">
            <!-- Contenido del Modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edita el evento</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="php/update_evento.php" enctype="multipart/form-data">
                        <input type="hidden" name="idevento" value="<?php echo $evento['idevento']; ?>">
                        <input class="main-input-box" type="text" name="titulo" placeholder="Titulo" />
                        <input class="main-input-box" type="date" name="fecha" placeholder="fecha" />
                        <input class="main-input-box" type="time" name="hora" placeholder="Hora" />
                        <input class="main-input-box" type="text" name="whatsapp" placeholder="WhatsApp" />
                        <input class="main-input-box" type="text" name="linkexterno" placeholder="Link Externo" />
                        <input class="main-input-box" type="text" name="tprincipal" placeholder="Subtitulo" />
                        <input class="main-input-box" type="text" name="tsecundario" placeholder="Texto Informativo" />
                        <input class="main-input-box" type="text" name="tpie" placeholder="Informacion extra" />
                        <input class="main-input-box" type="file" name="fotoevento" placeholder="Foto del evento" />
                        <input class="main-input-box" type="number" name="pregeneral" placeholder="Preventa" />
                        <input class="main-input-box" type="number" name="pgeneral" placeholder="General" />
                        <input class="main-input-box" type="number" name="previp" placeholder="Preventa VIP" />
                        <input class="main-input-box" type="number" name="pvip" placeholder="VIP" />
                        <select class="main-input-box" name="idcategoria">
                            <option value="">Selecciona una Categoría</option>
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

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

   
    <!-- Modal End-->
    <!-- Jquery Js -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins Js -->
    <script src="/js/plugins.js"></script>
    <!-- Waypoints Js -->
    <script src="/js/waypoints.min.js"></script>
    <!-- Select 2 Js -->
    <script src="/js/select2.full.min.js"></script>
    <!-- Smoothscroll Js -->
    <script src="/js/smoothscroll.min.js"></script>
    <!-- Custom Js -->
    <script src="/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-eliminar').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            var idevento = this.getAttribute('data-idevento');
            if(confirm('¿Estás seguro de que deseas eliminar este evento?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'eliminarEvento.php?idevento=' + idevento, true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        // Eliminar visualmente el evento del DOM o recargar la página
                        location.reload(); // Esto recargará la página para ver los cambios
                    }
                }
                xhr.send();
            }
        });
    });

document.querySelectorAll('.btn-fill').forEach(button => {
        button.addEventListener('click', function() {
            const idevento = this.getAttribute('data-idevento');
            document.getElementById('modal-idevento').value = idevento;
            // Aquí puedes añadir más código para manejar otros campos si es necesario
        });
    });

});

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


</script>
<script>
    //mostrar alertas de eiminar eventos por status de session
window.onload = function() {
    <?php
    if(isset($_SESSION['eliminado'])) {
        if($_SESSION['eliminado'] == 'true') {
            echo "toastExito('Evento eliminado con éxito');";
        } else {
            echo "toastError('Error al eliminar el evento');";
        }
        unset($_SESSION['eliminado']);
    }
    if(isset($_SESSION['creadoevento'])) {
        if($_SESSION['creadoevento'] == 'true') {
            echo "toastExito('Evento creado con éxito');";
        } else {
            echo "toastError('Error al crear el evento');";
        }
        unset($_SESSION['creadoevento']);
    }
    if(isset($_SESSION['updateuser'])) {
        if($_SESSION['updateuser'] == 'true') {
            echo "toastExito('Informacion actualizada con éxito');";
        } else {
            echo "toastError('Error al actualizar informacion');";
        }
        unset($_SESSION['updateuser']);
    }
    if(isset($_SESSION['updateevento'])) {
        if($_SESSION['updateevento'] == 'true') {
            echo "toastExito('Informacion del evento actualizada con éxito');";
        } else {
            echo "toastError('Error al actualizar informacion del evento');";
        }
        unset($_SESSION['updateevento']);
    }
    if(isset($_SESSION['agregaramenidad'])) {
        if($_SESSION['agregaramenidad'] == 'true') {
            echo "toastExito('Amenidad Guardada');";
        } else {
            echo "toastError('No se pudo guardar la amenidad intentalo de nuevo');";
        }
        unset($_SESSION['agregaramenidad']);
    }
    
    if(isset($_SESSION['eliminaramenidad'])) {
        if($_SESSION['eliminaramenidad'] == 'true') {
            echo "toastExito('Amenidad Eliminada');";
        } else {
            echo "toastError('No se pudo Eliminar la amenidad intentalo de nuevo');";
        }
        unset($_SESSION['eliminaramenidad']);
    }
    ?>
}
//Ocultar div de precios si checked es gratis o no

document.addEventListener('DOMContentLoaded', function () {
    var radios = document.getElementsByName('eventoGratis');
    var divsPrecios = document.getElementsByName('divprecios');

    // Función para actualizar la visibilidad de los divsPrecios
    function updateDivVisibility() {
        divsPrecios.forEach(div => {
            div.style.display = radios[0].checked ? 'none' : 'block';
        });
    }

    // Agregar evento 'change' a cada botón de radio
    radios.forEach(function(radio) {
        radio.addEventListener('change', updateDivVisibility);
    });

    // Inicializar la visibilidad correcta al cargar
    updateDivVisibility();
});

</script>


</body>

</html>