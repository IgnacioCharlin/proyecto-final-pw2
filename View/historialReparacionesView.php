{{> header}}

<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/camion/reparacion">Cargar Reparacion</a></li>
            <li><a href="/camion/historialReparaciones">Historial Reparacion</a></li>
        </ul>
    </section>
    <section class="reporte">
        <table class="tabla-proformas w3-table w3-bordered w3-centered">
            <thead>
            <tr>
                <th scope="col">Patente</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad De Dias</th>
            </tr>
            </thead>
            {{#reparaciones}}
            <form class="formulario-login" action="/roles/update" method="post" >
                <tbody>
                <td>{{patente}}</td>
                <td>{{descripcion}}</td>
                <td>{{precio}}</td>
                <td>{{cant_dias}}</td>
                </tbody>
            </form>
            {{/reparaciones}}
        </table>
        {{#msg}}
        <div class="w3-panel w3-green">
            <h3>{{msg}}</h3>
        </div>
        {{/msg}}
        <div class="w3-red">{{error}}</div>
</main>

{{> footer}}
