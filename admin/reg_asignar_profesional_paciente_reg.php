<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->

<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->

<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->

<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs"><a href="#">Guardando...</a> <img src="../imagenes/popup_ajax_loader.gif" class="img-polaroid" alt=""></div>

<div class="row-fluid">
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina_else = addslashes($_POST['pagina']);

if ((isset($_POST["insersion"])) && ($_POST["insersion"] == "formulario_de_insersion")) {
include("../admin/class_php/class.upload.php");
//include("../admin/class_php/class.upload.php");
/* ----------------------------------------------------------------------------------------------------------/ */
$cod_cliente                 = intval($_POST['cod_cliente']);
$cod_grupo_area_cargo        = intval($_POST['cod_grupo_area_cargo']);
$motivo                      = strtoupper(addslashes($_POST['motivo']));

$sql_grupo_area_cargo = "SELECT * FROM grupo_area_cargo WHERE cod_grupo_area_cargo = '$cod_grupo_area_cargo'";
$consulta_grupo_area_cargo = mysqli_query($conectar, $sql_grupo_area_cargo) or die(mysqli_error($conectar));
$datos_grupo_area_cargo = mysqli_fetch_assoc($consulta_grupo_area_cargo);

$cod_grupo_area                 = $datos_grupo_area_cargo['cod_grupo_area'];
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
/* ----------------------------------------------------------------------------------------------------------/ */
$sql_grupo_area = "SELECT * FROM grupo_area WHERE cod_grupo_area = '$cod_grupo_area'";
$consulta_grupo_area = mysqli_query($conectar, $sql_grupo_area) or die(mysqli_error($conectar));
$datos_grupo_area = mysqli_fetch_assoc($consulta_grupo_area);

$area_empresa = $datos_grupo_area['nombre_grupo_area'];
/* ----------------------------------------------------------------------------------------------------------/ */
$sql_cedula = "SELECT cedula FROM cliente WHERE cod_cliente = '$cod_cliente'";
$resultado_cedula = mysqli_query($conectar, $sql_cedula) or die(mysqli_error($conectar));
$data_cedula = mysqli_fetch_assoc($resultado_cedula);

$cedula = $data_cedula['cedula'];
/* ---------------------------------------------------------------------------------------------------------- */
$sql_motivo = "SELECT cod_motivo_consulta, motivo, costo_motivo_consulta FROM motivo_consulta WHERE motivo = '$motivo'";
$resultado_motivo = mysqli_query($conectar, $sql_motivo) or die(mysqli_error($conectar));
$data_motivo = mysqli_fetch_assoc($resultado_motivo);

$costo_motivo_consulta       = $data_motivo['costo_motivo_consulta'];
/* ---------------------------------------------------------------------------------------------------------- */
//trim(strip_tags(stripslashes($_POST['motivo'])));
$cod_administrador              = intval($_POST['cod_administrador']);
$cod_entidad                    = intval($_POST['cod_entidad']);
$nombre_religion                = strtoupper(addslashes($_POST['nombre_religion']));
$nombre_ocupacion               = strtoupper(addslashes($_POST['nombre_ocupacion']));
$nombre_estado_civil            = strtoupper(addslashes($_POST['nombre_estado_civil']));
$nombre_escolaridad             = strtoupper(addslashes($_POST['nombre_escolaridad']));
$nombre_empresa_contratante     = strtoupper(addslashes($_POST['nombre_empresa_contratante']));
$nombre_empresa                 = strtoupper(addslashes($_POST['nombre_empresa']));
$nombre_actividad_ecoemp        = strtoupper(addslashes($_POST['nombre_actividad_ecoemp']));
$cargo_empresa                  = $datos_grupo_area_cargo['nombre_grupo_area_cargo'];
//$area_empresa                 = stripslashes($_POST['area_empresa']);
$ciudad_empresa                 = strtoupper(addslashes($_POST['ciudad_empresa']));
$nombre_estrato                 = intval($_POST['nombre_estrato']);
$nombre_numero_hijos            = intval($_POST['nombre_numero_hijos']);
$nombre_tipo_regimen            = strtoupper(addslashes($_POST['nombre_tipo_regimen']));
$nombre_fondo_pension           = strtoupper(addslashes($_POST['nombre_fondo_pension']));
$nombre_arl                     = strtoupper(addslashes($_POST['nombre_arl']));
$nombre_contacto1               = strtoupper(addslashes($_POST['nombre_contacto1']));
$parentesco_contacto1           = strtoupper(addslashes($_POST['parentesco_contacto1']));
$tel_contacto1                  = strtoupper(addslashes($_POST['tel_contacto1']));
$direccion_contacto1            = strtoupper(addslashes($_POST['direccion_contacto1']));
$eval_estment_norm_orient       = "NORMAL";
$eval_estment_norm_atenconcent  = "NORMAL";
$eval_estment_norm_sensoper     = "NORMAL";
$eval_estment_norm_memor        = "NORMAL";
$eval_estment_norm_pensami      = "NORMAL";
$eval_estment_norm_lenguaj      = "NORMAL";

$obtener_cod_hist = "SELECT MAX(cod_historia_clinica) AS cod_historia_clinica, ant_impor_accilab, ant_impor_fecha1, ant_impor_empre1, 
ant_impor_causa1, ant_impor_tip_lesi1, ant_impor_part_afect1, ant_impor_dias_incap1, ant_impor_secuela1, ant_impor_fecha2, 
ant_impor_empre2, ant_impor_causa2, ant_impor_tip_lesi2, ant_impor_part_afect2, ant_impor_dias_incap2, ant_impor_secuela2, 
enf_lab, enf_cual, enf_hace_cuanto, enf_descripcion, 
ant_fam_no_presenta, ant_fam_hiper_pad, ant_fam_hiper_mad, ant_fam_hiper_herm, ant_fam_hiper_otro, 
ant_fam_hiper_otro_cual, ant_fam_diabet_pad, ant_fam_diabet_mad, ant_fam_diabet_herm, ant_fam_diabet_otro, 
ant_fam_diabet_otro_cual, ant_fam_trombos_pad, ant_fam_trombos_mad, ant_fam_trombos_herm, 
ant_fam_trombos_otro, ant_fam_trombos_otro_cual, ant_fam_tum_malig_pad, 
ant_fam_tum_malig_mad, ant_fam_tum_malig_herm, ant_fam_tum_malig_otro, ant_fam_tum_malig_otro_cual, 
ant_fam_enf_ment_pad, ant_fam_enf_ment_mad, ant_fam_enf_ment_herm, 
ant_fam_enf_ment_otro, ant_fam_enf_ment_otro_cual, ant_fam_cadio_pad, 
ant_fam_cadio_mad, ant_fam_cadio_herm, ant_fam_cadio_otro, ant_fam_cadio_otro_cual, 
ant_fam_trans_convul_pad, ant_fam_trans_convul_mad, ant_fam_trans_convul_herm, 
ant_fam_trans_convul_otro, ant_fam_trans_convul_otro_cual, ant_fam_enf_gene_pad, 
ant_fam_enf_gene_mad, ant_fam_enf_gene_herm, ant_fam_enf_gene_otro, ant_fam_enf_gene_otro_cual, 
ant_fam_alerg_pad, ant_fam_alerg_mad, ant_fam_alerg_herm, ant_fam_alerg_otro, ant_fam_alerg_otro_cual, 
ant_fam_tuber_pad, ant_fam_tuber_mad, ant_fam_tuber_herm, ant_fam_tuber_otro, ant_fam_tuber_otro_cual, 
ant_fam_osteomusc_pad, ant_fam_osteomusc_mad, ant_fam_osteomusc_herm, ant_fam_osteomusc_otro, ant_fam_osteomusc_otro_cual, 
ant_fam_artitri_pad, ant_fam_artitri_mad, ant_fam_artitri_herm, ant_fam_artitri_otro, ant_fam_artitri_otro_cual, 
ant_fam_varice_pad, ant_fam_varice_mad, ant_fam_varice_herm, ant_fam_varice_otro, ant_fam_varice_otro_cual, 
ant_fam_otro_pad, ant_fam_otro_mad, ant_fam_otro_herm, ant_fam_otro_otro, ant_fam_otro_otro_cual, ant_fam_descripcion, 
ant_pato_no_presenta, ant_pato_neuro, ant_pato_resp, ant_pato_derma, ant_pato_psiq, ant_pato_alerg, ant_pato_osteomusc, 
ant_pato_gastrointes, ant_pato_hematolog, ant_pato_org_sentid, ant_pato_onco, ant_pato_hiperten, ant_pato_genurinario, 
ant_pato_infesios, ant_pato_congenit, ant_pato_farmacolog, ant_pato_transfus, ant_pato_endocrino, ant_pato_vascular, 
ant_pato_auntoinmun, ant_pato_otro, ant_pato_descripcion, 
ant_altu_no, ant_altu_epilep, ant_altu_otitmed, ant_altu_enfmanier,ant_altu_traumcran, ant_altu_tumcereb, 
ant_altu_malfocereb, ant_altu_trombo, ant_altu_hipoac, ant_altu_arritcardi, ant_altu_hipogli, ant_altu_fobia, ant_altu_observ, 
ant_trau, ant_trau_enfer1, ant_trau_observ1, ant_trau_fech_aprox1, ant_trau_enfer2, ant_trau_observ2, ant_trau_fech_aprox2, 
ant_trau_enfer3, ant_trau_observ3, ant_trau_fech_aprox3, 
ant_quirur, ant_quirur_enfer1, ant_quirur_observ1, ant_quirur_fech_aprox1, ant_quirur_enfer2, ant_quirur_observ2, ant_quirur_fech_aprox2, 
ant_quirur_enfer3, ant_quirur_observ3, ant_quirur_fech_aprox3  
FROM historia_clinica WHERE cod_cliente = '$cod_cliente' AND cod_estado_facturacion = '1'";
$consultar_cod_hist = mysqli_query($conectar, $obtener_cod_hist) or die(mysqli_error($conectar));
$info_cod_hist = mysqli_fetch_assoc($consultar_cod_hist);

$ant_impor_accilab            = $info_cod_hist['ant_impor_accilab'];
$ant_impor_fecha1             = $info_cod_hist['ant_impor_fecha1'];
$ant_impor_empre1             = $info_cod_hist['ant_impor_empre1'];
$ant_impor_causa1             = $info_cod_hist['ant_impor_causa1'];
$ant_impor_tip_lesi1          = $info_cod_hist['ant_impor_tip_lesi1'];
$ant_impor_part_afect1        = $info_cod_hist['ant_impor_part_afect1'];
$ant_impor_dias_incap1        = $info_cod_hist['ant_impor_dias_incap1'];
$ant_impor_secuela1           = $info_cod_hist['ant_impor_secuela1'];
$ant_impor_fecha2             = $info_cod_hist['ant_impor_fecha2'];
$ant_impor_empre2             = $info_cod_hist['ant_impor_empre2'];
$ant_impor_causa2             = $info_cod_hist['ant_impor_causa2'];
$ant_impor_tip_lesi2          = $info_cod_hist['ant_impor_tip_lesi2'];
$ant_impor_part_afect2        = $info_cod_hist['ant_impor_part_afect2'];
$ant_impor_dias_incap2        = $info_cod_hist['ant_impor_dias_incap2'];
$ant_impor_secuela2           = $info_cod_hist['ant_impor_secuela2'];
$ant_impor_accilab            = $info_cod_hist['ant_impor_accilab'];
$ant_impor_fecha1             = $info_cod_hist['ant_impor_fecha1'];
$ant_impor_empre1             = $info_cod_hist['ant_impor_empre1'];
$ant_impor_causa1             = $info_cod_hist['ant_impor_causa1'];
$ant_impor_tip_lesi1          = $info_cod_hist['ant_impor_tip_lesi1'];
$ant_impor_part_afect1        = $info_cod_hist['ant_impor_part_afect1'];
$ant_impor_dias_incap1        = $info_cod_hist['ant_impor_dias_incap1'];
$ant_impor_secuela1           = $info_cod_hist['ant_impor_secuela1'];
$ant_impor_fecha2             = $info_cod_hist['ant_impor_fecha2'];
$ant_impor_empre2             = $info_cod_hist['ant_impor_empre2'];
$ant_impor_causa2             = $info_cod_hist['ant_impor_causa2'];
$ant_impor_tip_lesi2          = $info_cod_hist['ant_impor_tip_lesi2'];
$ant_impor_part_afect2        = $info_cod_hist['ant_impor_part_afect2'];
$ant_impor_dias_incap2        = $info_cod_hist['ant_impor_dias_incap2'];
$ant_impor_secuela2           = $info_cod_hist['ant_impor_secuela2'];
$enf_lab                      = $info_cod_hist['enf_lab'];
$enf_cual                     = $info_cod_hist['enf_cual'];
$enf_hace_cuanto              = $info_cod_hist['enf_hace_cuanto'];
$enf_descripcion              = $info_cod_hist['enf_descripcion'];
$ant_fam_no_presenta          = $info_cod_hist['ant_fam_no_presenta'];
$ant_fam_hiper_pad            = $info_cod_hist['ant_fam_hiper_pad'];
$ant_fam_hiper_mad            = $info_cod_hist['ant_fam_hiper_mad'];
$ant_fam_hiper_herm           = $info_cod_hist['ant_fam_hiper_herm'];
$ant_fam_hiper_otro           = $info_cod_hist['ant_fam_hiper_otro'];
$ant_fam_hiper_otro_cual      = $info_cod_hist['ant_fam_hiper_otro_cual'];
$ant_fam_diabet_pad           = $info_cod_hist['ant_fam_diabet_pad'];
$ant_fam_diabet_mad           = $info_cod_hist['ant_fam_diabet_mad'];
$ant_fam_diabet_herm          = $info_cod_hist['ant_fam_diabet_herm'];
$ant_fam_diabet_otro          = $info_cod_hist['ant_fam_diabet_otro'];
$ant_fam_diabet_otro_cual     = $info_cod_hist['ant_fam_diabet_otro_cual'];
$ant_fam_trombos_pad          = $info_cod_hist['ant_fam_trombos_pad'];
$ant_fam_trombos_mad          = $info_cod_hist['ant_fam_trombos_mad'];
$ant_fam_trombos_herm         = $info_cod_hist['ant_fam_trombos_herm'];
$ant_fam_trombos_otro         = $info_cod_hist['ant_fam_trombos_otro'];
$ant_fam_trombos_otro_cual    = $info_cod_hist['ant_fam_trombos_otro_cual'];
$ant_fam_tum_malig_pad        = $info_cod_hist['ant_fam_tum_malig_pad'];
$ant_fam_tum_malig_mad        = $info_cod_hist['ant_fam_tum_malig_mad'];
$ant_fam_tum_malig_herm       = $info_cod_hist['ant_fam_tum_malig_herm'];
$ant_fam_tum_malig_otro       = $info_cod_hist['ant_fam_tum_malig_otro'];
$ant_fam_tum_malig_otro_cual  = $info_cod_hist['ant_fam_tum_malig_otro_cual'];
$ant_fam_enf_ment_pad         = $info_cod_hist['ant_fam_enf_ment_pad'];
$ant_fam_enf_ment_mad         = $info_cod_hist['ant_fam_enf_ment_mad'];
$ant_fam_enf_ment_herm        = $info_cod_hist['ant_fam_enf_ment_herm'];
$ant_fam_enf_ment_otro        = $info_cod_hist['ant_fam_enf_ment_otro'];
$ant_fam_enf_ment_otro_cual   = $info_cod_hist['ant_fam_enf_ment_otro_cual'];
$ant_fam_cadio_pad            = $info_cod_hist['ant_fam_cadio_pad'];
$ant_fam_cadio_mad            = $info_cod_hist['ant_fam_cadio_mad'];
$ant_fam_cadio_herm           = $info_cod_hist['ant_fam_cadio_herm'];
$ant_fam_cadio_otro           = $info_cod_hist['ant_fam_cadio_otro'];
$ant_fam_cadio_otro_cual      = $info_cod_hist['ant_fam_cadio_otro_cual'];
$ant_fam_trans_convul_pad     = $info_cod_hist['ant_fam_trans_convul_pad'];
$ant_fam_trans_convul_mad     = $info_cod_hist['ant_fam_trans_convul_mad'];
$ant_fam_trans_convul_herm    = $info_cod_hist['ant_fam_trans_convul_herm'];
$ant_fam_trans_convul_otro    = $info_cod_hist['ant_fam_trans_convul_otro'];
$ant_fam_trans_convul_otro_cual = $info_cod_hist['ant_fam_trans_convul_otro_cual'];
$ant_fam_enf_gene_pad         = $info_cod_hist['ant_fam_enf_gene_pad'];
$ant_fam_enf_gene_mad         = $info_cod_hist['ant_fam_enf_gene_mad'];
$ant_fam_enf_gene_herm        = $info_cod_hist['ant_fam_enf_gene_herm'];
$ant_fam_enf_gene_otro        = $info_cod_hist['ant_fam_enf_gene_otro'];
$ant_fam_enf_gene_otro_cual   = $info_cod_hist['ant_fam_enf_gene_otro_cual'];
$ant_fam_alerg_pad            = $info_cod_hist['ant_fam_alerg_pad'];
$ant_fam_alerg_mad            = $info_cod_hist['ant_fam_alerg_mad'];
$ant_fam_alerg_herm           = $info_cod_hist['ant_fam_alerg_herm'];
$ant_fam_alerg_otro           = $info_cod_hist['ant_fam_alerg_otro'];
$ant_fam_alerg_otro_cual      = $info_cod_hist['ant_fam_alerg_otro_cual'];
$ant_fam_tuber_pad            = $info_cod_hist['ant_fam_tuber_pad'];
$ant_fam_tuber_mad            = $info_cod_hist['ant_fam_tuber_mad'];
$ant_fam_tuber_herm           = $info_cod_hist['ant_fam_tuber_herm'];
$ant_fam_tuber_otro           = $info_cod_hist['ant_fam_tuber_otro'];
$ant_fam_tuber_otro_cual      = $info_cod_hist['ant_fam_tuber_otro_cual'];
$ant_fam_osteomusc_pad        = $info_cod_hist['ant_fam_osteomusc_pad'];
$ant_fam_osteomusc_mad        = $info_cod_hist['ant_fam_osteomusc_mad'];
$ant_fam_osteomusc_herm       = $info_cod_hist['ant_fam_osteomusc_herm'];
$ant_fam_osteomusc_otro       = $info_cod_hist['ant_fam_osteomusc_otro'];
$ant_fam_osteomusc_otro_cual  = $info_cod_hist['ant_fam_osteomusc_otro_cual'];
$ant_fam_artitri_pad          = $info_cod_hist['ant_fam_artitri_pad'];
$ant_fam_artitri_mad          = $info_cod_hist['ant_fam_artitri_mad'];
$ant_fam_artitri_herm         = $info_cod_hist['ant_fam_artitri_herm'];
$ant_fam_artitri_otro         = $info_cod_hist['ant_fam_artitri_otro'];
$ant_fam_artitri_otro_cual    = $info_cod_hist['ant_fam_artitri_otro_cual'];
$ant_fam_varice_pad           = $info_cod_hist['ant_fam_varice_pad'];
$ant_fam_varice_mad           = $info_cod_hist['ant_fam_varice_mad'];
$ant_fam_varice_herm          = $info_cod_hist['ant_fam_varice_herm'];
$ant_fam_varice_otro          = $info_cod_hist['ant_fam_varice_otro'];
$ant_fam_varice_otro_cual     = $info_cod_hist['ant_fam_varice_otro_cual'];
$ant_fam_otro_pad             = $info_cod_hist['ant_fam_otro_pad'];
$ant_fam_otro_mad             = $info_cod_hist['ant_fam_otro_mad'];
$ant_fam_otro_herm            = $info_cod_hist['ant_fam_otro_herm'];
$ant_fam_otro_otro            = $info_cod_hist['ant_fam_otro_otro'];
$ant_fam_otro_otro_cual       = $info_cod_hist['ant_fam_otro_otro_cual'];
$ant_fam_descripcion          = $info_cod_hist['ant_fam_descripcion'];
$ant_pato_no_presenta         = $info_cod_hist['ant_pato_no_presenta'];
$ant_pato_neuro               = $info_cod_hist['ant_pato_neuro'];
$ant_pato_resp                = $info_cod_hist['ant_pato_resp'];
$ant_pato_derma               = $info_cod_hist['ant_pato_derma'];
$ant_pato_psiq                = $info_cod_hist['ant_pato_psiq'];
$ant_pato_alerg               = $info_cod_hist['ant_pato_alerg'];
$ant_pato_osteomusc           = $info_cod_hist['ant_pato_osteomusc'];
$ant_pato_gastrointes         = $info_cod_hist['ant_pato_gastrointes'];
$ant_pato_hematolog           = $info_cod_hist['ant_pato_hematolog'];
$ant_pato_org_sentid          = $info_cod_hist['ant_pato_org_sentid'];
$ant_pato_onco                = $info_cod_hist['ant_pato_onco'];
$ant_pato_hiperten            = $info_cod_hist['ant_pato_hiperten'];
$ant_pato_genurinario         = $info_cod_hist['ant_pato_genurinario'];
$ant_pato_infesios            = $info_cod_hist['ant_pato_infesios'];
$ant_pato_congenit            = $info_cod_hist['ant_pato_congenit'];
$ant_pato_farmacolog          = $info_cod_hist['ant_pato_farmacolog'];
$ant_pato_transfus            = $info_cod_hist['ant_pato_transfus'];
$ant_pato_endocrino           = $info_cod_hist['ant_pato_endocrino'];
$ant_pato_vascular            = $info_cod_hist['ant_pato_vascular'];
$ant_pato_auntoinmun          = $info_cod_hist['ant_pato_auntoinmun'];
$ant_pato_otro                = $info_cod_hist['ant_pato_otro'];
$ant_pato_descripcion         = $info_cod_hist['ant_pato_descripcion'];
$ant_altu_no                  = $info_cod_hist['ant_altu_no'];
$ant_altu_epilep              = $info_cod_hist['ant_altu_epilep'];
$ant_altu_otitmed             = $info_cod_hist['ant_altu_otitmed'];
$ant_altu_enfmanier           = $info_cod_hist['ant_altu_enfmanier'];
$ant_altu_traumcran           = $info_cod_hist['ant_altu_traumcran'];
$ant_altu_tumcereb            = $info_cod_hist['ant_altu_tumcereb'];
$ant_altu_malfocereb          = $info_cod_hist['ant_altu_malfocereb'];
$ant_altu_trombo              = $info_cod_hist['ant_altu_trombo'];
$ant_altu_hipoac              = $info_cod_hist['ant_altu_hipoac'];
$ant_altu_arritcardi          = $info_cod_hist['ant_altu_arritcardi'];
$ant_altu_hipogli             = $info_cod_hist['ant_altu_hipogli'];
$ant_altu_fobia               = $info_cod_hist['ant_altu_fobia'];
$ant_altu_observ              = $info_cod_hist['ant_altu_observ'];
$ant_trau                     = $info_cod_hist['ant_trau'];
$ant_trau_enfer1              = $info_cod_hist['ant_trau_enfer1'];
$ant_trau_observ1             = $info_cod_hist['ant_trau_observ1'];
$ant_trau_fech_aprox1         = $info_cod_hist['ant_trau_fech_aprox1'];
$ant_trau_enfer2              = $info_cod_hist['ant_trau_enfer2'];
$ant_trau_observ2             = $info_cod_hist['ant_trau_observ2'];
$ant_trau_fech_aprox2         = $info_cod_hist['ant_trau_fech_aprox2'];
$ant_trau_enfer3              = $info_cod_hist['ant_trau_enfer3'];
$ant_trau_observ3             = $info_cod_hist['ant_trau_observ3'];
$ant_trau_fech_aprox3         = $info_cod_hist['ant_trau_fech_aprox3'];
$ant_quirur                   = $info_cod_hist['ant_quirur'];
$ant_quirur_enfer1            = $info_cod_hist['ant_quirur_enfer1'];
$ant_quirur_observ1           = $info_cod_hist['ant_quirur_observ1'];
$ant_quirur_fech_aprox1       = $info_cod_hist['ant_quirur_fech_aprox1'];
$ant_quirur_enfer2            = $info_cod_hist['ant_quirur_enfer2'];
$ant_quirur_observ2           = $info_cod_hist['ant_quirur_observ2'];
$ant_quirur_fech_aprox2       = $info_cod_hist['ant_quirur_fech_aprox2'];
$ant_quirur_enfer3            = $info_cod_hist['ant_quirur_enfer3'];
$ant_quirur_observ3           = $info_cod_hist['ant_quirur_observ3'];
$ant_quirur_fech_aprox3       = $info_cod_hist['ant_quirur_fech_aprox3'];

$fecha_ymd_hora              = addslashes($_POST['fecha_ymd_hora']);
$formato                     = 'jpg';
$time                        = time();
$fecha_ymdHis                = date("YmdHis");
$fecha_time                  = strtotime($fecha_ymd_hora);
$fecha_ymd                   = date("Y/m/d", $fecha_time);
$fecha_dmy                   = date("d/m/Y", $fecha_time);
$fecha_mes                   = date("m/Y", $fecha_time);
$fecha_anyo                  = date("Y", $fecha_time);
$hora                        = date("H:i", $fecha_time);
$fecha_reg_time              = time();
$cuenta                      = $cuenta_actual;
/* ----------------------------------------------------------------------------------------------------------/ */
$ruta_firma_miniatura        = '../archivador/firma/miniatura/';
$ruta_foto_miniatura         = '../archivador/foto/miniatura/';
$ruta_firma_orig             = '../archivador/firma/original/';
$ruta_foto_orig              = '../archivador/foto/original/';
/* ----------------------------------------------------------------------------------------------------------/ */
$url_img_firma               = $_FILES['url_img_firma']['name'];
$formato_img1                = explode(".", $url_img_firma);
$formato_img1                = end($formato_img1);
$formato_orig1               = strtolower($formato_img1);
$nombre_firma_cryp           = crc32($url_img_firma);
$nombre_normal1              = $fecha_ymdHis.'_'.$cod_cliente.'_'.$nombre_firma_cryp.'_'.$cedula.'_ori'.'.'.$formato_orig1;
$url_img_firma_orig          = $ruta_firma_orig.$nombre_normal1;
/* ----------------------------------------------------------------------------------------------------------/ */
//$url_img_foto                = $_FILES['url_img_foto']['name'];
if (isset($_POST['url_img_foto']) <> '') { $url_img_foto = addslashes($_POST['url_img_foto']); } else { $url_img_foto = ''; }
$formato_img2                = explode(".", $url_img_foto);
$formato_img2                = end($formato_img2);
$formato_orig2               = strtolower($formato_img2);
$nombre_foto_cryp            = crc32($url_img_foto);
$nombre_normal2              = $fecha_ymdHis.'_'.$cod_cliente.'_'.$nombre_foto_cryp.'_'.$cedula.'_ori'.'.'.$formato_orig2;
$url_img_foto_orig           = $ruta_foto_orig.$nombre_normal2;
/* ----------------------------------------------------------------------------------------------------------/ */
if ($url_img_firma <> '') { copy($_FILES['url_img_firma']['tmp_name'], $url_img_firma_orig); }
//if ($url_img_foto <> '') { copy($_FILES['url_img_foto']['tmp_name'], $url_img_foto_orig); }
/* ----------------------------------------------------------------------------------------------------------/ */
$sql_autoincremento_historia_clinica = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'historia_clinica'";
$exec_autoincremento_historia_clinica = mysqli_query($conectar, $sql_autoincremento_historia_clinica) or die(mysqli_error($conectar));
$datos_autoincremento_historia_clinica = mysqli_fetch_assoc($exec_autoincremento_historia_clinica);
$cod_historia_clinica = $datos_autoincremento_historia_clinica['AUTO_INCREMENT'];
/* ----------------------------------------------------------------------------------------------------------/ */
$sql_admin = "SELECT cod_tipo_historia_clinica FROM administrador WHERE cod_administrador = '$cod_administrador'";
$resultado_admin = mysqli_query($conectar, $sql_admin) or die(mysqli_error($conectar));
$data_admin = mysqli_fetch_assoc($resultado_admin);
$cod_tipo_historia_clinica = $data_admin['cod_tipo_historia_clinica'];
/* ----------------------------------------------------------------------------------------------------------/ */
/* ----------------------------------------------------------------------------------------------------------/ */
$sql_data = "INSERT INTO historia_clinica (cod_cliente, cod_administrador, cod_tipo_historia_clinica, motivo, url_img_firma_orig, 
url_img_foto_orig, cod_entidad, nombre_religion, nombre_ocupacion, nombre_estado_civil, nombre_escolaridad, 
nombre_empresa_contratante, nombre_empresa, nombre_actividad_ecoemp, cargo_empresa, 
area_empresa, ciudad_empresa, nombre_estrato, nombre_numero_hijos, nombre_tipo_regimen, 
nombre_fondo_pension, nombre_arl, nombre_contacto1, parentesco_contacto1, tel_contacto1, direccion_contacto1,
cod_grupo_area_cargo, cod_grupo_area, 
ant_impor_accilab, ant_impor_fecha1, ant_impor_empre1, ant_impor_causa1, ant_impor_tip_lesi1, ant_impor_part_afect1, 
ant_impor_dias_incap1, ant_impor_secuela1, ant_impor_fecha2, ant_impor_empre2, ant_impor_causa2, ant_impor_tip_lesi2, 
ant_impor_part_afect2, ant_impor_dias_incap2, ant_impor_secuela2, 
enf_lab, enf_cual, enf_hace_cuanto, enf_descripcion, 
ant_fam_no_presenta, ant_fam_hiper_pad, ant_fam_hiper_mad, ant_fam_hiper_herm, ant_fam_hiper_otro, 
ant_fam_hiper_otro_cual, ant_fam_diabet_pad, ant_fam_diabet_mad, ant_fam_diabet_herm, ant_fam_diabet_otro, 
ant_fam_diabet_otro_cual, ant_fam_trombos_pad, ant_fam_trombos_mad, ant_fam_trombos_herm, 
ant_fam_trombos_otro, ant_fam_trombos_otro_cual, ant_fam_tum_malig_pad, 
ant_fam_tum_malig_mad, ant_fam_tum_malig_herm, ant_fam_tum_malig_otro, ant_fam_tum_malig_otro_cual, 
ant_fam_enf_ment_pad, ant_fam_enf_ment_mad, ant_fam_enf_ment_herm, 
ant_fam_enf_ment_otro, ant_fam_enf_ment_otro_cual, ant_fam_cadio_pad, 
ant_fam_cadio_mad, ant_fam_cadio_herm, ant_fam_cadio_otro, ant_fam_cadio_otro_cual, 
ant_fam_trans_convul_pad, ant_fam_trans_convul_mad, ant_fam_trans_convul_herm, 
ant_fam_trans_convul_otro, ant_fam_trans_convul_otro_cual, ant_fam_enf_gene_pad, 
ant_fam_enf_gene_mad, ant_fam_enf_gene_herm, ant_fam_enf_gene_otro, ant_fam_enf_gene_otro_cual, 
ant_fam_alerg_pad, ant_fam_alerg_mad, ant_fam_alerg_herm, ant_fam_alerg_otro, ant_fam_alerg_otro_cual, 
ant_fam_tuber_pad, ant_fam_tuber_mad, ant_fam_tuber_herm, ant_fam_tuber_otro, ant_fam_tuber_otro_cual, 
ant_fam_osteomusc_pad, ant_fam_osteomusc_mad, ant_fam_osteomusc_herm, ant_fam_osteomusc_otro, ant_fam_osteomusc_otro_cual, 
ant_fam_artitri_pad, ant_fam_artitri_mad, ant_fam_artitri_herm, ant_fam_artitri_otro, ant_fam_artitri_otro_cual, 
ant_fam_varice_pad, ant_fam_varice_mad, ant_fam_varice_herm, ant_fam_varice_otro, ant_fam_varice_otro_cual, 
ant_fam_otro_pad, ant_fam_otro_mad, ant_fam_otro_herm, ant_fam_otro_otro, ant_fam_otro_otro_cual, ant_fam_descripcion, 
ant_pato_no_presenta, ant_pato_neuro, ant_pato_resp, ant_pato_derma, ant_pato_psiq, ant_pato_alerg, ant_pato_osteomusc, 
ant_pato_gastrointes, ant_pato_hematolog, ant_pato_org_sentid, ant_pato_onco, ant_pato_hiperten, ant_pato_genurinario, 
ant_pato_infesios, ant_pato_congenit, ant_pato_farmacolog, ant_pato_transfus, ant_pato_endocrino, ant_pato_vascular, 
ant_pato_auntoinmun, ant_pato_otro, ant_pato_descripcion, 
ant_trau, ant_trau_enfer1, ant_trau_observ1, ant_trau_fech_aprox1, ant_trau_enfer2, ant_trau_observ2, ant_trau_fech_aprox2, 
ant_trau_enfer3, ant_trau_observ3, ant_trau_fech_aprox3, 
eval_estment_norm_orient, eval_estment_norm_atenconcent, eval_estment_norm_sensoper, 
eval_estment_norm_memor, eval_estment_norm_pensami, eval_estment_norm_lenguaj,
ant_quirur, ant_quirur_enfer1, ant_quirur_observ1, ant_quirur_fech_aprox1, ant_quirur_enfer2, ant_quirur_observ2, ant_quirur_fech_aprox2, 
ant_quirur_enfer3, ant_quirur_observ3, ant_quirur_fech_aprox3, costo_motivo_consulta,
clasrieg_fis1_ruid, clasrieg_fis1_ilum, clasrieg_fis1_noionic, clasrieg_fis1_vibra, 
clasrieg_fis1_tempextrem, clasrieg_fis1_cambpres, clasrieg_quim1_gasvapor, clasrieg_quim1_aeroliq, 
clasrieg_quim1_solid, clasrieg_quim1_liquid, clasrieg_biolog1_viru, clasrieg_biolog1_bacter, 
clasrieg_biolog1_parasi, clasrieg_biolog1_morde, clasrieg_biolog1_picad, clasrieg_biolog1_hongo, 
clasrieg_ergo1_trabestat, clasrieg_ergo1_esfuerfis, clasrieg_ergo1_carga, clasrieg_ergo1_postforz, 
clasrieg_ergo1_movrepet, clasrieg_ergo1_jortrab, clasrieg_psi1_monoto, clasrieg_psi1_relhuman, 
clasrieg_psi1_contentarea, clasrieg_psi1_orgtiemptrab, clasrieg_segur1_mecanic, clasrieg_segur1_electri, 
clasrieg_segur1_locat, clasrieg_segur1_fisiquim, clasrieg_segur1_public, clasrieg_segur1_espconfi, 
clasrieg_segur1_trabaltura, clasrieg_observ1_otro, 
fecha_ymd, fecha_dmy, fecha_mes, fecha_anyo, fecha_time, hora, fecha_reg_time, cuenta) 
VALUES ('$cod_cliente', '$cod_administrador', '$cod_tipo_historia_clinica', '$motivo', '$url_img_firma_orig', 
'$url_img_foto_orig', '$cod_entidad', '$nombre_religion', '$nombre_ocupacion', '$nombre_estado_civil', '$nombre_escolaridad', 
'$nombre_empresa_contratante', '$nombre_empresa', '$nombre_actividad_ecoemp', '$cargo_empresa', 
'$area_empresa', '$ciudad_empresa', '$nombre_estrato', '$nombre_numero_hijos', '$nombre_tipo_regimen', 
'$nombre_fondo_pension', '$nombre_arl', '$nombre_contacto1', '$parentesco_contacto1', '$tel_contacto1', '$direccion_contacto1',
'$cod_grupo_area_cargo', '$cod_grupo_area', 
'$ant_impor_accilab', '$ant_impor_fecha1', '$ant_impor_empre1', '$ant_impor_causa1', '$ant_impor_tip_lesi1', '$ant_impor_part_afect1', 
'$ant_impor_dias_incap1', '$ant_impor_secuela1', '$ant_impor_fecha2', '$ant_impor_empre2', '$ant_impor_causa2', '$ant_impor_tip_lesi2', 
'$ant_impor_part_afect2', '$ant_impor_dias_incap2', '$ant_impor_secuela2', 
'$enf_lab', '$enf_cual', '$enf_hace_cuanto', '$enf_descripcion', 
'$ant_fam_no_presenta', '$ant_fam_hiper_pad', '$ant_fam_hiper_mad', '$ant_fam_hiper_herm', '$ant_fam_hiper_otro', 
'$ant_fam_hiper_otro_cual', '$ant_fam_diabet_pad', '$ant_fam_diabet_mad', '$ant_fam_diabet_herm', '$ant_fam_diabet_otro', 
'$ant_fam_diabet_otro_cual', '$ant_fam_trombos_pad', '$ant_fam_trombos_mad', '$ant_fam_trombos_herm', 
'$ant_fam_trombos_otro', '$ant_fam_trombos_otro_cual', '$ant_fam_tum_malig_pad', 
'$ant_fam_tum_malig_mad', '$ant_fam_tum_malig_herm', '$ant_fam_tum_malig_otro', '$ant_fam_tum_malig_otro_cual', 
'$ant_fam_enf_ment_pad', '$ant_fam_enf_ment_mad', '$ant_fam_enf_ment_herm', 
'$ant_fam_enf_ment_otro', '$ant_fam_enf_ment_otro_cual', '$ant_fam_cadio_pad', 
'$ant_fam_cadio_mad', '$ant_fam_cadio_herm', '$ant_fam_cadio_otro', '$ant_fam_cadio_otro_cual', 
'$ant_fam_trans_convul_pad', '$ant_fam_trans_convul_mad', '$ant_fam_trans_convul_herm', 
'$ant_fam_trans_convul_otro', '$ant_fam_trans_convul_otro_cual', '$ant_fam_enf_gene_pad', 
'$ant_fam_enf_gene_mad', '$ant_fam_enf_gene_herm', '$ant_fam_enf_gene_otro', '$ant_fam_enf_gene_otro_cual', 
'$ant_fam_alerg_pad', '$ant_fam_alerg_mad', '$ant_fam_alerg_herm', '$ant_fam_alerg_otro', '$ant_fam_alerg_otro_cual', 
'$ant_fam_tuber_pad', '$ant_fam_tuber_mad', '$ant_fam_tuber_herm', '$ant_fam_tuber_otro', '$ant_fam_tuber_otro_cual', 
'$ant_fam_osteomusc_pad', '$ant_fam_osteomusc_mad', '$ant_fam_osteomusc_herm', '$ant_fam_osteomusc_otro', '$ant_fam_osteomusc_otro_cual', 
'$ant_fam_artitri_pad', '$ant_fam_artitri_mad', '$ant_fam_artitri_herm', '$ant_fam_artitri_otro', '$ant_fam_artitri_otro_cual', 
'$ant_fam_varice_pad', '$ant_fam_varice_mad', '$ant_fam_varice_herm', '$ant_fam_varice_otro', '$ant_fam_varice_otro_cual', 
'$ant_fam_otro_pad', '$ant_fam_otro_mad', '$ant_fam_otro_herm', '$ant_fam_otro_otro', '$ant_fam_otro_otro_cual', '$ant_fam_descripcion', 
'$ant_pato_no_presenta', '$ant_pato_neuro', '$ant_pato_resp', '$ant_pato_derma', '$ant_pato_psiq', '$ant_pato_alerg', '$ant_pato_osteomusc', 
'$ant_pato_gastrointes', '$ant_pato_hematolog', '$ant_pato_org_sentid', '$ant_pato_onco', '$ant_pato_hiperten', '$ant_pato_genurinario', 
'$ant_pato_infesios', '$ant_pato_congenit', '$ant_pato_farmacolog', '$ant_pato_transfus', '$ant_pato_endocrino', '$ant_pato_vascular', 
'$ant_pato_auntoinmun', '$ant_pato_otro', '$ant_pato_descripcion', 
'$ant_trau', '$ant_trau_enfer1', '$ant_trau_observ1', '$ant_trau_fech_aprox1', '$ant_trau_enfer2', '$ant_trau_observ2', '$ant_trau_fech_aprox2', 
'$ant_trau_enfer3', '$ant_trau_observ3', '$ant_trau_fech_aprox3', 
'$eval_estment_norm_orient', '$eval_estment_norm_atenconcent', '$eval_estment_norm_sensoper', 
'$eval_estment_norm_memor', '$eval_estment_norm_pensami', '$eval_estment_norm_lenguaj',
'$ant_quirur', '$ant_quirur_enfer1', '$ant_quirur_observ1', '$ant_quirur_fech_aprox1', '$ant_quirur_enfer2', '$ant_quirur_observ2', '$ant_quirur_fech_aprox2', 
'$ant_quirur_enfer3', '$ant_quirur_observ3', '$ant_quirur_fech_aprox3', '$costo_motivo_consulta',
'$clasrieg_fis1_ruid', '$clasrieg_fis1_ilum', '$clasrieg_fis1_noionic', '$clasrieg_fis1_vibra', 
'$clasrieg_fis1_tempextrem', '$clasrieg_fis1_cambpres', '$clasrieg_quim1_gasvapor', '$clasrieg_quim1_aeroliq', 
'$clasrieg_quim1_solid', '$clasrieg_quim1_liquid', '$clasrieg_biolog1_viru', '$clasrieg_biolog1_bacter', 
'$clasrieg_biolog1_parasi', '$clasrieg_biolog1_morde', '$clasrieg_biolog1_picad', '$clasrieg_biolog1_hongo', 
'$clasrieg_ergo1_trabestat', '$clasrieg_ergo1_esfuerfis', '$clasrieg_ergo1_carga', '$clasrieg_ergo1_postforz', 
'$clasrieg_ergo1_movrepet', '$clasrieg_ergo1_jortrab', '$clasrieg_psi1_monoto', '$clasrieg_psi1_relhuman', 
'$clasrieg_psi1_contentarea', '$clasrieg_psi1_orgtiemptrab', '$clasrieg_segur1_mecanic', '$clasrieg_segur1_electri', 
'$clasrieg_segur1_locat', '$clasrieg_segur1_fisiquim', '$clasrieg_segur1_public', '$clasrieg_segur1_espconfi', 
'$clasrieg_segur1_trabaltura', '$clasrieg_observ1_otro', 
'$fecha_ymd', '$fecha_dmy', '$fecha_mes', '$fecha_anyo', '$fecha_time', '$hora', '$fecha_reg_time', '$cuenta')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
/* ----------------------------------------------------------------------------------------------------------/ */
$sql_data = "UPDATE cliente SET cod_entidad = '$cod_entidad', nombre_religion = '$nombre_religion', 
nombre_ocupacion = '$nombre_ocupacion', nombre_estado_civil = '$nombre_estado_civil', 
nombre_escolaridad = '$nombre_escolaridad', nombre_empresa_contratante = '$nombre_empresa_contratante', 
nombre_empresa = '$nombre_empresa', nombre_actividad_ecoemp = '$nombre_actividad_ecoemp', 
cargo_empresa = '$cargo_empresa', area_empresa = '$area_empresa', ciudad_empresa = '$ciudad_empresa', 
nombre_estrato = '$nombre_estrato', nombre_numero_hijos = '$nombre_numero_hijos', 
nombre_tipo_regimen = '$nombre_tipo_regimen', nombre_fondo_pension = '$nombre_fondo_pension', 
nombre_arl = '$nombre_arl', nombre_contacto1 = '$nombre_contacto1', parentesco_contacto1 = '$parentesco_contacto1', 
tel_contacto1 = '$tel_contacto1', direccion_contacto1 = '$direccion_contacto1' WHERE cod_cliente = '$cod_cliente'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
/* ----------------------------------------------------------------------------------------------------------/ */
/* ----------------------------------------------------------------------------------------------------------/ */
$imagen_firma_miniatura                             = new upload($_FILES['url_img_firma']);
if ($imagen_firma_miniatura->uploaded) {
$imagen_firma_miniatura->image_resize         		= true; // default is true
$imagen_firma_miniatura->image_convert              = $formato;
$imagen_firma_miniatura->image_x              		= 200; // para el ancho a cortar
$imagen_firma_miniatura->image_ratio_y        		= true; // para que se ajuste dependiendo del ancho definido
$imagen_firma_miniatura->file_new_name_body   		= $fecha_ymdHis.'_'.$cod_cliente.'_'.$nombre_firma_cryp.'_'.$cedula.'_min'; // agregamos un nuevo nombre
$imagen_firma_miniatura->process($ruta_firma_miniatura);

$nombre_miniatura = $fecha_ymdHis.'_'.$cod_cliente.'_'.$nombre_firma_cryp.'_'.$cedula.'_min'.'.'.$formato;
$url_img_firma_min = $ruta_firma_miniatura.$nombre_miniatura;

$sql_data = "UPDATE historia_clinica SET url_img_firma_min = '$url_img_firma_min' WHERE cod_historia_clinica = '$cod_historia_clinica'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
//echo 'La imagen_firma_miniatura ha sido subida';
} else { echo 'error : ' . $imagen_firma_miniatura->error; }
/* ----------------------------------------------------------------------------------------------------------/ */
/* ----------------------------------------------------------------------------------------------------------/ */
$imagen_foto_miniatura                              = new upload($url_img_foto);
//$imagen_foto_miniatura                              = new upload($_FILES['url_img_foto']);
if ($imagen_foto_miniatura->uploaded) {
$imagen_foto_miniatura->image_resize         		= true; // default is true
$imagen_foto_miniatura->image_convert               = $formato;
$imagen_foto_miniatura->image_x              		= 200; // para el ancho a cortar
$imagen_foto_miniatura->image_ratio_y        		= true; // para que se ajuste dependiendo del ancho definido
$imagen_foto_miniatura->file_new_name_body   		= $fecha_ymdHis.'_'.$cod_cliente.'_'.$nombre_foto_cryp.'_'.$cedula.'_min'; // agregamos un nuevo nombre
$imagen_foto_miniatura->process($ruta_foto_miniatura);

$nombre_miniatura = $fecha_ymdHis.'_'.$cod_cliente.'_'.$nombre_foto_cryp.'_'.$cedula.'_min'.'.'.$formato;
$url_img_foto_min = $ruta_foto_miniatura.$nombre_miniatura;

$sql_data = "UPDATE historia_clinica SET url_img_foto_min = '$url_img_foto_min' WHERE cod_historia_clinica = '$cod_historia_clinica'";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
//echo 'La imagen_foto_miniatura ha sido subida';
} else { echo 'error : ' . $imagen_foto_miniatura->error; }
/* ----------------------------------------------------------------------------------------------------------/ */
/* ----------------------------------------------------------------------------------------------------------/ */
if ($url_img_foto <> '') {
rename ($url_img_foto, $url_img_foto_orig);

$actualizar_foto_cliente = "UPDATE cliente SET url_img_foto = '$url_img_foto_orig', url_img_foto_min = '$url_img_foto_min' WHERE cod_cliente = '$cod_cliente'";
$resultado_foto_cliente = mysqli_query($conectar, $actualizar_foto_cliente) or die(mysqli_error($conectar));
}
/* ----------------------------------------------------------------------------------------------------------/ */
/* ----------------------------------------------------------------------------------------------------------/ */
if ($url_img_firma <> '') {
$actualizar_foto_cliente = "UPDATE cliente SET url_img_firma = '$url_img_firma_orig', url_img_firma_min = '$url_img_firma_min' WHERE cod_cliente = '$cod_cliente'";
$resultado_foto_cliente = mysqli_query($conectar, $actualizar_foto_cliente) or die(mysqli_error($conectar));
}
?>
<h3>Se ha guardado correctamente la información</h3>
<META HTTP-EQUIV="REFRESH" CONTENT="3; ../admin/lista_paciente.php">
<?php } else { ?>
<META HTTP-EQUIV="REFRESH" CONTENT="3; <?php echo $pagina_else?>">
<?php } ?>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
</div>
</div>
<div id="footerInnerSeparator"></div>
</div>
</div>
 <!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->

<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>