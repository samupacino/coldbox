    <div class="molar-mass-container">
        <h2>Calculadora de Masa Molar</h2>
        <p>Para calcular la masa molar de un compuesto, introduce su fórmula química y presiona "Calcular".</p>
        
        <h3>Ejemplo de Conversión:</h3>
        <div class="formula">
            Masa molar (g/mol) = (Masa atómica (u) * 1 g/mol) * 1 u
        </div>

        <h3>Ingresa la Fórmula Química</h3>
        <form id="molarMassForm">
            <label for="formula">Fórmula química:</label>
            <input type="text" id="formula" placeholder="Ejemplo: H2O, CO2, C6H12O6" required>
            <button type="button" onclick="calculateMolarMass()">Calcular</button>
        </form>
        <div class="result" id="result"></div>
    </div>   
    
    <br> <br>


    <div class="gas-container">
        <h2>Derivación de la fórmula de densidad a partir de la Ley de Gases Ideales</h2>
        <p>La <strong>Ecuación de los Gases Ideales</strong> es:</p>
        <pre>PV = nRT</pre>
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
        <p>La densidad (<strong>&rho;</strong>) se define como la masa por unidad de volumen:</p>
        <pre>&rho; = m / V</pre>
        <p>Donde:</p>
        <ul>
            <li><strong>m</strong>: Masa del gas (kg).</li>
            <li><strong>V</strong>: Volumen del gas (m³).</li>
        </ul>

        <h3>Paso 2: Relación entre masa y número de moles</h3>
        <p>Sabemos que la masa total (<strong>m</strong>) está relacionada con el número de moles (<strong>n</strong>) y la masa molar (<strong>M</strong>) de la sustancia:</p>
        <pre>m = n · M</pre>
        <p>Por lo tanto, podemos reescribir la densidad como:</p>
        <pre>&rho; = (n · M) / V</pre>

        <h3>Paso 3: Despejar <strong>n</strong> de la Ley de Gases Ideales</h3>
        <p>De la ecuación <strong>PV = nRT</strong>, despejamos el número de moles (<strong>n</strong>):</p>
        <pre>n = (P · V) / (R · T)</pre>

        <h3>Paso 4: Sustituir <strong>n</strong> en la fórmula de densidad</h3>
        <p>Reemplazamos el valor de <strong>n</strong> en la expresión de densidad:</p>
        <pre>&rho; = ((P · V) / (R · T) · M) / V</pre>
        <p>Simplificamos el término <strong>V</strong> en el numerador y denominador:</p>
        <pre>&rho; = (P · M) / (R · T)</pre>

        <h3>Resultado Final:</h3>
        <p>La densidad de un gas ideal se calcula como:</p>
        <pre>&rho; = (P · M) / (R · T)</pre>

        <p>
            Donde:
            <ul>
                <li><strong>P</strong>: presión del gas (en pascales, Pa).</li>
                <li><strong>M</strong>: masa molar del gas (en gramos por mol, g/mol).</li>
                <li><strong>R</strong>: constante de los gases ideales (8.314 J/mol·K).</li>
                <li><strong>T</strong>: temperatura en Kelvin.</li>
            </ul>
        </p>
        <p>Esta fórmula asume que el gas se comporta como un gas ideal.</p>
        
        <h3>Ejemplo con Datos:</h3>
        <p>Si tenemos un gas con las siguientes condiciones:</p>
        <ul>
            <li><strong>P</strong>: 1.015 atm.</li>
            <li><strong>T</strong>: 25 °C = 298.15 K.</li>
            <li><strong>M</strong>: 39.948 g/mol (masa molar del argón).</li>
            <li><strong>R</strong>: 0.08206 L·atm/(mol·K).</li>
        </ul>
        <p>La densidad se calcula como:</p>
        <pre>&rho; = (1.015 · 39.948) / (0.08206 · 298.15)</pre>
        <p>Cálculo paso a paso:</p>
        <ul>
            <li><strong>Numerador:</strong> 1.015 · 39.948 = 40.547.</li>
            <li><strong>Denominador:</strong> 0.08206 · 298.15 = 24.470.</li>
            <li><strong>Resultado:</strong> &rho; ≈ 40.547 / 24.470 ≈ 1.657 kg/m³.</li>
        </ul>
        <p>Por lo tanto, la densidad del gas bajo estas condiciones es aproximadamente <strong>1.657 kg/m³</strong>.</p>

        <h3>Calcula la Densidad de un Gas</h3>
        <form id="densityForm">
            <label for="pressure">Presión (P) en atm:</label>
            <input type="number" id="pressure" placeholder="Ejemplo: 1.015" step="0.001" required>
            
            <label for="molarMass">Masa molar (M) en g/mol:</label>
            <input type="number" id="molarMass" placeholder="Ejemplo: 39.948" step="0.001" required>
            
            <label for="temperature">Temperatura (T) en celsius:</label>
            <input type="number" id="temperature" placeholder="Ejemplo: 25 celsius" step="0.01" required>
            
            <button type="button" onclick="calculateDensity()">Calcular</button>
        </form>
        <div class="resultado_densidad" id="result_densidad"></div>
    </div>


    <br><br>
    
    <div class="volume-molar-container">
        <h2>Derivación de la fórmula del Volumen Molar</h2>
        <p>La <strong>Ecuación de los Gases Ideales</strong> es:</p>
        <pre>PV = nRT</pre>
        <p>Donde:</p>
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

        <h3>Paso 1: Despejar el volumen (V)</h3>
        <p>Para obtener el volumen en la ecuación de los gases ideales:</p>
        <pre>V = (nRT) / P</pre>
        <p>Esto representa el volumen total (<strong>V</strong>) que ocupa <strong>n</strong> moles de un gas a una temperatura <strong>T</strong> y presión <strong>P</strong>.</p>

        <h3>Paso 2: Calcular el volumen molar (V<sub>m</sub>)</h3>
        <p>Por definición, el <strong>volumen molar</strong> es el volumen que ocupa <strong>1 mol</strong> de gas, es decir, cuando <strong>n = 1 mol</strong>. 
        Sustituimos <strong>n = 1</strong> en la ecuación:</p>
        <pre>V<sub>m</sub> = (R · T) / P</pre>

        <h3>Paso 3: Entender las unidades</h3>
        <p>Para garantizar que las unidades sean consistentes, es importante trabajar en el mismo sistema:</p>
        <ul>
            <li>Si <strong>P</strong> está en atm y <strong>R = 0.08206 L·atm/(mol·K)</strong>, el volumen molar se calcula en litros (L/mol).</li>
            <li>Si <strong>P</strong> está en pascales (Pa) y <strong>R = 8.314 J/(mol·K)</strong>, el volumen molar se calcula en metros cúbicos (m³/mol).</li>
        </ul>

        <h3>Ejemplo</h3>
        <p>Si calculamos el volumen molar a <strong>condiciones normales</strong> (<strong>T = 273.15 K</strong>, <strong>P = 1 atm</strong>):</p>
        <ol>
            <li>Sustituimos:
                <pre>V<sub>m</sub> = (0.08206 · 273.15) / 1</pre>
            </li>
            <li>Resultado:
                <pre>V<sub>m</sub> ≈ 22.41 L/mol</pre>
            </li>
        </ol>

        <h3>Resumen</h3>
        <p>La fórmula:</p>
        <pre>V<sub>m</sub> = (R · T) / P</pre>
        <p>Se deriva despejando <strong>V</strong> en la ecuación de los gases ideales y suponiendo <strong>n = 1 mol</strong>. Es una relación fundamental para gases en condiciones específicas.</p>
    </div>

    



    <br><br>

    <div class="container-quimica">
        <h1>Cálculo de la Densidad de un Gas</h1>
        <br>
        <p>La densidad de los cuerpos se refiere a la relación masa/volumen del cuerpo, o sea, entre mayor masa haya en una misma cantidad de volumen, el cuerpo es más denso.</p>
        <p>La densidad de un gas se puede calcular con la fórmula derivada de la ley de los gases ideales:</p>
        <div class="formula">ρ = PM / RT</div>
        <p>
            Donde:
            <ul>
                <li><strong>P</strong>: presión del gas (en pascales, Pa).</li>
                <li><strong>M</strong>: masa molar del gas (en gramos por mol, g/mol).</li>
                <li><strong>R</strong>: constante de los gases ideales (8.314 J/mol·K).</li>
                <li><strong>T</strong>: temperatura en Kelvin.</li>
            </ul>
        </p>
        <p>Esta fórmula asume que el gas se comporta como un gas ideal.</p>
    </div>


    <br><br>

    <div class="container-quimica">
        <h1>Concepto y Cálculo de la Masa</h1>
        <br>
        <p>
            <strong>Concepto de Masa:</strong> La masa es una magnitud física que indica la cantidad de materia que contiene un cuerpo. 
            Es una propiedad intrínseca de la materia y se mide en kilogramos (kg) en el Sistema Internacional de Unidades (SI). 
            No debe confundirse con el peso, que es la fuerza que la gravedad ejerce sobre un objeto y se mide en newtons (N).
        </p>
        <h2>Cálculo de la Masa:</h2>
        <p>
            Para calcular la masa de un objeto, utilizamos la relación entre densidad y volumen. La densidad (ρ) es la masa por unidad 
            de volumen y se expresa en unidades como kilogramos por metro cúbico (kg/m³). La fórmula que relaciona estas magnitudes es:
        </p>
        <div class="formula">Masa = Densidad × Volumen</div>
        <p>Donde:</p>
        <ul>
            <li><strong>Masa (m):</strong> cantidad de materia en el objeto, medida en kilogramos (kg).</li>
            <li><strong>Densidad (ρ):</strong> masa por unidad de volumen, en kg/m³.</li>
            <li><strong>Volumen (V):</strong> espacio que ocupa el objeto, en metros cúbicos (m³).</li>
        </ul>
    </div>



    <div class="atomic-mass-info">
        <h2>Unidad de Masa Atómica y Masa Molar</h2>
        <ul>
            <li><span class="highlight">Unidad de masa atómica unificada (u):</span> Es una unidad estándar utilizada para expresar la masa de átomos y moléculas. Se define como la doceava parte (1/12) de la masa de un átomo de carbono-12.</li>
            <li><span class="highlight">Mol:</span> Es la unidad del Sistema Internacional para medir la cantidad de sustancia. Un mol contiene exactamente 6.022 140 76 × 10²³ entidades elementales (Número de Avogadro).</li>
            <li><span class="highlight">Masa molar (g/mol):</span> Es la masa de un mol de una sustancia, expresada en gramos por mol.</li>
        </ul>

        <h3>Cálculo de la Masa de un Átomo de Carbono</h3>
        <p>Se puede calcular la masa de un átomo de carbono usando la siguiente fórmula:</p>
        <div class="formula">
            Masa de un átomo de carbono (g) = Masa molar del carbono / Número de Avogadro
        </div>

        <h3>Calculadora de Masa Atómica</h3>
        <p>Introduce la masa molar del elemento (en g/mol) para calcular la masa de un solo átomo en gramos.</p>
        
        <label for="molarMass">Masa molar (g/mol):</label>
        <input type="number" id="molarMasa" placeholder="Ejemplo: 12.011" step="0.001" value="12.011">
        <button type="button" onclick="calculateAtomicMass()">Calcular</button>

        <div class="result_atomi" id="result_atomic"></div>

        <h3>Equivalencia de 1 u en Kilogramos</h3>
        <p>1 unidad de masa atómica (u) equivale aproximadamente a:</p>
        <div class="result_atomi" id="equivalence"></div>
    </div>



    <br><br><br>




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

        <div class="argon-section" id="volumen_liquido_gas">
            <h3>Calculadora de Volumen de Gas</h3>
            <p>Introduce los valores correspondientes para calcular el volumen de gas y convertir 1 kg de líquido de argón a gas:</p>

            <label for="densityLiquid">Densidad del líquido (&rho;<sub>líquido</sub>) en kg/m³:</label>
            <input type="number" id="densityLiquid" placeholder="Ejemplo: 1395" step="any" required>

            <label for="volumeLiquid">Volumen del líquido (V<sub>líquido</sub>) en m³:</label>
            <input type="number" id="volumeLiquid" placeholder="Ejemplo: 1" step="any" required>

            <label for="densityGas">Densidad del gas (&rho;<sub>gas</sub>) en kg/m³:</label>
            <input type="number" id="densityGas" placeholder="Ejemplo: 1.657" step="any" required>

            <button onclick="calculateArgonConversion()">Calcular Volumen de Gas</button>

            <div class="argon-result" id="gasResult"></div>
            <div class="argon-result" id="argonResult"></div>
        </div>
    </div>


    <br><br><br>




