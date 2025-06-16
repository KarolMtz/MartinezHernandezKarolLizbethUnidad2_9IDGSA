<?php
ob_start();
session_start();
require_once('db_conexion.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['recuperar'])) {
    $email = $_POST['email'];
    $query = $cnnPDO->prepare('SELECT * FROM register WHERE email=:email');
    $query->bindParam(':email', $email);
    $query->execute();
    $campo = $query->fetch();

    if ($campo) {
        // Generar un código de recuperación
        $codigoRecuperacion = bin2hex(random_bytes(16)); // Genera un código aleatorio

        // Guardar el código en la base de datos
        $updateQuery = $cnnPDO->prepare('UPDATE register SET recovery_code=:codigo WHERE email=:email');
        $updateQuery->bindParam(':codigo', $codigoRecuperacion);
        $updateQuery->bindParam(':email', $email);
        $updateQuery->execute();

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'karolpeachzen@gmail.com';
            $mail->Password = 'ypnh wcek buvl hurp';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('karolpeachzen@gmail.com', 'Recuperación de Contraseña');
            $mail->addAddress($email);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = 'Tu código de recuperación es: ' . $codigoRecuperacion;
            $mail->AltBody = 'Tu código de recuperación es: ' . $codigoRecuperacion;

            $mail->send();

            // Redirigir a la página de verificación con el código
            header('Location: verificar_codigo.php?codigo=' . $codigoRecuperacion);
            exit();
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Error de PHPMailer: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('Este correo no está registrado.'); window.location= 'recuperar.php';</script>";
    }
}
?>
