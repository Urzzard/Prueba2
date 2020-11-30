<?php 

	class Conexiondb{

		private $dsn="mysql:host=localhost;dbname=practicadb";
		private $user="root";
		private $password="";
		private $opciones=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'UTF8'");
		private $conexion;

		public function abrirConexion(){

			$this->conexion = new PDO($this->dsn,$this->user,$this->password,$this->opciones);

			return $this->conexion;

		}

		public function cerrarConexion(){

			$this->conexion = null;

		}
	}

 ?>