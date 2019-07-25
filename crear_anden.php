<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.php?mensaje=Iniciar%20sesion%20primero");
		die();
}
$pageTitulo = 'Registrar Usuario';
include 'header.php';

?>
<script type="text/javascript">
	  
	 	function Insert()
	{
		var nombre = document.getElementById("txtAnden");
		var	combo = document.getElementById("txtNombreTerminal");
		var index = combo.selectedIndex;
		var id = combo.options[index].value;
		
		var dataString = {};
		dataString["nombre"] = nombre.value;
		dataString["id"] = id;
				
	
		//alert(nombre.value + " " + id);	
		
		$.ajax(
		{
			type:"post",
			url: location.origin + "/PaginaRegistroCamion/clases/anden/create.php",
			data:dataString,
			cache:false,
			success: function(html)
			{
				window.location.replace("crear_anden.php?mensaje="+html.trim().replace(" ","%20"));
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
            <div class="form-row">
              <div class="col-md-6">
                <label for="txtNombreTerminal">Seleccione Terminal</label>
				<select id="txtNombreTerminal" name="txtNombreTerminal" class="form-control" aria-describedby="nameHelp">
				<option></option>
				<?php 
				$result = mysqli_query($conexion,"SELECT ID,Nombre FROM tbterminal;");
				while ($row = mysqli_fetch_array($result)) 
				{
					echo "<option value=".$row['ID']." >"
					. $row['Nombre'] 
					. "</option>/n";
				}
?>
				</select>
              </div>
              <div class="col-md-6">
                <label for="txtAnden">Nombre de Anden</label>
                <input class="form-control" id="txtAnden" name="txtAnden" type="text" aria-describedby="nameHelp" placeholder="Ingrese el nombre del anden" maxlength="20">
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