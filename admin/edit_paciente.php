<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<link href="../estilo_css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<!--<link href="../estilo_css/bootstrap-combined.min.css" rel="stylesheet">-->
<link href="../estilo_css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen">
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php 
//$pagina = addslashes($_GET['pagina']);
$pagina_red = $_SERVER['PHP_SELF']; 
?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">
<div class="breadcrumbs"><a href="#"><h4>Editar Paciente</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$cod_cliente         = intval($_GET['cod_cliente']);
$pagina              = addslashes($_GET['pagina']);

$sql_cliente = "SELECT * FROM cliente WHERE cod_cliente = '$cod_cliente'";
$consulta_cliente = mysqli_query($conectar, $sql_cliente) or die(mysqli_error($conectar));
$datos_cliente = mysqli_fetch_assoc($consulta_cliente);

$cedula = $datos_cliente['cedula'];
$nombres = $datos_cliente['nombres'];
$apellido1 = $datos_cliente['apellido1'];
$apellido2 = $datos_cliente['apellido2'];
$fecha_nac_ymd = $datos_cliente['fecha_nac_ymd'];
$lugar_nac = $datos_cliente['lugar_nac'];
$lugar_procedencia = $datos_cliente['lugar_procedencia'];
$lugar_residencia = $datos_cliente['lugar_residencia'];
$cod_entidad = $datos_cliente['cod_entidad'];
$nombre_grupo_rh = $datos_cliente['nombre_grupo_rh'];
$nombre_sexo = $datos_cliente['nombre_sexo'];
$nombre_raza = $datos_cliente['nombre_raza'];
$nombre_religion = $datos_cliente['nombre_religion'];
$nombre_ocupacion = $datos_cliente['nombre_ocupacion'];
$nombre_estado_civil = $datos_cliente['nombre_estado_civil'];
$nombre_escolaridad = $datos_cliente['nombre_escolaridad'];
$correo = $datos_cliente['correo'];
$direccion = $datos_cliente['direccion'];
$tel_cliente = $datos_cliente['tel_cliente'];
$nombre_contacto1 = $datos_cliente['nombre_contacto1'];
$parentesco_contacto1 = $datos_cliente['parentesco_contacto1'];
$tel_contacto1 = $datos_cliente['tel_contacto1'];
$nombre_contacto2 = $datos_cliente['nombre_contacto2'];
$parentesco_contacto2 = $datos_cliente['parentesco_contacto2'];
$tel_contacto2 = $datos_cliente['tel_contacto2'];
$nombre_tipo_doc = $datos_cliente['nombre_tipo_doc'];
$antperson_alergia_si = $datos_cliente['antperson_alergia_si'];
$antperson_alergia_no = $datos_cliente['antperson_alergia_no'];
$antperson_alergia_cual = $datos_cliente['antperson_alergia_cual'];
$antperson_patologico_si = $datos_cliente['antperson_patologico_si'];
$antperson_patologico_no = $datos_cliente['antperson_patologico_no'];
$antperson_patologico_cual = $datos_cliente['antperson_patologico_cual'];
$antperson_quirurgico_si = $datos_cliente['antperson_quirurgico_si'];
$antperson_quirurgico_no = $datos_cliente['antperson_quirurgico_no'];
$antperson_quirurgico_cual = $datos_cliente['antperson_quirurgico_cual'];
$cargo_empresa = $datos_cliente['cargo_empresa'];
$area_empresa = $datos_cliente['area_empresa'];
$ciudad_empresa = $datos_cliente['ciudad_empresa'];
$direccion_contacto1 = $datos_cliente['direccion_contacto1'];
$direccion_contacto2 = $datos_cliente['direccion_contacto2'];
$nombre_empresa = $datos_cliente['nombre_empresa'];
$nombre_actividad_ecoemp = $datos_cliente['nombre_actividad_ecoemp'];
$nombre_estrato = $datos_cliente['nombre_estrato'];
$nombre_numero_hijos = $datos_cliente['nombre_numero_hijos'];
$nombre_tipo_regimen = $datos_cliente['nombre_tipo_regimen'];
$nombre_fondo_pension = $datos_cliente['nombre_fondo_pension'];
$nombre_arl = $datos_cliente['nombre_arl'];
$url_img_foto_min_cli = $datos_cliente['url_img_foto_min'];
$url_img_firma_min_cli = $datos_cliente['url_img_firma_min'];
$nombre_empresa_contratante = $datos_cliente['nombre_empresa_contratante'];
?>
<div class="table-responsive">
<form name="formulario_insersion" accept-charset="utf-8" method="post" action="../admin/edit_paciente_reg.php">
<fieldset>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" class="table table-responsive" cellspacing="0" cellpadding="0" style="font-family:mono; font-size:<?php echo $tamano_font_emp ?>pt; width:100%">
    <thead>
        <tr>
            <th valign="middle"><a href="../admin/edit_cargar_foto_cliente.php?cod_cliente=<?php echo $cod_cliente?>&pagina_red=<?php echo $pagina_red ?>"><img src="<?php echo $url_img_foto_min_cli ?>" class="img-polaroid" alt="Foto Paciente" style="border-style:dotted;border-width:1px;" width="71px"/></a></th>
            <th valign="middle"><a href="../admin/edit_cargar_firma_cliente.php?cod_cliente=<?php echo $cod_cliente?>&pagina_red=<?php echo $pagina_red ?>"><img src="<?php echo $url_img_firma_min_cli ?>" class="img-polaroid" alt="Foto Firma" style="border-style:dotted;border-width:1px;" width="71px"/></a></th>
        </tr>
    </thead>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div id="Info"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>TIPO DE IDENTIFICACIÓN</th>
<th>NUMERO</th>
<th>NOMBRES COMPLETOS</th>
<th>APELLIDOS</th>
<!--<th>SEGUNDO APELLIDO</th>-->
</tr></thead>
<tbody><tr>

<td><input class="input-block-level" name="nombre_tipo_doc" type="text" value="<?php echo $nombre_tipo_doc ?>" maxlength="3" required/></td>
<td><input class="input-block-level" name="cedula" type="number" value="<?php echo $cedula ?>" required/></td>
<td><input class="input-block-level" name="nombres" type="text" value="<?php echo $nombres ?>" required/></td>
<td><input class="input-block-level" name="apellido1" type="text" value="<?php echo $apellido1 ?>" required/></td>
<!--<td><input class="input-block-level" name="apellido2" type="text" value="<?php echo $apellido2 ?>" required/></td>-->
</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>FECHA DE NACIMIENTO</th>
<th>SEXO</th>
<th>EPS</th>
<th>DOMICILIO</th>
<th>TELEFONO</th>
<th>CORREO</th>
</tr></thead>
<tbody><tr>
<td><div id="fecha_nac_ymd" class="input-append date"><input type="text" name="fecha_nac_ymd" value="<?php echo $fecha_nac_ymd ?>" readonly></input><span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span></div></td>
<td><input class="input-block-level" name="nombre_sexo" type="text" value="<?php echo $nombre_sexo ?>" maxlength="1" required/></td>

<td><select name="cod_entidad" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
<?php if (isset($cod_entidad)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_entidad, nombre_entidad FROM entidad ORDER BY nombre_entidad ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_entidad) and $cod_entidad == $datos2['cod_entidad']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_entidad'];
$nombre = $datos2['nombre_entidad'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><input class="input-block-level" name="direccion" type="text" value="<?php echo $direccion ?>" required /></td>
<td><input class="input-block-level" name="tel_cliente" type="tel" value="<?php echo $tel_cliente ?>" /></td>
<td><input class="input-block-level" name="correo" type="text" value="<?php echo $correo ?>" maxlength="60" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" /></td>
</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>LUGAR DE NACIMIENTO</th>
<th>LUGAR DE PROCEDENCIA</th>
<th>LUGAR DE RESIDENCIA</th>
<th>GRUPO RH</th>
</tr></thead>
<tbody><tr>
<td><input class="input-block-level" name="lugar_nac" type="text" value="<?php echo $lugar_nac ?>"/></td>
<td><input class="input-block-level" name="lugar_procedencia" type="text" value="<?php echo $lugar_procedencia ?>" /></td>
<td><input class="input-block-level" name="lugar_residencia" type="text" value="<?php echo $lugar_residencia ?>"/></td>
<td><input class="input-block-level" name="nombre_grupo_rh" type="text" value="<?php echo $nombre_grupo_rh ?>" maxlength="3" required /></td>
</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>RAZA</th>
<th>RELIGIÓN</th>
<th>OCUPACIÓN</th>
<th>ESTADO CIVIL</th>
<th>NIVEL EDUCATIVO</th>
</tr></thead>
<tbody><tr>
<td><input class="input-block-level" name="nombre_raza" type="text" value="<?php echo $nombre_raza ?>" required/></td>
<td><input class="input-block-level" name="nombre_religion" type="text" value="<?php echo $nombre_religion ?>" required/></td>
<td><input class="input-block-level" name="nombre_ocupacion" type="text" value="<?php echo $nombre_ocupacion ?>" /></td>
<td><input class="input-block-level" name="nombre_estado_civil" type="text" value="<?php echo $nombre_estado_civil ?>" required/></td>
<td><input class="input-block-level" name="nombre_escolaridad" type="text" value="<?php echo $nombre_escolaridad ?>" required/></td>
</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>EMPRESA CONTRATANTE</th>
<th>EMPRESA A LABORAR</th>
<th>ACTIVIDAD ECONOMICA DE LA EMPRESA</th>
<th>CARGO</th>
<th>AREA A LABORAR</th>
<th>CIUDAD</th></tr></thead>
<tbody><tr>
<td><input class="input-block-level" name="nombre_empresa_contratante" type="text" value="<?php echo $nombre_empresa_contratante ?>" required/></td>
<td><input class="input-block-level" name="nombre_empresa" type="text" value="<?php echo $nombre_empresa ?>" required/></td>
<td><input class="input-block-level" name="nombre_actividad_ecoemp" type="text" value="<?php echo $nombre_actividad_ecoemp ?>" /></td>
<td><input class="input-block-level" name="cargo_empresa" type="text" value="<?php echo $cargo_empresa ?>" /></td>
<td><input class="input-block-level" name="area_empresa" type="text" value="<?php echo $area_empresa ?>" /></td>
<td><input class="input-block-level" name="ciudad_empresa" type="text" value="<?php echo $ciudad_empresa ?>" /></td>
</tr></tbody>
</table>
<br>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>ESTRATO</th>
<th>NUMERO DE HIJOS</th>
<th>TIPO RÉGIMEN</th>
<th>FONDO DE PENSIONES</th>
<th>ARL</th>
</tr></thead>
<tbody><tr>
<td><input class="input-block-level" name="nombre_estrato" type="number" value="<?php echo $nombre_estrato ?>" /></td>
<td><input class="input-block-level" name="nombre_numero_hijos" type="number" value="<?php echo $nombre_numero_hijos ?>" maxlength="2" required /></td>
<td><input class="input-block-level" name="nombre_tipo_regimen" type="text" value="<?php echo $nombre_tipo_regimen ?>" required/></td>
<td><input class="input-block-level" name="nombre_fondo_pension" type="text" value="<?php echo $nombre_fondo_pension ?>" required/></td>
<td><input class="input-block-level" name="nombre_arl" type="text" value="<?php echo $nombre_arl ?>" required/></td>
</tr></tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;"><thead><tr><th valign="middle">DATOS DE LAS PERSONAS RESPONSABLE DEL PACIENTE</th></tr></thead></table>
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr>
<th>NOMBRES COMPLETOS RESPONSABLE</th>
<th>PARENTESCO</th>
<th>TELEFONO Y/O CELULAR</th>
<th>DIRRECIÓN</th>
</tr></thead>
<tbody><tr>
<td><input class="input-block-level" name="nombre_contacto1" type="text" value="<?php echo $nombre_contacto1 ?>" /></td>
<td><input class="input-block-level" name="parentesco_contacto1" type="text" value="<?php echo $parentesco_contacto1 ?>" /></td>
<td><input class="input-block-level" name="tel_contacto1" type="tel" value="<?php echo $tel_contacto1 ?>"/></td>
<td><input class="input-block-level" name="direccion_contacto1" type="text" value="<?php echo $direccion_contacto1 ?>" /></td>
</tr></tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- 
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr><th>NOMBRES COMPLETOS RESPONSABLE 2</th><th>PARENTESCO</th><th>TELEFONO Y/O CELULAR</th><th>DIRRECIÓN</th></tr></thead>
<tbody><tr>
<td><input class="input-block-level" name="nombre_contacto2" type="text" value="<?php echo $nombre_contacto2 ?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" /></td>
<td><input class="input-block-level" name="parentesco_contacto2" type="text" value="<?php echo $parentesco_contacto2 ?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" /></td>
<td><input class="input-block-level" name="tel_contacto2" type="tel" value="<?php echo $tel_contacto2 ?>"/></td>
<td><input class="input-block-level" name="direccion_contacto2" type="text" value="<?php echo $direccion_contacto2 ?>" /></td>
</tr></tbody>
</table>
-->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- 
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;"><thead><tr><th valign="middle">ANTECEDENTES PERSONALES</th></tr></thead></table>
<table align="center" border="1" width="100%" style="font-family: Mono; font-size: 10pt;">
<thead><tr><th></th><th>SI</th><th>NO</th><th>CUAL</th></tr><thead>
<tr><th rowspan="2" valign="middle" align="left">REACCIONES ALERGICAS:</th>
<tr>
<td><input class="input-block-level" name="antperson_alergia_si" type="text" value="<?php echo $antperson_alergia_si ?>" maxlength="1" /></td>
<td><input class="input-block-level" name="antperson_alergia_no" type="text" value="<?php echo $antperson_alergia_no ?>" maxlength="1" /></td>
<td><input class="input-block-level" name="antperson_alergia_cual" type="text" value="<?php echo $antperson_alergia_cual ?>" maxlength="60" /></td>
</tr>
<tr></tr><tr><th rowspan="2" valign="middle" align="left">PATOLOGICOS:</th>
<tr>
<td><input class="input-block-level" name="antperson_patologico_si" type="text" value="<?php echo $antperson_patologico_si ?>" maxlength="1" /></td>
<td><input class="input-block-level" name="antperson_patologico_no" type="text" value="<?php echo $antperson_patologico_no ?>" maxlength="1" /></td>
<td><input class="input-block-level" name="antperson_patologico_cual" type="text" value="<?php echo $antperson_patologico_cual ?>" maxlength="60" /></td>
</tr>
<tr></tr><tr><th rowspan="2" valign="middle" align="left">QUIRURGICOS:</th>
<tr>
<td><input class="input-block-level" name="antperson_quirurgico_si" type="text" value="<?php echo $antperson_quirurgico_si ?>" maxlength="1" /></td>
<td><input class="input-block-level" name="antperson_quirurgico_no" type="text" value="<?php echo $antperson_quirurgico_no ?>" maxlength="1" /></td>
<td><input class="input-block-level" name="antperson_quirurgico_cual" type="text" value="<?php echo $antperson_quirurgico_cual ?>" maxlength="60" /></td>
</tr>
</table>
-->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<input type="hidden" name="cod_cliente" value="<?php echo $cod_cliente ?>">
<input type="hidden" name="pagina" value="<?php echo $pagina ?>">
<input type="hidden" name="ins_edit" value="formulario_insert_edit">
<hr>
<div class="actions">
<input type="submit" value="Registrar Información" name="submit" id="submitButton" class="btn btn-info pull-center" title="Click aqui para enviar" />
</div>
</fieldset>
</form>
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
<?php include_once('../admin/05_modulo_js.php'); ?>
<script src="../js/bootstrap-select.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.es.js"></script>
<script type="text/javascript">$('#fecha_nac_ymd').datetimepicker({ format: 'yyyy/MM/dd', language: 'es' });</script>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->

</body>
</html>