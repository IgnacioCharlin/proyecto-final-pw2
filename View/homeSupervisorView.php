{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/camion">Cargar Camion</a></li>
            <li><a href="">Cargar Semi</a></li>
        </ul>
    </section>
    <section class="reporte">
        <article class="agregar-proforma">
            <a href="/proforma">Agregar Proforma</a>
        </article>
        <table class="tabla-proformas w3-table w3-bordered w3-centered">
            <thead>
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cliente</th>
                <th scope="col">Origen</th>
                <th scope="col">Destino</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
            </thead>
            {{#proforma}}
            <form class="formulario-login" action="/roles/update" method="post" >
                <tbody>
                <td>{{numero}}</td>
                <td>{{fecha}}</td>
                <td>{{cliente}}</td>
                <td>{{origen}}</td>
                <td>{{destino}}</td>
                <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td><a href="proforma/eliminarProforma?numero={{numero}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                </tbody>
            </form>
            {{/proforma}}
        </table>
    </section>
</main>


{{> footer}}
