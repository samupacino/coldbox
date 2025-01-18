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
function densidad_gas($molarMass){

    // Constantes
    $P_atm = 1.015; // Presión en atm
    $P_Pa = $P_atm * 101325; // Conversión de atm a Pa
    $M = ($molarMass/1000); //0.039948 Masa molar del argón en kg/mol
    $R = 8.314; // Constante universal de los gases en J/(mol·K)
    $T = 25 + 273.15; // Temperatura en K

    // Calcular la densidad del gas
    $densidad_calculada = ($P_Pa * $M) / ($R * $T);
    return $densidad_calculada;
    // Imprimir el resultado
    //echo "Y la densidad es: " . $densidad_calculada . " kg/m³";

}
function masa_gas($densidad,$volumen){

    // Calcular la masa
    $masa = $densidad * $volumen;

    // Imprimir el resultado
    return $masa;
    //echo "La masa del argón gaseoso es: " . $masa . " kg";
}
function calculateMolarMass($formula, $atomicMasses) {
    // Expresión regular para extraer elementos y sus cantidades
    preg_match_all('/([A-Z][a-z]*)(\d*)/', $formula, $matches, PREG_SET_ORDER);
    
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

    return $molarMass;
}
$formula = 'Ar  '; // Fórmula del agua
try {

    $molarMass = calculateMolarMass($formula, $atomicMasses);
    echo "La masa molar de $formula es $molarMass g/mol";
    echo '</br>';


    $densidad_calculada = densidad_gas($molarMass);
    echo "Y la densidad es: " . $densidad_calculada . " kg/m³";

    echo '</br>';
    $masa_calculada = masa_gas($densidad_calculada,18698);
    echo "La masa del argón gaseoso es: " . $masa_calculada . " kg";


} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
