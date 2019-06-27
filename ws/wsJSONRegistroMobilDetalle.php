<?PHP
//hostname_localhost="localhost";
$hostname_localhost="localhost:3308";
$database_localhost="controlcamion";
$username_localhost="root";
//$password_localhost="";
$password_localhost="57706897";

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	$po = $_POST["po"];
	$sello = $_POST["sello"];
	$imagen = $_POST["imagen"];

	$path = "imagenes/PO/$sello"."_"."$po.jpg";
	$host = "";
	
	if(strpos($hostname_localhost,":"))
	{
		$host =  substr($hostname_localhost,0,strpos($hostname_localhost,":"));
	}
	else
	{
		$host = $hostname_localhost;
	}
	
	//$url = "http://$host/PaginaRegistroCamion/$path";
	$url = str_replace(" ","%20",$path);
	$path = dirname(__DIR__)."/imagenes/PO";
	
	if (!is_dir($path)) 
	{
		mkdir($path);
	}
	
	$path = dirname(__DIR__)."/imagenes/PO/$sello"."_"."$po.jpg";
	
	file_put_contents($path,base64_decode($imagen));
	$bytesArchivo=file_get_contents($path);
	$sql="INSERT INTO tbdetallecontrolcamion (sello_id,po,imagen,url) VALUES (?,?,?,?)";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('ssss',$sello,$po,$bytesArchivo,$url);	
		
	if($stm->execute()){
		echo "registra";
	}else{
		echo "noRegistra" ;
	}
	
	mysqli_close($conexion);
	
?>