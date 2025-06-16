<?php
ob_start();
session_start();
require_once('db_conexion.php');
?>

<!-- LOGIN -->
<?php
if (isset($_POST['login'])) {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $query = $cnnPDO->prepare('SELECT * FROM registra WHERE correo=:correo AND clave=:clave');
    $query->bindParam(':correo', $correo);
    $query->bindParam(':clave', $clave);
    $query->execute();

    $count = $query->rowCount();
    $campo = $query->fetch();

    if ($count) {
        $_SESSION['nombre'] = $campo['nombre'];
        $_SESSION['apellido'] = $campo['apellido'];
        $_SESSION['correo'] = $campo['correo'];
        $_SESSION['clave'] = $campo['clave'];
        $_SESSION['rfc'] = $campo['rfc'];
        $_SESSION['direccion'] = $campo['direccion'];
        $_SESSION['act'] = $campo['activo'];

        if ($_SESSION['act'] == 'no') {
            echo "<div class='alert alert-danger' role='alert'><b>ERROR: La cuenta ha sido desactivada</b></div>";
        } else {
            header("location:sesion.php");
            exit();
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'><b>ERROR: email o contraseña inválidos</b></div>";
    }
}
ob_end_flush();
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

  $(document).ready(function(){
      let formatoemail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
      let formatowhatsapp = /^\d{10}$/;

      $('#enviar').click(function(){
         
        if ($("#correo").val() == "" || !formatoemail.test($("#correo").val())) {
             toastr["warning"]("El Formato del Email es incorrecto, utilice un correo válido","Contactos");
             return false; 
          } else if ($("#clave").val() == "") {
             toastr["warning"]("Debes de Ingresar la clave","Contactos");
             return false;
          }
      toastr.options = { 
          timeOut: 2000  
      };
  });
 });

 window.onload = function() {
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

<div class="container" style="margin: 50px auto;background-color: bisque ;border: 1px solid #ccc; padding: 20px; width: 900px;box-shadow:5px 5px 5px 5px gray;">
    <form method="post">
      <img src="images/header.jpg" style="width:540px;height:250px; margin-left:200px;" alt="">
        <div class="mb-3">
          <label for="correo">Email address</label>
          <input id="correo" type="email" name="correo" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="clave">clave</label>
          <input id="clave" type="password" name="clave" class="form-control">
        </div>
        <button id="enviar" type="submit" class="btn btn-warning" name="login"> 
          iniciar sesión </button>
          <a href="index.html" class="nav-link">Volver al inicio</a>
      </form>
    </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
    <script src="codigos/plugins/toastr.js"></script>
</body>
</html>