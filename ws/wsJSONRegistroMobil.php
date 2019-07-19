<?PHP
	include dirname(__DIR__).'/config/db_connnection.php';
	
	$conexion=OpenCon();
	
	@$id_cliente = $_POST["id_cliente"];
	@$id_terminal = $_POST["id_terminal"];
	@$id_anden = $_POST["id_anden"];
	@$patente = $_POST["patente"];
	@$chofer = $_POST["chofer"];
	@$hora_llegada_camion = $_POST["hora_llegada_camion"];
	@$hora_ingreso_terminal = $_POST["hora_ingreso_terminal"];
	@$hora_apertura_camion = $_POST["hora_apertura_camion"];
	$fecha_creacion = date('Y-m-d H:i:s');
	@$id_usuario = $_POST["id_usuario"];
	@$imagen_0 = $_POST["imagen_0"];
	@$imagen_1 = $_POST["imagen_1"];
	@$imagen_2 = $_POST["imagen_2"];
	$terminado = 0;
	
	$path = dirname(__DIR__)."/imagenes/";
	
	if (!is_dir($path)) 
	{
		mkdir($path);
	}
	
	/* Imagen 1*/
	//$path = "imagenes/$sello.jpg";
	$path = "imagenes/$patente"."_". str_replace(":","_",$fecha_creacion)."_1.jpg";
	
	$url_1 = str_replace(" ","%20",$path);
	
	$path = dirname(__DIR__)."/imagenes/$patente"."__". str_replace(":","_",$fecha_creacion)."_1.jpg";
	
	file_put_contents($path,base64_decode($imagen_0));
	$bytesImagen_1=file_get_contents($path);
	
	/* Imagen 2*/
	
	$path = "imagenes/$patente"."__". str_replace(":","_",$fecha_creacion)."_2.jpg";
	
	$url_2 = str_replace(" ","%20",$path);
	
	$path = dirname(__DIR__)."/imagenes/$patente"."__". str_replace(":","_",$fecha_creacion)."_2.jpg";
	
	file_put_contents($path,base64_decode($imagen_1));
	$bytesImagen_2=file_get_contents($path);
	/* Imagen 3*/
	
	$path = "imagenes/$patente"."__". str_replace(":","_",$fecha_creacion)."_3.jpg";
	
	$url_3 = str_replace(" ","%20",$path);
	
	$path = dirname(__DIR__)."/imagenes/$patente"."__". str_replace(":","_",$fecha_creacion)."_3.jpg";
	
	file_put_contents($path,base64_decode($imagen_2));
	$bytesImagen_3=file_get_contents($path);
	
	/*Insert MYSQL*/
	
	$sql="INSERT INTO tbcontrolcamion (`Cliente_id`, `Terminal_id`, `Anden_id`, `Patente`, `Chofer`, `Hora_llegada_camion`, `Hora_ingreso_terminal`, `Hora_apertura_camion`, `fecha_creacion`, `Imagen1`, `Imagen2`, `Imagen3`, `Url1`, `Url2`, `Url3`, `Usuario_id_responsable`, `Terminado`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('iiisssssssssssssi',$id_cliente,$id_terminal,$id_anden,$patente,$chofer,$hora_llegada_camion,$hora_ingreso_terminal,$hora_apertura_camion,$fecha_creacion,$bytesImagen_1,$bytesImagen_2,$bytesImagen_3,$url_1,$url_2,$url_3,$id_usuario,$terminado);	
		
	if($stm->execute()){
		echo "registrado;". mysqli_insert_id($conexion);
	}else{
		echo $stm->error;
	}
	
	CloseCon($conexion);
	
?>