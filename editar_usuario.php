<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.php?mensaje=mensaje=Iniciar%20sesion%20primero");
		die();
}

if(!$_GET)
{
	header("location: lista_usuarios.php");
}
$pageTitulo = 'Editar Usuario';
include 'header.php';

		$registro_id = trim($_GET['id']);

		$query = "select * from tbusuario where id = ?;";
		$stmt=$conexion->prepare($query);
			$stmt->bind_param('s', $registro_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$usuario = $result->fetch_object();
			// Value
			$nombre = $usuario->Nombre;
			$apellido = $usuario->Apellido;
			$contrasenia=$usuario->Contrasenia;
			$tipo = $usuario->Tipo_usuario;

?>

<script type="text/javascript">
	 
	 	function Update()
	{
		
		var id = document.getElementById("txtUsuario");
		var nombre = document.getElementById("txtNombre");
		var apellido = document.getElementById("txtApellido");
		var contrasenia = document.getElementById("txtContrasenia");
		var	combo = document.getElementById("txtTipoUsuario");
		var index = combo.selectedIndex;
		var tipo_usuario_id = combo.options[index].value;
		
		
		var dataString = {};
		
		dataString["id"] = id.value;
		dataString["nombre"] = nombre.value;	
		dataString["apellido"] = apellido.value;
		dataString["contrasenia"] = contrasenia.value;
		dataString["tipo_usuario"] = tipo_usuario_id;
	
		//alert(id.value+" "+nombre.value+" "+apellido.value+" "+contrasenia.value);	
		$.ajax(
		{
			type:"post",
			url: location.origin + "/PaginaRegistroCamion/clases/usuario/update.php",
			data:dataString,
			cache:false,
			success: function(html)
			{
				window.location.replace("editar_usuario.php?id="+id.value+"&mensaje="+html.trim().replace(" ","%20"));
			}		
		});
		return false;		
	}

</script>

<div class="content-wrapper">
    <div class="container-fluid">
		      <!-- Mantenedor -->
    <div class="card mx-auto">
      <div class="card-header">Editar Usuario</div>
      <div class="card-body">
        <form>
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
				<label for="txtUsuario">Usuario</label>
				<input class="form-control" id="txtUsuario" name="txtUsuario" value="<?php echo $registro_id ?>" type="text" aria-describedby="usuarioHelp" placeholder="Ingrese usuario" maxlength="20" readonly>
              </div>
              <div class="col-md-6">
                <label for="txtApellido">Tipo Usuario</label>
                <select id="txtTipoUsuario" name="txtTipoUsuario" class="form-control" aria-describedby="nameHelp">
				<option></option>
				<?php 
				$query = "SELECT ID,Descripcion FROM tbtipo_usuario;";
				$stm=$conexion->prepare($query);
				$stm->execute();
				$result = $stm->get_result();
				$registros = $result->fetch_all(MYSQLI_ASSOC);
				
				$result->close();
				$stm->close();
				
				foreach ($registros as $key => $registro)
				{
					if($registro['ID']==$tipo)
					{
						echo "<option selected='selected' value=".$registro['ID']." >"
						. $registro['Descripcion'] 
						. "</option>/n";
					}
					else
					{
						echo "<option value=".$registro['ID']." >"
						. $registro['Descripcion'] 
						. "</option>/n";
					}
				}
?>
				</select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="txtNombre">Nombre</label>
                <input class="form-control" id="txtNombre" name="txtNombre" type="text" aria-describedby="nameHelp" value="<?php echo $nombre ?>" placeholder="Ingrese nombre" maxlength="20">
              </div>
              <div class="col-md-6">
                <label for="txtApellido">Apellido</label>
                <input class="form-control" id="txtApellido" name="txtApellido" type="text" aria-describedby="nameHelp" value="<?php echo $apellido ?>" placeholder="Ingrese apellido" maxlength="20">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="txtContrasenia">Contrasenia</label>
                <input class="form-control" id="txtContrasenia" type="password" placeholder="Password" value="<?php echo $contrasenia ?>" maxlength="20">
              </div>
              <div class="col-md-6">
                <label for="txtContraseniaConfirmar">Confirmar contrasenia</label>
                <input class="form-control" id="txtContraseniaConfirmar" type="password" placeholder="Confirmar password" value="<?php echo $contrasenia ?>" maxlength="20">
              </div>
            </div>
          </div>
		  <div class="form-group">
		  <div class="form-row text-center">
			<div class="col-12">
				<a class="btn btn-primary btn-Dark" href="#" onclick="return Update()">Editar</a>
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