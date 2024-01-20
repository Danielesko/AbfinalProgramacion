<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JuegaConGalleta</title>
	<link rel="stylesheet" href="../css.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://www.tutorialspoint.com/jquery/jquery-3.6.0.js"></script>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
			<div style="background-color: #FF7000;" class="container-fluid">
				<a class="navbar-brand" href="../index.php">
					<img src="https://www.zarla.com/images/zarla-juega-juega-1x1-2400x2400-20220201-dygdbh37r7qwqjxqtrj4.png?crop=1:1,smart&width=250&dpr=2" alt="Logo" width="50" height="50">
				</a>
				<button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="foro.php">Foro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../Snake/index.html">Snake</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../SimonDice/index.html">Simon dice</a>
						</li>
					</ul>
					<a class="navbar-brand" href="iniciosesion.php">
						<img src="https://cdn.icon-icons.com/icons2/1863/PNG/512/account-circle_119476.png" alt="Mi cuenta" width="50" height="50">
					</a>
				</div>
			</div>
		</nav>
	</header>
	<?php
	if (!isset($_COOKIE['id'])) {
	?>
		<div class="section">
			<div class="container">
				<div class="row full-height justify-content-center">
					<div class="col-12 text-center align-self-center py-5">
						<div class="section pb-5 pt-5 pt-sm-2 text-center">
							<h6 class="mb-0 pb-3">
								<span>Inicio Sesión </span><span>Registro</span>
							</h6>
							<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" /> <label for="reg-log"></label>
							<div class="card-3d-wrap mx-auto">
								<div class="card-3d-wrapper">
									<div class="card-front">
										<div class="center-wrap">
											<div class="section text-center">
												<h4 class="mb-4 pb-3">Inicio Sesión</h4>
												<div class="form-group">
													<input type="text" name="correo" class="form-style" placeholder="Tu correo electronico" id="correo" autocomplete="off">
												</div>
												<div class="form-group mt-2">
													<input type="password" name="contrasenaInicio" class="form-style" placeholder="Tu contraseña" id="contrasenaInicio" autocomplete="off">
												</div>
												<button id="botoninicio" class="btn mt-4" style='background-color: #333; color: white'>Iniciar
													sesión</button>
												<p id="respuestainicio"></p>
											</div>
										</div>
									</div>
									<div class="card-back">
										<div class="center-wrap">
											<div class="section text-center">
												<h4 class="mb-4 pb-3">Registro</h4>
												<div class="form-group mt-2">
													<input type="email" name="correoRegistro" class="form-style" placeholder="Tu correo electronico" id="correoRegistro" autocomplete="off">
												</div>
												<div class="form-group mt-2">
													<input type="password" name="contrasenaRegistro" class="form-style" placeholder="Tu contraseña" id="contrasenaRegistro" autocomplete="off">
												</div>
												<button id="botonregistro" class="btn mt-4" style='background-color: #333; color: white'>Registrarse</button>
												<p id="respuestaregistro"></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	} else {
		if ($_COOKIE['id'] == 1) {
			include("../funciones/funciones.php");
			mostrarUsu();
		?>
			<script>
				function borrar(id) {
					let peticion = $.ajax({
						url: "../funciones/funciones.php",
						type: "POST",
						data: {
							id: id
						},
						async: true,
						success: function(data) {
							if (data == "false") {
								alert("No se ha podido eliminar");
							} else {
								alert("Eliminado");
							}
						},
						error: function(data) {
							alert("Error en la trasmision");
						}
					})
				}

				function modificar(idmod) {
					let actualizado = prompt("Escribe el nuevo correo electronico");
					let peticion = $.ajax({
						url: "../funciones/funciones.php",
						type: "POST",
						data: {
							idmod: idmod,
							actualizado,
							actualizado
						},
						async: true,
						success: function(data) {
							if (data == "false") {
								alert("No se ha podido modificar");
							} else {
								alert("Modificado");
								location.reload();
							}
						},
						error: function(data) {
							alert("Error en la trasmision");
						}
					})
				}
			</script>
		<?php
		} else {
		}
		?>
		<button id="borrarcookie" style="margin-top:3%">Cerrar sesion</button>
	<?php
	}
	?>
	  <footer class="text-center text-lg-start text-white" style="background-color: #FF7000">
    <section class="d-flex justify-content-between p-4" style="background-color: #ff9900">
      <div class="me-5">
        <span>Redes Sociales:</span>
      </div>
      <div>
        <a href="" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-github"></i>
        </a>
      </div>
    </section>
    <section>
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold"><a  style="color: white;" href="">Quienes somos</a></h6>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold"><a style="color: white;" href="">Contacto</a></h6>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold"><a style="color: white;" href="">Política privacidad</a></h6>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold"><a style="color: white;" href="">Política cookies</a></h6>
          </div>
        </div>
      </div>  
    </section>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2023 Copyright:
      <a class="text-white" href="index.php">JuegaConGalleta</a>
    </div>
  </footer>
</body>
<script src="../funciones/script.js"></script>

</html>