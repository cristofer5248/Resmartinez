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

	<title>Clientes en general</title>
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
if($_GET['op']=="a")
{echo '<script>swal({   title: "Exito!",
				 text: "Registro actualizado",
				 timer: 5000,
				 confirmButtonColor:	"#a90",
				 showConfirmButton: true });</script>';
}
if($_GET['op']=="d")
{echo '<script>swal({   title: "Exito!",
				 text: "Registro Eliminado",
				 timer: 5000,
				 confirmButtonColor:	"red",
				 showConfirmButton: true });</script>';
}
?>
<form name="opmd" action="action/crudcli.php" method="post">
<input type="text" value="" id="opm" name="opm" style="visibility:hidden">
<input type="text" value="" id="cod" name="cod" style="visibility:hidden">

</form>
<div class="content-wrapper">
	<h4 class="title">Clientes en general</h4>

	<button class="btn btn-info" data-toggle="modal" data-target="#miventana">Nuevo</button>
<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<form action="action/crudcli.php?opm=i" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Nombre de completo." name="nombre">
      <label for="nombre">Apellido:</label>
      <input type="text" class="form-control" id="apellido" placeholder="Apellido completo." name="apellido">
      <label for="nombre">Telefono:</label>
      <input type="text" class="form-control" id="telefono" name="telefono">
      <label for="nombre">Correo:</label>
      <input type="text" class="form-control" id="correo" name="correo">
      <label for="pass">Contraseña:</label>
      <input type="password" class="form-control" id="pass" name="pass">
      <label for="estado">Estado:</label>
      <select class="form-control" name="estado">
      <option value="0">Selección:</option>
      <?php
      $query = $mysqli -> query ("SELECT * FROM estado");
      while ($valores = mysqli_fetch_array($query)) {
      echo '<option value="'.$valores[idestado].'">'.$valores[nombre].'</option>';
      }	?>
    </select>
		</div>
    <label><input type="text" value="i" name="opm"style="visibility:hidden"></label><br>
    <button type="submit" class="btn btn-success">Procesar</button>
  </form>
	</div>
    </div>
</div>
</div>
 	<table class="table">
    <thead>
    <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Telefono</th>

    <th>correo</th>
    <th>estado</th>
    </tr>
    </thead>
    <tbody>
    <tr>
<?php
$query_select = "Select c.IdCliente, c.Nombre as nombrec, c.Apellido, c.Telefono, c.Correo, c.pass, e.Nombre from cliente c inner join estado e on c.estado=e.IdEstado";
$query_execute = $mysqli->query($query_select);
                    if($query_execute->num_rows){
                    ##PERFECTO!
                    }else{
                    echo 'NO HAY :(';
                    }
while($query_result = $query_execute->fetch_array())
{
		$idp = $query_result['IdCliente'];
    $nombrecli = $query_result['nombrec'];
    $apellido=$query_result['Apellido'];
    $telefono=$query_result['Telefono'];
    $correo=$query_result['Correo'];
    $estado=$query_result['Nombre'];

		echo '	<td>'.$nombrecli.'.</td>
            <td>'.$apellido.'</td>
            <td>'.$telefono.'</td>
            <td>'.$correo.'.</td>
            <td>'.$estado.'.</td>
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
