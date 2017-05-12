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
  <?php if($_GET['tip']=="ac"){echo'<title>Pedidos Activos</title>';}
  else{echo'<title>Pedidos pendientes</title>';}?>

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
<form name="opmd" action="action/crudpedido.php" method="post">
<input type="text" value="" id="opm" name="opm" style="visibility:hidden">
<input type="text" value="" id="cod" name="cod" style="visibility:hidden"></form>

<div class="content-wrapper">
  <?php if($_GET['tip']=='ac'){echo '<h4 class="title">Pedidos Activos</h4>';}
  else{echo'<h4 class="title">Pedidos</h4>';}?>


 	<table class="table">
    <thead>
    <tr>
      <td>Id</td>
      <td>Cliente</td>
      <td>Pedido</td>
      <td>Fecha</td>
      <td>Hora</td>
      <td>Estado</td>
    <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <tr>


<?php
if($_GET['tip']=="ac"){
$query_select = "select c.nombre as nombrec, p.IdPedido, p.estado, p.Fecha, p.hora, p.Idempleado, m.IdPlatillo, e.nombre as estado, m.Nombre from pedido p inner join menu m ON m.IdPlatillo=p.pedido inner join cliente c on c.IdCliente=p.IdCliente inner join estado e on e.idestado=p.estado where e.nombre='ACTIVO'";
}else{
$query_select = "select c.nombre as nombrec, p.IdPedido, p.estado, p.Fecha, p.hora, p.Idempleado, m.IdPlatillo, e.nombre as estado, m.Nombre from pedido p inner join menu m ON m.IdPlatillo=p.pedido inner join cliente c on c.IdCliente=p.IdCliente inner join estado e on e.idestado=p.estado where e.nombre='PENDIENTE'";}
$query_execute = $mysqli->query($query_select);
                    if($query_execute->num_rows){
                    ##PERFECTO!
                    }else{
                    echo 'NO HAY :(';
                    }
while($query_result = $query_execute->fetch_array())
{
    $Nombreplato = $query_result['Nombre'];
    $idp=$query_result['IdPedido'];
    $Fecha=$query_result['Fecha'];
    $Hora=$query_result['hora'];
    $Idempleado=$query_result['Idempleado'];
    $IdPlatillo=$query_result['IdPlatillo'];
    $nombrecliente=$query_result['nombrec'];
    $estado=$query_result['estado'];
    echo '
            <td>'.$idp.'.</td>
            <td>'.$nombrecliente.'.</td>
            <td>'.$Nombreplato.'.</td>
            <td>'.$Fecha.'</td>
						<td>'.$Hora.'</td>
						<td>'.$estado.'</td>';
            if($_GET['tip']=="x"){
            echo '<td><input type="button" value="Activar" class="btn btn-success" onClick="';
            echo "document.getElementById('opm').value='ac';";
            }else{echo '<td><input type="button" value="Entregar" class="btn btn-success" onClick="';
            echo "document.getElementById('opm').value = 'entre';";}
            echo "
            document.getElementById('cod').value = '".$idp."';
            document.opmd.submit();
            ";
            echo '
            ">
            <input type="button" value="Modificar" class="btn btn-primary" onClick="';
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
