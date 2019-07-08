<?PHP
//hostname_localhost="localhost";
$hostname_localhost="localhost:3308";
$database_localhost="controlcamion";
$username_localhost="root";
//$password_localhost="";
$password_localhost="57706897";

	$json=array();
	
	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	
	$consulta = "select * from tbcliente";
	$resultado = mysqli_query($conexion,$consulta);
	
	while($registro = mysqli_fetch_array($resultado))
	{
		$json['cliente'][]=$registro;
	}
	
	mysqli_close($conexion);
	
	echo json_encode($json);
	
?>