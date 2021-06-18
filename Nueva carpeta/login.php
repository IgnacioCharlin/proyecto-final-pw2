<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>
<body>
<main>
    <form class="formulario-login" action="validarLogin.php" method="post" >
        <input type="text" id="email" name="email" placeholder="ingresar email" required>
        <input type="password" id="password" name="password" placeholder="ingresar contraseña" required>
        <button type="submit">Enviar</button>
        <a href="registrar.php">Ir a registrarme</a>
    </form>
</main>
</body>
</html>
