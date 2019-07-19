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

<div class="breadcrumbs">
<a href="../admin/lista_paciente_buscar.php"><h4>Buscar Paciente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="../admin/reg_paciente.php">Registrar Paciente</h4></a>
</div>
<hr>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina = $_SERVER['PHP_SELF'];

$sql_cliente = "SELECT cliente.cod_cliente, cliente.cod_entidad, cliente.cedula, cliente.nombres, cliente.apellido1, cliente.apellido2, cliente.fecha_nac_ymd, 
cliente.fecha_nac_time, cliente.lugar_nac, cliente.nombre_raza, cliente.lugar_residencia, cliente.nombre_religion, cliente.nombre_ocupacion, cliente.nombre_estado_civil, 
cliente.edad_anyo, cliente.nombre_grupo_rh, cliente.tel_cliente, cliente.tel_contacto1, cliente.nombre_contacto2, cliente.tel_contacto2, cliente.correo, 
cliente.nombre_escolaridad, cliente.fax, cliente.direccion, cliente.nombre_ciudad, cliente.nombre_pais, entidad.nombre_entidad
FROM entidad RIGHT JOIN cliente ON entidad.cod_entidad = cliente.cod_entidad ORDER BY cliente.fecha_time DESC";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
//$info_cliente = mysqli_fetch_assoc($resultado_cliente);
?>
<div class="table-responsive">
<table id="tabla_clase_datatable" class="table table-bordered">
<thead>
<tr>
<th>ProgCita</th>
<th>Cedula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Entidad</th>
<th>Teléfono</th>
<th>Correo</th>
<th>Dirección</th>
<?php if (($cod_seguridad == 1) || ($cod_seguridad == 2)) { ?>
<th>Edit</th>
<?php } else { } ?>
</tr>
</thead>
<tbody>
<?php
while ($info_cliente = mysqli_fetch_assoc($resultado_cliente)) {
$cod_cliente = $info_cliente['cod_cliente'];
$cedula = $info_cliente['cedula'];
$nombres = $info_cliente['nombres'];
$apellido1 = $info_cliente['apellido1'];
$apellido2 = $info_cliente['apellido2'];
$nombre_entidad = $info_cliente['nombre_entidad'];
$tel_cliente = $info_cliente['tel_cliente'];
$correo = $info_cliente['correo'];
$direccion = $info_cliente['direccion'];
?>
<tr>
<td style="text-align:center"><a href="../admin/reg_asignar_profesional_paciente.php?cod_cliente=<?php echo $cod_cliente?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/btn_hc_cita.png" class="img-polaroid" alt=""></a></td>
<td><?php echo $cedula?></td>
<td><?php echo $nombres?></td>
<td><?php echo $apellido1.' '.$apellido2 ?></td>
<td><?php echo $nombre_entidad?></td>
<td><?php echo $tel_cliente?></td>
<td><?php echo $correo?></td>
<td><?php echo $direccion?></td>
<?php if (($cod_seguridad == 1) || ($cod_seguridad == 2)) { ?>
<td style="text-align:center"><a href="../admin/edit_paciente.php?cod_cliente=<?php echo $cod_cliente?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/editar.png" class="img-polaroid" alt=""></a></td>
<?php } else { } ?>
</tr>
<?php
}
?>
</tbody>
</table><!--End table table table-striped-->
</div><!--End div table-responsive-->

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