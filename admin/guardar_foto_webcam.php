<?php
//set random name for the image, used time() for uniqueness
$ruta_foto_orig              = '../archivador/foto/original/';
$nombre_foto_cryp            =  date("YmsHis");
$formato                     = '.jpg';
$url_img_foto_orig           = $ruta_foto_orig.$nombre_foto_cryp.'_orig'.$formato;

move_uploaded_file($_FILES['webcam']['tmp_name'], $url_img_foto_orig);
echo $url_img_foto_orig;
?>
