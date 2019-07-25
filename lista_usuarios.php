<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.php?mensaje=Iniciar%20sesion%20primero");
		die();
}
$pageTitulo = 'Lista de Usuarios';
include 'header.php';

?>
<script type="text/javascript">
	 
	 	function Delete(usuario_id)
	{
		var usuario = usuario_id;
		
		var r = confirm("¿Esta seguro que desea eliminar al usuario con ID: " + usuario_id +"?");
		if (r == true) 
		{
			var id = usuario_id;
	
			var dataString = {};
		
			dataString["id"] = id;
	
		//alert(id.value+" "+nombre.value+" "+apellido.value+" "+contrasenia.value);	
			$.ajax(
			{
				type:"post",
				url: location.origin + "/PaginaRegistroCamion/clases/usuario/delete.php",
				data:dataString,
				cache:false,
				success: function(html)
				{
					window.location.replace("lista_usuarios.php?mensaje="+html.trim().replace(" ","%20"));
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
          <i class="fa fa-table"></i> Lista de Usuarios</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Contrasenia</th>
				  <th>Tipo de Usuario</th>
				  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Contrasenia</th>
				  <th>Tipo de Usuario</th>
				  <th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>
<?php

				$query = "SELECT a.ID,Nombre,Apellido,Contrasenia,b.Descripcion FROM tbusuario a left join tbtipo_usuario b on a.Tipo_usuario = b.ID;";
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
						"<td>".
						$registro['Apellido'].
						"</td>\n".
						"<td>".
						$registro['Contrasenia'].
						"</td>\n".
						"<td>".
						$registro['Descripcion'].
						"</td>\n".
						"<td>" .
						"<div class=\"btn-toolbar\">".
						"<a href='editar_usuario.php?id=".$registro['ID']. "' class='btn btn-info btn-sm mr-1'>Editar</a>".
						"<a href='#' onclick='return Delete(\"".$registro['ID']."\");' class='btn btn-danger btn-sm mr-1'>Eliminar</a>".
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
<?php if(isset($_GET['mensaje']))
{
        $message = $_GET['mensaje'];
    ?>
        <script type="text/javascript">
        $(function() {
         $('#myModal').modal('show');
        });
        </script>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"><?php echo $message; ?>.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

<?php } ?>
<?php 
	include 'footer.php';
?>