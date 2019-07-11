<?PHP
	include dirname(__DIR__).'/db_connnection.php';
	
	$conexion=OpenCon();
	
	@$id_usuario = $_POST["id_usuario"];
	
	$consulta = "select * from tbusuario where Lower(id) ='". $id_usuario ."';";
	$resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
	$registro = mysqli_fetch_array($resultado);
	
	if($registro != null)
	{
		echo "Correcto;".$registro[0].",".$registro[1].",".$registro[2];
	}
	else
	{
		echo "No existe";
	}
	
	CloseCon($conexion);
	
?>