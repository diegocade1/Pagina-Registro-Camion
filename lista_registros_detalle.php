<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.php?mensaje=Iniciar%20sesion%20primero");
		die();
}

if(!$_GET)
{
	header("location: lista_registros.php");
}

$pageTitulo = 'Lista de Registros';
include 'header.php';
$registro_id = $_GET['id'];
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

				$query = "SELECT a.ID,Guia_aerea,Hora_inicio_descarga,Hora_termino_descarga, concat(b.Nombre,concat(' ' ,b.Apellido)) as Responsable FROM tbdetallecontrolcamion a left join tbusuario b on a.Usuario_id_responsable = b.ID where Controlcamion_id =?;";
				$stm=$conexion->prepare($query);
				$stm->bind_param('i',$registro_id);
				$stm->execute();
				$result = $stm->get_result();
				$registros = $result->fetch_all(MYSQLI_ASSOC);
				
				$result->close();
				$stm->close();
				
				foreach ($registros as $key => $registro)
				{
					$element = "<tr>\n".					    
						"<td>".
						$registro['ID'].
						"</td>\n".
						"<td>".
						$registro['Guia_aerea'].
						"</td>\n".
						"<td>".
						$registro['Hora_inicio_descarga'].
						"</td>\n".
						"<td>".
						$registro['Hora_termino_descarga'].
						"</td>\n".
						"<td>".
						$registro['Responsable'].
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
				$query = "SELECT Imagen1,Imagen2,Imagen3 FROM tbcontrolcamion where ID = ?;";
				$stm=$conexion->prepare($query);
				$stm->bind_param('i',$registro_id);
				$stm->execute();
				$result = $stm->get_result();
				$registro = $result->fetch_array(MYSQLI_ASSOC);
				
				$result->close();
				$stm->close();
				
?>
	  <div class="card-deck">
		<div class="card">
			<div class="card-body">
			<h5 class="card-title">Imagen 1</h5>
				<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
			</div>
		<img class="card-img-bottom" src="data:image/jpeg;base64,<?php echo base64_encode( $registro['Imagen1'] ) ?>" alt="Card image cap">
		<div class="card-footer small text-muted">Actualizado Hoy: <?php echo date('H:i'); ?></div>
		</div>
		<div class="card">
			<div class="card-body">
			<h5 class="card-title">Imagen 2</h5>
				<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
			</div>
		<img class="card-img-bottom" src="data:image/jpeg;base64,<?php echo base64_encode( $registro['Imagen2'] ) ?>" alt="Card image cap">
		<div class="card-footer small text-muted">Actualizado Hoy: <?php echo date('H:i'); ?></div>
		</div>
		<div class="card">
			<div class="card-body">
			<h5 class="card-title">Imagen 3</h5>
				<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
			</div>
		<img class="card-img-bottom" src="data:image/jpeg;base64,<?php echo base64_encode( $registro['Imagen3'] ) ?>" alt="Card image cap">
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