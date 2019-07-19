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

<div class="breadcrumbs"><a href="../admin/menu_eliminar.php"><h4>Eliminar Paciente</h4></a></div>
<hr>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina = $_SERVER['PHP_SELF'];
$tab = 'cliente';
$tipo = 'eliminar';
$campo = 'cod_cliente';

$sql_cliente = "SELECT cliente.cod_cliente, cliente.cod_entidad, cliente.cedula, cliente.nombres, cliente.apellido1, cliente.apellido2, cliente.fecha_nac_ymd, 
cliente.fecha_nac_time, cliente.lugar_nac, cliente.nombre_raza, cliente.lugar_residencia, cliente.nombre_religion, cliente.nombre_ocupacion, cliente.nombre_estado_civil, 
cliente.edad_anyo, cliente.nombre_grupo_rh, cliente.tel_cliente, cliente.tel_contacto1, cliente.nombre_contacto2, cliente.tel_contacto2, cliente.correo, 
cliente.nombre_escolaridad, cliente.fax, cliente.direccion, cliente.nombre_ciudad, cliente.nombre_pais, entidad.nombre_entidad
FROM entidad RIGHT JOIN cliente ON entidad.cod_entidad = cliente.cod_entidad";
$resultado_cliente = mysqli_query($conectar, $sql_cliente);
//$info_cliente = mysqli_fetch_assoc($resultado_cliente);
?>
<div class="table-responsive">
<div id="eliminar-ok" style="display:none;">&nbsp;</div>

<table class="table table-striped">
<thead>
<tr>
<th>Elim</th>
<th>Cedula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Entidad</th>
<th>Teléfono</th>
<th>Dirección</th>
<th>Correo</th>
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
<tr id="<?php echo $cod_cliente;?>">
<td class="service_list" id="cod_cliente<?php echo $cod_cliente ?>" data="<?php echo $cod_cliente ?>"><a class="eliminar" id="cod_cliente<?php echo $cod_cliente ?>"><img src="../imagenes/eliminar_grand.png" class="img-polaroid" alt=""></a></td>
<!--<td align="center"><a href="../admin/eliminar.php?llave=<?php echo $cod_cliente?>&tab=<?php echo $tab ?>&tipo=<?php echo $tipo ?>&campo=<?php echo $campo ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/eliminar.png" class="img-polaroid" alt=""></a></td>-->
<td id="cedula<?php echo $cod_cliente;?>"><?php echo $cedula?></td>
<td id="nombres<?php echo $cod_cliente;?>"><?php echo $nombres?></td>
<td id="apellido1<?php echo $cod_cliente;?>"><?php echo $apellido1.' '.$apellido2 ?></td>
<td id="nombre_entidad<?php echo $cod_cliente;?>"><?php echo $nombre_entidad?></td>
<td id="tel_cliente<?php echo $cod_cliente;?>"><?php echo $tel_cliente?></td>
<td id="direccion<?php echo $cod_cliente;?>"><?php echo $direccion?></td>
<td id="correo<?php echo $cod_cliente;?>"><?php echo $correo?></td>
</tr id="<?php echo $cod_cliente;?>">
<?php
}
?>
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
        var cod_cliente = $(this).parent().attr('data');
        var dataString = 'llave='+cod_cliente+'&'+'tab='+'<?php echo $tab ?>'+'&'+'campo='+'<?php echo $campo ?>'+'&'+'tipo='+'<?php echo $tipo ?>';

        $.ajax({
            type: "POST",
            url: "../admin/eliminar_ajax.php",
            data: dataString,
            success: function() {           
                $('#eliminar-ok').empty();
                $('#eliminar-ok').append('<div align="center" class="correcto">Se ha eliminado correctamente el codigo = '+cod_cliente+'.</div>').fadeIn("slow");
                $('#'+parent).fadeOut("slow");
                $('#cedula'+cod_cliente).fadeOut("slow");
                $('#nombres'+cod_cliente).fadeOut("slow");
                $('#apellido1'+cod_cliente).fadeOut("slow");
                $('#nombre_entidad'+cod_cliente).fadeOut("slow");
                $('#tel_cliente'+cod_cliente).fadeOut("slow");
                $('#direccion'+cod_cliente).fadeOut("slow");
                $('#correo'+cod_cliente).fadeOut("slow");
                $('#tr'+cod_cliente).fadeOut("slow");
                //$('#'+parent).remove();
            }
        });
    });

});
</script>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>