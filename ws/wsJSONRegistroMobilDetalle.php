<?PHP
	include dirname(__DIR__).'/db_connnection.php';
	
	$conexion=OpenCon();
	
	@$guia_aerea = $_POST["guia_aerea"];
	@$id_registro = $_POST["id_registro"];
	@$hora_inicio_descarga = $_POST["hora_inicio_descarga"];
	@$hora_termino_descarga = $_POST["hora_termino_descarga"];
	@$id_usuario = $_POST["id_usuario"];

	$sql="INSERT INTO tbdetallecontrolcamion (`Controlcamion_id`, `Guia_aerea`, `Hora_inicio_descarga`, `Hora_termino_descarga`, `Usuario_id_responsable`) VALUES (?,?,?,?,?)";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('isssi',$id_registro,$guia_aerea,$hora_inicio_descarga,$hora_termino_descarga,$id_usuario);	
		
	if($stm->execute()){
		echo "registra";
	}else{
		echo $stm->error ;
	}
	
	CloseCon($conexion);
	
?>