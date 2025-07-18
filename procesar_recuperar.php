<<<<<<< HEAD
<?php
ob_start();
session_start();
require_once('db_conexion.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['recuperar'])) {
    $email = trim($_POST['email'] ?? '');

    // Input validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Correo electrónico inválido.'); window.location= 'recuperar.php';</script>";
        exit();
    }

    $query = $cnnPDO->prepare('SELECT * FROM register WHERE email=:email');
    $query->bindParam(':email', $email);
    $query->execute();
    $campo = $query->fetch();

    if ($campo) {
        // Generar un token de recuperación y fecha de expiración (1 hora)
        $codigoRecuperacion = bin2hex(random_bytes(16));
        $expiration = date('Y-m-d H:i:s', time() + 3600);

        // Guardar el token y la expiración en la base de datos
        $updateQuery = $cnnPDO->prepare('UPDATE register SET recovery_code=:codigo, recovery_expiration=:expiration WHERE email=:email');
        $updateQuery->bindParam(':codigo', $codigoRecuperacion);
        $updateQuery->bindParam(':expiration', $expiration);
        $updateQuery->bindParam(':email', $email);
        $updateQuery->execute();

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'karolpeachzen@gmail.com';
            $mail->Password = 'ypnhwcekbuvlhurp'; // Removed spaces in password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('karolpeachzen@gmail.com', 'Recuperación de Contraseña');
            $mail->addAddress($email);

            // Contenido del correo con enlace para restablecer contraseña
            $resetLink = "http://yourdomain.com/cambiar_pss.php?token=" . urlencode($codigoRecuperacion);
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = "Haz clic en el siguiente enlace para restablecer tu contraseña: <a href=\"$resetLink\">$resetLink</a>. Este enlace expirará en 1 hora.";
            $mail->AltBody = "Haz clic en el siguiente enlace para restablecer tu contraseña: $resetLink. Este enlace expirará en 1 hora.";

            $mail->send();

            // Redirigir a la página de recuperación con mensaje de éxito
            header('Location: recuperar.php?codigo_enviado=1');
            exit();
        } catch (Exception $e) {
            echo "<script>alert('El mensaje no pudo ser enviado. Por favor, inténtalo más tarde.'); window.location= 'recuperar.php';</script>";
        }
    } else {
        echo "<script>alert('Este correo no está registrado.'); window.location= 'recuperar.php';</script>";
    }
}
?>
=======
<?php
ob_start();
session_start();
require_once('db_conexion.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['recuperar'])) {
    $email = trim($_POST['email'] ?? '');

    // Input validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Correo electrónico inválido.'); window.location= 'recuperar.php';</script>";
        exit();
    }

    $query = $cnnPDO->prepare('SELECT * FROM register WHERE email=:email');
    $query->bindParam(':email', $email);
    $query->execute();
    $campo = $query->fetch();

    if ($campo) {
        // Generar un token de recuperación y fecha de expiración (1 hora)
        $codigoRecuperacion = bin2hex(random_bytes(16));
        $expiration = date('Y-m-d H:i:s', time() + 3600);

        // Guardar el token y la expiración en la base de datos
        $updateQuery = $cnnPDO->prepare('UPDATE register SET recovery_code=:codigo, recovery_expiration=:expiration WHERE email=:email');
        $updateQuery->bindParam(':codigo', $codigoRecuperacion);
        $updateQuery->bindParam(':expiration', $expiration);
        $updateQuery->bindParam(':email', $email);
        $updateQuery->execute();

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'karolpeachzen@gmail.com';
            $mail->Password = 'ypnhwcekbuvlhurp'; // Removed spaces in password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('karolpeachzen@gmail.com', 'Recuperación de Contraseña');
            $mail->addAddress($email);

            // Contenido del correo con enlace para restablecer contraseña
            $resetLink = "http://yourdomain.com/cambiar_pss.php?token=" . urlencode($codigoRecuperacion);
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = "Haz clic en el siguiente enlace para restablecer tu contraseña: <a href=\"$resetLink\">$resetLink</a>. Este enlace expirará en 1 hora.";
            $mail->AltBody = "Haz clic en el siguiente enlace para restablecer tu contraseña: $resetLink. Este enlace expirará en 1 hora.";

            $mail->send();

            // Redirigir a la página de recuperación con mensaje de éxito
            header('Location: recuperar.php?codigo_enviado=1');
            exit();
        } catch (Exception $e) {
            echo "<script>alert('El mensaje no pudo ser enviado. Por favor, inténtalo más tarde.'); window.location= 'recuperar.php';</script>";
        }
    } else {
        echo "<script>alert('Este correo no está registrado.'); window.location= 'recuperar.php';</script>";
    }
}
?>
>>>>>>> master
