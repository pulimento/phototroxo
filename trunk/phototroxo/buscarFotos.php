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
		<meta name="author" content="Patricia_Raigada" />
	</head>
	<body>
		<!-- Cabecera(logo y menú) -->
		<?php
		include ("cabecera.php");
		?> <!-- Contenido -->
		<div id="div_content">
	

			<?php
             /*header ("Content-type: image/gif");*/
			 
			$idI = (isset ($_GET["idfoto"])) ? $_GET["idfoto"] : exit ();
			 $titulo = (isset($_GET["titulo"])) ? $_GET["titulo"]:exit ();
			 $sql = "SELECT $idI,titulo FROM imagen WHERE idI=$idI AND titulo=$titulo"; 

              
			$link = mysql_connect("localhost", "root", "") or die ;
			mysql_select_db("phototroxo", $link);
			
			
		
		 $result = mysql_query("SELECT titulo FROM imagen  WHERE idI=56");
         $result_array = mysql_fetch_array($result);
         header("Content-Type: image/jpg");
         echo $result_array[0];
			
			/*$result = mysql_query("SELECT titulo FROM imagen WHERE (titulo,idI) LIKE ('%titulo',%idI)", $link);*/

			// Ahora comprobaremos que todo ha ido correctamente (tratamiento de errores)
			$my_error = mysql_error($link);

			if (!empty($my_error)) {//Si hay error accediendo a la BD
 				echo "Ha habido un error accediendo a la base de datos. Inténtelo más tarde. $my_error";
				}
			?>
		</div>
		<!-- Pie de página -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>