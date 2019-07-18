<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.html?Iniciar%20%sesion%20primero");
		die();
}
$pageTitulo = 'Lista de Registros';
include 'header.php';

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
                  <th>Cliente ID</th>
                  <th>Terminal ID</th>
                  <th>Anden ID</th>
                  <th>Patente</th>
                  <th>Chofer</th>
				  <th>Hora de LLegada Camion</th>
				  <th>Hora de Ingreso Terminal</th>
				  <th>Hora de Apertura Camion</th>
				  <th>Fecha Creacion</th>
				  <th>Terminado</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Cliente ID</th>
                  <th>Terminal ID</th>
                  <th>Anden ID</th>
                  <th>Patente</th>
                  <th>Chofer</th>
				  <th>Hora de LLegada Camion</th>
				  <th>Hora de Ingreso Terminal</th>
				  <th>Hora de Apertura Camion</th>
				  <th>Fecha Creacion</th>
				  <th>Terminado</th>
                </tr>
              </tfoot>
              <tbody>
<?php
				$result = mysqli_query($conexion,"SELECT ID,Cliente_id,Terminal_id,Anden_id,Patente,Chofer,Hora_llegada_camion,Hora_ingreso_terminal,Hora_apertura_camion,fecha_creacion,Terminado FROM tbcontrolcamion;");
				while ($row = mysqli_fetch_array($result)) 
				{			
					
					$element = "<tr>\n".					    
						"<td>".
						"<a href="."lista_registros_detalle.php?id=".$row['ID'].">".
						$row['ID'].
						"</a>".
						"</td>\n".
						"<td>".
						$row['Cliente_id'].
						"</td>\n".
						"<td>".
						$row['Terminal_id'].
						"</td>\n".
						"<td>".
						$row['Anden_id'].
						"</td>\n".
						"<td>".
						$row['Patente'].
						"</td>\n".
						"<td>".
						$row['Chofer'].
						"</td>\n".
						"<td>".
						$row['Hora_llegada_camion'].
						"</td>\n".
						"<td>".
						$row['Hora_ingreso_terminal'].
						"</td>\n".
						"<td>".
						$row['Hora_apertura_camion'].
						"</td>\n".
						"<td>".
						$row['fecha_creacion'].
						"</td>\n";
					if(boolval($row['Terminado']))
					{
						$element=$element . "<td class=\"fa fa-check\" aria-hidden=\"true\">".
						"</td>\n".
						"</tr>\n";
					}
					else
					{
						$element=$element . "<td class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\">".
						"</td>\n".
						"</tr>\n";
					}
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
    </div>
	<!-- /.container-fluid-->
</div> 
<!-- /.content-wrapper-->
<?php 
	include 'footer.php';
?>