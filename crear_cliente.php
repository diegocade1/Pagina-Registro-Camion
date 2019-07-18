<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.html?Iniciar%20%sesion%20primero");
		die();
}
$pageTitulo = 'Registrar Cliente';
include 'header.php';

?>
<script type="text/javascript">
	  
	 	function Insert()
	{
		var nombre = document.getElementById("txtNombreCliente");	
		
		var dataString = {};
		dataString["nombre"] = nombre.value;	
	
		//alert(nombre.value);	
		$.ajax(
		{
			type:"post",
			url: location.origin + "/PaginaRegistroCamion/clases/cliente/create.php",
			data:dataString,
			cache:false,
			success: function(html)
			{
				alert(html);
			}		
		});
		return false;		
	}

</script>
<div class="content-wrapper">
    <div class="container-fluid">
		      <!-- Mantenedor -->
    <div class="card mx-auto">
      <div class="card-header">Registrar Cliente</div>
      <div class="card-body">
        <form>
		  <div class="form-group">
                <label for="txtNombreCliente">Nombre Cliente</label>
                <input class="form-control" id="txtNombreCliente" name="txtNombreCliente" type="text" aria-describedby="nameHelp" placeholder="Ingrese el nombre del cliente" maxlength="50">
          </div>
		  <div class="form-group">
		  <div class="form-row text-center">
			<div class="col-12">
				<a class="btn btn-primary btn-Dark" href="#" onclick="return Insert()">Registrar</a>
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
	include 'footer.php';
?>