<?php

session_start();

if (!isset($_SESSION['usuario'])) {
  echo '<script>
          alert("no has iniciado sesion");
        </script>';
  header("location: ./loginSingUp.php");
}

?>


<?php include("../components/head.php") ?>

<body>
  <?php include("../components/header.php") ?>

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
        <p>ID de la denuncia: <?php echo $fila['id']; ?></p>
        <p>Nombre del denunciante: <?php echo $fila['nombre']; ?></p>
        <p>Teléfono del denunciante: <?php echo $fila['telefono']; ?></p>
        <p>Correo electrónico del denunciante: <?php echo $fila['correo']; ?></p>
        <p>Tipo de documento del denunciante: <?php echo $fila['tipo_documento']; ?></p>
        <p>Número de documento del denunciante: <?php echo $fila['numero_documento']; ?></p>
        <p>genero del denunciante: <?php echo $fila['genero']; ?></p>
        <p>Rol denunciante: <?php echo $fila['rol']; ?></p>
        <p>Contenido de la denuncia: <?php echo "<br>" . $fila['contenido']; ?></p>
      </div>
      <hr>
  <?php
    }
  } else {
    echo "No se encontraron resultados";
  }
  ?>

  <?php include("../components/footer.php") ?>
</body>

</html>