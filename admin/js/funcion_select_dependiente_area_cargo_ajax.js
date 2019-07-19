$(function(){
	// Lista de grupo_area
	$.post( '../admin/grupo_area_ajax.php' ).done( function(respuesta) {
		$( '#grupo_area' ).html( respuesta );
	});
	// lista de grupo_area_cargo	
	$('#grupo_area').change(function() {
		var cod_grupo_area = $(this).val();
		// Lista de grupo_area_cargo
		$.post( '../admin/grupo_area_cargo_ajax.php', { cod_grupo_area: cod_grupo_area} ).done( function( respuesta ) {
			$( '#grupo_area_cargo' ).html( respuesta );
		});
	});
	// Lista de Ciudades
	$( '#grupo_area_cargo' ).change( function() {
		var pais = $(this).children('option:selected').html();
	});

})