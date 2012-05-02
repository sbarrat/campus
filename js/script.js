/* Author: Ruben Lacasa Mas <ruben@ensenalia.com>

*/


/*
 * Carrusel de videos
 */
var miCarousel = function() {
	$("#myCarousel").CloudCarousel({			
		reflHeight: 46,
		reflGap:2,
		titleBox: $("#title-text"),
		altBox: $("#alt-text"),
		buttonLeft: $("#left-but"),
		buttonRight: $("#right-but"),
		yRadius:80,
		xRadius:350,
		xPos: 480,
		yPos: 40,
		speed:0.15,
		minScale:0.25
	});
	$("a[rel^='prettyPhoto']").prettyPhoto();
};

/**
 * Funciones en la carga de documento
 */
var complementosIniciales = function() {
	// Activamos los tooltips
	$('.mensaje').tooltip();
	$('#semana1Campus').attr( 'checked', true );
	$('#semana1Campus').attr('disabled', 'disabled');
	// Ocultamos el boton aceptar - Modificar para el back
	$('#botonAceptar').hide();
	// Ocultamos el div del hermano pequeño
	$('.rutas').hide();
	// Configuramos el datepicker de la fecha de nacimiento
	$('.campoFecha').datepicker({
		firstDay: 1,
		dateFormat: 'dd/mm/yy',
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],		    
		monthNamesShort:['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
		yearRange: '-17:+0',
		changeMonth: true,
		changeYear: true 
	});
	
	// Inicializamos los mensajes del validador
	jQuery.extend(jQuery.validator.messages, {
	    required: "Este campo es obligatorio.",
	    email: "Introduzca una dirección de correo valida.",
	    date: "Debe introducir una fecha valida"
	});
	jQuery.validator.messages.required = "";
	// Validador de campos
	$("#formularioInscripcion").validate({		   
		invalidHandler: function(e, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
			    	? 'Falta por rellenar 1 campo obligatorio. Por favor, revise los campos marcados con *'
			    	: 'Faltan por rellenar ' + errors + ' campos obligatorios. Por favor, revise los campos marcados con *';
				$("div.error span").html(message);
				$("div.error").show();
			} else {
				$("div.error").hide();
			}
		},
		onkeyup: false,       
		messages: {           
			email: {
			    required: " ",
			    email: "Por favor introduce una direccion de correo valida, ejemplo: you@yourdomain.com",
			    condiciones: "Debe aceptar las condiciones del English Camp para poder Inscribirse"
			}
		},
	});
	

};

/**
 * Inicializacion del mapa
 */
var inicializaMapa = function() {
	var latlng = new google.maps.LatLng(41.625356, -0.900222);
	var myOptions = {
		zoom : 14,
		center : latlng,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map( document.getElementById('map_canvas'), myOptions);
	map.setCenter(latlng);
	var marker = new google.maps.Marker({
		map : map,
		position : latlng,
		title : 'Enseñalia English Camp 2012 - Colegio Marianistas'
	});
	var infoWindow = new google.maps.InfoWindow;
	google.maps.event.addListener( marker,'click',
			function() {
				latlng = marker.getPosition();
				infoWindow.setContent('<h5>English Camp 2012 - Colegio Santa María del Pilar ( Marianistas)</h5>'
							+ 'Paseo Reyes de Aragón 5 - 50012 - Zaragoza');
				infoWindow.setOptions({ 'maxWidth' : 100 });
				infoWindow.open(map, marker);
			});
	google.maps.event.addListener(map, 'click',function() { infoWindow.close(); });
};

/*
 * Se inicializa el mapa al hacer click en el boton ver Instalaciones
 */
$('#verInstalaciones').click( inicializaMapa );
/**
 * Funcion que comprueba si se han marcado las rutas de autobus
 */
var busMarcado = function(){
	if ( $('#servicioAutobus').is(':checked') ){
		if ( 
			( $("#ruta1Ida").is(':checked') || $("#ruta2Ida").is(':checked')  ) 
			&& 
			( $("#ruta1Vuelta").is(':checked') || $("#ruta2Vuelta").is(':checked') )) {
		
		return true;
	} else {
		alert('Debe seleccionar las rutas de autobuses');
		$("#condiciones").attr( 'checked', false );
		return false;
	}
	} else {
		return true;
	}
};
/**
 * Funcion que comprueba si se ha marcado alguna semana del campus
 */
var semanaMarcado = function(){
	var semanas = $('.semanaCampus:checked').length;
	if ( semanas > 0 ) {
		return true;
	} else {
		alert('Debe seleccionar al menos 1 semana del campus');
		$("#condiciones").attr( 'checked', false );
		return false;
	}
};
/**
 * Muestra el boton o lo oculta de las condiciones del campus
 */
$('#condiciones').click(function(){
	 if( $("#condiciones").is(':checked') && ( semanaMarcado() ) && ( busMarcado() )) {  
         $('#botonAceptar').show('blind'); 
     } else {  
         $('#botonAceptar').hide('blind');  
     }  
});

/**
 * Carga el listado de ruta de ida segun la seleccion
 */
$("input[name=rutaIda]").click(function(){
	 $.post('inc/handler.php',{rutaIda:this.value},function(data){
		if( data ) {
		  	$("#nombreParadaIda").html(data);
		}
	 }); 
});

/**
 * Carga el listado de ruta de vuelta segun la seleccion
 */
$("input[name=rutaVuelta]").click(function(){
	 $.post('inc/handler.php',{rutaVuelta:this.value},function(data){
		if ( data ) {
		 	$("#nombreParadaVuelta").html(data);
		}
	 });
});

/**
 * Muestra la Ruta al hacer clic en ver Ruta
 */
$(".verRuta").click(function(){
	var numeroRuta = this.id.substr(('verRuta').length,1);
	$.post('inc/handler.php',{ruta:numeroRuta},function(data){
		$('#detalleRuta' + numeroRuta ).html(data);
	});
});

/**
 * Muestra el dialogo de las tallas
 */
$('#tallas').click(function(){
		$('#dialog').html('<img src="img/tallas.png" alt="tallas" width="640px"/>');
		$('#dialog').dialog({
			title: 'Guia de Tallas',
			minWidth: 640
		});
});

/**
 * Muestra el dialogo del recorte y seleccion de fotografia
 */
$('#upload').click(function(){
		$.get('uploader.php',function(data){
			$('#dialog').html( data );
		});
		$('#dialog').dialog({
			title: 'Seleccion y Edici&oacute;n de Fotografia',
			minWidth: 800,
			minHeight: 600
		});
});
/**
 * Agrega mas emails de amigos
 */
$('.masAmigos').click(function(){
	var numero = parseInt($('#totalEmails').val()) + 1;
	$('#totalEmails').val( numero );
	var data = "<p><label class='inline'>Introduzca Email:</label>" 
		+ "<input class='control-label' type='text' name='amigos["+numero+"]' /></p>";
	$('#emailsAmigos').append(data);
});
/**
 * Function que recalcula el total
 */
var recalculaTotal = function( codigoDescuento, semanas, autobus ) {
	$.post('inc/handler.php',{descuento:codigoDescuento, semanasCampus:semanas, servicioAutobus:autobus},function( data ){
		$('#mensajeDescuento')
			.html('')
			.removeClass('alert')
			.removeClass('alert-error')
			.removeClass('alert-success');
		$('#totalInscripcion').html( data.precio );
		if ( data.codigo ) {
			if ( data.codigo == 1 ) {
				$('#mensajeDescuento')
					.html('Codigo Correcto')
					.addClass('alert')
					.addClass('alert-success');
				$('#planAmigos').hide();
			}
		} else {
				$('#mensajeDescuento')
					.html('Codigo Incorrecto')
					.addClass('alert')
					.addClass('alert-error');
				$('#planAmigos').show();
		}
	},"json"); 
};
 /**
 * Calcula el precio al aplicar el codigo de descuento
 */
$('#aplicarDescuento').click(function(){
	var semanas = $('.semanaCampus:checked').length;
	var autobus = 'No';
	if ( $('#servicioAutobus').is(':checked') ){
		autobus = 'Si';
	}
	recalculaTotal( $('#codigoDescuento').val(), semanas, autobus );
});
$('#noaplicarDescuento').click(function(){
	var semanas = $('.semanaCampus:checked').length;
	var autobus = 'No';
	if ( $('#servicioAutobus').is(':checked') ){
		autobus = 'Si';
	}
	$('#codigoDescuento').val('');
	$('#planAmigos').show();
	recalculaTotal( $('#codigoDescuento').val(), semanas, autobus );
});
/**
 * Calcula el precio si se ha marcado el bus
 */
$('#servicioAutobus').click(function(){
	var autobus = 'No';
	var semanas = $('.semanaCampus:checked').length;
	if( $('#servicioAutobus').is(':checked') ) {
		$('.rutas').show();
		autobus = 'Si';
	} else {
		$('.rutas').hide();
	}
	recalculaTotal( $('#codigoDescuento').val(), semanas, autobus );
});
/**
 * Calcula el precio segun las semanas marcadas
 */
$('.semanaCampus').click(function(){
	var semanas = $('.semanaCampus:checked').length;
	var autobus = 'No';
	if ( $('#servicioAutobus').is(':checked') ){
		autobus = 'Si';
	}
	recalculaTotal( $('#codigoDescuento').val(), semanas, autobus );
	
});
/**
* Calcula el precio con la guarderia activada
*/
//$('#guarderia').click(function(){
//	var conGuarderia = 0;
//	if( $("#guarderia").is(':checked') ) {
//		conGuarderia = 1;
//		$('#datosHermano').show();
//		recalculaTotal( $('#codigoDescuento').val(), conGuarderia );
//	} else {
//		$('#datosHermano').hide();
//		recalculaTotal( $('#codigoDescuento').val(), conGuarderia );
//	}  
//});


