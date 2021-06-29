{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="gasto">Cargar Gasto</a></li>
        </ul>
    </section>
    <section class="reporte">
        <form class="formulario-login" action="gastos/cargarGasto" method="POST">
            <label id="numeroViaje">Numero De Viaje:</label>
            <input class="campos" type="number" name="numeroViaje" id="numeroViaje" REQUIRED>
            <label id="gasto">Gasto:</label>
            <input class="campos" type="number" name="gasto" id="gasto" REQUIRED>
            <label id="descripcion">Descripcion:</label>
            <input class="campos" type="text" name="descripcion" id="descripcion" required>
            <label id="fecha">Fecha:</label>
            <input class="campos" type="date" name="fecha" id="fecha" required >
            <button type="submit" class="boton">Agregar</button>
        </form>
        <div class="w3-red">{{error}}</div>
    </section>
</main>


{{> footer}}
