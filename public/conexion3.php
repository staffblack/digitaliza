<?php
$server='localhost';
$usuariobd='root';
$password='';
$base='digitaliza';
$conexion=mysqli_connect($server,$usuariobd,$password,$base) or
    die("Problemas con la conexion");
?>