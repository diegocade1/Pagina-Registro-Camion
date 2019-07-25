<?PHP
	if($_POST)
	{		
		// include database connection
    include dirname(__DIR__,2).'/config/db_connnection.php';
	
	$conexion=OpenCon();
 
    try{
     
 
        // posted values
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$contrasenia = $_POST['contrasenia'];
		$tipo = $_POST['tipo_usuario'];

 
		/*Insert MYSQL*/
	
	$sql="INSERT INTO tbusuario (`ID`, `Nombre`, `Apellido`, `Contrasenia`,`Tipo_usuario`) VALUES (?,?,?,?,?)";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('ssssi',$id,$nombre,$apellido,$contrasenia,$tipo);	
         
        // Execute the query
        if($stm->execute()){
            echo "Record was saved";
        }else{
            //echo "Unable to save record, " . $stm->error;
			echo "Unable to save record";
        }
	
		//echo $id . ' ' . $nombre . ' ' . $apellido . ' ' . $contrasenia;
		
/*		
	if($stm->execute()){
		echo "registrado;". mysqli_insert_id($conexion);
	}else{
		echo $stm->error;
	}
*/	
		
         CloseCon($conexion);
    }    
    // show error
    catch(PDOException $exception){	
        die('ERROR: ' . $exception->getMessage());
		CloseCon($conexion);
    }
		
	}
?>