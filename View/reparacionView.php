{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/camion/reparacion">Cargar Reparacion</a></li>
            <li><a href="/camion/historialReparaciones">Historial Reparacion</a></li>

        </ul>
    </section>
    {{#res}}
    <div class="w3-panel w3-green">
        <h3>{{res}}</h3>
    </div>
    {{/res}}
    <section class="reporte">
        <form class="formulario-proforma" action="/camion/cargarDeReparacion" method="POST">
            <div class="campos-proforma">
                <div class="div-proforma">
                    <label id="patente">Patente:</label>
                    <select class="campos" name="patente" id="patente">
                        {{#camiones}}
                        <option value="{{patente}}">{{patente}}</option>
                        {{/camiones}}
                    </select>
                    <label id="repuesto">Repuesto Cambiado: </label>
                    <input class="campos" type="text" id="repuesto" name="repuesto" required>
                </div>
                <div class="div-proforma">
                    <label id="precio">Monto: </label>
                    <input class="campos" type="number" id="precio" name="precio"  required>
                    <label id="dias">cantidad dias </label>
                    <input class="campos" type="number" id="dias" name="dias"  required>
                    <div class="reparacion-estado ">
                    <label id="estado">Estado: </label>
                        <p class="p-reparacion ">Finalizado</p>
                        <input class="campos" type="radio" id="estado" name="estado" value="1" required>
                        <p class="p-reparacion">En Reparacion</p>
                        <input class="campos" type="radio" id="estado" name="estado" value="0" required>
                    </div>
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

