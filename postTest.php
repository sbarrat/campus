<?php
require_once 'inc/Consulta.php';
$consulta = new Consulta();
/**
 * Post Test data
 */
echo "<pre>";
var_dump( $_POST );
echo "</pre>";

$codigoDescuento = false;
// Volvemos a chequear el codigo de Descuento
if ( isset( $_POST['codigoDescuento'] ) && $_POST['codigoDescuento'] != '' ) {
	// Consultamos en la base de dato a ver si es correcto
	$codigoDescuento = true;
}

if ( isset( $_POST['amigos'] ) && !$codigoDescuento && count($_POST['amigos']) >= 4 ) {
	// Si el cliente ha puesto cuatro o mas amigos
	// Generamos codigo de amigos y lo agregamos a la variable $cupon para
	// ponerlo en la inscripcion y se envia a los amigos ese cupon
	echo "Enviamos emails a estos amigos con el siguiente codigo";
	$datosProcesados['cupon'] =  $consulta->cuponAmigos();
	echo $datosProcesados['cupon'];
	foreach( $_POST['amigos'] as $amigos ) {
		$mailsAmigos .= $amigos.";";
		echo $amigos."<br/>";
	}
	$datosProcesados['amigos'] = $mailsAmigos;
	
}
foreach( $consulta->camposTabla() as $campos ) {
	if ( $campos['Field'] != 'id' ) {
		
	}
}

foreach( $consulta->camposTabla() as $campos ) {
	if ( $campos['Field'] != 'id' ) {
		$datos[$campos['Field']] = $campos['Default'];
	}
}
var_dump( $datos );