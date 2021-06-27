{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="">Cargar Proforma</a></li>
        </ul>
    </section>
    <section class="reporte">


            <div class="ancho formulario-proforma">
                {{#data}}
                <label class="align-center" id="numero">Numero Proforma: {{numero}}</label>
                <label class="align-center" id="fecha">Fecha: {{fecha}}</label>
                <label class="align-center" id="cliente">Cliente: {{cliente}}</label>

                <label class="align-center" id="origen">Origen: {{origen}} </label>
                <label class="align-center" id="destino">Destino: {{destino}}</label>
                {{/data}}
            </div>

                {{#data}}
            <div class="w3-container w3-red">
                    {{error}}
            </div>
                {{/data}}
            <div >
                <a class="w3-button w3-green w3-margin-top" href="/home">volver</a>
            </div>

    </section>
</main>


{{> footer}}
