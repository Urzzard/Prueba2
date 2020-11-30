<?php 

	require_once "Conexiondb.php";

	class TipoUsuario{

		private $t_usuario;
		private $n_usuario;

		public function mostrarTusuarios(){
			
			try{
				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$consultaus = "SELECT * FROM t_usuarios";

				$stmttus = $conexion->prepare($consultaus);

				$stmttus->execute();

				$consultaus=$stmttus->fetchAll();

				$conexiondb->cerrarConexion();

				return $consultaus;
				}
				catch(Exception $e){
					echo "Error: ".$e->getMessage();
			}
		}

	}

 ?>