<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Enviar-buz&Oacute;n</title>
		<meta name="author" content="Margari" />
		<!-- Date: 2011-12-29 -->
	</head>
	<body>
		<?php

           $aviso = "";
    if ($_POST['email'] != "") {
        // email de destino
        $email = "margari.vela@gmail.com";
       
        // asunto del email
        $subject = "Sugerencias";
       
        // Cuerpo del mensaje
        $mensaje.= "Sugerencia:   ".$_POST['label_escribir']."\n";
        
       
        // headers del email
        $headers = "From: ".$_POST['email']."\r\n";
       
        // Enviamos el mensaje
        if (mail($email, $subject, $mensaje, $headers)) {
            $aviso = "Su mensaje fue enviado.";
        } else {
            $aviso = "Error de envío.";
        }
    }
  
 ?> 
	</body>
</html>
