@inject('request', 'Illuminate\Http\Request')
<?php 
$id = Auth::id();
include "conexion3.php";

$registros = mysqli_query($conexion, "select * from users where id='$id'") or
    die("Problemas en el select:" . mysqli_error($conexion));

  if ($reg = mysqli_fetch_array($registros)) {
    session_start();
    $_SESSION["perfil"] = $reg["perfil"];
    $idgrupo=$reg["id_grupo"];
    session(['idgrupo' => $idgrupo]);
    session(['idusuario' => $id]);
    $_SESSION["nombre"] = $reg["name"];
    
  }
  else{
    session_start();
    $_SESSION["perfil"] = "0";
    $_SESSION["nombre"] = $_SERVER["REMOTE_ADDR"];
  }



//session('idCarrito')=$id|   ;




?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <?php
            if($_SESSION["perfil"]==0){

                ?>
                
                <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-home"></i>
                        <span class="title">Inicio</span>
                    </a>
                </li>
                <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">Iniciar Sessión</span>
                    </a>
                </li>
                
                <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-key"></i>
                        <span class="title">Recuperación de Contraseña</span>
                    </a>
                </li>

                <?php
            }elseif($_SESSION["perfil"]==1){// usuario docente
                ?>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span class="title">@lang('global.user-management.title')</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                            
                            <a href="{{ route('admin.users.index') }}">
                                <i class="fa fa-user"></i>
                                <span class="title">
                                    Usuarios del Sistemas
                                </span>
                            </a>
                        </li>					
                        <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                            <a href="#">
                                <i class="fa fa-building"></i>
                                <span class="title">
                                    Administrar Empresas
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('empresa.index') }}">
                                        <i class="fa fa-building"></i>
                                        <span class="title">
                                            Empresas
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(2) == 'sucursal' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('sucursal.index') }}">
                                        <i class="fa fa-building"></i>
                                        <span class="title">
                                            Sucursal
                                        </span>
                                    </a>
                                </li> 
                                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('departamento.index') }}">
                                        <i class="fa fa-building"></i>
                                        <span class="title">
                                            Departamentos
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(2) == 'subdepartamento' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('subdepartamento.index') }}">
                                        <i class="fa fa-building"></i>
                                        <span class="title">
                                            Sub - Departamento
                                        </span>
                                    </a>
                                </li>    
                            </ul>
                        </li>

                        <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                            <a href="#">
                                <i class="fa fa-building"></i>
                                <span class="title">
                                    Administrar Archivos Fisico
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('ubicacion.index') }}">
                                        <i class="fa fa-building"></i>
                                        <span class="title">
                                            Ubicaciones
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('rack.index') }}">
                                        <i class="fa fa-building"></i>
                                        <span class="title">
                                            Rack
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('cuerpo.index') }}">
                                        <i class="fa fa-building"></i>
                                        <span class="title">
                                            Cuerpos
                                        </span>
                                    </a>
                                </li>
                                                                     
                            </ul>
                        </li>


                        <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                            <a href="#">
                                <i class="fa fa-building"></i>
                                <span class="title">
                                    Administrar Cajas
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ $request->segment(2) == 'caja' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('caja.index') }}">
                                        <i class="fa fa-building"></i>
                                        <span class="title">
                                            Cajas
                                        </span>
                                    </a>
                                </li>
                                    
                            </ul>
                        </li>
                        						
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-sort-alpha-asc"></i>
                        <span class="title">Digitalización</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <a href="#">
                        <i class="fa fa-sort-alpha-asc"></i>
                        <span class="title">Reportes</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <a href="#">
                        <i class="fa fa-sort-alpha-asc"></i>
                        <span class="title">Tareas</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <a href="#">
                        <i class="fa fa-sort-alpha-asc"></i>
                        <span class="title">Pedidos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
    
                        <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">
                                    Listado Usuarios del Sistema
                                </span>
                            </a>
                        </li>
                        <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">
                                    Lista de empresas
                                </span>
                            </a>
                        </li>                    
                    </ul>
                </li>
                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                    <a href="{{ route('auth.change_password') }}">
                        <i class="fa fa-key"></i>
                        <span class="title">Cambiar password</span>
                    </a>
                </li>
                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
                </li>

                
                <?php

            }elseif($_SESSION["perfil"]==2){
// usuario docente
?>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span class="title">@lang('global.user-management.title')</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
    
                        
                       
                        <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                            <a href="{{ url('caja/caja') }}">
                                <i class="fa fa-user"></i>
                                <span class="title">
                                    Cajas
                                </span>
                            </a>
                        </li>
                        <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                            <a href="{{ url('caja/caja') }}">
                                <i class="fa fa-user"></i>
                                <span class="title">
                                    Anexar Carpetas - Excel
                                </span>
                            </a>
                        </li>					
                        	
                        						
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-sort-alpha-asc"></i>
                        <span class="title">Reportes</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
    
                        <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">
                                    Mis notas
                                </span>
                            </a>
                        </li>
                                            
                    </ul>
                </li>
                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                    <a href="{{ route('auth.change_password') }}">
                        <i class="fa fa-key"></i>
                        <span class="title">Cambiar password</span>
                    </a>
                </li>
                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
                </li>
                <?php

            

            }

            ?>


            
            
            @can('calificar')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-university"></i>
                    <span class="title">Docente</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                



                <ul class="treeview-menu">

                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.nota.index') }}">
                            <i class="fa fa-pencil-square"></i>
                            <span class="title">
                                Calificar
                            </span>
                        </a>
                    </li>                   
                </ul>
            </li>
            @endcan
            				
            @can('users_manage')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Configuracion</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                
            </li>
            
            @endcan			
            
            
        </ul>
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br>
        &nbsp;
        <br> 			
        
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}
