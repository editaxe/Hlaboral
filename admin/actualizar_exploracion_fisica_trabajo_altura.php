<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!--<link href="../estilo_css/bootstrap-combined.min.css" rel="stylesheet">-->
<link href="../estilo_css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen">
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php //$pagina = addslashes($_GET['pagina']); ?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs"><a href="#"><h4>ACTUALIZANDO</h4></a></div>
<hr>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
//$fecha_hoy = date("Y/m/d");
$pagina                       = addslashes($_GET['pagina']);
$cod_historia_clinica         = intval($_GET['cod_historia_clinica']);
$cod_trabajo_altura           = intval($_GET['cod_trabajo_altura']);

$pagina_redirec = $pagina.'?cod_trabajo_altura='.$cod_trabajo_altura.'&cod_historia_clinica='.$cod_historia_clinica.'&pagina='.$pagina;

if (isset($_GET['cod_trabajo_altura'])) {

$obtener_estructura_hist_clinica = "SELECT motivo, exa_fis_fc, exa_fis_fresp, exa_fis_ta, exa_fis_peso, exa_fis_talla, 
exa_fis_imc, exa_fis_periabdom, ant_gine_prim_mestrua, ant_gine_fum, ant_gine_fich_gine_g, ant_gine_fich_gine_p, 
ant_gine_fich_gine_a, ant_gine_fich_gine_c, exa_fis_neurolog_romberg, exa_fis_neurolog_mciega, exa_fis_neurolog_dixhalp, 
exa_fis_ojoder_sncorre_vlejan, exa_fis_ojoder_sncorre_vcerca, exa_fis_ojoder_cncorre_vlejan, 
exa_fis_ojoder_cncorre_vcerca, exa_fis_ojoizq_sncorre_vlejan, exa_fis_ojoizq_sncorre_vcerca, 
exa_fis_ojoizq_cncorre_vlejan, exa_fis_ojoizq_cncorre_vcerca, exa_fis_ojoamb_sncorre_vlejan, 
exa_fis_ojoamb_sncorre_vcerca, exa_fis_oojoamb_cncorre_vlejan, exa_fis_ojoamb_cncorre_vcerca
FROM historia_clinica WHERE cod_historia_clinica = '".($cod_historia_clinica)."'";
$consultar_estructura_hist_clinica = mysqli_query($conectar, $obtener_estructura_hist_clinica) or die(mysqli_error($conectar));
$info_estructura_hist_clinica= mysqli_fetch_assoc($consultar_estructura_hist_clinica);

$motivo                            = $info_estructura_hist_clinica['motivo'];
$exa_fis_fc                        = $info_estructura_hist_clinica['exa_fis_fc'];
$exa_fis_fresp                     = $info_estructura_hist_clinica['exa_fis_fresp'];
$exa_fis_ta                        = $info_estructura_hist_clinica['exa_fis_ta'];
$exa_fis_peso                      = $info_estructura_hist_clinica['exa_fis_peso'];
$exa_fis_talla                     = $info_estructura_hist_clinica['exa_fis_talla'];
$exa_fis_imc                       = $info_estructura_hist_clinica['exa_fis_imc'];
$exa_fis_periabdom                 = $info_estructura_hist_clinica['exa_fis_periabdom'];
$ant_gine_prim_mestrua             = $info_estructura_hist_clinica['ant_gine_prim_mestrua'];
$ant_gine_fum                      = $info_estructura_hist_clinica['ant_gine_fum'];
$ant_gine_fich_gine_g              = $info_estructura_hist_clinica['ant_gine_fich_gine_g'];
$ant_gine_fich_gine_p              = $info_estructura_hist_clinica['ant_gine_fich_gine_p'];
$ant_gine_fich_gine_a              = $info_estructura_hist_clinica['ant_gine_fich_gine_a'];
$ant_gine_fich_gine_c              = $info_estructura_hist_clinica['ant_gine_fich_gine_c'];
$exa_fis_neurolog_romberg          = $info_estructura_hist_clinica['exa_fis_neurolog_romberg'];
$exa_fis_neurolog_mciega           = $info_estructura_hist_clinica['exa_fis_neurolog_mciega'];
$exa_fis_neurolog_dixhalp          = $info_estructura_hist_clinica['exa_fis_neurolog_dixhalp'];
$exa_fis_ojoder_sncorre_vlejan     = $info_estructura_hist_clinica['exa_fis_ojoder_sncorre_vlejan'];
$exa_fis_ojoder_sncorre_vcerca     = $info_estructura_hist_clinica['exa_fis_ojoder_sncorre_vcerca'];
$exa_fis_ojoder_cncorre_vlejan     = $info_estructura_hist_clinica['exa_fis_ojoder_cncorre_vlejan'];
$exa_fis_ojoder_cncorre_vcerca     = $info_estructura_hist_clinica['exa_fis_ojoder_cncorre_vcerca'];
$exa_fis_ojoizq_sncorre_vlejan     = $info_estructura_hist_clinica['exa_fis_ojoizq_sncorre_vlejan'];
$exa_fis_ojoizq_sncorre_vcerca     = $info_estructura_hist_clinica['exa_fis_ojoizq_sncorre_vcerca'];
$exa_fis_ojoizq_cncorre_vlejan     = $info_estructura_hist_clinica['exa_fis_ojoizq_cncorre_vlejan'];
$exa_fis_ojoizq_cncorre_vcerca     = $info_estructura_hist_clinica['exa_fis_ojoizq_cncorre_vcerca'];
$exa_fis_ojoamb_sncorre_vlejan     = $info_estructura_hist_clinica['exa_fis_ojoamb_sncorre_vlejan'];
$exa_fis_ojoamb_sncorre_vcerca     = $info_estructura_hist_clinica['exa_fis_ojoamb_sncorre_vcerca'];
$exa_fis_oojoamb_cncorre_vlejan    = $info_estructura_hist_clinica['exa_fis_oojoamb_cncorre_vlejan'];
$exa_fis_ojoamb_cncorre_vcerca     = $info_estructura_hist_clinica['exa_fis_ojoamb_cncorre_vcerca'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
$obtener_estructura_trabajo_altura = "SELECT recomend_emp, recomend_trab FROM actitud_laboral WHERE cod_historia_clinica = '".($cod_historia_clinica)."'";
$consultar_estructura_trabajo_altura = mysqli_query($conectar, $obtener_estructura_trabajo_altura) or die(mysqli_error($conectar));
$info_estructura_trabajo_altura= mysqli_fetch_assoc($consultar_estructura_trabajo_altura);

$recomend_emp                 = $info_estructura_trabajo_altura['recomend_emp'];
$recomend_trab                = $info_estructura_trabajo_altura['recomend_trab'];
/* --------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------------------------------------------------------------------- */
$actualizar_info_trabaltura= "UPDATE trabajo_altura SET motivo_trabajo_altura = '$motivo', explo_fis_fc = '$exa_fis_fc', 
explo_fis_fr = '$exa_fis_fresp', explo_fis_ta = '$exa_fis_ta', explo_fis_peso = '$exa_fis_peso', 
explo_fis_talla = '$exa_fis_talla', explo_fis_imc = '$exa_fis_imc', explo_fis_pericintura = '$exa_fis_periabdom', 
ant_gine_menarquia = '$ant_gine_prim_mestrua', ant_gine_fmu = '$ant_gine_fum', ant_gine_g = '$ant_gine_fich_gine_g', 
ant_gine_p = '$ant_gine_fich_gine_p', ant_gine_a = '$ant_gine_fich_gine_a', ant_gine_c = '$ant_gine_fich_gine_c', 
explo_fis_testromberg = '$exa_fis_neurolog_romberg', explo_fis_priebmarcha = '$exa_fis_neurolog_mciega', 
explo_fis_dixhalp = '$exa_fis_neurolog_dixhalp', 
exa_fis_ojoder_sncorre_vlejan = '$exa_fis_ojoder_sncorre_vlejan', exa_fis_ojoder_sncorre_vcerca = '$exa_fis_ojoder_sncorre_vcerca', 
exa_fis_ojoder_cncorre_vlejan = '$exa_fis_ojoder_cncorre_vlejan', exa_fis_ojoder_cncorre_vcerca = '$exa_fis_ojoder_cncorre_vcerca', 
exa_fis_ojoizq_sncorre_vlejan = '$exa_fis_ojoizq_sncorre_vlejan', exa_fis_ojoizq_sncorre_vcerca = '$exa_fis_ojoizq_sncorre_vcerca', 
exa_fis_ojoizq_cncorre_vlejan = '$exa_fis_ojoizq_cncorre_vlejan', exa_fis_ojoizq_cncorre_vcerca = '$exa_fis_ojoizq_cncorre_vcerca', 
exa_fis_ojoamb_sncorre_vlejan = '$exa_fis_ojoamb_sncorre_vlejan', exa_fis_ojoamb_sncorre_vcerca = '$exa_fis_ojoamb_sncorre_vcerca', 
exa_fis_oojoamb_cncorre_vlejan = '$exa_fis_oojoamb_cncorre_vlejan', exa_fis_ojoamb_cncorre_vcerca = '$exa_fis_ojoamb_cncorre_vcerca', 
explo_fis_recomenespecifempre = '$recomend_emp', explo_fis_recomenespeciftrab = '$recomend_trab'
WHERE cod_historia_clinica = '$cod_historia_clinica'";
$resultado_info_trabaltura = mysqli_query($conectar, $actualizar_info_trabaltura) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina_redirec?>">
<?php } else { ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina_redirec?>">
<?php } ?>
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
<?php include_once('../admin/05_modulo_js.php'); ?>
<script src="ckeditor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="ckeditor/ckfinder/ckfinder.js" type="text/javascript"></script>

<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.es.js"></script>
<script type="text/javascript">$('#fecha_ymd').datetimepicker({ format: 'yyyy/MM/dd', language: 'es' });</script>
<!-- 1****************************************************************************************************** -->
<script type="text/javascript">
$(document).ready(function() {

$(".ant_person_pato_convul").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_convul").val("SI"); } else { $(".ant_person_pato_convul").val("NO"); } });
$(".ant_person_pato_dificulresp").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_dificulresp").val("SI"); } else { $(".ant_person_pato_dificulresp").val("NO"); } });
$(".ant_person_pato_reacalerg").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_reacalerg").val("SI"); } else { $(".ant_person_pato_reacalerg").val("NO"); } });
$(".ant_person_pato_problemcorazon").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_problemcorazon").val("SI"); } else { $(".ant_person_pato_problemcorazon").val("NO"); } });
$(".ant_person_pato_claustofob").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_claustofob").val("SI"); } else { $(".ant_person_pato_claustofob").val("NO"); } });
$(".ant_person_pato_presionalta").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_presionalta").val("SI"); } else { $(".ant_person_pato_presionalta").val("NO"); } });
$(".ant_person_pato_dificuloler").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_dificuloler").val("SI"); } else { $(".ant_person_pato_dificuloler").val("NO"); } });
$(".ant_person_pato_tomamedicam").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_tomamedicam").val("SI"); } else { $(".ant_person_pato_tomamedicam").val("NO"); } });
$(".ant_person_pato_diabetes").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_diabetes").val("SI"); } else { $(".ant_person_pato_diabetes").val("NO"); } });
$(".ant_person_pato_usalentes").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_usalentes").val("SI"); } else { $(".ant_person_pato_usalentes").val("NO"); } });
$(".ant_person_pato_problempulmonar").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_problempulmonar").val("SI"); } else { $(".ant_person_pato_problempulmonar").val("NO"); } });
$(".ant_person_pato_dificuldistinguircolor").change(function(){ if( $(this).is(':checked') ){ $(".ant_person_pato_dificuldistinguircolor").val("SI"); } else { $(".ant_person_pato_dificuldistinguircolor").val("NO"); } });

$("input").change(function(){  
var valor = $(this).val();
var campo = $(this).attr("name");
let id = this.id;
$.ajax({  
    url:"guardar_edit_trabajo_altura_ajax.php",  
    method:"POST",  
    data:{valor:valor, campo:campo, id:<?php echo $cod_trabajo_altura ?>},  
    success:function(data){  
         $('#result').html(data);  
    }  
});  
});

$("select").change(function(){  
var valor = $(this).val();
var campo = $(this).attr("name");
let id = this.id;
$.ajax({  
    url:"guardar_edit_trabajo_altura_ajax.php",  
    method:"POST",  
    data:{valor:valor, campo:campo, id:<?php echo $cod_trabajo_altura ?>},  
    success:function(data){  
         $('#result').html(data);  
    }  
});  
});

$("textarea").change(function(){  
var valor = $(this).val();
var campo = $(this).attr("name");
let id = this.id;
$.ajax({  
    url:"guardar_edit_trabajo_altura_ajax.php",  
    method:"POST",  
    data:{valor:valor, campo:campo, id:<?php echo $cod_trabajo_altura ?>},  
    success:function(data){  
         $('#result').html(data);  
    }  
});  
});

});
</script>
</body>
</html>