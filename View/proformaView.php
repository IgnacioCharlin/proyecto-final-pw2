{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="">Cargar Proforma</a></li>
        </ul>
    </section>
    <section class="reporte">
        <form class="formulario-login" action="" method="POST">
            <label id="numero">Numero Proforma:</label>
            <input type="number" id="numero" name="numero" placeholder="" required>
            <label id="fecha">Fecha: </label>
            <input type="date" id="fecha" name="fecha" required>
            <label id="cliente">Cliente: </label>
            <input type="text" id="cliente" name="cliente" placeholder="ingresar nombre del cliente" required>
            <label id="origen">Origen: </label>
            <input type="text" id="origen" name="origen" placeholder="ingresar origen" required>
            <label id="destino">Destino: </label>
            <input type="text" id="destino" name="destino" placeholder="ingresar destino" required>
            <div class="w3-red">{{error}}</div>
            <button type="submit" class="boton">Enviar</button>
        </form>
    </section>
</main>


{{> footer}}
