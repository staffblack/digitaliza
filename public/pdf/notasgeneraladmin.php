<?php
include 'encabezado.php';
require '../conexion3.php';
$iduser=$_REQUEST['iduser'];
$registros=mysqli_query($conexion,"SELECT * FROM users") or
  die("Problemas en el select:".mysqli_error($conexion));
$contador=0;
if ($reg=mysqli_fetch_array($registros))
{
  $docente=$reg['name'].''.$reg['apellido'];
	}

$pdf= new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(230,230,230);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(60,6, 'Docente:'.$docente.'                                                        Reporte de Notas',0,1,'c',0);

$materia=mysqli_query($conexion,"SELECT * FROM materias") or
  die("Problemas en el select:".mysqli_error($conexion));
while ($mat=mysqli_fetch_array($materia))
{
$pdf->Cell(60,6, 'Materia:'.$mat['materia'],0,1,'c',0);

$pdf->Cell(90,6, '                           1er Quintimestre',0,0,'c',0);
$pdf->Cell(90,6, '                                                                                                          2do Quintimestre',0,1,'c',0);

$pdf->Cell(90,6, 'Nombre',1,0,'c',0);
$pdf->Cell(10,6, 'P1',1,0,'c',0);
$pdf->Cell(10,6, 'P2',1,0,'c',0);
$pdf->Cell(10,6, 'P3',1,0,'c',0);
$pdf->Cell(15,6, '%Prom',1,0,'c',0);
$pdf->Cell(17,6, 'Examen',1,0,'c',0);
$pdf->Cell(30,6, '% Promedio G',1,0,'c',0);
$pdf->Cell(10,6, 'P1',1,0,'c',0);
$pdf->Cell(10,6, 'P2',1,0,'c',0);
$pdf->Cell(10,6, 'P3',1,0,'c',0);
$pdf->Cell(15,6, '%Prom',1,0,'c',0);
$pdf->Cell(17,6, 'Examen',1,0,'c',0);
$pdf->Cell(30,6, '% Promedio G',1,1,'c',0);
      

$nota=mysqli_query($conexion,"SELECT * FROM notas AS no INNER JOIN users AS us ON no.id_user=us.id WHERE no.id_materia='$mat[id]'") or
  die("Problemas en el select:".mysqli_error($conexion));
while ($not=mysqli_fetch_array($nota))
{
//$pdf->Cell(60,6, 'nota id:'.$not['id_user'],0,1,'c',0);
$pdf->Cell(90,6, $not['name'].' '.$not['apellido'],1,0,'c',0);
$pdf->Cell(10,6, $not['q1p1'],1,0,'c',0);
$pdf->Cell(10,6, $not['q1p2'],1,0,'c',0);
$pdf->Cell(10,6, $not['q1p3'],1,0,'c',0);

$constante=2.666666667;
$sumatoria=$not['q1p1']+$not['q1p2']+$not['q1p3'];
$q1promedio=$sumatoria*$constante;
$pdf->Cell(15,6, number_format((float)$q1promedio, 2, '.', ''),1,0,'c',0);

$pdf->Cell(17,6, $not['q1exam'],1,0,'c',0);

$q1promediog=($not['q1exam']*(2))+$q1promedio;

$pdf->Cell(30,6, number_format((float)$q1promediog, 2, '.', ''),1,0,'c',0);

$pdf->Cell(10,6, $not['q2p1'],1,0,'c',0);
$pdf->Cell(10,6, $not['q2p2'],1,0,'c',0);
$pdf->Cell(10,6, $not['q2p3'],1,0,'c',0);

$sumatoria=$not['q2p1']+$not['q2p2']+$not['q2p3'];
$q2promedio=$sumatoria*$constante;
$pdf->Cell(15,6, number_format((float)$q2promedio, 2, '.', ''),1,0,'c',0);

$pdf->Cell(17,6, $not['q2exam'],1,0,'c',0);

$q2promediog=($not['q2exam']*(2))+$q2promedio;

$pdf->Cell(30,6, number_format((float)$q2promediog, 2, '.', ''),1,1,'c',0);

}
}
$pdf->Output('D','reportenotas.pdf');

?>

