<?php
	/*
		TablaProducto.php
		�ltima modificaci�n: 12/04/2013		
		
		Genera la tabla de empleados dinamicamente.
		
		Recibe:
			$_GET["search"] : filtro de la b�squeda de empleados en CURP o Nombre
			
		- Documentaci�n del c�digo: OK		
	*/
	header('Cache-Control: no-cache, no-store, must-revalidate');
?>
<table id='table-content'>
	<tr class='tr-header'>
		<td>idProducto</td>
		<td>Nombre</td>
		<td>Precio</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>
<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	$db = new DataConnection();	
	$qry = "SELECT * FROM Producto";
	
	// A�ade parametros de b�squeda
	if ( isset($_GET["search"] ) ){ 
		$filtro = Validations::cleanString($_GET["search"]); // Limpia la entrada
		$qry .= " WHERE idProducto LIKE '%".$filtro."%' OR Nombre LIKE '%".$filtro."%' OR Precio LIKE '%".$filtro."%'";
	}
	
	$result = $db->executeQuery($qry);	
	
	if ( mysql_num_rows($result) < 1){
		echo ("<tr class='tr-cont'>
			<td colspan='3'>No se encontraron resultados</td>
			<td class='opc'></td>
			<td class='opc'></td>
		</tr>");
	}else{	
		/* Agrega los resultados */
		while($fila = mysql_fetch_array($result))
		{		
			$id = $fila['idProducto'];	
			$nombre = $fila['Nombre'];
			$precio = $fila['Precio'];

			echo ("<tr class='tr-cont' id='".$id."' name='".$id."'>
				<td>".$id."</td>
				<td>".$nombre."</td>
				<td>".$precio."</td>
				<td class='opc'><img src='../img/pencil.png' onclick='modificarProducto(\"".$id."\")' alt='Modificar' class='clickable'/></td>
				<td class='opc'><img src='../img/less.png'   onclick='eliminarProducto(\"".$id."\")' alt='Eliminar' class='clickable'/></td>
			</tr>");
		}
	}	
?>
</table>