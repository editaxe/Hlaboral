<?php
include_once('../conexiones/conexione.php');
//----------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------//
$buscar = addslashes($_REQUEST['term']);

if($buscar <> NULL) {

$retorno_array = array();
$retorno_array2 = array();

$sql_grupo_area_cargo = "SELECT grupo_area.nombre_grupo_area, grupo_area_cargo.nombre_grupo_area_cargo, grupo_area_cargo.cod_grupo_area_cargo, 
grupo_area_cargo.cod_grupo_area, grupo_area_cargo.clasrieg_fis1_ruid, grupo_area_cargo.clasrieg_fis1_ilum, grupo_area_cargo.clasrieg_fis1_noionic, 
grupo_area_cargo.clasrieg_fis1_vibra, grupo_area_cargo.clasrieg_fis1_tempextrem, grupo_area_cargo.clasrieg_fis1_cambpres, 
grupo_area_cargo.clasrieg_quim1_gasvapor, grupo_area_cargo.clasrieg_quim1_aeroliq, grupo_area_cargo.clasrieg_quim1_solid, 
grupo_area_cargo.clasrieg_quim1_liquid, grupo_area_cargo.clasrieg_biolog1_viru, grupo_area_cargo.clasrieg_biolog1_bacter, 
grupo_area_cargo.clasrieg_biolog1_parasi, grupo_area_cargo.clasrieg_biolog1_morde, grupo_area_cargo.clasrieg_biolog1_picad, 
grupo_area_cargo.clasrieg_biolog1_hongo, grupo_area_cargo.clasrieg_ergo1_trabestat, grupo_area_cargo.clasrieg_ergo1_esfuerfis, 
grupo_area_cargo.clasrieg_ergo1_carga, grupo_area_cargo.clasrieg_ergo1_postforz, grupo_area_cargo.clasrieg_ergo1_movrepet, 
grupo_area_cargo.clasrieg_ergo1_jortrab, grupo_area_cargo.clasrieg_psi1_monoto, grupo_area_cargo.clasrieg_psi1_relhuman, 
grupo_area_cargo.clasrieg_psi1_contentarea, grupo_area_cargo.clasrieg_psi1_orgtiemptrab, grupo_area_cargo.clasrieg_segur1_mecanic, 
grupo_area_cargo.clasrieg_segur1_electri, grupo_area_cargo.clasrieg_segur1_locat, grupo_area_cargo.clasrieg_segur1_fisiquim, 
grupo_area_cargo.clasrieg_segur1_public, grupo_area_cargo.clasrieg_segur1_espconfi, grupo_area_cargo.clasrieg_segur1_trabaltura, 
grupo_area_cargo.clasrieg_observ1_otro
FROM grupo_area RIGHT JOIN grupo_area_cargo ON grupo_area.cod_grupo_area = grupo_area_cargo.cod_grupo_area
WHERE (grupo_area.nombre_grupo_area LIKE '%$buscar%') OR (grupo_area_cargo.nombre_grupo_area_cargo LIKE '%$buscar%')";
$consulta_grupo_area_cargo = mysqli_query($conectar, $sql_grupo_area_cargo);
$total_resul = mysqli_num_rows($consulta_grupo_area_cargo);

while ($datos_grupo_area_cargo = mysqli_fetch_assoc($consulta_grupo_area_cargo)) {
$cod_grupo_area_cargo                          = $datos_grupo_area_cargo['cod_grupo_area_cargo'];
$nombre_grupo_area                             = $datos_grupo_area_cargo['nombre_grupo_area'];
$nombre_grupo_area_cargo                       = $datos_grupo_area_cargo['nombre_grupo_area_cargo'];
$datos_array['id']                             = $cod_grupo_area_cargo;
$datos_array['value']                          = $nombre_grupo_area." | ".$nombre_grupo_area_cargo;
$datos_array['cod_grupo_area_cargo']           = $cod_grupo_area_cargo;
$datos_array['nombre_grupo_area_cargo']        = $nombre_grupo_area_cargo;
$datos_array['cod_grupo_area']                 = $datos_grupo_area_cargo['cod_grupo_area'];
$datos_array['clasrieg_fis1_ruid']             = $datos_grupo_area_cargo['clasrieg_fis1_ruid'];
$datos_array['clasrieg_fis1_ilum']             = $datos_grupo_area_cargo['clasrieg_fis1_ilum'];
$datos_array['clasrieg_fis1_noionic']          = $datos_grupo_area_cargo['clasrieg_fis1_noionic'];
$datos_array['clasrieg_fis1_vibra']            = $datos_grupo_area_cargo['clasrieg_fis1_vibra'];
$datos_array['clasrieg_fis1_tempextrem']       = $datos_grupo_area_cargo['clasrieg_fis1_tempextrem'];
$datos_array['clasrieg_fis1_cambpres']         = $datos_grupo_area_cargo['clasrieg_fis1_cambpres'];
$datos_array['clasrieg_quim1_gasvapor']        = $datos_grupo_area_cargo['clasrieg_quim1_gasvapor'];
$datos_array['clasrieg_quim1_aeroliq']         = $datos_grupo_area_cargo['clasrieg_quim1_aeroliq'];
$datos_array['clasrieg_quim1_solid']           = $datos_grupo_area_cargo['clasrieg_quim1_solid'];
$datos_array['clasrieg_quim1_liquid']          = $datos_grupo_area_cargo['clasrieg_quim1_liquid'];
$datos_array['clasrieg_biolog1_viru']          = $datos_grupo_area_cargo['clasrieg_biolog1_viru'];
$datos_array['clasrieg_biolog1_bacter']        = $datos_grupo_area_cargo['clasrieg_biolog1_bacter'];
$datos_array['clasrieg_biolog1_parasi']        = $datos_grupo_area_cargo['clasrieg_biolog1_parasi'];
$datos_array['clasrieg_biolog1_morde']         = $datos_grupo_area_cargo['clasrieg_biolog1_morde'];
$datos_array['clasrieg_biolog1_picad']         = $datos_grupo_area_cargo['clasrieg_biolog1_picad'];
$datos_array['clasrieg_biolog1_hongo']         = $datos_grupo_area_cargo['clasrieg_biolog1_hongo'];
$datos_array['clasrieg_ergo1_trabestat']       = $datos_grupo_area_cargo['clasrieg_ergo1_trabestat'];
$datos_array['clasrieg_ergo1_esfuerfis']       = $datos_grupo_area_cargo['clasrieg_ergo1_esfuerfis'];
$datos_array['clasrieg_ergo1_carga']           = $datos_grupo_area_cargo['clasrieg_ergo1_carga'];
$datos_array['clasrieg_ergo1_postforz']        = $datos_grupo_area_cargo['clasrieg_ergo1_postforz'];
$datos_array['clasrieg_ergo1_movrepet']        = $datos_grupo_area_cargo['clasrieg_ergo1_movrepet'];
$datos_array['clasrieg_ergo1_jortrab']         = $datos_grupo_area_cargo['clasrieg_ergo1_jortrab'];
$datos_array['clasrieg_psi1_monoto']           = $datos_grupo_area_cargo['clasrieg_psi1_monoto'];
$datos_array['clasrieg_psi1_relhuman']         = $datos_grupo_area_cargo['clasrieg_psi1_relhuman'];
$datos_array['clasrieg_psi1_contentarea']      = $datos_grupo_area_cargo['clasrieg_psi1_contentarea'];
$datos_array['clasrieg_psi1_orgtiemptrab']     = $datos_grupo_area_cargo['clasrieg_psi1_orgtiemptrab'];
$datos_array['clasrieg_segur1_mecanic']        = $datos_grupo_area_cargo['clasrieg_segur1_mecanic'];
$datos_array['clasrieg_segur1_electri']        = $datos_grupo_area_cargo['clasrieg_segur1_electri'];
$datos_array['clasrieg_segur1_locat']          = $datos_grupo_area_cargo['clasrieg_segur1_locat'];
$datos_array['clasrieg_segur1_fisiquim']       = $datos_grupo_area_cargo['clasrieg_segur1_fisiquim'];
$datos_array['clasrieg_segur1_public']         = $datos_grupo_area_cargo['clasrieg_segur1_public'];
$datos_array['clasrieg_segur1_espconfi']       = $datos_grupo_area_cargo['clasrieg_segur1_espconfi'];
$datos_array['clasrieg_segur1_trabaltura']     = $datos_grupo_area_cargo['clasrieg_segur1_trabaltura'];
$datos_array['clasrieg_observ1_otro']          = $datos_grupo_area_cargo['clasrieg_observ1_otro'];

array_push($retorno_array, $datos_array);
}
echo json_encode($retorno_array);
} else { } ?>