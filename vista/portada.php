<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- our project just needs Font Awesome Solid + Brands -->
    <link href="fontawesome-free-6.7.1-web/css/fontawesome.css" rel="stylesheet" />
    <link href="fontawesome-free-6.7.1-web/css/brands.css" rel="stylesheet" />
    <link href="fontawesome-free-6.7.1-web/css/solid.css" rel="stylesheet" />

    <link rel="stylesheet" href="src_columna/estilos/estilos_barra_menu.css?v=<?php echo time();?>"></link>
    <link rel="stylesheet" href="src_columna/estilos/estilos_columna.css?v=<?php echo time();?>"></link>
    <title>Gestión de Instrumentos</title>
</head>

<body>

<nav id="barra_columna">

  <div class="wrapper">
    <div class="logo"><a href="#">SamControl</a></div>
    <input type="radio" name="slider" id="menu-btn">
    <input type="radio" name="slider" id="close-btn">
    <ul class="nav-links">
      <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
      <li><a href="index.php?t155">T155</a></li>
      <li><a href="index.php?logout">Cerrar sesión</a></li>
    </ul>
    <label for="menu-btn" class="btn menu-btn"><i class="fa-solid fa-bars"></i></label>
  </div>
</nav>

<div class="body-text">



    <div class="search-container">
        <input type="text" id="search-input" placeholder="Buscar instrumento">
        <button onclick="searchInstrument()">Buscar</button>
    </div>
    <div class="search-result" id="search-result"></div>

    <!-- Lista de plataformas -->
    

    <div class="column">
        <div></div>
        <div class="platform" onclick="showOptions(7)">PLATAFORMA 7</div>
        <div class="platform" onclick="showOptions(6)">PLATAFORMA 6</div>
        <div class="platform" onclick="showOptions(5)">PLATAFORMA 5</div>
        <div class="platform" onclick="showOptions(4)">PLATAFORMA 4</div>
        <div class="platform" onclick="showOptions(3)">PLATAFORMA 3</div>
        <div class="platform" onclick="showOptions(2)">PLATAFORMA 2</div>
        <div class="platform" onclick="showOptions(1)">PLATAFORMA 1</div>

        <div class="base" onclick="showOptions(8)">Base</div>
    </div>


<!-- Modal -->
<div class="modal" id="modal-register">
    <!-- Encabezado -->
    <div class="modal-header">
        <h2>Gestión de Instrumentos</h2>
    </div>
    <!-- Cuerpo -->
    <div class="modal-body">
        <ul id="instrument-list">
            <!-- Aquí se llenarán dinámicamente los instrumentos -->
        </ul>
    </div>
    <!-- Formulario -->
    <form id="instrument-form">
        <input type="text" id="instrument" name="nombre" placeholder="Nuevo instrumento" required>
        <button type="submit" class="estilo_button">Registrar</button>
    </form>
    <!-- Pie del Modal -->
    <div class="modal-footer" >
        <button onclick="closeModal()" class="estilo_button">Cerrar</button>
    </div>
</div>





</div>
</div>
    <script src="src_columna/javascript/js_columna.js?v=<?php echo time();?>"></script>
</body>
</html>