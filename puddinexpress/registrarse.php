<?php
ob_start();
session_start();
require_once('db_conexion.php'); ?>

<?php
# Inicia Código de GUARDAR
if (isset($_POST['registrar'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $clave = $_POST['clave'];
  ;


  // asunto del email
  $asunto = "No Reply";
  // Para enviar un correo HTML, debe establecerse la cabecera Content-type
  $cabeceras = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $cabeceras .= 'From: ' . $_POST['correo'] . '\r\n';
  // Cuerpo del mensaje
  $mensaje = 'Bienvenido: ' . $_POST['nombre'] .
    ' <br> 
    apellido: ' . $_POST['apellido'] .
    ' <br> 
    correo: ' . $_POST['correo'] .
    ' <br>   
    clave: ' . $_POST['clave'] .
    ' <br> 
    
    ';
  // Utilizamos la funcion mail de php para enviar el correo

  mail($_POST['correo'], $asunto, $mensaje, $cabeceras);

  echo "<div class='alert alert-success' role='alert'>
                <b>Revisa tu bandeja de entrada<br> Te hemos enviado un email con tus datos de registro</b>
        </div>";

  if (!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($clave)) {
    $sql = $cnnPDO->prepare("INSERT INTO registra(nombre, apellido, correo, clave) VALUES (:nombre, :apellido, :correo, :clave)");
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $sql->bindParam(':nombre', $nombre);
    $sql->bindParam(':apellido', $apellido);
    $sql->bindParam(':correo', $correo);
    $sql->bindParam(':clave', $clave);

    $sql->execute();
    unset($sql);
    unset($cnnPDO);
  }
}
# Termina Código de REGISTRAR
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
  </script>

  <link href="codigos/plugins/toastr.min.css" rel="stylesheet">

  <script type="text/javascript">

    $(document).ready(function () {
      let formatoemail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
      let formatowhatsapp = /^\d{10}$/;

      $('#enviar').click(function () {

        if ($('#nombre').val() == "") {
          toastr.warning("Debes de Ingresar un Nombre", "Contactos");
          return false;
        } else if ($('#apellido').val() == "") {
          toastr.warning("Debes de Ingresar un apellido", "Contactos");
          return false;
        } else if ($("#correo").val() == "" || !formatoemail.test($("#correo").val())) {
          toastr["warning"]("El Formato del Email es incorrecto, utilice un correo válido", "Contactos");
          return false;
        } else if ($("#clave").val() == "") {
          toastr["warning"]("Debes de Ingresar la clave", "Contactos");
          return false;
        } else if ($("#confirmar").val() !== $("#clave").val() || "") {
          toastr["warning"]("Las Claves no Coinciden <br/>Por favor Confirmar tu Clave", "Contactos");
          return false;
        }
        toastr.options = {
          timeOut: 2000
        };
      });
    });

    window.onload = function () {
      // Verificar si se ha establecido una bandera en sessionStorage
      if (sessionStorage.getItem('recargado') === 'true') {
        toastr.options = {
          closeButton: true,
          timeOut: 2000,
        };
        toastr["success"]("Tus Datos Fueron Enviados", "Contactos");
        // Eliminar la bandera para que no se muestre nuevamente en esta sesión
        sessionStorage.removeItem('recargado');
      }
      // Establecer la bandera para futuras recargas en esta sesión
      sessionStorage.setItem('recargado', 'true');
    };
  </script>

</head>

<body>

  <div class="container"
    style="margin: 50px auto;background-color: bisque ;border: 1px solid #ccc; padding: 20px; width: 900px;box-shadow:5px 5px 5px 5px gray;">
    <form method="post">
      <img src="images/header.jpg" style="width:540px;height:250px; margin-left:200px;" alt="">
      <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" class="form-control">
      </div>
      <div class="mb-3">
        <label for="apellido">apellido</label>
        <input id="apellido" type="text" name="apellido" class="form-control">
      </div>
      <div class="mb-3">
        <label for="correo">Email address</label>
        <input id="correo" type="email" name="correo" class="form-control" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="clave">clave</label>
        <input id="clave" type="password" name="clave" class="form-control">
      </div>
      <div class="mb-3">
        <label for="clave">confirmar la clave</label>
        <input id="confirmar" type="password" name="clave" class="form-control">
      </div>
      <button id="enviar" type="submit" class="btn btn-primary" name="registrar"> Guardar </button>
      <br>
      <a href="index.html" class="nav-link">Volver al inicio</a>
    </form>
  </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
  </script>
  <script src="codigos/plugins/toastr.js"></script>
</body>

</html>