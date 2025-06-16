<?php
ob_start();
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
    header("location:index.html");
}

if (isset($_SESSION['nombre'])){
  $nombre = $_SESSION['nombre'];
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carrusel.css">

        <!--Slick CSS-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!--card-->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Raleway:300,400,500,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/cards.css">

    <title>Inicio</title>
  </head>
  <body>


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target py-4" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ml-auto text-right order-2">
              <div class="site-logo">
                <a href="index.html" class="font-weight-bold text-black"><h1>PuddinExpress</h1></a>
              </div>
            </div>

            <div class="col-9 order-1 text-left mr-auto">
              

              <span class="d-inline-block d-lg-block"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><?php echo ('Bienvenido, ' . $_SESSION['nombre']); ?></li>
                  <li><a href="micuenta.php" class="nav-link">Mi cuenta</a></li>
                  <li><a href="" class="nav-link">Ofertas</a></li>
                  <li><a class="dropdown-item" href="#">
                  <form method="post">
                  <button class="btn btn-danger"><a href="des.php">Desactivar cuenta</a></button>
                  </form>
                    </a></li>
                    <li><a class="dropdown-item" href="#">
                    <form method="post">
                    <button id="enviar" type="submit" class="btn btn-warning" name="logout"> Cerrar sesión </button>
                    </form>
                </a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="hero" style="background-image: url('images/purin.jpg');"></div>


    <!--carrusel-->
    
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
      </div>
      <div class="carousel-inner">
        <div align="center" class="carousel-item active">
          <img src="images/1.jpg" height="20%" width="30%">
         
        </div>

        <div align="center" class="carousel-item">
          <img src="images/5.jpg" height="20%" width="30%">
  
          <div class="container">
           
          </div>
        </div>

        <div align="center" class="carousel-item">
          <img src="images/6.jpg" height="20%" width="30%">
         
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!--cards-->

    <div class="wrapper-grey padded">
      <div class="container">
        <h2 class="text-center">Ofertas</h2>
        <div class="col-xs-12 col-sm-4">
            <div class="card" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('images/2.jpg');">
              <div class="card-description">
                <h2>Phone Case</h2>
                <p>Lovely Phone Case</p>
              </div>
              <a class="card-link" href="#" ></a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="card" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('images/4.jpg');">
              <div class="card-description">
                <h2>Stickers</h2>
                <p>Lovely Stickers</p>
              </div>
              <a class="card-link" href="#" ></a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="card" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('images/cc.jpg');">
              <div class="card-description">
                <h2>Kitchen</h2>
                <p>Lovely Kitchen items</p>
              </div>
              <a class="card-link" href="#" ></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="wrapper-grey padded">
      <div class="container">
        <div class="col-xs-12 col-sm-4">
            <div class="card" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('images/3.jpg');">
              <div class="card-description">
                <h2>Cookie Jar</h2>
                <p>Lovely Cookie Jar</p>
              </div>
            
              <a class="card-link" href="#" ></a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="card" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('images/c.jpg');">
              <div class="card-description">
                <h2>Plushie</h2>
                <p>Lovely Plushie</p>
              </div>
            
              <a class="card-link" href="#" ></a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="card" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('images/ccc.jpg');">
              <div class="card-description">
                <h2>Baking</h2>
                <p>Lovely Baking Items</p>
              </div>
              <a class="card-link" href="#" ></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
    <script src="js/carrusel.js"></script>
  </body>
</html>