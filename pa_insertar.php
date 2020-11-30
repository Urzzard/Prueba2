<?php 

	include_once "Clases/Pa.php";
	include_once "Clases/Facultad.php";

 ?>


<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
	<input type="text" name="nombre" placeholder="ingrese facultad">
	<select name="idf">

		<?php 

				$facultadc = new Facultad();
				$facultades = $facultadc->mostrarFa();

				foreach ($facultades as $f) {
					echo "<option value='".$f["id_facultad"]."'>".$f["nom_facultad"]."</option>";
				}
		?>
	</select>
	<input type="submit" name="guardarfa" value="guardar">
</form>

<?php 

	if(isset($_POST["guardarfa"])) {

		$nombrepa = $_POST["nombre"];
		$idfa = $_POST["idf"];

		$pac = new Pa();
		$pac->setNombrepa($nombrepa);
		$pac->setIdfa($idfa);

		$insertadopa = $pac->insertarPa();

		if ($insertadopa != 0) 
		{
			echo "Programa academico Guardado";
		}else{
			echo "ERROR: Programa academico NO Guardado";
		}
	}

 ?>
