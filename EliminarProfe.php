<!DOCTYPE html>
<html>
	<head>
		<meta content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
		<title>Profesor Eliminado</title>
	</head>
	<body>
		<?php

            include('../Avance1_PF_DesWeb-main/php/ConsultaBD.php');
            
            $dato = $_POST['dato'];
		
			if (empty($dato)){
                echo "<br>";
                echo "Falta llenar algunos datos";
            } else {
                $consulta = "DELETE FROM profesores WHERE matricula = '$dato'";
                if(consultaBD($consulta)){
                    $consulta = "DELETE FROM usuarios WHERE matricula = '$dato'";
                    if(consultaBD($consulta)){
                        echo "<br>";
                        echo "Se borró exitosamente";
                    } else {
                        echo "<br>";
                        echo "Error";
                    }
                } else {
                    echo "<br>";
                    echo "Error";
                }
            }

			//Regresar al menu
			echo "<br><br>";
			echo "<button id='enviar' class='btn' onclick=window.location.href='../Avance1_PF_DesWeb-main/AdminMenu.html'>Menu</button>";

		?>
		
	</body>
</html>