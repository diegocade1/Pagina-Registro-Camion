<?PHP
	include dirname(__DIR__).'/config/db_connnection.php';

	$json=array();
	
	$conexion=OpenCon();
	
	$_id = json_decode(file_get_contents('php://input'), true);
	//$json['anden'][] = $_id['terminal'][0]['id'];
	//echo json_encode($json);

	
	$consulta = "select * from tbterminal_anden where terminal_id = ". $_id['terminal'][0]['id'] .";";
	$resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));;
	
	while($registro = mysqli_fetch_array($resultado))
	{
		$json['anden'][]=$registro;
	}
	
	CloseCon($conexion);
	
	echo json_encode($json);
	
?>