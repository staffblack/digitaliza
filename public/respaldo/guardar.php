<?php
include 'conexion3.php';

$j= $_REQUEST['numero_preguntas']; 
                for ($i=1; $i<=5 ; $i++) { 
                   $pregunta='pregunta'.$i;
                   $pasar=$_REQUEST[$pregunta];
                    mysqli_query($conexion, "insert into detalle_evaluacion(n_pregunta,pregunta,id_evaluacion,id_docente) values 
                       ('$i','$pasar','$_REQUEST[id_evaluacion]','$_REQUEST[id_docente]')")
    or die("Problemas en el select" . mysqli_error($conexion));
//echo $i;
$evaluacion=$_REQUEST['id_evaluacion'];
            }
            //header ("Location: ../../evalua/public/evaluacion/1");   
?>
<meta http-equiv="Refresh" content="0;url= http://201.183.227.29/evalua/public/evaluacion/<?php echo $evaluacion;?>">