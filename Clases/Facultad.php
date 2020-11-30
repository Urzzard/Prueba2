<?php 

	require_once "Conexiondb.php";

	class Facultad{

		private $id_facultad;
		private $nom_facultad;

		public function setNombrefa($n_facultad):void{
			$this->nom_facultad = $n_facultad;
		}

		public function insertarFa(){

			try{

				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$insertarfa = "INSERT into facultad(nom_facultad) values(?)";

				$stmtfa = $conexion->prepare($insertarfa);

				$stmtfa->bindParam(1,$this->nom_facultad,PDO::PARAM_STR);

				$stmtfa->execute();

				$insertadofa = $stmtfa->rowCount();

				return $insertadofa;

			}catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function mostrarFa(){
			
			try{
				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$consultafa = "SELECT * FROM facultad";

				$stmtfa = $conexion->prepare($consultafa);

				$stmtfa->execute();

				$consultadofa=$stmtfa->fetchAll();

				$conexiondb->cerrarConexion();

				return $consultadofa;
				}
				catch(Exception $e){
					echo "Error: ".$e->getMessage();
			}
		}

	}

 ?>