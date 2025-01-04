
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

