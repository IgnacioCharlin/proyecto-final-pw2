{{> header}}

<main class="main-home" >
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="gasto">Cargar Gasto</a></li>
            <li><a href="/cargarDatosViaje/posicion">Cargar Posición</a></li>
        </ul>
    </section>
    <section class="reporte" >
        <form class="formulario-posicion" action="/cargarDatosViaje/cargarPosicion"}; method="POST">
            <div>
                <label id="numeroViaje">Numero De Viaje:</label>
                <input class="campos" type="number" name="numeroViaje" id="numeroViaje" REQUIRED>
                <div id="mapa" class="mapa" style=""></div>
                <!--            cuando avancemos hay que ocultar las coordenadas ahora se dejan para ver que las captura real desde el navegador web, falta mobile-->
            </div>
            <div class="col-posicion-input">
                <labe>Coordenadas</labe>
                <input class="campos" type="text" name="coordenadas" id="coordenadas" REQUIRED>
                <label id="fecha">Fecha:</label>
                <input class="campos" type="date" name="fecha" id="fecha" required >
                <label id="hora">Hora:</label>
                <input class="campos" type="time" name="hora" id="hora" required >
                <button type="submit" class="boton">Agregar</button>
            </div>
        </form>
        <div class="w3-red">{{error}}</div>
    </section>
</main>


{{> footer}}
