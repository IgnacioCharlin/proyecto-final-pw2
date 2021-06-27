

{{> header}}

<main class="login">
<form class="formulario-login" action="/login/validar" method="post" >
    <input class="campos" type="text" id="email" name="email" placeholder="ingresar email" required>
    <input class="campos" type="password" id="password" name="password" placeholder="ingresar contraseña" required>
    <div class="w3-red">{{error}}</div>
    <button type="submit" class="boton">Ingresar</button>
    <a href="/registrar" class="registrar">Ir a registrarme</a>
</form>
</main>

{{> footer}}