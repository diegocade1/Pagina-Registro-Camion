<!DOCTYPE html>
<html lang="en">
<head>
<?PHP
//hostname_localhost="localhost";
$hostname_localhost="localhost:3308";
$database_localhost="controlcamion";
$username_localhost="root";
//$password_localhost="";
$password_localhost="57706897";

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	
?>
	<title>Consulta de Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
					<div class="table">

						<div class="row header">
							<div class="cell">
								Patente
							</div>
							<div class="cell">
								fecha
							</div>
							<div class="cell">
								Sello
							</div>
							<div class="cell">
								Imagen
							</div>
						</div>
						
<?php
				$result = mysqli_query($conexion,"SELECT patente, fecha, sello,url FROM tbcontrolcamion");
				while ($row = mysqli_fetch_array($result)) 
				{
					echo "<div class=\"row\">\n".					    
						"<div class=\"cell\" data-title=\"Patente\">\n".
						"<a href="."detalle.php?sello=".$row['sello'].">".
						$row['patente'].
						"</a>".
						"</div>\n" .
						"<div class=\"cell\" data-title=\"Fecha\">\n".
						$row['fecha'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"Sello\">\n".
						$row['sello'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"Imagen\">\n".
						"<a href=".$row['url'].">".
						"<img src=".$row['url']." alt=".$row['sello']." style=\"width:120px;height:100px;\" >".
						"</a>".
						"</div>\n".
						"</div>\n";
				}

?>
			</div>
		</div>
	</div>
</div>

	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>