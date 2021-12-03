<!DOCTYPE html>
<html>
	<head>
		<meta content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
		<title>Datos Actualizados</title>
	</head>
	<body>
		<?php

            include('../Avance1_PF_DesWeb/php/ConsultaBD.php');
            session_start();
            $mat = $_SESSION['matricula'];

			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$correo = $_POST['correo'];
			$telefono = $_POST['telefono'];

			$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
		
			if (!preg_match($patron_texto, $_POST['nombre'])){
				echo "<br>";
				echo "El nombre solo puede contener letras: ".$nombre;
			} elseif (!preg_match($patron_texto, $_POST['apellido'])){
				echo "<br>";
				echo "El apellido solo puede contener letras: ".$apellido;
			} elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
				echo "<br>";
				echo "El correo no es válido: ".$correo;
			} elseif (!is_numeric($_POST['telefono'])){
				echo "<br>";
				echo "El teléfono tiene que ser numérico: ".$telefono;
			} else {
				$consulta = "UPDATE profesores SET nombre='$nombre',apellido='$apellido',telefono='$telefono',correo='$correo' WHERE matricula='$mat'";
				if(ConsultaBD($consulta)){
					echo "<br>";
					echo "Éxito al actualizar los datos :)";
					echo "<br>";
				} else {
					echo "<br>";
					echo "Error al guardar los datos";
					echo "<br>";
				}
			}

			//Regresar al menu
			echo "<br><br>";
			echo "<button id='enviar' class='btn' onclick=window.location.href='../Avance1_PF_DesWeb/micuenta.php'>Menu</button>";

		?>
		
	</body>
</html>