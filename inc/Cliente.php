<?php
/**
 * Envia los datos al servidor de respaldo
 * @author ruben
 *
 */
require_once 'Procesa.php';
class Cliente {
	function enviaSoap( $vars ) {
		$options = array(
				'location' => 'http://query.ensenalia.com/soap/server.php',
				'uri' =>'http://query.ensenalia.com/soap/'
		);
		$client = new SoapClient(NULL, $options);
		$password = bin2hex('#@! ñç*^');
		if ( $client->__soapCall('testOrigen',array( $vars['origen'] ) ) ) {
			foreach( $vars as $key => $var ) {
				$key = base64_encode( utf8_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, $password, $key, MCRYPT_MODE_ECB ) ) );
				$var = base64_encode( utf8_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, $password, $var, MCRYPT_MODE_ECB ) ) );
				$client->__soapCall( 'procesaUno',array('campo'=>$key,'dato'=>$var ) ); 
			}
			return $client->__soapCall( 'procesaDatos', array('end'=>True ) ) ;
		} else {
			die();
		}
	}
	function enviaMail( $vars ) {
		$listaNegra = array(':fotoParticipante',':tipoFotoParticipante','MAX_FILE_SIZE', 'fotoParticipante','origen');
		$mailDest = $vars[':emailParticipante'];
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'Bcc: ruben@ensenalia.com' . "\r\n";
		$headers .= 'Return-Path: ruben@ensenalia.com' . "\r\n";
		// Additional headers
		//$headers .= 'From: English Camp <englishcamp@ensenalia.com>' . "\r\n";
		$procesa = new Procesa();
		$body = $procesa->datosFormateados( 'email', $vars );
// 		$body = "<h1>Datos de la Inscripcion English Camp 2012</h1>";
// 		foreach( $vars as $key => $var ) {
// 			if ( !array_search($key, $listaNegra) ) {
// 				if ( $key != ':fotoParticipante' ) {
// 					$body.= substr($key, 1) .":".$var."<br/>";
// 				}
// 			}
// 		}
// 		$body.="<img src='http://www.ensenalia.com/camps/english/foto.php?idInscripcion=".$vars[':idInscripcion']."'/><br/>";
		if ( mail($mailDest,'Inscripcion English Camp', $body, $headers ) ) {
			return true;
		} else {
			return false;
		}
		
	}
}