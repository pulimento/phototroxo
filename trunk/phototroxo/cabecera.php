<div id="cabecera">
	<div id="sesion">
		<?php
		$idU = $_SESSION["idUsuario"];
		if (!empty($_SESSION["nombreUsuario"])) {
			echo "Bienvenid@ " . $_SESSION["nombreUsuario"] . "  ";
			echo "<a href=\"cerrarsesion.php\">Cerrar sesi&oacute;n</a>";
		} else {
			//Cuando se está dentro de la página y no están declaradas las variables de sesión
			//(no se ha iniciado sesión), ahora mismo muestra esto, pero debería mandar al index
			//para que se inicie la sesión. Esto está así de prueba
			echo "No se ha iniciado sesión!!!";
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
