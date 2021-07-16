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
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Monto</th>
                </thead>
                {{#data}}
                <tbody>

                    <td>{{fecha}}</td>
                    <td>{{hora}}</td>
                    <td>{{descripcion}}</td>
                    <td>{{gasto}}</td>

                    {{/data}}
                    <a href="/cargarDatosViaje/finalizarViaje?numero={{numeroViaje}}" class="cancelar finalizar">Finalizar</a>
                    {{#total}}
                    <div class="total-gasto">
                        <p>total:</p>
                        <p class="total">{{total}}</p>
                    </div>
                    {{/total}}
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
