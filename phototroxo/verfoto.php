<?php
session_start();
$idU = $_SESSION["idUsuario"];
$idFoto = $_GET["idI"];
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
		?> <!-- Contenido -->
		<?php

		//Conectando a la base de datos
		$link = mysql_connect("localhost", "root", "") or die ;
		mysql_select_db("phototroxo", $link);
		$result = mysql_query("SELECT i.ruta AS path, i.titulo, i.idI, u.Nombre AS nombreUploader,
		u.Apellidos AS apellidosUploader FROM (imagen AS i NATURAL JOIN usuario AS u)
		WHERE idU = '$idU' AND idI = '$idFoto'", $link) or die ;
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

			<div id="escribircomentario">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?idI=" . $idFoto;?>">
			<label id="label_escribecomentario" for="input_escribecomentario">Escribe tu comentario: </label>
			<input type="text" maxlength="160" id="input_escribecomentario" name="input_escribecomentario"></input>
			<!-- <input type="hidden" name="input_user" value="<?php echo $idU; ?>"> -->
			<input type="submit" value="submit" name="submit">
			</form>
			</div>
			<?php
			if(isset($_POST["input_escribecomentario"]))
			$commentposted_comment = $_POST["input_escribecomentario"];
			//$commentposted_user = $_POST("input_user");
			if (isset($commentposted_comment)) {
				$resultinsertarcomentario = mysql_query("INSERT INTO comentario (idI, idU, comentario)
			VALUES ('$idFoto','$idU','" . $commentposted_comment . "')", $link);
			}
			//Falta el tratamiento de errores
			?>

			<div id="comentarios">
			<?php
			$resultcomentario = mysql_query("SELECT c.comentario AS comment, u.Nombre AS name
			FROM (comentario AS c NATURAL JOIN usuario AS u) WHERE idI = '$idFoto'", $link) or die ;
			$my_error = mysql_error($link);

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			} else {
				for ($cont = 0; $cont < mysql_num_rows($resultcomentario); $cont++) {
					$comentario = mysql_fetch_array($resultcomentario);
					$comentario_user = $comentario["name"];
					$comentario_comentario = $comentario["comment"];
					echo "user -> " . $comentario_user . "<br/>";
					echo "comentario ->" . $comentario_comentario . "<br/>";
				}
			}
			?>
			</div>
			</body>
			</html>
