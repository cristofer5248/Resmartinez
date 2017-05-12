<?php
session_start(); //@ previene warning contra sesiones automáticas (no recomendado)
if(! isset($_SESSION["usuario"])){ 
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

	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<title>Empleado del mes</title>
</head>
<body>
<?php
include('estilopanel.php');
include('conexion.php');
?>

<div class="content-wrapper">
	<h4 class="title">Empleado del Mes</h4>
	<button class="btn btn-info" data-toggle="modal" data-target="#miventana">Nuevo</button>
<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<form action="action/insert.php">
    <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" placeholder="Nombre de platillo." name="nombre">
    <label for="Descripcion">Descripcion:</label>
		<textarea rows="4" cols="50" class="form-control" name="des" form="des">
		Ingrese una breve descripcion...</textarea>
		<label for="tipo" >Tipo:</label>
		<select class="form-control">
		<option value="0">Selección:</option>
		<?php
		$query = $mysqli -> query ("SELECT * FROM producto");
		while ($valores = mysqli_fetch_array($query)) {
		echo '<option value="'.$valores[IdProducto].'">'.$valores[nombre].'</option>';
		}	?>
		</select>
		<label for="precio">Precio real:</label>
		<input type="number" class="form-control" id="precior" name="precior">
		<label for="precio">Precio de venta:</label>
		<input type="number" class="form-control" id="preciov" name="preciov">
		<label for="categoria" >Categoria:</label>
		<select class="form-control">
		<option value="0">Selección:</option>
		<?php
		$query = $mysqli -> query ("SELECT * FROM categorias");
		while ($valores = mysqli_fetch_array($query)) {
		echo '<option value="'.$valores[IdCategoria].'">'.$valores[Nombre].'</option>';
		}	?>
		</select>
		<label for="imagen">Imagen:</label>
		<input type="file" class="form-control" id="imagen" name="imagen">
		<label for="fechav">fecha de vencimiento :</label>
		<input type="date" class="form-control" id="fechav" name="fechav">

    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
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
    <th>Precio de venta</th>
		<th>Precio real</th>
    <th>Ganancia</th>
    <th>Categoria</th>
		<th>imagen</th>
    <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <tr>


<?php
$query_select = "select  m.nombre, m.imagen, m.Descripcion,m.IdPlatillo,m.imagen, c.nombre as cnombre, p.precioc, p.preciov, p.ganacia,p.fechacompra,fechavencimiento from menu m inner join categorias c on m.categoria=c.idcategoria inner join Producto p on p.IdProducto=m.IdProducto";
$query_execute = $mysqli->query($query_select);
                    if($query_execute->num_rows){
                    ##PERFECTO!
                    }else{
                    echo 'NO HAY :(';
                    }
while($query_result = $query_execute->fetch_array())
{
    $Nombreplato = $query_result['nombre'];
    $url=$query_result['imagen'];
    $des=$query_result['Descripcion'];
    $codb=$query_result['IdPlatillo'];
    $categoria=$query_result['cnombre'];
    $preciov=$query_result['preciov'];
		$precioc=$query_result['precioc'];
		$ganacia=$query_result['ganacia'];
		$imagen=$query_result['imagen'];
    echo '
            <td>'.$Nombreplato.'.</td>
            <td>'.$des.'.</td>
            <td>'.$preciov.'</td>
						<td>'.$precioc.'</td>
						<td>'.$ganacia.'</td>
            <td>'.$categoria.'</td>
						<td>'.$imagen.'</td>

            <td><button type="button" class="btn btn-primary">Modificar</button>
            <button type="button" class="btn btn-danger">Eliminar</button></td>
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
