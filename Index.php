<?php 

	include_once "Clases/Alumno.php";

	$alumnoc = new Alumno();

	$resultado = $alumnoc->mostrar();

	echo "numero de resultados: ".$resultado->rowCount();

	echo "<table border=1px>
			<tr>
				<th>#</th>
				<th>CODIGO</th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>FACULTAD</th>
				<th>PROGRAMA ACADEMICO</th>
				<th>&nbsp</th>
				<th>&nbsp</th>
			</tr>";
			
	foreach ($resultado->fetchAll() as $k => $alumno) 
	{
		echo "<tr>
				<td>".$k."</td>
				<td>".$alumno["codigo"]."</td>
				<td>".$alumno["nombres"]."</td>
				<td>".$alumno["apellidos"]."</td>
				<td>".$alumno["nom_facultad"]."</td>
				<td>".$alumno["nom_pa"]."</td>
				<td><form method='post' action='Eliminar.php'>
						<input type='hidden' name='id' value='".$alumno["id"]."'>
						<input type='submit' name='eliminar' value='eliminar'>
					</form>
				</td>
				<td><form method='post' action='Actualizar.php'>
						<input type='hidden' name='id' value='".$alumno["id"]."'>
						<input type='submit' name='submit2' value='actualizar'>
					</form>
				</td>
			</tr>";
	}

	echo "</table>";

	echo "CONEXION ESTABLECIDA!!";

 ?>