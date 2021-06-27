{{> header}}

<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="roles">Asignar Rol</a></li>
        </ul>
    </section>
    {{#usuarios}}
    <form class="formulario-login" action="/roles/update" method="post" >

        <tr>
            <td>{{name}}</td>
            <input class="campos" type="text" name="id" id="id"  value="{{id}}">
            <select class="campos" name="rol" id="rol" >
                <option selected>{{rol}}</option>
                <option>Administrador</option>
                <option>Chofer</option>
                <option>Supervisor</option>
                <option>Inactivo</option>
            </select>
            <br/>

        </tr>

        <input type="submit" class="boton">
    </form>
    {{/usuarios}}
</main>

{{> footer}}