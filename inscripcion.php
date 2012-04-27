<?php 
session_start();
/**
 * Solo para depuracion
 */
ini_set('display_errors', 1);
ini_set('html_errors', 1);
error_reporting(E_ALL);

/**
 * Ficheros obligatorios
 */
require_once 'inc/Cliente.php';
require_once 'inc/Consulta.php';
require_once 'inc/Procesa.php';
/**
 * Inicializamos variables;
 */
$consulta = new Consulta();
$procesa = new Procesa();
$datos = $consulta->camposTabla();
/**
 * Datos tratados en la funcion y no enviados por el formulario
 * @var array $listaNegra
 */
$listaNegra = array('amigos','fotoParticipante','tipoFotoParticipante',
		'webReferencia','codigoDescuento');
$datosProcesados = array();
$urlPromo = false;
$datosPresentacion = false;
$emailsValidosAmigos = 0;
$amigos = "";
$cuponValido = false;
/**
 * Chequeamos si el registro se ha producido desde alguna url de Promo
 */
if ( isset($_SESSION['referer'] ) && ( $consulta->urlPromo( $_POST['campus'], $_SESSION['referer'] ) ) ) {
	$urlPromo = true;
}
/**
 * Chequeamos si se han marcado las condiciones del campus
 */
if ( isset( $_POST['condicionesAceptadas'] ) && $_POST['condicionesAceptadas'] == 'Si' ) {
	/**
	 * Chequeamos se se ha marcado alguna semana del campus
	 */
	if ( isset( $_POST['semana1Campus'] ) || isset( $_POST['semana2Campus'] )
			|| isset( $_POST['semana3Campus'] ) || isset( $_POST['semana4Campus'] ) ) {
		/**
		 * Chequeamos si se ha subido la foto y la convertimos para ponerla en
		 * la base de datos y para mostrarla en el email y en el resultado final
		 */
		if ( is_file( $procesa->pathFiles.$_POST['imgOri'] ) && is_file( $procesa->pathFiles.$_POST['imgNew'] ) ) {
			
			$ficheroFoto = realpath( $procesa->pathFiles.$_POST['imgNew'] );
			$fotoAnterior = realpath( $procesa->pathFiles.$_POST['imgOri'] );
			$fotoThumb = realpath( $procesa->pathThum.$_POST['imgOri'] );
			/**
			 * Almacenamos los datos de la foto
			 */
			$tipoFoto = getimagesize( $ficheroFoto );
			$tipoFotoParticipante = $tipoFoto['mime'];
			$fotoParticipante = $procesa->procesaFoto( $ficheroFoto, $tipoFotoParticipante );
			$datosProcesados[':fotoParticipante'] = $fotoParticipante;
			$datosProcesados[':tipoFotoParticipante'] = $tipoFotoParticipante;
			/**
			 * Eliminamos las fotografias subidas
			 */
			unlink( $fotoAnterior );
			unlink( $fotoThumb );
			unlink( $ficheroFoto );
		} else {
			$class = 'error';
			$mensaje = "<strong>Error:<strong> No ha adjuntado una foto del participante<br/>";
			$mensaje .= "Tiene que adjuntar una foto del participante <a href='#' onClick='history.go(-1)'><< Volver</a>";
			$datosProcesados[':fotoParticipante'] = null;
			$datosProcesados[':tipoFotoParticipante'] = null;
		}
		
		/**
		 * Chequeamos el codigo de descuento
		 */
		if ( isset( $_POST['codigoDescuento'] ) && $_POST['codigoDescuento'] != '' ) {
			// El cliente ha escrito un cupon
			$cuponValido = $consulta->cuponValido( $_POST['codigoDescuento'], $_POST['campus'] );
			if ( $cuponValido ) {
				$datosProcesados[':codigoDescuento'] = $_POST['codigoDescuento'];
				$datosProcesados[':amigos'] = '';
			}
		} else if ( isset( $_POST['amigos'] ) ) {
			// Si hemos mandado el email a 4 o mas amigos
			$datosCupon = 
				$consulta->cuponAmigos( $_POST['campus'], $_POST['amigos'], $_POST['emailParticipante'] );
			$datosProcesados[':codigoDescuento'] = $datosCupon['cupon'];
			$datosProcesados[':amigos'] = $datosCupon['amigos'];
		}
		
		/**
		 * Tratamos los datos para insertarlos en la base de datos
		 */
		foreach( $datos as $key => $dato ) {
			if ( isset( $_POST[ $key ] ) && !in_array( $key, $listaNegra ) ) {
				$datosProcesados[':'.$key] = $_POST[$key];
			} else if( !in_array( $key, $listaNegra ) ) {
				$datosProcesados[':'.$key] = '';
			}
		}
		$datosProcesados[':webReferencia'] = $_SESSION['referer'];
		$datosProcesados[':localizador'] = $consulta->localizadorReserva();
		$datosProcesados[':idInscripcion'] = '';
		
		/**
		 * Agregamos los datos a la base de Datos local
		 * @fixme no llega ni :codigoDescuento ni :amigos
		 */
		
		$consulta->agregarDatos( $datosProcesados );
		$datosProcesados['origen'] = $_SERVER['SERVER_ADDR'];
		$idInscripcion = $consulta->generaIdInscripcion();
		$datosProcesados[':idInscripcion'] = $idInscripcion;
		$_SESSION['photoId'] = $idInscripcion;
		$datosProcesados[':fechaCreacion'] = $consulta->fechaCreacion();

		/**
		 * Mandamos los datos por SOAP al servidor remoto
		 * todo habilitar en version final
		 */
		$cliente = new Cliente();
		$enviado = $cliente->enviaSoap( $datosProcesados );
		if ( $enviado ) {
			$class='success';
			$mensaje='Inscripcion Realizada con exito';
		} else {
			$class='error';
			$mensaje='No se ha podido realizar la inscripcion. Intentelo
			mas tarde. Perdon por las molestias';
		}
		/**
		 * Invitamos a los amigos
		 */
		if ( $datosProcesados[':amigos'] != '' ) {
			$cliente->invitaAmigos( $datosProcesados );
		}
		/**
		 * Mandamos el email. Deberiamos mandarlo tanto al cliente como notificacion propia
		 * todo habilitar en version final
		 */
		$enviadoEmail = $cliente->enviaMail( $datosProcesados, $urlPromo );
		if ( $enviadoEmail ) {
			$mensaje .= ' - Se ha enviado un email con los datos de la inscripcion';
		} else {
			$mensaje .= ' - No ha sido posible enviar el email. Intentelo mas tarde';
		}
		
		$datosPresentacion = $procesa->datosFormateados( 'web', $datosProcesados, $urlPromo );
		
	} else {
		$class='error';
		$mensaje = "Debe marcar alguna opción de campus <a href='#' onClick='history.go(-1)'><< Volver</a>";
	}
} else {
	$class='error';
	$mensaje = "No se han marcado las condiciones";
}
/**
 * Fin del codigo PHP inicio del HTML de presentación de resultados
 */
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>English Camp 2012 - &copy;www.ensenalia.com 2012</title>
<meta name="description"
 content="English Camp 2012 Campamento Urbano Inglés para niños">
<meta name="author" content="Ruben Lacasa">

<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="http://www.ensenalia.com/camps/english/css/bootstrap.css">
<style>
body {
	padding-top: 60px;
	padding-bottom: 40px;
}

#map_canvas {
	height: 450px;
    margin-left: 0px;
}
.carousel-inner {
	margin-left:0px;
}

#logo {
	margin-top: 8px;
	float: right;
}
input.error {
  color: #b94a48;
  background-color: #f2dede;
  border-color: #b94a48;
}

</style>
<link rel="stylesheet" href="http://www.ensenalia.com/camps/english/css/bootstrap-responsive.css">
<link rel="stylesheet" href="http://www.ensenalia.com/camps/english/css/style.css">
<script src="js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
<script
  src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
		window.jQuery
				|| document
						.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>');
</script>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
   <div class="container">
    <a class="btn btn-navbar" data-toggle="collapse"
     data-target=".nav-collapse"> <span class="icon-bar"></span> <span
     class="icon-bar"></span> <span class="icon-bar"></span>
    </a> <a class="brand" href="index.html">English Camp 2012</a>
    <div class="nav-collapse">
     <ul class="nav">
      <li class="active"><a href="#home">Inicio</a></li>
     </ul>
    </div>
    <!--/.nav-collapse -->
    <div id="logo">
     <a href="http://www.ensenalia.com"> <img
      alt="Enseñalia - Pasion por enseñar" src="img/ensenalia.svg"
      width="100px" title="Ir a ensenalia.com" />
     </a>
    </div>
   </div>
   <!--/.container-->
  </div>
  <!--/.navbar-inner-->
 </div>
<div class='container'>
<div id="loading-image" class="progress">
	Realizando la inscripcion, por favor espere...
  <div class="bar" style="width: 100%;"></div>
</div>
	<div class="alert alert-<?php echo $class; ?>">
		<?php echo $mensaje; ?>
	</div>
	<div class='span12'>
<?php  
if ( $class=='success'){
	$datos = $consulta->verDato();
	echo $datosPresentacion;
}

?>
	</div>
<!-- PIE DE LA WEB 
============================ -->   
	<hr>
	<div class='span12'>
        <footer>
            <p>&copy; Enseñalia 2012 - <a href='mailto:info@ensenalia.com'>info@ensenalia.com</a> - 902 636 096</p>
        </footer>
    </div>
</div>
<!-- FIN  -->
<script src="js/libs/bootstrap/transition.js"></script>
<script src="js/libs/bootstrap/collapse.js"></script>
<script src="js/libs/bootstrap/scrollspy.js"></script>
<script src="js/libs/bootstrap/tooltip.js"></script>
<script src="js/libs/bootstrap/carousel.js"></script>
<script src="js/libs/jquery.validate.min.js"></script>
<script src="js/libs/additional-methods.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<script>
$(window).load( function() {
	$('#loading-image').hide();
});
</script>
</body>
</html>
