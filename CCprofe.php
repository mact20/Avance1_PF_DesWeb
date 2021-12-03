<!DOCTYPE html>
<html>
	<head>
		<meta content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
		<title>Datos Actualizados</title>
	</head>
	<body>
		<?php

            include('../Avance1_PF_DesWeb-main/php/ConsultaBD.php');

            session_start();

            $mat = $_SESSION['matricula'];
            
			$actu = $_POST['Actualpassword'];
            $new = $_POST['Newpassword'];

            $consulta = "SELECT * FROM usuarios WHERE matricula='$mat'";
            $resultado = consultaBD($consulta);

            if(ConsultaBD($consulta)){
                $row = mysqli_fetch_array($resultado);
                
                if($actu == $row['contrasena']){
                    $consulta = "UPDATE usuarios SET contrasena='$new' WHERE matricula='$mat'";
                    if(ConsultaBD($consulta)){
                        echo "<br>";
                        echo "Éxito al actualizar los datos :)";
                        echo "<br>";
                    } else {
                        echo "<br>";
                        echo "Error al guardar los datos";
                        echo "<br>";
                    }
                } else {
                    echo "<br>";
                    echo "Contraseña incorrecta";
                    echo "<br>";
                }
            } else {
                echo "error";
            }
			    
			//Regresar al menu
			echo "<br><br>";
			echo "<button id='enviar' class='btn' onclick=window.location.href='../Avance1_PF_DesWeb-main/micuenta.php'>Regresar</button>";

		?>
		
	</body>
</html>