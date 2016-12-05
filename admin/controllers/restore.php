<?php
	require_once ("../models/restore.php");
	extract($_POST);
    if(isset($email)&& $email!=""){
        if(count(email($email))>0){
            $randompass = generateRandomString();

            $mail = 'Su usuario es: admin <br/>';

            $mail .= 'Su nueva Password es: '.$randompass;
            //Titulo
            $titulo = "Restaurar Contraseña";
            //cabecera
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
            //dirección del remitente 
            $headers .= "From: Contacto Periodismo ULS < contacto@periodismo.userena.cl >\r\n";
            //Enviamos el mensaje a tu_dirección_email 
            $bool = mail("$email",$titulo,$mail,$headers);
            
            restore($randompass);
            if($bool){
                echo "Su nueva contraseña ha sido enviada a su correo electrónico";
            }else{
                echo "Error, intentelo nuevamente más tarde";
            }
        }
        else{
            echo "Email incorrecto";
        }
    }
    else{
        header('Location: login.php');
    }
	
?>