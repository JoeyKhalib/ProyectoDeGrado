<?php 
function formatearFecha($fecha)
{
/*2021-07-01 17:43:39*/

$dia=substr($fecha, 8,2);
$mes=substr($fecha, 5,2);
$anio=substr($fecha, 0,4);
$hora=substr($fecha, 11,5);

$fechaformateada=$dia."/".$mes."/".$anio." ".$hora;
return $fechaformateada;
}


function generarUsuario($nombres,$ci)
{
$nuevoUsuario=$nombres;
$carnet=$ci;

$newuser=$nuevoUsuario.$carnet;

return $newuser;
}

function generarContra($nombres,$apellidoPaterno,$apellidoMaterno,$ci)
{
	
$nombresInicial=substr($nombres, 0,1);
$apellidoPaternoInicial=substr($apellidoPaterno, 0,1);
$apellidoMaternoInicial=substr($apellidoMaterno, 0,1);
$cIncial=$ci;

$conta=$nombresInicial.$apellidoPaternoInicial.$apellidoMaternoInicial.$cIncial;
return $conta;
}

function fechaActual()
{
	$now = date('Y-m-d H:i:s');
return $now;
}



 ?>