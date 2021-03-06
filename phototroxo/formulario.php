<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
	<head>
		<title>Phototroxo - Registro</title>
		<link rel="stylesheet" type="text/css" href="stylesheets/estilo_formulario.css" />
		<link rel="stylesheet" type="text/css" href="stylesheets/jquery-ui-1.7.2.pul.css" />
		<link href="images/favicon.ico" rel="shortcut icon" />
		<meta name="author" content="Javi Pulido" />
		<!-- INICIO DE JAVASCRIPT -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
				$.datepicker.regional['es'] = {
					closeText : 'Cerrar',
					prevText : '&#x3c;Ant',
					nextText : 'Sig&#x3e;',
					currentText : 'Hoy',
					monthNames : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
					dayNames : ['Domingo', 'Lunes', 'Martes', 'Mi&#233;rcoles', 'Jueves', 'Viernes', 'S&#225;bado'],
					dayNamesShort : ['Dom', 'Lun', 'Mar', 'Mi&#233;', 'Juv', 'Vie', 'S&#225;b'],
					dayNamesMin : ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S&#225;'],
					weekHeader : 'Sm',
					dateFormat : 'dd/mm/yy',
					firstDay : 1,
					isRTL : false,
					//buttonImage: 'images/calendar-icon.png',
					//buttonImageOnly: true,
					showOn : 'button',
					constrainInput : true,
					buttonText : 'Seleccionar fecha',
					showMonthAfterYear : false,
					yearSuffix : ''
				};
				$.datepicker.setDefaults($.datepicker.regional['es']);
			});

			$(document).ready(function() {
				$("#datepicker").datepicker({
					changeYear : true,
					changeMonth : true,
					minDate : new Date(1911, 1, 1),
					maxDate : new Date(2011, 12, 31),
					yearRange : '1912:2011'
				});
			});

		</script>
		<!-- Validaci&#243;n del formulario -->
		<script type="text/javascript" language="JavaScript">
			function procesarFormulario() {
				//Definici&#243;n de variables
				var ctrlUser = document.getElementById("user");
				var ctrlPassword = document.getElementById("password");
				var ctrlPassword2 = document.getElementById("password2");
				var ctrlSexoHombre = document.getElementById("sexo_hombre");
				var ctrlSexoMujer = document.getElementById("sexo_mujer");
				var ctrlDNI = document.getElementById("dni");
				var ctrlLetra = document.getElementById("letra");
				var ctrlNombre = document.getElementById("nombre");
				var ctrlApellidos = document.getElementById("apellidos");
				var ctrlEmail = document.getElementById("email");
				var ctrlFecha = document.getElementById("datepicker");
				var ctrlCalle = document.getElementById("nombre");
				var ctrlPoblacion = document.getElementById("poblacion");
				var ctrlProvincia = document.getElementById("provincia");
				var ctrlAcepto = document.getElementById("acepto");
				var patronEmail = /^(.+)@(.+)$/;
				var moduloDNI = (document.getElementById("dni").value) % 23;
				var letrasDNI = "TRWAGMYFPDXBNJZSQVHLCKET";
				var validado = true;
				var msgError = "";
				var patronFecha = /^\d{2}\/\d{2}\/\d{4}$/;

				//Pone todos los labels en negro, &#250;til si el usuario se equivoca dos veces
				var labels = document.getElementsByTagName("label"), i;
				for( i = 0; i < labels.length; i++)
				labels[i].setAttribute("class", "default");

				if(ctrlUser.value.length < 4) {
					msgError += "- El usuario debe tener al menos cuatro caracteres\n";
					document.getElementById("label_user").setAttribute("class", "error");
					ctrlUser.value = "";
					validado = false;
				}

				if(ctrlPassword.value.length < 6) {
					msgError += "- La contrase" + String.fromCharCode(241) + "a debe tener al menos seis caracteres\n";
					document.getElementById("label_password").setAttribute("class", "error");
					ctrlPassword.value = "";
					ctrlPassword2.value = "";
					validado = false;
				} else if(ctrlPassword.value != ctrlPassword2.value) {
					msgError += " Las contrase\xF1as no coinciden\n";
					document.getElementById("label_password2").setAttribute("class", "error");
					ctrlPassword.value = "";
					ctrlPassword2.value = "";
					validado = false;
				}

				if(ctrlSexoHombre.checked == false && ctrlSexoMujer.checked == false) {
					msgError += "- Debe de especificar el sexo\n";
					document.getElementById("label_hombre").setAttribute("class", "error");
					document.getElementById("label_mujer").setAttribute("class", "error");
					validado = false;
				}
				letrasDNI = letrasDNI.substring(moduloDNI, moduloDNI + 1);
				if(ctrlDNI.value.length != 8) {
					msgError += "- Faltan cifras en el DNI introducido\n";
					document.getElementById("label_dni").setAttribute("class", "error");
					validado = false;
				} else if(letrasDNI != ctrlLetra.value) {
					msgError += "- El DNI introducido no es v\xE1lido\n";
					document.getElementById("label_dni").setAttribute("class", "error");
					validado = false;
				}

				if(ctrlNombre.value == "") {
					msgError += "- El campo 'Nombre' no puede estar vac\xEDo \n";
					document.getElementById("label_nombre").setAttribute("class", "error");
					validado = false;
				}

				if(ctrlApellidos.value == "") {
					msgError += "- El campo 'Apellidos' no puede estar vac\xEDo\n";
					document.getElementById("label_apellidos").setAttribute("class", "error");
					validado = false;
				}

				if(patronEmail.test(ctrlEmail.value) == false) {
					msgError += "- El e-mail introducido no correcto\n";
					document.getElementById("label_email").setAttribute("class", "error");
					ctrlEmail.value = "";
					validado = false;
				}

				if(patronFecha.test(ctrlFecha.value) == false) {
					msgError += "- Formato de fecha no v\xE1lido (debe ser DD/MM/AAAA)\n";
					document.getElementById("label_datepicker").setAttribute("class", "error");
					validado = false;
				}

				if(ctrlCalle.value == "") {
					msgError += "- El campo 'Calle/Avda.' no puede estar vac\xEDo\n";
					document.getElementById("label_calle").setAttribute("class", "error");
					validado = false;
				}

				if(ctrlPoblacion.value == "") {
					msgError += "- El campo 'Poblaci\xF3n' no puede estar vac\xEDo\n";
					document.getElementById("label_poblacion").setAttribute("class", "error");
					validado = false;
				}

				if(ctrlAcepto.checked == false) {
					msgError += "- Debe aceptar las condiciones generales y la pol\xEDtica de privacidad\n";
					document.getElementById("label_acepto").setAttribute("class", "error");
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
		<!-- Header -->
		<div id="div_header">
			<img id="img_header" src="images/header.png" alt="Phototroxo" />
		</div>
		<div id="div_info">
			<p id="info_text" class="hint">
				* Todos los campos son obligatorios
			</p>
		</div>
		<div id="div_form">
			<form id="formulario" action="formulario2.php" method="post" onsubmit="return procesarFormulario()">
				<!-- datos de registro -->
				<div id="div_registro">
					<fieldset>
						<legend>
							Registro
						</legend>
						<!-- user -->
						<div id="div_user">
							<label id="label_user" for="user">Usuario:</label>
							<input id="user" name="user" type="text" onFocus="blur" />
							<label id="user_hint" class="hint">Cuatro caracteres como m&#237;nimo</label>
						</div>
						<!-- password -->
						<div id="div_password">
							<label id="label_password" for="password">Contrase&ntilde;a:</label>
							<input id="password" name="password" type="password" onFocus="blur" />
							<label id="password_hint" class="hint">Seis caracteres como m&#237;nimo</label>
						</div>
						<!-- repetir password -->
						<div id="div_password2">
							<label id="label_password2" for="password2">Repetir Contrase&ntilde;a:</label>
							<input id="password2" name="password2" type="password" onFocus="blur" />
						</div>
					</fieldset>
				</div>
				<!-- Datos personales -->
				<div id="div_datos_personales">
					<fieldset>
						<legend>
							Datos personales
						</legend>
						<!-- DNI -->
						<div id="div_dni">
							<label id="label_dni" for="dni">D.N.I.:</label>
							<input id="dni" name="dni" type="text" onFocus="blur" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
							-
							<input id="letra" name="letra" type="text" maxlength="1" onFocus="blur" onChange="javascript:this.value=this.value.toUpperCase();"/>
						</div>
						<!-- Elecci&#243;n del sexo -->
						<div id="div_sexo">
							<div id="div_titulo_sexo">
								Sexo:
							</div>
							<div id="div_sexo_hombre">
								<input id="sexo_hombre" name="sexo" type="radio" value="H"/>
								<label id="label_hombre" for="sexo_hombre">Hombre</label>
							</div>
							<div id="div_sexo_mujer">
								<input id="sexo_mujer" name="sexo" type="radio" value="M"/>
								<label id="label_mujer" for="sexo_mujer">Mujer</label>
							</div>
						</div>
						<!-- Nombre -->
						<div id="div_nombre">
							<label id="label_nombre" for="nombre">Nombre:</label>
							<input id="nombre" name="nombre" type="text" onFocus="blur" />
							<label id="nombre_hint" class="hint">Tu nombre de pila</label>
						</div>
						<!-- Apellidos -->
						<div id="div_apellidos">
							<label id="label_apellidos" for="apellidos">Apellidos:</label>
							<input id="apellidos" name="apellidos" type="text" onFocus="blur" />
						</div>
						<!--Email-->
						<div id="div_email">
							<label id="label_email" for="email">Email:</label>
							<input id="email" name="email" type="text" onFocus="blur" />
							<label id="email_hint" class="hint">Debe ser una direcci&#243;n v&#225;lida</label>
						</div>
						<!--Fecha nacimiento-->
						<div id="div_fechanacimiento">
							<label id="label_datepicker" for="datepicker">Fecha nac.:</label>
							<input type="text" name="datepicker" id="datepicker" size="12" onFocus="blur" />
							<label id="user_hint" class="hint">Comprobaci&#243;n de edad</label>
						</div>
					</fieldset>
				</div>
				<!-- Fin de los datos personales -->
				<!-- Direcci&#243;n (calle, n&#250;mero y provincia) -->
				<div id="div_direccion">
					<fieldset>
						<legend>
							Direcci&#243;n
						</legend>
						<div id="div_calle">
							<label id="label_calle" for="calle">Calle/Avda.:</label>
							<input id="calle" name="calle" type="text" onFocus="blur" />
						</div>
						<div id="div_poblacion">
							<label id="label_poblacion" for="poblacion">Poblaci&#243;n:</label>
							<input id="poblacion" name="poblacion" type="text" onFocus="blur" />
						</div>
						<div id="div_provincia">
							<label id="label_provincia" for="provincia">Provincia:</label>
							<select id="provincia" name="provincia" onFocus="blur">
								<optgroup label="Andaluc&#237;a">
									<option>Sevilla</option>
									<option>Almer&#237;a</option>
									<option>C&#225;diz</option>
									<option>C&#243;rdoba</option>
									<option>Granada</option>
									<option>Huelva</option>
									<option>Ja&#233;n</option>
									<option>M&#225;laga</option>
								</optgroup>
								<optgroup label="Extremadura">
									<option>Badajoz</option>
									<option>C&#225;ceres</option>
								</optgroup>
							</select>
						</div>
					</fieldset>
				</div>
				<div id="div_acepto">
					<input id="acepto" name="acepto" type="checkbox" onFocus="blur" />
					<label id="label_acepto" for="acepto">He le&#237;do y acepto las <a href="legalnote.html">condiciones generales y la pol&#237;tica de privacidad</a></label>
				</div>
				<div id="div_submit">
					<button id="submit">
						Enviar
					</button>
				</div>
			</form>
		</div>
		<br/>
		<!-- Pie de p&#225;gina -->
		<?php
		include ("piedepagina.php");
		?>
	</body>
</html>