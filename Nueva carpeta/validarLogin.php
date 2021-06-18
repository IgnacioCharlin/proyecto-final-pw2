<?php
    session_start();
    include_once ("conexion.php");

    $sql = 'SELECT * FROM usuario';
    $email = $_POST["email"];
    $contraseña = $_POST["password"];

    $result = mysqli_query($conn,$sql);
    $usuarios= mysqli_fetch_all($result,MYSQLI_ASSOC);

    foreach ($usuarios as $usuario){
        if ($usuario["contraseña"] == $contraseña && $usuario["email"] == $email){
            $_SESSION["isLogin"] = true;
            header('location:index.php?usuario='.$usuario["email"]);
            echo "aca";
        }else{
            echo"no coincide";
        }
    }

    /*foreach ($usuarios as $usuario){
         if (isset($usuario["email"]) == $email && isset($usuario["contraseña"]) == $contraseña){
            header("location: index.php");
         }else{
             echo "Datos incorrectos";
         }
    }*/
?>
