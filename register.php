<?php
ob_start();
session_start();
require_once('db_conexion.php'); ?>

<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $secondname = $_POST['secondname'];
    $email = $_POST['email'];
    $pssword = $_POST['pssword'];
    $captcha = $_POST['g-recaptcha-response'];

    // Verificar que el CAPTCHA no esté vacío
    if (!empty($captcha)) {
        // Verificar el CAPTCHA con la clave secreta
        $secretKey = "6LfCS1wrAAAAAGnmBYIOHMlqJCg8hvKuKdmh7ELp";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");
        $responseKeys = json_decode($response, true);

        // Si la verificación es exitosa
        if ($responseKeys["success"] && $responseKeys["score"] >= 0.5) {
            // Aquí va el código para insertar en la base de datos
            if (!empty($name) && !empty($secondname) && !empty($email) && !empty($pssword)) {
                $sql = $cnnPDO->prepare("INSERT INTO register(name, secondname, email, pssword) VALUES (:name, :secondname, :email, :pssword)");

                $sql->bindParam(':name', $name);
                $sql->bindParam(':secondname', $secondname);
                $sql->bindParam(':email', $email);
                $sql->bindParam(':pssword', $pssword);

                $sql->execute();

                // Redirigir a la página de inicio
                header("Location: login.php");
                exit();
            }
        } else {
            echo "Eres un bot o algo salió mal. Por favor, inténtalo de nuevo.";
        }
    } else {
        echo "Por favor completa el CAPTCHA.";
    }
}


# Termina Código de REGISTRAR
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=FONT_NAME:weights&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/contact.css" />
    <title>Registro</title>
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

    <div class="container-fluid py-5 mx-auto">
        <div class="contact-form-container">

            <h4>Crear Cuenta</h4>
            <form method="post">
                <div class="row">
                    <div class="col-12">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name"
                            required>
                    </div>
                    <div class="col-12">
                        <label for="secondname">Second Name</label>
                        <input class="form-control" type="text" name="secondname" id="secondname"
                            placeholder="Enter your second name" required>
                    </div>
                    <div class="col-12">
                        <label for="email">Email Address</label>
                        <input class="form-control" type="email" name="email" id="email"
                            placeholder="Enter a valid email address" required>
                    </div>
                    <div class="col-12">
                        <label for="pssword">Password</label>
                        <input class="form-control" type="password" name="pssword" id="pssword"
                            placeholder="Enter password" required>
                    </div>
                    <input type="hidden" id="recaptchaResponse" name="g-recaptcha-response">
                    <div class="col-12">
                        <button type="submit" name="register" class="btn">Crear Cuenta</button>
                    </div>
                </div>
            </form>
            <div class="row mb-4">
                <small class="font-weight-bold">Already have an account? <a href="login.php"
                        class="text-danger">Login</a></small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfCS1wrAAAAAJaxXTXlURBrTgH_x8ifhqqSxwID"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LfCS1wrAAAAAJaxXTXlURBrTgH_x8ifhqqSxwID', { action: 'register' }).then(function (token) {
                document.getElementById('recaptchaResponse').value = token;
            });
        });
    </script>
</body>

</html>