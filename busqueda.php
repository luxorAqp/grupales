<html>
<head>
<title>Problema</title>
</head>
<body>

 <form method="post" action="pertenece.php" onsubmit="return validar_dni();"> 
Ingrese el DNI de la persona:
<input type="text" name="dni" required>
<br>

<?php
function validar_dni($dni){
	$letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
		echo 'valido';
	}else{
		echo 'no valido';
	}


	
}
// LECTURA DE ARCHIVO 
	$lectura=fopen("socios.txt", "r") or die ("Error al leer archivo");
	while(!feof($lectura))
	{
		$linea = fgets ($lectura);

		$saltolinea = nl2br ($linea);

		//echo $saltolinea;

	}
	fclose($lectura);
validar_dni('735473389F');
?>

<input type="submit" value="confirmar">

</form>

</body>
</html>

