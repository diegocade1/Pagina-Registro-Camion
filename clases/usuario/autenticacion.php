<?PHP session_start();
	include dirname(__DIR__,2).'/config/db_connnection.php';
	
	if (isset($_POST['submit'])) {
    if ( isset( $_POST['txtUsuario'] ) && isset( $_POST['txtContrasenia'] ) ) {
        // DB
        $conexion=OpenCon();
		
        if($stmt = $conexion->prepare("SELECT * FROM tbusuario WHERE ID = ?"))
		{
			$stmt->bind_param('s', $_POST['txtUsuario']);
			$stmt->execute();
			$result = $stmt->get_result();
			$usuario = $result->fetch_object();
			$hash_password = password_hash($usuario->Contrasenia, PASSWORD_DEFAULT);
    		
			// Verify user password and set $_SESSION
			if ( password_verify( $_POST['txtContrasenia'], $hash_password) ) {
				$_SESSION['usuario'] = $usuario->ID;
				header("location: ../../lista_registros.php");
			}
			else
			{
				header("location: ../../login.html?usuario=Usuario%20o%20contrasenia%20no%20corresponde");
			}
		}
		else
		{
			header("location: ../../login.html?usuario=Error%20en%20la%20base%20de%20datos");
		}
    }
	else
	{
		header("location: ../../login.html?usuario=Usuario%20o%20contrasenia%20obligatorio");
	}
	
	CloseCon($conexion);
	}
	else{
		header("location: ../../login.html");
	}
	
?>