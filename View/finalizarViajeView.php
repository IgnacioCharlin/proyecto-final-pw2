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
                    <th scope="col">Km Reales</th>
                    <th scope="col">Km Previstos</th>
                    <th scope="col">Combustible gastado</th>
                    <th scope="col">Combustible previsto</th>
                    <th scope="col">Gastos adicionales</th>

                </thead>
                {{#data}}
                <tbody>{{#kilometros}}
                    <td>{{km_reales}}</td>
                    <td>{{km_previsto}}</td>
                {{/kilometros}}
                {{#combustible}}
                    <td>{{gastado}}</td>
                    <td>{{previsto}}</td>
                {{/combustible}}
                {{#otros}}
                <td>{{otros}}</td>

                {{/otros}}
                    <a href="/cargarDatosViaje/finalizarViaje?numero={{numeroViaje}}" class="cancelar finalizar">Finalizar</a>
                    {{#total}}
                    <div class="total-gasto">
                        <p>total:</p>
                        <p class="total">{{total}}</p>
                    </div>
                    {{/total}}


                {{/data}}
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
