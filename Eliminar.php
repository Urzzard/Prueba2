<?php 

	include_once "Clases/Alumno.php";

if(isset($_POST["eliminar"])){

	$id = $_POST["id"];

	$alumnoc = new Alumno();
	$alumnoc->setId($id);
	$eliminado = $alumnoc->eliminar();

		if($eliminado != 0)
		{
			header("location: Index.php");
		}else{
			echo "INFORMACION NO ELIMINADA";
		}
}

 ?>