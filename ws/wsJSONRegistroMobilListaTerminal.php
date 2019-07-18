<?PHP
	include dirname(__DIR__).'/config/db_connnection.php';

	$json=array();
	
	$conexion=OpenCon();
	
	$consulta = "select * from tbterminal";
	$resultado = mysqli_query($conexion,$consulta);
	
	while($registro = mysqli_fetch_array($resultado))
	{
		$json['terminal'][]=$registro;
	}
	
	CloseCon($conexion);
	
	echo json_encode($json);
	
?>