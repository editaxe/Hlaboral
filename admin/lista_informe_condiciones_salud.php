<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
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
<div class="breadcrumbs"><a href="#"><h4>Lista de Paciente Atendidos Por Empresa</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php include_once("../admin/menu_atendidos.php") ?>

<?php
$pagina = $_SERVER['PHP_SELF'];
$tab = 'informe_condiciones_salud';
$tipo = 'eliminar';
$campo = 'cod_informe_condiciones_salud';

$fecha = date("Y/m/d");
$sql_cliente = "SELECT * FROM informe_condiciones_salud ORDER BY cod_informe_condiciones_salud DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente) or die(mysqli_error($conectar));
?>
<br>
<div class="table-responsive">
<div id="eliminar-ok" style="display:none;">&nbsp;</div>

<table class="table table-striped">
<thead>
<tr>
<th style="text-align:center">Elm</th>
<th style="text-align:center">Cod</th>
<th style="text-align:left">Empresa</th>
<th style="text-align:center">Fecha ini</th>
<th style="text-align:center">Fecha Fin</th>
<th style="text-align:center">Fecha Reg</th>
<th style="text-align:center">Hora Reg</th>
<th style="text-align:center">Edit</th>
<th style="text-align:center">Imp</th>
</tr>
</thead>
<tbody>
<?php
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {
$cod_informe_condiciones_salud = $info_cliente['cod_informe_condiciones_salud'];
$nombre_empresa = $info_cliente['nombre_empresa'];
$total_motivo = $info_cliente['total_motivo'];
$total_muestra = $info_cliente['total_muestra'];
$fecha_ini = $info_cliente['fecha_ini'];
$fecha_fin = $info_cliente['fecha_fin'];
$fecha_ymd = $info_cliente['fecha_ymd'];
$motivo = $info_cliente['motivo'];
$hora = $info_cliente['hora'];
?>
<tr id="<?php echo $cod_informe_condiciones_salud;?>">
<td class="service_list" id="cod_informe_condiciones_salud<?php echo $cod_informe_condiciones_salud ?>" data="<?php echo $cod_informe_condiciones_salud ?>"><a class="eliminar" id="cod_informe_condiciones_salud<?php echo $cod_informe_condiciones_salud ?>"><img src="../imagenes/eliminar_grand.png" class="img-polaroid" alt=""></a></td>
<td id="cod_informe_condiciones_salud_<?php echo $cod_informe_condiciones_salud;?>" style="text-align:center"><?php echo $cod_informe_condiciones_salud?></td>
<td id="nombre_empresa<?php echo $cod_informe_condiciones_salud;?>" style="text-align:left"><?php echo $nombre_empresa?></td>
<td id="fecha_ini<?php echo $cod_informe_condiciones_salud;?>" style="text-align:center"><?php echo $fecha_ini?></td>
<td id="fecha_fin<?php echo $cod_informe_condiciones_salud;?>" style="text-align:center"><?php echo $fecha_fin?></td>
<td id="fecha_ymd<?php echo $cod_informe_condiciones_salud;?>" style="text-align:center"><?php echo $fecha_ymd?></td>
<td id="hora<?php echo $cod_informe_condiciones_salud;?>" style="text-align:center"><?php echo $hora?></td>
<td id="modific<?php echo $cod_informe_condiciones_salud;?>" style="text-align:center"><a href="../admin/edit_archivo_modificable_informe_diagnostico_condiciones_salud_fecharango_empresa_motivo.php?cod_informe_condiciones_salud=<?php echo $cod_informe_condiciones_salud ?>&fecha_ini=<?php echo $fecha_ini ?>&fecha_fin=<?php echo $fecha_fin ?>&nombre_empresa=<?php echo $nombre_empresa ?>&total_muestra=<?php echo $total_muestra ?>&total_motivo=<?php echo $total_motivo ?>&motivo=<?php echo $motivo ?>" target="_blank"><img src="../imagenes/editar.png" class="img-polaroid" alt=""></a></td>
<td id="imp<?php echo $cod_informe_condiciones_salud;?>" style="text-align:center"><a href="../admin/vista_archivo_modificable_informe_diagnostico_condiciones_salud_fecharango_empresa_motivo.php?cod_informe_condiciones_salud=<?php echo $cod_informe_condiciones_salud ?>&fecha_ini=<?php echo $fecha_ini ?>&fecha_fin=<?php echo $fecha_fin ?>&nombre_empresa=<?php echo $nombre_empresa ?>&total_muestra=<?php echo $total_muestra ?>&total_motivo=<?php echo $total_motivo ?>&motivo=<?php echo $motivo ?>" target="_blank"><img src="../imagenes/imprimir_peq.png" class="img-polaroid" alt=""></a></td>

</tr id="<?php echo $cod_informe_condiciones_salud;?>">
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
<?php include_once('../admin/05_modulo_js.php'); ?>

<script type="text/javascript">
$(document).ready(function() {

    $('.eliminar').click(function(){
    
        var parent = $(this).parent().attr('id');
        var cod_informe_condiciones_salud = $(this).parent().attr('data');
        var dataString = 'llave='+cod_informe_condiciones_salud+'&'+'tab='+'<?php echo $tab ?>'+'&'+'campo='+'<?php echo $campo ?>'+'&'+'tipo='+'<?php echo $tipo ?>';

        $.ajax({
            type: "POST",
            url: "../admin/eliminar_ajax.php",
            data: dataString,
            success: function() {           
                $('#eliminar-ok').empty();
                $('#eliminar-ok').append('<div align="center" class="correcto">Se ha eliminado correctamente el codigo = '+cod_informe_condiciones_salud+'.</div>').fadeIn("slow");
                $('#'+parent).fadeOut("slow");
                $('#cod_informe_condiciones_salud_'+cod_informe_condiciones_salud).fadeOut("slow");
                $('#nombre_empresa'+cod_informe_condiciones_salud).fadeOut("slow");
                $('#fecha_ini'+cod_informe_condiciones_salud).fadeOut("slow");
                $('#fecha_fin'+cod_informe_condiciones_salud).fadeOut("slow");
                $('#fecha_ymd'+cod_informe_condiciones_salud).fadeOut("slow");
                $('#fecha_dmy'+cod_informe_condiciones_salud).fadeOut("slow");
                $('#hora'+cod_informe_condiciones_salud).fadeOut("slow");
                $('#modific'+cod_informe_condiciones_salud).fadeOut("slow");
                $('#imp'+cod_informe_condiciones_salud).fadeOut("slow");
                $('#tr'+cod_informe_condiciones_salud).fadeOut("slow");
                //$('#'+parent).remove();
            }
        });
    });

});
</script>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>