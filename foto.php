<?php
session_start();
require_once 'inc/Consulta.php';
$consulta = new Consulta();
if ( isset( $_GET['idInscripcion'] ) ) {
	$foto = $consulta->idFoto( $_GET['idInscripcion'] );
	$photoId = $foto[0]['id'];
} else {
	$photoId = $_SESSION['photoId'];
}
 	$foto = $consulta->verFoto( $photoId );
 	$data = stripslashes( $foto[0]['fotoParticipante'] );
 	$tipo = $foto[0]['tipoFotoParticipante'];
 	try {		
			header("Content-type: " . $tipo);
			echo $data;	
 	} catch( Exception $e ) {
 		echo $e->getTraceAsString();
 	}
