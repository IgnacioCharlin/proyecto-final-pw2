{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/cargarDatosViaje">Actulizar estado del viaje</a></li>

        </ul>
    </section>
    <section class="reporte">


        <div class="formulario-gasto">
            <table class="tabla-proformas w3-table w3-bordered w3-centered">
                <thead>
                    <th scope="col">Patente</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Dias Consumidos</th>
                    <th scope="col">Precio</th>
                </thead>
                {{#reparaciones}}
                <tbody>

                    <td>{{patente}}</td>
                    <td>{{descripcion}}</td>
                    <td>{{cant_dias}}</td>
                    <td>{{precio}}</td>

                    {{/reparaciones}}
                    <a href="/home" class="cancelar finalizar">Finalizar</a>
                    {{#montoTotal}}
                    <div class="total-gasto">
                        <p>total:</p>
                        <p class="total">{{montoTotal}}</p>
                    </div>
                    {{/montoTotal}}
                </tbody>
            </table>

        </div>

        {{#data}}
        <div  class="w3-red">
            {{error}}
        </div>
        {{/data}}




    </section>
</main>


{{> footer}}
