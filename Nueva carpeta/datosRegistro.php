<?php

    include_once ("conexion.php");

    $email = $_POST["email"];
    $contraseña = $_POST["password"];
    $repiteContraseña = $_POST["repite-password"];


$sql = "INSERT INTO usuario (email,contraseña) values ('$email','$contraseña')";

if($contraseña == $repiteContraseña){
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}else{
    echo "claves no coinciden";
}
mysqli_close($conn);


?>