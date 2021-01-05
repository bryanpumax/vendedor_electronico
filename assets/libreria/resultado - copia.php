<?php
    use PHPMailer \ PHPMailer \PHPMailer;
  use PHPMailer \ PHPMailer \ Exception; 
  use  PHPMailer \ PHPMailer \ SMTP ;  

   
  correo($correoquien2,$nombrequien,$asunto,$mensaje,$ruta);  
 
function correo($correoquien,$nombrequien,$asunto,$mensaje,$ruta){
  
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    $email_institucion="correo@gm.com";
$usuario="usuario";
$mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug =0/* SMTP::DEBUG_SERVER */;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $email_institucion;                     // SMTP username
        $mail->Password   = 'cotraseña';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    /*    $mail->SMTPSecure = "ssl";  
$mail->Host='smtp.gmail.com';  
$mail->Port='465';   
$mail->Username   = 'you@gmail.com'; // SMTP account username
$mail->Password   = 'your gmail password';  
$mail->SMTPKeepAlive = true;  
$mail->Mailer = "smtp"; 
$mail->IsSMTP(); // telling the class to use SMTP  
$mail->SMTPAuth   = true;                  // enable SMTP authentication  
$mail->CharSet = 'utf-8';  
$mail->SMTPDebug  = 0; */
        //Recipients
        $mail->setFrom($email_institucion, $usuario);
        $mail->addAddress($correoquien, $nombrequien);     // Add a recipient
   
       /*  no  sirve mucho
       $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com'); */
    
        // Attachments
      /*   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
     */
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;
        /* $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; */
    
        $mail->send();
        
        echo '<script>alert("El mensaje fue correctamente enviado");
        window.location="'.$ruta.'";
        </script>';
    } catch (Exception $e) {
        echo '<script>alert("El mensaje no fue correctamente enviado");
        window.location="'.$ruta.'";
        </script>';
    }
}
 
?>