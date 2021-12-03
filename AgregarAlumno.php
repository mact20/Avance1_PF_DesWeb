<!DOCTYPE html>
<html>
	<head>
		<meta content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
		<title>Alumno Agregado</title>
	</head>
	<body>
		<?php

            include('../Avance1_PF_DesWeb-main/php/ConsultaBD.php');
            
            $mat = $_POST['matricula'];
            $cont = $_POST['contraseña'];

			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$grupo = $_POST['grupo'];

			$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
		
			if (!preg_match($patron_texto, $_POST['nombre'])){
				echo "<br>";
				echo "El nombre solo puede contener letras: ".$nombre;
			} elseif (!preg_match($patron_texto, $_POST['apellido'])){
				echo "<br>";
				echo "El apellido solo puede contener letras: ".$apellido;
			} else {
				$consulta = "INSERT INTO alumnos(matricula, nombre, apellido, idGrupo) VALUES ('$mat','$nombre','$apellido','$grupo')";
				if(ConsultaBD($consulta)){
					$consulta = "INSERT INTO usuarios(matricula, contraseña) VALUES ('$mat','$cont')";
                    if(ConsultaBD($consulta)){
                        echo "<br>";
                        echo "Éxito al ingresar los datos :)";
                        echo "<br>";
                    } else {
                        echo "<br>";
                        echo "Error al guardar el usuario";
                        echo "<br>";
				}
				} else {
					echo "<br>";
					echo "Error al guardar los datos";
					echo "<br>";
				}
			}

			//Regresar al menu
			echo "<br><br>";
			echo "<button id='enviar' class='btn' onclick=window.location.href='../Avance1_PF_DesWeb-main/AdminMenu.html'>Menu</button>";

		?>
		
	</body>
</html>