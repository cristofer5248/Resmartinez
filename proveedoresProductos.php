<?php
@session_start(); //@ previene warning contra sesiones automáticas (no recomendado)
if(! isset($_SESSION["usuarioe"])){
   header( "refresh:0; index.php");
    exit;
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Resource style -->
	<script src="js/sweetalert.min.js"></script> <!-- Sweet alert -->
	<link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<title>Productos - Bodega</title>
</head>
<body>
<?php
include('estilopanel.php');
include('conexion.php');
if($_GET['op']=="i")
{echo '<script>swal({   title: "Exito!",
				 text: "Registro agregado",
				 timer: 5000,
				 confirmButtonColor:	"#a90",
				 showConfirmButton: true });</script>';
}
if($_GET['op']=="a"){
         echo '<script>swal({   title: "Exito!",
				 text: "Registro actualizado",
				 timer: 5000,
				 confirmButtonColor:	"#a90",
				 showConfirmButton: true });</script>';}
if($_GET['op']=="not"){
          echo '<script>swal({   title: "Error!",
          text: "No se puede eliminar, Este producto se encuentra en el menu actualmente",
          timer: 7000,
          confirmButtonColor:	"#a90",
          showConfirmButton: true });</script>';}
if($_GET['op']=="e"){
          echo '<script>swal({   title: "Exito`!",
          text: "Se ha eliminado el registro",
          timer: 5000,
          confirmButtonColor:	"#a90",
          showConfirmButton: true });</script>';}

          ?>
?>
<form name="opmd" action="action/crudprod.php" method="post">
<input type="text" value="" id="opm" name="opm" style="visibility:hidden">
<input type="text" value="" id="cod" name="cod" style="visibility:hidden">

</form>
<div class="content-wrapper">
	<h4 class="title">Productos - Bodega</h4>

	<button class="btn btn-info" data-toggle="modal" data-target="#miventana">Nuevo</button>
<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<form action="action/crudpro.php" method="post">
    <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" placeholder="Nombre de platillo." name="nombre">
    <label for="direccion">Direccion:</label>
    <input type="text" class="form-control" placeholder="Nombre del proveedor." name="direccion">
		<label for="Telefono" >Telefono:</label>
    <input type="text" class="form-control" placeholder="Telefono de contacto." name="telefono">
		</div>
    <label>
    <input type="text" value="i" name="opm"style="visibility:hidden"></label><br>
    <button type="submit" class="btn btn-success">Procesar</button>
  </form>
	</div>
    </div>
</div>
</div>
 	<table class="table">
    <thead>
    <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Fecha de compra</th>
    <th>Fecha de venta</th>
    <th>precio de compra</th>
    <th>precio de venta</th>
    <th>Proveedor</th>
    <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <tr>
<?php
  $query_select = "select pr.Nombre as nombreprov, p.IdProducto, p.nombre as nombrep, p.fechacompra, p.fechavencimiento, i.Precio, i.precioventa from producto p inner join insumo i on i.IdInsumo=p.idinsumo inner join proveedores pr on pr.IdProveedor=i.IdProveedor";
  $query_execute = $mysqli->query($query_select);
                    if($query_execute->num_rows){
                    ##PERFECTO!
                    }else{
                    echo 'NO HAY :(';
                    }
while($query_result = $query_execute->fetch_array())
{
		$idp = $query_result['IdProducto'];
    $nombrepro = $query_result['nombrep'];
    $fechac=$query_result['fechacompra'];
    $fechav=$query_result['fechavencimiento'];
    $precio=$query_result['Precio'];
    $preciov=$query_result['precioventa'];
    $nombreprov=$query_result['nombreprov'];

		echo '	<td>'.$idp.'.</td>
            <td>'.$nombrepro.'.</td>
            <td>'.$fechac.'</td>
            <td>'.$fechav.'</td>
            <td>'.$precio.'</td>
            <td>'.$preciov.'</td>
            <td>'.$nombreprov.'</td>
						<td><input type="button" value="Modificar" class="btn btn-primary" onClick="';
						echo "alert('hola');
						document.getElementById('opm').value = 'a';
						document.getElementById('cod').value = '".$idp."';
						document.opmd.submit();
						";
						echo '
						">
            <input type="button" class="btn btn-danger" value="Eliminar" class="btn btn-danger" onClick="';
		echo "
						swal({
						  title: '¿Esta seguro?',
						  text: 'Eliminara por completo el registro selecionado!',
						  type: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#DD6B55',
						  confirmButtonText: 'Si, Deseo borrarlo!',
						  cancelButtonText: 'No',
						  closeOnConfirm: false,
						  closeOnCancel: false
						},
						function(isConfirm){
						  if (isConfirm) {
						    swal('Deleted!', 'Registro eliminado.', 'success');
								document.getElementById('opm').value = 'd';
								document.getElementById('cod').value = '".$idp."';
									document.opmd.submit();
							} else {
						    swal('Cancelado', 'Cambios descartados :)', 'error');
						  }
						});";
		echo '"></td>
						</tr>';
}
?>
</div>

	</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
