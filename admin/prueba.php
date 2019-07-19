<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<!--<link href="../estilo_css/bootstrap-combined.min.css" rel="stylesheet">-->
<link rel="stylesheet" href="../estilo_css/prism.css">
<link rel="stylesheet" href="../estilo_css/jquery-ui.css">
<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>

</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php $pagina = addslashes($_GET['pagina']); ?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">
<div class="breadcrumbs"><a href="<?php echo $pagina ?>"><h4>Crear Historia Clinica</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$fecha_hoy = date("Y/m/d");
$fecha_hoy_time = strtotime(date("Y/m/d"));
$cod_historia_clinica = intval($_GET['cod_historia_clinica']);
$cod_cliente = intval($_GET['cod_cliente']);

$sql_historia_clinica = "SELECT historia_clinica.cod_historia_clinica, cliente.cod_cliente, cliente.nombre_tipo_doc, 
cliente.nombre_ocupacion, cliente.cod_entidad, cliente.cedula, cliente.nombre_sexo, cliente.nombre_contacto1, 
cliente.parentesco_contacto1, cliente.tel_contacto1, cliente.antperson_alergia_si, cliente.antperson_alergia_no, cliente.nombre_escolaridad,
cliente.antperson_patologico_si, cliente.antperson_patologico_no, cliente.antperson_quirurgico_si, cliente.antperson_quirurgico_no, 
cliente.url_img_firma_min AS url_img_firma_min_cli, cliente.url_img_firma AS url_img_firma_cli, cliente.url_img_foto_min AS url_img_foto_min_cli, 
cliente.url_img_foto AS url_img_foto_cli,
historia_clinica.url_img_firma_min, historia_clinica.url_img_firma_orig, historia_clinica.url_img_foto_min, historia_clinica.url_img_foto_orig, 
cliente.nombres, cliente.apellido1, cliente.apellido2, cliente.fecha_nac_ymd, cliente.fecha_nac_time, cliente.nombre_empresa,
cliente.nombre_grupo_rh, cliente.tel_cliente AS tel_cliente_cli, cliente.correo, cliente.direccion, cliente.nombre_ciudad, cliente.nombre_pais, 
cliente.cargo_empresa, cliente.area_empresa, cliente.ciudad_empresa, cliente.direccion_contacto1, cliente.direccion_contacto2,
cliente.nombre_tipo_regimen, cliente.nombre_fondo_pension, cliente.nombre_numero_hijos, cliente.nombre_arl, cliente.lugar_nac, 
cliente.lugar_residencia, cliente.nombre_estado_civil, cliente.nombre_raza, cliente.direccion_contacto1, cliente.direccion_contacto2, 
historia_clinica.motivo, 
historia_clinica.cod_grupo_area, historia_clinica.cod_grupo_area_cargo, 
historia_clinica.dat_ocupa_emp1, historia_clinica.dat_ocupa_carg1, 
historia_clinica.dat_ocupa_visu1, 
historia_clinica.dat_ocupa_audi1, historia_clinica.dat_ocupa_altu1, historia_clinica.dat_ocupa_resp1, historia_clinica.dat_ocupa_fech_ini1, 
historia_clinica.dat_ocupa_dura_anyo1, historia_clinica.dat_ocupa_emp2, historia_clinica.dat_ocupa_carg2, 
historia_clinica.dat_ocupa_visu2, historia_clinica.dat_ocupa_audi2, historia_clinica.dat_ocupa_altu2, 
historia_clinica.dat_ocupa_resp2, historia_clinica.dat_ocupa_fech_ini2, historia_clinica.dat_ocupa_dura_anyo2, 
historia_clinica.dat_ocupa_emp3, historia_clinica.dat_ocupa_carg3, historia_clinica.dat_ocupa_visu3, 
historia_clinica.dat_ocupa_audi3, historia_clinica.dat_ocupa_altu3, historia_clinica.dat_ocupa_resp3, 
historia_clinica.dat_ocupa_fech_ini3, historia_clinica.dat_ocupa_dura_anyo3, historia_clinica.dat_ocupa_observacion, 
historia_clinica.clasrieg_carg1, historia_clinica.clasrieg_fis1_ruid, historia_clinica.clasrieg_fis1_ilum, 
historia_clinica.clasrieg_fis1_noionic, historia_clinica.clasrieg_fis1_vibra, historia_clinica.clasrieg_fis1_tempextrem, 
historia_clinica.clasrieg_fis1_cambpres, historia_clinica.clasrieg_quim1_gasvapor, historia_clinica.clasrieg_quim1_aeroliq, 
historia_clinica.clasrieg_quim1_solid, historia_clinica.clasrieg_quim1_liquid, historia_clinica.clasrieg_biolog1_viru, 
historia_clinica.clasrieg_biolog1_bacter, historia_clinica.clasrieg_biolog1_parasi, historia_clinica.clasrieg_biolog1_morde, 
historia_clinica.clasrieg_biolog1_picad, historia_clinica.clasrieg_biolog1_hongo, historia_clinica.clasrieg_ergo1_trabestat, 
historia_clinica.clasrieg_ergo1_esfuerfis, historia_clinica.clasrieg_ergo1_carga, historia_clinica.clasrieg_ergo1_postforz, 
historia_clinica.clasrieg_ergo1_movrepet, historia_clinica.clasrieg_ergo1_jortrab, historia_clinica.clasrieg_psi1_monoto, 
historia_clinica.clasrieg_psi1_relhuman, historia_clinica.clasrieg_psi1_contentarea, historia_clinica.clasrieg_psi1_orgtiemptrab, 
historia_clinica.clasrieg_segur1_mecanic, historia_clinica.clasrieg_segur1_electri, historia_clinica.clasrieg_segur1_locat, 
historia_clinica.clasrieg_segur1_fisiquim, historia_clinica.clasrieg_segur1_public, historia_clinica.clasrieg_segur1_espconfi, 
historia_clinica.clasrieg_segur1_trabaltura, historia_clinica.clasrieg_observ1_otro, historia_clinica.clasrieg_observ1_coment, 
historia_clinica.clasrieg_carg2, historia_clinica.clasrieg_fis2_ruid, historia_clinica.clasrieg_fis2_ilum, 
historia_clinica.clasrieg_fis2_noionic, historia_clinica.clasrieg_fis2_vibra, historia_clinica.clasrieg_fis2_tempextrem, 
historia_clinica.clasrieg_fis2_cambpres, historia_clinica.clasrieg_quim2_gasvapor, historia_clinica.clasrieg_quim2_aeroliq, 
historia_clinica.clasrieg_quim2_solid, historia_clinica.clasrieg_quim2_liquid, historia_clinica.clasrieg_biolog2_viru, 
historia_clinica.clasrieg_biolog2_bacter, historia_clinica.clasrieg_biolog2_parasi, historia_clinica.clasrieg_biolog2_morde, 
historia_clinica.clasrieg_biolog2_picad, historia_clinica.clasrieg_biolog2_hongo, historia_clinica.clasrieg_ergo2_trabestat, 
historia_clinica.clasrieg_ergo2_esfuerfis, historia_clinica.clasrieg_ergo2_carga, historia_clinica.clasrieg_ergo2_postforz, 
historia_clinica.clasrieg_ergo2_movrepet, historia_clinica.clasrieg_ergo2_jortrab, historia_clinica.clasrieg_psi2_monoto, 
historia_clinica.clasrieg_psi2_relhuman, historia_clinica.clasrieg_psi2_contentarea, historia_clinica.clasrieg_psi2_orgtiemptrab, 
historia_clinica.clasrieg_segur2_mecanic, historia_clinica.clasrieg_segur2_electri, historia_clinica.clasrieg_segur2_locat, 
historia_clinica.clasrieg_segur2_fisiquim, historia_clinica.clasrieg_segur2_public, historia_clinica.clasrieg_segur2_espconfi, 
historia_clinica.clasrieg_segur2_trabaltura, historia_clinica.clasrieg_observ2_otro, historia_clinica.clasrieg_observ2_coment, 
historia_clinica.clasrieg_carg3, historia_clinica.clasrieg_fis3_ruid, historia_clinica.clasrieg_fis3_ilum, 
historia_clinica.clasrieg_fis3_noionic, historia_clinica.clasrieg_fis3_vibra, historia_clinica.clasrieg_fis3_tempextrem, 
historia_clinica.clasrieg_fis3_cambpres, historia_clinica.clasrieg_quim3_gasvapor, historia_clinica.clasrieg_quim3_aeroliq, 
historia_clinica.clasrieg_quim3_solid, historia_clinica.clasrieg_quim3_liquid, historia_clinica.clasrieg_biolog3_viru, 
historia_clinica.clasrieg_biolog3_bacter, historia_clinica.clasrieg_biolog3_parasi, historia_clinica.clasrieg_biolog3_morde, 
historia_clinica.clasrieg_biolog3_picad, historia_clinica.clasrieg_biolog3_hongo, historia_clinica.clasrieg_ergo3_trabestat, 
historia_clinica.clasrieg_ergo3_esfuerfis, historia_clinica.clasrieg_ergo3_carga, historia_clinica.clasrieg_ergo3_postforz, 
historia_clinica.clasrieg_ergo3_movrepet, historia_clinica.clasrieg_ergo3_jortrab, historia_clinica.clasrieg_psi3_monoto, 
historia_clinica.clasrieg_psi3_relhuman, historia_clinica.clasrieg_psi3_contentarea, historia_clinica.clasrieg_psi3_orgtiemptrab, 
historia_clinica.clasrieg_segur3_mecanic, historia_clinica.clasrieg_segur3_electri, historia_clinica.clasrieg_segur3_locat, 
historia_clinica.clasrieg_segur3_fisiquim, historia_clinica.clasrieg_segur3_public, historia_clinica.clasrieg_segur3_espconfi, 
historia_clinica.clasrieg_segur3_trabaltura, historia_clinica.clasrieg_observ3_otro, historia_clinica.clasrieg_observ3_coment, 
historia_clinica.ant_impor_accilab, historia_clinica.ant_impor_fecha1, historia_clinica.ant_impor_empre1, 
historia_clinica.ant_impor_causa1, historia_clinica.ant_impor_tip_lesi1, historia_clinica.ant_impor_part_afect1, 
historia_clinica.ant_impor_dias_incap1, historia_clinica.ant_impor_secuela1, historia_clinica.ant_impor_fecha2, 
historia_clinica.ant_impor_empre2, historia_clinica.ant_impor_causa2, historia_clinica.ant_impor_tip_lesi2, 
historia_clinica.ant_impor_part_afect2, historia_clinica.ant_impor_dias_incap2, historia_clinica.ant_impor_secuela2, 
historia_clinica.enf_lab, historia_clinica.enf_cual, historia_clinica.enf_hace_cuanto, historia_clinica.enf_descripcion, 
historia_clinica.ant_fam_no_presenta, historia_clinica.ant_fam_hiper_pad, 
historia_clinica.ant_fam_hiper_mad, historia_clinica.ant_fam_hiper_herm, historia_clinica.ant_fam_hiper_otro, 
historia_clinica.ant_fam_hiper_otro_cual, historia_clinica.ant_fam_diabet_pad, 
historia_clinica.ant_fam_diabet_mad, historia_clinica.ant_fam_diabet_herm, historia_clinica.ant_fam_diabet_otro, 
historia_clinica.ant_fam_diabet_otro_cual, historia_clinica.ant_fam_trombos_pad, 
historia_clinica.ant_fam_trombos_mad, historia_clinica.ant_fam_trombos_herm, 
historia_clinica.ant_fam_trombos_otro, historia_clinica.ant_fam_trombos_otro_cual, 
historia_clinica.ant_fam_tum_malig_pad, 
historia_clinica.ant_fam_tum_malig_mad, historia_clinica.ant_fam_tum_malig_herm, 
historia_clinica.ant_fam_tum_malig_otro, historia_clinica.ant_fam_tum_malig_otro_cual, 
historia_clinica.ant_fam_enf_ment_pad, 
historia_clinica.ant_fam_enf_ment_mad, historia_clinica.ant_fam_enf_ment_herm, 
historia_clinica.ant_fam_enf_ment_otro, historia_clinica.ant_fam_enf_ment_otro_cual, 
historia_clinica.ant_fam_cadio_pad, 
historia_clinica.ant_fam_cadio_mad, historia_clinica.ant_fam_cadio_herm, 
historia_clinica.ant_fam_cadio_otro, historia_clinica.ant_fam_cadio_otro_cual, 
historia_clinica.ant_fam_trans_convul_pad, 
historia_clinica.ant_fam_trans_convul_mad, historia_clinica.ant_fam_trans_convul_herm, 
historia_clinica.ant_fam_trans_convul_otro, historia_clinica.ant_fam_trans_convul_otro_cual, 
historia_clinica.ant_fam_enf_gene_pad, 
historia_clinica.ant_fam_enf_gene_mad, historia_clinica.ant_fam_enf_gene_herm, 
historia_clinica.ant_fam_enf_gene_otro, historia_clinica.ant_fam_enf_gene_otro_cual, 
historia_clinica.ant_fam_alerg_pad, 
historia_clinica.ant_fam_alerg_mad, historia_clinica.ant_fam_alerg_herm, 
historia_clinica.ant_fam_alerg_otro, historia_clinica.ant_fam_alerg_otro_cual, 
historia_clinica.ant_fam_tuber_pad, 
historia_clinica.ant_fam_tuber_mad, historia_clinica.ant_fam_tuber_herm, 
historia_clinica.ant_fam_tuber_otro, historia_clinica.ant_fam_tuber_otro_cual, 
historia_clinica.ant_fam_osteomusc_pad, 
historia_clinica.ant_fam_osteomusc_mad, historia_clinica.ant_fam_osteomusc_herm, 
historia_clinica.ant_fam_osteomusc_otro, historia_clinica.ant_fam_osteomusc_otro_cual, 
historia_clinica.ant_fam_artitri_pad, 
historia_clinica.ant_fam_artitri_mad, historia_clinica.ant_fam_artitri_herm, 
historia_clinica.ant_fam_artitri_otro, historia_clinica.ant_fam_artitri_otro_cual, 
historia_clinica.ant_fam_varice_pad, 
historia_clinica.ant_fam_varice_mad, historia_clinica.ant_fam_varice_herm, 
historia_clinica.ant_fam_varice_otro, historia_clinica.ant_fam_varice_otro_cual, 
historia_clinica.ant_fam_otro_pad, 
historia_clinica.ant_fam_otro_mad, historia_clinica.ant_fam_otro_herm, 
historia_clinica.ant_fam_otro_otro, historia_clinica.ant_fam_otro_otro_cual, 
historia_clinica.ant_fam_descripcion, 
historia_clinica.ant_pato_no_presenta, historia_clinica.ant_pato_neuro, historia_clinica.ant_pato_resp, 
historia_clinica.ant_pato_derma, historia_clinica.ant_pato_psiq, 
historia_clinica.ant_pato_alerg, historia_clinica.ant_pato_osteomusc, 
historia_clinica.ant_pato_gastrointes, historia_clinica.ant_pato_hematolog, 
historia_clinica.ant_pato_org_sentid, historia_clinica.ant_pato_onco, 
historia_clinica.ant_pato_hiperten, historia_clinica.ant_pato_genurinario, 
historia_clinica.ant_pato_infesios, historia_clinica.ant_pato_congenit, 
historia_clinica.ant_pato_farmacolog, historia_clinica.ant_pato_transfus, 
historia_clinica.ant_pato_endocrino, historia_clinica.ant_pato_vascular, 
historia_clinica.ant_pato_auntoinmun, historia_clinica.ant_pato_otro, 
historia_clinica.ant_pato_descripcion, 
historia_clinica.ant_altu_no, historia_clinica.ant_altu_epilep,
historia_clinica.ant_altu_otitmed, historia_clinica.ant_altu_enfmanier,
historia_clinica.ant_altu_traumcran, historia_clinica.ant_altu_tumcereb,
historia_clinica.ant_altu_malfocereb, historia_clinica.ant_altu_trombo,
historia_clinica.ant_altu_hipoac, historia_clinica.ant_altu_arritcardi,
historia_clinica.ant_altu_hipogli, historia_clinica.ant_altu_fobia,
historia_clinica.ant_altu_observ, 
historia_clinica.ant_trau, 
historia_clinica.ant_trau_enfer1, historia_clinica.ant_trau_observ1, 
historia_clinica.ant_trau_fech_aprox1, historia_clinica.ant_trau_enfer2, 
historia_clinica.ant_trau_observ2, historia_clinica.ant_trau_fech_aprox2, 
historia_clinica.ant_trau_enfer3, historia_clinica.ant_trau_observ3, 
historia_clinica.ant_trau_fech_aprox3, 
historia_clinica.ant_quirur, 
historia_clinica.ant_quirur_enfer1, historia_clinica.ant_quirur_observ1, 
historia_clinica.ant_quirur_fech_aprox1, historia_clinica.ant_quirur_enfer2, 
historia_clinica.ant_quirur_observ2, historia_clinica.ant_quirur_fech_aprox2, 
historia_clinica.ant_quirur_enfer3, historia_clinica.ant_quirur_observ3, 
historia_clinica.ant_quirur_fech_aprox3, historia_clinica.costo_motivo_consulta, historia_clinica.cod_factura, 
historia_clinica.ant_inmuni, historia_clinica.ant_inmuni_tetano, historia_clinica.ant_inmuni_tetano_anyo, 
historia_clinica.ant_inmuni_fiebtifo, historia_clinica.ant_inmuni_fiebtifo_anyo, 
historia_clinica.ant_inmuni_hepatita, historia_clinica.ant_inmuni_hepatita_anyo, 
historia_clinica.ant_inmuni_influenza, historia_clinica.ant_inmuni_influenza_anyo, 
historia_clinica.ant_inmuni_hepatitb, historia_clinica.ant_inmuni_hepatitb_anyo, 
historia_clinica.ant_inmuni_saramp, historia_clinica.ant_inmuni_saramp_anyo, 
historia_clinica.ant_inmuni_fiebamarill, historia_clinica.ant_inmuni_fiebamarill_anyo, 
historia_clinica.ant_inmuni_otra, historia_clinica.ant_inmuni_otra_anyo, 
historia_clinica.ant_inmuni_observacion, historia_clinica.ant_gine_prim_mestrua, 
historia_clinica.ant_gine_anyos, historia_clinica.ant_gine_cliclo, 
historia_clinica.ant_gine_fum, historia_clinica.ant_gine_fup, 
historia_clinica.ant_gine_fuc, historia_clinica.ant_gine_fich_gine, 
historia_clinica.ant_gine_fich_gine_g, historia_clinica.ant_gine_fich_gine_p, historia_clinica.ant_gine_fich_gine_a, historia_clinica.ant_gine_fich_gine_c, 
historia_clinica.ant_gine_fich_gine_m, historia_clinica.ant_gine_fich_gine_e, historia_clinica.ant_gine_fich_gine_v, historia_clinica.ant_gine_fech_ult_exa_mama, 
historia_clinica.ant_gine_planifica, historia_clinica.ant_gine_observacion, historia_clinica.habit_tox_fum_nofum_exfum, historia_clinica.habit_tox_ciga_aldia, 
historia_clinica.habit_tox_anyos_fum, historia_clinica.habit_tox_tiem_sinfum, historia_clinica.habit_tox_consum_alcoh, historia_clinica.habit_tox_activ_extralab, 
historia_clinica.habit_tox_activfis, historia_clinica.habit_tox_actividad, historia_clinica.habit_tox_frecuenc, historia_clinica.habit_tox_tiempo, 
historia_clinica.rev_sist_no, historia_clinica.rev_sist_orgsentido, historia_clinica.rev_sist_observ_orgsentido, 
historia_clinica.rev_sist_neurolog, historia_clinica.rev_sist_observ_neurolog, 
historia_clinica.rev_sist_resp, historia_clinica.rev_sist_observ_resp, 
historia_clinica.rev_sist_gastrointes, historia_clinica.rev_sist_observ_gastrointes, 
historia_clinica.rev_sist_geniuri, historia_clinica.rev_sist_observ_geniuri, 
historia_clinica.rev_sist_osteomus, historia_clinica.rev_sist_observ_osteomus, 
historia_clinica.rev_sist_dermato, historia_clinica.rev_sist_noref_dermato, 
historia_clinica.rev_sist_cardiovas, historia_clinica.rev_sist_noref_cardiovas, 
historia_clinica.rev_sist_constitu, historia_clinica.rev_sist_observ_constitu, 
historia_clinica.rev_sist_metabolendocri, historia_clinica.rev_sist_observ_metabolendocri, 
historia_clinica.rev_sist_observ_dermato, historia_clinica.rev_sist_observ_cardiovas, 
historia_clinica.eval_estment_norm_orient, 
historia_clinica.eval_estment_disf_orient, historia_clinica.eval_estment_halla_orient, historia_clinica.eval_estment_norm_atenconcent, 
historia_clinica.eval_estment_disf_atenconcent, historia_clinica.eval_estment_halla_atenconcent, historia_clinica.eval_estment_norm_sensoper, 
historia_clinica.eval_estment_disf_sensoper, historia_clinica.eval_estment_halla_sensoper, historia_clinica.eval_estment_norm_memor, 
historia_clinica.eval_estment_disf_memor, historia_clinica.eval_estment_halla_memor, historia_clinica.eval_estment_norm_pensami, historia_clinica.eval_estment_disf_pensami, 
historia_clinica.eval_estment_halla_pensami, historia_clinica.eval_estment_norm_lenguaj, historia_clinica.eval_estment_disf_lenguaj, 
historia_clinica.eval_estment_halla_lenguaj, historia_clinica.eval_estment_concept, historia_clinica.exa_fis_peso, historia_clinica.exa_fis_talla, 
historia_clinica.exa_fis_imc, historia_clinica.exa_fis_interpreimc, historia_clinica.exa_fis_fresp, historia_clinica.exa_fis_fc, historia_clinica.exa_fis_ta, 
historia_clinica.exa_fis_lateral, historia_clinica.exa_fis_periabdom, historia_clinica.exa_fis_temperat, historia_clinica.exa_fis_concepto, 
historia_clinica.exa_fis_ojoder_sncorre_vlejan, historia_clinica.exa_fis_ojoder_sncorre_vcerca, historia_clinica.exa_fis_ojoder_cncorre_vlejan, 
historia_clinica.exa_fis_ojoder_cncorre_vcerca, historia_clinica.exa_fis_ojoizq_sncorre_vlejan, historia_clinica.exa_fis_ojoizq_sncorre_vcerca, 
historia_clinica.exa_fis_ojoizq_cncorre_vlejan, historia_clinica.exa_fis_ojoizq_cncorre_vcerca, historia_clinica.exa_fis_ojoamb_sncorre_vlejan, 
historia_clinica.exa_fis_ojoamb_sncorre_vcerca, historia_clinica.exa_fis_oojoamb_cncorre_vlejan, historia_clinica.exa_fis_ojoamb_cncorre_vcerca, 
historia_clinica.exa_fis,
historia_clinica.exa_fis_ojo, historia_clinica.exa_fis_ojo_obser, 
historia_clinica.exa_fis_oido, historia_clinica.exa_fis_oido_obser, historia_clinica.exa_fis_cabeza, historia_clinica.exa_fis_cabeza_obser, 
historia_clinica.exa_fis_nariz, historia_clinica.exa_fis_nariz_obser, historia_clinica.exa_fis_orofaring, historia_clinica.exa_fis_orofaring_obser, 
historia_clinica.exa_fis_cuello, historia_clinica.exa_fis_cuello_obser, historia_clinica.exa_fis_torax, historia_clinica.exa_fis_torax_obser, 
historia_clinica.exa_fis_glandumama, historia_clinica.exa_fis_glandumama_obser, historia_clinica.exa_fis_cardiopulm, historia_clinica.exa_fis_cardiopulm_obser, 
historia_clinica.exa_fis_abdomen, historia_clinica.exa_fis_abdomen_obser, historia_clinica.exa_fis_genital, historia_clinica.exa_fis_genital_obser, 
historia_clinica.exa_fis_miemsup, historia_clinica.exa_fis_miemsup_obser, historia_clinica.exa_fis_mieminf, historia_clinica.exa_fis_mieminf_obser, 
historia_clinica.exa_fis_columna, historia_clinica.exa_fis_columna_obser, historia_clinica.exa_fis_neurolog, historia_clinica.exa_fis_neurolog_obser,
historia_clinica.exa_fis_neurolog_romberg, historia_clinica.exa_fis_neurolog_barany, historia_clinica.exa_fis_neurolog_dixhalp,
historia_clinica.exa_fis_neurolog_mciega, historia_clinica.exa_fis_neurolog_pciega, 
historia_clinica.exa_fis_estmentaparent, historia_clinica.exa_fis_estmentaparent_obser, historia_clinica.exa_fis_pielfanera, 
historia_clinica.exa_fis_pielfanera_obser, historia_clinica.exaosteo_norm_anorm, historia_clinica.exaosteo_homb_movart, historia_clinica.exaosteo_homb_fuerza, 
historia_clinica.exaosteo_manjobe_sig, historia_clinica.exaosteo_manjobe_lat, historia_clinica.exaosteo_manjobe_movart, 
historia_clinica.exaosteo_manjobe_fuerza, historia_clinica.exaosteo_manyega_sig, historia_clinica.exaosteo_manyega_lat, historia_clinica.exaosteo_manyega_movart, 
historia_clinica.exaosteo_manyega_fuerza, historia_clinica.exaosteo_manpatte_sig, 
historia_clinica.exaosteo_manpatte_lat, historia_clinica.exaosteo_epicond_sig, historia_clinica.exaosteo_epicond_lat, 
historia_clinica.exaosteo_tinel_sig, historia_clinica.exaosteo_tinel_lat, historia_clinica.exaosteo_epitro_sig, historia_clinica.exaosteo_epitro_lat, 
historia_clinica.exaosteo_phalen_sig, historia_clinica.exaosteo_phalen_lat, historia_clinica.exaosteo_thomp_sig, historia_clinica.exaosteo_thomp_lat, 
historia_clinica.exaosteo_finkel_sig, historia_clinica.exaosteo_finkel_lat, historia_clinica.exaosteo_laseg_sig, 
historia_clinica.exaosteo_bostezo_sig, historia_clinica.exaosteo_bostezo_lat, historia_clinica.exaosteo_flexion, historia_clinica.exaosteo_cajon_sig, 
historia_clinica.exaosteo_cajon_lat, historia_clinica.exaosteo_extension, historia_clinica.exaosteo_mcmurray_sig, historia_clinica.exaosteo_mcmurray_lat, 
historia_clinica.exaosteo_bragard_sig, historia_clinica.exaosteo_bragard_lat, historia_clinica.exaosteo_tredelen, historia_clinica.exaosteo_valmarcha, 
historia_clinica.exaosteo_observ, historia_clinica.paracli_audimet, historia_clinica.paracli_audimet_observ, historia_clinica.paracli_visiomet, 
historia_clinica.paracli_visiomet_observ, historia_clinica.paracli_torax, historia_clinica.paracli_torax_observ, historia_clinica.paracli_espiro, 
historia_clinica.paracli_espiro_observ, historia_clinica.paracli_ekg, historia_clinica.paracli_ekg_observ, historia_clinica.paracli_rxcolum, 
historia_clinica.paracli_rxcolum_observ, historia_clinica.paracli_otrcomplement, historia_clinica.paracli_otrcomplement_observ, historia_clinica.paracli_fisiote, 
historia_clinica.paracli_fisiote_observ, historia_clinica.paracli_lab, historia_clinica.paracli_lab_observ, historia_clinica.paracli_otro, 
historia_clinica.paracli_otro_observ, historia_clinica.control_examen, historia_clinica.cod_tipo_historia_clinica, historia_clinica.cod_estado_facturacion, 
historia_clinica.total_terapia, historia_clinica.nombre_laboratorio, 
historia_clinica.nombre_medicamento, historia_clinica.descripcion_medicamento, historia_clinica.nombre_ayuda_diagnostica, 
historia_clinica.descripcion_ayuda_diagnostica, historia_clinica.nombre_religion, historia_clinica.nombre_ocupacion, 
historia_clinica.nombre_estado_civil, historia_clinica.nombre_escolaridad, historia_clinica.nombre_tipo_regimen, historia_clinica.nombre_fondo_pension, 
historia_clinica.nombre_actividad_ecoemp, historia_clinica.nombre_estrato, historia_clinica.nombre_numero_hijos, 
historia_clinica.nombre_arl, historia_clinica.nombre_empresa, historia_clinica.cargo_empresa, historia_clinica.area_empresa, 
historia_clinica.ciudad_empresa, historia_clinica.nombre_empresa_contratante, historia_clinica.tel_cliente AS tel_cliente_hist, historia_clinica.correo, 
historia_clinica.cod_entidad, historia_clinica.lugar_residencia, historia_clinica.nombre_contacto1, historia_clinica.tel_contacto1, 
historia_clinica.parentesco_contacto1, historia_clinica.direccion_contacto1, historia_clinica.fecha_mes, historia_clinica.fecha_anyo, 
historia_clinica.fecha_ymd, historia_clinica.fecha_dmy, historia_clinica.hora, historia_clinica.fecha_time, historia_clinica.fecha_reg_time, 
historia_clinica.url_img_firma_min, historia_clinica.url_img_firma_orig, 
historia_clinica.url_img_foto_min, historia_clinica.url_img_foto_orig, historia_clinica.cuenta, historia_clinica.cuenta_reg, 
cliente.lugar_procedencia, historia_clinica.cod_administrador
FROM cliente RIGHT JOIN historia_clinica ON cliente.cod_cliente = historia_clinica.cod_cliente 
WHERE (historia_clinica.cod_historia_clinica = '$cod_historia_clinica')";
$resultado_historia_clinica = mysqli_query($conectar, $sql_historia_clinica);
$info_historia_clinica = mysqli_fetch_assoc($resultado_historia_clinica);

$cod_entidad                  = $info_historia_clinica['cod_entidad'];
$cod_administrador            = $info_historia_clinica['cod_administrador'];
// ------------------------------------------------------------------------------------------------------------------------- //
// ------------------------------------------------------------------------------------------------------------------------- //
$sql_entidad = "SELECT nombre_entidad FROM entidad WHERE cod_entidad = '$cod_entidad'";
$resultado_entidad = mysqli_query($conectar, $sql_entidad);
$info_entidad = mysqli_fetch_assoc($resultado_entidad);

$nombre_entidad               = $info_entidad['nombre_entidad'];
// ------------------------------------------------------------------------------------------------------------------------- //
// ------------------------------------------------------------------------------------------------------------------------- //
$sql_profesional = "SELECT nombres, apellidos FROM administrador WHERE cod_administrador = '$cod_administrador'";
$resultado_profesional = mysqli_query($conectar, $sql_profesional);
$info_profesional = mysqli_fetch_assoc($resultado_profesional);

$nombres_prof                 = $info_profesional['nombres'];
$apellidos_prof               = $info_profesional['apellidos'];
// ------------------------------------------------------------------------------------------------------------------------- //
// ------------------------------------------------------------------------------------------------------------------------- //
$cedula                       = $info_historia_clinica['cedula'];
$nombres_cli                  = $info_historia_clinica['nombres'];
$apellido1_cli                = $info_historia_clinica['apellido1'];
$apellido2_cli                = $info_historia_clinica['apellido2'];
$nombre_ocupacion             = $info_historia_clinica['nombre_ocupacion'];
$nombres_completos            = $nombres_cli.' '.$apellido1_cli;
$fecha_nac_ymd                = $info_historia_clinica['fecha_nac_ymd'];
$fecha_nac_timedb             = $info_historia_clinica['fecha_nac_time'];
$fecha_nac_time               = strtotime($fecha_nac_ymd);
$diferencia_edad              = abs($fecha_hoy_time - $fecha_nac_time);
$edad_anyo                    = floor($diferencia_edad / (365*60*60*24));
//$edad_anyo = $info_historia_clinica['edad_anyo'];
// ------------------------------------------------------------------------------------------------------------------------- //
// ------------------------------------------------------------------------------------------------------------------------- //
$nombre_grupo_rh              = $info_historia_clinica['nombre_grupo_rh'];
$tel_cliente                  = $info_historia_clinica['tel_cliente_cli'];
$nombre_tipo_doc              = $info_historia_clinica['nombre_tipo_doc'];
$nombre_sexo                  = $info_historia_clinica['nombre_sexo'];
$nombre_contacto1             = $info_historia_clinica['nombre_contacto1'];
$parentesco_contacto1         = $info_historia_clinica['parentesco_contacto1'];
$tel_contacto1                = $info_historia_clinica['tel_contacto1'];
$antperson_alergia_si         = $info_historia_clinica['antperson_alergia_si'];
$antperson_alergia_no         = $info_historia_clinica['antperson_alergia_no'];
$antperson_patologico_si      = $info_historia_clinica['antperson_patologico_si'];
$antperson_patologico_no      = $info_historia_clinica['antperson_patologico_no'];
$antperson_quirurgico_si      = $info_historia_clinica['antperson_quirurgico_si'];
$antperson_quirurgico_no      = $info_historia_clinica['antperson_quirurgico_no'];
$url_img_firma_min_cli        = $info_historia_clinica['url_img_firma_min_cli'];
$url_img_firma_cli            = $info_historia_clinica['url_img_firma_cli'];
$url_img_foto_min_cli         = $info_historia_clinica['url_img_foto_min_cli'];
$url_img_foto_cli             = $info_historia_clinica['url_img_foto_cli'];
$url_img_firma_min            = $info_historia_clinica['url_img_firma_min'];
$url_img_firma_orig           = $info_historia_clinica['url_img_firma_orig'];
$url_img_foto_min             = $info_historia_clinica['url_img_foto_min'];
$url_img_foto_orig            = $info_historia_clinica['url_img_foto_orig'];
$nombre_tipo_regimen          = $info_historia_clinica['nombre_tipo_regimen'];
$nombre_fondo_pension         = $info_historia_clinica['nombre_fondo_pension'];
$nombre_numero_hijos          = $info_historia_clinica['nombre_numero_hijos'];
$lugar_residencia             = $info_historia_clinica['lugar_residencia'];
$nombre_estado_civil          = $info_historia_clinica['nombre_estado_civil'];
$nombre_arl                   = $info_historia_clinica['nombre_arl'];
$lugar_nac                    = $info_historia_clinica['lugar_nac'];
$nombre_raza                  = $info_historia_clinica['nombre_raza'];
$nombre_escolaridad           = $info_historia_clinica['nombre_escolaridad'];
$direccion_contacto1          = $info_historia_clinica['direccion_contacto1'];
$direccion_contacto2          = $info_historia_clinica['direccion_contacto2'];
$nombre_empresa               = $info_historia_clinica['nombre_empresa'];
$nombre_empresa_contratante   = $info_historia_clinica['nombre_empresa_contratante'];
$nombre_actividad_ecoemp      = $info_historia_clinica['nombre_actividad_ecoemp'];

$motivo                       = $info_historia_clinica['motivo'];
$cod_grupo_area               = $info_historia_clinica['cod_grupo_area'];
$cod_grupo_area_cargo         = $info_historia_clinica['cod_grupo_area_cargo'];
$dat_ocupa_emp1               = $info_historia_clinica['dat_ocupa_emp1'];
$dat_ocupa_carg1              = $info_historia_clinica['dat_ocupa_carg1'];
$dat_ocupa_visu1              = $info_historia_clinica['dat_ocupa_visu1'];
$dat_ocupa_audi1              = $info_historia_clinica['dat_ocupa_audi1'];
$dat_ocupa_altu1              = $info_historia_clinica['dat_ocupa_altu1'];
$dat_ocupa_resp1              = $info_historia_clinica['dat_ocupa_resp1'];
$dat_ocupa_fech_ini1          = $info_historia_clinica['dat_ocupa_fech_ini1'];
$dat_ocupa_dura_anyo1         = $info_historia_clinica['dat_ocupa_dura_anyo1'];
$dat_ocupa_emp2               = $info_historia_clinica['dat_ocupa_emp2'];
$dat_ocupa_carg2              = $info_historia_clinica['dat_ocupa_carg2'];
$dat_ocupa_visu2              = $info_historia_clinica['dat_ocupa_visu2'];
$dat_ocupa_audi2              = $info_historia_clinica['dat_ocupa_audi2'];
$dat_ocupa_altu2              = $info_historia_clinica['dat_ocupa_altu2'];
$dat_ocupa_resp2              = $info_historia_clinica['dat_ocupa_resp2'];
$dat_ocupa_fech_ini2          = $info_historia_clinica['dat_ocupa_fech_ini2'];
$dat_ocupa_dura_anyo2         = $info_historia_clinica['dat_ocupa_dura_anyo2'];
$dat_ocupa_emp3               = $info_historia_clinica['dat_ocupa_emp3'];
$dat_ocupa_carg3              = $info_historia_clinica['dat_ocupa_carg3'];
$dat_ocupa_visu3              = $info_historia_clinica['dat_ocupa_visu3'];
$dat_ocupa_audi3              = $info_historia_clinica['dat_ocupa_audi3'];
$dat_ocupa_altu3              = $info_historia_clinica['dat_ocupa_altu3'];
$dat_ocupa_resp3              = $info_historia_clinica['dat_ocupa_resp3'];
$dat_ocupa_fech_ini3          = $info_historia_clinica['dat_ocupa_fech_ini3'];
$dat_ocupa_dura_anyo3         = $info_historia_clinica['dat_ocupa_dura_anyo3'];
$dat_ocupa_observacion        = $info_historia_clinica['dat_ocupa_observacion'];
$clasrieg_carg1               = $info_historia_clinica['clasrieg_carg1'];
$clasrieg_fis1_ruid           = $info_historia_clinica['clasrieg_fis1_ruid'];
$clasrieg_fis1_ilum           = $info_historia_clinica['clasrieg_fis1_ilum'];
$clasrieg_fis1_noionic        = $info_historia_clinica['clasrieg_fis1_noionic'];
$clasrieg_fis1_vibra          = $info_historia_clinica['clasrieg_fis1_vibra'];
$clasrieg_fis1_tempextrem     = $info_historia_clinica['clasrieg_fis1_tempextrem'];
$clasrieg_fis1_cambpres       = $info_historia_clinica['clasrieg_fis1_cambpres'];
$clasrieg_quim1_gasvapor      = $info_historia_clinica['clasrieg_quim1_gasvapor'];
$clasrieg_quim1_aeroliq       = $info_historia_clinica['clasrieg_quim1_aeroliq'];
$clasrieg_quim1_solid         = $info_historia_clinica['clasrieg_quim1_solid'];
$clasrieg_quim1_liquid        = $info_historia_clinica['clasrieg_quim1_liquid'];
$clasrieg_biolog1_viru        = $info_historia_clinica['clasrieg_biolog1_viru'];
$clasrieg_biolog1_bacter      = $info_historia_clinica['clasrieg_biolog1_bacter'];
$clasrieg_biolog1_parasi      = $info_historia_clinica['clasrieg_biolog1_parasi'];
$clasrieg_biolog1_morde       = $info_historia_clinica['clasrieg_biolog1_morde'];
$clasrieg_biolog1_picad       = $info_historia_clinica['clasrieg_biolog1_picad'];
$clasrieg_biolog1_hongo       = $info_historia_clinica['clasrieg_biolog1_hongo'];
$clasrieg_ergo1_trabestat     = $info_historia_clinica['clasrieg_ergo1_trabestat'];
$clasrieg_ergo1_esfuerfis     = $info_historia_clinica['clasrieg_ergo1_esfuerfis'];
$clasrieg_ergo1_carga         = $info_historia_clinica['clasrieg_ergo1_carga'];
$clasrieg_ergo1_postforz      = $info_historia_clinica['clasrieg_ergo1_postforz'];
$clasrieg_ergo1_movrepet      = $info_historia_clinica['clasrieg_ergo1_movrepet'];
$clasrieg_ergo1_jortrab       = $info_historia_clinica['clasrieg_ergo1_jortrab'];
$clasrieg_psi1_monoto         = $info_historia_clinica['clasrieg_psi1_monoto'];
$clasrieg_psi1_relhuman       = $info_historia_clinica['clasrieg_psi1_relhuman'];
$clasrieg_psi1_contentarea    = $info_historia_clinica['clasrieg_psi1_contentarea'];
$clasrieg_psi1_orgtiemptrab   = $info_historia_clinica['clasrieg_psi1_orgtiemptrab'];
$clasrieg_segur1_mecanic      = $info_historia_clinica['clasrieg_segur1_mecanic'];
$clasrieg_segur1_electri      = $info_historia_clinica['clasrieg_segur1_electri'];
$clasrieg_segur1_locat        = $info_historia_clinica['clasrieg_segur1_locat'];
$clasrieg_segur1_fisiquim     = $info_historia_clinica['clasrieg_segur1_fisiquim'];
$clasrieg_segur1_public       = $info_historia_clinica['clasrieg_segur1_public'];
$clasrieg_segur1_espconfi     = $info_historia_clinica['clasrieg_segur1_espconfi'];
$clasrieg_segur1_trabaltura   = $info_historia_clinica['clasrieg_segur1_trabaltura'];
$clasrieg_observ1_otro        = $info_historia_clinica['clasrieg_observ1_otro'];
$clasrieg_observ1_coment      = $info_historia_clinica['clasrieg_observ1_coment'];
$clasrieg_carg2               = $info_historia_clinica['clasrieg_carg2'];
$clasrieg_fis2_ruid           = $info_historia_clinica['clasrieg_fis2_ruid'];
$clasrieg_fis2_ilum           = $info_historia_clinica['clasrieg_fis2_ilum'];
$clasrieg_fis2_noionic        = $info_historia_clinica['clasrieg_fis2_noionic'];
$clasrieg_fis2_vibra          = $info_historia_clinica['clasrieg_fis2_vibra'];
$clasrieg_fis2_tempextrem     = $info_historia_clinica['clasrieg_fis2_tempextrem'];
$clasrieg_fis2_cambpres       = $info_historia_clinica['clasrieg_fis2_cambpres'];
$clasrieg_quim2_gasvapor      = $info_historia_clinica['clasrieg_quim2_gasvapor'];
$clasrieg_quim2_aeroliq       = $info_historia_clinica['clasrieg_quim2_aeroliq'];
$clasrieg_quim2_solid         = $info_historia_clinica['clasrieg_quim2_solid'];
$clasrieg_quim2_liquid        = $info_historia_clinica['clasrieg_quim2_liquid'];
$clasrieg_biolog2_viru        = $info_historia_clinica['clasrieg_biolog2_viru'];
$clasrieg_biolog2_bacter      = $info_historia_clinica['clasrieg_biolog2_bacter'];
$clasrieg_biolog2_parasi      = $info_historia_clinica['clasrieg_biolog2_parasi'];
$clasrieg_biolog2_morde       = $info_historia_clinica['clasrieg_biolog2_morde'];
$clasrieg_biolog2_picad       = $info_historia_clinica['clasrieg_biolog2_picad'];
$clasrieg_biolog2_hongo       = $info_historia_clinica['clasrieg_biolog2_hongo'];
$clasrieg_ergo2_trabestat     = $info_historia_clinica['clasrieg_ergo2_trabestat'];
$clasrieg_ergo2_esfuerfis     = $info_historia_clinica['clasrieg_ergo2_esfuerfis'];
$clasrieg_ergo2_carga         = $info_historia_clinica['clasrieg_ergo2_carga'];
$clasrieg_ergo2_postforz      = $info_historia_clinica['clasrieg_ergo2_postforz'];
$clasrieg_ergo2_movrepet      = $info_historia_clinica['clasrieg_ergo2_movrepet'];
$clasrieg_ergo2_jortrab       = $info_historia_clinica['clasrieg_ergo2_jortrab'];
$clasrieg_psi2_monoto         = $info_historia_clinica['clasrieg_psi2_monoto'];
$clasrieg_psi2_relhuman       = $info_historia_clinica['clasrieg_psi2_relhuman'];
$clasrieg_psi2_contentarea    = $info_historia_clinica['clasrieg_psi2_contentarea'];
$clasrieg_psi2_orgtiemptrab   = $info_historia_clinica['clasrieg_psi2_orgtiemptrab'];
$clasrieg_segur2_mecanic      = $info_historia_clinica['clasrieg_segur2_mecanic'];
$clasrieg_segur2_electri      = $info_historia_clinica['clasrieg_segur2_electri'];
$clasrieg_segur2_locat        = $info_historia_clinica['clasrieg_segur2_locat'];
$clasrieg_segur2_fisiquim     = $info_historia_clinica['clasrieg_segur2_fisiquim'];
$clasrieg_segur2_public       = $info_historia_clinica['clasrieg_segur2_public'];
$clasrieg_segur2_espconfi     = $info_historia_clinica['clasrieg_segur2_espconfi'];
$clasrieg_segur2_trabaltura   = $info_historia_clinica['clasrieg_segur2_trabaltura'];
$clasrieg_observ2_otro        = $info_historia_clinica['clasrieg_observ2_otro'];
$clasrieg_observ2_coment      = $info_historia_clinica['clasrieg_observ2_coment'];
$clasrieg_carg3               = $info_historia_clinica['clasrieg_carg3'];
$clasrieg_fis3_ruid           = $info_historia_clinica['clasrieg_fis3_ruid'];
$clasrieg_fis3_ilum           = $info_historia_clinica['clasrieg_fis3_ilum'];
$clasrieg_fis3_noionic        = $info_historia_clinica['clasrieg_fis3_noionic'];
$clasrieg_fis3_vibra          = $info_historia_clinica['clasrieg_fis3_vibra'];
$clasrieg_fis3_tempextrem     = $info_historia_clinica['clasrieg_fis3_tempextrem'];
$clasrieg_fis3_cambpres       = $info_historia_clinica['clasrieg_fis3_cambpres'];
$clasrieg_quim3_gasvapor      = $info_historia_clinica['clasrieg_quim3_gasvapor'];
$clasrieg_quim3_aeroliq       = $info_historia_clinica['clasrieg_quim3_aeroliq'];
$clasrieg_quim3_solid         = $info_historia_clinica['clasrieg_quim3_solid'];
$clasrieg_quim3_liquid        = $info_historia_clinica['clasrieg_quim3_liquid'];
$clasrieg_biolog3_viru        = $info_historia_clinica['clasrieg_biolog3_viru'];
$clasrieg_biolog3_bacter      = $info_historia_clinica['clasrieg_biolog3_bacter'];
$clasrieg_biolog3_parasi      = $info_historia_clinica['clasrieg_biolog3_parasi'];
$clasrieg_biolog3_morde       = $info_historia_clinica['clasrieg_biolog3_morde'];
$clasrieg_biolog3_picad       = $info_historia_clinica['clasrieg_biolog3_picad'];
$clasrieg_biolog3_hongo       = $info_historia_clinica['clasrieg_biolog3_hongo'];
$clasrieg_ergo3_trabestat     = $info_historia_clinica['clasrieg_ergo3_trabestat'];
$clasrieg_ergo3_esfuerfis     = $info_historia_clinica['clasrieg_ergo3_esfuerfis'];
$clasrieg_ergo3_carga         = $info_historia_clinica['clasrieg_ergo3_carga'];
$clasrieg_ergo3_postforz      = $info_historia_clinica['clasrieg_ergo3_postforz'];
$clasrieg_ergo3_movrepet      = $info_historia_clinica['clasrieg_ergo3_movrepet'];
$clasrieg_ergo3_jortrab       = $info_historia_clinica['clasrieg_ergo3_jortrab'];
$clasrieg_psi3_monoto         = $info_historia_clinica['clasrieg_psi3_monoto'];
$clasrieg_psi3_relhuman       = $info_historia_clinica['clasrieg_psi3_relhuman'];
$clasrieg_psi3_contentarea    = $info_historia_clinica['clasrieg_psi3_contentarea'];
$clasrieg_psi3_orgtiemptrab   = $info_historia_clinica['clasrieg_psi3_orgtiemptrab'];
$clasrieg_segur3_mecanic      = $info_historia_clinica['clasrieg_segur3_mecanic'];
$clasrieg_segur3_electri      = $info_historia_clinica['clasrieg_segur3_electri'];
$clasrieg_segur3_locat        = $info_historia_clinica['clasrieg_segur3_locat'];
$clasrieg_segur3_fisiquim     = $info_historia_clinica['clasrieg_segur3_fisiquim'];
$clasrieg_segur3_public       = $info_historia_clinica['clasrieg_segur3_public'];
$clasrieg_segur3_espconfi     = $info_historia_clinica['clasrieg_segur3_espconfi'];
$clasrieg_segur3_trabaltura   = $info_historia_clinica['clasrieg_segur3_trabaltura'];
$clasrieg_observ3_otro        = $info_historia_clinica['clasrieg_observ3_otro'];
$clasrieg_observ3_coment      = $info_historia_clinica['clasrieg_observ3_coment'];
$ant_impor_accilab            = $info_historia_clinica['ant_impor_accilab'];
$ant_impor_fecha1             = $info_historia_clinica['ant_impor_fecha1'];
$ant_impor_empre1             = $info_historia_clinica['ant_impor_empre1'];
$ant_impor_causa1             = $info_historia_clinica['ant_impor_causa1'];
$ant_impor_tip_lesi1          = $info_historia_clinica['ant_impor_tip_lesi1'];
$ant_impor_part_afect1        = $info_historia_clinica['ant_impor_part_afect1'];
$ant_impor_dias_incap1        = $info_historia_clinica['ant_impor_dias_incap1'];
$ant_impor_secuela1           = $info_historia_clinica['ant_impor_secuela1'];
$ant_impor_fecha2             = $info_historia_clinica['ant_impor_fecha2'];
$ant_impor_empre2             = $info_historia_clinica['ant_impor_empre2'];
$ant_impor_causa2             = $info_historia_clinica['ant_impor_causa2'];
$ant_impor_tip_lesi2          = $info_historia_clinica['ant_impor_tip_lesi2'];
$ant_impor_part_afect2        = $info_historia_clinica['ant_impor_part_afect2'];
$ant_impor_dias_incap2        = $info_historia_clinica['ant_impor_dias_incap2'];
$ant_impor_secuela2           = $info_historia_clinica['ant_impor_secuela2'];
$enf_lab                      = $info_historia_clinica['enf_lab'];
$enf_cual                     = $info_historia_clinica['enf_cual'];
$enf_hace_cuanto              = $info_historia_clinica['enf_hace_cuanto'];
$enf_descripcion              = $info_historia_clinica['enf_descripcion'];
$ant_fam_no_presenta          = $info_historia_clinica['ant_fam_no_presenta'];
$ant_fam_hiper_pad            = $info_historia_clinica['ant_fam_hiper_pad'];
$ant_fam_hiper_mad            = $info_historia_clinica['ant_fam_hiper_mad'];
$ant_fam_hiper_herm           = $info_historia_clinica['ant_fam_hiper_herm'];
$ant_fam_hiper_otro           = $info_historia_clinica['ant_fam_hiper_otro'];
$ant_fam_hiper_otro_cual      = $info_historia_clinica['ant_fam_hiper_otro_cual'];
$ant_fam_diabet_pad           = $info_historia_clinica['ant_fam_diabet_pad'];
$ant_fam_diabet_mad           = $info_historia_clinica['ant_fam_diabet_mad'];
$ant_fam_diabet_herm          = $info_historia_clinica['ant_fam_diabet_herm'];
$ant_fam_diabet_otro          = $info_historia_clinica['ant_fam_diabet_otro'];
$ant_fam_diabet_otro_cual     = $info_historia_clinica['ant_fam_diabet_otro_cual'];
$ant_fam_trombos_pad          = $info_historia_clinica['ant_fam_trombos_pad'];
$ant_fam_trombos_mad          = $info_historia_clinica['ant_fam_trombos_mad'];
$ant_fam_trombos_herm         = $info_historia_clinica['ant_fam_trombos_herm'];
$ant_fam_trombos_otro         = $info_historia_clinica['ant_fam_trombos_otro'];
$ant_fam_trombos_otro_cual    = $info_historia_clinica['ant_fam_trombos_otro_cual'];
$ant_fam_tum_malig_pad        = $info_historia_clinica['ant_fam_tum_malig_pad'];
$ant_fam_tum_malig_mad        = $info_historia_clinica['ant_fam_tum_malig_mad'];
$ant_fam_tum_malig_herm       = $info_historia_clinica['ant_fam_tum_malig_herm'];
$ant_fam_tum_malig_otro       = $info_historia_clinica['ant_fam_tum_malig_otro'];
$ant_fam_tum_malig_otro_cual  = $info_historia_clinica['ant_fam_tum_malig_otro_cual'];
$ant_fam_enf_ment_pad         = $info_historia_clinica['ant_fam_enf_ment_pad'];
$ant_fam_enf_ment_mad         = $info_historia_clinica['ant_fam_enf_ment_mad'];
$ant_fam_enf_ment_herm        = $info_historia_clinica['ant_fam_enf_ment_herm'];
$ant_fam_enf_ment_otro        = $info_historia_clinica['ant_fam_enf_ment_otro'];
$ant_fam_enf_ment_otro_cual   = $info_historia_clinica['ant_fam_enf_ment_otro_cual'];
$ant_fam_cadio_pad            = $info_historia_clinica['ant_fam_cadio_pad'];
$ant_fam_cadio_mad            = $info_historia_clinica['ant_fam_cadio_mad'];
$ant_fam_cadio_herm           = $info_historia_clinica['ant_fam_cadio_herm'];
$ant_fam_cadio_otro           = $info_historia_clinica['ant_fam_cadio_otro'];
$ant_fam_cadio_otro_cual      = $info_historia_clinica['ant_fam_cadio_otro_cual'];
$ant_fam_trans_convul_pad     = $info_historia_clinica['ant_fam_trans_convul_pad'];
$ant_fam_trans_convul_mad     = $info_historia_clinica['ant_fam_trans_convul_mad'];
$ant_fam_trans_convul_herm    = $info_historia_clinica['ant_fam_trans_convul_herm'];
$ant_fam_trans_convul_otro    = $info_historia_clinica['ant_fam_trans_convul_otro'];
$ant_fam_trans_convul_otro_cual = $info_historia_clinica['ant_fam_trans_convul_otro_cual'];
$ant_fam_enf_gene_pad         = $info_historia_clinica['ant_fam_enf_gene_pad'];
$ant_fam_enf_gene_mad         = $info_historia_clinica['ant_fam_enf_gene_mad'];
$ant_fam_enf_gene_herm        = $info_historia_clinica['ant_fam_enf_gene_herm'];
$ant_fam_enf_gene_otro        = $info_historia_clinica['ant_fam_enf_gene_otro'];
$ant_fam_enf_gene_otro_cual   = $info_historia_clinica['ant_fam_enf_gene_otro_cual'];
$ant_fam_alerg_pad            = $info_historia_clinica['ant_fam_alerg_pad'];
$ant_fam_alerg_mad            = $info_historia_clinica['ant_fam_alerg_mad'];
$ant_fam_alerg_herm           = $info_historia_clinica['ant_fam_alerg_herm'];
$ant_fam_alerg_otro           = $info_historia_clinica['ant_fam_alerg_otro'];
$ant_fam_alerg_otro_cual      = $info_historia_clinica['ant_fam_alerg_otro_cual'];
$ant_fam_tuber_pad            = $info_historia_clinica['ant_fam_tuber_pad'];
$ant_fam_tuber_mad            = $info_historia_clinica['ant_fam_tuber_mad'];
$ant_fam_tuber_herm           = $info_historia_clinica['ant_fam_tuber_herm'];
$ant_fam_tuber_otro           = $info_historia_clinica['ant_fam_tuber_otro'];
$ant_fam_tuber_otro_cual      = $info_historia_clinica['ant_fam_tuber_otro_cual'];
$ant_fam_osteomusc_pad        = $info_historia_clinica['ant_fam_osteomusc_pad'];
$ant_fam_osteomusc_mad        = $info_historia_clinica['ant_fam_osteomusc_mad'];
$ant_fam_osteomusc_herm       = $info_historia_clinica['ant_fam_osteomusc_herm'];
$ant_fam_osteomusc_otro       = $info_historia_clinica['ant_fam_osteomusc_otro'];
$ant_fam_osteomusc_otro_cual  = $info_historia_clinica['ant_fam_osteomusc_otro_cual'];
$ant_fam_artitri_pad          = $info_historia_clinica['ant_fam_artitri_pad'];
$ant_fam_artitri_mad          = $info_historia_clinica['ant_fam_artitri_mad'];
$ant_fam_artitri_herm         = $info_historia_clinica['ant_fam_artitri_herm'];
$ant_fam_artitri_otro         = $info_historia_clinica['ant_fam_artitri_otro'];
$ant_fam_artitri_otro_cual    = $info_historia_clinica['ant_fam_artitri_otro_cual'];
$ant_fam_varice_pad           = $info_historia_clinica['ant_fam_varice_pad'];
$ant_fam_varice_mad           = $info_historia_clinica['ant_fam_varice_mad'];
$ant_fam_varice_herm          = $info_historia_clinica['ant_fam_varice_herm'];
$ant_fam_varice_otro          = $info_historia_clinica['ant_fam_varice_otro'];
$ant_fam_varice_otro_cual     = $info_historia_clinica['ant_fam_varice_otro_cual'];
$ant_fam_otro_pad             = $info_historia_clinica['ant_fam_otro_pad'];
$ant_fam_otro_mad             = $info_historia_clinica['ant_fam_otro_mad'];
$ant_fam_otro_herm            = $info_historia_clinica['ant_fam_otro_herm'];
$ant_fam_otro_otro            = $info_historia_clinica['ant_fam_otro_otro'];
$ant_fam_otro_otro_cual       = $info_historia_clinica['ant_fam_otro_otro_cual'];
$ant_fam_descripcion          = $info_historia_clinica['ant_fam_descripcion'];
$ant_pato_no_presenta         = $info_historia_clinica['ant_pato_no_presenta'];
$ant_pato_neuro               = $info_historia_clinica['ant_pato_neuro'];
$ant_pato_resp                = $info_historia_clinica['ant_pato_resp'];
$ant_pato_derma               = $info_historia_clinica['ant_pato_derma'];
$ant_pato_psiq                = $info_historia_clinica['ant_pato_psiq'];
$ant_pato_alerg               = $info_historia_clinica['ant_pato_alerg'];
$ant_pato_osteomusc           = $info_historia_clinica['ant_pato_osteomusc'];
$ant_pato_gastrointes         = $info_historia_clinica['ant_pato_gastrointes'];
$ant_pato_hematolog           = $info_historia_clinica['ant_pato_hematolog'];
$ant_pato_org_sentid          = $info_historia_clinica['ant_pato_org_sentid'];
$ant_pato_onco                = $info_historia_clinica['ant_pato_onco'];
$ant_pato_hiperten            = $info_historia_clinica['ant_pato_hiperten'];
$ant_pato_genurinario         = $info_historia_clinica['ant_pato_genurinario'];
$ant_pato_infesios            = $info_historia_clinica['ant_pato_infesios'];
$ant_pato_congenit            = $info_historia_clinica['ant_pato_congenit'];
$ant_pato_farmacolog          = $info_historia_clinica['ant_pato_farmacolog'];
$ant_pato_transfus            = $info_historia_clinica['ant_pato_transfus'];
$ant_pato_endocrino           = $info_historia_clinica['ant_pato_endocrino'];
$ant_pato_vascular            = $info_historia_clinica['ant_pato_vascular'];
$ant_pato_auntoinmun          = $info_historia_clinica['ant_pato_auntoinmun'];
$ant_pato_otro                = $info_historia_clinica['ant_pato_otro'];
$ant_pato_descripcion         = $info_historia_clinica['ant_pato_descripcion'];
$ant_altu_no                  = $info_historia_clinica['ant_altu_no'];
$ant_altu_epilep              = $info_historia_clinica['ant_altu_epilep'];
$ant_altu_otitmed             = $info_historia_clinica['ant_altu_otitmed'];
$ant_altu_enfmanier           = $info_historia_clinica['ant_altu_enfmanier'];
$ant_altu_traumcran           = $info_historia_clinica['ant_altu_traumcran'];
$ant_altu_tumcereb            = $info_historia_clinica['ant_altu_tumcereb'];
$ant_altu_malfocereb          = $info_historia_clinica['ant_altu_malfocereb'];
$ant_altu_trombo              = $info_historia_clinica['ant_altu_trombo'];
$ant_altu_hipoac              = $info_historia_clinica['ant_altu_hipoac'];
$ant_altu_arritcardi          = $info_historia_clinica['ant_altu_arritcardi'];
$ant_altu_hipogli             = $info_historia_clinica['ant_altu_hipogli'];
$ant_altu_fobia               = $info_historia_clinica['ant_altu_fobia'];
$ant_altu_observ              = $info_historia_clinica['ant_altu_observ'];
$ant_trau                     = $info_historia_clinica['ant_trau'];
$ant_trau_enfer1              = $info_historia_clinica['ant_trau_enfer1'];
$ant_trau_observ1             = $info_historia_clinica['ant_trau_observ1'];
$ant_trau_fech_aprox1         = $info_historia_clinica['ant_trau_fech_aprox1'];
$ant_trau_enfer2              = $info_historia_clinica['ant_trau_enfer2'];
$ant_trau_observ2             = $info_historia_clinica['ant_trau_observ2'];
$ant_trau_fech_aprox2         = $info_historia_clinica['ant_trau_fech_aprox2'];
$ant_trau_enfer3              = $info_historia_clinica['ant_trau_enfer3'];
$ant_trau_observ3             = $info_historia_clinica['ant_trau_observ3'];
$ant_trau_fech_aprox3         = $info_historia_clinica['ant_trau_fech_aprox3'];
$ant_quirur                   = $info_historia_clinica['ant_quirur'];
$ant_quirur_enfer1            = $info_historia_clinica['ant_quirur_enfer1'];
$ant_quirur_observ1           = $info_historia_clinica['ant_quirur_observ1'];
$ant_quirur_fech_aprox1       = $info_historia_clinica['ant_quirur_fech_aprox1'];
$ant_quirur_enfer2            = $info_historia_clinica['ant_quirur_enfer2'];
$ant_quirur_observ2           = $info_historia_clinica['ant_quirur_observ2'];
$ant_quirur_fech_aprox2       = $info_historia_clinica['ant_quirur_fech_aprox2'];
$ant_quirur_enfer3            = $info_historia_clinica['ant_quirur_enfer3'];
$ant_quirur_observ3           = $info_historia_clinica['ant_quirur_observ3'];
$ant_quirur_fech_aprox3       = $info_historia_clinica['ant_quirur_fech_aprox3'];
$costo_motivo_consulta        = $info_historia_clinica['costo_motivo_consulta'];
$cod_factura                  = $info_historia_clinica['cod_factura'];
$ant_inmuni                   = $info_historia_clinica['ant_inmuni'];
$ant_inmuni_tetano            = $info_historia_clinica['ant_inmuni_tetano'];
$ant_inmuni_tetano_anyo       = $info_historia_clinica['ant_inmuni_tetano_anyo'];
$ant_inmuni_fiebtifo          = $info_historia_clinica['ant_inmuni_fiebtifo'];
$ant_inmuni_fiebtifo_anyo     = $info_historia_clinica['ant_inmuni_fiebtifo_anyo'];
$ant_inmuni_hepatita          = $info_historia_clinica['ant_inmuni_hepatita'];
$ant_inmuni_hepatita_anyo     = $info_historia_clinica['ant_inmuni_hepatita_anyo'];
$ant_inmuni_influenza         = $info_historia_clinica['ant_inmuni_influenza'];
$ant_inmuni_influenza_anyo    = $info_historia_clinica['ant_inmuni_influenza_anyo'];
$ant_inmuni_hepatitb          = $info_historia_clinica['ant_inmuni_hepatitb'];
$ant_inmuni_hepatitb_anyo     = $info_historia_clinica['ant_inmuni_hepatitb_anyo'];
$ant_inmuni_saramp            = $info_historia_clinica['ant_inmuni_saramp'];
$ant_inmuni_saramp_anyo       = $info_historia_clinica['ant_inmuni_saramp_anyo'];
$ant_inmuni_fiebamarill       = $info_historia_clinica['ant_inmuni_fiebamarill'];
$ant_inmuni_fiebamarill_anyo  = $info_historia_clinica['ant_inmuni_fiebamarill_anyo'];
$ant_inmuni_otra              = $info_historia_clinica['ant_inmuni_otra'];
$ant_inmuni_otra_anyo         = $info_historia_clinica['ant_inmuni_otra_anyo'];
$ant_inmuni_observacion       = $info_historia_clinica['ant_inmuni_observacion'];
$ant_gine_prim_mestrua        = $info_historia_clinica['ant_gine_prim_mestrua'];
$ant_gine_anyos               = $info_historia_clinica['ant_gine_anyos'];
$ant_gine_cliclo              = $info_historia_clinica['ant_gine_cliclo'];
$ant_gine_fum                 = $info_historia_clinica['ant_gine_fum'];
$ant_gine_fup                 = $info_historia_clinica['ant_gine_fup'];
$ant_gine_fuc                 = $info_historia_clinica['ant_gine_fuc'];
$ant_gine_fich_gine           = $info_historia_clinica['ant_gine_fich_gine'];
$ant_gine_fich_gine_g         = $info_historia_clinica['ant_gine_fich_gine_g'];
$ant_gine_fich_gine_p         = $info_historia_clinica['ant_gine_fich_gine_p'];
$ant_gine_fich_gine_a         = $info_historia_clinica['ant_gine_fich_gine_a'];
$ant_gine_fich_gine_c         = $info_historia_clinica['ant_gine_fich_gine_c'];
$ant_gine_fich_gine_m         = $info_historia_clinica['ant_gine_fich_gine_m'];
$ant_gine_fich_gine_e         = $info_historia_clinica['ant_gine_fich_gine_e'];
$ant_gine_fich_gine_v         = $info_historia_clinica['ant_gine_fich_gine_v'];
$ant_gine_fech_ult_exa_mama   = $info_historia_clinica['ant_gine_fech_ult_exa_mama'];
$ant_gine_planifica           = $info_historia_clinica['ant_gine_planifica'];
$ant_gine_observacion         = $info_historia_clinica['ant_gine_observacion'];
$habit_tox_fum_nofum_exfum    = $info_historia_clinica['habit_tox_fum_nofum_exfum'];
$habit_tox_ciga_aldia         = $info_historia_clinica['habit_tox_ciga_aldia'];
$habit_tox_anyos_fum          = $info_historia_clinica['habit_tox_anyos_fum'];
$habit_tox_tiem_sinfum        = $info_historia_clinica['habit_tox_tiem_sinfum'];
$habit_tox_consum_alcoh       = $info_historia_clinica['habit_tox_consum_alcoh'];
$habit_tox_activ_extralab     = $info_historia_clinica['habit_tox_activ_extralab'];
$habit_tox_activfis           = $info_historia_clinica['habit_tox_activfis'];
$habit_tox_actividad          = $info_historia_clinica['habit_tox_actividad'];
$habit_tox_frecuenc           = $info_historia_clinica['habit_tox_frecuenc'];
$habit_tox_tiempo             = $info_historia_clinica['habit_tox_tiempo'];
$rev_sist_no                  = $info_historia_clinica['rev_sist_no'];
$rev_sist_orgsentido          = $info_historia_clinica['rev_sist_orgsentido'];
$rev_sist_observ_orgsentido   = $info_historia_clinica['rev_sist_observ_orgsentido'];
$rev_sist_neurolog            = $info_historia_clinica['rev_sist_neurolog'];
$rev_sist_observ_neurolog     = $info_historia_clinica['rev_sist_observ_neurolog'];
$rev_sist_resp                = $info_historia_clinica['rev_sist_resp'];
$rev_sist_observ_resp         = $info_historia_clinica['rev_sist_observ_resp'];
$rev_sist_gastrointes         = $info_historia_clinica['rev_sist_gastrointes'];
$rev_sist_observ_gastrointes  = $info_historia_clinica['rev_sist_observ_gastrointes'];
$rev_sist_geniuri             = $info_historia_clinica['rev_sist_geniuri'];
$rev_sist_observ_geniuri      = $info_historia_clinica['rev_sist_observ_geniuri'];
$rev_sist_osteomus            = $info_historia_clinica['rev_sist_osteomus'];
$rev_sist_observ_osteomus     = $info_historia_clinica['rev_sist_observ_osteomus'];
$rev_sist_dermato             = $info_historia_clinica['rev_sist_dermato'];
$rev_sist_observ_dermato      = $info_historia_clinica['rev_sist_observ_dermato'];
$rev_sist_cardiovas           = $info_historia_clinica['rev_sist_cardiovas'];
$rev_sist_observ_cardiovas    = $info_historia_clinica['rev_sist_observ_cardiovas'];
$rev_sist_constitu            = $info_historia_clinica['rev_sist_constitu'];
$rev_sist_observ_constitu     = $info_historia_clinica['rev_sist_observ_constitu'];
$rev_sist_metabolendocri      = $info_historia_clinica['rev_sist_metabolendocri'];
$rev_sist_observ_metabolendocri = $info_historia_clinica['rev_sist_observ_metabolendocri'];
$eval_estment_norm_orient     = $info_historia_clinica['eval_estment_norm_orient'];
$eval_estment_disf_orient     = $info_historia_clinica['eval_estment_disf_orient'];
$eval_estment_halla_orient    = $info_historia_clinica['eval_estment_halla_orient'];
$eval_estment_norm_atenconcent = $info_historia_clinica['eval_estment_norm_atenconcent'];
$eval_estment_disf_atenconcent = $info_historia_clinica['eval_estment_disf_atenconcent'];
$eval_estment_halla_atenconcent = $info_historia_clinica['eval_estment_halla_atenconcent'];
$eval_estment_norm_sensoper   = $info_historia_clinica['eval_estment_norm_sensoper'];
$eval_estment_disf_sensoper   = $info_historia_clinica['eval_estment_disf_sensoper'];
$eval_estment_halla_sensoper  = $info_historia_clinica['eval_estment_halla_sensoper'];
$eval_estment_norm_memor     = $info_historia_clinica['eval_estment_norm_memor'];
$eval_estment_disf_memor     = $info_historia_clinica['eval_estment_disf_memor'];
$eval_estment_halla_memor    = $info_historia_clinica['eval_estment_halla_memor'];
$eval_estment_norm_pensami   = $info_historia_clinica['eval_estment_norm_pensami'];
$eval_estment_disf_pensami   = $info_historia_clinica['eval_estment_disf_pensami'];
$eval_estment_halla_pensami  = $info_historia_clinica['eval_estment_halla_pensami'];
$eval_estment_norm_lenguaj   = $info_historia_clinica['eval_estment_norm_lenguaj'];
$eval_estment_disf_lenguaj   = $info_historia_clinica['eval_estment_disf_lenguaj'];
$eval_estment_halla_lenguaj  = $info_historia_clinica['eval_estment_halla_lenguaj'];
$eval_estment_concept        = $info_historia_clinica['eval_estment_concept'];
$exa_fis_peso                = $info_historia_clinica['exa_fis_peso'];
$exa_fis_talla               = $info_historia_clinica['exa_fis_talla'];
$exa_fis_imc                 = $info_historia_clinica['exa_fis_imc'];
$exa_fis_interpreimc         = $info_historia_clinica['exa_fis_interpreimc'];
$exa_fis_fresp               = $info_historia_clinica['exa_fis_fresp'];
$exa_fis_fc                  = $info_historia_clinica['exa_fis_fc'];
$exa_fis_ta                  = $info_historia_clinica['exa_fis_ta'];
$exa_fis_lateral             = $info_historia_clinica['exa_fis_lateral'];
$exa_fis_periabdom           = $info_historia_clinica['exa_fis_periabdom'];
$exa_fis_temperat            = $info_historia_clinica['exa_fis_temperat'];
$exa_fis_concepto            = $info_historia_clinica['exa_fis_concepto'];
$exa_fis_ojoder_sncorre_vlejan = $info_historia_clinica['exa_fis_ojoder_sncorre_vlejan'];
$exa_fis_ojoder_sncorre_vcerca = $info_historia_clinica['exa_fis_ojoder_sncorre_vcerca'];
$exa_fis_ojoder_cncorre_vlejan = $info_historia_clinica['exa_fis_ojoder_cncorre_vlejan'];
$exa_fis_ojoder_cncorre_vcerca = $info_historia_clinica['exa_fis_ojoder_cncorre_vcerca'];
$exa_fis_ojoizq_sncorre_vlejan = $info_historia_clinica['exa_fis_ojoizq_sncorre_vlejan'];
$exa_fis_ojoizq_sncorre_vcerca = $info_historia_clinica['exa_fis_ojoizq_sncorre_vcerca'];
$exa_fis_ojoizq_cncorre_vlejan = $info_historia_clinica['exa_fis_ojoizq_cncorre_vlejan'];
$exa_fis_ojoizq_cncorre_vcerca = $info_historia_clinica['exa_fis_ojoizq_cncorre_vcerca'];
$exa_fis_ojoamb_sncorre_vlejan = $info_historia_clinica['exa_fis_ojoamb_sncorre_vlejan'];
$exa_fis_ojoamb_sncorre_vcerca = $info_historia_clinica['exa_fis_ojoamb_sncorre_vcerca'];
$exa_fis_oojoamb_cncorre_vlejan = $info_historia_clinica['exa_fis_oojoamb_cncorre_vlejan'];
$exa_fis_ojoamb_cncorre_vcerca = $info_historia_clinica['exa_fis_ojoamb_cncorre_vcerca'];
$exa_fis                     = $info_historia_clinica['exa_fis'];
$exa_fis_ojo                 = $info_historia_clinica['exa_fis_ojo'];
$exa_fis_ojo_obser           = $info_historia_clinica['exa_fis_ojo_obser'];
$exa_fis_oido                = $info_historia_clinica['exa_fis_oido'];
$exa_fis_oido_obser          = $info_historia_clinica['exa_fis_oido_obser'];
$exa_fis_cabeza              = $info_historia_clinica['exa_fis_cabeza'];
$exa_fis_cabeza_obser        = $info_historia_clinica['exa_fis_cabeza_obser'];
$exa_fis_nariz               = $info_historia_clinica['exa_fis_nariz'];
$exa_fis_nariz_obser         = $info_historia_clinica['exa_fis_nariz_obser'];
$exa_fis_orofaring           = $info_historia_clinica['exa_fis_orofaring'];
$exa_fis_orofaring_obser     = $info_historia_clinica['exa_fis_orofaring_obser'];
$exa_fis_cuello              = $info_historia_clinica['exa_fis_cuello'];
$exa_fis_cuello_obser        = $info_historia_clinica['exa_fis_cuello_obser'];
$exa_fis_torax               = $info_historia_clinica['exa_fis_torax'];
$exa_fis_torax_obser         = $info_historia_clinica['exa_fis_torax_obser'];
$exa_fis_glandumama          = $info_historia_clinica['exa_fis_glandumama'];
$exa_fis_glandumama_obser    = $info_historia_clinica['exa_fis_glandumama_obser'];
$exa_fis_cardiopulm          = $info_historia_clinica['exa_fis_cardiopulm'];
$exa_fis_cardiopulm_obser    = $info_historia_clinica['exa_fis_cardiopulm_obser'];
$exa_fis_abdomen             = $info_historia_clinica['exa_fis_abdomen'];
$exa_fis_abdomen_obser       = $info_historia_clinica['exa_fis_abdomen_obser'];
$exa_fis_genital             = $info_historia_clinica['exa_fis_genital'];
$exa_fis_genital_obser       = $info_historia_clinica['exa_fis_genital_obser'];
$exa_fis_miemsup             = $info_historia_clinica['exa_fis_miemsup'];
$exa_fis_miemsup_obser       = $info_historia_clinica['exa_fis_miemsup_obser'];
$exa_fis_mieminf             = $info_historia_clinica['exa_fis_mieminf'];
$exa_fis_mieminf_obser       = $info_historia_clinica['exa_fis_mieminf_obser'];
$exa_fis_columna             = $info_historia_clinica['exa_fis_columna'];
$exa_fis_columna_obser       = $info_historia_clinica['exa_fis_columna_obser'];
$exa_fis_neurolog            = $info_historia_clinica['exa_fis_neurolog'];
$exa_fis_neurolog_obser      = $info_historia_clinica['exa_fis_neurolog_obser'];
$exa_fis_neurolog_romberg    = $info_historia_clinica['exa_fis_neurolog_romberg'];
$exa_fis_neurolog_barany     = $info_historia_clinica['exa_fis_neurolog_barany'];
$exa_fis_neurolog_dixhalp    = $info_historia_clinica['exa_fis_neurolog_dixhalp'];
$exa_fis_neurolog_mciega     = $info_historia_clinica['exa_fis_neurolog_mciega'];
$exa_fis_neurolog_pciega     = $info_historia_clinica['exa_fis_neurolog_pciega'];
$exa_fis_estmentaparent      = $info_historia_clinica['exa_fis_estmentaparent'];
$exa_fis_estmentaparent_obser = $info_historia_clinica['exa_fis_estmentaparent_obser'];
$exa_fis_pielfanera          = $info_historia_clinica['exa_fis_pielfanera'];
$exa_fis_pielfanera_obser    = $info_historia_clinica['exa_fis_pielfanera_obser'];
$exaosteo_norm_anorm         = $info_historia_clinica['exaosteo_norm_anorm'];
$exaosteo_homb_movart        = $info_historia_clinica['exaosteo_homb_movart'];
$exaosteo_homb_fuerza        = $info_historia_clinica['exaosteo_homb_fuerza'];
$exaosteo_manjobe_sig        = $info_historia_clinica['exaosteo_manjobe_sig'];
$exaosteo_manjobe_lat        = $info_historia_clinica['exaosteo_manjobe_lat'];
$exaosteo_manjobe_movart     = $info_historia_clinica['exaosteo_manjobe_movart'];
$exaosteo_manjobe_fuerza     = $info_historia_clinica['exaosteo_manjobe_fuerza'];
$exaosteo_manyega_sig        = $info_historia_clinica['exaosteo_manyega_sig'];
$exaosteo_manyega_lat        = $info_historia_clinica['exaosteo_manyega_lat'];
$exaosteo_manyega_movart     = $info_historia_clinica['exaosteo_manyega_movart'];
$exaosteo_manyega_fuerza     = $info_historia_clinica['exaosteo_manyega_fuerza'];
$exaosteo_manpatte_sig       = $info_historia_clinica['exaosteo_manpatte_sig'];
$exaosteo_manpatte_lat       = $info_historia_clinica['exaosteo_manpatte_lat'];
$exaosteo_epicond_sig        = $info_historia_clinica['exaosteo_epicond_sig'];
$exaosteo_epicond_lat        = $info_historia_clinica['exaosteo_epicond_lat'];
$exaosteo_tinel_sig          = $info_historia_clinica['exaosteo_tinel_sig'];
$exaosteo_tinel_lat          = $info_historia_clinica['exaosteo_tinel_lat'];
$exaosteo_epitro_sig         = $info_historia_clinica['exaosteo_epitro_sig'];
$exaosteo_epitro_lat         = $info_historia_clinica['exaosteo_epitro_lat'];
$exaosteo_phalen_sig         = $info_historia_clinica['exaosteo_phalen_sig'];
$exaosteo_phalen_lat         = $info_historia_clinica['exaosteo_phalen_lat'];
$exaosteo_thomp_sig          = $info_historia_clinica['exaosteo_thomp_sig'];
$exaosteo_thomp_lat          = $info_historia_clinica['exaosteo_thomp_lat'];
$exaosteo_finkel_sig         = $info_historia_clinica['exaosteo_finkel_sig'];
$exaosteo_finkel_lat         = $info_historia_clinica['exaosteo_finkel_lat'];
$exaosteo_laseg_sig          = $info_historia_clinica['exaosteo_laseg_sig'];
$exaosteo_bostezo_sig        = $info_historia_clinica['exaosteo_bostezo_sig'];
$exaosteo_bostezo_lat        = $info_historia_clinica['exaosteo_bostezo_lat'];
$exaosteo_flexion            = $info_historia_clinica['exaosteo_flexion'];
$exaosteo_cajon_sig          = $info_historia_clinica['exaosteo_cajon_sig'];
$exaosteo_cajon_lat          = $info_historia_clinica['exaosteo_cajon_lat'];
$exaosteo_extension          = $info_historia_clinica['exaosteo_extension'];
$exaosteo_mcmurray_sig       = $info_historia_clinica['exaosteo_mcmurray_sig'];
$exaosteo_mcmurray_lat       = $info_historia_clinica['exaosteo_mcmurray_lat'];
$exaosteo_bragard_sig        = $info_historia_clinica['exaosteo_bragard_sig'];
$exaosteo_bragard_lat        = $info_historia_clinica['exaosteo_bragard_lat'];
$exaosteo_tredelen           = $info_historia_clinica['exaosteo_tredelen'];
$exaosteo_valmarcha          = $info_historia_clinica['exaosteo_valmarcha'];
$exaosteo_observ             = $info_historia_clinica['exaosteo_observ'];
$paracli_audimet             = $info_historia_clinica['paracli_audimet'];
$paracli_audimet_observ      = $info_historia_clinica['paracli_audimet_observ'];
$paracli_visiomet            = $info_historia_clinica['paracli_visiomet'];
$paracli_visiomet_observ     = $info_historia_clinica['paracli_visiomet_observ'];
$paracli_torax               = $info_historia_clinica['paracli_torax'];
$paracli_torax_observ        = $info_historia_clinica['paracli_torax_observ'];
$paracli_espiro              = $info_historia_clinica['paracli_espiro'];
$paracli_espiro_observ       = $info_historia_clinica['paracli_espiro_observ'];
$paracli_ekg                 = $info_historia_clinica['paracli_ekg'];
$paracli_ekg_observ          = $info_historia_clinica['paracli_ekg_observ'];
$paracli_rxcolum             = $info_historia_clinica['paracli_rxcolum'];
$paracli_rxcolum_observ      = $info_historia_clinica['paracli_rxcolum_observ'];
$paracli_otrcomplement       = $info_historia_clinica['paracli_otrcomplement'];
$paracli_otrcomplement_observ = $info_historia_clinica['paracli_otrcomplement_observ'];
$paracli_fisiote             = $info_historia_clinica['paracli_fisiote'];
$paracli_fisiote_observ      = $info_historia_clinica['paracli_fisiote_observ'];
$paracli_lab                 = $info_historia_clinica['paracli_lab'];
$paracli_lab_observ          = $info_historia_clinica['paracli_lab_observ'];
$paracli_otro                = $info_historia_clinica['paracli_otro'];
$paracli_otro_observ         = $info_historia_clinica['paracli_otro_observ'];
$control_examen              = $info_historia_clinica['control_examen'];
$cod_tipo_historia_clinica   = $info_historia_clinica['cod_tipo_historia_clinica'];
$cod_estado_facturacion      = $info_historia_clinica['cod_estado_facturacion'];
$total_terapia               = $info_historia_clinica['total_terapia'];
$nombre_laboratorio          = $info_historia_clinica['nombre_laboratorio'];
$nombre_medicamento          = $info_historia_clinica['nombre_medicamento'];
$descripcion_medicamento     = $info_historia_clinica['descripcion_medicamento'];
$nombre_ayuda_diagnostica    = $info_historia_clinica['nombre_ayuda_diagnostica'];
$descripcion_ayuda_diagnostica = $info_historia_clinica['descripcion_ayuda_diagnostica'];
$nombre_religion             = $info_historia_clinica['nombre_religion'];
$nombre_ocupacion            = $info_historia_clinica['nombre_ocupacion'];
$nombre_estado_civil         = $info_historia_clinica['nombre_estado_civil'];
$nombre_escolaridad          = $info_historia_clinica['nombre_escolaridad'];
$nombre_tipo_regimen         = $info_historia_clinica['nombre_tipo_regimen'];
$nombre_fondo_pension        = $info_historia_clinica['nombre_fondo_pension'];
$nombre_actividad_ecoemp     = $info_historia_clinica['nombre_actividad_ecoemp'];
$nombre_estrato              = $info_historia_clinica['nombre_estrato'];
$nombre_numero_hijos         = $info_historia_clinica['nombre_numero_hijos'];
$nombre_arl                  = $info_historia_clinica['nombre_arl'];
$nombre_empresa              = $info_historia_clinica['nombre_empresa'];
$cargo_empresa               = $info_historia_clinica['cargo_empresa'];
$area_empresa                = $info_historia_clinica['area_empresa'];
$ciudad_empresa              = $info_historia_clinica['ciudad_empresa'];
$nombre_empresa_contratante  = $info_historia_clinica['nombre_empresa_contratante'];
$tel_cliente_cli             = $info_historia_clinica['tel_cliente_cli'];
$correo                      = $info_historia_clinica['correo'];
$cod_entidad                 = $info_historia_clinica['cod_entidad'];
$lugar_residencia            = $info_historia_clinica['lugar_residencia'];
$nombre_contacto1            = $info_historia_clinica['nombre_contacto1'];
$tel_contacto1               = $info_historia_clinica['tel_contacto1'];
$parentesco_contacto1        = $info_historia_clinica['parentesco_contacto1'];
$direccion_contacto1         = $info_historia_clinica['direccion_contacto1'];
$fecha_mes                   = $info_historia_clinica['fecha_mes'];
$fecha_anyo                  = $info_historia_clinica['fecha_anyo'];
$fecha_ymd                   = $info_historia_clinica['fecha_ymd'];
$fecha_dmy                   = $info_historia_clinica['fecha_dmy'];
$hora                        = $info_historia_clinica['hora'];
$fecha_reg_time              = $info_historia_clinica['fecha_reg_time'];
$url_img_firma_min           = $info_historia_clinica['url_img_firma_min'];
$url_img_firma_orig          = $info_historia_clinica['url_img_firma_orig'];
$url_img_foto_min            = $info_historia_clinica['url_img_foto_min'];
$url_img_foto_orig           = $info_historia_clinica['url_img_foto_orig'];
$cuenta                      = $info_historia_clinica['cuenta'];
$cuenta_reg                  = $info_historia_clinica['cuenta_reg'];
$lugar_procedencia           = $info_historia_clinica['lugar_procedencia'];
$fecha_time                  = $info_historia_clinica['fecha_time'];
$fecha_reg_time              = $info_historia_clinica['fecha_reg_time'];
$fecha_ymd                   = $info_historia_clinica['fecha_ymd'];
$cuenta                      = $info_historia_clinica['cuenta'];
$fecha_ymd_hora              = date("Y/m/d H:i:s", $fecha_time);
$fecha_dmy                   = $info_historia_clinica['fecha_dmy'];
$fecha_reg_time_dmy          = date("d/m/Y", $fecha_reg_time);
$fecha_hisroria_clinica      = date("Y/m/d", $fecha_time);
$fecha_hisroria_clinica       = date("Y/m/d", $fecha_time);
$fecha_y_hora_registro        = date("Y/m/d H:i:s");
?>
<form name="formulario_edicion" accept-charset="utf-8" method="post" action="../admin/reg_historia_clinica_mejorada_reg.php">
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --><!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<table align="center" border="1" width="100%" style="font-family: Mono; font-size: <?php echo $tamano_font_emp ?>pt;">
<thead><tr>
<th bgcolor="#FAC090">AREA A LABORAR Y CARGO</th>
</tr></thead>
<tbody><tr>
<!--<td align="center"><?php echo $cargo_empresa ?></td>-->
<td>
<input name="cod_grupo_area_cargo" id="cod_grupo_area_cargo" class="cod_grupo_area_cargo" type="text" value="" required/></td>
</tr></tbody>
</table>
<!-- /////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:<?php echo $tamano_font_emp ?>pt; width:100%">
    <tbody><tr><td><strong>2.2. Clasificación de riesgos</strong></td></tr></tbody>
</table>
<!-- /////////////////////////////////////////////////// -->
<table align="center" border="1" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:<?php echo $tamano_font_emp ?>pt; width:100%">
    <tbody>
        <tr>
            <td>&nbsp;</td>
            <td style="text-align:center" colspan="6" bgcolor="#95B3D7"><strong>FÍSICOS</strong></td>
            <td style="text-align:center" colspan="4" bgcolor="#B6DDE8"><strong>QUÍMICOS</strong></td>
            <td style="text-align:center" colspan="6" bgcolor="#C5BE97"><strong>BIOLÓGICO</strong></td>
            <td style="text-align:center" colspan="5" bgcolor="#B2A1C7"><strong>ERGONÓMICOS</strong></td>
            <td style="text-align:center" colspan="5" bgcolor="#E6B9B8"><strong>PSICOSOCIALES</strong></td>
            <td style="text-align:center" colspan="7" bgcolor="#FAC090"><strong>SEGURIDAD</strong></td>
            <td style="text-align:center" colspan="3" bgcolor="#FF6666"><strong>OBSERVACIONES</strong></td>
        </tr>
        <tr>
            <td style="text-align:center"><strong>EMPRESA</strong></td>
            <td><img src="../imagenes/img_riesgos/01.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/02.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/03.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/04.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/05.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/06.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/07.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/08.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/09.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/10.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/11.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/12.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/13.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/14.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/15.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/16.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/17.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/18.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/19.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/20.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/21.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/22.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/23.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/24.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/25.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/26.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/27.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/28.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/29.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/30.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/31.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/32.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/33.jpg" /></td>
            <td><img src="../imagenes/img_riesgos/34.jpg" /></td>
            <td></td>
        </tr>
        <tr>
<td style="text-align:center"><select id="clasrieg_carg1" name="clasrieg_carg1" disabled>
<?php if (isset($nombre_empresa)) { echo "<option value='-1' >...</option>";
} else { echo  "<option value='-1' selected >...</option>"; }
$consulta2_sql = ("SELECT cod_empresa, nombre_empresa FROM empresa ORDER BY nombre_empresa ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($nombre_empresa) AND $nombre_empresa == $datos2['nombre_empresa']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['nombre_empresa'];
$nombre = $datos2['nombre_empresa'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td style='text-align:center'><input name='clasrieg_fis1_ruid' class="clasrieg_fis1_ruid" id="clasrieg_fis1_ruid" type='checkbox' value='S' <? if($clasrieg_fis1_ruid=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_fis1_ilum' class="clasrieg_fis1_ilum" id="clasrieg_fis1_ilum" type='checkbox' value='S' <? if($clasrieg_fis1_ilum=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_fis1_noionic' class="clasrieg_fis1_noionic" id="clasrieg_fis1_noionic" type='checkbox' value='S' <? if($clasrieg_fis1_noionic=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_fis1_vibra' class="clasrieg_fis1_vibra" id="clasrieg_fis1_vibra" type='checkbox' value='S' <? if($clasrieg_fis1_vibra=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_fis1_tempextrem' class="clasrieg_fis1_tempextrem" id="clasrieg_fis1_tempextrem" type='checkbox' value='S' <? if($clasrieg_fis1_tempextrem=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_fis1_cambpres' class="clasrieg_fis1_cambpres" id="clasrieg_fis1_cambpres" type='checkbox' value='S' <? if($clasrieg_fis1_cambpres=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_quim1_gasvapor' class="clasrieg_quim1_gasvapor" id="clasrieg_quim1_gasvapor" type='checkbox' value='S' <? if($clasrieg_quim1_gasvapor=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_quim1_aeroliq' class="clasrieg_quim1_aeroliq" id="clasrieg_quim1_aeroliq" type='checkbox' value='S' <? if($clasrieg_quim1_aeroliq=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_quim1_solid' class="clasrieg_quim1_solid" id="clasrieg_quim1_solid" type='checkbox' value='S' <? if($clasrieg_quim1_solid=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_quim1_liquid' class="clasrieg_quim1_liquid" id="clasrieg_quim1_liquid" type='checkbox' value='S' <? if($clasrieg_quim1_liquid=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_biolog1_viru' class="clasrieg_biolog1_viru" id="clasrieg_biolog1_viru" type='checkbox' value='S' <? if($clasrieg_biolog1_viru=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_biolog1_bacter' class="clasrieg_biolog1_bacter" id="clasrieg_biolog1_bacter" type='checkbox' value='S' <? if($clasrieg_biolog1_bacter=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_biolog1_parasi' class="clasrieg_biolog1_parasi" id="clasrieg_biolog1_parasi" type='checkbox' value='S' <? if($clasrieg_biolog1_parasi=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_biolog1_morde' class="clasrieg_biolog1_morde" id="clasrieg_biolog1_morde" type='checkbox' value='S' <? if($clasrieg_biolog1_morde=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_biolog1_picad' class="clasrieg_biolog1_picad" id="clasrieg_biolog1_picad" type='checkbox' value='S' <? if($clasrieg_biolog1_picad=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_biolog1_hongo' class="clasrieg_biolog1_hongo" id="clasrieg_biolog1_hongo" type='checkbox' value='S' <? if($clasrieg_biolog1_hongo=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_ergo1_trabestat' class="clasrieg_ergo1_trabestat" id="clasrieg_ergo1_trabestat" type='checkbox' value='S' <? if($clasrieg_ergo1_trabestat=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_ergo1_esfuerfis' class="clasrieg_ergo1_esfuerfis" id="clasrieg_ergo1_esfuerfis" type='checkbox' value='S' <? if($clasrieg_ergo1_esfuerfis=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_ergo1_carga' class="clasrieg_ergo1_carga" id="clasrieg_ergo1_carga" type='checkbox' value='S' <? if($clasrieg_ergo1_carga=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_ergo1_postforz' class="clasrieg_ergo1_postforz" id="clasrieg_ergo1_postforz" type='checkbox' value='S' <? if($clasrieg_ergo1_postforz=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_ergo1_movrepet' class="clasrieg_ergo1_movrepet" id="clasrieg_ergo1_movrepet" type='checkbox' value='S' <? if($clasrieg_ergo1_movrepet=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_ergo1_jortrab' class="clasrieg_ergo1_jortrab" id="clasrieg_ergo1_jortrab" type='checkbox' value='S' <? if($clasrieg_ergo1_jortrab=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_psi1_monoto' class="clasrieg_psi1_monoto" id="clasrieg_psi1_monoto" type='checkbox' value='S' <? if($clasrieg_psi1_monoto=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_psi1_relhuman' class="clasrieg_psi1_relhuman" id="clasrieg_psi1_relhuman" type='checkbox' value='S' <? if($clasrieg_psi1_relhuman=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_psi1_contentarea' class="clasrieg_psi1_contentarea" id="clasrieg_psi1_contentarea" type='checkbox' value='S' <? if($clasrieg_psi1_contentarea=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_psi1_orgtiemptrab' class="clasrieg_psi1_orgtiemptrab" id="clasrieg_psi1_orgtiemptrab" type='checkbox' value='S' <? if($clasrieg_psi1_orgtiemptrab=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_segur1_mecanic' class="clasrieg_segur1_mecanic" id="clasrieg_segur1_mecanic" type='checkbox' value='S' <? if($clasrieg_segur1_mecanic=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_segur1_electri' class="clasrieg_segur1_electri" id="clasrieg_segur1_electri" type='checkbox' value='S' <? if($clasrieg_segur1_electri=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_segur1_locat' class="clasrieg_segur1_locat" id="clasrieg_segur1_locat" type='checkbox' value='S' <? if($clasrieg_segur1_locat=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_segur1_fisiquim' class="clasrieg_segur1_fisiquim" id="clasrieg_segur1_fisiquim" type='checkbox' value='S' <? if($clasrieg_segur1_fisiquim=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_segur1_public' class="clasrieg_segur1_public" id="clasrieg_segur1_public" type='checkbox' value='S' <? if($clasrieg_segur1_public=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_segur1_espconfi' class="clasrieg_segur1_espconfi" id="clasrieg_segur1_espconfi" type='checkbox' value='S' <? if($clasrieg_segur1_espconfi=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_segur1_trabaltura' class="clasrieg_segur1_trabaltura" id="clasrieg_segur1_trabaltura" type='checkbox' value='S' <? if($clasrieg_segur1_trabaltura=='S'){ echo 'checked'; } ?>></td>
<td style='text-align:center'><input name='clasrieg_observ1_otro' class="clasrieg_observ1_otro" id="clasrieg_observ1_otro" type='checkbox' value='S' <? if($clasrieg_observ1_otro=='S'){ echo 'checked'; } ?>></td>
<td style="text-align:center"><input class="input-block-level" name="clasrieg_observ1_coment" id="clasrieg_observ1_coment" type="text" value="<?php echo $clasrieg_observ1_coment ?>"/></td>
</tr>
    </tbody>
</table>
<!-- /////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////// -->
<hr>
<input type="hidden" name="cod_historia_clinica" value="<?php echo $cod_historia_clinica ?>"/>
<input type="hidden" name="cod_cliente" value="<?php echo $cod_cliente ?>"/>
<input type="hidden" name="fecha_dmy" value="<?php echo $fecha_hoy ?>"/>
<input type="hidden" name="pagina" value="<?php echo $pagina ?>"/>
<input type="hidden" name="ins_edit" value="formulario_insert_edit">

<div class="actions">
<input type="submit" value="Registrar Información" name="submit" id="submitButton" class="btn btn-info pull-center" title="Click aqui para enviar" />
</div>
</form>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
</div>
<!--End Main Content Area-->
</div>
<div id="footerInnerSeparator"></div>
</div>
</div>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js_sin_jquery.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<script src="../js/jquery-ui.js"></script>
<!--
<script src="../js/jquery.min.js" type="text/javascript"></script> 
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
-->
<script type="text/javascript">
$(function() {
$("#cod_grupo_area_cargo").autocomplete({
source: "autocompletar_grupo_area_cargo_ajax.php",
minLength: 1,
select: function(event, ui) {
event.preventDefault();

$('#cod_grupo_area_cargo').val(ui.item.cod_grupo_area_cargo);
$('#nombre_grupo_area_cargo').val(ui.item.nombre_grupo_area_cargo);
$('#cod_grupo_area').val(ui.item.cod_grupo_area);

$('#clasrieg_fis1_ruid').val(ui.item.clasrieg_fis1_ruid);
$('#clasrieg_fis1_ilum').val(ui.item.clasrieg_fis1_ilum);
$('#clasrieg_fis1_noionic').val(ui.item.clasrieg_fis1_noionic);
$('#clasrieg_fis1_vibra').val(ui.item.clasrieg_fis1_vibra);
$('#clasrieg_fis1_tempextrem').val(ui.item.clasrieg_fis1_tempextrem);
$('#clasrieg_fis1_cambpres').val(ui.item.clasrieg_fis1_cambpres);
$('#clasrieg_quim1_gasvapor').val(ui.item.clasrieg_quim1_gasvapor);
$('#clasrieg_quim1_aeroliq').val(ui.item.clasrieg_quim1_aeroliq);
$('#clasrieg_quim1_solid').val(ui.item.clasrieg_quim1_solid);
$('#clasrieg_quim1_liquid').val(ui.item.clasrieg_quim1_liquid);
$('#clasrieg_biolog1_viru').val(ui.item.clasrieg_biolog1_viru);
$('#clasrieg_biolog1_bacter').val(ui.item.clasrieg_biolog1_bacter);
$('#clasrieg_biolog1_parasi').val(ui.item.clasrieg_biolog1_parasi);
$('#clasrieg_biolog1_morde').val(ui.item.clasrieg_biolog1_morde);
$('#clasrieg_biolog1_picad').val(ui.item.clasrieg_biolog1_picad);
$('#clasrieg_biolog1_hongo').val(ui.item.clasrieg_biolog1_hongo);
$('#clasrieg_ergo1_trabestat').val(ui.item.clasrieg_ergo1_trabestat);
$('#clasrieg_ergo1_esfuerfis').val(ui.item.clasrieg_ergo1_esfuerfis);
$('#clasrieg_ergo1_carga').val(ui.item.clasrieg_ergo1_carga);
$('#clasrieg_ergo1_postforz').val(ui.item.clasrieg_ergo1_postforz);
$('#clasrieg_ergo1_movrepet').val(ui.item.clasrieg_ergo1_movrepet);
$('#clasrieg_ergo1_jortrab').val(ui.item.clasrieg_ergo1_jortrab);
$('#clasrieg_psi1_monoto').val(ui.item.clasrieg_psi1_monoto);
$('#clasrieg_psi1_relhuman').val(ui.item.clasrieg_psi1_relhuman);
$('#clasrieg_psi1_contentarea').val(ui.item.clasrieg_psi1_contentarea);
$('#clasrieg_psi1_orgtiemptrab').val(ui.item.clasrieg_psi1_orgtiemptrab);
$('#clasrieg_segur1_mecanic').val(ui.item.clasrieg_segur1_mecanic);
$('#clasrieg_segur1_electri').val(ui.item.clasrieg_segur1_electri);
$('#clasrieg_segur1_locat').val(ui.item.clasrieg_segur1_locat);
$('#clasrieg_segur1_fisiquim').val(ui.item.clasrieg_segur1_fisiquim);
$('#clasrieg_segur1_public').val(ui.item.clasrieg_segur1_public);
$('#clasrieg_segur1_espconfi').val(ui.item.clasrieg_segur1_espconfi);
$('#clasrieg_segur1_trabaltura').val(ui.item.clasrieg_segur1_trabaltura);
$('#clasrieg_observ1_otro').val(ui.item.clasrieg_observ1_otro);

var clasrieg_fis1_ruid = $('#clasrieg_fis1_ruid').val();
var clasrieg_fis1_ilum = $('#clasrieg_fis1_ilum').val();
var clasrieg_fis1_noionic = $('#clasrieg_fis1_noionic').val();
var clasrieg_fis1_vibra = $('#clasrieg_fis1_vibra').val();
var clasrieg_fis1_tempextrem = $('#clasrieg_fis1_tempextrem').val();
var clasrieg_fis1_cambpres = $('#clasrieg_fis1_cambpres').val();
var clasrieg_quim1_gasvapor = $('#clasrieg_quim1_gasvapor').val();
var clasrieg_quim1_aeroliq = $('#clasrieg_quim1_aeroliq').val();
var clasrieg_quim1_solid = $('#clasrieg_quim1_solid').val();
var clasrieg_quim1_liquid = $('#clasrieg_quim1_liquid').val();
var clasrieg_biolog1_viru = $('#clasrieg_biolog1_viru').val();
var clasrieg_biolog1_bacter = $('#clasrieg_biolog1_bacter').val();
var clasrieg_biolog1_parasi = $('#clasrieg_biolog1_parasi').val();
var clasrieg_biolog1_morde = $('#clasrieg_biolog1_morde').val();
var clasrieg_biolog1_picad = $('#clasrieg_biolog1_picad').val();
var clasrieg_biolog1_hongo = $('#clasrieg_biolog1_hongo').val();
var clasrieg_ergo1_trabestat = $('#clasrieg_ergo1_trabestat').val();
var clasrieg_ergo1_esfuerfis = $('#clasrieg_ergo1_esfuerfis').val();
var clasrieg_ergo1_carga = $('#clasrieg_ergo1_carga').val();
var clasrieg_ergo1_postforz = $('#clasrieg_ergo1_postforz').val();
var clasrieg_ergo1_movrepet = $('#clasrieg_ergo1_movrepet').val();
var clasrieg_ergo1_jortrab = $('#clasrieg_ergo1_jortrab').val();
var clasrieg_psi1_monoto = $('#clasrieg_psi1_monoto').val();
var clasrieg_psi1_relhuman = $('#clasrieg_psi1_relhuman').val();
var clasrieg_psi1_contentarea = $('#clasrieg_psi1_contentarea').val();
var clasrieg_psi1_orgtiemptrab = $('#clasrieg_psi1_orgtiemptrab').val();
var clasrieg_segur1_mecanic = $('#clasrieg_segur1_mecanic').val();
var clasrieg_segur1_electri = $('#clasrieg_segur1_electri').val();
var clasrieg_segur1_locat = $('#clasrieg_segur1_locat').val();
var clasrieg_segur1_fisiquim = $('#clasrieg_segur1_fisiquim').val();
var clasrieg_segur1_public = $('#clasrieg_segur1_public').val();
var clasrieg_segur1_espconfi = $('#clasrieg_segur1_espconfi').val();
var clasrieg_segur1_trabaltura = $('#clasrieg_segur1_trabaltura').val();
var clasrieg_observ1_otro = $('#clasrieg_observ1_otro').val();

if (clasrieg_fis1_ruid=='S') { $('#clasrieg_fis1_ruid').val('S'); $('#clasrieg_fis1_ruid').prop('checked',true); } else { $('#clasrieg_fis1_ruid').val('N'); $('#clasrieg_fis1_ruid').prop('checked',false); } 
if (clasrieg_fis1_ilum=='S') { $('#clasrieg_fis1_ilum').val('S'); $('#clasrieg_fis1_ilum').prop('checked',true); } else { $('#clasrieg_fis1_ilum').val('N'); $('#clasrieg_fis1_ilum').prop('checked',false); } 
if (clasrieg_fis1_noionic=='S') { $('#clasrieg_fis1_noionic').val('S'); $('#clasrieg_fis1_noionic').prop('checked',true); } else { $('#clasrieg_fis1_noionic').val('N'); $('#clasrieg_fis1_noionic').prop('checked',false); } 
if (clasrieg_fis1_vibra=='S') { $('#clasrieg_fis1_vibra').val('S'); $('#clasrieg_fis1_vibra').prop('checked',true); } else { $('#clasrieg_fis1_vibra').val('N'); $('#clasrieg_fis1_vibra').prop('checked',false); } 
if (clasrieg_fis1_tempextrem=='S') { $('#clasrieg_fis1_tempextrem').val('S'); $('#clasrieg_fis1_tempextrem').prop('checked',true); } else { $('#clasrieg_fis1_tempextrem').val('N'); $('#clasrieg_fis1_tempextrem').prop('checked',false); } 
if (clasrieg_fis1_cambpres=='S') { $('#clasrieg_fis1_cambpres').val('S'); $('#clasrieg_fis1_cambpres').prop('checked',true); } else { $('#clasrieg_fis1_cambpres').val('N'); $('#clasrieg_fis1_cambpres').prop('checked',false); } 
if (clasrieg_quim1_gasvapor=='S') { $('#clasrieg_quim1_gasvapor').val('S'); $('#clasrieg_quim1_gasvapor').prop('checked',true); } else { $('#clasrieg_quim1_gasvapor').val('N'); $('#clasrieg_quim1_gasvapor').prop('checked',false); } 
if (clasrieg_quim1_aeroliq=='S') { $('#clasrieg_quim1_aeroliq').val('S'); $('#clasrieg_quim1_aeroliq').prop('checked',true); } else { $('#clasrieg_quim1_aeroliq').val('N'); $('#clasrieg_quim1_aeroliq').prop('checked',false); } 
if (clasrieg_quim1_solid=='S') { $('#clasrieg_quim1_solid').val('S'); $('#clasrieg_quim1_solid').prop('checked',true); } else { $('#clasrieg_quim1_solid').val('N'); $('#clasrieg_quim1_solid').prop('checked',false); } 
if (clasrieg_quim1_liquid=='S') { $('#clasrieg_quim1_liquid').val('S'); $('#clasrieg_quim1_liquid').prop('checked',true); } else { $('#clasrieg_quim1_liquid').val('N'); $('#clasrieg_quim1_liquid').prop('checked',false); } 
if (clasrieg_biolog1_viru=='S') { $('#clasrieg_biolog1_viru').val('S'); $('#clasrieg_biolog1_viru').prop('checked',true); } else { $('#clasrieg_biolog1_viru').val('N'); $('#clasrieg_biolog1_viru').prop('checked',false); } 
if (clasrieg_biolog1_bacter=='S') { $('#clasrieg_biolog1_bacter').val('S'); $('#clasrieg_biolog1_bacter').prop('checked',true); } else { $('#clasrieg_biolog1_bacter').val('N'); $('#clasrieg_biolog1_bacter').prop('checked',false); } 
if (clasrieg_biolog1_parasi=='S') { $('#clasrieg_biolog1_parasi').val('S'); $('#clasrieg_biolog1_parasi').prop('checked',true); } else { $('#clasrieg_biolog1_parasi').val('N'); $('#clasrieg_biolog1_parasi').prop('checked',false); } 
if (clasrieg_biolog1_morde=='S') { $('#clasrieg_biolog1_morde').val('S'); $('#clasrieg_biolog1_morde').prop('checked',true); } else { $('#clasrieg_biolog1_morde').val('N'); $('#clasrieg_biolog1_morde').prop('checked',false); } 
if (clasrieg_biolog1_picad=='S') { $('#clasrieg_biolog1_picad').val('S'); $('#clasrieg_biolog1_picad').prop('checked',true); } else { $('#clasrieg_biolog1_picad').val('N'); $('#clasrieg_biolog1_picad').prop('checked',false); } 
if (clasrieg_biolog1_hongo=='S') { $('#clasrieg_biolog1_hongo').val('S'); $('#clasrieg_biolog1_hongo').prop('checked',true); } else { $('#clasrieg_biolog1_hongo').val('N'); $('#clasrieg_biolog1_hongo').prop('checked',false); } 
if (clasrieg_ergo1_trabestat=='S') { $('#clasrieg_ergo1_trabestat').val('S'); $('#clasrieg_ergo1_trabestat').prop('checked',true); } else { $('#clasrieg_ergo1_trabestat').val('N'); $('#clasrieg_ergo1_trabestat').prop('checked',false); } 
if (clasrieg_ergo1_esfuerfis=='S') { $('#clasrieg_ergo1_esfuerfis').val('S'); $('#clasrieg_ergo1_esfuerfis').prop('checked',true); } else { $('#clasrieg_ergo1_esfuerfis').val('N'); $('#clasrieg_ergo1_esfuerfis').prop('checked',false); } 
if (clasrieg_ergo1_carga=='S') { $('#clasrieg_ergo1_carga').val('S'); $('#clasrieg_ergo1_carga').prop('checked',true); } else { $('#clasrieg_ergo1_carga').val('N'); $('#clasrieg_ergo1_carga').prop('checked',false); } 
if (clasrieg_ergo1_postforz=='S') { $('#clasrieg_ergo1_postforz').val('S'); $('#clasrieg_ergo1_postforz').prop('checked',true); } else { $('#clasrieg_ergo1_postforz').val('N'); $('#clasrieg_ergo1_postforz').prop('checked',false); } 
if (clasrieg_ergo1_movrepet=='S') { $('#clasrieg_ergo1_movrepet').val('S'); $('#clasrieg_ergo1_movrepet').prop('checked',true); } else { $('#clasrieg_ergo1_movrepet').val('N'); $('#clasrieg_ergo1_movrepet').prop('checked',false); } 
if (clasrieg_ergo1_jortrab=='S') { $('#clasrieg_ergo1_jortrab').val('S'); $('#clasrieg_ergo1_jortrab').prop('checked',true); } else { $('#clasrieg_ergo1_jortrab').val('N'); $('#clasrieg_ergo1_jortrab').prop('checked',false); } 
if (clasrieg_psi1_monoto=='S') { $('#clasrieg_psi1_monoto').val('S'); $('#clasrieg_psi1_monoto').prop('checked',true); } else { $('#clasrieg_psi1_monoto').val('N'); $('#clasrieg_psi1_monoto').prop('checked',false); } 
if (clasrieg_psi1_relhuman=='S') { $('#clasrieg_psi1_relhuman').val('S'); $('#clasrieg_psi1_relhuman').prop('checked',true); } else { $('#clasrieg_psi1_relhuman').val('N'); $('#clasrieg_psi1_relhuman').prop('checked',false); } 
if (clasrieg_psi1_contentarea=='S') { $('#clasrieg_psi1_contentarea').val('S'); $('#clasrieg_psi1_contentarea').prop('checked',true); } else { $('#clasrieg_psi1_contentarea').val('N'); $('#clasrieg_psi1_contentarea').prop('checked',false); } 
if (clasrieg_psi1_orgtiemptrab=='S') { $('#clasrieg_psi1_orgtiemptrab').val('S'); $('#clasrieg_psi1_orgtiemptrab').prop('checked',true); } else { $('#clasrieg_psi1_orgtiemptrab').val('N'); $('#clasrieg_psi1_orgtiemptrab').prop('checked',false); } 
if (clasrieg_segur1_mecanic=='S') { $('#clasrieg_segur1_mecanic').val('S'); $('#clasrieg_segur1_mecanic').prop('checked',true); } else { $('#clasrieg_segur1_mecanic').val('N'); $('#clasrieg_segur1_mecanic').prop('checked',false); } 
if (clasrieg_segur1_electri=='S') { $('#clasrieg_segur1_electri').val('S'); $('#clasrieg_segur1_electri').prop('checked',true); } else { $('#clasrieg_segur1_electri').val('N'); $('#clasrieg_segur1_electri').prop('checked',false); } 
if (clasrieg_segur1_locat=='S') { $('#clasrieg_segur1_locat').val('S'); $('#clasrieg_segur1_locat').prop('checked',true); } else { $('#clasrieg_segur1_locat').val('N'); $('#clasrieg_segur1_locat').prop('checked',false); } 
if (clasrieg_segur1_fisiquim=='S') { $('#clasrieg_segur1_fisiquim').val('S'); $('#clasrieg_segur1_fisiquim').prop('checked',true); } else { $('#clasrieg_segur1_fisiquim').val('N'); $('#clasrieg_segur1_fisiquim').prop('checked',false); } 
if (clasrieg_segur1_public=='S') { $('#clasrieg_segur1_public').val('S'); $('#clasrieg_segur1_public').prop('checked',true); } else { $('#clasrieg_segur1_public').val('N'); $('#clasrieg_segur1_public').prop('checked',false); } 
if (clasrieg_segur1_espconfi=='S') { $('#clasrieg_segur1_espconfi').val('S'); $('#clasrieg_segur1_espconfi').prop('checked',true); } else { $('#clasrieg_segur1_espconfi').val('N'); $('#clasrieg_segur1_espconfi').prop('checked',false); } 
if (clasrieg_segur1_trabaltura=='S') { $('#clasrieg_segur1_trabaltura').val('S'); $('#clasrieg_segur1_trabaltura').prop('checked',true); } else { $('#clasrieg_segur1_trabaltura').val('N'); $('#clasrieg_segur1_trabaltura').prop('checked',false); } 
if (clasrieg_observ1_otro=='S') { $('#clasrieg_observ1_otro').val('S'); $('#clasrieg_observ1_otro').prop('checked',true); } else { $('#clasrieg_observ1_otro').val('N'); $('#clasrieg_observ1_otro').prop('checked',false); } 

}
});
});
</script>


<script>  
 $(document).ready(function(){ 
/* -------------------------------------------------------------------------------------------------------------- */
$("select").change(function(){  
var valor = $(this).val();
var campo = $(this).attr("name");
let id = this.id;
console.log("select");
$.ajax({  
    url:"guardar_edit_historia_clinica_mejorada_ajax.php",  
    method:"POST",  
    data:{valor:valor, campo:campo, id:<?php echo $cod_historia_clinica ?>},  
    success:function(data){  
         $('#result').html(data);  
    }  
});  
});
/* -------------------------------------------------------------------------------------------------------------- */
 });  
 </script> 

<!-- 1****************************************************************************************************** -->
</body>
</html>