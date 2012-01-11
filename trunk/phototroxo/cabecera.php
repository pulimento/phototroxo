<div id="cabecera">
	
	<div id="sesion">
		<?php
		$idU = $_SESSION["idUsuario"];
		if (!empty($_SESSION["nombreUsuario"])) {
			echo "Bienvenid@ " . $_SESSION["nombreUsuario"] . "  ";
			echo "<a href=\"cerrarsesion.php\">Cerrar sesi&#243;n</a>";
		} else {
			//Cuando se est&#225; dentro de la p&#225;gina y no est&#225;n declaradas las variables de sesi&#243;n
			//(no se ha iniciado sesi&#243;n), ahora mismo muestra esto, pero deber&#237;a mandar al index
			//para que se inicie la sesi&#243;n. Esto est&#225; as&#237; de prueba
			echo "No se ha iniciado sesi&#243;n!!!";
		}
		?>
	</div>
	<div id="div_header">
		<img id="img_header" src="images/header.png" alt="Phototroxo" />
	</div>
	<table id="table_mainmenu" summary="Main Menu">
		<tr id="mainmenu_row">
			<td class="celdamenu"><a href="head.php">Inicio</a></td>
			<td class="celdamenu"><a <?php echo 'href="album.php?idU='.$idU.'"'; ?>>Mis Fotos</a></td>
			<td class="celdamenu"><a href="buscar_fotos.php">Busca una foto</a></td>
			<td class="celdamenu"><a href="buscar_usuarios.php">Busca un usuario</a></td>
			<td class="celdamenu"><a href="subir_fotos.php">Sube una foto</a></td>
		</tr>
	</table>
</div>
