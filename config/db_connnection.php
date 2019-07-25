<?php
	mysqli_report(MYSQLI_REPORT_STRICT);
    function OpenCon()
     {
		 mysqli_report(MYSQLI_REPORT_STRICT);
		//hostname_localhost="localhost";
		$hostname_localhost="localhost:3308";
		$database_localhost="controlcamion";
		$username_localhost="root";
		$password_localhost="57706897";

		try 
		{
			//@$conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost,$database_localhost) or die("Connect failed: %s\n". $conexion -> error);
			$conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost,$database_localhost) or die(mysql_error());
			return $conexion;
		} 
		catch (\Exception $e ) 
		{
			echo "Service unavailable<br>";
			echo "message: " . $e->getMessage();   // not in live code obviously...
			exit;
		}
     }
     
    function CloseCon($conexion)
     {
		 try 
		{
			$conexion -> close();
		} 
		catch (\Exception $e ) 
		{
			echo "Service unavailable";
			echo "message: " . $e->getMessage();   // not in live code obviously...
			exit;
		}
     }     
?>