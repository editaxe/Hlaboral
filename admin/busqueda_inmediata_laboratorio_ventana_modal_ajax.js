function hacer_busqueda() {
var xmlhttp;

var valor_buscar=document.getElementById('busqueda').value;

if(valor_buscar=='') {
 document.getElementById("logo_cargador").innerHTML="";
 return;
}
if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function() {
  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    document.getElementById("logo_cargador").innerHTML=xmlhttp.responseText;
    }else{ document.getElementById("logo_cargador").innerHTML='<img src="../imagenes/loader.gif" width="25" height="25" />'; }
  }
xmlhttp.open("POST","busqueda_inmediata_laboratorio_ventana_modal_php.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("buscar="+valor_buscar);
}