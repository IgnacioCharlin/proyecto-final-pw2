

{{> header}}

<main>
    <form class="formulario-login" action="/registrar/registro" method="post" >
        <input type="text" id="email" name="email" placeholder="ingresar email" required>
        <input type="password" id="password" name="password" placeholder="ingresar contraseña" required>
        <input type="password" id="repite-password" name="repite-password" placeholder="repetir contraseña" required>
        <div class="w3-red">{{error}}</div>
        <button type="submit">Enviar</button>
    </form>
</main>

{{> footer}}