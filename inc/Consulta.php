<?php
require_once 'database.php';
require_once 'databaseMysql.php';

class Consulta {
	private $_handle;
	private $_query;
	private $_result;
	private $_localizador = false;
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
	 * @param unknown_type $sql
	 */
	function consulta( $sql ) {
		$this->_query = $this->_handle->query( $sql );
	}
	/**
	 * Devuelve los resultados
	 */
	function resultados() {
		return $this->_query->fetchAll( PDO::FETCH_ASSOC );
	}
	/**
	 * Genera el identificador unico de inscripcion lo agrega a la base
	 * de datos y lo devuelve para mostrarlo como registro unico de inscripcion
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
	
	function verDato() {
		$sql = "SELECT * from inscripcionesEnglish where id like LAST_INSERT_ID()";
		$this->consulta($sql);
		return $this->resultados();
	}
	function idFoto( $idInscripcion ) {
		$sql = "SELECT id from inscripcionesEnglish where idInscripcion like :idInscripcion";
		//$sql = "SELECT id, idInscripcion from inscripcionesEnglish";
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute( array(':idInscripcion' => $idInscripcion ) );
		return $this->_query->fetchAll( PDO::FETCH_ASSOC );
	}
	function verFoto( $id ) {
		$sql = "SELECT fotoParticipante,tipoFotoParticipante from inscripcionesEnglish where id like :id";
		$this->_query = $this->_handle->prepare( $sql );
		$this->_query->execute(array(':id' => $id ) );
		return $this->resultados();
	}
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
	function agregarDatos( $vars ) {
		$fecha = explode("/",$vars[':fechaParticipante']);
		$vars[':fechaParticipante'] = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		//var_dump( $vars );
		$sql = 'INSERT INTO inscripcionesEnglish (
		nombreParticipante, apellidosParticipante, sexoParticipante, fechaParticipante,
		direccionParticipante, cpParticipante, ciudadParticipante, tel1Participante,
		tel2Participante, emailParticipante, colegioParticipante, cursoParticipante,
		hermanosParticipante, inglesParticipante, fotoParticipante, tipoFotoParticipante, comentariosParticipante,
		nombreContacto, apellidosContacto, movilContacto, alergiasMedicos, condicionesMedicos,
		tratamientoMedicos, DietaMedicos, nombrePadre, apellidosPadre, movilPadre, emailPadre,
		nombreMadre, apellidosMadre, movilMadre, emailMadre, semana1Campus, semana2Campus, 
		semana3Campus, semana4Campus, servicioAutobus, rutaIda, paradaIda, rutaVuelta, paradaVuelta,
		condicionesAceptadas, webReferencia, conocido, localizador ) VALUES (
		:nombreParticipante, :apellidosParticipante, :sexoParticipante, :fechaParticipante,
		:direccionParticipante, :cpParticipante, :ciudadParticipante, :tel1Participante,
		:tel2Participante, :emailParticipante, :colegioParticipante, :cursoParticipante,
		:hermanosParticipante, :inglesParticipante, :fotoParticipante, :tipoFotoParticipante, :comentariosParticipante,
		:nombreContacto, :apellidosContacto, :movilContacto, :alergiasMedicos, :condicionesMedicos,
		:tratamientoMedicos, :DietaMedicos, :nombrePadre, :apellidosPadre, :movilPadre, :emailPadre,
		:nombreMadre, :apellidosMadre, :movilMadre, :emailMadre, :semana1Campus, :semana2Campus, 
		:semana3Campus, :semana4Campus, :servicioAutobus, :rutaIda, :paradaIda, :rutaVuelta, :paradaVuelta,
		:condicionesAceptadas, :webReferencia, :conocido, :localizador
		)';
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
}