<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Phototroxo - Subir Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_subir_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<h2 id="text_subirfotos">Subir Fotos</h2>
			<form enctype="multipart/form-data" action="uploadphoto.php" method="POST">
				<div id="titulo_foto">
					<label id="label_title_uploadphoto" for="title_uploadphoto">T&iacute;tulo:</label>
					<input name="title_uploadphoto" type="text" />
				</div>
				<div id="seleccionarfoto">
					<label id="label_uploadphoto" for="uploadedphoto">Selecciona una foto:</label>
					<input name="uploadedphoto" type="file" />
					<p>Se admiten im&aacute;genes en formato JPG, PNG y GIF</p>
				</div>
				<button id="button_subirfoto">
					Subir foto
				</button>
			</form>
		</div>
		<!--
		<?php
		//ESTA FUNCION LA USAREMOS PARA OBTENER EL TAMAÑO DE NUESTRO ARCHIVO
		function filesize_format($bytes, $format = '', $force = ''){
		$bytes=(float)$bytes;
		if ($bytes< 1024){
		$numero=number_format($bytes, 0, '.', ',');
		return array($numero,"B");
		}
		if ($bytes< 1048576){
		$numero=number_format($bytes/1024, 2, '.', ',');
		return array($numero,"KBs");
		}
		if ($bytes>= 1048576){
		$numero=number_format($bytes/1048576, 2, '.', ',');
		return array($numero,"MB");
		}
		}
		//VERIFICAMOS QUE SE SELECCIONO ALGUN ARCHIVO
		if(sizeof($_FILES)==0){
		echo "No se puede subir el archivo";
		exit();
		}
		// EN ESTA VARIABLE ALMACENAMOS EL NOMBRE TEMPORAL QU SE LE ASIGNO ESTE NOMBRE ES GENERADO POR EL SERVIDOR
		// ASI QUE SI NUESTRO ARCHIVO SE LLAMA foto.jpg el tmp_name no sera foto.jpg sino un nombre como SI12349712983.tmp por decir un ejemplo
		$archivo = $_FILES["archivo"]["tmp_name"];

		$today = date("Y-m-d");
		//PARA HACERNOS LA VIDA MAS FACIL EXTRAEMOS LOS DATOS DEL REQUEST
		extract($_REQUEST);
		//VERIFICAMOS DE NUEVO QUE SE SELECCIONO ALGUN ARCHIVO
		if ( $archivo != "none" ){
		//ABRIMOS EL ARCHIVO EN MODO SOLO LECTURA
		// VERIFICAMOS EL TAÑANO DEL ARCHIVO
		$fp = fopen($archivo, "rb");
		//LEEMOS EL CONTENIDO DEL ARCHIVO
		$contenido = fread($fp, $tamanio);
		//CON LA FUNCION addslashes AGREGAMOS UN \ A CADA COMILLA SIMPLE ' PORQUE DE OTRA MANERA
		//NOS MARCARIA ERROR A LA HORA DE REALIZAR EL INSERT EN NUESTRA TABLA
		$contenido = addslashes($contenido);
		//CERRAMOS EL ARCHIVO
		fclose($fp);
		// VERIFICAMOS EL TAÑANO DEL ARCHIVO
		if ($tamanio <1048576){
		//HACEMOS LA CONVERSION PARA PODER GUARDAR SI EL TAMAÑO ESTA EN b ó MB
		$tamanio=filesize_format($tamanio);
		}
		mysql_connect("localhost", "root", "") or die ("no se pudo conectar");
		mysql_select_db("phototroxo");
		//CREAMOS NUESTRO INSERT
		$qry = "INSERT INTO imagen( fechaSubida,ruta ) VALUES('$contenido','$today')";
		//EJECUTAMOS LA CONSULTA
		mysql_query($qry) or die("Query: $qry <br />Error: ".mysql_error());
		//CERRAMOS LA CONEXION
		mysql_close();
		//NOTIFICAMOS AL USUARIO QUE EL ARCHVO SE HA ENVIADO O REDIRIGIMOS A OTRO LADO ETC.
		echo "Archivo Agregado Correctamente<br />";
		echo 'Subir Otro Archivo<br /> ';
		}else{
		echo "No fue posible subir el archivo";
		echo 'Subir Otro Archivo<br /> ';
		}
		?>
		-->
		
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>
