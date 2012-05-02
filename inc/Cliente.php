<?php
/**
 * Envia los datos al servidor de respaldo
 * @author ruben
 *
 */
require_once 'Procesa.php';
class Cliente {
	public $campus = "English Camp";
	public $urlCampus = "http://www.ensenalia.com/camps/english/";
	public $imgCampus = "img/summer.png";
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
	/**
	 * Envia el email con la confirmacion del registro al cliente y a la central
	 * 
	 * @param unknown_type $vars
	 * @return boolean
	 */
	function enviaMail( $vars, $urlPromo ) {
		$listaNegra = array(':fotoParticipante',':tipoFotoParticipante','MAX_FILE_SIZE', 'fotoParticipante','origen');
		$mailDest = $vars[':emailParticipante'];
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'Bcc: camps@ensenalia.com' . "\r\n";
		$headers .= 'Return-Path: camps@ensenalia.com' . "\r\n";
		// Additional headers
		$headers .= 'From: '.$this->campus.' '.date('Y').' <camps@ensenalia.com>' . "\r\n";
		$procesa = new Procesa();
		$body = $procesa->datosFormateados( 'email', $vars, $urlPromo );

		if ( mail($mailDest,'Inscripción '. $this->campus." ".date('Y') , $body, $headers ) ) {
			return true;
		} else {
			return false;
		}	
	}
	/**
	 * Envia las invitaciones a los amigos
	 * @param array $var
	 * @return boolean
	 */
	function invitaAmigos( $var ) {
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		//$headers .= 'Bcc: ' . $var[':amigos'] . "\r\n";
		$headers .= 'Return-Path: camps@ensenalia.com' . "\r\n";
		$subject = $var[':nombreParticipante']." ".$var[':apellidosParticipante']." te invita al ".$this->campus." ".date('Y');
		$body = "<p><img src='http://www.ensenalia.com/camps/english/".$this->imgCampus."' title='".$this->campus." ".date('Y')."' /></p>";
		$body .= "<div><h1>Invitación al ".$this->campus."</h1></div>";
		$body .= "<p>".$var[':nombreParticipante']." ".$var[':apellidosParticipante']." 
		te a invitado a que le acompañes al 
		<a href='".$this->urlCampus."'>".$this->campus."</a>
		y si tu y otros 3 amigos o mas os apuntais 
		con el siguiente codigo <strong>".$var[':codigoDescuento']."</strong> conseguieris
		un descuento especial</p>";
		$body .= "<hr/>
		<div><a href='http://www.ensenalia.com'>&copy;ensenalia.com - ".date('Y')."</a></div>";
		// Additional headers
		$headers .= 'From: '.$this->campus.' <camps@ensenalia.com>' . "\r\n";
		$mailsAmigos = explode( ';', $var[':amigos'] );
		foreach ( $mailsAmigos as $mailDest ) {
			if ( mail( $mailDest, $subject , $body, $headers ) ) {
				return true;
			} else {
				return false;
			}
		}
	}
}