<<<<<<< HEAD
<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $asunto = isset($_POST['asunto']) ? $_POST['asunto'] : '';
    $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'karolpeachzen@gmail.com';
        $mail->Password = 'ypnh wcek buvl hurp';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('karolpeachzen@gmail.com', '1004 Cake Boutique');
        $mail->addAddress('karolpeachzen@gmail.com');
        $mail->addReplyTo($email, $nombre);

        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje desde la web - ' . htmlspecialchars($asunto);
        $mail->Body = "
        <html><body>
        <h1>Nuevo mensaje de cliente</h1>
        <p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>
        <p><strong>Correo:</strong> " . htmlspecialchars($email) . "</p>
        <p><strong>Asunto:</strong> " . htmlspecialchars($asunto) . "</p>
        <p><strong>Mensaje:</strong></p>
        <p>" . nl2br(htmlspecialchars($mensaje)) . "</p>
        </body></html>";

        $mail->send();
        echo json_encode(['status' => 'success', 'message' => 'Mensaje enviado correctamente.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error al enviar el correo', 'error' => $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
}
?>
=======
<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $asunto = isset($_POST['asunto']) ? $_POST['asunto'] : '';
    $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'karolpeachzen@gmail.com';
        $mail->Password = 'ypnh wcek buvl hurp';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('karolpeachzen@gmail.com', '1004 Cake Boutique');
        $mail->addAddress('karolpeachzen@gmail.com');
        $mail->addReplyTo($email, $nombre);

        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje desde la web - ' . htmlspecialchars($asunto);
        $mail->Body = "
        <html><body>
        <h1>Nuevo mensaje de cliente</h1>
        <p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>
        <p><strong>Correo:</strong> " . htmlspecialchars($email) . "</p>
        <p><strong>Asunto:</strong> " . htmlspecialchars($asunto) . "</p>
        <p><strong>Mensaje:</strong></p>
        <p>" . nl2br(htmlspecialchars($mensaje)) . "</p>
        </body></html>";

        $mail->send();
        echo json_encode(['status' => 'success', 'message' => 'Mensaje enviado correctamente.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error al enviar el correo', 'error' => $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
}
?>
>>>>>>> master
