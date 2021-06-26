{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="">Ver proforma</a></li>
        </ul>
    </section>
    <section class="reporte">
        <form action="proforma/verProforma" method="POST">
            <label id="numero">Numero De Viaje:</label>
            <input type="number" name="numero" id="numero">
            <button type="submit" class="boton">Buscar</button>
        </form>
    </section>
</main>


{{> footer}}