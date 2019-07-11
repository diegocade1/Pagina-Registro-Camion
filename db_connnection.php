    <?php
    function OpenCon()
     {
		//hostname_localhost="localhost";
		$hostname_localhost="localhost:3308";
		$database_localhost="controlcamion";
		$username_localhost="root";
		//$password_localhost="";
		$password_localhost="57706897";

		$conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost,$database_localhost) or die("Connect failed: %s\n". $conexion -> error);
     
		return $conexion;
     }
     
    function CloseCon($conexion)
     {
		$conexion -> close();
     }
       
    ?>