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
$tabla = 'manipulacion_alimento';
?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs">
<a href="../admin/lista_paciente_buscar.php"><h4>Manipulación de Alimentos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="../admin/lista_crear_nuevo_registro.php?tabla=<?php echo $tabla ?>">Registrar Manipulación de Alimentos</h4></a>
</div>

<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina = $_SERVER['PHP_SELF'];
?>
<div class="table-responsive">
<table id="tabla_clase_datatable" class="table table-bordered">
<thead>
<tr>
<th>CMA</th>
<th>Crear</th>
<th>Cedula</th>
<th>Nombre Paciente</th>
<th>Motivo</th>
<th>Nombre Profesional</th>
<th>Fecha</th>
<th>Hc</th>
<th>Imp</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
$sql_cliente = "SELECT manipulacion_alimento.cod_manipulacion_alimento, manipulacion_alimento.cod_historia_clinica, 
manipulacion_alimento.cod_cliente, manipulacion_alimento.cod_administrador, manipulacion_alimento.motivo_manipulacion_alimento, 
administrador.nombres AS nombre_prof, administrador.apellidos AS apellidos_prof, cliente.cedula, cliente.nombres, cliente.apellido1, 
manipulacion_alimento.fecha_time, cliente.url_img_foto_min, cliente.url_img_firma_min
FROM historia_clinica RIGHT JOIN (cliente RIGHT JOIN (administrador RIGHT JOIN manipulacion_alimento 
ON administrador.cod_administrador = manipulacion_alimento.cod_administrador) ON cliente.cod_cliente = manipulacion_alimento.cod_cliente) 
ON historia_clinica.cod_historia_clinica = manipulacion_alimento.cod_historia_clinica ORDER BY manipulacion_alimento.fecha_time DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
//HAVING (((cliente.cedula) LIKE '') OR ((cliente.nombres) LIKE '') OR ((cliente.apellido1) LIKE '')) ORDER BY manipulacion_alimento.fecha_time DESC";
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {
$cod_manipulacion_alimento           = $info_cliente['cod_manipulacion_alimento'];
$cod_historia_clinica                = $info_cliente['cod_historia_clinica'];
$cod_cliente                         = $info_cliente['cod_cliente'];
$cod_administrador_hist              = $info_cliente['cod_administrador'];
$cedula                              = $info_cliente['cedula'];
$nombres                             = $info_cliente['nombres'];
$apellido1                           = $info_cliente['apellido1'];
$motivo_manipulacion_alimento        = $info_cliente['motivo_manipulacion_alimento'];
$nombre_prof                         = $info_cliente['nombre_prof'];
$apellidos_prof                      = $info_cliente['apellidos_prof'];
$url_img_firma_min                   = $info_cliente['url_img_firma_min'];
$url_img_foto_min                    = $info_cliente['url_img_foto_min'];
$fecha_time                          = $info_cliente['fecha_time'];
$fecha_dmy                           = date("Y/m/d", $fecha_time);
$hora                                = date("H:i", $fecha_time);
?>
<tr>
<td align="center"><?php echo $cod_manipulacion_alimento?></td>
<td align="center"><a href="../admin/edit_manipulacion_alimento.php?cod_manipulacion_alimento=<?php echo $cod_manipulacion_alimento?>&cod_cliente=<?php echo $cod_cliente?>&cod_historia_clinica=<?php echo $cod_historia_clinica?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/manipulacion_alimento.png" class="img-polaroid" alt=""></a></td>
<td><?php echo $cedula?></td>
<td><?php echo $nombres.' '.$apellido1?></td>
<td><?php echo $motivo_manipulacion_alimento?></td>
<td><?php echo $nombre_prof.' '.$apellidos_prof?></td>
<td><?php echo $fecha_dmy?></td>
<td><?php echo $cod_manipulacion_alimento?></td>
<td align="center"><a href="../admin/ver_manipulacion_alimento_version_pdf.php?cod_manipulacion_alimento=<?php echo $cod_manipulacion_alimento?>&cod_cliente=<?php echo $cod_cliente?>&cod_historia_clinica=<?php echo $cod_historia_clinica?>" target="_blank"><img src="../imagenes/imprimir_peq.png" class="img-polaroid" alt=""></a></td>
<td align="center"><a href="../admin/edit_manipulacion_alimento.php?cod_manipulacion_alimento=<?php echo $cod_manipulacion_alimento?>&cod_cliente=<?php echo $cod_cliente?>&cod_historia_clinica=<?php echo $cod_historia_clinica?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/editar.png" class="img-polaroid" alt=""></a></td>
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