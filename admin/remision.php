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
<?php //$pagina = addslashes($_GET['pagina']); 
$tabla = 'remision';
?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs">
<a href="../admin/remision.php"><h4>Remisión&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="../admin/lista_crear_nuevo_registro.php?tabla=<?php echo $tabla ?>">Registrar Remisión</h4></a>
</div>

<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina = $_SERVER['PHP_SELF'];
 	 	 	
$sql_cliente = "SELECT remision.cod_remision, remision.cod_cliente, remision.cod_administrador, 
remision.cod_tipo_remision, remision.motivo, remision.fecha_time, cliente.cedula, cliente.nombres, cliente.apellido1, cliente.url_img_firma, cliente.url_img_foto, 
cliente.apellido2, administrador.cuenta, administrador.nombres AS nombre_prof, administrador.apellidos AS apellidos_prof 
FROM (cliente RIGHT JOIN (administrador RIGHT JOIN remision ON administrador.cod_administrador = remision.cod_administrador) 
ON cliente.cod_cliente = remision.cod_cliente) ORDER BY remision.fecha_time DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
?>
<div class="table-responsive">
<table id="tabla_clase_datatable" class="table table-bordered">
<thead>
<tr>
<th>CRM</th>
<th>Cedula</th>
<th>Nombre Paciente</th>
<th>Motivo</th>
<th>Nombre Profesional</th>
<th>Fecha</th>
<th>Hora</th>
<th>Imp</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {
$cod_remision                      = $info_cliente['cod_remision'];
$cod_cliente                       = $info_cliente['cod_cliente'];
$cod_administrador_hist            = $info_cliente['cod_administrador'];
$cedula                            = $info_cliente['cedula'];
$nombres                           = $info_cliente['nombres'];
$apellido1                         = $info_cliente['apellido1'];
$apellido2                         = $info_cliente['apellido2'];
$motivo                            = $info_cliente['motivo'];
$nombre_prof                       = $info_cliente['nombre_prof'];
$apellidos_prof                    = $info_cliente['apellidos_prof'];
$url_img_firma                     = $info_cliente['url_img_firma'];
$url_img_foto                      = $info_cliente['url_img_foto'];
$fecha_time                        = $info_cliente['fecha_time'];
$fecha_dmy                         = date("Y/m/d", $fecha_time);
$hora                              = date("H:i", $fecha_time);
?>
<tr>
<td><?php echo $cod_remision?></td>
<td><?php echo $cedula?></td>
<td><?php echo $nombres.' '.$apellido1.' '.$apellido2?></td>
<td><?php echo $motivo?></td>
<td><?php echo $nombre_prof.' '.$apellidos_prof?></td>
<td><?php echo $fecha_dmy?></td>
<td><?php echo $hora?></td>
<td align="center"><a href="../admin/ver_remisions_version_pdf.php?cod_remision=<?php echo $cod_remision?>" target="_blank"><img src="../imagenes/imprimir_peq.png" class="img-polaroid" alt=""></a></td>
<td align="center"><a href="../admin/edit_remision.php?cod_remision=<?php echo $cod_remision?>&cod_cliente=<?php echo $cod_cliente?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/editar.png" class="img-polaroid" alt=""></a></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#tabla_clase_datatable').DataTable( {
    	"lengthMenu": [[5, 10, 25, 50, 100, 200, 300, -1], [5, 10, 25, 50, 100, 200, 300, "Todo"]],
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