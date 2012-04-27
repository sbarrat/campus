<?php
require_once 'database.php';
require_once 'databaseMysql.php';

class Consulta {
	private $_handle;
	private $_query;
	private $_result;
	private $_descuento = 0;
	private $_localizador = false;
	private $_cuponAmigo = false;
	public $precios = array(
			'football' => array( 
					'base' => 369, 
					'guarderia' => 120,
					'prematricula' => 99 
					), 
			'english' => array(
					'1semana'=>'',
					'2semana'=>'',
					'3semana'=>'',
					'4semana'=>'',
					'prematricula' => 99
					)
			);
	private $_urlsPromo = array(
			'english' => array( 
					'http://www.marianistas.net',
					'http://query.ensenalia.com'
					),
			'football' => array('http://query.ensenalia.com'),
			'padel' => array('http://query.ensenalia.com')
			);
	function __construct( $type = 'Mysql' ) {
		if ( $type == 'Sqlite' ) {
			$this->_handle = databaseSqlite::connect();
		}
		if ( $type == 'Mysql' ) {
			$this->_handle = databaseMysql::connect();
		}
	}
	/**
	 * Ejecuta la consulta pasando como parametro el sql
	 * 
	 * @param string $sql
	 */
	function consulta( $sql ) {
		$this->_query = $this->_handle->query( $sql );
	}
	/**
	 * Devuelve los resultados
	 * 
	 * @return array
	 */
	function resultados() {
		return $this->_query->fetchAll( PDO::FETCH_ASSOC );
	}
	/**
	 * Chequea si la url esta en la lista de promos
	 * 
	 * @param string $url
	 */
	function urlPromo( $campus, $url ) {
		if ( in_array( $url, $this->_urlsPromo[$campus] ) ) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Genera el identificador unico de inscripcion lo agrega a la base
	 * de datos y lo devuelve para mostrarlo como registro unico de inscripcion
	 * 
	 * @return string $idInscripcion
	 */
	function generaIdInscripcion() {
		$sql = "
		SELECT MD5( CONCAT( id,  '#', UNIX_TIMESTAMP( fechaCreacion ) ) ) as idInscripcion
		FROM  `inscripcionesEnglish` 
		WHERE id LIKE LAST_INSERT_ID()";
		$this->consulta( $sql );
		$resultado = $this->resultados();
		$idInscripcion = $resultado[0]['idInscripcion'];
		$sql = "UPDATE inscripcionesEnglish SET idInscripcion = :idInscripcion 
		WHERE id LIKE LAST_INSERT_ID()";
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute(array(':idInscripcion'=> $idInscripcion ));
		return $idInscripcion;
	}
	/**
	 * Devuelve el timestamp de la creacion del registro para insertarlo
	 * en la remota
	 */
	function fechaCreacion() {
		$sql = "SELECT fechaCreacion 
		FROM `inscripcionesEnglish`
		WHERE id LIKE LAST_INSERT_ID()";
		$this->consulta( $sql );
		$resultado = $this->resultados();
		return $resultado[0]['fechaCreacion'];
	}
	/**
	 * Genera el codigo de inscripción y el cupon de descuento
	 * 
	 * @return string $aleat
	 */
	function generaLocalizador() {
		$cars = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
				'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
				'I', 'J', 'K', 'L', 'M','N','O','P','Q',
				'R','S','T','U','V','W','X','Y','Z');
		$longitud = 6;
		$aleat = '';
		for($i = 0; $i < $longitud; $i++) {
			$aleat .= $cars[rand(0, count($cars)-1)];
		}
		return $aleat;
		
	}
	/**
	 * Devuelve el nuevo cupon de la promocion amigos
	 * 
	 * @return boolean|array
	 */
	function cuponAmigos( $campus, $amigos, $creador ) {
		$check = false;
		while( !$check ) {
			$this->_cuponAmigo = $this->generaLocalizador();
			$sql = "SELECT * from cuponescampus where cupon like :cuponAmigo
			AND campus like :campus";
			$this->_query = $this->_handle->prepare( $sql );
			$this->_query->execute(array(':cuponAmigo' => $this->_cuponAmigo , ':campus' => $campus ) );
			if ( $this->_query->rowCount() == 0 ) {
				$check = true;
			}
		}
		/**
		 * Almacenamos y saneamos las direcciones en una string
		 */
		$emailsAmigos = "";
		$totalEmails = 0;
		foreach( $amigos as $amigo ) {
			if ( $amigo !='') {
				$emailsAmigos.= filter_var( $amigo, FILTER_SANITIZE_EMAIL ).";";
				$totalEmails++;
			}
		}
		/**
		 * Cuando generamos el cupon amigos lo insertamos en la tabla de cupones 
		 * con el numero de invitaciones que ha hecho
		 */
		$sql = 'Insert into cuponescampus 
		(cupon, valor, campus, total, creador, destinatarios)
		VALUES ( :cupon, :valor, :campus, :total, :creador, :destinatarios )';
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute( array( 
				':cupon' => $this->_cuponAmigo,
				':valor' => 0,
				':campus' => $campus,
				':total' => $totalEmails,
				':creador' => $creador,
				':destinatarios' => $emailsAmigos
				));
		return array('cupon' => $this->_cuponAmigo,'amigos' => $emailsAmigos );
	}
	/**
	 * Comprobamos si el cupon que ha introducido es valido y la cantidad de veces
	 * de uso no se ha superado
	 * 
	 * @param string $cupon
	 * @param string $campus
	 * @return boolean
	 */
	function cuponValido( $cupon, $campus ) {
		$sql = 'SELECT * FROM cuponescampus 
		WHERE cupon LIKE :cupon 
		AND campus LIKE :campus';
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute( array(':cupon' => $cupon, ':campus' => $campus ) );
		if ( $this->_query->rowCount() == 0 ) {
			return false;
		} else {
			$resultado = $this->_query->fetchAll( PDO::FETCH_ASSOC );
			$usos = $resultado[0]['total'] - 1;
			/**
			 * Si el valor no es 0 codigo descuento, devolvemos el valor del 
			 * descuento para aplicarlo
			 */
			if ( $resultado[0]['valor'] != 0 ) {
				$this->_descuento = $resultado[0]['valor'];
			}
			/**
			 * Actualizamos los usos que le quedan al codigo
			 */
			$sql = 'UPDATE cuponescampus SET total = :total 
			WHERE cupon LIKE :cupon
			AND campus LIKE :campus';
			$this->_query = $this->_handle->prepare( $sql );
			$this->_query->execute( 
					array(':total'=>$usos, ':cupon' => $cupon, ':campus' => $campus ) );
			return true;
		}
	}
	/**
	 * Devuelve el valor del cupon
	 * @param unknown_type $cupon
	 * @param unknown_type $campus
	 */
	function valorCupon( $cupon, $campus ) {
		$sql = "SELECT * FROM cuponescampus 
		WHERE cupon LIKE :cupon
		AND campus LIKE :campus";
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute( array(':cupon' => $cupon, ':campus' => $campus ) );
		$resultado = $this->_query->fetchAll( PDO::FETCH_ASSOC );
		return $resultado[0]['valor'];
	}
	/**
	 * Devuelve el nuevo localizador de reserva
	 * 
	 * @return boolean|string
	 */
	function localizadorReserva() {
		$check = false;
		while( !$check ) {
			$this->_localizador = $this->generaLocalizador();
			$sql = "SELECT * from inscripcionesEnglish where localizador like :localizador";
			$this->_query = $this->_handle->prepare( $sql );
			$this->_query->execute(array(':localizador' => $this->_localizador ) );
			if ( $this->_query->rowCount() == 0 ) {
				$check = true;
			}
		}
		return $this->_localizador; 
	}
	/**
	 * Devuelve el ultimo registro insertado en la tabla de inscripciones
	 * 
	 * @return array
	 */
	function verDato() {
		$sql = "SELECT * from inscripcionesEnglish where id like LAST_INSERT_ID()";
		$this->consulta($sql);
		return $this->resultados();
	}
	/**
	 * Devuelve el id de la inscripcion pasando como parametro el idInscripcion
	 * 
	 * @param string $idInscripcion
	 * @return array
	 */
	function idFoto( $idInscripcion ) {
		$sql = "SELECT id from inscripcionesEnglish where idInscripcion like :idInscripcion";
		//$sql = "SELECT id, idInscripcion from inscripcionesEnglish";
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute( array(':idInscripcion' => $idInscripcion ) );
		return $this->_query->fetchAll( PDO::FETCH_ASSOC );
	}
	/**
	 * Devuelve la foto para su visualizacion
	 * 
	 * @param string $id
	 * @return array
	 */
	function verFoto( $id ) {
		$sql = "SELECT fotoParticipante,tipoFotoParticipante from inscripcionesEnglish where id like :id";
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute(array(':id' => $id ) );
		return $this->resultados();
	}
	/**
	 * Devuelve todos los datos de las inscripciones
	 * 
	 * @return array
	 */
	function verDatos() {	
		try {
			$sql = "Select * from inscripcionesEnglish";
			$this->_query = $this->_handle->prepare( $sql );
			$this->_query->execute();
			return $this->resultados();
		} catch( PDOException $e ) {
			echo "Error en la consulta<br/>";
			echo $e->getCode()."<br/>";
			echo $e->getFile()."<br/>";
			echo $e->getTraceAsString()."<br/>";
		}
	}
	/**
	 * Devuelve los campos con los valores por defecto de la tabla inscripciones
	 * 
	 * @return array $datos
	 */
	function camposTabla() {
		$sql = 'DESCRIBE inscripcionesEnglish';
		$this->consulta( $sql );
		$datos = array();
		foreach( $this->resultados() as $campos ) {
			if ( $campos['Field'] != 'id' ) {
				$datos[$campos['Field']] = $campos['Default'];
			}
		}
		return $datos;
	}
	function comentariosTabla() {
		$sql = 'SHOW FULL COLUMNS FROM inscripcionesEnglish';
	}
	/**
	 * Devuelve el nombre de la parada
	 * @param unknown_type $ruta
	 * @param unknown_type $sentido
	 * @param unknown_type $numero
	 * @param unknown_type $campus
	 */
	function datosParada($ruta, $sentido, $numero, $campus ) {
		$sql = 'SELECT nombreParada FROM paradasbus 
		WHERE ruta LIKE :ruta AND sentido LIKE :sentido
		AND numeroParada LIKE :numero AND campus like :campus';
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute( array(
				':ruta' => $ruta, 
				':sentido' => $sentido, 
				':numero' => $numero, 
				':campus' => $campus ) );
		$resultados = $this->_query->fetchAll( PDO::FETCH_ASSOC );
		return $resultados[0]['nombreParada'];
	}
	/**
	 * Inserta los datos en la base de datos
	 * 
	 * @param array $vars
	 * @todo revisar los campos a insertar
	 */
	function agregarDatos( $vars ) {
		$fecha = explode("/",$vars[':fechaParticipante']);
		$vars[':fechaParticipante'] = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		if ( $vars[':fechanacimientoHermano'] != '' ) {
			$fecha = explode("/",$vars[':fechanacimientoHermano']);
			$vars[':fechanacimientoHermano'] = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		}
		$sqlFields = '';
		$sqlValues = '';
		$campos = $this->camposTabla();
		foreach( $campos as $key => $value ) {
			$sqlFields .= $key.", ";
			$sqlValues .= ':'.$key.", ";
		}
		$sqlFields = substr( $sqlFields, 0, strlen( $sqlFields )-2 );
		$sqlValues = substr( $sqlValues, 0, strlen( $sqlValues )-2 );
		$sql = 'INSERT INTO inscripcionesEnglish 
		( '.$sqlFields .' ) VALUES ( '.$sqlValues.' )';
		try{
			$this->_query = $this->_handle->prepare( $sql );
			$this->_query->execute( $vars );
		} catch( PDOException $e ) {
			echo "Error en la consulta<br/>";
			echo $e->getCode()."<br/>";
			echo $e->getFile()."<br/>";
			echo $e->getTraceAsString()."<br/>";
		}
	}
	/**
	 * Funcion de depuracion cupones
	 */
	function debugCupones( $campus ) {
		$sql = "SELECT * FROM cuponescampus where campus like :campus";
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute( array(':campus' => $campus ) );
		return $this->_query->fetchAll( PDO::FETCH_ASSOC );
	}
	/**
	 * Funcion de depuracion inscripciones
	 */
	function debugInscripciones( $campus ) {
		$sql = "SELECT * FROM inscripcionesEnglish where campus like :campus
		AND id like LAST_INSERT_ID()";
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute( array(':campus' => $campus ) );
		return $this->_query->fetchAll( PDO::FETCH_ASSOC );
	}
}