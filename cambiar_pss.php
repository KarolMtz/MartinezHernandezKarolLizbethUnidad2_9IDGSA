<?php
session_start();
require_once('db_conexion.php');

function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

$errors = [];

$token = $_GET['token'] ?? '';

if (empty($token)) {
    echo "<p>Código de recuperación no proporcionado.</p>";
    exit();
}

// Verificar que el token sea válido y no haya expirado
$query = $cnnPDO->prepare('SELECT * FROM register WHERE recovery_code=:token AND recovery_expiration > NOW()');
$query->bindParam(':token', $token);
$query->execute();
$user = $query->fetch();

if (!$user) {
    echo "<p>Token inválido o expirado.</p>";
    exit();
}

if (isset($_POST['nueva_contrasena'])) {
    // Validar CSRF token
    if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
        $errors[] = "Error de validación del formulario.";
    }

    $nuevaContrasena = $_POST['nueva_contrasena'] ?? '';

    // Validar nueva contraseña
    if (empty($nuevaContrasena) || strlen($nuevaContrasena) < 8) {
        $errors[] = "La nueva contraseña debe tener al menos 8 caracteres.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($nuevaContrasena, PASSWORD_DEFAULT);

        // Actualizar la contraseña y borrar el token
        $updateQuery = $cnnPDO->prepare('UPDATE register SET pssword=:nuevaContrasena, recovery_code=NULL, recovery_expiration=NULL WHERE recovery_code=:token');
        $updateQuery->bindParam(':nuevaContrasena', $hashedPassword);
        $updateQuery->bindParam(':token', $token);
        $updateQuery->execute();

        header('Location: login.php?cambio_exitoso=1');
        exit();
    }
}

$csrfToken = generateCSRFToken();
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