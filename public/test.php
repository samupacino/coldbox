<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Densidad de Gases: Argón, Oxígeno y Nitrógeno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .gas-info-container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .gas-info-container h1 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 10px;
        }

        .gas-card {
            background-color: #eef6fc;
            border-left: 5px solid #0078d4;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .gas-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        .gas-card h2 {
            color: #0078d4;
            margin-top: 0;
        }

        .gas-card p {
            margin: 10px 0;
        }

        .gas-density {
            font-weight: bold;
            color: #4caf50;
            font-size: 1.2em;
        }

        .definition {
            font-style: italic;
            color: #555;
        }

    </style>
</head>
<body>

    <div class="gas-info-container">
        <h1>Densidad de Gases Comunes</h1>

        <!-- Argón -->
        <div class="gas-card">
            <h2>Argón (Ar)</h2>
            <p class="definition">El argón es un gas noble, incoloro e inodoro, que representa aproximadamente el 0.93% del aire de la atmósfera terrestre. Es conocido por su inercia química, lo que lo hace útil en aplicaciones donde se necesita un ambiente no reactivo.</p>
            <p class="gas-density">Densidad del Argón líquido: 1395 kg/m³</p>
            <p class="gas-density">Densidad del Argón gaseoso: 1.784 kg/m³</p>
        </div>

        <!-- Oxígeno -->
        <div class="gas-card">
            <h2>Oxígeno (O<sub>2</sub>)</h2>
            <p class="definition">El oxígeno es un gas esencial para la respiración de la mayoría de los seres vivos. Constituye el 21% del volumen de la atmósfera terrestre y es altamente reactivo, participando en procesos de combustión y oxidación.</p>
            <p class="gas-density">Densidad del Oxígeno líquido: 1141 kg/m³</p>
            <p class="gas-density">Densidad del Oxígeno gaseoso: 1.429 kg/m³</p>
        </div>

        <!-- Nitrógeno -->
        <div class="gas-card">
            <h2>Nitrógeno (N<sub>2</sub>)</h2>
            <p class="definition">El nitrógeno es un gas incoloro e inodoro que constituye el 78% del aire de la atmósfera. Es fundamental en la industria química y se utiliza comúnmente como refrigerante en su estado líquido.</p>
            <p class="gas-density">Densidad del Nitrógeno líquido: 807 kg/m³</p>
            <p class="gas-density">Densidad del Nitrógeno gaseoso: 1.2506 kg/m³</p>
        </div>

    </div>

</body>
</html>
