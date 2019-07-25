<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.php?mensaje=Iniciar%20sesion%20primero");
		die();
}

if(!$_GET)
{
	header("location: lista_andenes.php");
}
$pageTitulo = 'Editar Anden';
include 'header.php';

		$registro_id = trim($_GET['id']);

		$query = "select * from tbterminal_anden where ID = ?;";
		$stmt=$conexion->prepare($query);
			$stmt->bind_param('s', $registro_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$anden = $result->fetch_object();
			// Value
			$nombre = $anden->Nombre;
			$terminal = $anden->Terminal_id;

?>
<script type="text/javascript">
	  
	 	function Update(anden_id)
	{
		var nombre = document.getElementById("txtAnden");
		var	combo = document.getElementById("txtNombreTerminal");
		var index = combo.selectedIndex;
		var terminal_id = combo.options[index].value;
		var id = anden_id;
		
		var dataString = {};
		dataString["nombre"] = nombre.value;
		dataString["terminal_id"] = terminal_id;
		dataString["id"] = id;
				
	
		//alert(nombre.value + " " + id);	
		
		$.ajax(
		{
			type:"post",
			url: location.origin + "/PaginaRegistroCamion/clases/anden/update.php",
			data:dataString,
			cache:false,
			success: function(html)
			{
				window.location.replace("editar_anden.php?id="+id+"&mensaje="+html.trim().replace(" ","%20"));
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
                <label for="txtNombreTerminal">Seleccione Terminal</label>
				<select id="txtNombreTerminal" name="txtNombreTerminal" class="form-control" aria-describedby="nameHelp">
				<option></option>
				<?php 
				$result = mysqli_query($conexion,"SELECT ID,Nombre FROM tbterminal;");
				while ($row = mysqli_fetch_array($result)) 
				{
					if($row['ID']==$terminal)
					{
						echo "<option selected='selected' value=".$row['ID']." >"
						. $row['Nombre'] 
						. "</option>/n";
					}
					else
					{
						echo "<option value=".$row['ID']." >"
						. $row['Nombre'] 
						. "</option>/n";
					}
				}
?>
				</select>
              </div>
              <div class="col-md-6">
                <label for="txtAnden">Nombre de Anden</label>
                <input class="form-control" id="txtAnden" name="txtAnden" type="text" aria-describedby="nameHelp" value="<?php echo $nombre; ?>" placeholder="Ingrese el nombre del anden" maxlength="20">
              </div>
            </div>
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