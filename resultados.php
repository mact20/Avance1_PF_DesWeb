<?php
    include('../Avance1_PF_DesWeb/php/ConsultaBD.php');

    session_start();

    $mat = $_SESSION['matricula'];
    $rol = substr($mat, 0, 1);

    if($rol == 'L'){
        $filename = " ../Avance1_PF_DesWeb/Profesor.php";
    }else{
        $filename = " ../Avance1_PF_DesWeb/alumno.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Resultados</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/style.css"/>
        <link rel="shortcut icon" href="Images/logo.jpeg">
        <script type="text/javascript" src="Js/resultadosJs.js"></script>
    </head>
    <body>
        <header>
            <img src="Images/logo.jpeg" alt="" id="logo">
            <h1>Resultados</h1>
        </header>

        <nav>
        </nav>

        <main>
            <div id="result">
                <h4>Resultado</h4>
                <p id="noP">Número de Preguntas: </p>
                <p id="noC">Preguntas Correctas: </p>
                <p id="grade">Calificación:</p>
                <i>Algunas preguntas todavia no estan calificadas</i>
            </div>
            <br><br><br>

            <?php
            echo "<form action='$filename'>
                <input type='submit' value='Regresar'>
            </form>";
            ?>
        </main>

        <footer>
        </footer>
    </body>
</html>