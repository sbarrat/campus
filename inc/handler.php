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
 * @link     http://www.ensenalia.com/camps/football
 * @version  2.0e Estable
 */
require_once 'Consulta.php';
$campus = 'football';
$sql = null;
$rutaIda = false;
$rutaVuelta = false;
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
 * Ejecutamos las consultas y devolvemos los resultados
 */
if ( !is_null( $sql ) ) {
	$consulta = new Consulta('Mysql');
	$consulta->consulta( $sql );
	if ( isset($_POST['rutaIda']) || isset($_POST['rutaVuelta'] ) ) {
 		foreach ( $consulta->resultados() as $resultado ) {
			echo "<option value='".$resultado['numeroParada']."'>".$resultado['numeroParada']." - ".$resultado['nombreParada']."</option>";
		}
	}
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
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$ida[$i]."</td>";
			echo "<td>".$vuelta[$i]."</td>";
		    echo "</tr>";
		}
	}
} else {
	echo false;
}
