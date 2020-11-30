<?php 

	include_once "Clases/Alumno.php";
	include_once "Clases/Pa.php";
	include_once "Clases/TipoUsuario.php";
 ?>

<form method="post" action="<?= $_SERVER['PHP_SELF']?>">
	<input type="text" name="codigo" placeholder="ingrese codigo"><br>
	<input type="text" name="nombres" placeholder="ingrese nombres"><br>
	<input type="text" name="apellidos" placeholder="ingrese apellidos"><br>
	<input type="text" name="email" placeholder="ingrese email"><br>

	<select name="pa">

		<?php 

		$pa = new Pa();
		$pas = $pa->mostrarPas();

		foreach ($pas as $programa) {

		echo "<option value='".$programa["id_pa"]."'>".$programa["nom_pa"]."</option>";
		}

		?>
	</select>
	<select name="t_usuario">

		<?php 

		$tu = new TipoUsuario();
		$tus = $tu->mostrarTusuarios();

		foreach ($tus as $tipo_usuario) {

		echo "<option value='".$tipo_usuario["t_usuario"]."'>".$tipo_usuario["n_usuario"]."</option>";
		}

		?>
	</select><br><br>
	<input type="submit" name="guardar" value="guardar">
</form>

<?php 

if(isset($_POST["guardar"])){

	$codigo = $_POST["codigo"];
	$nombres = $_POST["nombres"];
	$apellidos = $_POST["apellidos"];
	$email = $_POST["email"];
	$pa = $_POST["pa"];
	$t_usuario = $_POST["t_usuario"];

	$alumnoc = new Alumno();
	$insertado = $alumnoc->insertar($codigo,$nombres,$apellidos,$email,$pa,$t_usuario);

		if($insertado != 0)
		{
			header("location: Index.php");
		}else{
			echo "INFORMACION NO GUARDADA";
		}

}
 ?>