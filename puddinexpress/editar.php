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
# Inicia Código de EDITAR

if (isset($_POST['edit'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $rfc = $_POST['rfc'];
        $direccion = $_POST['direccion'];
    
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['correo'] = $correo;
        $_SESSION['clave'] = $clave;
        $_SESSION['rfc'] = $rfc;
        $_SESSION['direccion'] = $direccion;

        $sql = $cnnPDO->prepare("UPDATE registra SET nombre = :nombre, apellido = :apellido, correo = :correo, clave = :clave, direccion = :direccion, rfc = :rfc, clave = :clave");
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':apellido', $apellido);
        $sql->bindParam(':correo', $correo);
        $sql->bindParam(':clave', $clave);
        $sql->bindParam(':rfc', $rfc);
        $sql->bindParam(':direccion', $direccion);

        $sql->execute();
        unset($sql);
        unset($cnnPDO);

        header("location: micuenta.php");
        exit();
    }


# Termina Código de EDITAR
?>

<?php

if (isset($_POST['desactivar'])) 
{     
    $email_session = $_SESSION['correo'];
    
    if (!empty($email_session))
    {  
        $sql = $cnnPDO->prepare('UPDATE registra  SET cuenta_activa = 0 WHERE correo = :correo'
    );

    $sql->bindParam(':correo', $email_session);

        if ($sql->execute()) {
            session_destroy();
            header("Location: index.html"); 
            exit();  
        } else {
        }
    }
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

            <li class="nav-item">
            <form method="post">
            <form method="post">
                  <button class="btn btn-danger" type="submit" name="desactivar">Desactivación</button>
                  </form>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>

    <section>
        <div class="bg-white p-5 rounded-3 text-secondary shadow mx-auto" style="width: 40%; margin-top: 5%;">
            <div class="row">
                <form method="post">
                    <div class="text-center fs-1 fw-bold">
                        <h3>Ingresa los cambios a tus datos de perfil</h3>
                    </div>

                    <div class="input-group mt-1" style="padding-top: 15px;">
                        <label class=" fw-normal" style="margin-right: 10px;">Tu nombre actual es: </label>
                        <input name="nombre" class="form-control bg-light" type="text" value="<?php echo $_SESSION['nombre']; ?>" />
                    </div>

                    <div class="input-group mt-1" style="padding-top: 15px;">
                        <label class=" fw-bold" style="margin-right: 10px;">Tu apellido: </label>
                        <input name="apellido" class="form-control bg-light" type="text" value="<?php echo $_SESSION['apellido']; ?>" />
                    </div>

                    <div class="input-group mt-1" style="padding-top: 15px;">
                        <label class=" fw-bold" style="margin-right: 10px;">Tu correo actual es: </label>
                        <input name="correo" class="form-control bg-light" type="text" value="<?php echo $_SESSION['correo']; ?>" />
                    </div>

                    <div class="input-group mt-1" style="padding-top: 15px;">
                        <label class=" fw-bold" style="margin-right: 10px;">Tu clave actual es: </label>
                        <input name="clave" class="form-control bg-light" type="text" value="<?php echo $_SESSION['clave']; ?>" />
                    </div>

                    <div class="input-group mt-1" style="padding-top: 15px;">
                        <label class=" fw-bold" style="margin-right: 10px;">Agrega tu RFC y tu direccion </label>
                    </div>

                    <div class="input-group mt-1" style="padding-top: 15px;">
                        <label class=" fw-bold" style="margin-right: 10px;">Tu RFC actual es: </label>
                        <input name="rfc" class="form-control bg-light" type="text" value="<?php echo $_SESSION['rfc']; ?>" />
                    </div>

                    <div class="input-group mt-1" style="padding-top: 15px;">
                        <label class=" fw-bold" style="margin-right: 10px;">Tu direccion actual es: </label>
                        <input name="direccion" class="form-control bg-light" type="text" value="<?php echo $_SESSION['direccion']; ?>" />
                    </div>

                    <button type="submit" name="edit" class="btn btn-warning text-white w-100 mt-4 fw-semibold">
                        Editar</button>
                </form>
            </div>


        </div>
    </section>

</body>

</html>




