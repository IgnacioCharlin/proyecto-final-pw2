{{> header}}

<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="">Cargar Desvio</a></li>
            <li><a href="">Enviar Reporte</a></li>
            <li><a href="">Aviso Cliente</a></li>
            <li><a href="roles">Asignar Rol</a></li>
        </ul>
    </section>
    <form class="formulario-login" action="/roles/update" method="POST" >
        {{#usuarios}}
        <tr>
            <td>{{name}}</td>
            <select>
                <option selected>{{rol}}</option>
                <option>Administrador</option>
                <option>Inactivo</option>
            </select>
            <br/>
            <br/>
            <br/>
            <br/>
        </tr>
        {{/usuarios}}
        <input type="submit" class="boton">
    </form>
</main>

{{> footer}}