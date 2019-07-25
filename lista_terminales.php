<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.php?mensaje=Iniciar%20sesion%20primero");
		die();
}
$pageTitulo = 'Lista de Terminales';
include 'header.php';

?>
<script type="text/javascript">
	 
	 	function Delete(terminal_id)
	{
		var r = confirm("¿Esta seguro que desea eliminar la terminal de ID: " + terminal_id +"?");
		if (r == true) 
		{
			var id = terminal_id;
	
			var dataString = {};
		
			dataString["id"] = id;
	
		//alert(id.value+" "+nombre.value+" "+apellido.value+" "+contrasenia.value);
			$.ajax(
			{
				type:"post",
				url: location.origin + "/PaginaRegistroCamion/clases/terminal/delete.php",
				data:dataString,
				cache:false,
				success: function(html)
				{
					window.location.replace("lista_terminales.php?mensaje="+html.trim().replace(" ","%20"));
				}		
			});
		} 
		return false;		
	}

</script>
<div class="content-wrapper">
    <div class="container-fluid">
		      <!-- DataTable Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Lista de Terminales</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
				  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
				  <th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>
<?php
				$query = "SELECT ID,Nombre FROM tbterminal;";
				$stm=$conexion->prepare($query);
				$stm->execute();
				$result = $stm->get_result();
				$registros = $result->fetch_all(MYSQLI_ASSOC);
				
				$result->close();
				$stm->close();
				
				foreach ($registros as $key => $registro)
				{
					echo "<tr>\n".					    
						"<td>".
						$registro['ID'].
						"</td>\n".
						"<td>".
						$registro['Nombre'].
						"</td>\n".
						"<td>" .
						"<div class=\"btn-toolbar\">".
						"<a href='editar_terminal.php?id=".$registro['ID']. "' class='btn btn-info btn-sm mr-1'>Editar</a>".
						"<a href='#' onclick='return Delete(".$registro['ID'].");' class='btn btn-danger btn-sm mr-1'>Eliminar</a>".
						"</div>".
						"</td>\n".
						"</tr>\n";					
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