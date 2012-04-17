<?php
// error_reporting( E_ALL );
// try {
// 	$pdo = new PDO(
// 		'sqlite:database/englishCamp.sqlite',
// 		null,
// 		null,
// 		array(PDO::ATTR_PERSISTENT => true)
// 	);
// 	$query = $pdo->query('SELECT * FROM paradasBus');
// 	var_dump( $query->fetchAll());
// } catch ( Exception $e ) {
// 	var_dump( $e->getTraceAsString() );
// }

//echo $_SERVER['SERVER_ADDR'];
ini_set('display_errors', 1);
ini_set('html_errors', 1);
error_reporting(E_ALL);
//  require_once 'inc/Consulta.php';
//  $consulta = new Consulta('Mysql');
// $sql = "Select * from paradasbus";
// $consulta->consulta($sql);
// var_dump( $consulta->resultados() );
 // echo "<pre>";
// echo "Los datos agregados son";
// var_dump( $consulta->verDatos() );
// echo "</pre>";
phpinfo();
// if ( mail('ruben@ensenalia.com','Prueba','Este es un mensaje de prueba ') ) {
// 	echo "Mensaje Enviado";
// } else {
// 	echo "No se ha enviado el mensaje";
// }