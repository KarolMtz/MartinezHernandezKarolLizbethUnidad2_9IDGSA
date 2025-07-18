<?php
session_start();
require_once('db_conexion.php');

if (isset($_POST['codigo']) && isset($_POST['nueva_contrasena'])) {
    $codigo = $_POST['codigo'];
    $nuevaContrasena = password_hash($_POST['nueva_contrasena'], PASSWORD_DEFAULT); // Asegúrate de hashear la contraseña

    // Actualizar la contraseña en la base de datos
    $updateQuery = $cnnPDO->prepare('UPDATE register SET pssword=:nuevaContrasena, recovery_code=NULL WHERE recovery_code=:codigo');
    $updateQuery->bindParam(':nuevaContrasena', $nuevaContrasena);
    $updateQuery->bindParam(':codigo', $codigo);
    $updateQuery->execute();

    echo 'Contraseña cambiada exitosamente.';
} else {
    echo 'Error al cambiar la contraseña.';
}
?>
