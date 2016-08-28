<?php
  require ("PHPMailer_v2.1/class.phpmailer.php");
  function enviarCorreo($destinatario,$mensaje,$Subject,$mail){
   try{
     $mail->PluginDir = "PHPMailer_v2.1/";
     $mail->Mailer = "smtp";
     $mail->Host ="smtp.gmail.com";
     $mail->IsSMTP();
     $mail->SMTPAuth = true;
     $mail->SMTPSecure = "ssl";
     $mail->Host       = "smtp.gmail.com";
     $mail->Port       = 465;
     $mail->Username = "avisosintelcode@gmail.com";
     $mail->Password = "avisosintelcode123";
     $mail->From = "avisosintelcode@gmail.com";
     $mail->FromName = "Avisos de Intelcode";
     $mail->Timeout=60;
     $mail->AddAddress(strtolower($destinatario));
     $mail->Subject = "$Subject";
     $mail->Body = "<b>$mensaje</b>";
     $mail->AltBody = "$mensaje";
     $exito = $mail->Send();
     $intentos=1;
     while ((!$exito) && ($intentos < 2)) {
           //sleep(5);
           //echo $mail->ErrorInfo;
	   //echo $intentos;
           $exito = $mail->Send();
           $intentos=$intentos+1;

      }
   }catch(Exception $error){}
   }
?>
