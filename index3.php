<!DOCTYPE html>
<html lang="en">
<head>
<?PHP
	include dirname(__DIR__).'/PaginaRegistroCamion/db_connnection.php';
	
	$conexion=OpenCon();

	
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
								ID
							</div>
							<div class="cell">
								Cliente ID
							</div>
							<div class="cell">
								Terminal ID
							</div>
							<div class="cell">
								Anden ID
							</div>
							<div class="cell">
								Patente
							</div>
							<div class="cell">
								Chofer
							</div>
							<div class="cell">
								Hora de LLegada Camion
							</div>
							<div class="cell">
								Hora de Ingreso Terminal
							</div>
							<div class="cell">
								Hora de Apertura Camion
							</div>
							<div class="cell">
								Fecha Creacion
							</div>
						</div>
						
<?php
				$result = mysqli_query($conexion,"SELECT ID,Cliente_id,Terminal_id,Anden_id,Patente,Chofer,Hora_llegada_camion,Hora_ingreso_terminal,Hora_apertura_camion,fecha_creacion FROM tbcontrolcamion;");
				while ($row = mysqli_fetch_array($result)) 
				{
					echo "<div class=\"row\">\n".					    
						"<div class=\"cell\" data-title=\"ID\">\n".
						"<a href="."detalle.php?sello=".$row['ID'].">".
						$row['ID'].
						"</a>".
						"</div>\n" .
						"<div class=\"cell\" data-title=\"ClienteID\">\n".
						$row['Cliente_id'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"TerminalID\">\n".
						$row['Terminal_id'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"AndenID\">\n".
						$row['Anden_id'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"Patente\">\n".
						$row['Patente'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"Chofer\">\n".
						$row['Chofer'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"HoraLlegadaCamion\">\n".
						$row['Hora_llegada_camion'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"HoraIngresoTerminal\">\n".
						$row['Hora_ingreso_terminal'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"HoraAperturaCamion\">\n".
						$row['Hora_apertura_camion'].
						"</div>\n".
						"<div class=\"cell\" data-title=\"FechaCreacion\">\n".
						$row['fecha_creacion'].
						"</div>\n";
						
						//"<div class=\"cell\" data-title=\"Imagen\">\n".
						//"<a href=".$row['url'].">".						
						//"<img src="."data:image/jpeg;base64,". base64_encode( $row['imagen'] )." style=\"width:120px;height:100px;\" />".
						//"</a>".
						//"</div>\n".
						//"</div>\n";
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