<?php

$atomicMasses = [
    'H' => 1.008,
    'He' => 4.0026,
    'Li' => 6.94,
    'Be' => 9.0122,
    'B' => 10.81,
    'C' => 12.01,
    'N' => 14.007,
    'O' => 15.999,
    'F' => 18.998,
    'Ne' => 20.180,
    'Ar' => 39.948,
    // Agrega más elementos según sea necesario
];
function derivacion_formula_densidad(){//YA ESTA EN LIMPIO
    
    echo '
    <h2>Derivación de la fórmula de densidad a partir de la Ley de Gases Ideales</h2>
    
    <p>La <strong>Ecuación de los Gases Ideales</strong> es:</p>
    <pre>
        PV = nRT
    </pre>
    
    <p>Donde:</p>
    <ul>
        <li><strong>P</strong>: Presión del gas (Pa o atm).</li>
        <li><strong>V</strong>: Volumen del gas (m³ o L).</li>
        <li><strong>n</strong>: Número de moles (mol).</li>
        <li><strong>R</strong>: Constante universal de los gases:
            <ul>
                <li>R = 8.314 J/(mol·K) (en unidades del SI).</li>
                <li>R = 0.08206 L·atm/(mol·K) (para trabajar con atm y litros).</li>
            </ul>
        </li>
        <li><strong>T</strong>: Temperatura absoluta en Kelvin (K = °C + 273.15).</li>
    </ul>
    
    <h3>Paso 1: Definición de densidad</h3>
    <p>
    La densidad (<strong>&rho;</strong>) se define como la masa por unidad de volumen:
    </p>
    <pre>
        &rho; = m / V
    </pre>
    <p>
    Donde:
    <ul>
        <li><strong>m</strong>: Masa del gas (kg).</li>
        <li><strong>V</strong>: Volumen del gas (m³).</li>
    </ul>
    </p>
    
    <h3>Paso 2: Relación entre masa y número de moles</h3>
    <p>
    Sabemos que la masa total (<strong>m</strong>) está relacionada con el número de moles (<strong>n</strong>) y la masa molar (<strong>M</strong>) de la sustancia:
    </p>
    <pre>
        m = n · M
    </pre>
    <p>
    Por lo tanto, podemos reescribir la densidad como:
    </p>
    <pre>
        &rho; = (n · M) / V
    </pre>
    
    <h3>Paso 3: Despejar <strong>n</strong> de la Ley de Gases Ideales</h3>
    <p>
    De la ecuación <strong>PV = nRT</strong>, despejamos el número de moles (<strong>n</strong>):
    </p>
    <pre>
        n = (P · V) / (R · T)
    </pre>
    
    <h3>Paso 4: Sustituir <strong>n</strong> en la fórmula de densidad</h3>
    <p>
    Reemplazamos el valor de <strong>n</strong> en la expresión de densidad:
    </p>
    <pre>
        &rho; = ((P · V) / (R · T) · M) / V
    </pre>
    
    <p>
    Simplificamos el término <strong>V</strong> en el numerador y denominador:
    </p>
    <pre>
        &rho; = (P · M) / (R · T)
    </pre>
    
    <h3>Resultado Final:</h3>
    <p>
    La densidad de un gas ideal se calcula como:
    </p>
    <pre>
        &rho; = (P · M) / (R · T)
    </pre>
    
    <h3>Ejemplo con Datos:</h3>
    <p>
    Si tenemos un gas con las siguientes condiciones:
    <ul>
        <li><strong>P</strong>: 1.015 atm.</li>
        <li><strong>T</strong>: 25 °C = 298.15 K.</li>
        <li><strong>M</strong>: 39.948 g/mol (masa molar del argón).</li>
        <li><strong>R</strong>: 0.08206 L·atm/(mol·K).</li>
    </ul>
    La densidad se calcula como:
    </p>
    <pre>
        &rho; = (1.015 · 39.948) / (0.08206 · 298.15)
    </pre>
    <p>
    Cálculo paso a paso:
    <ul>
        <li><strong>Numerador:</strong> 1.015 · 39.948 = 40.547.</li>
        <li><strong>Denominador:</strong> 0.08206 · 298.15 = 24.470.</li>
        <li><strong>Resultado:</strong> &rho; ≈ 40.547 / 24.470 ≈ 1.657 kg/m³.</li>
    </ul>
    </p>
    <p>
    Por lo tanto, la densidad del gas bajo estas condiciones es aproximadamente <strong>1.657 kg/m³</strong>.
    </p>
    ';
    
    
}
function derivacion_formula_volumen_molar(){//YA ESTA EN LIMPIO
    echo '<h2>Derivación de la fórmula del Volumen Molar</h2>
    <p>
    La <strong>Ecuación de los Gases Ideales</strong> es:
    </p>
    <pre>
        PV = nRT
    </pre>
    <p>
    Donde:
    <ul>
        <li><strong>P</strong>: Presión del gas (Pa o atm).</li>
        <li><strong>V</strong>: Volumen del gas (m³ o L).</li>
        <li><strong>n</strong>: Cantidad de sustancia (mol).</li>
        <li><strong>R</strong>: Constante universal de los gases:
            <ul>
                <li>R = 8.314 J/(mol·K) (SI).</li>
                <li>R = 0.08206 L·atm/(mol·K) (para trabajar con atm y litros).</li>
            </ul>
        </li>
        <li><strong>T</strong>: Temperatura absoluta en Kelvin (K = °C + 273.15).</li>
    </ul>
    </p>
    
    <h3>Paso 1: Despejar el volumen (V)</h3>
    <p>
    Para obtener el volumen en la ecuación de los gases ideales:
    </p>
    <pre>
        V = (nRT) / P
    </pre>
    <p>
    Esto representa el volumen total (<strong>V</strong>) que ocupa <strong>n</strong> moles de un gas a una temperatura <strong>T</strong> y presión <strong>P</strong>.
    </p>
    
    <h3>Paso 2: Calcular el volumen molar (V<sub>m</sub>)</h3>
    <p>
    Por definición, el <strong>volumen molar</strong> es el volumen que ocupa <strong>1 mol</strong> de gas, es decir, cuando <strong>n = 1 mol</strong>. 
    Sustituimos <strong>n = 1</strong> en la ecuación:
    </p>
    <pre>
        V<sub>m</sub> = (R · T) / P
    </pre>
    
    <h3>Paso 3: Entender las unidades</h3>
    <p>
    Para garantizar que las unidades sean consistentes, es importante trabajar en el mismo sistema:
    <ul>
        <li>Si <strong>P</strong> está en atm y <strong>R = 0.08206 L·atm/(mol·K)</strong>, el volumen molar se calcula en litros (L/mol).</li>
        <li>Si <strong>P</strong> está en pascales (Pa) y <strong>R = 8.314 J/(mol·K)</strong>, el volumen molar se calcula en metros cúbicos (m³/mol).</li>
    </ul>
    </p>
    
    <h3>Ejemplo</h3>
    <p>
    Si calculamos el volumen molar a <strong>condiciones normales</strong> (<strong>T = 273.15 K</strong>, <strong>P = 1 atm</strong>):
    </p>
    <ol>
        <li>Sustituimos:
            <pre>V<sub>m</sub> = (0.08206 · 273.15) / 1</pre>
        </li>
        <li>Resultado:
            <pre>V<sub>m</sub> ≈ 22.41 L/mol</pre>
        </li>
    </ol>
    
    <h3>Resumen</h3>
    <p>
    La fórmula:
    </p>
    <pre>
        V<sub>m</sub> = (R · T) / P
    </pre>
    <p>
    Se deriva despejando <strong>V</strong> en la ecuación de los gases ideales y suponiendo <strong>n = 1 mol</strong>. Es una relación fundamental para gases en condiciones específicas.
    </p>';
    
}
function calcular_volumen_molar() {
    $R = 0.08206; // Constante universal de los gases en L·atm/(mol·K)
$T = 298.15; // Temperatura en Kelvin (25 °C)
$P = 1.015; // Presión en atm

    // Fórmula para el volumen molar: V_m = (R * T) / P
    return ($R * $T) / $P; // Devuelve el volumen molar en L/mol
}

// Función para calcular la densidad a partir del volumen molar
function calcular_densidad($volumen_molar, $masa_molar) {
    // Fórmula para la densidad: ρ = M / V_m
    return $masa_molar / $volumen_molar; // Devuelve la densidad en g/L
}
function masa_de_un_atomo_carbono(){
    // Masa atómica promedio del carbono en unidades de masa atómica unificada (u)
    $masaAtomicaCarbono = 12.011;

    // Número de Avogadro (mol^-1)
    $numeroAvogadro = 6.02214076e23;

    // Cálculo de la masa de un átomo de carbono en gramos
    $masaAtomicaCarbonoEnGramos = $masaAtomicaCarbono / $numeroAvogadro;

    // Mostrar el resultado
    echo "La masa de un átomo de carbono es aproximadamente " . $masaAtomicaCarbonoEnGramos . " gramos.";
    echo "</br>";
    echo "Equivalencia de 1 u en kilogramos: 1 u ≈ " . (($masaAtomicaCarbonoEnGramos / 12) / 1000);
}
function densidad_gas($molarMass){
    echo '</br>';
    echo "La densidad de un gas se puede calcular con la fórmula derivada de la ley de los gases ideales: ";
    echo "ρ = PM / RT, ";
    echo "donde P es la presión del gas (en pascales, Pa), M es la masa molar del gas (en gramos por mol, g/mol), R es la constante de los gases ideales (8.314 J/mol·K), y T es la temperatura en Kelvin. ";
    echo "Esta fórmula asume que el gas se comporta como un gas ideal.";
    echo '</br>';
    echo '</br>';
    // Constantes
    $P_atm = 1.015; // Presión en atm
    $P_Pa = $P_atm * 101325; // Conversión de atm a Pa
    $M = ($molarMass/1000); //0.039948 Masa molar del argón en kg/mol
    $R = 8.314; // Constante universal de los gases en J/(mol·K)
    $T = 25 + 273.15; // Temperatura en K

    // Calcular la densidad del gas
    $densidad_calculada = number_format((($P_Pa * $M) / ($R * $T)), 3, '.', '');
    return $densidad_calculada;
    // Imprimir el resultado
    //echo "Y la densidad es: " . $densidad_calculada . " kg/m³";

}
function masa_gas($densidad,$volumen){
    echo "Concepto de Masa: La masa es una magnitud física que indica la cantidad de materia que contiene un cuerpo. Es una propiedad intrínseca de la materia y se mide en kilogramos (kg) en el Sistema Internacional de Unidades (SI). No debe confundirse con el peso, que es la fuerza que la gravedad ejerce sobre un objeto y se mide en newtons (N).<br><br>";

    echo "Cálculo de la Masa:<br>";
    echo "</br>";
    echo "Para calcular la masa de un objeto, utilizamos la relación entre densidad y volumen. La densidad (ρ) es la masa por unidad de volumen y se expresa en unidades como kilogramos por metro cúbico (kg/m³). La fórmula que relaciona estas magnitudes es:<br>";
    echo "Masa = Densidad × Volumen<br>";
    echo "Donde:<br>";
    
    echo "Masa (m): cantidad de materia en el objeto, medida en kilogramos (kg).<br>";
    echo "Densidad (ρ): masa por unidad de volumen, en kg/m³.<br>";
    echo "Volumen (V): espacio que ocupa el objeto, en metros cúbicos (m³).";
    echo "</br>";
    echo "</br>";

    // Calcular la masa
    $masa = $densidad * $volumen;
    echo  "Masa = " . $densidad . " kg/m³ " . "* " . $volumen . "m3";
    echo "</br>";
    echo "</br>";
    // Imprimir el resultado
    return $masa;
    //echo "La masa del argón gaseoso es: " . $masa . " kg";
}
function calculateMolarMass($formula) {
    $atomicMasses = [
        'H' => 1.008,
        'He' => 4.0026,
        'Li' => 6.94,
        'Be' => 9.0122,
        'B' => 10.81,
        'C' => 12.01,
        'N' => 14.007,
        'O' => 15.999,
        'F' => 18.998,
        'Ne' => 20.180,
        'Ar' => 39.948,
        // Agrega más elementos según sea necesario
    ];

    echo "Para convertir la masa atómica de un elemento, expresada en unidades de masa atómica unificada (u), a masa molar en gramos por mol (g/mol), se utiliza la siguiente relación:";
    echo "</br>";
    echo "Relación fundamental:" ;
    echo "</br>";
    echo "1 unidad de masa atómica unificada (u) es equivalente a 1 gramo por mol (g/mol).";
    echo "</br>";
    echo "</br>";
    echo "Fórmula de conversión:";
    echo "</br>";
    echo "Masa molar(g/mol) = (Masa atómica(u) * 1g/mol) * 1u";
    echo "</br>";
    echo "</br>";


    
    // Expresión regular para extraer elementos y sus cantidades
    preg_match_all('#([A-Z][a-z]*)(\d*)#', $formula, $matches, PREG_SET_ORDER);
    
    $molarMass = 0.0;

    foreach ($matches as $match) {
        $element = $match[1];
        $quantity = $match[2] === '' ? 1 : (int)$match[2];

        if (isset($atomicMasses[$element])) {
            $molarMass += $atomicMasses[$element] * $quantity;
        } else {
            throw new Exception("Elemento desconocido: $element");
        }
    }

     echo "<b>La masa molar de $formula es $molarMass g/mol</b>";

    return $molarMass;
}




$formula = 'Ar  '; // Fórmula del agua
try {
  


    
    echo '</br>';
    echo '</br>';
    echo '</br>';
    echo '</br>';
    //exit;

    echo "----------------------------------------------------------------------------------------------------";
    echo "</br>"; 
    echo "-Unidad de masa atómica unificada (u): Es una unidad de medida estándar utilizada para expresar la masa de átomos y moléculas. Se define como la doceava parte (1/12) de la masa de un átomo de carbono-12. ";
    echo "</br>";
    echo "-Mol: Es la unidad del Sistema Internacional para medir la cantidad de sustancia. Un mol contiene exactamente 6.022 140 76 × 10²³ entidades elementales (número de Avogadro).";
    echo "</br>";   
    echo "-Masa molar (g/mol): Es la masa de un mol de una sustancia, expresada en gramos por mol.";
    echo "</br>";  
    echo "</br>"; 


    $masaAtomicaCarbono = 12.011;

    // Número de Avogadro (mol^-1)
    $numeroAvogadro = 6.02214076e23;

    // Cálculo de la masa de un átomo de carbono en gramos
    $masaAtomicaCarbonoEnGramos = $masaAtomicaCarbono / $numeroAvogadro;

    // Mostrar el resultado
    echo "La masa de un átomo de carbono es aproximadamente " . $masaAtomicaCarbonoEnGramos . " gramos.";
    echo "</br>";
    echo "Equivalencia de 1 u en kilogramos: 1 u ≈ " . (($masaAtomicaCarbonoEnGramos / 12) / 1000);


    echo "</br>"; 



    echo "----------------------------------------------------------------------------------------------------";

 
    echo '</br>';
    echo '</br>';

    $molarMass = calculateMolarMass($formula, $atomicMasses);
    echo '</br>';

    echo '</br>';
 
    $densidad_calculada = densidad_gas($molarMass);
    echo "<b>La densidad es: " . $densidad_calculada . " kg/m³</b>";

    echo '</br>';
    echo '</br>';
    $masa_calculada = masa_gas($densidad_calculada,18698);
  
    echo "<b>La masa del ". $formula ." gaseoso es: " . $masa_calculada . " kg</b>";
    echo '</br>';
    echo '</br>';


    echo '</br>';
    echo '</br>';

    echo '</br>';
    echo '</br>';

    $R = 0.08206; // Constante universal de los gases en L·atm/(mol·K)
    $T = 298.15; // Temperatura en Kelvin (25 °C)
    $P = 1.015; // Presión en atm
    $M = 39.948; // Masa molar del argón en g/mol

    derivacion_formula_densidad();
    derivacion_formula_volumen_molar();
    echo '</br>';
    echo '</br>';
    $volumen_molar = calcular_volumen_molar();
    // Llamada a la función para calcular la densidad
    echo '</br>';
    echo '</br>';
    $densidad = calcular_densidad($volumen_molar, $M);
    // Imprimir resultados
    echo "<h2>Cálculo del Volumen Molar y la Densidad</h2>";
    echo "<p><strong>Datos:</strong></p>";
    echo "<ul>";
    echo "<li>Constante universal de los gases (R): $R L·atm/(mol·K)</li>";
    echo "<li>Temperatura (T): $T K</li>";
    echo "<li>Presión (P): $P atm</li>";
    echo "<li>Masa molar del argón (M): $M g/mol</li>";
    echo "</ul>";

    echo "<p><strong>Resultados:</strong></p>";
    echo "<ul>";
    echo "<li>Volumen molar (V<sub>m</sub>): " . round($volumen_molar, 2) . " L/mol</li>";
    echo "<li>Densidad (ρ): " . round($densidad, 3) . " g/L</li>";
echo "</ul>";


    echo '</br>';
    echo '</br>';

    echo '</br>';
    echo '</br>';


} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
