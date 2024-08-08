<section id="destacados" class="listing-wrap-layout1 padding-top-9p6 padding-bottom-7 bg--light">
      <div class="container">
        <div class="section-heading heading-dark heading-center">
          <div class="item-sub-title">Mira nuestros eventos</div>
          <h2 class="item-title">EVENTOS DESTACADOS</h2>
        </div>
        <div class="row" id="no-equal-gallery">

        <?php
          include_once 'conn.php';
          setlocale(LC_TIME, 'es_ES.UTF-8', 'Spanish_Spain', 'Spanish');
          
          try {
           $query = "SELECT e.*, 
                  ci.ciudad AS nombreCiudad, 
                  c1.categoria AS nombreCategoria, 
                  c2.categoria AS nombreCategoriaSecundaria, 
                  u.ubicacion, 
                  u.nombre AS nombreUsuario, 
                  u.fotouser
              FROM eventos AS e
              LEFT JOIN ciudades AS ci ON e.idciudad = ci.idciudad 
              LEFT JOIN categorias AS c1 ON e.idcategoria = c1.idcategoria
              LEFT JOIN usuarios AS u ON e.idusuario = u.idusuario
              LEFT JOIN categorias AS c2 ON e.idcategoriasecundaria = c2.idcategoria
              WHERE destacado=1";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            //MVC
            //require_once __DIR__ .'/../controllers/eventcontrollers.php';
            //require_once 'controllers/eventcontrollers.php';
            //$eventController = new EventController();
            //$resultados = $eventController->getEventsDestacadosController();
            //print_r($resultados);
           
            foreach ($resultados as $evento) {
                echo "<div class='col-xl-4 col-lg-6 col-md-6 col-12 no-equal-item'>";
                echo "<div class='listing-box-grid'>";
                echo "<div class='product-box'>";
                echo "<div class='item-img bg--gradient-50'>";
                echo "<div class='item-status status-open active'>" . htmlspecialchars($evento['nombreCategoria']) . "</div>";
                if (!empty($evento['nombreCategoriaSecundaria'])) {
                    echo "<div class='item-status status-save active'>" . htmlspecialchars($evento['nombreCategoriaSecundaria']) . "</div>";
                }
                echo "<img src='getEventoImage.php?idevento=" . htmlspecialchars($evento['idevento']) . "' alt='Imagen del Evento' class='img-fluid grid-view-img'>";


                if (!empty($evento['idusuario'])) {
                    echo "<div class='item-logo'>
                            <img src='getImage.php?idusuario=" . htmlspecialchars($evento['idusuario']) . "' alt='Logo del usuario' class='usuario-imagen'>
                            <p class='item-paragraph'>" . htmlspecialchars($evento['nombreUsuario']) . "</p>
                          </div>";
                } else {
                    echo "<div class='item-logo'>
                            <img src='./img/author/default.png' alt='Logo Default' class='usuario-imagen'>
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
                echo "</div>"; 
            }
            //echo "</div>";
          } catch (\PDOException $e) {
              echo 'Error: ' . $e->getMessage();
          }
          ?>                
        </div>
        <div class="row mt-5">
          <div class="col-12">
            <div class="loadmore text-center">
              <a href="#" class="btn-fill">Ver Todos los eventos</a>
            </div>
          </div>
        </div>
      </div>
    </section>