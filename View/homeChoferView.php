{{> header}}
<main class="main-home">
   <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="gastos">Cargar Gasto</a></li>
        </ul>
    </section>
    <section class="reporte">
        <form class="formulario-login" action="proforma/verProforma" method="POST">
            <label id="numero">Numero De Viaje:</label>
            <input class="campos" type="number" name="numero" id="numero" REQUIRED>
            <button type="submit" class="boton">BUSCAR</i></button>
        </form>
    </section>
</main>


{{> footer}}