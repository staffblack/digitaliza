<?php 
$conexion=mysqli_connect('localhost','root','','digitaliza');
$continente=$_POST['continente'];

	$sql="SELECT id,
			 id_empresa,
			 nombre_sucursal 
		from sucursal 
		where id_empresa='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena=" 
			<select id='sucursal' name='sucursal' class='form-control'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."<option value='0'>No Aplica</option></select>";
	

?>