<?php
	include_once "config.php";

	class mysql
	{

		private $url;
		private $user;
		private $pws;
		private $dbname;
		private $port = 3360;

		private $con;
		private $result;
		
		function __construct()
		{
			$url = db_Config :: db_url;
			$user = db_Config :: db_user;
			$pws = db_Config :: db_pws;
			$dbname = db_Config :: db_dbname;
			$port = db_Config :: db_port;
		}

		public function exec($sql) {
			if($con) {
				$result = mysqli_execute($con,$sql);
				return $result;
			}
			return false;
		}

		public function con() {
			mysqli_connect();
		}

		public function new_con() {
			mysqli_connect()
		}

		public function close() {
			if($result)
				mysqli_free_result($result);
			if($con)
				mysqli_close($con);
		}

	}
?>