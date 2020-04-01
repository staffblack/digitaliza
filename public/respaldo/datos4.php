<div class="panel-body table-responsive">
<?php 

include 'conexion3.php';



$conexion=mysqli_connect($server,$usuariobd,$password,$base);
$continente=$_POST['materia'];
session_start();
                    
$iduser=$_SESSION['iduser'];

?>
<?php //echo $_SESSION['materia'];?></h1>
<a href="pdf/notasgeneraladmin.php?iduser=<?php echo $iduser;?>"><i class="fa fa-file-pdf-o" style="font-size:30px;color:red"></i></a>
<table class="table table-bordered table-striped" border="1">		
		<thead>
		<tr>

			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>1er Quintimestre</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>2do Quintimestre</td>
			<td>
			</td>
			<td>
			</td>
			<td></td>
		</tr>
	</thead>
</table>

		<?php
		$constante=2.666666667;
		if($_SESSION['materia']==null)
			{
			$registros=mysqli_query($conexion,"select ma.materia AS materia, no.id AS idnota ,no.id_user AS id_user, us.name AS name,us.apellido AS apellido, q1p1,q1p2,q1p3,q1exam,q2p1,q2p2,q2p3,q2exam  from notas AS no INNER JOIN users AS us ON no.id_user=us.id INNER JOIN materias AS ma ON ma.id=no.id_materia") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
?>
<form action="estudiantesNotas" method="get">
	<input type="hidden" name="lista2" value="<?php echo $_SESSION['materia'];?>">
	<input type="hidden" name="idnota" value="<?php echo $reg['idnota'];?>">
	<div><h4>Materia:<?php echo $reg['materia'];?></h4></div>

<table class='table table-bordered' border='1'>
		<tr>
			<td>Nombre</td>
			<td>P1</td>
			<td>P2</td>
			<td>P3</td>
			<td>%Prom</td>
			<td>Examen</td>
			<td>% Promedio<br> General</td>
			<td></td>
			<td>P1</td>
			<td>P2</td>
			<td>P3</td>
			<td>%Prom</td>
			<td>Examen</td>
			<td>% Promedio General</td>
			<td></td>
		</tr>
<tr>

	
			<td><?php echo $reg['name'].' '.$reg['apellido']?></td>
			<td><input type="number" name="q1p1" class="form-control" value="<?php echo $reg['q1p1'];?>" max="10"></td>
			<td><input type="number" name="q1p2" class="form-control" value="<?php echo $reg['q1p2'];?>" max="10"></td>
			<td><input type="number" name="q1p3" class="form-control" value="<?php echo $reg['q1p3'];?>" max="10"></td>
			<td><?php
			$sumatoria=$reg['q1p1']+$reg['q1p2']+$reg['q1p3'];
			$q1promedio=$sumatoria*$constante;
			//echo  bcdiv($q1promedio,'1',PHP_ROUND_HALF_ODD);
			echo number_format((float)$q1promedio, 2, '.', '');
			 ?></td>
			<td><input type="number" name="q1exam" class="form-control" value="<?php echo $reg['q1exam'];?>" max="10"></td>
			<td>
				<?php
					$q1promediog=($reg['q1exam']*(2))+$q1promedio;
					echo number_format((float)$q1promediog, 2, '.', '');
				 ?></td>
			<td></td>
			<td><input type="number" name="q2p1" class="form-control" value="<?php echo $reg['q2p1'];?>" max="10"></td>
			<td><input type="number" name="q2p2" class="form-control" value="<?php echo $reg['q2p2'];?>" max="10"></td>
			<td><input type="number" name="q2p3" class="form-control" value="<?php echo $reg['q2p3'];?>" max="10"></td>
			<td><?php
			$sumatoria=$reg['q2p1']+$reg['q2p2']+$reg['q2p3'];
			$q2promedio=$sumatoria*$constante;
			//echo  bcdiv($q1promedio,'1',PHP_ROUND_HALF_ODD);
			echo number_format((float)$q2promedio, 2, '.', '');
			 ?></td>
			<td><input type="number" name="q2exam" class="form-control" value="<?php echo $reg['q2exam'];?>" max="10"></td>
			<td>
				<?php
					$q2promediog=($reg['q2exam']*(2))+$q2promedio;
					echo number_format((float)$q2promediog, 2, '.', '');
				 ?></td>
				 
				 <td><input type="submit" name="accion"  value="Actualizar" class="btn btn-primary btn-md">
			</td>
			
		</tr>
		</table>
		</form>
<?php 
}
}
else
	{
			$registros=mysqli_query($conexion,"select no.id AS idnota, no.id_user AS id_user, us.name AS name, q1p1,q1p2,q1p3,q1exam,q2p1,q2p2,q2p3,q2exam  from notas AS no INNER JOIN users AS us ON no.id_user=us.id where no.id_materia='$_SESSION[materia]' ") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
?>
<form action="estudiantesNotas" method="get">
	<input type="hidden" name="lista2" value="<?php echo $_SESSION['materia'];?>">
	<input type="hidden" name="idnota" value="<?php echo $reg['idnota'];?>">
	
<table class='table table-bordered' border='1'>
		<tr>
			<td>Nombre</td>
			<td>P1</td>
			<td>P2</td>
			<td>P3</td>
			<td>%Prom</td>
			<td>Examen</td>
			<td>% Promedio<br> General</td>
			<td></td>
			<td>P1</td>
			<td>P2</td>
			<td>P3</td>
			<td>%Prom</td>
			<td>Examen</td>
			<td>% Promedio General</td>
			<td></td>
		</tr>
<tr>

	
			<td><?php echo $reg['name']?></td>
			<td><input type="number" name="q1p1" class="form-control" value="<?php echo $reg['q1p1'];?>" max="10"></td>
			<td><input type="number" name="q1p2" class="form-control" value="<?php echo $reg['q1p2'];?>" max="10"></td>
			<td><input type="number" name="q1p3" class="form-control" value="<?php echo $reg['q1p3'];?>" max="10"></td>
			<td><?php
			$sumatoria=$reg['q1p1']+$reg['q1p2']+$reg['q1p3'];
			$q1promedio=$sumatoria*$constante;
			//echo  bcdiv($q1promedio,'1',PHP_ROUND_HALF_ODD);
			echo number_format((float)$q1promedio, 2, '.', '');
			 ?></td>
			<td><input type="number" name="q1exam" class="form-control" value="<?php echo $reg['q1exam'];?>" max="10"></td>
			<td>
				<?php
					$q1promediog=($reg['q1exam']*(2))+$q1promedio;
					echo number_format((float)$q1promediog, 2, '.', '');
				 ?></td>
			<td></td>
			<td><input type="number" name="q2p1" class="form-control" value="<?php echo $reg['q2p1'];?>" max="10"></td>
			<td><input type="number" name="q2p2" class="form-control" value="<?php echo $reg['q2p2'];?>" max="10"></td>
			<td><input type="number" name="q2p3" class="form-control" value="<?php echo $reg['q2p3'];?>" max="10"></td>
			<td><?php
			$sumatoria=$reg['q2p1']+$reg['q2p2']+$reg['q2p3'];
			$q2promedio=$sumatoria*$constante;
			//echo  bcdiv($q1promedio,'1',PHP_ROUND_HALF_ODD);
			echo number_format((float)$q2promedio, 2, '.', '');
			 ?></td>
			<td><input type="number" name="q2exam" class="form-control" value="<?php echo $reg['q2exam'];?>" max="10"></td>
			<td>
				<?php
					$q2promediog=($reg['q2exam']*(2))+$q2promedio;
					echo number_format((float)$q2promediog, 2, '.', '');
				 ?></td>
				 
				 <td><input type="submit" name="accion"  value="Actualizar" class="btn btn-primary btn-md">
			</td>
			
		</tr>
		</table>
		</form>
<?php 
}
}
		?>
		
</div>