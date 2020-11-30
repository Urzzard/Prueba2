<?php 

	require_once "Conexiondb.php";

	class Pa{

		private $id_pa;
		private $nom_pa;
		private $id_facultad;

		public function setNombrepa($nom_pa):void{
			$this->nom_pa = $nom_pa;
		}

		public function setIdfa($id_facultad):void{
			$this->id_facultad = $id_facultad;
		}

		public function insertarPa(){

			try{

				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$insertarpa = "INSERT into p_academico(nom_pa,id_facultad) values(?,?)";

				$stmtpa = $conexion->prepare($insertarpa);

				$stmtpa->bindParam(1,$this->nom_pa,PDO::PARAM_STR);
				$stmtpa->bindParam(2,$this->id_facultad,PDO::PARAM_INT);

				$stmtpa->execute();

				$insertadopa = $stmtpa->rowCount();

				return $insertadopa;

			}catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function mostrarPas(){
			
			try{
				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$consultapa = "SELECT * FROM p_academico";

				$stmtpa = $conexion->prepare($consultapa);

				$stmtpa->execute();

				$consultadopa=$stmtpa->fetchAll();

				$conexiondb->cerrarConexion();

				return $consultadopa;
				}
				catch(Exception $e){
					echo "Error: ".$e->getMessage();
			}
		}

	}

 ?>