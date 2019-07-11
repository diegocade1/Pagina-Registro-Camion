<?PHP
	include dirname(__DIR__).'/db_connnection.php';

	$json=array();
	
	$conexion=OpenCon();
	
	$consulta = "select * from tbcliente";
	$resultado = mysqli_query($conexion,$consulta);
	
	while($registro = mysqli_fetch_array($resultado))
	{
		$json['cliente'][]=$registro;
	}
	
	CloseCon($conexion);
	
	echo json_encode($json);
	
?>