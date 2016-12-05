<?php

include('../admin/controllers/contacto.php');

// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['asunto'])     ||
   empty($_POST['email'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Email incorrecto!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$asunto = strip_tags(htmlspecialchars($_POST['asunto']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto desde Sitio Web:  ".$name." | ".$asunto;
$email_body = "Haz recibido un nuevo mensaje desde el formulario de contacto de tu sitio web. Aqui los detalles:\nNombre: ".$name."\n\nEmail: ".$email_address."\nAsunto: ".$asunto."\nMensaje:\n".$message;
$headers = "From: contacto@periodismo.userena.cl\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
