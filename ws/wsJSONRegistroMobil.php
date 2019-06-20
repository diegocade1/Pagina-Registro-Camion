<?PHP
$hostname_localhost="localhost";
$database_localhost="controlcamion";
$username_localhost="root";
$password_localhost="";
$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	$patente = $_POST["patente"];
	$sello = $_POST["sello"];
	$fecha = $_POST["fecha"];
	$imagen = $_POST["imagen"];
	$path = "imagenes/$sello.jpg";
	$url = "http://$hostname_localhost/RegistroCamion/$path";
	$url = "imagenes/".$sello.".jpg";
	file_put_contents($path,base64_decode($imagen));
	$bytesArchivo=file_get_contents($path);
	$sql="INSERT INTO tbcontrolcamion (patente,sello,fecha,imagen,url) VALUES (?,?,?,?,?)";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('sssss',$patente,$sello,$fecha,$bytesArchivo,$url);	
		
	if($stm->execute()){
		echo "registra";
	}else{
		echo "noRegistra";
	}
	
	mysqli_close($conexion);
	
?>