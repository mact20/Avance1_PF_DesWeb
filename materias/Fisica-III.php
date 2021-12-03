<?php
    include('../php/ConsultaBD.php');

    session_start();

    $mat = $_SESSION['matricula'];

    $consulta = "SELECT * FROM profesores WHERE matricula = '$mat'";
    $resultado = consultaBD($consulta);

	if(ConsultaBD($consulta)){
        $row = mysqli_fetch_array($resultado);
    } else {
        echo "error";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Materia</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="shortcut icon" href="Images/logo.jpeg">
    </head>
    <body>
        <header>
            <h1 class="header" ><img src="Images/logo.jpeg" alt="" id="logo"></h1>
            <h1>FS2006 Fisica III</h1>
            <h1>Profesor: <?php echo $row['nombre']; ?> </h1>
            <nav class="topnav">
                <a class="drop_link" href="../Profesor.php">Home</a>
            </nav>
            <hr>
        </header>
        <main>
            
            <div class="bloque_materia">
                <h2>Lista Examenes</h2> 
                <ul >
                    <?php
                        $consulta = "SELECT * FROM examenes WHERE idMateria = 'FS2006' AND matProfesor = '$mat'"; 
                        $resultado = consultaBD($consulta);

                        $i = 1;
                        while($row2 = mysqli_fetch_array($resultado)){
                            echo "<li><a href='../examen.php'>Parcial ". $i."</a></li>";
                            $i++;
                        }
                    ?>
                    <li><a href="./examenEdit.html">Crear Parcial</a></li>
                </ul>
            </div>
            
            <?php //Desplegar los grupos
                $consulta = "SELECT * FROM grupos WHERE idMateria = 'FS2006'"; //Obtener grupos
                $resultado = consultaBD($consulta);

                while($row2 = mysqli_fetch_array($resultado)){
                    $grupo = $row2['idGrupo'];
                    echo "<h2>".$grupo."</h2>";
                    echo "<table class='styled-table'>";
                    echo "<tr>";
                    echo "<th>Matrícula</th>";
                    echo "<th>Alumno</th>";

                    $consulta2 = "SELECT * FROM examenes WHERE idMateria = 'FS2006'"; //Obtener examenes
                    $resultado2 = consultaBD($consulta2);
                    $i=1;

                    while($row3 = mysqli_fetch_array($resultado2)){
                        echo "<th>Parcial ".$i."</th>";      
                        $i++;                  
                    }
                    echo "</tr>";

                    $consulta3 = "SELECT * FROM inscritos WHERE idGrupo = '$grupo'"; //obtener las matrículas de los inscritos en el grupo
                    $resultado3 = consultaBD($consulta3);

                    while($row4 = mysqli_fetch_array($resultado3)){
                        $matAlu = $row4['matAlumno'];
                        $consulta4 = "SELECT * FROM alumnos WHERE matricula = '$matAlu'"; //Obtener los nombres con las matriculas
                        $resultado4 = consultaBD($consulta4);

                        $row5 = mysqli_fetch_array($resultado4);

                        echo "<tr>";
                        echo "<td>".$matAlu."</td>";
                        echo "<td>".$row5['nombre']."</td>";

                        $consulta2 = "SELECT * FROM examenes WHERE idMateria = 'FS2006'"; //Obtener examenes
                        $resultado2 = consultaBD($consulta2);

                        while($row3 = mysqli_fetch_array($resultado2)){
                            $aux = $row3['nombre'];
                            
                            $consulta5 = "SELECT calificacion FROM examenesalumnos WHERE nombreExamen = '$aux' AND matAlumno = '$matAlu'"; //Obtener examenes
                            $resultado5 = consultaBD($consulta5);
                            $aux2 = mysqli_fetch_array($resultado5);

                            echo "<td>".$aux2[0]."</td>";                 
                        }
                        echo "</tr>";
                    }

                    echo "</table>";
                }
            ?>
        </main>
        <footer class="footer">
            <hr>
            <p>Nombre Escuela</p>
        </footer>
    </body>
</html>
