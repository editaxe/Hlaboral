<?php 
include_once('../conexiones/conexione.php'); 
include_once('../evitar_mensaje_error/error.php');  
date_default_timezone_set("America/Bogota");

$cod_actitud_laboral                 = intval($_GET['cod_actitud_laboral']);
$cod_historia_clinica                = intval($_GET['cod_historia_clinica']);
$fecha_hoy                           = time();

$sql_info_empresa = "SELECT * FROM info_empresa WHERE cod_info_empresa = '1'";
$resultado_info_empresa = mysqli_query($conectar, $sql_info_empresa);
$info_empresa_data = mysqli_fetch_assoc($resultado_info_empresa);

$titulo_emp                          = $info_empresa_data['titulo'];
$nombre_emp                          = $info_empresa_data['nombre'];
$eslogan_emp                         = $info_empresa_data['eslogan'];
$direccion_emp                       = $info_empresa_data['direccion'];
$ciudad_emp                          = $info_empresa_data['ciudad'];
$pais_emp                            = $info_empresa_data['pais'];
$correo_emp                          = $info_empresa_data['correo'];
$img_cabecera_emp                    = $info_empresa_data['img_cabecera'];
$telefono_emp                        = $info_empresa_data['telefono'];
$info_legal_emp                      = $info_empresa_data['info_legal'];
$logotipo_emp                        = $info_empresa_data['logotipo'];
$propietario_nombres_apellidos_emp   = $info_empresa_data['propietario_nombres_apellidos'];
$propietario_nit_emp                 = $info_empresa_data['propietario_nit'];
$nit_empresa_emp                     = $info_empresa_data['nit_empresa'];
$cabecera_emp                        = $info_empresa_data['cabecera'];
$icono_emp                           = $info_empresa_data['icono'];
$desarrollador_emp                   = $info_empresa_data['desarrollador'];
$anyo_emp                            = $info_empresa_data['anyo'];
$url_pag                             = $info_empresa_data['url_pag'];
$nombre_font_emp                     = $info_empresa_data['nombre_font'];
$tamano_font_hc_emp                  = $info_empresa_data['tamano_font_hc'];
$tamano_font_aptlab_emp              = $info_empresa_data['tamano_font_aptlab'];
$tamano_font_trabaltu_emp            = $info_empresa_data['tamano_font_trabaltu'];
$tamano_font_manaliment_emp          = $info_empresa_data['tamano_font_manaliment'];
$tamano_font_remision_emp            = $info_empresa_data['tamano_font_remision'];
$tamano_font_factura_emp             = $info_empresa_data['tamano_font_factura'];
$res_emp                             = $info_empresa_data['res'];
$res1_emp                            = $info_empresa_data['res1'];
$res2_emp                            = $info_empresa_data['res2'];
$departamento_emp                    = $info_empresa_data['departamento'];
$localidad_emp                       = $info_empresa_data['localidad'];
$reg_medico_emp                      = $info_empresa_data['reg_medico'];
$regimen_emp                         = $info_empresa_data['regimen'];
$version_emp                         = $info_empresa_data['version'];
$propietario_url_firma_emp           = $info_empresa_data['propietario_url_firma'];
$fecha_time_emp                      = $info_empresa_data['fecha_time'];
$licencia_emp                        = $info_empresa_data['licencia'];
$info_histclinic_emp                 = $info_empresa_data['info_histclinic'];
$info_aptlaboral_emp                 = $info_empresa_data['info_aptlaboral'];

$sql_historia_clinica = "SELECT actitud_laboral.cod_actitud_laboral, actitud_laboral.cod_historia_clinica, actitud_laboral.cod_cliente, actitud_laboral.cod_administrador, 
actitud_laboral.motivo_actilab, actitud_laboral.aptdesemp_carg, actitud_laboral.present_restric, actitud_laboral.aplazad, 
actitud_laboral.contin_lab1, actitud_laboral.aplaz1, actitud_laboral.resig_tarea1, actitud_laboral.temporal1, actitud_laboral.contin_lab2, 
actitud_laboral.aplaz2, actitud_laboral.resig_tarea2, actitud_laboral.temporal2, actitud_laboral.rein_trab, actitud_laboral.aplaz3, 
actitud_laboral.resig_tarea3, actitud_laboral.temporal3, actitud_laboral.realiz, actitud_laboral.exacomple_opto, 
actitud_laboral.exacomple_espiro, actitud_laboral.exacomple_audi, actitud_laboral.exacomple_psico, actitud_laboral.exacomple_visio, 
actitud_laboral.exacomple_lab, actitud_laboral.exacomple_otro, actitud_laboral.acuedenfa_altu_apto, actitud_laboral.acuedenfa_altu_nocump, 
actitud_laboral.acuedenfa_altu_aplaz, actitud_laboral.acuedenfa_altu_obser, actitud_laboral.acuedenfa_aliment_apto, 
actitud_laboral.acuedenfa_aliment_nocump, actitud_laboral.acuedenfa_aliment_aplaz, actitud_laboral.acuedenfa_aliment_obser, 
actitud_laboral.acuedenfa_alime_apto, actitud_laboral.acuedenfa_alime_nocump, actitud_laboral.acuedenfa_alime_aplaz, 
actitud_laboral.acuedenfa_alime_obser, actitud_laboral.acuedenfa_medica_apto, actitud_laboral.acuedenfa_medica_nocump, 
actitud_laboral.acuedenfa_medica_aplaz, actitud_laboral.acuedenfa_medica_obser, actitud_laboral.acuedenfa_realiz, 
actitud_laboral.acuedenfa_realiz_obser, actitud_laboral.acuedenfa_espconf_apto, actitud_laboral.acuedenfa_espconf_nocump, 
actitud_laboral.acuedenfa_espconf_aplaz, actitud_laboral.acuedenfa_espconf_obser, actitud_laboral.acuedenfa_brigad_apto, 
actitud_laboral.acuedenfa_brigad_nocump, actitud_laboral.acuedenfa_brigad_aplaz, actitud_laboral.acuedenfa_brigad_obser, 
actitud_laboral.acuedenfa_actdepor_apto, actitud_laboral.acuedenfa_actdepor_nocump, actitud_laboral.acuedenfa_actdepor_aplaz, 
actitud_laboral.acuedenfa_actdepor_obser, actitud_laboral.acuedenfa_segvial_apto, actitud_laboral.acuedenfa_segvial_nocump, 
actitud_laboral.acuedenfa_segvial_aplaz, actitud_laboral.acuedenfa_segvial_obser, actitud_laboral.enfosteo_contperocupa, 
actitud_laboral.enfosteo_contperpromprev, actitud_laboral.enfosteo_habnutsalud, actitud_laboral.enfosteo_eppelemprot, 
actitud_laboral.enfosteo_manejmedic, actitud_laboral.enfosteo_ejerreg, actitud_laboral.enfosteo_dejhabitfum, 
actitud_laboral.enfosteo_contnutrieps, actitud_laboral.enfosteo_redconsualcoh, actitud_laboral.enfosteo_realpruebcomp, 
actitud_laboral.enfosteo_remieps, actitud_laboral.enfosteo_contperpypeps, 
actitud_laboral.enfosteo_remiepsmedigenesp, actitud_laboral.enfosteo_eppcarg, 
actitud_laboral.enfosteo_pausactiva, actitud_laboral.enfosteo_ingrepve, 
actitud_laboral.enfosteo_pausaergo, actitud_laboral.enfosteo_bloqsolar, 
actitud_laboral.enfosteo_recommanejcarg, 
actitud_laboral.enfosteo_observ, actitud_laboral.prio_osteo, actitud_laboral.prio_manialiment, 
actitud_laboral.prio_visual, actitud_laboral.prio_altura, actitud_laboral.prio_piel, actitud_laboral.prio_resp, actitud_laboral.prio_biolog, 
actitud_laboral.prio_tempextem, actitud_laboral.prio_espconfi, actitud_laboral.prio_cuidvoz, actitud_laboral.prio_quim, 
actitud_laboral.prio_audi, actitud_laboral.recomend_emp, actitud_laboral.recomend_trab, actitud_laboral.fecha_mes, 
actitud_laboral.fecha_anyo, actitud_laboral.fecha_ymd, actitud_laboral.fecha_dmy, actitud_laboral.fecha_time, 
actitud_laboral.fecha_reg_time, actitud_laboral.cuenta, actitud_laboral.cuenta_reg, 
cliente.nombre_tipo_doc, cliente.nombre_ocupacion, cliente.cod_entidad, cliente.cedula, 
cliente.url_img_firma_min AS url_img_firma_min_cli, cliente.url_img_firma AS url_img_firma_cli, 
cliente.url_img_foto_min AS url_img_foto_min_cli, cliente.url_img_foto AS url_img_foto_cli, 
cliente.nombres, cliente.apellido1,
historia_clinica.nombre_religion, historia_clinica.nombre_ocupacion, historia_clinica.nombre_estado_civil, 
historia_clinica.nombre_escolaridad, historia_clinica.nombre_tipo_regimen, historia_clinica.nombre_fondo_pension, 
historia_clinica.nombre_actividad_ecoemp, historia_clinica.nombre_estrato, historia_clinica.nombre_numero_hijos, 
historia_clinica.nombre_arl, actitud_laboral.nombre_empresa, actitud_laboral.cargo_empresa, actitud_laboral.area_empresa, 
actitud_laboral.ciudad_empresa, actitud_laboral.nombre_empresa_contratante, historia_clinica.tel_cliente, 
historia_clinica.correo, historia_clinica.cod_entidad, historia_clinica.lugar_residencia, historia_clinica.nombre_contacto1, 
historia_clinica.tel_contacto1, historia_clinica.parentesco_contacto1, historia_clinica.direccion_contacto1,
historia_clinica.url_img_firma_min, historia_clinica.url_img_firma_orig, historia_clinica.url_img_foto_min, 
historia_clinica.url_img_foto_orig, historia_clinica.motivo, actitud_laboral.nombre_condicion_salud, actitud_laboral.comentario_nombre_condicion_salud, 
actitud_laboral.prio_otro, actitud_laboral.prio_otro_descripcion, actitud_laboral.temporal1_num, actitud_laboral.temporal2_num, actitud_laboral.temporal3_num, actitud_laboral.enfosteo_habito_vida_saludable
FROM historia_clinica RIGHT JOIN (cliente RIGHT JOIN actitud_laboral ON cliente.cod_cliente = actitud_laboral.cod_cliente) 
ON historia_clinica.cod_historia_clinica = actitud_laboral.cod_historia_clinica HAVING (((actitud_laboral.cod_actitud_laboral)='$cod_actitud_laboral'))";
$resultado_historia_clinica = mysqli_query($conectar, $sql_historia_clinica);
$info_actitud_laboral = mysqli_fetch_assoc($resultado_historia_clinica);

$cod_entidad                         = $info_actitud_laboral['cod_entidad'];
$cod_administrador                   = $info_actitud_laboral['cod_administrador'];

$sql_profesional = "SELECT nombres, apellidos FROM administrador WHERE cod_administrador = '$cod_administrador'";
$resultado_profesional = mysqli_query($conectar, $sql_profesional);
$info_profesional = mysqli_fetch_assoc($resultado_profesional);

$nombres_prof                        = $info_profesional['nombres'];
$apellidos_prof                      = $info_profesional['apellidos'];
/*
$sql_entidad = "SELECT nombre_entidad FROM entidad WHERE cod_entidad = '$cod_entidad'";
$resultado_entidad = mysqli_query($conectar, $sql_entidad);
$info_entidad = mysqli_fetch_assoc($resultado_entidad);
$nombre_entidad = $info_entidad['nombre_entidad'];
*/
$motivo                              = $info_actitud_laboral['motivo_actilab'];
$cedula                              = $info_actitud_laboral['cedula'];
$nombres_cli                         = $info_actitud_laboral['nombres'];
$apellido1_cli                       = $info_actitud_laboral['apellido1'];
$nombre_ocupacion                    = $info_actitud_laboral['nombre_ocupacion'];
$nombre_tipo_doc                     = $info_actitud_laboral['nombre_tipo_doc'];
$url_img_firma_min_cli               = $info_actitud_laboral['url_img_firma_min_cli'];
$url_img_firma_cli                   = $info_actitud_laboral['url_img_firma_cli'];
$url_img_foto_min_cli                = $info_actitud_laboral['url_img_foto_min_cli'];
$url_img_foto_cli                    = $info_actitud_laboral['url_img_foto_cli'];
$nombre_religion                     = $info_actitud_laboral['nombre_religion'];
$nombre_estado_civil                 = $info_actitud_laboral['nombre_estado_civil'];
$nombre_escolaridad                  = $info_actitud_laboral['nombre_escolaridad'];
$nombre_tipo_regimen                 = $info_actitud_laboral['nombre_tipo_regimen'];
$nombre_fondo_pension                = $info_actitud_laboral['nombre_fondo_pension'];
$nombre_actividad_ecoemp             = $info_actitud_laboral['nombre_actividad_ecoemp'];
$nombre_estrato                      = $info_actitud_laboral['nombre_estrato'];
$nombre_numero_hijos                 = $info_actitud_laboral['nombre_numero_hijos'];
$nombre_arl                          = $info_actitud_laboral['nombre_arl'];
$nombre_empresa                      = $info_actitud_laboral['nombre_empresa'];
$cargo_empresa                       = $info_actitud_laboral['cargo_empresa'];
$area_empresa                        = $info_actitud_laboral['area_empresa'];
$ciudad_empresa                      = $info_actitud_laboral['ciudad_empresa'];
$nombre_empresa_contratante          = $info_actitud_laboral['nombre_empresa_contratante'];
$tel_cliente                         = $info_actitud_laboral['tel_cliente'];
$correo                              = $info_actitud_laboral['correo'];
$lugar_residencia                    = $info_actitud_laboral['lugar_residencia'];
$tel_contacto1                       = $info_actitud_laboral['tel_contacto1'];
$parentesco_contacto1                = $info_actitud_laboral['parentesco_contacto1'];
$direccion_contacto1                 = $info_actitud_laboral['direccion_contacto1'];
$url_img_firma_min                   = $info_actitud_laboral['url_img_firma_min'];
$url_img_firma_orig                  = $info_actitud_laboral['url_img_firma_orig'];
$url_img_foto_min                    = $info_actitud_laboral['url_img_foto_min'];
$url_img_foto_orig                   = $info_actitud_laboral['url_img_foto_orig'];
$cod_actitud_laboral                 = $info_actitud_laboral['cod_actitud_laboral'];
$cod_historia_clinica                = $info_actitud_laboral['cod_historia_clinica'];
$cod_cliente                         = $info_actitud_laboral['cod_cliente'];
$motivo_actilab                      = $info_actitud_laboral['motivo_actilab'];
$aptdesemp_carg                      = $info_actitud_laboral['aptdesemp_carg'];
$present_restric                     = $info_actitud_laboral['present_restric'];
$aplazad                             = $info_actitud_laboral['aplazad'];
$contin_lab1                         = $info_actitud_laboral['contin_lab1'];
$aplaz1                              = $info_actitud_laboral['aplaz1'];
$resig_tarea1                        = $info_actitud_laboral['resig_tarea1'];
$temporal1                           = $info_actitud_laboral['temporal1'];
$contin_lab2                         = $info_actitud_laboral['contin_lab2'];
$aplaz2                              = $info_actitud_laboral['aplaz2'];
$resig_tarea2                        = $info_actitud_laboral['resig_tarea2'];
$temporal2                           = $info_actitud_laboral['temporal2'];
$rein_trab                           = $info_actitud_laboral['rein_trab'];
$aplaz3                              = $info_actitud_laboral['aplaz3'];
$resig_tarea3                        = $info_actitud_laboral['resig_tarea3'];
$temporal3                           = $info_actitud_laboral['temporal3'];
$realiz                              = $info_actitud_laboral['realiz'];
$exacomple_opto                      = $info_actitud_laboral['exacomple_opto'];
$exacomple_espiro                    = $info_actitud_laboral['exacomple_espiro'];
$exacomple_audi                      = $info_actitud_laboral['exacomple_audi'];
$exacomple_psico                     = $info_actitud_laboral['exacomple_psico'];
$exacomple_visio                     = $info_actitud_laboral['exacomple_visio'];
$exacomple_lab                       = $info_actitud_laboral['exacomple_lab'];
$exacomple_otro                      = $info_actitud_laboral['exacomple_otro'];
$acuedenfa_altu_apto                 = $info_actitud_laboral['acuedenfa_altu_apto'];
$acuedenfa_altu_nocump               = $info_actitud_laboral['acuedenfa_altu_nocump'];
$acuedenfa_altu_aplaz                = $info_actitud_laboral['acuedenfa_altu_aplaz'];
$acuedenfa_altu_obser                = $info_actitud_laboral['acuedenfa_altu_obser'];
$acuedenfa_aliment_apto              = $info_actitud_laboral['acuedenfa_aliment_apto'];
$acuedenfa_aliment_nocump            = $info_actitud_laboral['acuedenfa_aliment_nocump'];
$acuedenfa_aliment_aplaz             = $info_actitud_laboral['acuedenfa_aliment_aplaz'];
$acuedenfa_aliment_obser             = $info_actitud_laboral['acuedenfa_aliment_obser'];
$acuedenfa_alime_apto                = $info_actitud_laboral['acuedenfa_alime_apto'];
$acuedenfa_alime_nocump              = $info_actitud_laboral['acuedenfa_alime_nocump'];
$acuedenfa_alime_aplaz               = $info_actitud_laboral['acuedenfa_alime_aplaz'];
$acuedenfa_alime_obser               = $info_actitud_laboral['acuedenfa_alime_obser'];
$acuedenfa_medica_apto               = $info_actitud_laboral['acuedenfa_medica_apto'];
$acuedenfa_medica_nocump             = $info_actitud_laboral['acuedenfa_medica_nocump'];
$acuedenfa_medica_aplaz              = $info_actitud_laboral['acuedenfa_medica_aplaz'];
$acuedenfa_medica_obser              = $info_actitud_laboral['acuedenfa_medica_obser'];
$acuedenfa_realiz                    = $info_actitud_laboral['acuedenfa_realiz'];
$acuedenfa_realiz_obser              = $info_actitud_laboral['acuedenfa_realiz_obser'];
$acuedenfa_espconf_apto              = $info_actitud_laboral['acuedenfa_espconf_apto'];
$acuedenfa_espconf_nocump            = $info_actitud_laboral['acuedenfa_espconf_nocump'];
$acuedenfa_espconf_aplaz             = $info_actitud_laboral['acuedenfa_espconf_aplaz'];
$acuedenfa_espconf_obser             = $info_actitud_laboral['acuedenfa_espconf_obser'];
$acuedenfa_brigad_apto               = $info_actitud_laboral['acuedenfa_brigad_apto'];
$acuedenfa_brigad_nocump             = $info_actitud_laboral['acuedenfa_brigad_nocump'];
$acuedenfa_brigad_aplaz              = $info_actitud_laboral['acuedenfa_brigad_aplaz'];
$acuedenfa_brigad_obser              = $info_actitud_laboral['acuedenfa_brigad_obser'];
$acuedenfa_actdepor_apto             = $info_actitud_laboral['acuedenfa_actdepor_apto'];
$acuedenfa_actdepor_nocump           = $info_actitud_laboral['acuedenfa_actdepor_nocump'];
$acuedenfa_actdepor_aplaz            = $info_actitud_laboral['acuedenfa_actdepor_aplaz'];
$acuedenfa_actdepor_obser            = $info_actitud_laboral['acuedenfa_actdepor_obser'];
$acuedenfa_segvial_apto              = $info_actitud_laboral['acuedenfa_segvial_apto'];
$acuedenfa_segvial_nocump            = $info_actitud_laboral['acuedenfa_segvial_nocump'];
$acuedenfa_segvial_aplaz             = $info_actitud_laboral['acuedenfa_segvial_aplaz'];
$acuedenfa_segvial_obser             = $info_actitud_laboral['acuedenfa_segvial_obser'];
$enfosteo_contperocupa               = $info_actitud_laboral['enfosteo_contperocupa'];
$enfosteo_contperpromprev            = $info_actitud_laboral['enfosteo_contperpromprev'];
$enfosteo_habnutsalud                = $info_actitud_laboral['enfosteo_habnutsalud'];
$enfosteo_eppelemprot                = $info_actitud_laboral['enfosteo_eppelemprot'];
$enfosteo_manejmedic                 = $info_actitud_laboral['enfosteo_manejmedic'];
$enfosteo_ejerreg                    = $info_actitud_laboral['enfosteo_ejerreg'];
$enfosteo_dejhabitfum                = $info_actitud_laboral['enfosteo_dejhabitfum'];
$enfosteo_contnutrieps               = $info_actitud_laboral['enfosteo_contnutrieps'];
$enfosteo_redconsualcoh              = $info_actitud_laboral['enfosteo_redconsualcoh'];
$enfosteo_realpruebcomp              = $info_actitud_laboral['enfosteo_realpruebcomp'];
$enfosteo_remieps                    = $info_actitud_laboral['enfosteo_remieps'];
$enfosteo_contperpypeps              = $info_actitud_laboral['enfosteo_contperpypeps'];
$enfosteo_remiepsmedigenesp          = $info_actitud_laboral['enfosteo_remiepsmedigenesp'];
$enfosteo_eppcarg                    = $info_actitud_laboral['enfosteo_eppcarg'];
$enfosteo_pausactiva                 = $info_actitud_laboral['enfosteo_pausactiva'];
$enfosteo_ingrepve                   = $info_actitud_laboral['enfosteo_ingrepve'];
$enfosteo_pausaergo                  = $info_actitud_laboral['enfosteo_pausaergo'];
$enfosteo_bloqsolar                  = $info_actitud_laboral['enfosteo_bloqsolar'];
$enfosteo_recommanejcarg             = $info_actitud_laboral['enfosteo_recommanejcarg'];
$enfosteo_observ                     = $info_actitud_laboral['enfosteo_observ'];
$prio_osteo                          = $info_actitud_laboral['prio_osteo'];
$prio_manialiment                    = $info_actitud_laboral['prio_manialiment'];
$prio_visual                         = $info_actitud_laboral['prio_visual'];
$prio_altura                         = $info_actitud_laboral['prio_altura'];
$prio_piel                           = $info_actitud_laboral['prio_piel'];
$prio_resp                           = $info_actitud_laboral['prio_resp'];
$prio_biolog                         = $info_actitud_laboral['prio_biolog'];
$prio_tempextem                      = $info_actitud_laboral['prio_tempextem'];
$prio_espconfi                       = $info_actitud_laboral['prio_espconfi'];
$prio_cuidvoz                        = $info_actitud_laboral['prio_cuidvoz'];
$prio_quim                           = $info_actitud_laboral['prio_quim'];
$prio_audi                           = $info_actitud_laboral['prio_audi'];
$recomend_emp                        = $info_actitud_laboral['recomend_emp'];
$recomend_trab                       = $info_actitud_laboral['recomend_trab'];
$fecha_mes                           = $info_actitud_laboral['fecha_mes'];
$fecha_anyo                          = $info_actitud_laboral['fecha_anyo'];
$fecha_ymd                           = $info_actitud_laboral['fecha_ymd'];
$fecha_dmy                           = $info_actitud_laboral['fecha_dmy'];
$fecha_time                          = $info_actitud_laboral['fecha_time'];
$fecha_reg_time                      = $info_actitud_laboral['fecha_reg_time'];
$cuenta                              = $info_actitud_laboral['cuenta'];
$cuenta_reg                          = $info_actitud_laboral['cuenta_reg'];
$nombre_condicion_salud              = $info_actitud_laboral['nombre_condicion_salud'];
$comentario_nombre_condicion_salud   = $info_actitud_laboral['comentario_nombre_condicion_salud'];
$enfosteo_habito_vida_saludable      = $info_actitud_laboral['enfosteo_habito_vida_saludable'];
$prio_otro                           = $info_actitud_laboral['prio_otro'];
$prio_otro_descripcion               = $info_actitud_laboral['prio_otro_descripcion'];
$temporal1_num                       = $info_actitud_laboral['temporal1_num'];
$temporal2_num                       = $info_actitud_laboral['temporal2_num'];
$temporal3_num                       = $info_actitud_laboral['temporal3_num'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$fecha_reg_time_dmy                  = date("d/m/Y", $fecha_reg_time);
$nombres_completos                   = "CONCEPTO DE APTITUD LABORAL-".$nombres_cli.'_'.$apellido1_cli.'-'.$nombre_empresa.'-'.$cedula.'-'.$cod_actitud_laboral;
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
include_once('mpdf/mpdf.php');
$margen_izq                          = '10';
$margen_der                          = '10';
$margen_inf_encabezado               = '20';
$margen_sup_encabezado               = '5';
$posicion_sup_encabezado             = '5';
$posicion_inf_encabezado             = '20';

$titulo_doc_pdf                      = $nombres_completos;
$autor_doc_pdf                       = $propietario_nombres_apellidos_emp;
$creador_doc_pdf                     = $propietario_nombres_apellidos_emp;
$tema_doc_pdf                        = "CONCEPTO DE APTITUD LABORAL";
$palabras_claves_doc_pdf             = $nombres_cli.' '.$apellido1_cli.'-'.$nombre_empresa.'-'.$cedula.'-'.$cod_actitud_laboral;
$cod_actitud_laboral_strpad          = str_pad($cod_actitud_laboral, 6, "0", STR_PAD_LEFT);
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
//$mpdf = new mPDF('c','Legal');
$mpdf                                = new mPDF('en-GB-x','Legal','','',$margen_izq, $margen_der, $margen_inf_encabezado, $margen_sup_encabezado, $posicion_sup_encabezado, $posicion_inf_encabezado);
$mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$header = '
<table align="center" border="1" cellspacing="0" cellpadding="0" style="font-family:mono;  font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
 <tbody>
  <tr>
    <td rowspan="3" align="center"><img src="../imagenes/logo_superior_actitud_laboral_pdf_imprimir.png" /></td>
    <td align="center"><barcode code="'.$cod_actitud_laboral_strpad.'" type="C128A" size="0.5" height="1" /></td>
  </tr>
  <tr><td align="center">APL: '.$cod_actitud_laboral.'</td></tr><tr><td align="center">HC: '.$cod_historia_clinica.'</td></tr>
 </tbody>
</table>
';
$headerE = '
<table align="center" border="1" cellspacing="0" cellpadding="0" style="font-family:mono;  font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
 <tbody>
  <tr>
    <td rowspan="3" align="center"><img src="../imagenes/logo_superior_actitud_laboral_pdf_imprimir.png" /></td>
    <td align="center"><barcode code="'.$cod_actitud_laboral_strpad.'" type="C128A" size="0.5" height="1" /></td>
  </tr>
  <tr><td align="center">APL: '.$cod_actitud_laboral.'</td></tr><tr><td align="center">HC: '.$cod_historia_clinica.'</td></tr>
 </tbody>
</table>
';
$footer = '
<table align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:mono; font-size:'.$tamano_font_aptlab_emp.'pt; border-top: 1px solid #000000; vertical-align: bottom; color: #000000; width:100%">
<tr>
<td width="100%" style="text-align: center;">
<h6>'.$direccion_emp.' - Teléfonos: '.$telefono_emp.'
<br>
Email: '.$correo_emp.' &nbsp;&nbsp; - &nbsp;&nbsp; '.$ciudad_emp.' - '.$pais_emp.' [Página {PAGENO} de {nbpg}]</h6>
</td>
</tr>
</table>
';
$footerE = '
<table align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:mono; font-size:'.$tamano_font_aptlab_emp.'pt; border-top: 1px solid #000000; vertical-align: bottom; color: #000000; width:100%">
<tr>
<td width="100%" style="text-align: center;">
<h6>'.$direccion_emp.' - Teléfonos: '.$telefono_emp.'
<br>
Email: '.$correo_emp.' &nbsp;&nbsp; - &nbsp;&nbsp; '.$ciudad_emp.' - '.$pais_emp.' [Página {PAGENO} de {nbpg}]</h6>
</td>
</tr>
</table>
';
$mpdf->SetHTMLHeader(($header));
$mpdf->SetHTMLHeader(($headerE),'E');
$mpdf->SetHTMLFooter(($footer));
$mpdf->SetHTMLFooter(($footerE),'E');

$codigoHTML = '
<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<meta charset="utf-8" />
</head>

<body>
<style type="text/css"> 
#centrar { margin-right:auto; margin-left:auto; width: 30%; } 
.Estilo1 { color: #FF0000; font-weight: bold; }
.Estilo2 {color: #FF0000}
</style>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" cellspacing="0" cellpadding="0" style="font-family:mono;  font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
  <tr>
    <td colspan="3"><strong>Empresa Contratante:</strong></td>
    <td colspan="2"><strong>'.$nombre_empresa_contratante.'</strong></td>
    <td colspan="4"><strong>FECHA:</strong></td>
    <td style="text-align:center"><strong>'.$fecha_ymd.'</strong></td>
  </tr>
  <tr>
    <td colspan="3"><strong>Empresa a Laborar:</strong></td>
    <td colspan="2"><strong>'.$nombre_empresa.'</strong></td>
    <td colspan="5"><strong>&nbsp;</strong></td>
  </tr>
  <tr>
    <td colspan="2"><strong>TIPO DE EXAMEN:</strong></td>
    <td colspan="8">'.$motivo.'</td>
  </tr>
  <tr>
    <td><strong>NOMBRE:</strong></td>
    <td colspan="3"><strong>'.$nombres_cli.' '.$apellido1_cli.'</strong></td>
    <td colspan="2"><strong>'.$nombre_tipo_doc.':</strong></td>
    <td colspan="4"><strong>'.$cedula.'</strong></td>
  </tr>
  <tr>
    <td><strong>CARGO:</strong></td>
    <td colspan="3"><strong>'.$cargo_empresa.'</strong></td>
    <td colspan="2"><strong>CIUDAD:</strong></td>
    <td colspan="4"><strong>'.$ciudad_empresa.'</strong></td>
  </tr>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" cellspacing="0" cellpadding="0" style="font-family:mono;  font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
  <tr><td style="text-align:center" bgcolor="#FAC090" colspan="15"><strong>CONCEPTOS GENERALES POR TIPO DE EXAMEN</strong></td>
  </tr>
  <tr><td style="text-align:center" bgcolor="#FAC090" colspan="15"><strong>Examen de '.$motivo.'</strong></td></tr>
  <tr>
    <td colspan="6"><strong>Condición de salud sin restricciones</strong></td><td style="text-align:center"><strong>['.$aptdesemp_carg.']</strong></td>
    <td colspan="4"><strong>Condición de salud con restricción que no interfiere con su cargo</strong></td><td style="text-align:center"><strong>['.$present_restric.']</strong></td>
    <td colspan="2"><strong>Condición de salud con restricción que interfiere con su cargo</strong></td><td style="text-align:center"><strong>['.$aplazad.']</strong></td>
  </tr>
  <tr>
    <td colspan="15">'.$comentario_nombre_condicion_salud.'</td>
  </tr>
  <tr><td style="text-align:center" colspan="15"><strong>1.2 Examen Periódico</strong></td></tr>
  <tr>
    <td colspan="4" bgcolor="#FAC090"><strong>Puede continuar laborando</strong></td><td style="text-align:center"><strong>['.$contin_lab1.']</strong></td>
    <td colspan="2" bgcolor="#FAC090"><strong>Aplazado&nbsp;&nbsp;</strong></td><td style="text-align:center"><strong>['.$aplaz1.']</strong></td>
    <td colspan="4" bgcolor="#FAC090"><strong>Reasignación de tareas</strong></td><td style="text-align:center"><strong>['.$resig_tarea1.']</strong></td>
    <td bgcolor="#FAC090"><strong>Temporalidad:</strong></td><td style="text-align:center; width:50px"><strong>['.$temporal1.']</strong>
<strong>'.$temporal1_num.'</strong> Dias</td>
  </tr>
  <tr><td colspan="18"><p align="center"><strong>1.3 Examen periódico seguimiento de recomendaciones</strong></td></tr>
  <tr>
    <td colspan="4" bgcolor="#FAC090"><strong>Puede continuar laborando</strong></td><td style="text-align:center"><strong>['.$contin_lab2.']</strong></td>
    <td colspan="2" bgcolor="#FAC090"><strong>Condición de salud con restricción que interfiere con su cargo&nbsp;&nbsp;</strong></td><td style="text-align:center"><strong>['.$aplaz2.']</strong></td>
    <td colspan="4" bgcolor="#FAC090"><strong>Reasignación de tareas</strong></td><td style="text-align:center"><strong>['.$resig_tarea2.']</strong></td>
    <td bgcolor="#FAC090"><strong>Temporalidad:</strong></td><td style="text-align:center; width:50px"><strong>['.$temporal2.']</strong>
<strong>'.$temporal2_num.'</strong> Dias</td>
  </tr>
  <tr><td colspan="14"><p align="center"><strong>1.4 Reintegro / Post &ndash; Incapacidad </strong></td></tr>
  <tr>
    <td colspan="4" bgcolor="#FAC090"><strong>Reincorporación al Puesto de trabajo</strong></td><td style="text-align:center"><strong>['.$rein_trab.']</strong></td>
    <td colspan="2" bgcolor="#FAC090"><strong>Condición de salud con restricción que interfiere con su cargo&nbsp;&nbsp;</strong></td><td style="text-align:center"><strong>['.$aplaz3.']</strong></td>
    <td colspan="4" bgcolor="#FAC090"><strong>Reasignación de tareas</strong></td><td style="text-align:center"><strong>['.$resig_tarea3.']</strong></td>
    <td bgcolor="#FAC090"><strong>Temporalidad:</strong></td><td style="text-align:center; width:50px"><strong>['.$temporal3.']</strong></strong>
<strong>'.$temporal3_num.'</strong> Dias</td>
  </tr>
  <tr><td style="text-align:center" colspan="15"><strong>1.5 EGRESO</strong></td></tr>
  <tr>
    <td colspan="15"><strong>Realizado<strong>['.$realiz.']</strong></strong></td>
  </tr>
</table>

<table border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:mono;  font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
  <tr>
    <td style="text-align:center" bgcolor="#FAC090" colspan="28"><strong>EX&Aacute;MENES COMPLEMENTARIOS</strong></td>
  </tr>
  <tr>
    <td style="text-align:center" colspan="3"><strong>Optometría</strong></td>
    <td style="text-align:center" colspan="4"><strong>Espirometría</strong></td>
    <td style="text-align:center" colspan="3"><strong>Audiometría</strong></td>
    <td style="text-align:center" colspan="4"><strong>Prueba Psicot&eacute;cnica</strong></td>
    <td style="text-align:center" colspan="3"><strong>Visiometría</strong></td>
    <td style="text-align:center" colspan="4"><strong>Laboratorios</strong></td>
    <td style="text-align:center" colspan="7"><strong>Otros</strong>: </td>
  </tr>
  <tr>
    <td style="text-align:center" colspan="3"><strong><strong>['.$exacomple_opto.']</strong></strong></td>
    <td style="text-align:center" colspan="4"><strong><strong>['.$exacomple_espiro.']</strong></strong></td>
    <td style="text-align:center" colspan="3"><strong><strong>['.$exacomple_audi.']</strong></strong></td>
    <td style="text-align:center" colspan="4"><strong><strong>['.$exacomple_psico.']</strong></strong></td>
    <td style="text-align:center" colspan="3"><strong><strong>['.$exacomple_visio.']</strong></strong></td>
    <td style="text-align:center" colspan="4"><strong><strong>['.$exacomple_lab.']</strong></strong></td>
    <td style="text-align:center" colspan="7">'.$exacomple_otro.'</td>
  </tr>
</table>
  <!-- /////////////////////////////////////////////////// -->
<table align="center" border="1" cellspacing="0" cellpadding="0" style="font-family:mono;  font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
  <tr><td style="text-align:center" bgcolor="#FAC090" colspan="5"><strong>CONCEPTO DE ACUERDO AL &Eacute;NFASIS</strong></td></tr>
  <tr>
    <td style="text-align:center"><strong>&Eacute;nfasis </strong></td>
    <td style="text-align:center"><strong>Apto</strong></td>
    <td style="text-align:center"><strong>No cumple</strong></td>
    <td style="text-align:center"><strong>Condición de salud con restricción que interfiere con su cargo</strong></td>
    <td style="text-align:center"><strong>Observaciones</strong></td>
  </tr>
  <tr>
    <td><strong>Seguridad vial</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_segvial_apto.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_segvial_nocump.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_segvial_aplaz.']</strong></td>
    <td>'.$acuedenfa_segvial_obser.'</td>
  </tr>
  <tr>
    <td><strong>Espacios confinados</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_espconf_apto.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_espconf_nocump.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_espconf_aplaz.']</strong></td>
    <td>'.$acuedenfa_espconf_obser.'</td>
  </tr>
  <tr>
    <td><strong>Alturas</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_altu_apto.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_altu_nocump.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_altu_aplaz.']</strong></td>
    <td>'.$acuedenfa_altu_obser.'</td>
  </tr>
  <tr>
    <td><strong>Alimentos</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_alime_apto.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_alime_nocump.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_alime_aplaz.']</strong></td>
    <td>'.$acuedenfa_alime_obser.'</td>
  </tr>
  <tr>
    <td><strong>Actividad deportiva</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_actdepor_apto.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_actdepor_nocump.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_actdepor_aplaz.']</strong></td>
    <td>'.$acuedenfa_actdepor_obser.'</td>
  </tr>
  <tr>
    <td><strong>Brigadista</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_brigad_apto.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_brigad_nocump.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_brigad_aplaz.']</strong></td>
    <td>'.$acuedenfa_brigad_obser.'</td>
  </tr>
  <tr>
    <td><strong>Medicamentos</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_medica_apto.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_medica_nocump.']</strong></td>
    <td style="text-align:center"><strong>['.$acuedenfa_medica_aplaz.']</strong></td>
    <td>'.$acuedenfa_medica_obser.'</td>
  </tr>
  <tr>
    <td style="text-align:center" colspan="4"><strong>ENFASIS OSTEOMUSCULAR REALIZADO</strong>&nbsp;&nbsp;&nbsp;<strong>['.$acuedenfa_realiz.']</strong></td>
    <td>'.$acuedenfa_realiz_obser.'</td>
  </tr>
</table>

<!-- /////////////////////////////////////////////////// -->
<table align="center" border="1" cellspacing="0" cellpadding="0" style="font-family:mono; font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
  <tr>
    <td style="text-align:center" bgcolor="#FAC090" colspan="6"><strong>RECOMENDACIONES GENERALES</strong></td>
  </tr>
  <tr>
    <td><strong>Control Nutricional en su EPS</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_contnutrieps.']</strong></td>
    <td><strong>Control periódico por PyP en su EPS</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_contperpypeps.']</strong></td>
    <td><strong>Remisión a su EPS por medicina General o especializada.</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_remiepsmedigenesp.']</strong></td>
  </tr>
  <tr>
    <td><strong>Continuar manejo Médico</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_manejmedic.']</strong></td>
    <td><strong>Uso de E.P.P. de acuerdo al cargo</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_eppcarg.']</strong></td>
    <td><strong>Inicio o continuar actividad física mínimo 3 veces por semana</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_ejerreg.']</strong></td>
  </tr>
  <tr>
    <td><strong>Control periódico ocupacional</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_contperocupa.']</strong></td>
<!--
    <td><strong>Suspender tabaquismo</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_dejhabitfum.']</strong></td>
-->
    <td><strong>Pausas Activas.</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_pausactiva.']</strong></td>
  </tr>
  <tr>
<!--
    <td><strong>Reducir consumo de alcohol</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_redconsualcoh.']</strong></td>
-->
    <td><strong>Habitos de vida saludable</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_habito_vida_saludable.']</strong></td>

    <td><strong>Ingreso a P.V.E.</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_ingrepve.']</strong></td>
    <td><strong>Remisión a EPS/ARL:</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_remieps.']</strong></td>
  </tr>
   <tr>
    <td><strong>Posturas Ergonómicas</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_pausaergo.']</strong></td>
    <td><strong>Uso de bloqueador Solar</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_bloqsolar.']</strong></td>
    <td><strong>Realización de pruebas complementarias.</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_realpruebcomp.']</strong></td>
  </tr>
   <tr>
    <td><strong>Recomendaciones para manejo de cargas.</strong></td>
    <td style="text-align:center"><strong>['.$enfosteo_recommanejcarg.']</strong></td>
    <td colspan="4" style="text-align:center"><strong> Siglas: EPS: Entidad Promotora de salud - PYP: Promoción y Prevención -ARL: Administradora de Riesgos Laborales.</strong></td>
   </tr>
  <tr><td colspan="6"><strong>Observaciones:</strong>'.$enfosteo_observ.'</td></tr>
  <tr><td colspan="6"><strong> Priorizar en los programas de vigilancia, los riesgos definidos en la matriz de la entidad.</strong></td></tr>
</table>
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="1" cellspacing="0" cellpadding="0" style="font-family:mono; font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
  <tr><td style="text-align:center" bgcolor="#FAC090" colspan="2"><strong>RECOMENDACIONES OCUPACIONALES PREVENTIVAS</strong></td></tr>
  <tr>
    <td><strong>OSTEOMUSCULAR: Higiene Postural; estiramientos, Pausas activas</strong></td>
    <td style="text-align:center"><strong>['.$prio_osteo.']</strong></td>
  </tr>
  <tr>
    <td><strong>MANIPULACIÓN DE ALIMENTOS: Lavado de manos; BPM (Buenas Prácticas de Manufactura.</strong></td>
    <td style="text-align:center"><strong>['.$prio_manialiment.']</strong></td>
  </tr>
  <tr>
    <td><strong>VISUAL: Pausas activas visuales, iluminación adecuada en el puesto de trabajo. Educación y prevención en higiene visual, Uso de protección visual según tipo de exposición.</strong></td>
    <td style="text-align:center"><strong>['.$prio_visual.']</strong></td>
  </tr>
  <tr>
    <td><strong>ALTURAS: Certificación en alturas y Capacitación al personal.</strong></td>
    <td style="text-align:center"><strong>['.$prio_altura.']</strong></td>
  </tr>
  <tr>
    <td><strong>PIEL: Reportar alteraciones en la piel, uso de protección en zonas expuestas a agentes irritantes.</strong>.</td>
    <td style="text-align:center"><strong>['.$prio_piel.']</strong></td>
  </tr>
  <tr>
    <td><strong>RESPIRATORIA: Protección según exposición, Uso de E.P.R. (elementos de protección respiratoria).</strong></td>
    <td style="text-align:center"><strong>['.$prio_resp.']</strong></td>
  </tr>
  <tr>
    <td><strong>BIOLÓGICO: Verificación del esquema de vacunación, Uso de elementos de bioseguridad según riesgos.</strong></td>
    <td style="text-align:center"><strong>['.$prio_biolog.']</strong></td>
  </tr>
    <tr>
    <td><strong>ESPACIOS CONFINADOS: Capacitación, Acompañamiento durante la labor, Sistemas de seguridad de emergencia.</strong></td>
    <td style="text-align:center"><strong>['.$prio_espconfi.']</strong></td>
  </tr>
  <tr>
    <td><strong>CUIDADO DE LA VOZ: Calentamiento y reposo vocal, educación de uso adecuado para la voz.</strong></td>
    <td style="text-align:center"><strong>['.$prio_cuidvoz.']</strong></td>
  </tr>
  <tr>
    <td><strong>QUÍMICO: Enviar marcadores biológicos específicos según exposición en los trabajadores.</strong></td>
    <td style="text-align:center"><strong>['.$prio_quim.']</strong></td>
  </tr>
  <tr>
    <td><strong>AUDITIVO: Reposo auditivo extralaboral, Protección auditiva de acuerdo con la exposición a ruido.</strong></td>
    <td style="text-align:center"><strong>['.$prio_audi.']</strong></td>
  </tr>
  <tr>
    <td><strong>TEMPERATURAS EXTREMAS: Capacitación en identificación temprana de signos de alarma, Uso de la ropa adecuada.</strong></td>
    <td style="text-align:center"><strong>['.$prio_tempextem.']</strong></td>
  </tr>
  <tr>
    <td><strong>OTRO: '.$prio_otro_descripcion.'</strong></td>
    <td style="text-align:center"><strong>['.$prio_otro.']</strong></td>
  </tr>>
</table>

<table align="center" border="1" cellspacing="0" cellpadding="0" style="font-family:mono; font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
  <tr><td bgcolor="#FAC090"><strong>RECOMENDACIONES / EMPRESA</strong></td></tr>
  <tr><td style="text-align:center">'.$recomend_emp.'</td></tr>
</table>
<!-- /////////////////////////////////////////////////// -->
<table border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_aptlab_emp.'pt; width:100%">
  <tr><td bgcolor="#FAC090"><strong>RECOMENDACIONES / TRABAJADOR </strong></td></tr>
  <tr><td style="text-align:center">'.$recomend_trab.'</td></tr>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
     </tr>
    </tbody>
</table>
<!-- /////////////////////////////////////////////////// -->
<br>
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="1" cellspacing="0" cellpadding="0" style="font-family:mono; font-size:7pt; width:100%">
  <tr>
    <td colspan="2"><p><strong>'.$info_aptlaboral_emp.'</strong></p></td>
  </tr>
  <tr>
    <td><p><strong>FIRMA DEL MÉDICO</strong></p>
    <div><img src="'.$propietario_url_firma_emp.'" height="60px"/></div>
    <div>_________________________________________ </div>
        <p><strong>'.$nombres_prof.' '.$apellidos_prof.'</strong></p></td>

    <td><p><strong>FIRMA DEL PACIENTE</strong></p>
    <div><img src="'.$url_img_firma_min_cli.'" height="60px"/></div>
    <div>_________________________________________ </div>
        <p><strong>'.$nombres_cli.' '.$apellido1_cli.'</strong></p></td>
  </tr>
  <tr>
    <td><p><strong>Reg. M&eacute;dico: '.$reg_medico_emp. ' </strong><strong>Licencia Salud Ocupacional '.$licencia_emp.'</strong><strong> </strong></p></td>
    <td><p><strong>C.C '.$cedula.'</strong> </p></td>
  </tr>
</table>

</body>
</html>
';
$mpdf->WriteHTML(($codigoHTML));
$mpdf->SetTitle($titulo_doc_pdf);
$mpdf->SetAuthor($autor_doc_pdf);
$mpdf->SetCreator($autor_doc_pdf);
$mpdf->SetSubject($tema_doc_pdf);
$mpdf->SetKeywords($palabras_claves_doc_pdf);
$ruta = '../pdfs/';
$nombre_archivo = 'CONCAPTLAB_'.$nombres_cli.'_'.$apellido1_cli.'_'.$nombre_empresa.'_'.$fecha_ymd.'-'.$cedula.'-'.$fecha_hoy.'.pdf';
$mpdf->Output($nombre_archivo, 'I');
exit;
/*
$mpdf->WriteHTML('<tocpagebreak sheet-size="A4-L" toc-sheet-size="A5" toc-preHTML="This ToC should print on an A5 sheet" />');
$mpdf->WriteHTML('<tocentry content="A4 landscape" /><p>This page appears just after the ToC and should print on an A4 (landscape) sheet</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="A5-L" />');
$mpdf->WriteHTML('<tocentry content="A5 landscape" /><p>This should print on an A5 (landscape) sheet</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="Letter" />');
$mpdf->WriteHTML('<tocentry content="Letter portrait" /><p>This should print on an Letter sheet</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="150mm 150mm" />');
$mpdf->WriteHTML('<tocentry content="150mm square" /><p>This should print on a sheet 150mm x 150mm</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="11.69in 8.27in" />');
*/
?>