<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.php?mensaje=Iniciar%20sesion%20primero");
		die();
}

if(!$_GET)
{
	header("location: lista_clientes.php");
}
$pageTitulo = 'Editar Cliente';
include 'header.php';

		$registro_id = trim($_GET['id']);

		$query = "select * from tbcliente where ID = ?;";
		$stmt=$conexion->prepare($query);
			$stmt->bind_param('s', $registro_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$cliente = $result->fetch_object();
			// Value
			$nombre = $cliente->Nombre;

?>
<script type="text/javascript">
	  
	  	 	function Update(cliente_id)
	{
		var id = cliente_id;
		var nombre = document.getElementById("txtNombreCliente");
		
		
		var dataString = {};
		
		dataString["id"] = id;
		dataString["nombre"] = nombre.value;	
	
		$.ajax(
		{
			type:"post",
			url: location.origin + "/PaginaRegistroCamion/clases/cliente/update.php",
			data:dataString,
			cache:false,
			success: function(html)
			{
				window.location.replace("editar_cliente.php?id="+id+"&mensaje="+html.trim().replace(" ","%20"));
			}		
		});
		return false;		
	}

</script>
<div class="content-wrapper">
    <div class="container-fluid">
		      <!-- Mantenedor -->
    <div class="card mx-auto">
      <div class="card-header">Editar Cliente</div>
      <div class="card-body">
        <form>
		  <div class="form-group">
                <label for="txtNombreCliente">Nombre Cliente</label>
                <input class="form-control" id="txtNombreCliente" name="txtNombreCliente" type="text" aria-describedby="nameHelp" value="<?php echo $nombre; ?>" placeholder="Ingrese el nombre del cliente" maxlength="50">
          </div>
		  <div class="form-group">
		  <div class="form-row text-center">
			<div class="col-12">
				<a class="btn btn-primary btn-Dark" href="#" onclick="return Update(<?php echo $registro_id; ?>)" >Editar</a>
			</div>
		  </div>
		  </div>
        </form>
      </div>
    </div>
	  <!-- /.card mb-3-->
    </div>
	<!-- /.container-fluid-->
</div> 
<!-- /.content-wrapper-->
<?php 
if(isset($_GET['mensaje']))
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