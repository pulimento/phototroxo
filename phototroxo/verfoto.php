<?php
session_start();
$idU = $_SESSION["idUsuario"];
$idFoto = $_GET["idI"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Phototroxo - Ver una foto</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_verfoto.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
		
		<!-- INICIO DE JAVASCRIPT -->
		<!-- Validaci&#243;n del formulario -->
		<script type="text/javascript" language="JavaScript">
			function procesarComentario() {
				//Definici&#243;n de variables
				var ctrlEscribircomentario = document.getElementById("input_escribecomentario");
				var validado = true;
				var msgError = "";

				//Pone todos los labels en negro, &#250;til si el usuario se equivoca dos veces
				var labels = document.getElementsByTagName("label"), i;
				for( i = 0; i < labels.length; i++)
				labels[i].setAttribute("class", "default");

				if(ctrlEscribircomentario.value.length < 2) {
					msgError += "- El comentario debe tener al menos dos caracteres\n";
					document.getElementById("label_escribecomentario").setAttribute("class", "error");
					ctrlEscribircomentario.value = "";
					validado = false;
				}

				if(msgError != "") {
					alert("Los datos introducidos no son v\xE1lidos, por favor compruebe lo siguiente:\n\n" + msgError);
				}
				return validado;
			}
		</script>
		<!-- Fin de validaci&#243;n del formulario -->
		<!-- FIN DE JAVASCRIPT -->
	</head>
	<body>
		<!-- Cabecera(logo y men&#250;) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<?php
		//Conectando a la base de datos
		$link = mysql_connect("localhost", "root", "") or die ;
		mysql_select_db("phototroxo", $link);
		$result = mysql_query("SELECT i.ruta AS path, i.titulo, i.idI, u.Nombre AS nombreUploader,
		u.Apellidos AS apellidosUploader, u.idU FROM (imagen AS i NATURAL JOIN usuario AS u)
		WHERE idI = '$idFoto'", $link) or die ;
		$foto = mysql_fetch_array($result);
		$my_error = mysql_error($link);

		if (!empty($my_error)) {//Si hay error accediendo a la BD
			echo "Ha habido un error accediendo a la base de datos. Int&#233;ntelo m&#225;s tarde. $my_error";
		} else {
			//Inicializamos las variables
			//Los strip_tags son para que quite los tags en los Strings, en caso de que las haya, hacer esto
			//evita ciertos ataques
			$titulo = strip_tags($foto["titulo"]);
			$ruta = strip_tags($foto["path"]);
			$subido = strip_tags($foto["nombreUploader"]) . " " . strip_tags($foto["apellidosUploader"]);
			$subido_idU = strip_tags($foto["idU"]);
		}
		?>
		<div id="div_title">
			<div id="titulo_foto">
				<?php
				echo $titulo;
				?>
			</div>
			<div id="usuarioQueSubeLaFoto">
				<?php
				echo "Subida por <a href=\"album.php?idU=" . $subido_idU . "\">" . $subido . "</a>";
				?>
			</div>
		</div>
		<div id="div_photo">
			<img id="foto" <?php echo "src=\"" . $ruta . "\"></img>";?>
			</div>

			<div id="escribircomentario">
			<form   action="<?php echo $_SERVER['PHP_SELF'] . "?idI=" . $idFoto;?>" onsubmit="return procesarComentario()" method="post"  >
			<label id="label_escribecomentario" for="input_escribecomentario">Escribe tu comentario: </label>
			<input type="text" maxlength="160" id="input_escribecomentario" name="input_escribecomentario"></input>
			<!-- <input type="hidden" name="input_user" value="<?php echo $idU; ?>"> -->
			<div id="div_boton_comentar">
			<input id="boton_comentar" type="submit" value="Enviar comentario">
			</div>
			</form>
			</div>
			<?php
			//Insertar un comentario
			if (isset($_POST["input_escribecomentario"]))
				$commentposted_comment = $_POST["input_escribecomentario"];
			//$commentposted_user = $_POST("input_user");
			if (isset($commentposted_comment)) {
				$resultinsertarcomentario = mysql_query("INSERT INTO comentario (idI, idU, comentario, fechaC)
			VALUES ('$idFoto','$idU','" . $commentposted_comment . "','" . date("Y-m-d") . "')", $link) or die ;
			}
			?>

			<div id="comentarios">
			<?php
			$resultcomentario = mysql_query("SELECT c.comentario AS comment, u.Nombre AS name, c.fechaC, c.idU
			FROM (comentario AS c NATURAL JOIN usuario AS u) WHERE idI = '$idFoto'", $link) or die ;

			$my_error = mysql_error($link);

			function fechaespanola($fechainglesa) {
				list($a, $m, $d) = explode("-", $fechainglesa);
				return $d . "-" . $m . "-" . $a;
			};

			if (!empty($my_error)) {//Si hay error accediendo a la BD
				echo "Ha habido un error accediendo a la base de datos. Int&#233;ntelo m&#225;s tarde. $my_error";
			} else {
				$numcomentarios = mysql_num_rows($resultcomentario);
				if ($numcomentarios > 0) {
					echo "<ul>";
					for ($cont = 0; $cont < $numcomentarios; $cont++) {
						$comentario = mysql_fetch_array($resultcomentario);
						$comentario_user = $comentario["name"];
						$comentario_comentario = $comentario["comment"];
						$comentario_fecha = fechaespanola($comentario["fechaC"]);
						$comentario_idU = $comentario["idU"];
						echo "<li>El " . $comentario_fecha . ", <a href=\"album.php?idU=" . $comentario_idU . "\">" . $comentario_user . "</a> coment&#243;: " . $comentario_comentario . "</li><br/>";
						//echo "user -> " . $comentario_user . "<br/>";
						//echo "comentario ->" . $comentario_comentario . "<br/>";
					}
					echo "</ul>";
				} else {
					echo "No hay ning&#250;n comentario a&#250;n, &#161;s&#233; el primero en comentar!";
				}

			}
			?>
			</div>

			
			<!-- Se le permite al usuario que subi&#243; la foto -->
			<?php
				if ($subido_idU == $idU){
					echo '<div id="opcionesfoto">';
					echo '<a href="opcionesfoto.php?idI=' . $idFoto . '">Modificar el t&#237;tulo o borrar la foto</a>';
					echo '</div>';
				}
			?>	

			<!-- Pie de p&#225;gina -->
			<?php
			include ("piedepagina.php");
			?>
			</body>

			</html>
			
