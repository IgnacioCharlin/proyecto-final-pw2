{{> header}}

<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/roles">Asignar Rol</a></li>
            <li><a href="/camion">Cargar Camion</a></li>
            <li><a href="/camion/mantenimietnoCamion">Mantenimiento Camion</a></li>
        </ul>
    </section>
    <section class="card-roles">

        <table class="table w3-margin-top">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
                <th scope="col">Enviar mail</th>
                <th scope="col">Cambiar Rol</th>
            </tr>
            </thead>
            {{#usuarios}}
            <form class="formulario-login" action="/roles/update" method="post" >
            <tbody>
            <td>{{name}}</td>
            <input class="id-form" type="text" name="id" id="id"  value="{{id}}">
            <td>
                <select class="campo-rol" name="rol" id="rol" >
                    <option selected>{{rol}}</option>
                    <option>Administrador</option>
                    <option>Chofer</option>
                    <option>Supervisor</option>
                    <option>Inactivo</option>
                </select>
            </td>
            <td>
                <a class="boton amarillo rol-botones" href="/roles/activarPorMail/id={{id}}"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></a>
            </td>
            <td>
                <button type="submit" class="boton rol-botones"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
            </tbody>
            </form>
            {{/usuarios}}
        </table>

        <!--
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
    -->
</main>

{{> footer}}