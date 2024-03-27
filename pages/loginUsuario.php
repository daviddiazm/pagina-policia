<?php

include("../conexion.php");
session_start();


if ($_POST) {
  $email = isset($_POST['loginEmail']) ? $_POST['loginEmail'] : NULL;
  $contrsenia = isset($_POST['loginPass']) ? $_POST['loginPass'] : NULL;

  $validarLogin = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo_electronico='$email' AND pass='$contrsenia';");
  print_r($_POST);
  if (mysqli_num_rows($validarLogin) > 0) {
    $_SESSION['usuario'] = $email;
    header("location: ../index.php");
    exit;
  } else {
    header("Location: ./loginSingUp.php?mensaje=El correo electronico o la contraseña es incorrecto");
    exit;
  }
}
