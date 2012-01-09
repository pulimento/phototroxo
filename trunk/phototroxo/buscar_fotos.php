<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Phototroxo - Buscador de Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar_fotos.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
			<form action="buscar.php" method="post">
			Buscar foto: <input name="palabra">
			<input type="submit" name="buscador" value="Buscar">
			</form>
		</div>	
			
		<?
		
		
	if (isset($_POST['buscador']))
	{		
	// Tomamos el valor ingresado
	$buscar = $_POST['palabra'];

	// Si está vacío, lo informamos, sino realizamos la búsqueda
	if(empty($buscar))
	{
	echo "No se ha ingresado una cadena a buscar";
	}else{		
	// Conexión a la base de datos y seleccion de registros
	$link = mysql_connect("localhost", "root", "") or die ;
	mysql_select_db("phototroxo", $link);

	$sql = "SELECT * FROM imagen WHERE titulo like '%$buscar%' ORDER BY id DESC";
	mysql_select_db("base_de_datos", $link);

	$result = mysql_query($sql, $link);

	// Tomamos el total de los resultados
	

	// Imprimimos los resultados
	if ($row = mysql_fetch_array($result)){
	echo "Resultados para: <b>$buscar</b>";
	do {
	?>
	<p><b><a href= //no sé muy bien aqui como tengo que mostrar el resultado
	<?
	} while ($row = mysql_fetch_array($result));
	echo "<p>Resultados: $total</p>";
	} else {
	// En caso de no encontrar resultados
	echo "No se encontraron resultados para: <b>$buscar</b>";
	}
	}
	}
	?>
	</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>