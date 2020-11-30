<?php 

	include_once "Conexiondb.php";

	class Alumno{

		private $id;
		private $codigo;
		private $nombres;
		private $apellidos;
		private $email;
		private $id_pa;
		private $t_usuario;

		public function getId(){

			return $this->id;
		}

		public function setId($id):void{

			$this->id = $id;
		}

		public function insertar(String $codigo,String $nombres,String $apellidos,String $email,Int $pa,Int $t_usuario):bool{

			try{
				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$insertar = "INSERT into alumnos(codigo,nombres,apellidos,email,id_pa,t_usuario) values(?,?,?,?,?,?)";

				$stmtin = $conexion->prepare($insertar);

				$stmtin->bindParam(1, $codigo, PDO::PARAM_STR);
				$stmtin->bindParam(2, $nombres, PDO::PARAM_STR);
				$stmtin->bindParam(3, $apellidos, PDO::PARAM_STR);
				$stmtin->bindParam(4, $email, PDO::PARAM_STR);
				$stmtin->bindParam(5, $pa, PDO::PARAM_INT);
				$stmtin->bindParam(6, $t_usuario, PDO::PARAM_INT);

				$stmtin->execute();

				$insertado = $stmtin->rowCount();

				if($insertado != 0)
				{
					echo "INFORMACION GUARDADA";
				}else{
					echo "INFORMACION NO GUARDADA";
				}

				return $insertado;
				}
				catch(Exception $e){
					echo "Error: ".$e->getMessage();
			}

		}

		public function mostrar(){
			
			try{
				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$mostrar = "SELECT a.id, a.codigo, a.nombres, a.apellidos, f.nom_facultad, pa.nom_pa from alumnos as a join p_academico as pa on a.id_pa=pa.id_pa join facultad as f on pa.id_facultad=f.id_facultad order by a.id asc";

				$stmtmo = $conexion->prepare($mostrar);
				$stmtmo->execute();

				$conexiondb->cerrarConexion();

				return $stmtmo;
				}
				catch(Exception $e){
					echo "Error: ".$e->getMessage();
			}
		}

		public function mostrarxActualizar(){
			
			try{
				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$Aconsulta = "SELECT * FROM alumnos WHERE id=$this->id";

				$stmtma = $conexion->prepare($Aconsulta);

				$stmtma->execute(); 
				$conexiondb->cerrarConexion();

				return $stmtma;
				}
				catch(Exception $e){
					echo "Error: ".$e->getMessage();
			}
		}

		public function actualizar(Int $id, String $codigo, String $nombres, String $apellidos, String $email, Int $pa, Int $t_usuario):bool{
			
			try{
				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$actualizar = "UPDATE alumnos set codigo=?, nombres=?, apellidos=?, email=?, id_pa=?, t_usuario=? where id=?";

				$stmta = $conexion->prepare($actualizar);

				$stmta->bindParam(1, $codigo, PDO::PARAM_STR);
				$stmta->bindParam(2, $nombres, PDO::PARAM_STR);
				$stmta->bindParam(3, $apellidos, PDO::PARAM_STR);
				$stmta->bindParam(4, $email, PDO::PARAM_STR);
				$stmta->bindParam(5, $pa, PDO::PARAM_INT);
				$stmta->bindParam(6, $t_usuario, PDO::PARAM_INT);
				$stmta->bindParam(7, $id, PDO::PARAM_INT);

				$stmta->execute();

				$actualizado = $stmta->rowCount();

				$conexiondb->cerrarConexion();

				if($actualizado != 0)
				{
					header("location: Index.php");
				}else{
					echo "INFORMACION NO ACTUALIZADA";
				}

				return $actualizado;
				}
				catch(Exception $e){
					echo "Error: ".$e->getMessage();
			}

		}

		public function eliminar():bool{
			
			try{
				$conexiondb = new Conexiondb();

				$conexion = $conexiondb->abrirConexion();

				$eliminar = "DELETE from alumnos where id=$this->id";

				$stmte = $conexion->prepare($eliminar);
				$stmte->execute();

				$eliminado = $stmte->rowCount();
				$conexiondb->cerrarConexion();

				if($eliminado != 0)
				{
					$eliminado = true;
				}else{
					$eliminado = false;
				}

				return $eliminado;
				}
				catch(Exception $e){
					echo "Error: ".$e->getMessage();
			}

		}

	}

 ?>