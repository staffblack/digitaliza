@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <form method="POST" action="http://201.183.227.29/evalua/public/guardar.php?id_evaluacion=<?php echo $_REQUEST['id_evaluacion'];?>&id_docente=<?php echo $_REQUEST['id_docente'];?>&numero_preguntas=<?php echo $_REQUEST['numero_preguntas'];?>" 
            <input type="hidden" name="id_evaluacion" value="<?php  $_REQUEST['id_evaluacion'];?>">
            <input type="hidden" name="id_docente" value="<?php  $_REQUEST['id_docente']?>">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear detalles de la evaluación</div>
                    <?php
                    $j= $_REQUEST['numero_preguntas']; 
                for ($i=1; $i<=$j ; $i++) { 
                                   
                    ?>      
                    <div class="col-lg-6">
                    <label>Pregunta N° <?php echo $i;?></label>
                    <input type="text" name="pregunta<?php echo $i;?>" /> 

                    </div>
              <?php 
            }          
            ?>
            <div class="col-md-12">
            <input type="submit" value="Registrar" class="btn btn-primary">
            </div>
                </div>
            </div>

           </form>
        </div>
    </div>
@endsection
