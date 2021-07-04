{{> header}}

<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/proforma">Cargar Proforma</a></li>
            <li><a href="/roles">Asignar Rol</a></li>
        </ul>
    </section>
    <section class="card-roles">
    {{#usuarios}}
    <form class="formulario-login" action="/roles/update" method="post" >

        <tr>
            <td>{{name}}</td>
            <input class="id-form" type="text" name="id" id="id"  value="{{id}}">
            <select class="campos" name="rol" id="rol" >
                <option selected>{{rol}}</option>
                <option>Administrador</option>
                <option>Chofer</option>
                <option>Supervisor</option>
                <option>Inactivo</option>
            </select>
            <br/>

        </tr>
        <a class="boton-a w3-green w3-margin-bottom" href="/roles/activarPorMail/id={{id}}">enviar mail</a>
        <input type="submit" class="boton">
    </form>
    {{/usuarios}}
    </section>
</main>

{{> footer}}