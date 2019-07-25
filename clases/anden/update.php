<?PHP
	if($_POST)
	{		
		// include database connection
    include dirname(__DIR__,2).'/config/db_connnection.php';
	
	$conexion=OpenCon();
 
    try{
     
 
        // posted values
		$id = $_POST['id'];
		$terminal_id = $_POST['terminal_id'];
		$nombre = $_POST['nombre'];

 
		/*Insert MYSQL*/
	
	$sql="UPDATE tbterminal_anden SET `Nombre`= ?,`Terminal_id`= ?  WHERE `ID` = ?;";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('sii',$nombre,$terminal_id,$id);	
         
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