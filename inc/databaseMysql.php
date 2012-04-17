<?php
final class databaseMysql {

	private static $_handle = null;
	private static $_dsn = "mysql:dbname=ensenali_db;host=localhost;port=3306";
	private static $_user = 'ensenali_web';
	private static $_password = 'y0TxPZR6O9Z6';
	private static $_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	/**
	 * Deny Construct
	 */
	private function __construct()
	{
	}
	/**
	 * Deny Clone
	 */
	private function __clone()
	{
	}
	/**
	 * Funcion de conexion a la base de datos
	 */
	static function connect()
	{

		if ( is_null( self::$_handle ) ) {
			try {
				self::$_handle = new PDO(
						self::$_dsn, self::$_user, self::$_password, self::$_options
				);
			} catch ( PDOException $error ){
				die ( $error->getMessage() );
			}
		}
		return self::$_handle;
	}
}