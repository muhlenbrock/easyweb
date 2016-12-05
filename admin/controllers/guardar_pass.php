<?php
require_once ("../models/restore.php");
	extract($_POST);
    $pass_ = readPass();
    $pass_ = $pass_[0]['PASSWORD'];
    $email = readEmail();
    $email = $email[0]['DESCRIPCION'];
    $pass_actual_ = md5($pass_actual);
    if ($pass_actual_ == $pass_) {

        if ($pass_nueva == $pass_nueva2) {
            # code...
            
            if (strlen($pass_nueva)>=6) 
            {
                # code...
                $mail = 'Su usuario es: admin <br/>';

                $mail .= 'Su nueva Password es: '.$pass_nueva;
                //Titulo
                $titulo = "Restaurar Contraseña";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
                //direcciÃ³n del remitente 
                $headers .= "From: Contacto Periodismo ULS < contacto@periodismo.userena.cl >\r\n";
                //Enviamos el mensaje a tu_direcciÃ³n_email 
                $bool = mail("$email",$titulo,$mail,$headers);
                
                restore($pass_nueva);
                if($bool)
                {
                    echo json_encode("correcto");
                }
                else
                {
                    echo json_encode("Error, al enviar el correo");
                }
            }
            else
            {
                echo json_encode("Tamaño de la nueva password menos a 6 caracteres");
            }
        }
        else
        {
            echo json_encode("Contraseñas nuevas diferentes");
        }
        
        # code...
    }
    else
    {
        echo json_encode("No coincide el password actual");
    }
    /*
        
        $randompass = generateRandomString();

        $mail = 'Su usuario es: admin <br/>';

        $mail .= 'Su nueva Password es: '.$randompass;
        //Titulo
        $titulo = "Restaurar ContraseÃ±a";
        //cabecera
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
        //direcciÃ³n del remitente 
        $headers .= "From: Contacto Periodismo ULS < contacto@periodismo.userena.cl >\r\n";
        //Enviamos el mensaje a tu_direcciÃ³n_email 
        $bool = mail("$email",$titulo,$mail,$headers);
        
        restore($randompass);
        if($bool){
            echo "Su nueva contraseÃ±a ha sido enviada a su correo electrÃ³nico";
        }else{
            echo "Error, intentelo nuevamente mÃ¡s tarde";
        }*/
           
  
    
	
?>