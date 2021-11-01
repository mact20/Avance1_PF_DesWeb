<?php
    session_start();

    $mat = $_SESSION['matricula'];
    include('ConsultaBD.php');
    
    $consultaNombre = "SELECT nombre FROM alumnos WHERE matricula = '$mat'";
    $nombre = consultaBD($consultaNombre);
    if(consultaBD($consultaNombre)){
        $nombre = consultaBD($consultaNombre);
    }
    else{
        $nombre = 'error';
    }

    $consultaApellido = "SELECT apellido FROM alumnos WHERE matricula = '$mat'";
    if(consultaBD($consultaApellido)){
        $apellido = consultaBD($consultaApellido);
    }
    else{
        $apellido = 'error';
    }

    $consultaGrado = "SELECT clase FROM alumnos WHERE matricula = '$mat'";
    if(consultaBD($consultaGrado)){
        $grado = consultaBD($consultaGrado);
    }
    else{
        $grado = 'error';
    }
    
    /*
        $nombre = "Panchito";
        $apellido = "Jimenez";
        $grado = "5to";
    */

    //agregar correo y 

    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['grado'] = $grado;
    
    

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
            <h1 class="header" ><?php echo "{$nombre} {$apellido}"; ?><img src="Images/logo.jpeg" alt="" id="logo"></h1>
        </header>
        <main>
            <h2>Informacion </h2>
            <ul>
                <li>Nombre: <?php echo $nombre ?></li>
                <li>Matricula: <?php echo $apellido ?></li>
                <li>Grado:<?php echo $grado ?></li>
            </ul>
            <h2 style="text-align: center;">Examenes a realizar</h2>
            <section>
                <div class="bloque_materia">
                    <h3>Materia 1</h3>
                    <ul>
                        <li><a href="examen.html">Parcial 1</a></li>
                        <li><a href="examen.html">Parcial 2</a></li>
                        <li><a href="examen.html">Parcial 3</a></li>
                    </ul>
                    <p>Semestre Sep-Dic 2021</p>
                </div>
                <div class="bloque_materia">
                    <h3>Materia 2</h3>
                    <ul>
                        <li><a href="examen.html">Parcial 1</a></li>
                        <li><a href="examen.html">Parcial 2</a></li>
                        <li><a href="examen.html">Parcial 3</a></li>
                    </ul>
                    <p>Semestre Sep-Dic 2021</p>
                </div>
                <div class="bloque_materia">
                    <h3>Materia 3</h3>
                    <ul>
                        <li><a href="examen.html">Parcial 1</a></li>
                        <li><a href="examen.html">Parcial 2</a></li>
                        <li><a href="examen.html">Parcial 3</a></li>
                    </ul>
                    <p>Semestre Sep-Dic 2021</p>
                </div>
            </section>

            <h2>Resultados</h2>
                <div>
                    <h3>Materia 1</h3>
                    <table class="styled-table">
                        <tr>
                            <th>Examen</th>
                            <th>Resultado</th>
                        </tr>
                        <tr>
                            <td>Parcial 1</td>
                            <td>85/100</td> 
                        </tr>
                        <tr>
                            <td>Parcial 2</td>
                            <td>90/100</td> 
                        </tr>
                        <tr>
                            <td>Parcial 3</td>
                            <td>90/100</td> 
                        </tr>
                    </table>
                </div>

                <div>
                    <h3>Materia 2</h3>
                    <table class="styled-table">
                        <tr>
                            <th>Examen</th>
                            <th>Resultado</th>
                        </tr>
                        <tr>
                            <td>Parcial 1</td>
                            <td>85/100</td> 
                        </tr>
                        <tr>
                            <td>Parcial 2</td>
                            <td>90/100</td> 
                        </tr>
                        <tr>
                            <td>Parcial 3</td>
                            <td>90/100</td> 
                        </tr>
                    </table>
                </div>

                <div>
                    <h3>Materia 3</h3>
                    <table class="styled-table">
                        <tr>
                            <th>Examen</th>
                            <th>Resultado</th>
                        </tr>
                        <tr>
                            <td>Parcial 1</td>
                            <td>85/100</td> 
                        </tr>
                        <tr>
                            <td>Parcial 2</td>
                            <td>90/100</td> 
                        </tr>
                        <tr>
                            <td>Parcial 3</td>
                            <td>90/100</td> 
                        </tr>
                    </table>
                </div>
            
        </main>
        <footer class="footer">
            <hr>
            <p>Nombre Escuela</p>
        </footer>
    </body>
</html>
