<?php
    use PHPMailer \ PHPMailer \PHPMailer;
  use PHPMailer \ PHPMailer \ Exception; 
  use  PHPMailer \ PHPMailer \ SMTP ;  

   if(isset($_POST['enviar'])){
       if($_POST['ruta']=="docente"){
    $correoquien=$_POST['correoquien'];
    $nombrequien=$_POST['nombrequien'];
    $asunto=$_POST['asunto'];
    $mensaje=$_POST['mensaje'];
$ruta='../'.$_POST['ruta'].'/index.php';

  correo($correoquien,$nombrequien,$asunto,$mensaje);  
  } 
  } 
function correo($correoquien,$nombrequien,$asunto,$mensaje){
  
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    $email_institucion="academia1gabriela2mistral@gmail.com";
$usuario="Academia Gabriela Mistral";
$mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug =0/* SMTP::DEBUG_SERVER */;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $email_institucion;                     // SMTP username
        $mail->Password   = 'rb17208364000';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
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
        
        </script>';
    } catch (Exception $e) {
        
    }
}
?>