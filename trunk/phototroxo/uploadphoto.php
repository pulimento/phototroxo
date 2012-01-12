<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Subir Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_uploadphoto.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
	</head>
	<body>
		<!-- Cabecera(logo y men&#250;) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<?php
			
			 
			//Validaci&#243;n del lado del servidor

			
			
			if ($_FILES["uploadedphoto"]["error"] > 0) {
				echo "No ha seleccionado ninguna foto <br /> ";/*. $_FILES["uploadedphoto"]["error"] . "*/
			
			
			} else {
				$filename = strtolower($_FILES['uploadedphoto']['name']);
				$whitelist = array('jpg', 'png', 'gif', 'jpeg');
				$blacklist = array('php', 'php3', 'php4', 'phtml', 'exe');
				$arraynombrefichero = explode('.', $filename);
				//Se hace as&#237; para que no de warnings, por estar en modo estricto
				$extensionfichero = end($arraynombrefichero);
				if (!in_array($extensionfichero, $whitelist)) {
					echo 'Tipo de archivo no v&#225;lido, s&#243;lo se aceptan fotos JPG, PNG y GIF. 
					<a href="subir_fotos.php">Volver</a>';
					exit(0);
				}
				if (in_array($extensionfichero, $blacklist)) {
					echo 'Tipo de archivo no v&#225;lido, s&#243;lo se aceptan fotos JPG, PNG y GIF. 
					<a href="subir_fotos.php">Volver</a>';
					exit(0);
				}

				$uploaddir = "user_images/";
				
				
				
				$link = mysql_connect("localhost", "root", "") or die ;
				mysql_select_db("phototroxo", $link);

				$idUsuario = $_SESSION["idUsuario"];
				$fechaSubida = date("Y-m-d");
				//Fecha actual
				$titulo = $_POST["title_uploadphoto"];
				$nombrearchivo = $titulo . "-" . $_FILES['uploadedphoto']['name'];
				//Quitar caracteres extra&ntilde;os al nombre del archivo
				include ("scripts/cleanfilenames.php");
				$nombrearchivo = cleanFileName($nombrearchivo);
				$nombretemporal = $_FILES["uploadedphoto"]["tmp_name"];
				$ruta = $uploaddir . $nombrearchivo;
				$rutathumbnail = $uploaddir . "thumb-" . $nombrearchivo;

				$result = mysql_query("INSERT INTO imagen (idU,fechaSubida,ruta,titulo,rutathumbnail)
				VALUES ('$idUsuario','$fechaSubida','$ruta','$titulo','$rutathumbnail')", $link);

				// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
				$my_error = mysql_error($link);

				if (!empty($my_error)) {//Si hay error accediendo a la BD
					echo "Ha habido un error accediendo a la base de datos. Int&#233;ntelo m&#225;s tarde. $my_error";
				} else {
					//Reducimos (si es necesario) la foto que se acaba de subir y creamos el thumbnail
					include ('scripts/resizeimages.php');
					//Subir la foto al servidor
					move_uploaded_file($nombretemporal, $ruta);
					$image = new SimpleImage();
					$image -> load($ruta);
					$image -> resizeToWidth(800);
					$image -> save($ruta);
					$image -> resizeToWidth(256);
					$image -> save($rutathumbnail);

					echo "<h3>La foto se ha subido correctamente ;)</h3>";
					echo "<a href=\"subir_fotos.php\">Subir otra foto</a>";
					echo "<br/><br/>T&#237;tulo : " . $titulo . "<br/><br/>";
					echo "<div id=\"div_fotoreciensubida\">
			<img id=\"img_fotoreciensubida\" src=\"" . $ruta . "\"/></div>";
				}
			}
			
			?>
		</div>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>