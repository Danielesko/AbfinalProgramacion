<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JuegaConGalleta</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://www.tutorialspoint.com/jquery/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="css.css">

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary"> 
      <div style="background-color: #FF7000;" class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img src="https://www.zarla.com/images/zarla-juega-juega-1x1-2400x2400-20220201-dygdbh37r7qwqjxqtrj4.png?crop=1:1,smart&width=250&dpr=2" alt="Logo" width="50" height="50">
        </a>
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pages/foro.php">Foro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Snake/index.html">Snake</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="SimonDice/index.html">Simon dice</a>
            </li>
          </ul>
          <a class="navbar-brand" href="pages/iniciosesion.php">
            <img src="https://cdn.icon-icons.com/icons2/1863/PNG/512/account-circle_119476.png" alt="Mi cuenta" width="50" height="50">
          </a>
        </div>
      </div>
    </nav>
  </header>
  <?php
  include("funciones/funciones.php");
  mostrarTienda();
  ?>
<section id="carrito" class="text-center mx-auto my-5">
    <h2>Carrito</h2>
    <div id="itemsCarrito"></div>
    <div id="total"></div>
    <button class="btn btn-danger mt-3" onclick="vaciarCarrito()" style="background-color:#FF7000">Vaciar Carrito</button>
</section>
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
<script src="funciones/script.js"></script>
<script src="funciones/cesta.js"></script>

</html>