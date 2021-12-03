<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Examen</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/style.css"/>
        <link rel="shortcut icon" href="Images/logo.jpeg">
        <style>
            input[type=text],input[type=date],input[type=email],input[type=tel]{
            background-color:#cffdca;
            width: 25%;
            border: none;
            border-bottom:1px solid #76a571;
            }  
        </style>
        <script type="text/javascript" src="Js/examenJs.js"></script>
        <?php
            session_start(); 
            include('../Avance1_PF_DesWeb-main/php/ConsultaBD.php');
            //$NombreExamen= $_POST['Nombre'];
            $NombreExamen="Primer Parcial Desarrollo de Aplicaciones Web"
        ?>
    </head>
    <body>
        <header>
            <h1>Examen<img src="Images/logo.jpeg" alt="" id="logo"></h1>
            <?php
                echo "<h3>$NombreExamen</h3>"
            ?>
        </header>

        <nav>
        </nav>

        <main>
            <?php
            $consulta="SELECT TestName,Pregunta,Respuesta,Op1,Op2,Op3 FROM `pmult` WHERE TestName='$NombreExamen'";

            $resultado=ConsultaBD($consulta);
    
            if($resultado==FALSE){
                echo"Fallo en la conexion";
            }
            $n=1;
            while($row=mysqli_fetch_array($resultado)){
                $Nombre[$n]=$row['TestName'];
                $Pregunta[$n]=$row['Pregunta'];
                $Respuesta[$n]=$row['Respuesta'];
                $Op1[$n]=$row['Op1'];
                $Op2[$n]=$row['Op2'];
                $Op3[$n]=$row['Op3'];

                echo "<div id=\"content\">";
                echo "<h4>Pregunta $n</h4>";
                echo "<p style=\"text-align: left;\">$Pregunta[$n]</p>";
                echo "<input type=\"radio\" name=\"p$n\" value=\"correct\"/>$Respuesta[$n]<br>";
                echo "<input type=\"radio\" name=\"p$n\" value=\"wrong\"/>$Op1[$n]<br>";
                echo "<input type=\"radio\" name=\"p$n\" value=\"wrong\"/>$Op2[$n]<br>";
                echo "<input type=\"radio\" name=\"p$n\" value=\"wrong\"/>$Op3[$n]<br>";
                echo "<div id=\"res$n\"style=\"font-family: serif;\"></div>";
                echo "</div>";
            $n++;
            }

            $consulta="SELECT TestName,Pregunta,Respuesta FROM `pabierta` WHERE TestName='$NombreExamen'";

            $resultado=ConsultaBD($consulta);
    
            if($resultado==FALSE){
                echo"Fallo en la conexion";
            }

            while($row=mysqli_fetch_array($resultado)){
                $Nombre[$n]=$row['TestName'];
                $Pregunta[$n]=$row['Pregunta'];
                $Respuesta[$n]=$row['Respuesta'];

                echo "<div id=\"content\">";
                echo "<h4>Pregunta $n</h4>";
                echo "<p style=\"text-align: left;\">$Pregunta[$n]</p>";
                echo "<input type=\"text\" name=\"p$n\"/>";
                echo "<input type=\"hidden\" name=\"p$n\" value=\"$Respuesta[$n]\">";
                echo "<div id=\"res$n\"style=\"font-family: serif;\"></div>";
                echo "</div>";
            $n++;
            }

            $consulta="SELECT TestName,Pregunta FROM `pfile` WHERE TestName='$NombreExamen'";

            $resultado=ConsultaBD($consulta);
    
            if($resultado==FALSE){
                echo"Fallo en la conexion";
            }

            while($row=mysqli_fetch_array($resultado)){
                $Nombre[$n]=$row['TestName'];
                $Pregunta[$n]=$row['Pregunta'];

                echo "<div id=\"content\">";
                echo "<h4>Pregunta $n</h4>";
                echo "<p style=\"text-align: left;\">$Pregunta[$n]</p>";
                echo "<input type=\"file\" id=\"i$n\" accept=\"image/png, image/jpeg\">";
                echo "</div>";
            $n++;
            }
        ?>
        <br>
            <input type="button" id="revisar" value="Revisar"><br><br>
            <form action="resultados.html">
                <input type="submit" value="Resultados">
            </form>
        </main>

        <footer>
        </footer>
    </body>
</html>