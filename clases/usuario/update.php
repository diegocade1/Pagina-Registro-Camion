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
	
	$sql="UPDATE tbusuario SET `Nombre`=?,`Apellido`=?,`Contrasenia`=?,`Tipo_usuario`=? WHERE `ID` = ?;";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('sssis',$nombre,$apellido,$contrasenia,$tipo,$id);	
         
        // Execute the query
        if($stm->execute()){
            echo "Record was edited";
        }else{
            echo "Unable to edit record";
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