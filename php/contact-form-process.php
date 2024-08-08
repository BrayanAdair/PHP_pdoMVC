<?php
    /* Clase para tratar con excepciones y errores */
    require 'phpmailer/Exception.php';
    /* Clase PHPMailer */
    require 'phpmailer/PHPMailer.php';
    /*Clase SMTP necesaria para conectarte a un servidor SMTP */
    require 'phpmailer/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'df86f2b4f07180';
    $phpmailer->Password = '87df1fc5b391ec';
    
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $mensaje = $_POST["message"];

    $email_body = "El nombre es: " . $nombre. 
        "<br>El mail es: ". $email.
        "<br>El Asunto es: ". $subject.
        "<br>El Mensaje es: ". $mensaje;
    $phpmailer->isHTML(true);
    $phpmailer->Subject = 'Mail enviado desde el Formulario de Contacto';
    $phpmailer->Body = $email_body;

    $phpmailer->SetFrom("crisgonzalez26@gmail.com", "Cristian");
    $address = "crisgonzalez26@gmail.com";
    $phpmailer->AddAddress($address, "Emilio");
    if(!$phpmailer->Send()) {
        echo 'El mensaje no fué enviado.';
        echo 'Error: ' . $phpmailer->ErrorInfo;
    } else {
        echo 'El Mensaje ha sido enviado.';
    }
?>