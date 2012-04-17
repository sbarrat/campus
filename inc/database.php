<?php
final class databaseSqlite {

	private static $_handle = null;
	private static $_dsn = "sqlite:database/englishCamp.sqlite";
	private static $_user = null;
    private static $_password = null;
	private static $_options = array(PDO::ATTR_PERSISTENT => true);
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