<?PHP
//hostname_localhost="localhost";
$hostname_localhost="localhost:3308";
$database_localhost="controlcamion";
$username_localhost="root";
//$password_localhost="";
$password_localhost="57706897";

	$json=array();
	
	$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	try 
	{
		$_POST = $_POST["id"] or die("ID vacio");
		$_POST = json_decode(file_get_contents('php://input'), true);
	}
	catch (Exception $e) 
		{
			echo $e->getMessage();
		}
	catch (InvalidArgumentException $e) 
		{
			echo $e->getMessage();
		}
	
	$consulta = "select * from tbterminal_anden where terminal_id = $id";
	$resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));;
	
	while($registro = mysqli_fetch_array($resultado))
	{
		$json['terminal'][]=$registro;
	}
	
	mysqli_close($conexion);
	
	echo json_encode($json);
	
?>