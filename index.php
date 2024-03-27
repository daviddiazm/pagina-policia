<?php

session_start();
if(isset($_SESSION['usuario'])) {
  header("Location: ./pages/mostrarDenuncias.php");
} else {
  header("Location: ./pages/home.php");
}


?>