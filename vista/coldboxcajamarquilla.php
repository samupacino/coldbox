
    <div id="pl2" name="pl2">
        <h1><?php echo strtoupper($_SESSION['planta']); ?></h1>
    </div>
    <br>
    <div class="search-container">
        <input type="text" id="search-input" placeholder="Buscar instrumento">
        <button onclick="searchInstrument('pl2')">Buscar</button>
    </div>

    <div class="search-result" id="search-result"></div>

<!-- Lista de plataformas -->


    <div class="column" >
        <div></div>
        <div class="platform" onclick="showOptions(7,'pl2')">PLATAFORMA 7</div>
        <div class="platform" onclick="showOptions(6,'pl2')">PLATAFORMA 6</div>
        <div class="platform" onclick="showOptions(5,'pl2')">PLATAFORMA 5</div>
        <div class="platform" onclick="showOptions(4,'pl2')">PLATAFORMA 4</div>
        <div class="platform" onclick="showOptions(3,'pl2')">PLATAFORMA 3</div>
        <div class="platform" onclick="showOptions(2,'pl2')">PLATAFORMA 2</div>
        <div class="platform" onclick="showOptions(1,'pl2')">PLATAFORMA 1</div>

        <div class="base" onclick="showOptions(8,'pl2')">Base</div>
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
        <form id="instrument-form" name="pl2">
            <input type="text" id="instrument" name="nombre" onclick="validando_input()" placeholder="Nuevo instrumento" required>
            <button type="submit" class="estilo_button">Registrar</button>
        </form>
        <!-- Pie del Modal -->
         <br>
        <div class="modal-footer" >
            <button onclick="closeModal()" class="estilo_button">Cerrar</button>
        </div>
        <div class="modal-footer" >
            <h3 id="mensaje_error"></h3>
        </div>
    </div>

