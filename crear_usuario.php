<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.html?Iniciar%20%sesion%20primero");
		die();
}
$pageTitulo = 'Registrar Usuario';
include 'header.php';

?>

<script type="text/javascript">
	 
	 function Prueba()
	 {
		alert("It works!");
	 }
	 
	 function ValidatarPassword() 
	 {

	 }
	 
	 	function Insert()
	{
		
		var id = document.getElementById("txtUsuario");
		var nombre = document.getElementById("txtNombre");
		var apellido = document.getElementById("txtApellido");
		var contrasenia = document.getElementById("txtContrasenia");
		
		
		var dataString = {};
		
		dataString["id"] = id.value;
		dataString["nombre"] = nombre.value;	
		dataString["apellido"] = apellido.value;
		dataString["contrasenia"] = contrasenia.value;
	
		//alert(id.value+" "+nombre.value+" "+apellido.value+" "+contrasenia.value);	
		$.ajax(
		{
			type:"post",
			url: location.origin + "/PaginaRegistroCamion/clases/usuario/create.php",
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
      <div class="card-header">Registrar Usuario</div>
      <div class="card-body">
        <form>
		  <div class="form-group">
            <label for="txtUsuario">Usuario</label>
            <input class="form-control" id="txtUsuario" name="txtUsuario" type="text" aria-describedby="usuarioHelp" placeholder="Ingrese usuario" maxlength="20">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="txtNombre">Nombre</label>
                <input class="form-control" id="txtNombre" name="txtNombre" type="text" aria-describedby="nameHelp" placeholder="Ingrese nombre" maxlength="20">
              </div>
              <div class="col-md-6">
                <label for="txtApellido">Apellido</label>
                <input class="form-control" id="txtApellido" name="txtApellido" type="text" aria-describedby="nameHelp" placeholder="Ingrese apellido" maxlength="20">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="txtContrasenia">Contrasenia</label>
                <input class="form-control" id="txtContrasenia" type="password" placeholder="Password" maxlength="20">
              </div>
              <div class="col-md-6">
                <label for="txtContraseniaConfirmar">Confirmar contrasenia</label>
                <input class="form-control" id="txtContraseniaConfirmar" type="password" placeholder="Confirmar password" maxlength="20">
              </div>
            </div>
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