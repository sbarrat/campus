<?php
session_start();
require_once 'Consulta.php';
class Procesa {
	public $pathFiles = 'server/php/files/';
	public $pathThum = 'server/php/thumbnails/';
	private $_imgCampus = 'img/summer.png';
	private $_titleCampus = 'English Camp';
	private $_consulta = null;
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
			':emailMadre'=>'Correo Electronico Madre/Tutora',':semana1Campus'=>'1ª Semana Campus',
			':semana2Campus'=>'2ª Semana Campus', ':semana3Campus' => '3ª Semana Campus', ':semana4Campus'=>'4ª Semana Campus'
			);
	function __construct() {
		$this->_consulta = new Consulta();
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
	public function datosFormateados( $dest='web', $datos, $urlPromo ) {
		
		//$bannedFields = array(':idInscripcion','')
		if ( isset( $_SESSION['precios'] ) ) {
			$precios = $_SESSION['precios'];
		} else {
			$precios = $datos[':campus'];
		}
		$campus = $this->_titleCampus." ".date('Y');
		$paginaPago = "http://www.ensenalia.com/node/1196";
		$html = "";
		$print = "";
		$pie = "<hr/>
			<div><a href='http://www.ensenalia.com'>&copy;ensenalia.com - ".date('Y')."</a></div>";
		if ( $dest == 'email' ) {
			$cabezera = "<p><img src='http://www.ensenalia.com/camps/".$datos[':campus']."/".$this->_imgCampus."' 
			title='".$campus."' /></p>";
			$img ="<img src='http://www.ensenalia.com/camps/".$datos[':campus']."/foto.php?idInscripcion=".$datos[':idInscripcion']."'/>";
		} else {
			$cabezera = "";
			$print = "<div class='span2 offset7'><a href='javascript:window.print()'>
			<i class='icon-print'></i> Imprimir Inscripción</a></div>";
			$img ="<img src='foto.php?idInscripcion=".$datos[':idInscripcion']."'>";
		}
		$html .= $cabezera;
		$html .= $print;
		$html .= "<div class='span8 offset1'>";
		$html .= "<div class='well'>";
		
		$html .= "<table class='table table-striped table-condensed'>";
		$html .= "<caption><h2>Datos de la Inscripción ".$campus."</h2></caption>";
		$html .= "<tbody>";
		
		$html .= "<tr><td><strong>Codigo Inscripción:</strong></td>
			<td><strong>".$datos[':localizador']."</strong></td></tr>";
		$html .= "<tr><td><strong>Fotografia del Participante:</strong></td><td>".$img."</td></tr>";
		foreach( $datos as $key => $dato ) {
			if ( $key!= ':idInscripcion' && array_key_exists( $key, $this->_campos) ){
				$html .= "<tr><td><strong>".$this->_campos[$key].":</strong></td><td>".$datos[$key]."</td></tr>";		
			}
		}
		/**
		 * Datos del autobus
		 */
		$html .= "<tr><td><strong>Servicio Autobus:</strong></td>
		<td>".$datos[':servicioAutobus']."</td></tr>";
		if ( $datos[':servicioAutobus'] == 'Si' ) {
			$rutaIda = substr($datos[':rutaIda'], strlen('Ruta'),1 );
			$rutaVuelta = substr($datos[':rutaVuelta'], strlen('Ruta'),1 );
			$paradaIda = $this->_consulta->datosParada($rutaIda,'Ida',$datos[':paradaIda'],$datos[':campus']);
			$paradaVuelta = $this->_consulta->datosParada($rutaVuelta,'Vuelta',$datos[':paradaVuelta'],$datos[':campus']);
			$html .= "<tr><td><strong>Ruta Ida:</strong></td>
			<td>Ruta ".$rutaIda."</td></tr>";
			$html .= "<tr><td><strong>Parada Ida:</strong></td>
			<td><strong>".$datos[':paradaIda']."</strong> ".$paradaIda."</td></tr>";
			$html .= "<tr><td><strong>Ruta Vuelta:</strong></td>
			<td>Ruta ".$rutaVuelta."</td></tr>";
			$html .= "<tr><td><strong>Parada Vuelta:</strong></td>
			<td><strong>".$datos[':paradaVuelta']."</strong> ".$paradaVuelta."</td></tr>";
		}
		/**
		 * Guarderia
		 */
		
		if ( $datos[':guarderia'] == 'Si' ) {
			$html .= "<tr><td><strong>Guarderia:</strong></td>
			<td>".$datos[':guarderia']."</td></tr>";
			$html .= "<tr><td><strong>Nombre hermano/a:</strong></td>
			<td>".$datos[':nombreHermano']."</td></tr>";
			$html .= "<tr><td><strong>Apellidos hermano/a:</strong></td>
			<td>".$datos[':apellidosHermano']."</td></tr>";
			$html .= "<tr><td><strong>Sexo hermano/a:</strong></td>
			<td>".$datos[':sexoHermano']."</td></tr>";
			$html .= "<tr><td><strong>Fecha Nacimiento hermano/a:</strong></td>
			<td>".$datos[':fechanacimientoHermano']."</td></tr>";
			$html .= "<tr><td><strong>Observaciones hermano/a:</strong></td>
			<td>".$datos[':observacionesHermano']."</td></tr>";
		}
		/**
		 * Codigo Promocion y emails amigos
		 */
		if ( $datos[':codigoDescuento']!='' ) {
			$html .= "<tr><td><strong>Codigo Promoción:</strong></td>
				<td><strong>".$datos[':codigoDescuento']."</strong></td></tr>";
			if ( $datos[':amigos'] != '' ) {
				$html .= "<tr><td><strong>Emails Amigos:</strong></td>
				<td>".$datos[':amigos']."</td></tr>";
			}
		}
		/**
		 * Calculo Importe a Pagar
		 * 
		 */
		$semanasCampus = 0;
		$semanasCampus += ( $datos[':semana1Campus'] == 'Si' ) ? 1: 0;
		$semanasCampus += ( $datos[':semana2Campus'] == 'Si' ) ? 1: 0;
		$semanasCampus += ( $datos[':semana3Campus'] == 'Si' ) ? 1: 0;
		$semanasCampus += ( $datos[':semana4Campus'] == 'Si' ) ? 1: 0;
		$precioBase = $this->_consulta->precios[$precios][$semanasCampus];
		$precioBus = $this->_consulta->precios[$precios]['bus'];
		$precioPrematricula = $this->_consulta->precios[$precios]['prematricula'];
		$precio = $precioBase;
		/**
		 * Chequear el codigo de promocion
		 */
		$valorCodigo = $this->_consulta->valorCupon( $datos[':codigoDescuento'], $datos[':campus'] );
		$precio -=  $valorCodigo;
		if ( $datos[':servicioAutobus'] == 'Si' ) {
			$precio += ($precioBus * $semanasCampus);
		}
		$precioFinal = number_format( round( ($precio - $precioPrematricula), 2 ), 2, ',' ,'.' );
		$html .= "</tbody>";
		$html .= "</table>";
		$html .= "</div>";
		if ( !$urlPromo ) { // El pago de la prematricula no sale para los de marianistas
		$html .="<div class='alert alert-success'>
			<h3>Pago de la reserva de plaza</h3>
			<p>
			La reserva de plaza se realiza mediante un primer pago de 
			<strong>".$precioPrematricula."€</strong> al inscribirse 
			en el campus en nuestra web por tarjeta, paypal o transferencia.</p>
			
			<p><strong>Puede realizar el pago de la reserva haciendo clic 
			<a href='".$paginaPago."' target='_blank'>AQUI</a></strong></p>
			
			<h3>Pago resto del Importe</h3>
			<p>El segundo pago de un importe de <strong>".$precioFinal."€</strong>
			se abonará por transferencia bancaria a la cuenta:</p> 
			<p>Caixa Penedés, c/c 2081 0600 16 3300000417, Beneficiario DX Computer, 
			antes del 30 de Mayo de 2012.</p>
			
			<p>En los pagos por transferencia deberá aparecer en el <strong>CONCEPTO:</strong></p>". 
			"<p><strong>". $campus . " - Codigo Inscripción: " . $datos[':localizador'] . " -
			".$datos[':nombreParticipante']."  ".$datos[':apellidosParticipante'] ." 
			</strong></p>  
			<p>Se deberá remitir copia del justificante de pago por e-mail a info@ensenalia.com o por fax al 976 225 015.</p>
			</div>
			
			";
		} else {
			$html .="<div class='alert alert-success'>
			La Inscripción al campus se ha realizado correctamente. El Colegio Marianistas gestionara
			el cobro del Campus mediante domiciliación bancaria.
			</div>";
		}
		$html .="</div>
		</div>";
		$html .= $print;
		$html .= $pie;
		return $html;
	}
}