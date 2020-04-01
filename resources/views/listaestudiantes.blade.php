@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')


<?php $iduser=auth()->user()->id;?>

    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Estudiantes</div>

<?php
include 'conexion3.php';
?>

<?php 

$estudiantes=mysqli_query($conexion,"select * from materias where id_user='$iduser'") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($mat=mysqli_fetch_array($estudiantes))
{


?>

                <div >
                	<div class="col-md-10">
                		
                		<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $mat['materia']?>">
       <h4 style="color: blue">Materia: <?php echo $mat['materia']?></h4></a>
                	</div>
                	<div id="<?php echo $mat['materia']?>" class="panel-collapse collapse in">
					<table class="table" width="100%">
                    	<tr>
                    		<td>Nombres</td><td>Apellidos</td><td>Cedula</td><td>Correo</td><td>Edad</td><td>Sexo</td>
                    	</tr>

                    	<?php 
                    	

                    		$matriculas=mysqli_query($conexion,"select * from matriculas AS mt INNER JOIN users AS us ON mt.id_user=us.id where mt.id_curso='$mat[id_curso]'") or
							  die("Problemas en el select:".mysqli_error($conexion));

							while ($mt=mysqli_fetch_array($matriculas))
							{
								?>

							<tr>
								<td><?php echo $mt['name']?></td><td><?php echo $mt['apellido']?></td><td><?php echo $mt['identificacion']?></td><td><?php echo $mt['email']?></td><td><?php echo $mt['edad']?></td><td><?php echo $mt['sexo']?></td>
                    		</tr>

								<?php 



							}
                    	?>

                    </table>      
    				</div>
  				</div>
                    
                

                <?php
                }
                 ?>
                 </div>
            </div>
        </div>
    </div>
@endsection
