<?php
	class BD{
		private static $conn;
		public function __construct(){}
		public function conn(){
			if(is_null(self::$conn)){
				self::$conn = new PDO('mysql:host=db-papum2.mysql.uhserver.com;dbname=db_papum2','papumadmin','Papumadmin00*');
			}
			return self::$conn;
		}
	}
?>