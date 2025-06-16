
<?php 
ob_start();
session_start();
require_once('db_conexion.php'); ?>

<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header("location:index.html");
}

if (isset($_SESSION['nombre'])){
    $nombre = $_SESSION['nombre'];
}

?>

<?php

if (isset($_POST['desactiva'])) {

    $clave = $_POST['clave'];
    $act = 'no';

    $sql = $cnnPDO->prepare(
        'UPDATE registra SET activo =:act WHERE clave =:clave'
    );
    $sql->bindParam(':act', $act);
    $sql->bindParam(':clave', $clave);
    $sql->execute();
    header("location:isesion.php");
    exit();
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
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/nv.css">
</head>

<body>

<div class="hero" style="background-image: url('images/purin.jpg');">

<nav class="navbar navbar-expand-sm navbar-light" id="neubar">
      <div class="container">
    
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 active" aria-current="page" href="sesion.php">Inicio</a>
            </li>
            <li class="nav-item">
              <?php echo ('Bienvenido, ' . $_SESSION['nombre']); ?>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="#">Ofertas</a>
            </li>

            <li class="nav-item">
            <form method="post">
                    <button id="enviar" type="submit" class="btn btn-warning" name="logout"> 
                    Cerrar sesión </button>
                    </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  
    <section>
        <div class="bg-brown p-5 rounded-3 text-dark shadow mx-auto" style="width: 50%; margin-top: 5%;">
            <div class="container" style="width: 40%; margin-top: 5%; background-color: #fff; color: #43381d;">
            <?php
                    $sql = $cnnPDO->prepare("SELECT * FROM registra where clave =:clave");
                    $sql->bindParam(':clave', $_SESSION['clave']);
                    $sql->execute();
                    ?>
                <h1>Mi información</h1>

                <div class="row">

                <?php
                    require_once 'db_conexion.php';
                    $query = $cnnPDO->prepare('SELECT * FROM registra');
                    $query->execute();
                    $contador = 1;
                    while ($campo = $query->fetch()) {
                    ?>

                <div class="postcard__subtitle small">
                    <h5>Nombre</h5>
                        <p>
                            <?php echo $_SESSION['nombre'] ?>
                        </p>
                        <h5>Usuario</h5>
                        <p>
                            <?php echo $_SESSION['apellido'] ?>
                        </p>
                        <h5>Correo</h5>
                        <p>
                            <?php echo $_SESSION['correo'] ?>
                        </p>
                        <h5>Clave</h5>
                        <p>
                            <?php echo $_SESSION['clave'] ?>
                        </p>
                        <h5>RFC</h5>
                        <p>
                            <?php echo $_SESSION['rfc'] ?>
                        </p>
                        <h5>Dirección</h5>
                        <p>
                            <?php echo $_SESSION['direccion'] ?>
                        </p>

                        <p><?php echo $campo["activo"]; ?></p>
                        

                    <?php
                        $contador = $contador + 1;
                    }
                    ?>
                </div>

                <form method="POST">
                            <h6>ingresa tu clave para desactivar tu cuenta</h6>
                            <input type="text" name="clave" placeholder="Ingresa la clave">
                            <button type="submit" name="desactiva" class="btn btn-danger">desactivar</button>
                        </form>

                <ul class="postcard__tagbox">
              
                </ul>
                </div>
            </div>
        </div>
    </section>
    
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