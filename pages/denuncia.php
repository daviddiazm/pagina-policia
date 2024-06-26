<?php
include("../conexion.php");

if ($_POST) {
  $tipoAnonimato = isset($_POST['radioAnonimoIdentificado']) ? $_POST['radioAnonimoIdentificado'] : "No seleccionado";
  $nombre = isset($_POST['denuncianteNombre']) ? $_POST['denuncianteNombre'] : "No proporcionado";
  $telefono = isset($_POST['denuncianteTelefono']) ? $_POST['denuncianteTelefono'] : "No proporcionado";
  $correo = isset($_POST['denuncianteCorreo']) ? $_POST['denuncianteCorreo'] : "No proporcionado";
  $tipoDoc = isset($_POST['selectTipoDoc']) ? $_POST['selectTipoDoc'] : "No seleccionado";
  $numId = isset($_POST['denuncianteNumId']) ? $_POST['denuncianteNumId'] : "No proporcionado";
  $denunciaTexto = isset($_POST['texto']) ? $_POST['texto'] : "No hay texto";
  $genero = isset($_POST['selectGenero']) ? $_POST['selectGenero'] : "No seleccionado";
  $rol = isset($_POST['selectRol']) ? $_POST['selectRol'] : "No seleccionado";

  // Insertar los datos en la base de datos
  $query = "INSERT INTO `denuncia` (`contenido`, `tipo_anonimato`, `nombre`, `telefono`, `correo`, `tipo_documento`, `numero_documento`, `genero`, `rol`) VALUES ('$denunciaTexto', '$tipoAnonimato', '$nombre', '$telefono', '$correo', '$tipoDoc', '$numId', '$genero', '$rol');";
  $ejecutar = mysqli_query($conexion, $query);
}
?>

<?php include("../components/head.php") ?>

<body>
  <?php include("../components/header.php") ?>
  <main class="denuncia">
    <form action="denuncia.php" method="post" class="form__denuncia">
      <section class="denuncia__form denuncia__form-radio">
        <input type="radio" name="radioAnonimoIdentificado" id="rAnonimo" value="anonimo">
        <label for="rAnonimo">
          <h3>Anonimo</h3>
          <img src="../assets/imgs/hacker.png" alt="">
        </label>
        <input type="radio" name="radioAnonimoIdentificado" id="rIdentificado" value="identificado">
        <label for="rIdentificado">
          <h3>Identificado</h3>
          <img src="../assets/imgs/usuario.png" alt="">
        </label>
      </section>

      <section class="denuncia__form denuncia__form-info">
        <!-- nombre completo, telefono, correo, tipo de documento, el numero de documento -->
        <h3>Nombre</h3>
        <input type="text" name="denuncianteNombre" id="nombre">
        <h3>Ingrese su telefono</h3>
        <input type="number" name="denuncianteTelefono" id="telefono">
        <h3>Ingrese su correo electronico</h3>
        <input type="text" name="denuncianteCorreo" id="correo">
        <h3>Seleccione su tipo de documento</h3>
        <select name="selectTipoDoc" id="tipoDocumento">
          <option value=""></option>
          <option value="TI">TI (tarjeta de identidad)</option>
          <option value="CC">CC (cedula de ciudadania)</option>
        </select>
        <h3>Digite su numero de identificacion</h3>
        <input type="number" name="denuncianteNumId" id="numeroId">
      </section>

      <section class="denuncia__form">
        <h3>Seleccione su género</h3>
        <select name="selectGenero" id="genero">
          <option value=""></option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
          <option value="Otro">Otro</option>
        </select>
      </section>

      <!-- Nueva sección para seleccionar el rol -->
      <section class="denuncia__form">
        <h3>Seleccione su rol</h3>
        <select name="selectRol" id="rol">
          <option value=""></option>
          <option value="Estudiante">Estudiante</option>
          <option value="Docente">Docente</option>
          <option value="Padre de familia">Padre de familia</option>
        </select>
      </section>



      <section class="denuncia__form">
        <!-- la carta -->
        <label for="texto">
          <h3>Escribe tu mensaje:</h3>
        </label><br>
        <!-- <textarea id="texto" name="texto" rows="10" cols="100" class="denuncia__form-carta--area"></textarea> -->
        <textarea id="texto" name="texto" class="denuncia__form-carta--area"></textarea>
      </section>
      <input type="submit" value="Enviar">
    </form>
  </main>
  <?php include("../components/footer.php") ?>

</body>

<script>
  var rAnonimo = document.querySelector("#rAnonimo");
  var rIdentificado = document.querySelector("#rIdentificado");
  var nombre = document.getElementById("nombre");
  var telefono = document.getElementById("telefono");
  var correo = document.getElementById("correo");
  var denunciaInof = document.querySelector(".denuncia__form-info");

  if (rAnonimo.checkVisibility !== true || rIdentificado.checkVisibility !== true) {
    console.log('no ha seleccionado nada', );
  }

  rAnonimo.addEventListener("change", function() {
    if (rAnonimo.checked) {
      // nombre.style.display = "none";
      // telefono.style.display = "none";
      // correo.style.display = "none";
      denunciaInof.style.display = "none";
    }
    if (rAnonimo.checkVisibility) {
      console.log('hola', rAnonimo);
    }

  });

  rIdentificado.addEventListener("change", () => {

    if (rIdentificado.checked) {
      denunciaInof.style.display = "flex";
      console.log('hola', rIdentificado);
    }
  })
</script>

</html>