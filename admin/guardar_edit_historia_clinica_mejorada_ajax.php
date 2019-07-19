<?php
if (isset($_REQUEST['valor']) && isset($_REQUEST['id'])) {
include_once('../conexiones/conexione.php'); 
include_once('../evitar_mensaje_error/error.php');
date_default_timezone_set("America/Bogota");
include ("../session/funciones_admin.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
    } else { header("Location:../index.php");
}
$valor_intro                     = addslashes($_REQUEST['valor']);
$campo                           = addslashes($_REQUEST['campo']);
$cod_historia_clinica            = intval($_REQUEST['id']);
$cod_cliente                     = intval($_REQUEST['cod_cliente']);
/* -------------------------------------------------------------------------------------------------------------- */
if ($campo=='exa_fis_talla') {

$sql_producto = "SELECT exa_fis_peso FROM historia_clinica WHERE cod_historia_clinica = '$cod_historia_clinica'";
$consulta_producto = mysqli_query($conectar, $sql_producto) or die(mysqli_error($conectar));
$datos_producto = mysqli_fetch_assoc($consulta_producto);

$exa_fis_talla                   = $valor_intro;
$exa_fis_peso                    = $datos_producto['exa_fis_peso'];
$exa_fis_imc                     = round($exa_fis_peso / pow($exa_fis_talla, 2), 2);

if (($exa_fis_imc  < 18.50)) { $exa_fis_interpreimc = "BAJO PESO"; }
if (($exa_fis_imc  >= 18.50) && ($exa_fis_imc  <= 24.99)) { $exa_fis_interpreimc = "PESO NORMAL"; }
if (($exa_fis_imc  >= 25.0) && ($exa_fis_imc  <= 29.99)) { $exa_fis_interpreimc = "SOBREPESO"; }
if (($exa_fis_imc  >= 30.0) && ($exa_fis_imc  <= 34.99)) { $exa_fis_interpreimc = "OBESIDAD I"; }
if (($exa_fis_imc  >= 35.0) && ($exa_fis_imc  <= 39.99)) { $exa_fis_interpreimc = "OBESIDAD II"; }
if (($exa_fis_imc  >= 40.0) && ($exa_fis_imc  <= 49.99)) { $exa_fis_interpreimc = "OBESIDAD III"; }
if (($exa_fis_imc  >= 50.0)) { $exa_fis_interpreimc = "OBESIDAD EXTREMA"; }

$data_sql = ("UPDATE historia_clinica SET exa_fis_talla = '$exa_fis_talla', exa_fis_imc = '$exa_fis_imc', exa_fis_interpreimc = '$exa_fis_interpreimc' WHERE cod_historia_clinica = '$cod_historia_clinica'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
/* -------------------------------------------------------------------------------------------------------------- */
elseif ($campo=='exa_fis_peso') {

$sql_producto = "SELECT exa_fis_talla FROM historia_clinica WHERE cod_historia_clinica = '$cod_historia_clinica'";
$consulta_producto = mysqli_query($conectar, $sql_producto) or die(mysqli_error($conectar));
$datos_producto = mysqli_fetch_assoc($consulta_producto);

$exa_fis_peso                     = $valor_intro;
$exa_fis_talla                    = $datos_producto['exa_fis_talla'];
$exa_fis_imc                      = round($exa_fis_peso / pow($exa_fis_talla, 2), 2);

if (($exa_fis_imc  < 18.50)) { $exa_fis_interpreimc = "BAJO PESO"; }
if (($exa_fis_imc  >= 18.50) && ($exa_fis_imc  <= 24.99)) { $exa_fis_interpreimc = "PESO NORMAL"; }
if (($exa_fis_imc  >= 25.0) && ($exa_fis_imc  <= 29.99)) { $exa_fis_interpreimc = "SOBREPESO"; }
if (($exa_fis_imc  >= 30.0) && ($exa_fis_imc  <= 34.99)) { $exa_fis_interpreimc = "OBESIDAD I"; }
if (($exa_fis_imc  >= 35.0) && ($exa_fis_imc  <= 39.99)) { $exa_fis_interpreimc = "OBESIDAD II"; }
if (($exa_fis_imc  >= 40.0) && ($exa_fis_imc  <= 49.99)) { $exa_fis_interpreimc = "OBESIDAD III"; }
if (($exa_fis_imc  >= 50.0)) { $exa_fis_interpreimc = "OBESIDAD EXTREMA"; }

$data_sql = ("UPDATE historia_clinica SET exa_fis_peso = '$exa_fis_peso', exa_fis_imc = '$exa_fis_imc', exa_fis_interpreimc = '$exa_fis_interpreimc' WHERE cod_historia_clinica = '$cod_historia_clinica'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
} 
/* -------------------------------------------------------------------------------------------------------------- */
elseif ($campo=='fecha_ymd_hora') {
$fecha_ymd_hora                  = $valor_intro;
$fecha_time                      = strtotime($fecha_ymd_hora);
$fecha_ymd                       = date("Y/m/d", $fecha_time);
$fecha_mes                       = date("m/Y", $fecha_time);
$fecha_anyo                      = date("Y", $fecha_time);
$fecha_dmy                       = date("d/m/Y", $fecha_time);
$hora                            = date("H:i:s", $fecha_time);
$fecha_reg_time                  = time();

$data_sql = ("UPDATE historia_clinica SET fecha_ymd = '$fecha_ymd', fecha_time = '$fecha_time', fecha_mes = '$fecha_mes', 
fecha_anyo = '$fecha_anyo', fecha_dmy = '$fecha_dmy', fecha_reg_time = '$fecha_reg_time', hora = '$hora'
WHERE cod_historia_clinica = '$cod_historia_clinica'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
/* -------------------------------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------------- */
elseif ($campo=='exaosteo_norm_anorm') {
$exaosteo_norm_anorm                  = $valor_intro;

if ($exaosteo_norm_anorm == 'Normal') {

$exaosteo_homb_movart                 = "Normal";
$exaosteo_homb_fuerza                 = "Normal";
$exaosteo_manjobe_movart              = "Normal";
$exaosteo_manjobe_fuerza              = "Normal";
$exaosteo_manyega_movart              = "Normal";
$exaosteo_manyega_fuerza              = "Normal";
$exaosteo_manjobe_sig                 = "Neg";
$exaosteo_manjobe_lat                 = "AM";
$exaosteo_epicond_sig                 = "Neg";
$exaosteo_epicond_lat                 = "AM";
$exaosteo_laseg_sig                   = "Neg";
$exaosteo_phalen_sig                  = "Neg";
$exaosteo_phalen_lat                  = "AM";
$exaosteo_cajon_sig                   = "Neg";
$exaosteo_cajon_lat                   = "AM";

$data_sql = ("UPDATE historia_clinica SET exaosteo_homb_movart = '$exaosteo_homb_movart', exaosteo_homb_fuerza = '$exaosteo_homb_fuerza', 
exaosteo_manjobe_movart = '$exaosteo_manjobe_movart', exaosteo_manjobe_fuerza = '$exaosteo_manjobe_fuerza', 
exaosteo_manyega_movart = '$exaosteo_manyega_movart', exaosteo_manyega_fuerza = '$exaosteo_manyega_fuerza',
exaosteo_norm_anorm = '$exaosteo_norm_anorm', exaosteo_manjobe_sig = '$exaosteo_manjobe_sig', 
exaosteo_manjobe_lat = '$exaosteo_manjobe_lat', exaosteo_epicond_sig = '$exaosteo_epicond_sig', exaosteo_epicond_lat = '$exaosteo_epicond_lat', 
exaosteo_laseg_sig = '$exaosteo_laseg_sig', exaosteo_phalen_sig = '$exaosteo_phalen_sig', exaosteo_phalen_lat = '$exaosteo_phalen_lat', 
exaosteo_cajon_sig = '$exaosteo_cajon_sig', exaosteo_cajon_lat = '$exaosteo_cajon_lat'
WHERE cod_historia_clinica = '$cod_historia_clinica'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));
if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }

} else { 
$exaosteo_homb_movart                 = "";
$exaosteo_homb_fuerza                 = "";
$exaosteo_manjobe_movart              = "";
$exaosteo_manjobe_fuerza              = "";
$exaosteo_manyega_movart              = "";
$exaosteo_manyega_fuerza              = "";
$exaosteo_manjobe_sig                 = "";
$exaosteo_manjobe_lat                 = "";
$exaosteo_epicond_sig                 = "";
$exaosteo_epicond_lat                 = "";
$exaosteo_laseg_sig                   = "";
$exaosteo_phalen_sig                  = "";
$exaosteo_phalen_lat                  = "";
$exaosteo_cajon_sig                   = "";
$exaosteo_cajon_lat                   = "";

$data_sql = ("UPDATE historia_clinica SET exaosteo_homb_movart = '$exaosteo_homb_movart', exaosteo_homb_fuerza = '$exaosteo_homb_fuerza', 
exaosteo_manjobe_movart = '$exaosteo_manjobe_movart', exaosteo_manjobe_fuerza = '$exaosteo_manjobe_fuerza', 
exaosteo_manyega_movart = '$exaosteo_manyega_movart', exaosteo_manyega_fuerza = '$exaosteo_manyega_fuerza', 
exaosteo_norm_anorm = '$exaosteo_norm_anorm', exaosteo_manjobe_sig = '$exaosteo_manjobe_sig', 
exaosteo_manjobe_lat = '$exaosteo_manjobe_lat', exaosteo_epicond_sig = '$exaosteo_epicond_sig', exaosteo_epicond_lat = '$exaosteo_epicond_lat', 
exaosteo_laseg_sig = '$exaosteo_laseg_sig', exaosteo_phalen_sig = '$exaosteo_phalen_sig', exaosteo_phalen_lat = '$exaosteo_phalen_lat', 
exaosteo_cajon_sig = '$exaosteo_cajon_sig', exaosteo_cajon_lat = '$exaosteo_cajon_lat'
WHERE cod_historia_clinica = '$cod_historia_clinica'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));
}
/* -------------------------------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------------- */
}
elseif ($campo=='cod_grupo_area_cargo') {
$cod_grupo_area_cargo            = $valor_intro;

$sql_grupo_area_cargo = "SELECT * FROM grupo_area_cargo WHERE cod_grupo_area_cargo = '$cod_grupo_area_cargo'";
$consulta_grupo_area_cargo = mysqli_query($conectar, $sql_grupo_area_cargo);
$datos_grupo_area_cargo = mysqli_fetch_assoc($consulta_grupo_area_cargo);

$nombre_grupo_area_cargo        = $datos_grupo_area_cargo['nombre_grupo_area_cargo'];
$clasrieg_fis1_ruid             = $datos_grupo_area_cargo['clasrieg_fis1_ruid'];
$clasrieg_fis1_ilum             = $datos_grupo_area_cargo['clasrieg_fis1_ilum'];
$clasrieg_fis1_noionic          = $datos_grupo_area_cargo['clasrieg_fis1_noionic'];
$clasrieg_fis1_vibra            = $datos_grupo_area_cargo['clasrieg_fis1_vibra'];
$clasrieg_fis1_tempextrem       = $datos_grupo_area_cargo['clasrieg_fis1_tempextrem'];
$clasrieg_fis1_cambpres         = $datos_grupo_area_cargo['clasrieg_fis1_cambpres'];
$clasrieg_quim1_gasvapor        = $datos_grupo_area_cargo['clasrieg_quim1_gasvapor'];
$clasrieg_quim1_aeroliq         = $datos_grupo_area_cargo['clasrieg_quim1_aeroliq'];
$clasrieg_quim1_solid           = $datos_grupo_area_cargo['clasrieg_quim1_solid'];
$clasrieg_quim1_liquid          = $datos_grupo_area_cargo['clasrieg_quim1_liquid'];
$clasrieg_biolog1_viru          = $datos_grupo_area_cargo['clasrieg_biolog1_viru'];
$clasrieg_biolog1_bacter        = $datos_grupo_area_cargo['clasrieg_biolog1_bacter'];
$clasrieg_biolog1_parasi        = $datos_grupo_area_cargo['clasrieg_biolog1_parasi'];
$clasrieg_biolog1_morde         = $datos_grupo_area_cargo['clasrieg_biolog1_morde'];
$clasrieg_biolog1_picad         = $datos_grupo_area_cargo['clasrieg_biolog1_picad'];
$clasrieg_biolog1_hongo         = $datos_grupo_area_cargo['clasrieg_biolog1_hongo'];
$clasrieg_ergo1_trabestat       = $datos_grupo_area_cargo['clasrieg_ergo1_trabestat'];
$clasrieg_ergo1_esfuerfis       = $datos_grupo_area_cargo['clasrieg_ergo1_esfuerfis'];
$clasrieg_ergo1_carga           = $datos_grupo_area_cargo['clasrieg_ergo1_carga'];
$clasrieg_ergo1_postforz        = $datos_grupo_area_cargo['clasrieg_ergo1_postforz'];
$clasrieg_ergo1_movrepet        = $datos_grupo_area_cargo['clasrieg_ergo1_movrepet'];
$clasrieg_ergo1_jortrab         = $datos_grupo_area_cargo['clasrieg_ergo1_jortrab'];
$clasrieg_psi1_monoto           = $datos_grupo_area_cargo['clasrieg_psi1_monoto'];
$clasrieg_psi1_relhuman         = $datos_grupo_area_cargo['clasrieg_psi1_relhuman'];
$clasrieg_psi1_contentarea      = $datos_grupo_area_cargo['clasrieg_psi1_contentarea'];
$clasrieg_psi1_orgtiemptrab     = $datos_grupo_area_cargo['clasrieg_psi1_orgtiemptrab'];
$clasrieg_segur1_mecanic        = $datos_grupo_area_cargo['clasrieg_segur1_mecanic'];
$clasrieg_segur1_electri        = $datos_grupo_area_cargo['clasrieg_segur1_electri'];
$clasrieg_segur1_locat          = $datos_grupo_area_cargo['clasrieg_segur1_locat'];
$clasrieg_segur1_fisiquim       = $datos_grupo_area_cargo['clasrieg_segur1_fisiquim'];
$clasrieg_segur1_public         = $datos_grupo_area_cargo['clasrieg_segur1_public'];
$clasrieg_segur1_espconfi       = $datos_grupo_area_cargo['clasrieg_segur1_espconfi'];
$clasrieg_segur1_trabaltura     = $datos_grupo_area_cargo['clasrieg_segur1_trabaltura'];
$clasrieg_observ1_otro          = $datos_grupo_area_cargo['clasrieg_observ1_otro'];

$data_sql = ("UPDATE historia_clinica SET cod_grupo_area_cargo = '$cod_grupo_area_cargo', 
clasrieg_fis1_ruid = '$clasrieg_fis1_ruid', clasrieg_fis1_ilum = '$clasrieg_fis1_ilum', 
clasrieg_fis1_noionic = '$clasrieg_fis1_noionic', clasrieg_fis1_vibra = '$clasrieg_fis1_vibra', 
clasrieg_fis1_tempextrem = '$clasrieg_fis1_tempextrem', clasrieg_fis1_cambpres = '$clasrieg_fis1_cambpres', 
clasrieg_quim1_gasvapor = '$clasrieg_quim1_gasvapor', clasrieg_quim1_aeroliq = '$clasrieg_quim1_aeroliq', 
clasrieg_quim1_solid = '$clasrieg_quim1_solid', clasrieg_quim1_liquid = '$clasrieg_quim1_liquid', 
clasrieg_biolog1_viru = '$clasrieg_biolog1_viru', clasrieg_biolog1_bacter = '$clasrieg_biolog1_bacter', 
clasrieg_biolog1_parasi = '$clasrieg_biolog1_parasi', clasrieg_biolog1_morde = '$clasrieg_biolog1_morde', 
clasrieg_biolog1_picad = '$clasrieg_biolog1_picad', clasrieg_biolog1_hongo = '$clasrieg_biolog1_hongo', 
clasrieg_ergo1_trabestat = '$clasrieg_ergo1_trabestat', clasrieg_ergo1_esfuerfis = '$clasrieg_ergo1_esfuerfis', 
clasrieg_ergo1_carga = '$clasrieg_ergo1_carga', clasrieg_ergo1_postforz = '$clasrieg_ergo1_postforz', 
clasrieg_ergo1_movrepet = '$clasrieg_ergo1_movrepet', clasrieg_ergo1_jortrab = '$clasrieg_ergo1_jortrab', 
clasrieg_psi1_monoto = '$clasrieg_psi1_monoto', clasrieg_psi1_relhuman = '$clasrieg_psi1_relhuman', 
clasrieg_psi1_contentarea = '$clasrieg_psi1_contentarea', clasrieg_psi1_orgtiemptrab = '$clasrieg_psi1_orgtiemptrab', 
clasrieg_segur1_mecanic = '$clasrieg_segur1_mecanic', clasrieg_segur1_electri = '$clasrieg_segur1_electri', 
clasrieg_segur1_locat = '$clasrieg_segur1_locat', clasrieg_segur1_fisiquim = '$clasrieg_segur1_fisiquim', 
clasrieg_segur1_public = '$clasrieg_segur1_public', clasrieg_segur1_espconfi = '$clasrieg_segur1_espconfi', 
clasrieg_segur1_trabaltura = '$clasrieg_segur1_trabaltura', clasrieg_observ1_otro = '$clasrieg_observ1_otro' 
WHERE cod_historia_clinica = '$cod_historia_clinica'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
elseif ($campo=='000') {

$data_sql = ("UPDATE cliente SET $campo = '$valor_intro' WHERE cod_cliente = '$cod_cliente'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
/* -------------------------------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------------- */
elseif ($campo=='nombre_grupo_area') {

$nombre_grupo_area            = strtoupper($valor_intro);

$sql_autoincremento_grupo_area = "SELECT nombre_grupo_area FROM grupo_area WHERE nombre_grupo_area = '$nombre_grupo_area'";
$exec_autoincremento_grupo_area = mysqli_query($conectar, $sql_autoincremento_grupo_area) or die(mysqli_error($conectar));
$existe_grupo_area = mysqli_num_rows($exec_autoincremento_grupo_area);

if ($existe_grupo_area == 0) {

$sql_autoincremento_grupo_area = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'grupo_area'";
$exec_autoincremento_grupo_area = mysqli_query($conectar, $sql_autoincremento_grupo_area) or die(mysqli_error($conectar));
$datos_autoincremento_grupo_area = mysqli_fetch_assoc($exec_autoincremento_grupo_area);
$cod_grupo_area = $datos_autoincremento_grupo_area['AUTO_INCREMENT'];

$sql_data = "INSERT INTO grupo_area (cod_grupo_area, nombre_grupo_area) VALUES ('$cod_grupo_area', '$nombre_grupo_area')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
} else {
$sql_grupo_area = "SELECT cod_grupo_area FROM grupo_area WHERE nombre_grupo_area = '$nombre_grupo_area'";
$exec_grupo_area = mysqli_query($conectar, $sql_grupo_area) or die(mysqli_error($conectar));
$datos_grupo_area = mysqli_fetch_assoc($exec_grupo_area);
$cod_grupo_area                    = $datos_grupo_area['cod_grupo_area'];
}
$data_sql = ("UPDATE historia_clinica SET cod_grupo_area = '$cod_grupo_area' WHERE cod_historia_clinica = '$cod_historia_clinica'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
/* -------------------------------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------------- */
elseif ($campo=='nombre_grupo_area_cargo') {

$nombre_grupo_area_cargo       = strtoupper($valor_intro);

$sql_autoincremento_grupo_area_cargo = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'grupo_area_cargo'";
$exec_autoincremento_grupo_area_cargo = mysqli_query($conectar, $sql_autoincremento_grupo_area_cargo) or die(mysqli_error($conectar));
$datos_autoincremento_grupo_area_cargo = mysqli_fetch_assoc($exec_autoincremento_grupo_area_cargo);
$cod_grupo_area_cargo = $datos_autoincremento_grupo_area_cargo['AUTO_INCREMENT'];

$sql_grupo_area = "SELECT cod_grupo_area FROM historia_clinica WHERE cod_historia_clinica = '$cod_historia_clinica'";
$consulta_grupo_area = mysqli_query($conectar, $sql_grupo_area) or die(mysqli_error($conectar));
$datos_grupo_area = mysqli_fetch_assoc($consulta_grupo_area);

$cod_grupo_area                    = $datos_grupo_area['cod_grupo_area'];
$clasrieg_fis1_ruid                = 'N';
$clasrieg_fis1_ilum                = 'N';
$clasrieg_fis1_noionic             = 'N';
$clasrieg_fis1_vibra               = 'N';
$clasrieg_fis1_tempextrem          = 'N';
$clasrieg_fis1_cambpres            = 'N';
$clasrieg_quim1_gasvapor           = 'N';
$clasrieg_quim1_aeroliq            = 'N';
$clasrieg_quim1_solid              = 'N';
$clasrieg_quim1_liquid             = 'N';
$clasrieg_biolog1_viru             = 'N';
$clasrieg_biolog1_bacter           = 'N';
$clasrieg_biolog1_parasi           = 'N';
$clasrieg_biolog1_morde            = 'N';
$clasrieg_biolog1_picad            = 'N';
$clasrieg_biolog1_hongo            = 'N';
$clasrieg_ergo1_trabestat          = 'N';
$clasrieg_ergo1_esfuerfis          = 'N';
$clasrieg_ergo1_carga              = 'N';
$clasrieg_ergo1_postforz           = 'N';
$clasrieg_ergo1_movrepet           = 'N';
$clasrieg_ergo1_jortrab            = 'N';
$clasrieg_psi1_monoto              = 'N';
$clasrieg_psi1_relhuman            = 'N';
$clasrieg_psi1_contentarea         = 'N';
$clasrieg_psi1_orgtiemptrab        = 'N';
$clasrieg_segur1_mecanic           = 'N';
$clasrieg_segur1_electri           = 'N';
$clasrieg_segur1_locat             = 'N';
$clasrieg_segur1_fisiquim          = 'N';
$clasrieg_segur1_public            = 'N';
$clasrieg_segur1_espconfi          = 'N';
$clasrieg_segur1_trabaltura        = 'N';
$clasrieg_observ1_otro             = 'N';
$chek_diligenciar                  = 'N';

$sql_data = "INSERT INTO grupo_area_cargo (cod_grupo_area_cargo, nombre_grupo_area_cargo, cod_grupo_area, 
clasrieg_fis1_ruid, clasrieg_fis1_ilum, clasrieg_fis1_noionic, clasrieg_fis1_vibra, clasrieg_fis1_tempextrem, clasrieg_fis1_cambpres, 
clasrieg_quim1_gasvapor, clasrieg_quim1_aeroliq, clasrieg_quim1_solid, clasrieg_quim1_liquid, clasrieg_biolog1_viru, 
clasrieg_biolog1_bacter, clasrieg_biolog1_parasi, clasrieg_biolog1_morde, clasrieg_biolog1_picad, clasrieg_biolog1_hongo, 
clasrieg_ergo1_trabestat, clasrieg_ergo1_esfuerfis, clasrieg_ergo1_carga, clasrieg_ergo1_postforz, clasrieg_ergo1_movrepet, 
clasrieg_ergo1_jortrab, clasrieg_psi1_monoto, clasrieg_psi1_relhuman, clasrieg_psi1_contentarea, clasrieg_psi1_orgtiemptrab, 
clasrieg_segur1_mecanic, clasrieg_segur1_electri, clasrieg_segur1_locat, clasrieg_segur1_fisiquim, clasrieg_segur1_public, 
clasrieg_segur1_espconfi, clasrieg_segur1_trabaltura, clasrieg_observ1_otro, chek_diligenciar) 
VALUES ('$cod_grupo_area_cargo', '$nombre_grupo_area_cargo', '$cod_grupo_area', 
'$clasrieg_fis1_ruid', '$clasrieg_fis1_ilum', '$clasrieg_fis1_noionic', '$clasrieg_fis1_vibra', '$clasrieg_fis1_tempextrem', '$clasrieg_fis1_cambpres', 
'$clasrieg_quim1_gasvapor', '$clasrieg_quim1_aeroliq', '$clasrieg_quim1_solid', '$clasrieg_quim1_liquid', '$clasrieg_biolog1_viru', 
'$clasrieg_biolog1_bacter', '$clasrieg_biolog1_parasi', '$clasrieg_biolog1_morde', '$clasrieg_biolog1_picad', '$clasrieg_biolog1_hongo', 
'$clasrieg_ergo1_trabestat', '$clasrieg_ergo1_esfuerfis', '$clasrieg_ergo1_carga', '$clasrieg_ergo1_postforz', '$clasrieg_ergo1_movrepet', 
'$clasrieg_ergo1_jortrab', '$clasrieg_psi1_monoto', '$clasrieg_psi1_relhuman', '$clasrieg_psi1_contentarea', '$clasrieg_psi1_orgtiemptrab', 
'$clasrieg_segur1_mecanic', '$clasrieg_segur1_electri', '$clasrieg_segur1_locat', '$clasrieg_segur1_fisiquim', '$clasrieg_segur1_public', 
'$clasrieg_segur1_espconfi', '$clasrieg_segur1_trabaltura', '$clasrieg_observ1_otro', '$chek_diligenciar')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$data_sql = ("UPDATE historia_clinica SET cod_grupo_area_cargo = '$cod_grupo_area_cargo', cod_grupo_area = '$cod_grupo_area' WHERE cod_historia_clinica = '$cod_historia_clinica'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
/* -------------------------------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------------- */
else {

$data_sql = ("UPDATE historia_clinica SET $campo = '$valor_intro' WHERE cod_historia_clinica = '$cod_historia_clinica'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
/* -------------------------------------------------------------------------------------------------------------- */
}
?>