<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.html?Iniciar%20%sesion%20primero");
		die();
}
$pageTitulo = 'Lista de Usuarios';
include 'header.php';

?>
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
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Contrasenia</th>
                </tr>
              </tfoot>
              <tbody>
<?php
				$result = mysqli_query($conexion,"SELECT ID,Nombre,Apellido,Contrasenia FROM tbusuario;");
				while ($row = mysqli_fetch_array($result)) 
				{
					echo "<tr>\n".					    
						"<td>".
						$row['ID'].
						"</td>\n".
						"<td>".
						$row['Nombre'].
						"</td>\n".
						"<td>".
						$row['Apellido'].
						"</td>\n".
						"<td>".
						$row['Contrasenia'].
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