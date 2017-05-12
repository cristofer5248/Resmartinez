

<!DOCTYPE html>
<html class="no-js">
<script src="js/sweetalert.min.js"></script> <!-- Sweet alert -->
<link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
    <?php
    include('/estilos/estilo.php');
    include('/estilos/about.html');
    include('menu.php');
    if($_GET['opm']=="si")
    {echo '<script>swal({   title: "Error!",
    				 text: "Usuario incorrecto",
    				 timer: 5000,
    				 confirmButtonColor:	"red",
    				 showConfirmButton: true });</script>';
    }
    if($_GET['opm']=="y")
    {echo '<script>swal({   title: "Correcto!",
    				 text: "Sesion iniciada",
    				 timer: 5000,
    				 confirmButtonColor:	"blue",
    				 showConfirmButton: true });</script>';
    }
    if($_GET['opm']=="i")
    {echo '<script>swal({   title: "Hola! :)",
             text: "Inicia sesion para ordenar",
             timer: 5000,
             confirmButtonColor:	"blue",
             showConfirmButton: true });</script>';
    }
    if($_GET['opm']=="p")
    {echo '<script>swal({   title: "Felicidades! :)",
             text: "El pedido fue agregado :D",
             timer: 5000,
             confirmButtonColor:	"blue",
             showConfirmButton: true });</script>';
    }
    if($_GET['opm']=="not")
    {echo '<script>swal({   title: "Alto! :)",
             text: "Tu usuario debe ser activado por un el administrador o cajero :O",
             timer: 5000,
             confirmButtonColor:	"blue",
             showConfirmButton: true });</script>';
    }
    if($_GET['opm']=="ua")
    {echo '<script>swal({   title: "Te haz registrado! :)",
             text: "Pide a un empleado que active tu usuario :D",
             timer: 5000,
             confirmButtonColor:	"blue",
             showConfirmButton: true });</script>';
    }


    ?>

		<!-- <div id="fh5co-featured" data-section="features">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate">Featured Dishes</h2>
						<p class="sub-heading to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="fh5co-grid">
						<div class="fh5co-v-half to-animate-2">
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_1.jpg)"></div>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2>Fresh Mushrooms</h2>
								<span class="pricing">$7.50</span>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							</div>
						</div>
						<div class="fh5co-v-half">
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_2.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2>Grilled Chiken Salad</h2>
									<span class="pricing">$12.00</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
							<div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_8.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-right">
									<h2>Cheese and Garlic Toast</h2>
									<span class="pricing">$4.50</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
						</div>

						<div class="fh5co-v-half">
							<div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_7.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-right">
									<h2>Organic Egg</h2>
									<span class="pricing">$4.99</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_6.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2>Salad with Crispy Chicken</h2>
									<span class="pricing">$8.50</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
						</div>
						<div class="fh5co-v-half to-animate-2">
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/res_img_3.jpg)"></div>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2>Tomato Soup with Chicken</h2>
								<span class="pricing">$12.99</span>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>

		<div id="fh5co-type" style="background-image: url(images/slide_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-3 to-animate">
						<div class="fh5co-type">
							<h3 class="with-icon icon-1">Fruits</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-3 to-animate">
						<div class="fh5co-type">
							<h3 class="with-icon icon-2">Sea food</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-3 to-animate">
						<div class="fh5co-type">
							<h3 class="with-icon icon-3">Vegetables</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-3 to-animate">
						<div class="fh5co-type">
							<h3 class="with-icon icon-4">Meat</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
  -->



		<div id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate">Registrate como cliente></h2>
						<p class="sub-heading to-animate">Si te registrar puedes ser el afortudado de muchas promociones.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 to-animate-2">
						<h3>Informacion de contacto</h3>
						<ul class="fh5co-contact-info">
							<li class="fh5co-contact-address ">
								<i class="icon-home"></i>
								5555 Love Paradise 56 New Clity 5655, <br>Excel Tower United Kingdom
							</li>
							<li><i class="icon-phone"></i> (503) 75315433</li>
							<li><i class="icon-envelope"></i>martinezrestaurante@gmail.com</li>
							<li><i class="icon-globe"></i> <a href="http://freehtml5.co/" target="_blank">RestauranteMartinez.com</a></li>
						</ul>
					</div>
					<div class="col-md-6 to-animate-2">
						<h3>Formulario de registro</h3>
						<div class="form-group ">
              <form action="action/crudcli.php" method="post" enctype="multipart/form-data">
							<label for="name" class="sr-only">Nombre</label>
							<input id="name" class="form-control" name="nombre" placeholder="Nombre" type="text">
							<label for="name" class="sr-only">Apellidos</label>
							<input id="name" name="apellido" class="form-control" placeholder="Apellidos completos" type="text">
							<label for="date" class="sr-only">Correo</label>
							<input id="mail" name="correo" class="form-control" placeholder="Correo eletronico" type="text">
            	<label for="telefono" class="sr-only">Telefono</label>
							<input id="name" name="telefono" class="form-control" placeholder="Numero de telefono movil" type="text">
            	<label for="message" class="sr-only">Contraseña</label>
							<input id="password" name="pass" class="form-control" type="password" placeholder="Contraseña"></input>
						  <label><input type="text" value="i" name="opm"style="visibility:hidden"></label><br>
						<input class="btn btn-primary" value="Enviar" type="submit">
          </form>
						</div>
						</div>
				</div>
			</div>
		</div>
<div data-section="login">
<div class="container">
  <div class="form-horizontal" >
  <div class="form-group ">
    <h3>Iniciar sesion</h3>
    <form action="seguridad/autenticacion.php" method="post" enctype="multipart/form-data">
    <label for="name" class="sr-only">Usuario</label>
    <input id="name" class="form-control" name="usuario" placeholder="Usuario" type="text">
  </div>
  <div class="form-group ">
    <label for="name" class="sr-only">Contraseña</label>
    <input id="name" class="form-control" name="pass2" placeholder="Contraseña" type="text">
    <label><input type="text" value="l" name="opm2"style="visibility:hidden"></label><br>
  </div>
  <div class="form-group ">
    <input class="btn btn-primary" value="Enviar" type="submit">
  </div>
</form>
</div>
</div>
</div>



	<div id="fh5co-footer">
		<div class="container">
			<div class="row row-padded">
				<div class="col-md-12 text-center">
					<p class="to-animate">&copy; 2017 Christopher Elias Maldonado. <br> Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a>
					</p>
					<p class="text-center to-animate"><a href="seguridad/cerrarcli.php">Cerrar sesion</a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="fh5co-social">
						<li class="to-animate-2"><a href="#"><i class="icon-facebook"></i></a></li>
						<li class="to-animate-2"><a href="#"><i class="icon-twitter"></i></a></li>
						<li class="to-animate-2"><a href="#"><i class="icon-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>






	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Bootstrap DateTimePicker -->
	<script src="js/moment.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<script>
		$(function () {
	       $('#date').datetimepicker();
	   });
	</script>
	<!-- Main JS -->
	<script src="js/main2.js"></script>

	</body>
</html>
