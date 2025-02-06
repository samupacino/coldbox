<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Volumen de Gas y Conversión de Argón</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .argon-calculator-container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #0056b3;
        }

        .argon-section {
            margin: 20px 0;
        }

        .argon-section h3 {
            color: #0078d4;
        }

        .argon-section p, .argon-section ul {
            font-size: 1rem;
            line-height: 1.6;
        }

        .argon-section ul {
            margin-left: 20px;
        }

        .argon-formula {
            font-family: 'Courier New', Courier, monospace;
            background-color: #eef6fc;
            padding: 10px;
            border-left: 4px solid #0078d4;
            margin: 20px 0;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #0078d4;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #005bb5;
        }

        .argon-result {
            font-weight: bold;
            color: #4caf50;
            text-align: center;
            margin-top: 20px;
        }

        .argon-highlight {
            font-weight: bold;
            color: #ff5722;
        }
    </style>
</head>
<body>

    <div class="argon-calculator-container">
        <h2>Calculadora de Volumen de Gas y Conversión de Líquido de Argón</h2>

        <div class="argon-section">
            <h3>Explicación de la Ecuación</h3>
            <p>La relación entre las densidades de un líquido y un gas, cuando ocupan volúmenes relacionados, se describe mediante la siguiente ecuación:</p>
            <div class="argon-formula">
                <strong>&rho;<sub>líquido</sub> ⋅ V<sub>líquido</sub> = &rho;<sub>gas</sub> ⋅ V<sub>gas</sub></strong>
            </div>
            <p>Despejando para encontrar el volumen del gas:</p>
            <div class="argon-formula">
                <strong>V<sub>gas</sub> = (&rho;<sub>líquido</sub> ⋅ V<sub>líquido</sub>) / &rho;<sub>gas</sub></strong>
            </div>
        </div>

        <div class="argon-section">
            <h3>Calculadora de Volumen de Gas</h3>
            <p>Introduce los valores correspondientes para calcular el volumen de gas y convertir 1 kg de líquido de argón a gas:</p>

            <label for="densityLiquid">Densidad del líquido (&rho;<sub>líquido</sub>) en kg/m³:</label>
            <input type="number" id="densityLiquid" placeholder="Ejemplo: 1000" step="any" required>

            <label for="volumeLiquid">Volumen del líquido (V<sub>líquido</sub>) en m³:</label>
            <input type="number" id="volumeLiquid" placeholder="Ejemplo: 1" step="any" required>

            <label for="densityGas">Densidad del gas (&rho;<sub>gas</sub>) en kg/m³:</label>
            <input type="number" id="densityGas" placeholder="Ejemplo: 1.225" step="any" required>

            <button onclick="calculateArgonConversion()">Calcular Volumen de Gas</button>

            <div class="argon-result" id="gasResult"></div>
            <div class="argon-result" id="argonResult"></div>
        </div>
    </div>

    <script>
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
