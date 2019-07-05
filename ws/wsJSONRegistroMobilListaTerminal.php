<?PHP
//hostname_localhost="localhost";
$hostname_localhost="localhost:3308";
$database_localhost="controlcamion";
$username_localhost="root";
//$password_localhost="";
$password_localhost="57706897";

	$json=array();
	
	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	
	$consulta = "select * from tbterminal";
	$resultado = mysqli_query($conexion,$consulta);
	
	if (!$resultado) 
	{
		echo('Invalid query: ' . mysql_error());
	}
	else
	{
	
		while($registro = mysqli_fetch_array($resultado))
		{
			$json['terminal'][]=$registro;
		}
		echo json_encode($json);
	}
	
	mysqli_close($conexion);

?>