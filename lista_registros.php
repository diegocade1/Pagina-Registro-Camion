<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.php?mensaje=Iniciar%20sesion%20primero");
		die();
}

$pageTitulo = 'Lista de Registros';
include 'header.php';

?>
<script type="text/javascript">
	
	 $(function(){
        $('#txtFiltro option').click(function(){
			var id = $(this).val();
			if(id!="")
			{
				window.location.replace("lista_registros_filtro.php?filtro="+id.trim().replace(" ",""));
			}
			else
			{
				window.location.replace("lista_registros.php");
			}
			//$('#dataTable').find("tr:gt(0)").remove();
			
			
			//$('#dataTable').bootstrapTable({});
			/*
                var mydata = 
				[
					{
						ID: '3',
                        Cliente: 'Item 3',
                        Terminal: '$2',
						Anden: '',
						Patente: '',
						Chofer: '',
						HoraLLegadaCamion: '',
						HoraIngresoTerminal: '',
						HoraAperturaCamion: '',
						FechaCreacion: '',
						UsuarioResponsable: '',
						Terminado: ''
					}
                ]; 
				
			data = "[{"a": 1}, {"a": 2}]"  # error
			JSON.parse(data)  # parse json string to JS object 
			
            $('#dataTable').bootstrapTable('load', mydata);
		  */
		  
		//alert($(this).val());
		
        });
    });
	
</script>
<div class="content-wrapper">
    <div class="container-fluid">
		      <!-- DataTable Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Registro de Procesos</div>
        <div class="card-body">
			<div class="row form-group">
				<div class="col-sm-12 col-md-6">
						<label>
						Terminales
						</label>
					<div class="dataTables_length" id="dataTable_length2">
						<select id="txtFiltro" name="txtFiltro" class="form-control">
						<option value="">Todos</option>
<?php
				$query = "SELECT * FROM tbterminal;";
				$stm=$conexion->prepare($query);
				$stm->execute();
				$result = $stm->get_result();
				$registros = $result->fetch_all(MYSQLI_ASSOC);
				
				$result->free();
				$result->close();
				$stm->close();
				
				foreach ($registros as $key => $registro)
				{
						echo "<option value=".$registro['ID']." >"
						. $registro['Nombre'] 
						. "</option>/n";
				}
?>
						</select> 
						<!--entries-->
					</div>
				</div>
			</div>
          <div class="table-responsive">
            <table class="table table-bordered" data-toggle="table" id="dataTable" name="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th >Detalle</th>
                  <th data-field="ID">Registro</th>
                  <th data-field="Cliente">Cliente</th>
                  <th data-field="Terminal">Terminal</th>
                  <th data-field="Anden">Anden</th>
                  <th data-field="Patente">Patente</th>
                  <th data-field="Chofer">Chofer</th>
				  <th data-field="HoraLLegadaCamion">Hora de LLegada Camion</th>
				  <th data-field="HoraIngresoTerminal">Hora de Ingreso Terminal</th>
				  <th data-field="HoraAperturaCamion">Hora de Apertura Camion</th>
				  <th data-field="FechaCreacion">Fecha Creacion</th>
				  <th data-field="UsuarioResponsable">Usuario Responsable</th>
				  <th data-field="Terminado">Terminado</th>
                </tr>
              </thead>
              <tbody>
<?php
				//$query = "SELECT ID,Cliente_id,Terminal_id,Anden_id,Patente,Chofer,Hora_llegada_camion,Hora_ingreso_terminal,Hora_apertura_camion,fecha_creacion,Terminado FROM tbcontrolcamion where Cliente_id=?;";
				$query= "SELECT a.ID, b.Nombre as Cliente,c.Nombre as Terminal,d.Nombre as Anden,Patente,Chofer,Hora_llegada_camion,Hora_ingreso_terminal,Hora_apertura_camion,fecha_creacion, concat(e.Nombre,concat( ' ' ,e.Apellido)) as 'Usuario Responsable' ,Terminado FROM tbcontrolcamion a left join tbcliente b on a.Cliente_id = b.ID left join tbterminal c on a.Terminal_id = c.ID left join tbterminal_anden d on a.Anden_id = d.ID left join tbusuario e on a.Usuario_id_responsable = e.ID;";
				//$query = "SELECT * FROM v_registro_todo;";
				$stm=$conexion->prepare($query);
				//$stm->bind_param('ssssi',$cliente_id);
				$stm->execute();
				$result = $stm->get_result();
				$registros = $result->fetch_all(MYSQLI_ASSOC);
				
				$result->close();
				$stm->close();
				
				foreach ($registros as $key => $registro)
				{
					$element = 	"<tr>\n".	
						"<td>" .
						"<div class=\"btn-toolbar\">".
						"<a href='lista_registros_detalle.php?id=".$registro['ID']. "' class='btn btn-info btn-sm mr-1'>Detalle</a>".
						"</div>".
						"</td>\n".				    
						"<td>".
						$registro['ID'].
						"</td>\n".
						"<td>".
						$registro['Cliente'].
						"</td>\n".
						"<td>".
						$registro['Terminal'].
						"</td>\n".
						"<td>".
						$registro['Anden'].
						"</td>\n".
						"<td>".
						$registro['Patente'].
						"</td>\n".
						"<td>".
						$registro['Chofer'].
						"</td>\n".
						"<td>".
						$registro['Hora_llegada_camion'].
						"</td>\n".
						"<td>".
						$registro['Hora_ingreso_terminal'].
						"</td>\n".
						"<td>".
						$registro['Hora_apertura_camion'].
						"</td>\n".
						"<td>".
						$registro['fecha_creacion'].
						"</td>\n".
						"<td>".
						$registro['Usuario Responsable'].
						"</td>\n";
					if(boolval($registro['Terminado']))
					{
						$element=$element . "<td>".
						"<i class=\"fa fa-check\" aria-hidden=\"true\"></i>".
						"</td>\n".
						"</tr>\n";
					}
					else
					{
						$element=$element . "<td>".
						"<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i>".
						"</td>\n".
						"</tr>\n";
					}
					echo $element;
				}
				
?>
              </tbody>
			  <tfoot>
                <tr>
				  <th >Detalle</th>
                  <th>Registro</th>
                  <th>Cliente</th>
                  <th>Terminal</th>
                  <th>Anden</th>
                  <th>Patente</th>
                  <th>Chofer</th>
				  <th>Hora de LLegada Camion</th>
				  <th>Hora de Ingreso Terminal</th>
				  <th>Hora de Apertura Camion</th>
				  <th>Fecha Creacion</th>
				  <th>Usuario Responsable</th>
				  <th>Terminado</th>
                </tr>
              </tfoot>
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