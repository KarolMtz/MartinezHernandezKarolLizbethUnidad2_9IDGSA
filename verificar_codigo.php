<<<<<<< HEAD
<?php
session_start();
require_once('db_conexion.php');

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    // Verificar el código en la base de datos
    $query = $cnnPDO->prepare('SELECT * FROM register WHERE recovery_code = :codigo');
    $query->bindParam(':codigo', $codigo);
    $query->execute();
    $campo = $query->fetch();

    if ($campo) {
        // Código válido, redirigir a la página para cambiar la contraseña
        header('Location: cambiar_pss.php?codigo=' . $codigo);
        exit();
    } else {
        echo "<script>alert('Código inválido. Intenta nuevamente.'); window.location= 'verificar_codigo.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Verificar Código</title>
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
        <h2 class="text-center">Verificar Código de Recuperación</h2>
        <form action="verificar_codigo.php" method="post">
            <div class="form-group">
                <label for="codigo">Código de Recuperación:</label>
                <input type="text" id="codigo" name="codigo" required class="form-control">
            </div>
            <div class="form-group">
                <input name="verificar" class="btn btn-lg btn-primary btn-block" value="Verificar Código" type="submit">
            </div>
        </form>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

=======
<?php
session_start();
require_once('db_conexion.php');

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    // Verificar el código en la base de datos
    $query = $cnnPDO->prepare('SELECT * FROM register WHERE recovery_code = :codigo');
    $query->bindParam(':codigo', $codigo);
    $query->execute();
    $campo = $query->fetch();

    if ($campo) {
        // Código válido, redirigir a la página para cambiar la contraseña
        header('Location: cambiar_pss.php?codigo=' . $codigo);
        exit();
    } else {
        echo "<script>alert('Código inválido. Intenta nuevamente.'); window.location= 'verificar_codigo.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Verificar Código</title>
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
        <h2 class="text-center">Verificar Código de Recuperación</h2>
        <form action="verificar_codigo.php" method="post">
            <div class="form-group">
                <label for="codigo">Código de Recuperación:</label>
                <input type="text" id="codigo" name="codigo" required class="form-control">
            </div>
            <div class="form-group">
                <input name="verificar" class="btn btn-lg btn-primary btn-block" value="Verificar Código" type="submit">
            </div>
        </form>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

>>>>>>> master
</html>