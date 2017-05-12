<?php
@session_start(); //@ previene warning contra sesiones automáticas (no recomendado)
?>
		<div id="fh5co-menus" data-section="menu">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate">Date un gusto</h2>
						<p class="sub-heading to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>

<div class="row row-padded">
<div class="col-md-6">
<div class="fh5co-food-menu to-animate-2">
<h2 class="fh5co-drinks">Bebidas</h2>
<?php
include('conexion.php');
$query_select = "select  m.nombre as nombrem, m.imagen, m.descripcion, m.precio, m.IdPlatillo from menu m inner join categorias c on m.categoria=c.IdCategoria where c.nombre='Bebida'";
$query_execute = $mysqli->query($query_select);
                    if($query_execute->num_rows){
                    ##PERFECTO!
                    }else{
                    echo 'NO HAY :(';
                    }
while($query_result = $query_execute->fetch_array())
{
	$Nombreplato = $query_result['nombrem'];
	$url=$query_result['imagen'];
	$des=$query_result['descripcion'];
	$precio=$query_result['precio'];
	$codb=$query_result['IdPlatillo'];
	echo '<ul>
	<li>
		<div class="fh5co-food-desc">
				<figure><img src="images/'.$url.'" class="img-responsive"></figure>
		<div>
			<h3>'.$Nombreplato.'.</h3>
			<p>'.$des.'.</p>
			</div></div>
			<div class="fh5co-food-pricing">
			<a title="Los Tejos" href="pedidomenu.php" onClick="alert("hola");" >$'.$precio.' <img src="images/pedir.png" class="img-responsive" heigth="80" width="80" alt=""></a>
			';
			echo '
			<input type="button" class="btn btn-primary" value="Ordenar" class="btn btn-primary" onClick="';
			echo "
			swal({
				title: '¿Esta seguro?',
				text: 'Esto agregara un nuevo pedido a nombre suyo!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Si, Deseo Agregalo!',
				cancelButtonText: 'No',
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
				if (isConfirm) {
					swal('Deleted!', 'Pedido realizado.', 'success');
					window.location = 'action/pedido.php?cod=$codb';
				} else {
					swal('Cancelado', 'Cambios descartados :)', 'error');
				}
			});";
			echo '"></td>
			</tr>
			</div>
			</li>;
			';








}
echo '</div></div>';
echo '<div class="col-md-6">
		<div class="fh5co-food-menu to-animate-2">
		<h2 class="fh5co-dishes">Almuerzos</h2>
			<ul><li>';

$query_select = "select  m.nombre as nombrem, m.imagen, m.descripcion, m.precio, m.IdPlatillo from menu m inner join categorias c on m.categoria=c.IdCategoria where c.nombre='Almuerzo'";
$query_execute = $mysqli->query($query_select);
                    if($query_execute->num_rows){
                    ##PERFECTO!
                    }else{
                    echo 'NO HAY :(';
                    }
while($query_result = $query_execute->fetch_array())
{
	$Nombreplato = $query_result['nombrem'];
	$url=$query_result['imagen'];
	$des=$query_result['descripcion'];
	$precio=$query_result['precio'];
	$codb=$query_result['IdPlatillo'];

echo'
		<div class="fh5co-food-desc">
		<figure><img src="images/'.$url.'" class="img-responsive"></figure>
		<div><h3>'.$Nombreplato.'</h3>
			<p>'.$des.'</p>
			</div>
			</div>
			<div class="fh5co-food-pricing">
			<a title="Los Tejos" href="action/crudpedido.php?opm=x">$'.$precio.' <img src="images/pedir.png" class="img-responsive" heigth="80" width="80" alt=""></a>
			</div>
			</li>';

}
?>
</div>
	</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center to-animate-2">
						<p><a href="#" class="btn btn-primary btn-outline">SUBIR</a></p>
					</div>
				</div>
			</div>
		</div>
