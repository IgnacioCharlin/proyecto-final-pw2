{{> header}}
<main class="main-home">
   <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/cargarDatosViaje">Cargar Gasto</a></li>
            <li><a href="/cargarDatosViaje/posicion">Cargar Posición</a></li>
        </ul>
    </section>
    <section class="reporte">

        <table class="tabla-proformas mt-3">
            <thead>
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cliente</th>
                <th scope="col">Origen</th>
                <th scope="col">Destino</th>
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
                </tbody>
            </form>
            {{/proforma}}
        </table>
    </section>
</main>


{{> footer}}