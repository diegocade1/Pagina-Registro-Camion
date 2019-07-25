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

 
		/*Insert MYSQL*/
	
	$sql="UPDATE tbcliente SET `Nombre`=? WHERE `ID` = ?;";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('si',$nombre,$id);	
         
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