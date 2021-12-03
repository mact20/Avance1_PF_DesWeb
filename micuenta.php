<?php
    include('../Avance1_PF_DesWeb/php/ConsultaBD.php');

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
                <a class="drop_link" href="Profesor.php">Home</a></li>
                <a class="drop_link" href="CCprofe.html">Cambiar contraseña</a>
                <a class="drop_link" href="CDprofe.html">Cambiar Datos</a>
            </nav>
            <hr>
        </header>

        <main>
            <p><?php echo $row['nombre']; ?> </p>
            <img class="foto_perfil" src="images/image2.jpg">
            <p>Correo: <?php echo $row['correo']; ?> </p>
            <p>Teléfono: <?php echo $row['telefono']; ?> </p>
        </main>

        <footer class="footer">
            <hr>
            <p>Nombre Escuela</p>
        </footer>
    </body>
</html>