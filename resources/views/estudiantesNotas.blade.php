<?php
include 'conexion3.php';
 
//acciones de actualizar
if (isset($_REQUEST['accion'])) 
  {
    $accion=$_REQUEST['accion'];
  }else
    {
    $accion='';
    }

    if($accion=='Actualizar')//actualiza notas
      {
    mysqli_query($conexion, "update notas
                          set q1p1='$_REQUEST[q1p1]',
                              q1p2='$_REQUEST[q1p2]',
                              q1p3='$_REQUEST[q1p3]',
                              q1exam='$_REQUEST[q1exam]',
                              q2p1='$_REQUEST[q2p1]',
                              q2p2='$_REQUEST[q2p2]',
                              q2p3='$_REQUEST[q2p3]',
                              q2exam='$_REQUEST[q2exam]'

                        where id='$_REQUEST[idnota]'") or
  die("Problemas en el select:".mysqli_error($conexion));
    }
?>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    

    <div class="panel panel-default">
        <div class="panel-heading">
            Notas
        </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                   <label>Seleccionar Curso</label>
                   <h4><?php
                    $iduser=auth()->user()->id;

                    if (isset($_REQUEST['lista2'])) 
                          {
                            $materia=$_REQUEST['lista2'];
                            //echo "Variable definida!!!";
                          }else
                            {
                            $materia='';
                            }

                    
                    
                    session_start();
                    $_SESSION['iduser']  = $iduser;
                    $_SESSION['materia']  = $materia;
                    
                    ?>  </h4>
                   <form action="estudiantesNotas?x=1" method="get">
                    <input type="hidden" name="x" value="111">
                   <select class="form-control" id="lista1" name="lista1">
                   <?php
                      $cursos=mysqli_query($conexion,"select * from cursos") or
                        die("Problemas en el select:".mysqli_error($conexion));

                      while ($cur=mysqli_fetch_array($cursos))
                      {
                          ?>

                            <option value="<?php echo $cur['id'];?>"><?php echo $cur['curso'].' '.$cur['paralelo'];?></option>
                            
                          <?php

                       } 
                   ?>
                   </select>
                   <br>
                    <div id="select2lista"></div>
                    
                   <input type="submit" name="accion"class="btn btn-primary btn-block" value="Refrescar">
                 </form>
                 <div><?php
                  if($accion=="Actualizar")
                  {
                          echo '<h1 style="color:blue;">Datos actualizados Satisfactoriamente</h1>';
                   }
                 ?></div>
                  <div id="select3lista"></div>
                </div>
            </div>
            
        
      
    </div>
@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

function cursoChange() {
   console.log("Prueba cursoChange");
        var id = $("#id_curso").val(); 
        
        console.log(id);
          $.ajax({
           url: '/admin/getMaterias/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){
            
             console.log(response);
            var data = jQuery.parseJSON(JSON.stringify(response));
            var count = Object.keys(data).length;
            console.log(count);
            var len = 0;
             if(count > 0){
               len = count;
             }
             if(len > 0){
               // Read data and create <option >
               var id ="";
               var name ="";
               $("#id_materia").empty();
               for(var i=0; i<len; i++){
 
                 $("#id_materia").append('<option value='+data[i].id+'>'+data[i].materia+'</option>');
                 //var select = document.getElementById("id_materia");
                 //console.log(select);
                 //select.append(option); 
               }
             }
           }
        }); 
        
          $.ajax({
           url: '/admin/getEstudiantes/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){
            
             console.log(response);
            var data = jQuery.parseJSON(JSON.stringify(response));
            var count = Object.keys(data).length;
            var len = 0;
             if(count > 0){
               len = count;
             }          
             if(len > 0){
               // Read data and create <option >
               var id ="";
               var name ="";
               $("#id_user").empty();
               for(var i=0; i<len; i++){
 
                $("#id_user").append('<option value='+data[i].id+'>'+data[i].name+'</option>');
                 //var select = document.getElementById("id_materia");
                 //console.log(select);
                 //select.append(option); 
               }
             }
           }
        });
        
}
function materiaChange() {
   console.log("Prueba materiaChange");
        var id = $("#id_curso").val();      
        var materia = $("#id_materia").val();
        console.log(id);
          $.ajax({
           url: '/admin/getNotas/'+id+'/materia/'+materia,
           type: 'get',
           dataType: 'json',
           success: function(response){
            
             console.log(response);
            var data = jQuery.parseJSON(JSON.stringify(response));
            var count = Object.keys(data).length;
            console.log(response);
            console.log(count);
            var len = 0;
             if(count > 0){
               len = count;
             }
             var t = $('#DataTables_Table_0').DataTable();
             t.rows().remove().draw();           
             if(len > 0){
               // Read data and create <option >
               var id ="";
               var name ="";

               for(var i=0; i<len; i++){
                    
                    var promedio1 = (((data[i].q1p1 + data[i].q1p2 + data[i].q1p3)/3)*0.8);
                    var promedio2 = (((data[i].q2p1 + data[i].q2p2 + data[i].q2p3)/3)*0.8);
                    var general1 = (((data[i].q1p1 + data[i].q1p2 + data[i].q1p3)/3)*0.8)+(q1exam * 0.2);
                    var general2 = (((data[i].q2p1 + data[i].q2p2 + data[i].q2p3)/3)*0.8)+(q2exam * 0.2);
                    var text=['',data[i].user.name,data[i].q1p1,data[i].q1p2,data[i].q1p3,promedio1,data[i].q1exam,data[i].q2p1,data[i].q2p2,data[i].q2p3,promedio2,data[i].q2exam,'<a href="@php route(admin.nota.edit, if(count($notas)> 0){echo $nota->id} ) " class="btn btn-xs btn-info">@lang('global.app_edit')</a>'];

                    //var row = JSON.parse(text);
                    t.row.add(text).draw(); 
                    console.log(promedio1);
               }
             }
           }
        }); 
}   

</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#lista1').val(1);
    recargarLista();

    $('#lista1').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"datos3.php?iduser='$id'",
      data:"continente=" + $('#lista1').val(),
      success:function(r){
        $('#select2lista').html(r);
      }
    });
  }
</script>



<script type="text/javascript">
  $(document).ready(function(){
    $('#lista2').val(1);
    recargarLista2();

    $('#lista2').change(function(){
      recargarLista2();
    });
  })
</script>

<script type="text/javascript">
  function recargarLista2(){
    $.ajax({
      type:"POST",
      url:"datos4.php?iduser='$id'",
      data:"materia=1" + $('#lista').val(),
      success:function(r){
        $('#select3lista').html(r);
        console.log(nombre);
      }
    });
  }
</script>