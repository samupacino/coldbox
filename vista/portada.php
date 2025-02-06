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
    <link rel="stylesheet" href="src_columna/estilos/titulo.css?v=<?php echo time();?>"></link>
    <link rel="stylesheet" href="src_columna/estilos/estilos_quimica.css?v=<?php echo time();?>"></link>
    <title>Gestión de Instrumentos</title>
</head>

<body>

    <nav id="barra_columna">

    <div class="wrapper">
        <div class="container">

        <div class="box">
            <div class="title">
                <span class="block"></span>
                <h1><?php echo ucwords($_SESSION['name_complete']);?><span></span></h1>
            </div>
        </div>

        </div>  
       
        <input type="radio" name="slider" id="menu-btn">
        <input type="radio" name="slider" id="close-btn">
        <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="quimica" onclick="seleccion_planta(event)">CALCULO</a></li>
        <li><a href="pl2" onclick="seleccion_planta(event)">PL2</a></li>
        <li><a href="t155"  onclick="seleccion_planta(event)">T155</a></li>
        <li><a href="index.php?action=logout&planta">Cerrar sesión</a></li>
        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fa-solid fa-bars"></i></label>
    </div>
    </nav>

 
   
    <div class="body-text">
       
    </div> 

    <script src="src_columna/javascript/js_columna.js?v=<?php echo time();?>"></script>
    <script>
   
 
        function calculateMolarMass() {
            const atomicMasses = {
                'H': 1.008, 'He': 4.0026, 'Li': 6.94, 'Be': 9.0122,
                'B': 10.81, 'C': 12.01, 'N': 14.007, 'O': 15.999,
                'F': 18.998, 'Ne': 20.180, 'Ar': 39.948
            };

            const formula = document.getElementById('formula').value.trim();

            if (!formula) {
                document.getElementById('result').textContent = "Por favor, introduce una fórmula química válida.";
                return;
            }

            let molarMass = 0;
            const matches = formula.match(/([A-Z][a-z]*)(\d*)/g);

            if (!matches) {
                document.getElementById('result').textContent = "Fórmula inválida.";
                return;
            }

            try {
                for (let match of matches) {
                    const elementMatch = match.match(/([A-Z][a-z]*)(\d*)/);
                    if (elementMatch) {
                        let element = elementMatch[1];
                        let quantity = elementMatch[2] ? parseInt(elementMatch[2]) : 1;

                        if (atomicMasses[element]) {
                            molarMass += atomicMasses[element] * quantity;
                        } else {
                            throw `Elemento desconocido: ${element}`;
                        }
                    }
                }

                document.getElementById('result').textContent = `La masa molar de ${formula} es ${molarMass.toFixed(3)} g/mol.`;
            } catch (error) {
                document.getElementById('result').textContent = error;
            }
        }

        function calculateDensity() {
           
            // Obtener los valores del formulario
            const pressure = parseFloat(document.getElementById('pressure').value);
            const molarMass = parseFloat(document.getElementById('molarMasa').value);
            var temperature = parseFloat(document.getElementById('temperature').value);
            const R = 0.08206; // Constante universal de los gases

           
            // Validar que los valores sean válidos
            if (isNaN(pressure) || isNaN(molarMass) || isNaN(temperature) || pressure <= 0 || molarMass <= 0 || temperature <= 0) {
            
                document.getElementById('result_densidad').textContent = "Por favor, ingresa valores válidos para todos los campos.";
                return;
            }

            // Calcular la densidad
            temperature = temperature + 273.15;
            const density = (pressure * molarMass) / (R * temperature);
      
            // Mostrar el resultado
            document.getElementById('result_densidad').textContent = `La densidad del gas es: ${density.toFixed(3)} g/L.`;
        }


        function calculateAtomicMass() {
          
            const molarMass = parseFloat(document.getElementById('molarMasa').value);
            const avogadroNumber = 6.02214076e23;

            if (isNaN(molarMass) || molarMass <= 0) {
                document.getElementById('result_atomic').textContent = "Por favor, ingresa una masa molar válida.";
                return;
            }

            // Cálculo de la masa de un átomo en gramos
            const atomicMass = molarMass / avogadroNumber;

            // Mostrar el resultado
            document.getElementById('result_atomic').textContent = `La masa de un átomo de este elemento es aproximadamente ${atomicMass.toExponential(6)} g.`;

            // Cálculo de la equivalencia de 1 u en kilogramos
            const equivalence = (atomicMass / 12) / 1000;
            document.getElementById('equivalence').textContent = `1 u ≈ ${equivalence.toExponential(6)} kg.`;
        }

        
        function calculateArgonConversion() {
            // Obtener valores ingresados por el usuario
            const densityLiquid = parseFloat(document.getElementById('densityLiquid').value);
            const volumeLiquid = parseFloat(document.getElementById('volumeLiquid').value);
            const densityGas = parseFloat(document.getElementById('densityGas').value);

            // Validación de entrada
            if (isNaN(densityLiquid) || isNaN(volumeLiquid) || isNaN(densityGas) || densityLiquid <= 0 || volumeLiquid <= 0 || densityGas <= 0) {
                document.getElementById('gasResult').textContent = "Por favor, ingresa valores válidos para todos los campos.";
                return;
            }

            // Cálculo del volumen del gas
            const volumeGas = (densityLiquid * volumeLiquid) / densityGas;

            // Mostrar resultado del volumen de gas
            document.getElementById('gasResult').textContent = `El volumen del gas es: ${volumeGas.toFixed(3)} m³.`;

            // Datos para el argón
            const densityArgonLiquid = 1400; // Densidad del argón líquido en kg/m³

            // Cálculo de cuánto gas equivale a 1 kg de argón líquido
            const volumeLiquidArgon = 1 / densityArgonLiquid; // Volumen de 1 kg de argón líquido en m³
            const equivalentGasVolume = (densityArgonLiquid * volumeLiquidArgon) / densityGas;

            // Mostrar resultado del volumen de gas equivalente a 1 kg de argón líquido
            document.getElementById('argonResult').textContent = `1 kg de argón líquido equivale a ${equivalentGasVolume.toFixed(3)} m³ de gas.`;
        }

    </script>
</body>
</html>