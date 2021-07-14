{{> headerMap}}

<main class="main-home" >
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="gasto">Cargar Gasto</a></li>
            <li><a href="/cargarDatosViaje/posicion">Cargar Posición</a></li>
        </ul>
    </section>
    <section class="reporte" >
        <form class="formulario-posicion" action="/cargarDatosViaje/cargarPosicion" method="POST">
            <div>
<<<<<<< HEAD
                <div id="mapa" class="mapa" style=""></div>
                <!--            cuando avancemos hay que ocultar las coordenadas ahora se dejan para ver que las captura real desde el navegador web, falta mobile-->
                <labe>Posición actual</labe>
                <input class="campos" type="text" name="coordenadas" id="coordenadas" REQUIRED>
=======
            <label id="numeroViaje">Viaje numero: {{numero}}</label>
            <input style="display: none" type="text" name="numeroViaje" id="numeroViaje" value="{{numero}}" REQUIRED>
            <div id="mapa" class="mapa" style=""></div>
            <!--            cuando avancemos hay que ocultar las coordenadas ahora se dejan para ver que las captura real desde el navegador web, falta mobile-->
            <labe>Posición actual</labe>
            <input class="campos" type="text" name="coordenadas" id="coordenadas" REQUIRED>
>>>>>>> 8972a2c719e4bb50d56d3c1cbf9f10546ec5d8d7
            </div>
            <div class="col-posicion-input">
                <label id="numeroViaje">Numero De Viaje:</label>
                <!--            <input class="campos" type="number" name="numeroViaje" id="numeroViaje" REQUIRED>-->
                <label id="fecha">Fecha:</label>
                <input class="campos" type="date" name="fecha" id="fecha" required >
                <label id="hora">Hora:</label>
                <input class="campos" type="time" name="hora" id="hora" required >
                <label id="km">Kilometros:</label>
                <input class="campos" type="numero" name="km" id="km" required >
<<<<<<< HEAD

            </div>
            <div class="col-posicion-input">
                <label id="gasto">Descripcion:</label>
                <input class="campos" type="text" name="gasto" id="gasto" required >
                <label id="gasto">Gasto:</label>
                <input class="campos" type="number" name="gasto" id="gasto" REQUIRED>
=======
                <label id="gasto">importe:</label>
                <input class="campos" type="numero" name="gasto" id="gasto" required >
                <label id="descripcion">Descripcion:</label>
                <select class="campos" name="descripcion" id="descripcion" >
                    <option>Peajes</option>
                    <option>Nafta</option>
                    <option>Viáticos</option>
                </select>
>>>>>>> 8972a2c719e4bb50d56d3c1cbf9f10546ec5d8d7
                <button type="submit" class="boton">Agregar</button>
            </div>
        </form>
        <div class="w3-red">{{error}}</div>
    </section>
</main>
{{> footer}}
