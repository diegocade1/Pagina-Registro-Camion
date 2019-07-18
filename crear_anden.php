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
				<a class="btn btn-primary btn-Dark" href="#" onclick="Insert()">Registrar</a>
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