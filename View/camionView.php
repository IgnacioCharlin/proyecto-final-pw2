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
        <form class="formulario-proforma" action="camion/cargarCamion" method="POST">
            <div class="campos-proforma">
                <div class="div-proforma">
                    <label id="patente">Patente:</label>
                    <input class="campos" type="text" id="patente" name="patente" required>
                    <label id="marca">Marca: </label>
                    <input class="campos" type="text" id="marca" name="marca" required>
                </div>
                <div class="div-proforma">
                    <label id="modelo">Modelo: </label>
                    <input class="campos" type="text" id="modelo" name="modelo"  required>
                    <label id="estado">Estado: </label>
                    <div class="div-estado">
                        <p class="p-estado">Activo</p>
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

