<?php
    include('../Avance1_PF_DesWeb/php/ConsultaBD.php');

    session_start();

    $mat = $_SESSION['matricula'];

    $consulta = "SELECT * FROM profesores WHERE matricula = '$mat'";
    $resultado = consultaBD($consulta);

	if(ConsultaBD($consulta)){
        $row = mysqli_fetch_array($resultado);
    } else {
        header("Location: ../Avance1_PF_DesWeb/inicio.html");
    }

    $numPreguntas = $_POST['numPreguntas'];
    $tituloExamen = $_POST['tituloExamen'];

    for ($i = 1; $i <= $numPreguntas; $i++) {
        $tipoPreg = $_POST['tipoPreg'. strval($i)];
        $numPreg = 'numPreg' . strval($i);
        $numRes = 'respuesta' . strval($i);
        if ($tipoPreg == 'multiple'){
            $opcion1 = 'opcion1' . strval($i);
            $opcion2 = 'opcion2' . strval($i);
            $opcion3 = 'opcion3' . strval($i);
            if (isset($_POST[$numPreg], $_POST[$numRes], $_POST[$opcion1], $_POST[$opcion2], $_POST[$opcion3], $_POST['tituloExamen'])){
                $pregunta = $_POST[$numPreg]; 
                $respuesta = $_POST[$numRes];
                $op1 = $_POST[$opcion1];
                $op2 = $_POST[$opcion2];
                $op3 = $_POST[$opcion3];
                
                //Preparamos la orden SQL
                $consulta = "INSERT INTO PMult
                (TestMame,Pregunta,Respuesta,Op1,Op2,Op3) VALUES ('$tituloExamen','$pregunta','$respuesta','$op1','$op2', '$op3')";
                
                if (mysqli_query(ConsultaBD($consulta)) ){
                    echo "<p>Registro agregado.</p>";
                    } else {
                    echo "<p>No se agregó...</p>";
                }
                
                } else {
                    echo '<p>Por favor, complete todos los campos</p>';
                    return;
                }
        }
        if ($tipoPreg == 'abierta'){
            if (isset($_POST[$numPreg], $_POST[$numRes], $_POST['tituloExamen'])){
                $pregunta = $_POST[$numPreg]; 
                $respuesta = $_POST[$numRes];
                echo $pregunta;
                //Preparamos la orden SQL
                $consulta = "INSERT INTO pabierta
                (TestMame,Pregunta,Respuesta) VALUES ('$tituloExamen','$pregunta', '$respuesta')";
                
                if (mysqli_query(ConsultaBD($consulta)) ){
                    echo "<p>Registro agregado.</p>";
                    } else {
                    echo "<p>No se agregó...</p>";
                    echo $consulta;
                }
                
                } else {
                    echo '<p>Por favor, complete todos los campos</p>';
                    return;
                }
        } if ($tipoPreg == 'file'){
            if (isset($_POST[$numPreg], $_POST['tituloExamen'])){
                $pregunta = $_POST[$numPreg]; 
                //Preparamos la orden SQL
                $consulta = "INSERT INTO PFile
                (TestMame,Pregunta) VALUES ('$tituloExamen','$pregunta')";
                
                if (mysqli_query(ConsultaBD($consulta)) ){
                    echo $consulta;
                    echo "<p>Registro agregado.</p>";
                    } else {
                    echo "<p>No se agregó...</p>";
                }
                
                } else {
                    echo '<p>Por favor, complete todos los campos</p>';
                    return;
                }
        }
    }

?>