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
    {{#usuarios}}
    <form class="formulario-login" action="/roles/update" method="post" >

        <tr>
            <td>{{name}}</td>
            <input type="text" name="id" id="id"  value="{{id}}">
            <select name="rol" id="rol" >
                <option selected>{{rol}}</option>
                <option>Administrador</option>
                <option>Inactivo</option>
            </select>
            <br/>

        </tr>

        <input type="submit" class="boton">
    </form>
    {{/usuarios}}
</main>

{{> footer}}