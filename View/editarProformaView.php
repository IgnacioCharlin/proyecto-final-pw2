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
        {{#data}}
        <form class="formulario-proforma" action="/proforma/actualizarProforma" method="POST">
            <div class="campos-proforma">
            <div class="div-proforma">
                <label id="numero">Numero Proforma:</label>
                <input class="campos" type="number" id="numero" name="numero" value="{{numero}}" required>
                <label id="fecha">Fecha: </label>
                <input class="campos" type="date" id="fecha" name="fecha" value="{{fecha}}" required>
                <label id="cliente">Cliente: </label>
                <input class="campos" type="text" id="cliente" name="cliente" value="{{cliente}}" required>
                <label id="origen">Origen: </label>
                <input class="campos" type="text" id="origen" name="origen" value="{{origen}}"  required>
                <label id="destino">Destino: </label>
                <input class="campos" type="text" id="destino" name="destino" value="{{destino}}" required>
            </div>
            <div class="div-proforma">
                <label id="id_chofer">Legajo Chofer: </label>
                <input class="campos" type="number" id="id_chofer" name="id_chofer" value="{{id_chofer}}" required>
                <label id="km_previstos">Kilometraje Previstos: </label>
                <input class="campos" type="number" id="km_previstos" name="km_previstos" value="{{km_previsto}}" required>
                <label id="combustible_previsto">Combustible Previsto: </label>
                <input class="campos" type="number" id="combustible_previsto" name="combustible_previsto" value="{{combustible_previsto}}" required>
                <label id="patente">Patente del Camión: </label>
                <input class="campos" type="text" id="patente" name="patente" value="{{id_camion}}" required>
            </div>
            </div>
            <div class="w3-red">{{error}}</div>
            <div class="botones">
                <a class="cancelar" href="/home">Cancelar</a>
                <button type="submit" class="boton">Cargar</button>
            </div>
        </form>
        {{/data}}
    </section>
</main>
{{> footer}}
