<?php
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
  <link rel="shortcut icon" href="/img/favicon.ico">
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/animate.min.css">
  <link rel="stylesheet" href="/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="/fonts/flaticon.css">
  <link rel="stylesheet" href="/css/slick.css">
  <link rel="stylesheet" href="/css/slick-theme.css">
  <link rel="stylesheet" href="/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="/js/modernizr-3.6.0.min.js"></script>
</head>

<body>
  <div id="preloader"></div>
  <a href="#wrapper" data-type="section-switch" class="scrollup">
    <i class="fas fa-angle-double-up"></i>
  </a>
  <div id="wrapper" class="wrapper">
    <header id="site-header" class="header-one">
      <div class="header-main header-sticky">
        <div class="container-fluid">
          <div class="mob-menu-open toggle-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
          <div class="row">
            <div class="col-lg-2 col-12">
              <div class="site-logo">
                <a href="index.html" class="main-logo"><img src="/img/logo.png" alt="Site Logo"></a>
                <a href="index.html" class="sticky-logo"><img src="/img/logo.png" alt="Site Logo"></a>
              </div>
            </div>
            <div class="col-lg-7 col-12 possition-static">
              <nav class="site-nav">
                <ul class="site-menu">
                  <li><a href="#">Inicio</a>
                  </li>
                  <li>
                    <a href="resultadosPrincipales.php">Eventos</a>
                  </li>
                  <li><a href="#destacados">Destacados</a>
                  </li>
                  <li><a href="contacto.php">Contacto</a>
                  </li>
                  <li class="hide-on-desktop-menu">
                    <button type="button" class="login-btn" data-toggle="modal" data-target="#myModal">
                      <i class="flaticon-profile"></i>Ingresar
                    </button>
                  </li>

                </ul>
              </nav>
            </div>
            <div class="col-lg-3 d-none d-lg-flex align-items-center justify-content-end">
              <div class="nav-action-elements">
                <ul>
                  <li>
                    <button type="button" class="login-btn" data-toggle="modal" data-target="#myModal">
                      <i class="flaticon-profile"></i>Ingresar
                    </button>
                  </li>
                  <li>
                    <a href="usuario.php" class="ghost-btn"><i class="fas fa-plus"></i>Agregar Evento</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header Area End Here -->
    <!-- Main Banner Area Start Here -->
    <section class="main-banner-wrap-layout1 bg-common overlay-dark-30 bg--gradient-top-30"
      data-bg-image="img/figure/portada.jpg">
      <div class="container">
        <div class="main-banner-box-layout1">
          <p class="item-sub-title">Descubre los mejores eventos en tu ciudad</p>
          <h1 class="item-title">Entretenimiento a un click de distancia</h1>
          <form id="BusquedaHome" action="resultadosPrincipales.php" method="post" class="category-search-form">
            <ul class="form-items">
              <li>
                <div class="input-group stylish-input-group">
                  <input type="text" name="InputEvento" placeholder="Evento" class="form-control" id="InputEvento">
                </div>
              </li>
              <li>
                <div class="input-group stylish-select-group">
                  <select name="SelectCiudad" class="form-control" id="SelectCiudad" required>
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
              </li>
              <li>
                <div class="input-group stylish-input-group">
                  <input type="date" name="InputFecha" placeholder="dd/mm/aaa" class="form-control" id="InputFecha">
                </div>
              </li>
              <li>
                <div class="input-group stylish-input-group">
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
              </li>
              <li>
                <div class="form-group mb-0">
                  <button type="submit" class="item-btn">Buscar</button>
                </div>
              </li>
            </ul>
          </form>
          <ul class="item-ctg">
            <li>
              <a class="item-icon" href="#"><i class="flaticon-chef"></i></a>
              <a href="#" class="ctg-title">Música en vivo</a>
            </li>
            <li>
              <a class="item-icon" href="#"><i class="flaticon-dish"></i></a>
              <a href="#" class="ctg-title">Karaoke</a>
            </li>
            <li>
              <a class="item-icon" href="#"><i class="flaticon-supermarket"></i></a>
              <a href="#" class="ctg-title">Baile</a>
            </li>
            <li>
              <a class="item-icon" href="#"><i class="flaticon-musical-note"></i></a>
              <a href="#" class="ctg-title">Djs y Fiesta</a>
            </li>
            <li>
              <a class="item-icon" href="#"><i class="flaticon-coffee-cup"></i></a>
              <a href="#" class="ctg-title">Deportes</a>
            </li>
            <li>
              <a class="item-icon" href="#"><i class="flaticon-hotel"></i></a>
              <a href="#" class="ctg-title">Comedia</a>
            </li>
            <li class="d-none d-lg-block">
              <p>O escoje una categoria</p>
              <div class="item-img">
                <img src="/img/figure/arrow.png" alt="Arrow">
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <section class="brand-wrap-layout1 bg--light padding-top-9p6 ">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="6" data-margin="60" data-autoplay="true"
                    data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false"
                    data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="false" data-r-x-small-dots="false"
                    data-r-x-medium="3" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3"
                    data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false"
                    data-r-medium-dots="false" data-r-large="5" data-r-large-nav="false" data-r-large-dots="false"
                    data-r-extra-large="5" data-r-extra-large-nav="false" data-r-extra-large-dots="false">
                    <div class="brand-box-layout1">
                        <img src="img/brand/brand1.png" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-box-layout1">
                        <img src="img/brand/brand2.png" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-box-layout1">
                        <img src="img/brand/brand3.png" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-box-layout1">
                        <img src="img/brand/brand4.png" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-box-layout1">
                        <img src="img/brand/brand5.png" alt="Brand" class="img-fluid">
                    </div>
                    <div class="brand-box-layout1">
                        <img src="img/brand/brand1.png" alt="Brand" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
    <!-- Main Banner Area End Here -->
    <!-- Feature Area Start Here -->
    <section class="feature-wrap-layout1 padding-top-9p6 padding-bottom-7 bg--light">
      <div class="container">
        <div class="section-heading heading-dark heading-center">
          <h2 class="item-title">CIUDADES RELEVANTES</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="feature-box-layout1">
              <div class="item-img bg--gradient-80">
                <img src="/img/feature/feature1.jpg" alt="Feature" class="img-fluid">
              </div>
              <div class="item-content">
                <h3 class="item-title"><a href="#">Tegucigalpa</a></h3>
                
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="feature-box-layout1">
              <div class="item-img bg--gradient-80">
                <img src="/img/feature/feature2.jpg" alt="Feature" class="img-fluid">
              </div>
              <div class="item-content">
                <h3 class="item-title"><a href="#">San Pedro Sula</a></h3>
                
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="feature-box-layout1">
              <div class="item-img bg--gradient-80">
                <img src="/img/feature/feature3.jpg" alt="Feature" class="img-fluid">
              </div>
              <div class="item-content">
                <h3 class="item-title"><a href="#">Comayagua</a></h3>
                
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="feature-box-layout1">
              <div class="item-img bg--gradient-80">
                <img src="/img/feature/feature4.jpg" alt="Feature" class="img-fluid">
              </div>
              <div class="item-content">
                <h3 class="item-title"><a href="#">La Ceiba</a></h3>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Feature Area End Here -->
    <!-- Category Area Start Here -->
    <section class="category-wrap-layout1 padding-top-9p6 padding-bottom-7 overlay-dark-70 parallaxie bg--dark"
      data-bg-image="img/figure/figure2.jpg">
      <div class="container">
        <div class="section-heading heading-light heading-center">
          <div class="item-sub-title">Explora algunas de nuestras categorias mas relevantes</div>
          <h2 class="item-title">¿QUE ESTÁS BUSCANDO?</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="category-box-layout1">
              <div class="item-icon">
                <i class="flaticon-earth"></i>
              </div>
              <h3 class="item-title"><a href="#">Música en vivo</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category-box-layout1">
              <div class="item-icon">
                <i class="flaticon-supermarket"></i>
              </div>
              <h3 class="item-title"><a href="#">Karaoke</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category-box-layout1">
              <div class="item-icon">
                <i class="flaticon-chef"></i>
              </div>
              <h3 class="item-title"><a href="#">Baile</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category-box-layout1">
              <div class="item-icon">
                <i class="flaticon-musical-note"></i>
              </div>
              <h3 class="item-title"><a href="#">Djs y Fiesta</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category-box-layout1">
              <div class="item-icon">
                <i class="flaticon-coffee-cup"></i>
              </div>
              <h3 class="item-title"><a href="#">Deportes</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category-box-layout1">
              <div class="item-icon">
                <i class="flaticon-bed"></i>
              </div>
              <h5 class="item-title2"><a href="#">Conciertos Internacionales</a></>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category-box-layout1">
              <div class="item-icon">
                <i class="flaticon-spa"></i>
              </div>
              <h3 class="item-title"><a href="#">Poesía</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="category-box-layout1">
              <div class="item-icon">
                <i class="flaticon-dish"></i>
              </div>
              <h3 class="item-title"><a href="#">Comedia</a></h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Category Area End Here -->
    <!-- Listing Area Start Here -->
    <section id="destacados" class="listing-wrap-layout1 padding-top-9p6 padding-bottom-7 bg--light">
      <div class="container">
        <div class="section-heading heading-dark heading-center">
          <div class="item-sub-title">Mira nuestros (hacer esto dinamico)</div>
          <h2 class="item-title">EVENTOS DESTACADOS (hacer estos eventos dinamicos)</h2>
        </div>
        <div class="row" id="no-equal-gallery">
          <div class="col-xl-4 col-lg-6 col-md-6 col-12 no-equal-item">
            <div class="listing-box-grid">
              <div class="product-box border-box">
                <div class="item-img bg--gradient-50">
                  <div class="item-status status-open active">Open</div>
                  <div class="item-status status-save">subcategoria%</div>
                  <img src="/img/listing/listing-1-1.jpg" alt="Listing" class="img-fluid grid-view-img">
                  <img src="/img/listing/listing-1-2.jpg" alt="Listing" class="img-fluid list-view-img">
                  <ul class="item-rating">
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><span>8.4<span> / 10</span></span> </li>
                  </ul>
                  <div class="item-logo"><img src="/img/listing/logo1.png" alt="Logo"></div>
                </div>
                <div class="item-content">
                  <h3 class="item-title"><a href="#">Westfield Restaurant</a></h3>
                  <p class="item-text">Mountain Refuge Resort is the most ... </p>
                  <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i>59 Street, Mk tower, Brooklyn</li>
                    <li><i class="flaticon-phone-call"></i>+ 132 899 6330</li>
                    <li><i class="fas fa-globe"></i>www.restauant.com</li>
                  </ul>
                  <ul class="meta-item">
                    <li class="item-btn"><a href="#" class="btn-fill">Details</a></li>
                    <li class="ctg-name"><a href="#"><i class="flaticon-chef"></i>Restaurant</a></li>
                    <li class="entry-meta">
                      <ul>
                        <li class="tooltip-item ctg-icon" data-tips="Restaurant"><a href="#"><i
                              class="flaticon-chef"></i></a></li>
                        <li class="tooltip-item" data-tips="My Favourite"><a href="#"><i class="fas fa-heart"></i></a>
                        </li>
                        <li class="tooltip-item" data-tips="Gallery"><a href="#"><i class="far fa-image"></i></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 col-12 no-equal-item">
            <div class="listing-box-grid">
              <div class="product-box border-box">
                <div class="item-img bg--gradient-50">
                  <div class="item-status status-open active">Open</div>
                  <div class="item-status status-save">Save 15%</div>
                  <img src="/img/listing/listing-2-1.jpg" alt="Listing" class="img-fluid grid-view-img">
                  <img src="/img/listing/listing-2-2.jpg" alt="Listing" class="img-fluid list-view-img">
                  <ul class="item-rating">
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><span>8.4<span> / 10</span></span> </li>
                  </ul>
                  <div class="item-logo"><img src="/img/listing/logo2.png" alt="Logo"></div>
                </div>
                <div class="item-content">
                  <h3 class="item-title"><a href="#">Westfield Restaurant</a></h3>
                  <p class="item-text">Mountain Refuge Resort is the most ... </p>
                  <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i>59 Street, Mk tower, Brooklyn</li>
                    <li><i class="flaticon-phone-call"></i>+ 132 899 6330</li>
                    <li><i class="fas fa-globe"></i>www.restauant.com</li>
                  </ul>
                  <ul class="meta-item">
                    <li class="item-btn"><a href="#" class="btn-fill">Details</a></li>
                    <li class="ctg-name"><a href="#"><i class="flaticon-coffee-cup"></i>Bar &amp;
                        Cafe</a></li>
                    <li class="entry-meta">
                      <ul>
                        <li class="tooltip-item ctg-icon" data-tips="Bar &amp; Cafe"><a href="#"><i
                              class="flaticon-coffee-cup"></i></a></li>
                        <li class="tooltip-item" data-tips="My Favourite"><a href="#"><i class="fas fa-heart"></i></a>
                        </li>
                        <li class="tooltip-item" data-tips="Gallery"><a href="#"><i class="far fa-image"></i></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 col-12 no-equal-item">
            <div class="listing-box-grid">
              <div class="product-box border-box">
                <div class="item-img bg--gradient-50">
                  <div class="item-status status-open active">Open</div>
                  <div class="item-status status-save active">Subcategoria</div>
                  <img src="/img/listing/listing-3-1.jpg" alt="Listing" class="img-fluid grid-view-img">
                  <img src="/img/listing/listing-3-2.jpg" alt="Listing" class="img-fluid list-view-img">
                  <ul class="item-rating">
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><span>8.4<span> / 10</span></span> </li>
                  </ul>
                  <div class="item-logo"><img src="/img/listing/logo3.png" alt="Logo"></div>
                </div>
                <div class="item-content">
                  <h3 class="item-title"><a href="#">Westfield Restaurant</a></h3>
                  <p class="item-text">Mountain Refuge Resort is the most ... </p>
                  <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i>59 Street, Mk tower, Brooklyn</li>
                    <li><i class="flaticon-phone-call"></i>+ 132 899 6330</li>
                    <li><i class="fas fa-globe"></i>www.restauant.com</li>
                  </ul>
                  <ul class="meta-item">
                    <li class="item-btn"><a href="#" class="btn-fill">Details</a></li>
                    <li class="ctg-name"><a href="#"><i class="flaticon-spa"></i>Beauty &amp; Spa</a></li>
                    <li class="entry-meta">
                      <ul>
                        <li class="tooltip-item ctg-icon" data-tips="Beauty &amp; Spa"><a href="#"><i
                              class="flaticon-spa"></i></a></li>
                        <li class="tooltip-item" data-tips="My Favourite"><a href="#"><i class="fas fa-heart"></i></a>
                        </li>
                        <li class="tooltip-item" data-tips="Gallery"><a href="#"><i class="far fa-image"></i></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 col-12 no-equal-item">
            <div class="listing-box-grid">
              <div class="product-box border-box">
                <div class="item-img bg--gradient-50">
                  <div class="item-status status-open active">Open</div>
                  <div class="item-status status-save">Save 15%</div>
                  <img src="/img/listing/listing-4-1.jpg" alt="Listing" class="img-fluid grid-view-img">
                  <img src="/img/listing/listing-4-2.jpg" alt="Listing" class="img-fluid list-view-img">
                  <ul class="item-rating">
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><span>8.4<span> / 10</span></span> </li>
                  </ul>
                  <div class="item-logo"><img src="/img/listing/logo4.png" alt="Logo"></div>
                </div>
                <div class="item-content">
                  <h3 class="item-title"><a href="#">Westfield Restaurant</a></h3>
                  <p class="item-text">Mountain Refuge Resort is the most ... </p>
                  <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i>59 Street, Mk tower, Brooklyn</li>
                    <li><i class="flaticon-phone-call"></i>+ 132 899 6330</li>
                    <li><i class="fas fa-globe"></i>www.restauant.com</li>
                  </ul>
                  <ul class="meta-item">
                    <li class="item-btn"><a href="#" class="btn-fill">Details</a></li>
                    <li class="ctg-name"><a href="#"><i class="flaticon-supermarket"></i>Shopping</a></li>
                    <li class="entry-meta">
                      <ul>
                        <li class="tooltip-item ctg-icon" data-tips="Shopping"><a href="#"><i
                              class="flaticon-supermarket"></i></a></li>
                        <li class="tooltip-item" data-tips="My Favourite"><a href="#"><i class="fas fa-heart"></i></a>
                        </li>
                        <li class="tooltip-item" data-tips="Gallery"><a href="#"><i class="far fa-image"></i></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 col-12 no-equal-item">
            <div class="listing-box-grid">
              <div class="product-box border-box">
                <div class="item-img bg--gradient-50">
                  <div class="item-status status-open active">Open</div>
                  <div class="item-status status-save active">Save 15%</div>
                  <img src="/img/listing/listing-5-1.jpg" alt="Listing" class="img-fluid grid-view-img">
                  <img src="/img/listing/listing-5-2.jpg" alt="Listing" class="img-fluid list-view-img">
                  <ul class="item-rating">
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><span>8.4<span> / 10</span></span> </li>
                  </ul>
                  <div class="item-logo"><img src="/img/listing/logo5.png" alt="Logo"></div>
                </div>
                <div class="item-content">
                  <h3 class="item-title"><a href="#">Westfield Restaurant</a></h3>
                  <p class="item-text">Mountain Refuge Resort is the most ... </p>
                  <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i>59 Street, Mk tower, Brooklyn</li>
                    <li><i class="flaticon-phone-call"></i>+ 132 899 6330</li>
                    <li><i class="fas fa-globe"></i>www.restauant.com</li>
                  </ul>
                  <ul class="meta-item">
                    <li class="item-btn"><a href="#" class="btn-fill">Details</a></li>
                    <li class="ctg-name"><a href="#"><i class="flaticon-musical-note"></i>Nightlife</a></li>
                    <li class="entry-meta">
                      <ul>
                        <li class="tooltip-item ctg-icon" data-tips="Nightlife"><a href="#"><i
                              class="flaticon-musical-note"></i></a></li>
                        <li class="tooltip-item" data-tips="My Favourite"><a href="#"><i class="fas fa-heart"></i></a>
                        </li>
                        <li class="tooltip-item" data-tips="Gallery"><a href="#"><i class="far fa-image"></i></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 col-12 no-equal-item">
            <div class="listing-box-grid">
              <div class="product-box border-box">
                <div class="item-img bg--gradient-50">
                  <div class="item-status status-open active">Open</div>
                  <div class="item-status status-save">Save 15%</div>
                  <img src="/img/listing/listing-6-1.jpg" alt="Listing" class="img-fluid grid-view-img">
                  <img src="/img/listing/listing-6-2.jpg" alt="Listing" class="img-fluid list-view-img">
                  <ul class="item-rating">
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><span>8.4<span> / 10</span></span> </li>
                  </ul>
                  <div class="item-logo"><img src="/img/listing/logo6.png" alt="Logo"></div>
                </div>
                <div class="item-content">
                  <h3 class="item-title"><a href="#">Westfield Restaurant</a></h3>
                  <p class="item-text">Mountain Refuge Resort is the most ... </p>
                  <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i>59 Street, Mk tower, Brooklyn</li>
                    <li><i class="flaticon-phone-call"></i>+ 132 899 6330</li>
                    <li><i class="fas fa-globe"></i>www.restauant.com</li>
                  </ul>
                  <ul class="meta-item">
                    <li class="item-btn"><a href="#" class="btn-fill">Details</a></li>
                    <li class="ctg-name"><a href="#"><i class="flaticon-bed"></i>Hotel</a></li>
                    <li class="entry-meta">
                      <ul>
                        <li class="tooltip-item ctg-icon" data-tips="Hotel"><a href="#"><i class="flaticon-bed"></i></a>
                        </li>
                        <li class="tooltip-item" data-tips="My Favourite"><a href="#"><i class="fas fa-heart"></i></a>
                        </li>
                        <li class="tooltip-item" data-tips="Gallery"><a href="#"><i class="far fa-image"></i></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
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
  <!-- Imagesloaded Js -->
  <script src="/js/imagesloaded.pkgd.min.js"></script>
  <!-- Isotope js -->
  <script src="/js/isotope.pkgd.min.js"></script>
  <!-- Silk Cauosel JS -->
   <!-- Owl Carousel Js -->
   <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/slick.min.js"></script>
  <!-- Parallaxie JS -->
  <script src="/js/parallaxie.js"></script>
  <!-- Smoothscroll Js -->
  <script src="/js/smoothscroll.min.js"></script>
  <!-- Custom Js -->
  <script src="/js/main.js"></script>
</body>

</html>