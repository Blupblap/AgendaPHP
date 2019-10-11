<style>

table, td, tr{

	border: 1px solid black;
	text-align: center;
}

tr{
	color: blue;
	
}

th{
	border: 1px solid black;
	padding: 5px;
	color: black;
}

input{
	margin: 10px;
	
}


</style>


<html>

<?php 
 //Comprobamos si es la primera vez que se introduce
 //un contacto. Si es así se crea el array. Si no; se accede a este.
 if(isset($_GET["agenda"])){
	$agenda = $_GET["agenda"];
 }else{
	$agenda = array();
 }
 
 //Se recogen el nombre y el telefono. Si alguno de los dos está vacío; se toman
 //las acciones pertinentes.
 if(isset($_GET["submit"])){
	$nom = $_GET["nom"];
    $tel = $_GET["tel"];
	//Se debe introducir un nombre
	if( empty($nom)){
		echo "No se ha introducido ningún nombre";
	//Si no se introduce ningún telefono, se borra el contacto.
	}elseif( empty($tel)){
		unset($agenda[$nom]);
    } else {
		$agenda[$nom] = $tel;
	}
 }

?>

<form>
	<?php 
	//Creamos los input invisibles para así poder almacenar los contactos anteriores.
	foreach($agenda as $nom => $tel){
		echo '<input type="hidden" name="agenda[' . $nom . ']" value ="' . $tel . '"/>';
	}
	   ?>
	<h2>Introduce un contacto</h2>
	<br>
	<b>Nom:</b> <input type="text" name="nom"/>
	<br>
	<br>
	<b>Tel:</b> <input type="text" name="tel"/>
	<br>
	<input type="submit" name="submit">
	
</form>
	
	<h2>Agenda</h2>
	<?php 
	//Recorremos el fichero
	if( count($agenda) == 0){
			echo "No hay ningún contacto creado";
	}else{
		echo "<table>";
		foreach($agenda as $nom => $tel){ 
			echo "<p><table><tr><th>Nombre: $nom </th></tr>";
			echo "<tr><td> Telefono: $tel </td></tr></table><p>";
		}	
		echo "</table>";
	}
 
	  ?>	
</html>