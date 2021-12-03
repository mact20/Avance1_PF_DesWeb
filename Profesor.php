<?php
    include('../Avance1_PF_DesWeb-main/php/ConsultaBD.php');

    session_start();

    $mat = $_SESSION['matricula'];

    $consulta = "SELECT * FROM profesores WHERE matricula = '$mat'";
    $resultado = consultaBD($consulta);

	if(ConsultaBD($consulta)){
        $row = mysqli_fetch_array($resultado);
    } else {
        header("Location: ../Avance1_PF_DesWeb-main/inicio.html");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profesor</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="Images/logo.jpeg">
    </head>
    <body>
        <header>
            <img src="Images/logo.jpeg" alt="" id="logo">
            <h1>Profesor: <?php echo $row['nombre']; ?> </h1>
            <nav>
                <a class="drop_link" href="micuenta.php">Mi Cuenta</a>
            </nav>
            <hr>
        </header>

        <main>
            <section>
                <?php //Desplegar las materias y crear la página de la materia
                    $consulta = "SELECT * FROM materias WHERE matProfesor = '$mat'";
                    $resultado = consultaBD($consulta);

                    while($row2 = mysqli_fetch_array($resultado)){

                        $nombre = $row2['nombre'];

                        if ($nombre == trim($nombre) && strpos($nombre, ' ') !== false) {
                            $name = preg_replace("/[\s_]/", "-", $nombre);
                        }else{
                            $name = $nombre;
                        }

                        $filename = '../Avance1_PF_DesWeb-main/materias/'.$name.'.php'; 

                        if(!file_exists($filename)){
                            $tpl_path = "../Avance1_PF_DesWeb-main/materias/materia.php"; 
                            $tpl = file_get_contents($tpl_path); 

                            $data['idMat'] = $row2['idMateria'];
                            $data['materia']= $nombre;

                            $placeholders = array("{idMat}", "{materia}"); 

                            $new_file = str_replace($placeholders, $data, $tpl); 

                            $fp = fopen($filename, "w");
                            fwrite($fp, $new_file);
                            fclose($fp); 
                        }

                        echo "<div class='bloque_materia'>";
                        echo "<img src='images/image1.jpg'>";
                        echo "<a href=$filename>";
                        echo "(".$row2['idMateria'].") ".$nombre;
                        echo"</a>";
                        echo "<p>Semestre Sep-Dic 2021</p>";
                        echo "</div>";
                    }
                ?>
            </section>
        </main>

        <footer>
            <hr> 
            <p>Nombre Escuela</p>
        </footer>
    </body>
</html>