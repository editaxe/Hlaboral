<?php
if (isset($_GET['valor']) && isset($_GET['id'])) {
include_once('../conexiones/conexione.php'); 
include_once('../evitar_mensaje_error/error.php');
date_default_timezone_set("America/Bogota");
include ("../session/funciones_admin.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
    } else { header("Location:../index.php");
}
$valor_intro                     = addslashes($_GET['valor']);
$campo                           = addslashes($_GET['campo']);
$cod_trabajo_altura              = intval($_GET['id']);

if ($campo=='fecha_ymd') {
$fecha_ymd                       = $valor_intro;
$fecha_time                      = strtotime($fecha_ymd);
$fecha_mes                       = date("m/Y", $fecha_time);
$fecha_anyo                      = date("Y", $fecha_time);
$fecha_dmy                       = date("d/m/Y", $fecha_time);
$fecha_reg_time                  = time();

$data_sql = ("UPDATE trabajo_altura SET fecha_ymd = '$fecha_ymd', fecha_time = '$fecha_time', fecha_mes = '$fecha_mes', 
fecha_anyo = '$fecha_anyo', fecha_dmy = '$fecha_dmy', fecha_reg_time = '$fecha_reg_time' 
WHERE cod_trabajo_altura = '$cod_trabajo_altura'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
} 
elseif ($campo=='explo_fis_peso') {

$obtener_trab_altura = "SELECT explo_fis_talla FROM trabajo_altura WHERE cod_trabajo_altura = '".($cod_trabajo_altura)."'";
$consultar_trab_altura = mysqli_query($conectar, $obtener_trab_altura) or die(mysqli_error($conectar));
$info_trab_altura= mysqli_fetch_assoc($consultar_trab_altura);

$explo_fis_peso                    = $valor_intro;
$explo_fis_talla                   = $info_trab_altura['explo_fis_talla'];
$explo_fis_imc                     = round($explo_fis_peso / pow($explo_fis_talla, 2), 2);

$data_sql = ("UPDATE trabajo_altura SET explo_fis_peso = '$explo_fis_peso', explo_fis_imc = '$explo_fis_imc' WHERE cod_trabajo_altura = '$cod_trabajo_altura'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
} 
elseif ($campo=='explo_fis_talla') {

$obtener_trab_altura = "SELECT explo_fis_peso FROM trabajo_altura WHERE cod_trabajo_altura = '".($cod_trabajo_altura)."'";
$consultar_trab_altura = mysqli_query($conectar, $obtener_trab_altura) or die(mysqli_error($conectar));
$info_trab_altura= mysqli_fetch_assoc($consultar_trab_altura);

$explo_fis_talla                   = $valor_intro;
$explo_fis_peso                    = $info_trab_altura['explo_fis_peso'];
$explo_fis_imc                     = round($explo_fis_peso / pow($explo_fis_talla, 2), 2);

$data_sql = ("UPDATE trabajo_altura SET explo_fis_talla = '$explo_fis_talla', explo_fis_imc = '$explo_fis_imc' WHERE cod_trabajo_altura = '$cod_trabajo_altura'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
} 
elseif ($campo=='cod_grupo_area_cargo') {
$obtener_grupo_area_cargo = "SELECT nombre_grupo_area_cargo FROM grupo_area_cargo WHERE cod_grupo_area_cargo = '".($valor_intro)."'";
$consultar_grupo_area_cargo = mysqli_query($conectar, $obtener_grupo_area_cargo) or die(mysqli_error($conectar));
$info_grupo_area_cargo= mysqli_fetch_assoc($consultar_grupo_area_cargo);

$cargo_empresa                  = $info_grupo_area_cargo['nombre_grupo_area_cargo'];

$data_sql = ("UPDATE trabajo_altura SET $campo = '$valor_intro', cargo_empresa = '$cargo_empresa' WHERE cod_trabajo_altura = '$cod_trabajo_altura'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
else {

$data_sql = ("UPDATE trabajo_altura SET $campo = '$valor_intro' WHERE cod_trabajo_altura = '$cod_trabajo_altura'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

}
?>