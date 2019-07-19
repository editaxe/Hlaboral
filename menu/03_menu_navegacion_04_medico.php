<?php $serguridad_pagina = 1; ?>
﻿<div id="decorative2">
<div class="container">
<div class="divPanel topArea notop nobottom">
<div class="row-fluid">
<div class="span12">

<div id="divLogo" class="pull-left">
<a href="#" id="divSiteTitle"><img src="<?php echo $img_cabecera_emp; ?>" alt="logo"></a>
<!--<a href="#" id="divSiteTitle"><?php echo $nombre_emp;?></a><br /><a href="#" id="divTagLine"><?php echo $eslogan_emp;?></a>-->
</div>

<div id="divMenuRight" class="pull-right">
<div class="navbar">
<button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">MENU <span class="icon-chevron-down icon-white"></span></button>
<div class="nav-collapse collapse">
<ul class="nav nav-pills ddmenu">

<li class="dropdown"><a href="../admin/lista_cita_historia_clinica_individual.php">AtenderCita</a></li>

<li class="dropdown"><a href="../admin/lista_crear_cita.php">ProgCita</a></li>
<li class="dropdown"><a href="../admin/lista_paciente.php">Pacientes</a></li>

<li class="dropdown"><a href="../admin/lista_historia_clinica_individual_medico.php">Historia Clinica</a></li>
<li class="dropdown"><a href="../admin/lista_concepto_actitud_laboral.php">Aptitud Laboral</a></li>
<li class="dropdown"><a href="../admin/lista_remision.php">Remisión</a></li>

<li class="dropdown"><a href="../admin/atendido_por_dia.php"><img src="../imagenes/semaforo.gif">Reportes</a></li>
<li class="dropdown"><a href="../admin/menu_lista.php">Desplegable</a></li>
<!--<li class="dropdown"><a href="../admin/lista_historia_clinica_grupo.php">Historia Clinica Consolidada</a></li>-->

<li class="dropdown active"><a href="#" class="dropdown-toggle">Admin <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="../admin/lista_info_empresa.php">Info Empresa</a></li>
<li><a href="../admin/lista_usuario.php">Usuarios</a></li>
<!--<li><a href="../admin/lista_plantilla_historia_clinica.php">Plantilla Historia Clinica</a></li>-->
<li><a href="../admin/menu_eliminar.php">Eliminar</a></li>
</ul>
</li>
<li class="dropdown"><a href="../session/salir.php">Salir</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="breadcrumbs"><a href="#"><h6>HOLA <?php echo $nombres_des.' '.$apellidos_des; ?></a></h6></div>