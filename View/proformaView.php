{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/proforma">Cargar Proforma</a></li>
            <li><a href="/roles">Asignar Rol</a></li>
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
                <input class="campos" type="text" id="cliente" name="cliente" placeholder="ingresar nombre del cliente" required>
            </div>
            <div class="div-proforma">
                <label id="origen">Origen: </label>
                <input class="campos" type="text" id="origen" name="origen" placeholder="ingresar origen" required>
                <label id="destino">Destino: </label>
                <input class="campos" type="text" id="destino" name="destino" placeholder="ingresar destino" required>
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
