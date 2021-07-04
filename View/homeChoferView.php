{{> header}}
<main class="main-home">
   <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/cargarDatosViaje">Cargar Gasto</a></li>
            <li><a href="/cargarDatosViaje/posicion">Cargar Posición</a></li>
        </ul>
    </section>
    <section class="reporte">
        {{#msg}}<div class="w3-panel w3-green">
            <h3>{{msg}}</h3>

        </div>
        {{/msg}}
        <form class="formulario-login" action="proforma/verProforma" method="POST">
            <label id="numero">Numero De Viaje:</label>
            <input class="campos" type="number" name="numero" id="numero" REQUIRED>
            <button type="submit" class="boton">BUSCAR</i></button>
        </form>
    </section>
</main>


{{> footer}}