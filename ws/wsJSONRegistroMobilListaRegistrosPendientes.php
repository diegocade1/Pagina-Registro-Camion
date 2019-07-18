<?PHP
	include dirname(__DIR__).'/config/db_connnection.php';

	$json=array();
	
	$conexion=OpenCon();
	
	$consulta = "select * from v_registro_pendiente order by ID asc;";
	$resultado = mysqli_query($conexion,$consulta);
	
	while($registro = mysqli_fetch_array($resultado))
	{
		$json['registro_pendiente'][]=$registro;
	}
	
	CloseCon($conexion);
	
	echo json_encode($json);
	
?>