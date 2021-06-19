

{{> header}}

<main>
<form class="formulario-login" action="/login/validar" method="post" >
    <input type="text" id="email" name="email" placeholder="ingresar email" required>
    <input type="password" id="password" name="password" placeholder="ingresar contraseña" required>
    <div class="w3-red">{{error}}</div>
    <button type="submit">Enviar</button>
    <a href="/registrar">Ir a registrarme</a>
</form>
</main>

{{> footer}}