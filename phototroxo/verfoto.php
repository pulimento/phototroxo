<?php
session_start();
$idU = $_SESSION["idUsuario"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Ver Foto</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_verfoto.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?>

		<!-- Contenido -->
		<!-- <div id="div_content"> -->
		<?php
		$idFoto = $_GET["idI"];
		$link = mysql_connect("localhost", "root", "") or die ;
		mysql_select_db("phototroxo", $link);
		$result = mysql_query("SELECT i.ruta AS path, i.titulo, i.idI, u.Nombre AS nombreUploader, 
			u.Apellidos AS apellidosUploader FROM (imagen AS i NATURAL JOIN usuario AS u) 
			WHERE idU = '$idU' AND idI = '$idFoto'", $link);
		$foto = mysql_fetch_array($result);
		$my_error = mysql_error($link);

		if (!empty($my_error)) {//Si hay error accediendo a la BD
			echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
		} else {
			//Inicializamos las variables
			$titulo = $foto["titulo"];
			$ruta = $foto["path"];
			$subido = $foto["nombreUploader"] . " " . $foto["apellidosUploader"];
		}
		?>
		<div id="div_title">
			<div id="titulo_foto">
				<?php
				echo "Foto: " . $titulo;
				?>
			</div>
			<div id="usuarioQueSubeLaFoto">
				<?php
				echo "Subida por " . $subido;
				?>
			</div>
		</div>
		<div id="div_photo">
			<img id="foto" <?php echo "src=\"" . $ruta . "\"></img>";?>
			</div>
			<div id="comentarios">
			<!-- Hay que hacerlo -->
			Aqui van los comentarios
			</div>
			<!-- 				</div> -->
			</body>
			</html>
			5
