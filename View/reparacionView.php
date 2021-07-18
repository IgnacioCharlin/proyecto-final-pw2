{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/camion/reparacion">Cargar Reparacion</a></li>

        </ul>
    </section>
    <section class="reporte">
        <form class="formulario-proforma" action="/camion/cargarDeReparacion" method="POST">
            <div class="campos-proforma">
                <div class="div-proforma">
                    <label id="patente">Patente:</label>
                    <input class="campos" type="text" id="patente" name="patente" required>
                    <label id="repuesto">Repuesto Cambiado: </label>
                    <input class="campos" type="text" id="repuesto" name="repuesto" required>
                </div>
                <div class="div-proforma">
                    <label id="precio">Monto: </label>
                    <input class="campos" type="number" id="precio" name="precio"  required>
                    <label id="estado">Estado: </label>
                    <div class="div-estado">
                        <p class="p-estado">Finalizado</p>
                        <input class="campos" type="radio" id="estado" name="estado" value="1" required>
                    </div>
                    <div class="div-estado">
                        <p class="p-estado">En Reparacion</p>
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

