// JavaScript Document
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosEmpleado(){
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  cod_manipulacion_alimento=document.nuevo_medicamento_formulado.cod_manipulacion_alimento.value;
  cod_historia_clinica=document.nuevo_medicamento_formulado.cod_historia_clinica.value;
  cod_cliente=document.nuevo_medicamento_formulado.cod_cliente.value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
  //uso del medotod POST
  //archivo que realizará la operacion
  //reg_medicamento_manipulacion_medicamento_reg.php
  ajax.open("POST", "reg_medicamento_manipulacion_medicamento_reg.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		LimpiarCampos();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a reg_medicamento_manipulacion_medicamento_reg.php para que inserte los datos
	ajax.send("cod_manipulacion_alimento="+cod_manipulacion_alimento+"&cod_historia_clinica="+cod_historia_clinica+"&cod_cliente="+cod_cliente)
}
//función para limpiar los campos
function LimpiarCampos(){
  document.nuevo_medicamento_formulado.cod_manipulacion_alimento.value="";
  document.nuevo_medicamento_formulado.cod_historia_clinica.value="";
  document.nuevo_medicamento_formulado.cod_cliente.value="";
  document.nuevo_medicamento_formulado.cod_manipulacion_alimento.focus();
}