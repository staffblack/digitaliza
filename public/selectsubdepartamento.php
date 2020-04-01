<?php 
$conexion=mysqli_connect('localhost','root','','digitaliza');
$continente=$_POST['continente'];

	$sql="SELECT id,
			 id_departamento,
			 nombre 
		from subdepartamento 
		where id_departamento='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena=" 
			<select id='sub_departamento' name='sub_departamento' class='form-control'><option value='0'>No Aplica</option>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>