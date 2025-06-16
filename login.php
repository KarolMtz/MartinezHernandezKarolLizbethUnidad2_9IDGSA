<?php
ob_start();
session_start();
require_once('db_conexion.php');

// LOGIN
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pssword = $_POST['pssword'];

    // Asegúrate de hashear la contraseña antes de compararla
    $query = $cnnPDO->prepare('SELECT * FROM register WHERE email=:email');
    $query->bindParam(':email', $email);
    $query->execute();
    $campo = $query->fetch();

    // Verificar si el usuario existe y la contraseña es correcta
    if ($campo && password_verify($pssword, $campo['pssword'])) {
        // Redirigir a la página de inicio con un mensaje de éxito
        header("Location: index.php?login_success=1");
        exit(); // Asegúrate de salir después de la redirección
    } else {
        echo "<script>alert('Correo o contraseña incorrectos.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
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

    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="contact-form-container"> <!-- Cambiado a contact-form-container -->
                    <div class="p-5">
                        <div class="mb-5">
                            <h3 class="h4 font-weight-bold text-theme">Login</h3>
                        </div>

                        <h6 class="h5 mb-0">Enter your email address and password to access admin panel.</h6>
                        <form method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="pssword" class="form-control" id="exampleInputPassword1" required>
                            </div>
                            <button type="submit" name="login" class="btn">Login</button> <!-- Cambiado a btn -->
                            <div>
                                <a href="recuperar.php" class="forgot-link float-right text-primary">Forgot password?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end card -->

                <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="register.php" class="text-primary ml-1">register</a></p>
            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>

    <?php
    // Mostrar mensaje de éxito si se redirige desde el inicio de sesión
    if (isset($_GET['login_success'])) {
        echo '<script>alert("Inicio de sesión exitoso.");</script>';
    }
    ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>
