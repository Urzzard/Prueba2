<?php 

include_once "Clases/Alumno.php";

	$id=$_POST["id"];

	$alumnoc = new Alumno();

	$alumnoc->setId($id);

	$consultado = $alumnoc->mostrarxActualizar();

		foreach ($consultado->fetchAll() as $alumno) 
		{
		
 ?>

<form method="post" action="<?= $_SERVER['PHP_SELF']?>">
	<input type="text" name="codigo" value="<?= $alumno["codigo"]?>"><br>
	<input type="text" name="nombres" value="<?= $alumno["nombres"]?>"><br>
	<input type="text" name="apellidos" value="<?= $alumno["apellidos"]?>"><br>
	<input type="text" name="email" value="<?= $alumno["email"]?>"><br>
	<input type="hidden" name="id" value="<?= $id ?>">
	<select name="pa">
		<option value="1"

		<?php 

			if ($alumno["id_pa"]==1) 
			{
				echo "selected";
			}

		 ?>

		>INGENIERIA DE SISTEMAS E INFORMATICA</option>

		<option value="2"

		<?php 

			if ($alumno["id_pa"]==2) 
			{
				echo "selected";
			}

		 ?>

		>INGENIERIA CIVIL</option>

		<option value="3"

		<?php 

			if ($alumno["id_pa"]==3) 
			{
				echo "selected";
			}

		 ?>

		>ARQUITECTURA</option>

		<option value="4"

		<?php 

			if ($alumno["id_pa"]==4) 
			{
				echo "selected";
			}

		 ?>

		>INGENIERIA AMBIENTAL</option>

		<option value="5"

		<?php 

			if ($alumno["id_pa"]==5) 
			{
				echo "selected";
			}

		 ?>

		>ENFERMERIA</option>

		<option value="6"

		<?php 

			if ($alumno["id_pa"]==6) 
			{
				echo "selected";
			}

		 ?>

		>ODONTOLOGIA</option>
	</select>
	<select name="t_usuario">
		<option value="1"

		<?php 

			if ($alumno["t_usuario"]==1) 
			{
				echo "selected";
			}

		 ?>

		>ADMIN</option>

		<option value="2"

		<?php 

			if ($alumno["t_usuario"]==2) 
			{
				echo "selected";
			}

		 ?>

		>DOCENTE</option>

		<option value="3"

		<?php 

			if ($alumno["t_usuario"]==3) 
			{
				echo "selected";
			}

		 ?>

		>ALUMNO</option>
	</select><br><br>
	<input type="submit" name="actualizar" value="actualizar">
</form>

<?php 
		}

	if(isset($_POST["actualizar"])){

		$codigo = $_POST["codigo"];
		$nombres = $_POST["nombres"];
		$apellidos = $_POST["apellidos"];
		$email = $_POST["email"];
		$pa = $_POST["pa"];
		$t_usuario = $_POST["t_usuario"];
		$id = $_POST["id"];


		$actualizado = $alumnoc->actualizar($id, $codigo, $nombres, $apellidos, $email, $pa, $t_usuario);

		if($actualizado != 0)
		{
			header("location: Index.php");
		}else{
			echo "INFORMACION NO GUARDADA";
		}

	}else{
		echo "LA INFORMACION NO SE GUARDO";
	}

?>
