<?php
include_once('../conexiones/conexione.php');

$cod_grupo_area = intval($_POST['cod_grupo_area']);

$sql_grupo_area_cargo = "SELECT * FROM grupo_area_cargo WHERE cod_grupo_area = '$cod_grupo_area'";
$consulta_grupo_area_cargo = mysqli_query($conectar, $sql_grupo_area_cargo) or die(mysqli_error($conectar));


/*
$sql_grupo_area_cargo = "SELECT grupo_area_cargo.cod_grupo_area_cargo, grupo_area_cargo.cod_grupo_area, grupo_area_cargo.nombre_grupo_area_cargo, grupo_area.nombre_grupo_area
FROM grupo_area RIGHT JOIN grupo_area_cargo ON grupo_area.cod_grupo_area = grupo_area_cargo.cod_grupo_area
WHERE (((grupo_area_cargo.cod_grupo_area)='$cod_grupo_area')) ORDER BY grupo_area_cargo.nombre_grupo_area_cargo ASC");
$consulta_grupo_area_cargo = mysqli_query($conectar, $sql_grupo_area_cargo) or die(mysqli_error($conectar));
*/
//echo '<option value="0">Seleccione</option>';

while ($datos_grupo_area_cargo = mysqli_fetch_assoc($consulta_grupo_area_cargo)) {
$cod_grupo_area_cargo = $datos_grupo_area_cargo['cod_grupo_area_cargo'];
$nombre_grupo_area_cargo = $datos_grupo_area_cargo['nombre_grupo_area_cargo'];
//$nombre_grupo_area = $datos_grupo_area_cargo['nombre_grupo_area'];

echo '<option value="'.$cod_grupo_area_cargo.'">'.$nombre_grupo_area_cargo.'</option>'."\n";
//echo '<option value="'.$cod_grupo_area_cargo.'">'.$nombre_grupo_area_cargo.' - '.$nombre_grupo_area.'</option>'."\n";
}