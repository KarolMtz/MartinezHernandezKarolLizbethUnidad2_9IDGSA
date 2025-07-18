<?php

$paracorreo        ="kbethmtz@gmail.com";
$titulo            ="test correo";
$mensaje           ="hola mundo";
$tucorreo          ="From: karolpeachzen@gmail.com";

if (mail($paracorreo,$titulo,$mensaje,$tucorreo) )
{
    echo "correo enviado";
}else
{
    echo "Error";
}
?>
