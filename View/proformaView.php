{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/roles">Asignar Rol</a></li>
            <li><a href="/camion">Cargar Camion</a></li>
        </ul>
    </section>
    <section class="reporte">
        <form class="formulario-proforma" action="proforma/cargarProforma" method="POST">
            <div class="campos-proforma">
                <div class="div-proforma">
                    <label id="numero">Numero Proforma:</label>
                    <input class="campos" type="number" id="numero" name="numero" placeholder="" required>
                    <label id="fecha">Fecha: </label>
                    <input class="campos" type="date" id="fecha" name="fecha" required>
                    <label id="cliente">Cliente: </label>
                    <input class="campos" type="text" id="cliente" name="cliente" required>
                    <label id="origen">Origen: </label>
                    <input class="campos" type="text" id="origen" name="origen"  required>
                    <label id="destino">Destino: </label>
                    <input class="campos" type="text" id="destino" name="destino"required>
                </div>
                <div class="div-proforma">
                    <label id="km_previstos">Kilometraje Previstos: </label>
                    <input class="campos" type="number" id="km_previstos" name="km_previstos" required>
                    <label id="combustible_previsto">Combustible Previsto: </label>
                    <input class="campos" type="number" id="combustible_previsto" name="combustible_previsto" required>
                    <label id="id_chofer">Nombre Chofer: </label>
                    <select class="campos" id="id_chofer" name="id_chofer" required >
                        <option disabled selected> elegi al chofer</option>
                        {{#choferes}}
                        <option value="{{id}}">{{name}}</option>
                        {{/choferes}}
                    </select>
                    <label id="patente">Patente del Camión: </label>
                    <select class="campos" id="patente" name="patente" required >
                        <option disabled selected> elegi el camion</option>
                        {{#camiones}}
                        <option>{{patente}}</option>
                        {{/camiones}}
                    </select>
                    <label id="patente_semi">Patente del Semi: </label>
                    <select class="campos" id="patente_semi" name="patente_semi" required >
                        <option disabled selected> elegi el semi</option>
                        {{#semis}}
                        <option>{{patente}}</option>
                        {{/semis}}
                    </select>
                </div>
            </div>
            <div class="w3-red">{{error}}</div>
            <div class="botones">
                <a class="cancelar" href="/home">Cancelar</a>
                <button type="submit" class="boton">Cargar</button>
            </div>
        </form>
    </section>
</main>
{{> footer}}