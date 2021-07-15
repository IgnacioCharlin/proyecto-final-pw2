{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/cargarDatosViaje">Cargar Gasto</a></li>
        </ul>
    </section>
    <section class="reporte">
        <table class="tabla-proformas w3-table w3-bordered w3-centered">
            <thead>
                <th scope="col">Nro</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cliente</th>
                <th scope="col">Origen</th>
                <th scope="col">Destino</th>
                <th scope="col">patente</th>
                <th scope="col">ver</th>
                <th scope="col">Finalizar</th>
            </thead>
            {{#proforma}}
            <form class="formulario-login" action="/roles/update" method="post" >
                <tbody>
                    <td>{{numero}}</td>
                    <td>{{fecha}}</td>
                    <td>{{cliente}}</td>
                    <td>{{origen}}</td>
                    <td>{{destino}}</td>
                    <td>{{id_camion}}</td>
                    <td><a href="proforma/verProforma?numero={{numero}}"><i class="icono-ver fa fa-eye" aria-hidden="true"></i></a></td>
                    <td><a href="cargarDatosViaje/consultarGastos?numero={{numero}}"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></td>
                </tbody>
            </form>
            {{/proforma}}
        </table>
        {{#msg}}
        <div class="w3-panel w3-green">
            <h3>{{msg}}</h3>
        </div>
        {{/msg}}
    </section>
</main>
{{> footer}}