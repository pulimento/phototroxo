<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Buscar Fotos</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_buscar.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Margari_Vela" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
	

			<?php
            $user = $_POST['palabra'];
			
			$link = mysql_connect("localhost", "root", "") or die ;
			mysql_select_db("phototroxo", $link);
			
			$my_error = mysql_error($link);
			
			if (!empty($my_error)) {//Si hay error accediendo a la BD
					echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
			}
			else {
				$consulta = mysql_query("SELECT nombre FROM usuario WHERE User='$user'", $link);
				if(mysql_num_rows($consulta)>0){
					for ($i=0; $i < mysql_num_rows($consulta); $i++) { 
						$array = mysql_fetch_array($consulta);
						$nombreUsuario = $array["nombre"];
						
						echo "Nombre: ".$nombreUsuario;
					}
				}else{
					echo"No hay ninguno";
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