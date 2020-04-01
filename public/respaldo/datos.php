<?php 
include 'conexion3.php';

$conexion=mysqli_connect($server,$usuariobd,$password,$base);
$continente=$_POST['continente'];

session_start();
                    
$iduser=$_SESSION['iduser'];
	$sql="SELECT * from materias where id_curso='$continente' and id_user='$iduser'";


	$result=mysqli_query($conexion,$sql);

	$cadena="<h5>Selecciona (Materias)</h5> 
			<select id='lista2' name='lista2' class='form-control'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[3]).'</option>';
	}

	echo  $cadena."</select>";
	
	

	$matricula=mysqli_query($conexion,"select * from matriculas") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($matricula))
{
//echo 'id Usuario:'.$reg['id_user'].' Curso: '.$reg['id_curso'].'periodo:'.$reg['ano_lectivo'].' <br>';
include 'conexion3.php';
$materia=mysqli_query($conexion,"select * from materias WHERE id_curso='$reg[id_curso]'") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg2=mysqli_fetch_array($materia))
{
//echo '<br>Id Materia:'.$reg2['id'];

// visualiza si la materia esta inscrita por el usuario...si esta inscrita no la inserta en la base de datos
include 'conexion3.php';
$notas=mysqli_query($conexion,"select * from notas WHERE id_user='$reg[id_user]' and id_materia='$reg2[id]'") or
  die("Problemas en el select:".mysqli_error($conexion));

if ($not=mysqli_fetch_array($notas))
{

//echo 'existe';

}
else
{
	$ano=date('Y');
	include 'conexion3.php';
			mysqli_query($conexion,"INSERT INTO `notas`(id_user, id_curso, id_materia, lapso, tipo, q1p1, q1p2, q1p3, q1exam, q2p1, q2p2, q2p3, q2exam) VALUES ('$reg[id_user]','$reg[id_curso]',$reg2[id],'$ano',0,0,0,0,0,0,0,0,0)") or
			  die("Problemas en el select".mysqli_error($conexion));
			mysqli_close($conexion);


			//echo 'no Existe';
}
//

}
}
?>	