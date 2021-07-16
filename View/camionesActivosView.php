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
    <section class="reporte">
        <table class="tabla-proformas w3-table w3-bordered w3-centered">
            {{#res}}
            <div class="w3-panel w3-green">
                <h3>{{res}}</h3>
            </div>
            {{/res}}
            <thead>
            <tr>
                <th scope="col">Patente</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Mantenimiento</th>
            </tr>
            </thead>
            {{#data}}
            <form class="formulario-login" action="/roles/update" method="post" >
                <tbody>
                <td>{{patente}}</td>
                <td>{{marca}}</td>
                <td>{{modelo}}</td>
                <td><a href="/camion/enviarMantenimiento?patente={{patente}}"><i class="fa fa-truck" aria-hidden="true"></i></a></td>

                </tbody>
            </form>
            {{/data}}
        </table>

        <div class="w3-red">{{error}}</div>
</main>

{{> footer}}
