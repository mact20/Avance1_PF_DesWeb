<?php
    include('../Avance1_PF_DesWeb-main/php/ConsultaBD.php');

    session_start();

    $mat = $_SESSION['matricula'];
        
    $consulta = "SELECT * FROM alumnos WHERE matricula = '$mat'";
    $result = consultaBD($consulta);

    if(consultaBD($consulta)){
        $row = mysqli_fetch_array($result);
    }
    else{
        header("Location: ../Avance1_PF_DesWeb-main/inicio.html");
    }
    
    $consulta2 = "SELECT alumnos.matricula, alumnos.nombre, grupos.idGrupo, materias.nombre, materias.idMateria
        FROM alumnos 
        JOIN inscritos on alumnos.matricula = inscritos.matAlumno
        JOIN grupos on inscritos.idGrupo = grupos.idGrupo
        JOIN materias on grupos.idMateria = materias.idMateria
        WHERE alumnos.matricula = '$mat'";
    $result2 = consultaBD($consulta2);

    $array = array();
    $index = 0;

    if(consultaBD($consulta2)){
       $row2 = mysqli_fetch_array($result2);
    }else{
        header("Location: ../Avance1_PF_DesWeb-main/inicio.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alumno</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="Images/logo.jpeg">
    </head>
    <body>
        <header>
            <h1 class="header" ><img src="Images/logo.jpeg" alt="" id="logo"></h1>
        </header>
        <main>
            <h2>Informacion </h2>
            <ul>
                <li>Nombre: <?php echo $row['nombre']; ?> <?php echo $row['apellido']?></li>
                <li>Matricula: <?php echo $row['matricula']; ?></li>
                <li>Semestre:<?php echo $row['semestre']; ?></li>
            </ul>
            

            <h2 style="text-align: center;">Examenes a realizar</h2>
            <section>
            <?php
                $consulta2 = "SELECT alumnos.matricula, alumnos.nombre, grupos.idGrupo, materias.nombre, materias.idMateria
                FROM alumnos 
                JOIN inscritos on alumnos.matricula = inscritos.matAlumno
                JOIN grupos on inscritos.idGrupo = grupos.idGrupo
                JOIN materias on grupos.idMateria = materias.idMateria
                WHERE alumnos.matricula = '$mat'";
    
                $result2 = consultaBD($consulta2);

                while($row2 = mysqli_fetch_array($result2))
                {
                        
                    $idMat = $row2['idMateria'];
                    $consulta3 = "SELECT materias.nombre, examenesalumnos.nombreExamen, examenesalumnos.calificacion 
                    FROM alumnos
                    JOIN examenesalumnos ON alumnos.matricula = examenesalumnos.matAlumno
                    JOIN examenes ON examenesalumnos.nombreExamen = examenes.nombre
                    JOIN materias ON examenes.idMateria = materias.idMateria
                    WHERE alumnos.matricula = '$mat' AND examenes.idMateria = '$idMat'";
    
                    $result3 = consultaBD($consulta3);

                    echo"<div class='bloque_materia'>";
                    echo"<h3>" . $row2['nombre'] . "</h3>
                    
                    <ul>"; 
                    $index = 1;
                    while($row3 = mysqli_fetch_array($result3)){
                        echo "<li><a href='examen.php'> Parcial ". $index . "</a></li>";
                        $index++;
                    }  
                    
                    echo "</ul>
                    <p>Grupo: " . $row2['idGrupo'] . "</p>
                    </div>";  
                }
            ?>
            </section>

            <h2>Resultados</h2>
            <?php      
                $consulta2 = "SELECT alumnos.matricula, alumnos.nombre, grupos.idGrupo, materias.nombre, materias.idMateria
                FROM alumnos 
                JOIN inscritos on alumnos.matricula = inscritos.matAlumno
                JOIN grupos on inscritos.idGrupo = grupos.idGrupo
                JOIN materias on grupos.idMateria = materias.idMateria
                WHERE alumnos.matricula = '$mat'";
                
                $result2 = consultaBD($consulta2);
                      
                while($row2 = mysqli_fetch_array($result2)){
                    echo "<h3>".$row2['idGrupo']." ".$row2['nombre']."</h3>";
                    echo "<table class='styled-table'>
                    <tr>
                        <th>Examen</th>
                        <th>Resultado</th>
                    </tr>";
                    $idMat = $row2['idMateria'];
                    $consulta3 = "SELECT materias.nombre, examenesalumnos.nombreExamen, examenesalumnos.calificacion 
                    FROM alumnos
                    JOIN examenesalumnos ON alumnos.matricula = examenesalumnos.matAlumno
                    JOIN examenes ON examenesalumnos.nombreExamen = examenes.nombre
                    JOIN materias ON examenes.idMateria = materias.idMateria
                    WHERE alumnos.matricula = '$mat' AND examenes.idMateria = '$idMat'";
    
                    $result3 = consultaBD($consulta3);  
                    while($row3 = mysqli_fetch_array($result3)){
                        echo"
                            <tr>
                                <td>" . $row3['nombreExamen'] . "</td>
                                <td>". $row3['calificacion'] ."</td> 
                            </tr>";
                        
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