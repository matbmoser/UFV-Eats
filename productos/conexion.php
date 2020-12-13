<?php


	class  ConectDB{
		private static $servername = "localhost";
		private static $username = "root";
		private static $password = "";
		private static $dbname = "ufveats";
		private static $conexion=NULL;
		private function __construct (){}

		public static function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion= new PDO('mysql:host='.self::$servername.';dbname='.self::$dbname,self::$username,self::$password,$pdo_options);
			return self::$conexion;
		}		
	} 
?>