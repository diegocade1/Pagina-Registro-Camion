<?PHP
//hostname_localhost="localhost";
$hostname_localhost="localhost:3308";
$database_localhost="controlcamion";
$username_localhost="root";
//$password_localhost="";
$password_localhost="57706897";

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	$patente = $_POST["patente"];
	$sello = $_POST["sello"];
	$fecha = $_POST["fecha"];
	$imagen = $_POST["imagen"];
	//$path = dirname($_SERVER['PHP_SELF'],2)."/imagenes/$sello.jpg";
	$path = "imagenes/$sello.jpg";
	$url = "http://$hostname_localhost/PaginaRegistroCamion/$path";
	//$url = "imagenes/".$sello.".jpg";
	$path = dirname(__DIR__)."/imagenes/";
	
	if (!is_dir($path)) 
	{
		mkdir($path);
	}
	
	$path = dirname(__DIR__)."/imagenes/$sello.jpg";
	
	file_put_contents($path,base64_decode($imagen));
	$bytesArchivo=file_get_contents($path);
	$sql="INSERT INTO tbcontrolcamion (patente,sello,fecha,imagen,url) VALUES (?,?,?,?,?)";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('sssss',$patente,$sello,$fecha,$bytesArchivo,$url);	
		
	if($stm->execute()){
		echo "registra";
	}else{
		echo "noRegistra" ;
	}
	
	mysqli_close($conexion);
	
?>