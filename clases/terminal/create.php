<?PHP
	if($_POST)
	{		
		// include database connection
    include dirname(__DIR__,2).'/config/db_connnection.php';
	
	$conexion=OpenCon();
 
    try{
     
 
        // posted values
		$nombre = $_POST['nombre'];

 
		/*Insert MYSQL*/
	
	$sql="INSERT INTO tbterminal (`Nombre`) VALUES (?)";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('s',$nombre);	
         
        // Execute the query
        if($stm->execute()){
            echo "Record was saved";
        }else{
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