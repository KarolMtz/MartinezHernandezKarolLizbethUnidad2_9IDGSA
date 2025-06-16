<?php
session_start();
require_once('db_conexion.php');

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
} else {
    echo "No se proporcionó un código de recuperación.";
    exit();
}

if (isset($_POST['nueva_contrasena'])) {
    $nuevaContrasena = password_hash($_POST['nueva_contrasena'], PASSWORD_DEFAULT); // Asegúrate de hashear la contraseña

    // Actualizar la contraseña en la base de datos
    $updateQuery = $cnnPDO->prepare('UPDATE register SET pssword=:nuevaContrasena, recovery_code=NULL WHERE recovery_code=:codigo');
    $updateQuery->bindParam(':nuevaContrasena', $nuevaContrasena);
    $updateQuery->bindParam(':codigo', $codigo);
    $updateQuery->execute();

    // Redirigir a la página de inicio de sesión
    header('Location: login.php?cambio_exitoso=1');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cambiar Contraseña</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=FONT_NAME:weights&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/contact.css" />
</head>

<body>

    <header>
        <div class="nav-container container" role="navigation" aria-label="Main navigation">
            <button aria-label="Abrir menú" aria-expanded="false" aria-controls="mobile-menu"
                class="hamburger-btn material-icons" id="hamburger-btn">
                menu
            </button>
            <div class="logo" aria-label="1004 Cake Boutique">
                1004<span>Cake Boutique</span>
            </div>
            <nav class="desktop-nav" aria-label="Navegación principal">
                <a href="instore.php" tabindex="0">In Store</a>
                <a href="register.php" tabindex="0">Register</a>
                <a href="login.php" tabindex="0">Login</a>
                <a href="contact.php" tabindex="0">Contact</a>
            </nav>
            <button class="pedido.php" tabindex="0"><a href="pedido.php">Order</a></button>
        </div>

        <nav id="mobile-menu" class="mobile-nav" aria-label="Menú móvil">
            <a href="instore.php" tabindex="-1">In Store</a>
            <a href="register.php" tabindex="-1">Register</a>
            <a href="login.php" tabindex="-1">Login</a>
            <a href="contact.php" tabindex="-1">Contact</a>
        </nav>
    </header>

    <div class="container">
        <h2 class="text-center">Cambiar Contraseña</h2>
        <form action="cambiar_pss.php?codigo=<?php echo $codigo; ?>" method="post">
            <div class="form-group">
                <label for="nueva_contrasena">Nueva Contraseña:</label>
                <input type="password" id="nueva_contrasena" name="nueva_contrasena" required class="form-control">
            </div>
            <div class="form-group">
                <input name="cambiar" class="btn btn-lg btn-primary btn-block" value="Cambiar Contraseña" type="submit">
            </div>
        </form>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>