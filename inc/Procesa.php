<?php
class Procesa {
	public $pathFiles = 'server/php/files/';
	public $pathThum = 'server/php/thumbnails/';
	private $_tmpName = null;
	private $_type = null;
	private $_maxWidth = 150;
	private $_width = null;
	private $_height = null;
	private $_maxHeigth = null;
	private $_ratio = null;
	private $_imageDest = null;
	private $_imageOrig = null;
	private $_image = null;
	private $_imgFunc = array(
			'image/jpeg' => array('create' => 'imagecreatefromjpeg', 'output' => 'imagejpeg' ),
			'image/jpg'  => array('create' => 'imagecreatefromjpeg', 'output' => 'imagejpeg' ),
			'image/png'  => array('create' => 'imagecreatefrompng',  'output' => 'imagepng'  ),
			'image/gif'  => array('create' => 'imagecreatefromgif',  'output' => 'imagegif'  ),
			'image/bmp'  => array('create' => 'imagecreatefromwbmp', 'output' => 'imagewbmp' )
			);
	public $_campos = array(
			':nombreParticipante'=>'Nombre', ':apellidosParticipante'=>'Apellidos',
			':sexoParticipante'=>'Sexo', ':fechaParticipante'=>'Fecha Nacimiento',
			':direccionParticipante'=>'Dirección', ':cpParticipante'=>'Codigo Postal',
			':ciudadParticipante'=>'Ciudad', ':tel1Participante'=>'Teléfono Principal de Contacto',
			':tel2Participante'=>'Teléfono Secundario de Contacto', ':emailParticipante'=>'Correo Electronico',
			':colegioParticipante'=>'Colegio', ':cursoParticipante'=>'Curso Escolar',
			':hermanosParticipante'=>'Número de Hermanos', ':inglesParticipante'=>'Años que ha estudiado inglés',
			':comentariosParticipante'=>'Comentarios',
			':nombreContacto'=>'Nombre de la Persona de Contacto', ':apellidosContacto'=>'Apellidos de la Persona de Contacto',
			':movilContacto'=>'Movil de la Persona de Contacto', ':alergiasMedicos'=>'Alergias Conocidas',
			':condicionesMedicos'=>'Condiciones Medicas Especiales', ':tratamientoMedicos'=>'Tratamiento médico',
			':DietaMedicos'=>'Dieta Especial', ':nombrePadre'=>'Nombre Padre/Tutor',
			':apellidosPadre'=>'Apellidos Padre/Tutor', ':movilPadre'=>'Movil Padre/Tutor',
			':emailPadre'=>'Correo Electronico Padre/Tutor', ':nombreMadre'=>'Nombre Madre/Tutora',
			':apellidosMadre'=>'Apellidos Madre/Tutora', ':movilMadre'=>'Movil Madre/Tutora',
			':emailMadre'=>'Correo Electronico Madre/Tutora', ':semana1Campus'=>'1ª Semana Campus',
			':semana2Campus'=>'2ª Semana Campus', ':semana3Campus'=>'3ª Semana Campus',
			':semana4Campus'=>'4ª Semana Campus', ':servicioAutobus'=>'Servicio de Autobus',
			':rutaIda'=>'Ruta de Ida', ':paradaIda'=>'Parada de Ida',
			':rutaVuelta'=>'Ruta de Vuelta', ':paradaVuelta'=>'Parada de Vuelta',
			);
	function __construct() {
	
	}
	function procesaFoto( $tmpName, $type ) {
		$this->_type = 	$type;
		$this->_tmpName = $tmpName;
		$this->_imageOrig = $this->_imgFunc[$this->_type]['create']( $this->_tmpName );
		ob_start();
		$this->_imgFunc[$this->_type]['output']( $this->_imageOrig );
		$this->_image = addslashes( ob_get_contents() );
		ob_end_clean();
		imagedestroy( $this->_imageOrig );
		return $this->_image;
	}
	/**
	 * Formatea los datos para presentarlos ya sea en el email o en 
	 * la web como resultado final de la operacion.
	 * @param string $dest
	 */
	public function datosFormateados( $dest='web', $datos ) {
		
		//$bannedFields = array(':idInscripcion','')
		$html = "";
		$print = "";
		if ( $dest == 'email' ) {
			$img ="<img src='http://www.ensenalia.com/camps/english/foto.php?idInscripcion=".$datos[':idInscripcion']."'/>";
		} else {
			$print = "<div class='span2 offset7'><a href='javascript:window.print()'><i class='icon-print'></i> Imprimir Inscripción</a></div>";
			$img ="<img src='foto.php?idInscripcion=".$datos[':idInscripcion']."'>";
		}
		$html .= $print;
		$html .= "<div class='span8 offset1'>";
		$html .= "<div class='well'>";
		
		$html .= "<table class='table table-striped table-condensed'>";
		$html .= "<caption><h2>Datos de la Inscripción English Camp</h2></caption>";
		$html .= "<tbody>";
		
		$html .= "<tr><td><strong>Codigo Inscripción:</strong></td><td><strong>".$datos[':localizador']."</strong></td></tr>";
		$html .= "<tr><td><strong>Fotografia del Participante:</strong></td><td>".$img."</td></tr>";
		foreach( $datos as $key => $dato ) {
			if ( $key!= ':idInscripcion' && array_key_exists( $key, $this->_campos) ){
				$html .= "<tr><td><strong>".$this->_campos[$key].":</strong></td><td>".$datos[$key]."</td></tr>";		
			}
		}
		$html .= "</tbody>";
		$html .= "</table>";
		$html .= "</div>";
		if ( $this->_datos[':referer'] != 'http://www.marianistas.net' ) { // El pago de la prematricula no sale para los de marianistas
		$html .="<div class='alert alert-success'>
			<h3>Pago de la reserva de plaza</h3>
			<p><em>La reserva de plaza se realiza mediante un primer pago de <strong>99€</strong> al inscribirse 
			en el campus en nuestra web por tarjeta, paypal o transferencia.<br/>
			El resto del importe se abonará por transferencia bancaria a la cuenta 
			Caixa Penedés, c/c 2081 0600 16 3300000417, Beneficiario DX Computer, 
			antes del 3 de Junio de 2012.<br/>
			En los pagos por transferencia deberá aparecer en el CONCEPTO 
			el nombre y apellidos del alumno + English Camp 2012 + Codigo de Inscripción.<br/>  
			Se deberá remitir copia del justificante de pago por e-mail a info@ensenalia.com o por fax al 976 225 015.</em></p>
			<h4>La reserva de plaza tiene un importe de <strong>99€</strong>.
			Para realizar el pago de la reserva haga clic 
			<strong><a href='http://www.ensenalia.com/node/1196' target='_blank'>AQUI</a></strong></h4>
			</div>";
		}
		$html .="</div>
		</div>";
		$html .= $print;
		return $html;
	}
}