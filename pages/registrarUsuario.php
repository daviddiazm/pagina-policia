<?php
include("../conexion.php");

function mostrarMensaje($mensaje, $tiempo)
{
  echo $mensaje;
  ob_flush();
  flush();
  sleep($tiempo);
}

if ($_POST) {
  $nombre = isset($_POST['registerName']) ? $_POST['registerName'] : NULL;
  $email = isset($_POST['registerEmail']) ? $_POST['registerEmail'] : NULL;
  $contrsenia = isset($_POST['registerPass']) ? $_POST['registerPass'] : NULL;
  $codigo = isset($_POST['registerCodigo']) ? $_POST['registerCodigo'] : NULL;
  if ($codigo === "0123") {
    $query = "INSERT INTO `usuario` (`nombre`, `correo_electronico`, `pass`) VALUES ('$nombre', '$email', '$contrsenia');";
    $ejecutar = mysqli_query($conexion, $query);
    // header("Location: ../index.php");
    header("Location: ./loginSingUp.php?mensaje=Ya puedes iniciar sesion");
    exit();
  } else {
    // echo '<script>alert("el codigo es incorrecto")</script>';
    // header("Location: ./loginSingUp.php");
    header("Location: ./loginSingUp.php?mensaje=El código es incorrecto");
    exit();
  }
}
