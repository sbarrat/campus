<?php 
session_start();
/**
 * SOlo para depuracion
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
$datos = array('nombreParticipante'=>'', 'apellidosParticipante'=>'',
		'sexoParticipante'=>'', 'fechaParticipante'=>'',
		'direccionParticipante'=>'', 'cpParticipante'=>'',
		'ciudadParticipante'=>'', 'tel1Participante'=>'',
		'tel2Participante'=>'', 'emailParticipante'=>'',
		'colegioParticipante'=>'', 'cursoParticipante'=>'',
		'hermanosParticipante'=>'', 'inglesParticipante'=>'',
		'fotoParticipante'=>'', 'tipoFotoParticipante'=>'',
		'comentariosParticipante'=>'','nombreContacto'=>'',
		'apellidosContacto'=>'',
		'movilContacto'=>'', 'alergiasMedicos'=>'',
		'condicionesMedicos'=>'', 'tratamientoMedicos'=>'',
		'DietaMedicos'=>'', 'nombrePadre'=>'',
		'apellidosPadre'=>'', 'movilPadre'=>'',
		'emailPadre'=>'', 'nombreMadre'=>'',
		'apellidosMadre'=>'', 'movilMadre'=>'',
		'emailMadre'=>'', 'semana1Campus'=>'',
		'semana2Campus'=>'', 'semana3Campus'=>'',
		'semana4Campus'=>'', 'servicioAutobus'=>'',
		'rutaIda'=>'', 'paradaIda'=>'',
		'rutaVuelta'=>'', 'paradaVuelta'=>'',
		'condicionesAceptadas'=>'', 'conocido'=>'',
		'localizador'=>'');
$datosProcesados = array();
$marianistas = false;
$datosPresentacion = false;

/**
 * Checkeamos si el registro se ha producido desde Marianistas
 */
if ( isset($_SESSION['referer'] ) && ($_SESSION['referer'] == "http://www.marianistas.net" )) {
	$marianistas = true;
}
// Primera validacion Se han marcado las condiciones
if ( isset( $_POST['condicionesAceptadas'] ) && $_POST['condicionesAceptadas'] == 'Si' ) {
	// Segunda Validacion se han marcado semanas
	if ( isset( $_POST['semana1Campus'] ) || isset( $_POST['semana2Campus'] )
			|| isset( $_POST['semana3Campus'] ) || isset( $_POST['semana4Campus'] ) ) {
		//Chequeamos si se ha subido la foto y la convertimos para ponerla
		// en la base de datos
		$procesa = new Procesa();
		if ( is_file($procesa->pathFiles.$_POST['imgOri']) && is_file($procesa->pathFiles.$_POST['imgNew'])) {
			
			$ficheroFoto = realpath( $procesa->pathFiles.$_POST['imgNew'] );
			$fotoAnterior = realpath( $procesa->pathFiles.$_POST['imgOri'] );
			$fotoThumb = realpath( $procesa->pathThum.$_POST['imgOri'] );
			
			$tipoFoto = getimagesize($ficheroFoto);
			//$tipoFotoParticipante = $_FILES['fotoParticipante']['type'];
			$tipoFotoParticipante = $tipoFoto['mime'];
			$fotoParticipante = $procesa->procesaFoto( $ficheroFoto, $tipoFotoParticipante );
			/**
			 * Habilitar en version final para no dejar fotografias en el servidor
			 */
// 			unlink( $fotoAnterior );
// 			unlink( $fotoThumb );
// 			unlink( $ficheroFoto );
		} else {
			$class = 'error';
			$mensaje = " - No hay ningun fichero subido - <br/>";
			die("La sesion ha finalizado. Vuelva a intentarlo <a href='javascript:history.back()'>Volver</a>");
		}
		/**
		 * Tratamos los datos para insertarlos en la base de datos
		 */
		foreach( $datos as $key => $dato ) {
			if ( isset( $_POST[ $key ] ) ) {
				$datosProcesados[':'.$key] = $_POST[$key];
			} else {
				$datosProcesados[':'.$key] = '';
			}
		}
		$datosProcesados[':fotoParticipante'] = $fotoParticipante;
		$datosProcesados[':tipoFotoParticipante'] = $tipoFotoParticipante;
		$datosProcesados[':webReferencia'] = $_SESSION['referer'];
		/**
		 * Agregamos los datos a la base de Datos local
		 */
		$consulta = new Consulta();
		$datosProcesados[':localizador'] = $consulta->localizadorReserva();
		$consulta->agregarDatos( $datosProcesados );
		$idInscripcion = $consulta->generaIdInscripcion();
		$datosProcesados[':idInscripcion'] = $idInscripcion;
		$datosProcesados['origen'] = $_SERVER['SERVER_ADDR'];
		$_SESSION['photoId'] = $idInscripcion;
		/**
		 * Mandamos los datos por SOAP al servidor remoto
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
		 * Mandamos el email. Deberiamos mandarlo tanto al cliente como notificacion propia
		 */
		$enviadoEmail = $cliente->enviaMail( $datosProcesados );
		if ( $enviadoEmail ) {
			$mensaje .= ' - Se ha enviado un email con los datos de la inscripcion';
		} else {
			$mensaje .= ' - No ha sido posible enviar el email. Intentelo mas tarde';
		}
		
		$datosPresentacion = $procesa->datosFormateados( 'web', $datosProcesados );
		
	} else {
		$class='error';
		$mensaje = "Debe marcar alguna semana de campus <a href='javascript(history.back())'>Volver</a>";
	}
} else {
	$class='error';
	$mensaje = "No se han marcado las condiciones";
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
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
<?php  if ( $class=='success'){
	$datos = $consulta->verDato();
	echo $datosPresentacion;
// 	foreach( $datos as $dato ) {
// 		foreach( $dato as $key => $valor ) {
// 			if ( $key == 'id' ) {
// 				$_SESSION['photoId'] = $valor;
// 			}
// 			if ( $key!='fotoParticipante' ) {
// 				echo "<br/>".$key."=>".$valor;
// 			}
// 		}
// 	}
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