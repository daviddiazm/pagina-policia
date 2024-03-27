<?php

include("../conexion.php");
session_start();


if ($_POST) {
  $email = isset($_POST['loginEmail']) ? $_POST['loginEmail'] : NULL;
  $contrsenia = isset($_POST['loginPass']) ? $_POST['loginPass'] : NULL;

  $validarLogin = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo_electronico='$email' AND pass='$contrsenia';");
  if (mysqli_num_rows($validarLogin) > 0) {
    header("location: ../index.php");
    $_SESSION['usuario'] = $email;
    exit;
  } else {
    header("Location: ./loginSingUp.php?mensaje=El correo electronico o la contraseña es incorrecto");
    exit;
  }
}
