

{{> header}}

<main class="login">
    <form class="formulario-login" action="/registrar/registro" method="post" >
        <input class="campos" type="text" id="email" name="email" placeholder="ingresar email" required>
        <input class="campos" type="password" id="password" name="password" placeholder="ingresar contraseña" required>
        <input class="campos" type="password" id="repite-password" name="repite-password" placeholder="repetir contraseña" required>
        <div class="w3-red">{{error}}</div>
        <button type="submit" class="boton">Registrar</button>
        <a href="/" class="cancelar">Cancelar</a>
    </form>
</main>

{{> footer}}