{{> header}}
<main class="main-home">
    <section class="tareas">
        <ul>
            <li><a href="/home">Inicio</a></li>
            <li><a href="/cargarDatosViaje/posicion">Cargar Gasto</a></li>
        </ul>
    </section>
    <section class="reporte">


            <div class="formulario-login">
                {{#data}}
                <label class="align-center" id="numero">Numero Proforma: {{numero}}</label>
                <label class="align-center" id="fecha">Fecha: {{fecha}}</label>
                <label class="align-center" id="cliente">Cliente: {{cliente}}</label>
                <label class="align-center" id="origen">Origen: {{origen}} </label>
                <label class="align-center" id="destino">Destino: {{destino}}</label>
                <label class="align-center" id="origen">Km Previstos: {{km_previsto}} </label>
                <label class="align-center" id="destino">Combustible: {{combustible_previsto}}</label>
                <label class="align-center" id="origen">Legajo Chofer: {{id_chofer}} </label>
                <label class="align-center" id="destino">Patente camión: {{id_camion}}</label>
                <div class="botones">
                    <a class="cancelar w3-margin-top w3-col" href="/home">volver</a>
                </div>

                {{/data}}
            </div>

                {{#data}}
            <div  class="w3-red">
                    {{error}}
            </div>
                {{/data}}




    </section>
</main>


{{> footer}}
