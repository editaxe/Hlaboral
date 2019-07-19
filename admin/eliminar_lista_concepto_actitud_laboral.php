<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<script src="js/jquery-1.12.3.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="../estilo_css/jquery.dataTables.min.css">
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
<div class="breadcrumbs"><a href="../admin/menu_eliminar.php"><h4>Eliminar Concepto de Aptitud Laboral</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina = $_SERVER['PHP_SELF'];
$tab = 'actitud_laboral';
$tipo = 'eliminar';
$campo = 'cod_actitud_laboral';

$sql_cliente = "SELECT actitud_laboral.cod_actitud_laboral, actitud_laboral.cod_historia_clinica, 
actitud_laboral.cod_cliente, actitud_laboral.cod_administrador, actitud_laboral.motivo_actilab, 
administrador.nombres AS nombre_prof, administrador.apellidos AS apellidos_prof, cliente.cedula, cliente.nombres, cliente.apellido1, 
actitud_laboral.motivo_actilab, actitud_laboral.fecha_time, cliente.url_img_foto_min, cliente.url_img_firma_min
FROM historia_clinica RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN actitud_laboral 
ON administrador.cod_administrador = actitud_laboral.cod_administrador) ON cliente.cod_cliente = actitud_laboral.cod_cliente) 
ON historia_clinica.cod_historia_clinica = actitud_laboral.cod_historia_clinica ORDER BY actitud_laboral.fecha_time DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
//HAVING (((cliente.cedula) LIKE '') OR ((cliente.nombres) LIKE '') OR ((cliente.apellido1) LIKE '')) ORDER BY actitud_laboral.fecha_time DESC";
?>
<div class="table-responsive">
<div id="eliminar-ok" style="display:none;">&nbsp;</div>

<table id="tabla_clase_datatable" class="table table-bordered">
<thead>
<tr>
<th>Elim</th>
<th>COD</th>
<th>HC</th>
<th>Cedula</th>
<th>Nombre Paciente</th>
<th>Motivo</th>
<th>Nombre Profesional</th>
<th>Fecha</th>
</tr>
</thead>
<tbody>
<?php
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {
$cod_actitud_laboral = $info_cliente['cod_actitud_laboral'];
$cod_historia_clinica = $info_cliente['cod_historia_clinica'];
$cod_cliente = $info_cliente['cod_cliente'];
$cod_administrador_hist = $info_cliente['cod_administrador'];
$cedula = $info_cliente['cedula'];
$nombres = $info_cliente['nombres'];
$apellido1 = $info_cliente['apellido1'];
$motivo_actilab = $info_cliente['motivo_actilab'];
$nombre_prof = $info_cliente['nombre_prof'];
$apellidos_prof = $info_cliente['apellidos_prof'];
$url_img_firma_min = $info_cliente['url_img_firma_min'];
$url_img_foto_min = $info_cliente['url_img_foto_min'];
$fecha_time = $info_cliente['fecha_time'];
$fecha_dmy = date("Y/m/d", $fecha_time);
$hora = date("H:i", $fecha_time);
?>
<tr id="<?php echo $cod_actitud_laboral;?>">
<td class="service_list" id="cod_actitud_laboral<?php echo $cod_actitud_laboral ?>" data="<?php echo $cod_actitud_laboral ?>"><a class="eliminar" id="cod_actitud_laboral<?php echo $cod_actitud_laboral ?>"><img src="../imagenes/eliminar_grand.png" class="img-polaroid" alt=""></a></td>
<td id="cod_actitud_laboral_<?php echo $cod_actitud_laboral;?>"><?php echo $cod_actitud_laboral?></td>
<td id="cod_historia_clinica<?php echo $cod_actitud_laboral;?>"><?php echo $cod_historia_clinica?></td>
<td id="cedula<?php echo $cod_actitud_laboral;?>"><?php echo $cedula?></td>
<td id="nombres<?php echo $cod_actitud_laboral;?>"><?php echo $nombres.' '.$apellido1?></td>
<td id="motivo_actilab<?php echo $cod_actitud_laboral;?>"><?php echo $motivo_actilab?></td>
<td id="nombre_prof<?php echo $cod_actitud_laboral;?>"><?php echo $nombre_prof.' '.$apellidos_prof?></td>
<td id="fecha_dmy<?php echo $cod_actitud_laboral;?>"><?php echo $fecha_dmy?></td>
</tr id="<?php echo $cod_actitud_laboral;?>">
<?php } ?>
</tbody>
</table>
</div>

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

<script type="text/javascript">
$(document).ready(function() {

    $('.eliminar').click(function(){
    
        var parent = $(this).parent().attr('id');
        var cod_actitud_laboral = $(this).parent().attr('data');
        var dataString = 'llave='+cod_actitud_laboral+'&'+'tab='+'<?php echo $tab ?>'+'&'+'campo='+'<?php echo $campo ?>'+'&'+'tipo='+'<?php echo $tipo ?>';

        $.ajax({
            type: "POST",
            url: "../admin/eliminar_ajax.php",
            data: dataString,
            success: function() {           
                $('#eliminar-ok').empty();
                $('#eliminar-ok').append('<div align="center" class="correcto">Se ha eliminado correctamente el codigo = '+cod_actitud_laboral+'.</div>').fadeIn("slow");
                $('#'+parent).fadeOut("slow");
                $('#cod_actitud_laboral_'+cod_actitud_laboral).fadeOut("slow");
                $('#cod_historia_clinica'+cod_actitud_laboral).fadeOut("slow");
                $('#cedula'+cod_actitud_laboral).fadeOut("slow");
                $('#nombres'+cod_actitud_laboral).fadeOut("slow");
                $('#motivo_actilab'+cod_actitud_laboral).fadeOut("slow");
                $('#nombre_prof'+cod_actitud_laboral).fadeOut("slow");
                $('#fecha_dmy'+cod_actitud_laboral).fadeOut("slow");
                $('#tr'+cod_actitud_laboral).fadeOut("slow");
                //$('#'+parent).remove();
            }
        });
    });

});
</script>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>