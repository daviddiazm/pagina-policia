<?php

session_start();

if (!isset($_SESSION['usuario'])) {
  header("location: ./loginSingUp.php");
  echo '<script>
          alert("no has iniciado sesion");
        </script>';
}

if ($_POST) {
  $btnCerrarSesion = isset($_POST['btnCerrarSesion']) ? $_POST['btnCerrarSesion'] : NULL;
  if (isset($btnCerrarSesion)) {
    session_destroy();
    header("location: ./loginSingUp.php");
  }
}

?>


<?php include("../components/head.php") ?>

<body>
  <?php include("../components/header.php") ?>

  <main class="mostrarDenuncias__container">
    <form action="./mostrarDenuncias.php" method="post">
      <input type="submit" value="Cerrar sesion" name="btnCerrarSesion">
    </form>

    <?php
    include("../conexion.php");
    if ($conexion->connect_error) {
      die("Error de conexión: " . $conexion->connect_error);
    }
    $sql = "SELECT * FROM denuncia";
    $resultado = $conexion->query($sql);
    $conexion->close();

    if ($resultado->num_rows > 0) {
      while ($fila = $resultado->fetch_assoc()) {
    ?>
        <div class="ver-denuncia">
          <h2 class="">Tipo de anonimato: <?php echo $fila['tipo_anonimato']; ?></h2>
          <p><span>ID de la denuncia:</span>_ <?php echo $fila['id']; ?></p>
          <p><span>Nombre del denunciante:</span>_ <?php echo $fila['nombre']; ?></p>
          <p><span>Teléfono del denunciante:</span>_ <?php echo $fila['telefono']; ?></p>
          <p><span>Correo electrónico del denunciante:</span>_ <?php echo $fila['correo']; ?></p>
          <p><span>Tipo de documento del denunciante:</span>_ <?php echo $fila['tipo_documento']; ?></p>
          <p><span>Número de documento del denunciante:</span>_ <?php echo $fila['numero_documento']; ?></p>
          <p><span>genero del denunciante:</span>_ <?php echo $fila['genero']; ?></p>
          <p><span>Rol denunciante:</span>_ <?php echo $fila['rol']; ?></p>
          <p><span>Contenido de la denuncia:</span>_ <?php echo "<br>" . $fila['contenido']; ?></p>
        </div>
    <?php
      }
    } else {
      echo "No se encontraron resultados";
    }
    ?>
  </main>
  <?php include("../components/footer.php") ?>
</body>

</html>