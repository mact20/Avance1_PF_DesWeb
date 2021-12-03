<!DOCTYPE html>
<html>
	<head>
		<meta content="width=device-width, initial-scale=1.0" charset="UTF-8">
		<title> </title>
	</head>
	<body>
		<br><br>
		<?php

            include('../Avance1_PF_DesWeb-main/php/ConsultaBD.php');

            $usuario = $_POST['username'];
			$pass = $_POST['password'];
            
            $consulta = "SELECT * FROM usuarios WHERE matricula = '$usuario'";
            $resultado = consultaBD($consulta);

			if(ConsultaBD($consulta)){
                $row = mysqli_fetch_array($resultado);

                if(empty($row)){
                    echo "No existe ese usuario";
                    echo "<br><br>";
			        echo "<button id='enviar' class='btn' onclick=window.location.href='../Avance1_PF_DesWeb-main/inicio.html'>Inicio</button>";
                } else{
                    if($pass == $row['contrasena']){
                        $rol = substr($usuario, 0, 1);

                        session_start();
                        $_SESSION["matricula"] = $usuario;
                                
                        if($rol == 'L'){
                            header("Location: ../Avance1_PF_DesWeb-main/Profesor.php");
                        }else if($rol == 'A'){
                            header("Location: ../Avance1_PF_DesWeb-main/alumno.php");
                        }else{
                            header("Location: ../Avance1_PF_DesWeb-main/AdminMenu.html");
                        }
                    } else {
                        echo "Contraseña incorrecta";
                        echo "<br><br>";
                        echo "<button id='enviar' class='btn' onclick=window.location.href='../Avance1_PF_DesWeb-main/inicio.html'>Inicio</button>";
                    }
                }
                
			} else {
                echo "error al hacer la consulta";
			}  
            		
		?>
	</body>
</html>