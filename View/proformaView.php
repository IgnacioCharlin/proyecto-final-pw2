{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="">Cargar Proforma</a></li>
        </ul>
    </section>
    <section class="reporte">
        <form>
            <input type="text" id="email" name="email" placeholder="ingresar email" required>
            <input type="password" id="password" name="password" placeholder="ingresar contraseña" required>
            <div class="w3-red">{{error}}</div>
            <button type="submit">Enviar</button>
        </form>
    </section>
</main>


{{> footer}}
