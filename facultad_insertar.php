<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
	<input type="text" name="nombre" placeholder="ingrese facultad">
	<input type="submit" name="guardarfa" value="guardar">
</form>

<?php 

	if(isset($_POST["guardarfa"])) {

		$nombrefa = $_POST["nombre"];

		include_once "Clases/Facultad.php";

		$facultadc = new Facultad();
		$facultadc->setNombrefa($nombrefa);

		$insertadofa = $facultadc->insertarFa();

		if ($insertadofa != 0) 
		{
			echo "Facultad Guardada";
		}else{
			echo "ERROR: Facultad NO Guardada";
		}
	}

 ?>
