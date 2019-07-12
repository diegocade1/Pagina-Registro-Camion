<?php session_start();

	if(!isset($_SESSION['usuario']))
{
		header("location: login.html?Iniciar%20%sesion%20primero");
		die();
}
$pageTitulo = 'Index';
include 'header.php';

?>
<div class="content-wrapper">
    <div class="container-fluid">

    </div>
	<!-- /.container-fluid-->
</div> 
<!-- /.content-wrapper-->
<?php 
	include 'footer.php';
?>