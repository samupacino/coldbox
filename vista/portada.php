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
        <li><a href="pl2" onclick="seleccion_planta(event)">PL2</a></li>
        <li><a href="t155"  onclick="seleccion_planta(event)">T155</a></li>
        <li><a href="index.php?action=logout">Cerrar sesión</a></li>
        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fa-solid fa-bars"></i></label>
    </div>
    </nav>

 
   
    <div class="body-text">
       
    </div> 

    <script src="src_columna/javascript/js_columna.js?v=<?php echo time();?>"></script>
    <script>

    </script>
</body>
</html>