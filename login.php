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
	<title>Login</title>
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
	
 <form action="index.php" method="POST">

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table">
					<div class="row">
							<div class="cell">
								<label for="txtUsuario"><b>Usuario</b></label>
							</div>
							<div class="cell">
								<input type="text" placeholder="Enter Username" name="txtUsuario" required>
							</div>					
					</div>
					<div class="row">
							<div class="cell">
								<label for="txtContrasena"><b>Contraseña</b></label>
							</div>
							<div class="cell">
								<input type="password" placeholder="Enter Password" name="txtContrasena" required>
							</div>							
					</div>
					<div class="row">
							<div class="cell">
								<button type="submit">Iniciar Sesion</button>
							</div>					
					</div>
		</div>
	</div>
  </div>

</form> 
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