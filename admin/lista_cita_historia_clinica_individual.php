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
<div class="breadcrumbs"><a href="../admin/lista_historia_clinica_individual_buscar.php"><h4>Citas de Atención al Paciente</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina = $_SERVER['PHP_SELF'];
if (($cod_seguridad == 1) || ($cod_seguridad == 2) || ($cod_seguridad == 3)) {

$sql_cliente = "SELECT historia_clinica.cod_historia_clinica, historia_clinica.cod_cliente, historia_clinica.cod_administrador, 
historia_clinica.cod_tipo_historia_clinica, historia_clinica.cod_estado_facturacion, historia_clinica.url_img_firma_orig, historia_clinica.url_img_foto_orig,
historia_clinica.total_terapia, historia_clinica.motivo, historia_clinica.fecha_time, cliente.cedula, cliente.nombres, cliente.apellido1, 
cliente.apellido2, cliente.url_img_firma, cliente.url_img_foto, administrador.cuenta, administrador.nombres AS nombre_prof, administrador.apellidos AS apellidos_prof, 
tipo_historia_clinica.nombre_tipo_historia_clinica FROM tipo_historia_clinica 
RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN historia_clinica ON administrador.cod_administrador = historia_clinica.cod_administrador) 
ON cliente.cod_cliente = historia_clinica.cod_cliente) ON tipo_historia_clinica.cod_tipo_historia_clinica = historia_clinica.cod_tipo_historia_clinica 
WHERE historia_clinica.cod_estado_facturacion = '0' ORDER BY fecha_time DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
} else {
$sql_cliente = "SELECT historia_clinica.cod_historia_clinica, historia_clinica.cod_cliente, historia_clinica.cod_administrador, 
historia_clinica.cod_tipo_historia_clinica, historia_clinica.cod_estado_facturacion, 
historia_clinica.total_terapia, historia_clinica.motivo, historia_clinica.fecha_time, cliente.cedula, cliente.nombres, cliente.apellido1, 
cliente.apellido2, administrador.cuenta, administrador.nombres AS nombre_prof, administrador.apellidos AS apellidos_prof, 
tipo_historia_clinica.nombre_tipo_historia_clinica, cliente.url_img_firma, cliente.url_img_foto, historia_clinica.url_img_firma_orig, historia_clinica.url_img_foto_orig 
FROM tipo_historia_clinica RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN historia_clinica ON administrador.cod_administrador = historia_clinica.cod_administrador) 
ON cliente.cod_cliente = historia_clinica.cod_cliente) ON tipo_historia_clinica.cod_tipo_historia_clinica = historia_clinica.cod_tipo_historia_clinica 
WHERE historia_clinica.cod_estado_facturacion = '0' AND historia_clinica.cod_administrador = '$cod_administrador' ORDER BY fecha_time DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
}
?>
<div class="table-responsive">
<table id="tabla_clase_datatable" class="table table-bordered">
<thead>
<tr>
<th>HC</th>
<?php if ($cod_seguridad == 1) { ?> 
<th>Atender</th>
<?php } else { } ?>

<?php if ($cod_seguridad == 2) { ?> 
<th>Atender</th>
<?php } else { } ?>

<?php if ($cod_seguridad == 3) { ?> 
<th>Atender</th>
<?php } else { } ?>

<th>Cedula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Motivo</th>
<th>Profesional</th>
<th>Foto</th>
<th>Firma</th>
<th>Fecha</th>
<th>Hora</th>
</tr>
</thead>
<tbody>
<?php
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {
$cod_historia_clinica = $info_cliente['cod_historia_clinica'];
$cod_cliente = $info_cliente['cod_cliente'];
$cod_administrador_hist = $info_cliente['cod_administrador'];
$cedula = $info_cliente['cedula'];
$nombres = $info_cliente['nombres'];
$apellido1 = $info_cliente['apellido1'];
$apellido2 = $info_cliente['apellido2'];
$motivo = $info_cliente['motivo'];
$nombre_prof = $info_cliente['nombre_prof'];
$apellidos_prof = $info_cliente['apellidos_prof'];
$nombre_tipo_historia_clinica = $info_cliente['nombre_tipo_historia_clinica'];
$url_img_firma_orig = $info_cliente['url_img_firma_orig'];
$url_img_foto_orig = $info_cliente['url_img_foto_orig'];
$url_img_firma = $info_cliente['url_img_firma'];
$url_img_foto = $info_cliente['url_img_foto'];
$fecha_time = $info_cliente['fecha_time'];
$fecha_dmy = date("Y/m/d", $fecha_time);
$hora = date("H:i", $fecha_time);
?>
<tr>
<td style="text-align:center"><?php echo $cod_historia_clinica?></td>
<!--
<td style="text-align:center"><a href="../admin/reg_historia_clinica.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/btn_hc_generica.png" class="img-polaroid" alt=""></a></td>
-->
<?php if ($cod_seguridad == 1) { ?>
<td style="text-align:center"><a href="../admin/reg_historia_clinica_mejorada.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/btn_hc_generica.png" class="img-polaroid" alt=""></a></td>
<?php } else { } ?>

<?php if ($cod_seguridad == 2) { ?> 
<td style="text-align:center"><a href="../admin/reg_historia_clinica_mejorada_asistente.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/btn_hc_generica.png" class="img-polaroid" alt=""></a></td>
<?php } else { } ?>

<?php if ($cod_seguridad == 3) { ?> 
<td style="text-align:center"><a href="../admin/ver_cita_historia_clinica.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/btn_hc_generica.png" class="img-polaroid" alt=""></a></td>
<?php } else { } ?>

<td><?php echo $cedula?></td>
<td><?php echo $nombres?></td>
<td><?php echo $apellido1.' '.$apellido2 ?></td>
<td><?php echo $motivo?></td>
<td><?php echo $nombre_prof.' '.$apellidos_prof ?></td>
<?php if ($url_img_foto <> '') { ?>
<td style="text-align:center"><a href="../admin/edit_cargar_foto_cliente.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina_red=<?php echo $pagina ?>"><img src="../imagenes/existe_archivo.png" class="img-polaroid" alt=""></a></td>
<?php } else { ?>
<td style="text-align:center"><a href="../admin/edit_cargar_foto_cliente.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina_red=<?php echo $pagina ?>"><img src="../imagenes/no_existe_archivo.png" class="img-polaroid" alt=""></a></td>
<?php } ?>
<?php if ($url_img_firma_orig <> '') { ?>
<td style="text-align:center"><a href="../admin/edit_cargar_firma_cliente.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina_red=<?php echo $pagina ?>"><img src="../imagenes/existe_firma.png" class="img-polaroid" alt=""></a></td>
<?php } else { ?>
<td style="text-align:center"><a href="../admin/edit_cargar_firma_cliente.php?cod_historia_clinica=<?php echo $cod_historia_clinica?>&cod_cliente=<?php echo $cod_cliente?>&pagina_red=<?php echo $pagina ?>"><img src="../imagenes/no_existe_firma.png" class="img-polaroid" alt=""></a></td>
<?php } ?>
<td><?php echo $fecha_dmy?></td>
<td><?php echo $hora?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#tabla_clase_datatable').DataTable( {
    	"lengthMenu": [[10, 40, 50, 60, 70, 80, 100, 200, 300, 400, 500, 600, 700, 800, -1], [10, 40, 50, 60, 70, 80, 100, 200, 300, 400, 500, 600, 700, 800, "Todo"]],
        "paging":   true,
        "ordering": true,
        "info":     true,
        "order": [[ 6, "desc" ]],
        "pagingType": "full_numbers",
         stateSave: true

    } );

 $('#tabla_clase_datatable tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );


} );
</script>
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
</body>
</html>