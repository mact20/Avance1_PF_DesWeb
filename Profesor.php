<?php
    include('../Avance1_PF_DesWeb-main/php/ConsultaBD.php');

    session_start();

    $mat = $_SESSION['matricula'];

    $consulta = "SELECT * FROM profesores WHERE Matricula = '$mat'";
    $resultado = consultaBD($consulta);

	if(ConsultaBD($consulta)){
        $row = mysqli_fetch_array($resultado);
    } else {
        echo "error";
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
            <h1>Profesor: <?php echo $row['Nombre']; ?> </h1>
            <nav>
                <a class="drop_link" href="micuenta.php">Mi Cuenta</a>
            </nav>
            <hr>
        </header>

        <main>
            <section>
                <div class="bloque_materia">
                    <img src="images/image1.jpg">
                    <a href="materia.html">Materia 1</a>
                    <p>Semestre Sep-Dic 2021</p>
                </div>

                <div class="bloque_materia">
                    <img src="images/image1.jpg">
                    <a href="materia.html">Materia 2</a>
                    <p>Semestre Sep-Dic 2021</p>
                </div>

                <div class="bloque_materia">
                    <img src="images/image1.jpg">
                    <a href="materia.html">Materia 3</a>
                    <p>Semestre Sep-Dic 2021</p>
                </div>
            </section>
        </main>

        <footer>
            <hr> 
            <p>Nombre Escuela</p>
        </footer>
    </body>
</html>