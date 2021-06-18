<?php
session_start();
include_once ("conexion.php");

$sql = 'SELECT * FROM usuario';

$result = mysqli_query($conn,$sql);
$usuarios= mysqli_fetch_all($result,MYSQLI_ASSOC);


$resultado = isset($_SESSION["isLogin"]) ? "true" : "false";

    ?>
        <form action="roles.php" method="post">
    <?php

    foreach ($usuarios as $usuario){
        if($usuario["email"] == $_GET["usuario"] && $usuario["rol"] == "administrador"){
            foreach ($usuarios as $usuario2){


            ?>
            <label><?php echo $usuario2["email"] ?>:</label>

            <select name="roles">
                <option selected disabled>Seleccionar opcion</option>
                <option value="administrador">Administrador</option>
                <option value="chofer">Chofer</option>
            </select>
                <br>

                <?php
            }
                ?>
            <button type="">Enviar</button>
            </form>
<?php
            }
    }


?>