<?php
 
if($_POST) {
    $name = "";
    $email = "";
    $consulta = "";
    $asunto = "";
    $mensaje = "";
     
    if(isset($_POST['name'])) {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    $recipient = "ufveats@gmail.com";
    $subject = "Contacto desde el sitio web";

    $message = "Detalles del formulario de contacto<br><br>";
    $message .= "Nombre: " . $_POST['name'] . "<br>";
    $message .= "E-mail: " . $_POST['email'] . "<br>";
    $message .= "Consulta: " . $_POST['consulta'] . "<br>";
    $message .= "Asunto: " . $_POST['asunto'] . "<br>";
    $message .= "Mensaje: " . $_POST['mensaje'] . "<br><br>";
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    if(mail($recipient, $subject, $message, $headers)) {
        echo "<p>Gracias por contactarnos, $name. Recibirás respuestas pronto.</p>";
    } else {
        echo '<p>Lo sentimos, la consulta no ha podido ser enviada.</p>';
    }
     
}
?>