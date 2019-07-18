<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.html?Iniciar%20%sesion%20primero");
		die();
}

if(!$_GET)
{
	header("location: lista_registros.php");
}

$pageTitulo = 'Lista de Registros';
include 'header.php';
$registro_id = $_GET['id']
?>
<div class="content-wrapper">
    <div class="container-fluid">
		      <!-- DataTable Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Registro de Procesos</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Guia Aerea</th>
                  <th>Hora Inicio Descarga</th>
                  <th>Hora Termino Descarga</th>
                  <th>Usuario Responsable</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Guia Aerea</th>
                  <th>Hora Inicio Descarga</th>
                  <th>Hora Termino Descarga</th>
                  <th>Usuario Responsable</th>
                </tr>
              </tfoot>
              <tbody>
<?php
				$query = "SELECT ID,Guia_aerea,Hora_inicio_descarga,Hora_termino_descarga,Usuario_id_responsable FROM tbdetallecontrolcamion where Controlcamion_id = " . $registro_id . ";";
				$result = mysqli_query($conexion,$query);
				while (@$row = mysqli_fetch_array($result)) 
				{			
					
					$element = "<tr>\n".					    
						"<td>".
						$row['ID'].
						"</td>\n".
						"<td>".
						$row['Guia_aerea'].
						"</td>\n".
						"<td>".
						$row['Hora_inicio_descarga'].
						"</td>\n".
						"<td>".
						$row['Hora_termino_descarga'].
						"</td>\n".
						"<td>".
						$row['Usuario_id_responsable'].
						"</td>\n";

					echo $element;
				}

?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Actualizado Hoy: <?php echo date('H:i'); ?></div>
      </div>
	  <!-- /.card mb-3-->
<?php
				$query = "SELECT Imagen1,Imagen2,Imagen3 FROM tbcontrolcamion where ID = " . $registro_id . ";";
				$result = mysqli_query($conexion,$query);
				@$row = mysqli_fetch_array($result)
?>
	  <div class="card-deck">
		<div class="card">
			<div class="card-body">
			<h5 class="card-title">Imagen 1</h5>
				<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
			</div>
		<img class="card-img-bottom" src="data:image/jpeg;base64,<?php echo base64_encode( $row['Imagen1'] ) ?>" alt="Card image cap">
		<div class="card-footer small text-muted">Actualizado Hoy: <?php echo date('H:i'); ?></div>
		</div>
		<div class="card">
			<div class="card-body">
			<h5 class="card-title">Imagen 2</h5>
				<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
			</div>
		<img class="card-img-bottom" src="data:image/jpeg;base64,<?php echo base64_encode( $row['Imagen2'] ) ?>" alt="Card image cap">
		<div class="card-footer small text-muted">Actualizado Hoy: <?php echo date('H:i'); ?></div>
		</div>
		<div class="card">
			<div class="card-body">
			<h5 class="card-title">Imagen 3</h5>
				<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
			</div>
		<img class="card-img-bottom" src="data:image/jpeg;base64,<?php echo base64_encode( $row['Imagen3'] ) ?>" alt="Card image cap">
		<div class="card-footer small text-muted">Actualizado Hoy: <?php echo date('H:i'); ?></div>
		</div>
	  </div>
    </div>
	<!-- /.container-fluid-->
</div> 
<!-- /.content-wrapper-->
<?php 
	include 'footer.php';
?>