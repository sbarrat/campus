<?php
/**
 * Handler File Doc Comment
 *
 * Maneja las solicitudes recibidas via AJAX
 *
 * PHP Version 5.2.6
 *
 * @category inc
 * @package  football/inc
 * @author   Ruben Lacasa Mas <ruben@ensenalia.com>
 * @license  http://creativecommons.org/licenses/by-nc-nd/3.0/
 * 			 Creative Commons Reconocimiento-NoComercial-SinObraDerivada 3.0 Unported
 * @link     http://www.ensenalia.com/camps/english
 * @version  1.0 Estable
 */
require_once 'Consulta.php';
$campus = 'english';
$sql = null;
$rutaIda = false;
$rutaVuelta = false;
$mensaje = false;
/**
 * Consulta de seleccion de las lineas segun la opcion marcada en el radio button
 */
if ( isset( $_POST['rutaIda'] ) ) {
	$rutaIda = substr( $_POST['rutaIda'], strlen('Ruta'), 1 );
	$sql = "Select numeroParada, nombreParada from paradasbus 
		WHERE ruta='".$rutaIda."' AND sentido='Ida' 
		AND campus LIKE '".$campus."' order by numeroParada";
}
if ( isset( $_POST['rutaVuelta'] ) ) {
	$rutaVuelta = substr( $_POST['rutaVuelta'], strlen('Ruta'), 1 );
	$sql = "Select numeroParada, nombreParada from paradasbus
		WHERE ruta='".$rutaVuelta."' AND sentido='Vuelta'
		AND campus LIKE '".$campus."' order by numeroParada";
}
/**
 * Consulta de los nombres de las paradas en la tabla
 */
if ( isset( $_POST['ruta'] ) ) {
	$sql = "Select numeroParada, nombreParada, sentido from paradasbus 
	WHERE ruta ='".$_POST['ruta']."' 
	AND campus LIKE '".$campus."' order by numeroParada";
}
/**
 * Consulta de codigo de descuento
 */
if ( isset( $_POST['descuento'] ) ) {
	$cupon = filter_input( INPUT_POST, 'descuento', FILTER_SANITIZE_STRING );
	$sql = "SELECT * FROM cuponescampus WHERE cupon LIKE '".$cupon."' 
	AND campus LIKE '".$campus."'";
}
/**
 * Ejecutamos las consultas y devolvemos los resultados
 */
if ( !is_null( $sql ) ) {
	$consulta = new Consulta('Mysql');
	$consulta->consulta( $sql );
	$precioBase = $consulta->precios[$campus]['base'];
	$precioGuarderia = $consulta->precios[$campus]['guarderia'];
	/**
	 * Se ha consultado el descuento
	 */
	if ( isset( $_POST['descuento'] ) ) {
		$codigo = 0;
		$precio = $precioBase;
		$resultados = $consulta->resultados();
		if ( count( $resultados ) == 1 ) {
			$precio -=  $resultados[0]['valor'];
			$codigo = 1;
		}
		if ( strlen( $_POST['descuento'] ) == 0 ) { // no hemos especificado codigo
			$codigo = 2;
		} 
		if ( isset( $_POST['guarderia'] ) ) {
			if ( $_POST['guarderia'] ) {
				$precio += $precioGuarderia;
			}
		}
		$precio = number_format( round( $precio, 2 ), 2, ',', '.' )."&euro;";
		$mensaje = json_encode( array('precio' => $precio, 'codigo' => $codigo ) );
	}
	/**
	 * Se ha consultado o bien la ruta de ida o la de vuelta
	 */
	if ( isset($_POST['rutaIda']) || isset($_POST['rutaVuelta'] ) ) {
 		foreach ( $consulta->resultados() as $resultado ) {
			$mensaje .= "<option value='".$resultado['numeroParada']."'>" . 
				$resultado['numeroParada'] ." - ". $resultado['nombreParada']."</option>";
		}
	}
	/**
	 * Se ha consultado la ruta
	 */
	if ( isset( $_POST['ruta'] ) ) {
		foreach( $consulta->resultados() as $resultado ) {
			if ( $resultado['sentido'] == 'Ida' ) {
				$ida[$resultado['numeroParada']] = $resultado['nombreParada'];
			}
			if ( $resultado['sentido'] == 'Vuelta' ) {
				$vuelta[$resultado['numeroParada']] = $resultado['nombreParada'];
			}
		}
		//Devolvemos la tabla html
		for ( $i=1; $i <= count( $ida ); $i++ ) {
			$mensaje .= "<tr>";
			$mensaje .= "<td>".$i."</td>";
			$mensaje .= "<td>".$ida[$i]."</td>";
			$mensaje .= "<td>".$vuelta[$i]."</td>";
		    $mensaje .= "</tr>";
		}
	}
}
echo $mensaje;

