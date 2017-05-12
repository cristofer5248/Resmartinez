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

	<title>Menu</title>
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
?>
<form name="opmd" action="action/insert.php" method="post">
<input type="text" value="" id="opm" name="opm" style="visibility:hidden">
<input type="text" value="" id="cod" name="cod" style="visibility:hidden">

</form>
<div class="content-wrapper">
	<h4 class="title">Menu de platillos</h4>

	<button class="btn btn-info" data-toggle="modal" data-target="#miventana">Nuevo</button>
<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<form action="action/insert.php?opm=i" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" placeholder="Nombre de platillo." name="nombre">
    <label for="Descripcion">Descripcion:</label>
		<textarea rows="4" cols="50" class="form-control" name="des"></textarea>
		<label for="tipo" >Producto:</label>
		<select class="form-control" name="tipo">
		<option value="0">Selección:</option>
		<?php
		$query = $mysqli -> query ("SELECT * FROM producto");
		while ($valores = mysqli_fetch_array($query)) {
		echo '<option value="'.$valores[IdProducto].'">'.$valores[nombre].'</option>';
		}	?>
	</select>
    <a href="producto.php">Ingresar nuevo tipo</a><br>
		<label for="precio">Precio:</label>
		<input type="number" class="form-control" id="precior" name="preciov" step="any">
		<label for="categoria" >Categoria:</label>
		<select class="form-control" name="categoria">
		<option value="0">Selección:</option>
		<?php
		$query = $mysqli -> query ("SELECT * FROM categorias");
		while ($valores = mysqli_fetch_array($query)) {
		echo '<option value="'.$valores[IdCategoria].'">'.$valores[Nombre].'</option>';
		}	?>
	</select><a href="producto.php">Ingresar nueva categoria</a><br>
		<label for="imagen">Imagen:</label>
		<input type="file" class="form-control" id="imagen" name="foto" />
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
    <th>Descripcion</th>
    <th>Precio</th>

    <th>Categoria</th>
		<th>imagen</th>
    <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <tr>
<?php
$tipo = "";
if($_GET['tip']=='Bebidas')
{$tipo= "Bebida";
  $query_select = "select  m.idplatillo,m.nombre, m.imagen, m.Descripcion,m.IdPlatillo,m.imagen, c.nombre as cnombre, m.precio,p.fechacompra,fechavencimiento from menu m inner join categorias c on m.categoria=c.idcategoria inner join Producto p on p.IdProducto=m.IdProducto where c.Nombre='".$tipo."'";
  }
if($_GET['tip']=='Postres')
{$tipo= "Postres";
  $query_select = "select  m.idplatillo,m.nombre, m.imagen, m.Descripcion,m.IdPlatillo,m.imagen, c.nombre as cnombre, m.precio,p.fechacompra,fechavencimiento from menu m inner join categorias c on m.categoria=c.idcategoria inner join Producto p on p.IdProducto=m.IdProducto where c.Nombre='".$tipo."'";
}
if($_GET['tip']=='x')
{$tipo= "nada";
  $query_select = "select  m.idplatillo,m.nombre, m.imagen, m.Descripcion,m.IdPlatillo,m.imagen, c.nombre as cnombre, m.precio,p.fechacompra,fechavencimiento from menu m inner join categorias c on m.categoria=c.idcategoria inner join Producto p on p.IdProducto=m.IdProducto";
}
if($_GET['tip']=='Precios')
{
  $query_select = "select  m.idplatillo,m.nombre, m.imagen, m.Descripcion,m.IdPlatillo,m.imagen, c.nombre as cnombre, m.precio,p.fechacompra,fechavencimiento from menu m inner join categorias c on m.categoria=c.idcategoria inner join Producto p on p.IdProducto=m.IdProducto ORDER BY precio DESC";
}

$query_execute = $mysqli->query($query_select);
                    if($query_execute->num_rows){
                    ##PERFECTO!
                    }else{
                    echo 'NO HAY :(';
                    }
while($query_result = $query_execute->fetch_array())
{
		$idp = $query_result['idplatillo'];
    $Nombreplato = $query_result['nombre'];
    $url=$query_result['imagen'];
    $des=$query_result['Descripcion'];
    $codb=$query_result['IdPlatillo'];
    $categoria=$query_result['cnombre'];
		$precioc=$query_result['precio'];
		$imagen=$query_result['imagen'];

		echo '	<td>'.$Nombreplato.'.</td>
            <td>'.$des.'.</td>
            <td>'.$precioc.'</td>

            <td>'.$categoria.'</td>
						<td><img src="images/'.$imagen.'" height="100" width="200"></td>
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
