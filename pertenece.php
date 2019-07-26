<html>
<html>
<head>
<title>Problema</title>
</head>
<body>
<?php


function LlenarSocios()
{
	$conexion=mysqli_connect("localhost","root","root","grupales") or
    die("Problemas con la conexión");
	$handle = fopen("socios.txt", "r");

	while ($userinfo = fgets($handle)) 
	{
		list ($Rf, $Des, $KxU) = explode(',', $userinfo);
		if($Rf > '!' )
		{
			$sql="INSERT INTO persona VALUES ('$Rf', '$Des', '$KxU')";

			if ($conexion->query($sql) === TRUE) 
			{
    			echo "New record created successfully";
			} 
			else 
			{
    			echo "Error: " . $sql . "<br>" . $conexion->error;
			}
		
		}
	}
}
//LlenarSocios();
function LlenarGrupos()
{
	$conexion=mysqli_connect("localhost","root","root","grupales") or
    die("Problemas con la conexión");
	$handle = fopen("grupos.txt", "r");

	while ($userinfo = fgets($handle)) 
	{
		list ($Rf, $Des) = explode(',', $userinfo);
		if($Rf > '!' )
		{
			$sql="INSERT INTO GRUPO VALUES ('$Rf', '$Des')";

			if ($conexion->query($sql) === TRUE) 
			{
    			echo "New record created successfully";
			} 
			else 
			{
    			echo "Error: " . $sql . "<br>" . $conexion->error;
			}
		
		}
	}
}
//LlenarGrupos();
	
function DatosPersona()
{
	$conexion=mysqli_connect("localhost","root","root","grupales") or
    	die("Problemas con la conexión");

	$registros=mysqli_query($conexion,"SELECT DniPer,  NomPer, IdeGru FROM persona where DniPer='$_REQUEST[dni]'") or
  		die("Problemas en el select:".mysqli_error($conexion));

  	if ($reg=mysqli_fetch_array($registros))
		{
 			 	echo "DNI--------------- : ".$reg['DniPer']."<br>";

  				echo "NOMBRE----------	: ".$reg['NomPer']."<br>";

  				echo "GRUPO-----------	: ".$reg['IdeGru']."<br>";

		}

	else
		{
  				echo "No pertenece a ningun grupo";
		}

	mysqli_close($conexion);

}

//DatosPersona();

function DatosGrupo()
{
	
	$conexion=mysqli_connect("localhost","root","root","grupales") or
    	die("Problemas con la conexión");

	$registros=mysqli_query($conexion,"SELECT  NomGru from persona per Inner Join grupo grup  ON per.IdeGru = grup.IdeGru where 
		DniPer='$_REQUEST[dni]'") or 

		
  		die("Problemas en el select:".mysqli_error($conexion));

  	if ($reg=mysqli_fetch_array($registros))
		{
 			 	//echo "IDE GRUPO: ".$reg['IdeGru']."<br>";

  				echo "NOMBRE GRUPO: ".$reg['NomGru']."<br>";

		}

	else
		{
  				echo "No pertenece a ningun grupo";
		}

	mysqli_close($conexion);

}

//DatosGrupo();

function IntegrantesGrupo()
{
	
	$conexion=mysqli_connect("localhost","root","root","grupales") or
    	die("Problemas con la conexión");

    $consulta = "SELECT NomPer FROM persona WHERE IdeGru = (SELECT IdeGru FROM persona where DniPer=".'$_REQUEST[dni]'.")";
	


	$registros=mysqli_query($conexion, $consulta);

	mysqli_close($conexion);

}
IntegrantesGrupo();




?>

</body>
</html>