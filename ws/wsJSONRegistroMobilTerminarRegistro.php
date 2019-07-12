<?PHP
	include dirname(__DIR__).'/db_connnection.php';
	
	$conexion=OpenCon();
	
	@$id_registro = $_POST["id_registro"];
	$terminado = 1;
	
	
	/*Update MYSQL*/
	
	$sql="UPDATE tbcontrolcamion SET Terminado=True WHERE ID = ?;";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('i',$id_registro);	
		
	if($stm->execute()){
		echo "terminado";
	}else{
		echo $stm->error;
	}
	
	CloseCon($conexion);