@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-11">
                <div class="col-lg-2">
                    <a class="navbar-brand" href="#" data-toggle="offcanvas" role="button">
                        <span class="glyphicon glyphicon-align-justify"></span> 
                   </a>
                   <h5><b>Caja {{ $caja->id }}</b></h5>
                   
                </div>
                <div class="col-lg-7">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th> <a href="{{ url('/caja') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a> </th><th> Empresa: <?php 
                                        include "conexion3.php";
                                        $registros = mysqli_query($conexion, "select * FROM empresa where id= '$caja->empresa'") or
                                            die("Problemas en el select:" . mysqli_error($conexion));
                                            if ($reg = mysqli_fetch_array($registros)) {
                                                echo $reg['nombre_empresa'];
                                            }
                                        
                                        ?> </th><th> Sucursal:<?php 
                                        include "conexion3.php";
                                        $registros = mysqli_query($conexion, "select * FROM sucursal where id= '$caja->sucursal'") or
                                            die("Problemas en el select:" . mysqli_error($conexion));
                                            if ($reg = mysqli_fetch_array($registros)) {
                                                echo $reg['nombre_sucursal'];
                                            }
                                        
                                        ?> </th>
                                        <th>
                                        <?php 
                                        include "conexion3.php";
                                        $registros = mysqli_query($conexion, "select * FROM departamento where id= '$caja->departamento'") or
                                            die("Problemas en el select:" . mysqli_error($conexion));
                                            if ($reg = mysqli_fetch_array($registros)) {
                                                echo $reg['nombre'];
                                            }
                                        
                                        ?></th>
                                    <th><?php 
                                        include "conexion3.php";
                                        $registros = mysqli_query($conexion, "select * FROM subdepartamento where id= '$caja->sub_departamento'") or
                                            die("Problemas en el select:" . mysqli_error($conexion));
                                            if ($reg = mysqli_fetch_array($registros)) {
                                                echo $reg['nombre'];
                                            }
                                        
                                        ?></th>
                                    
                                    
                                    
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
