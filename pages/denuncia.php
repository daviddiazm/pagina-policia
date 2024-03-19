<?php
echo "";
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
      <section class="denuncia__form">
        <!-- nombre completo, telefono, correo, tipo de documento, el numero de documento -->
        <h3>Nombre</h3>
        <input type="text" name="denuncianteNombre" id="">
        <h3>Ingrese su telefono</h3>
        <input type="text" name="denuncianteTelefono" id="">
        <h3>Ingrese su correo electronico</h3>
        <input type="text" name="denuncianteCorreo" id="">
        <h3>Seleccione su tipo de documento</h3>
        <select name="selectTipoDoc" id="">
          <option value=""></option>
          <option value="TI">TI (tarjeta de identidad)</option>
          <option value="CC">CC (cedula de ciudadania)</option>
        </select>
        <h3>Digite su numero de identificacion</h3>
        <input type="number" name="denuncianteNumId" id="">
      </section>
      <section class="denuncia__form">
        <!-- la carta -->
        <h3>En el siguiente apartado podra escribir su denuncia</h3>
        <input type="text" name="denuncianteCarta" id="">
        <!-- <area shape="" coords="" href="" alt=""> -->
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

  if (rAnonimo.checkVisibility !== true || rIdentificado.checkVisibility !== true) {
    console.log('no ha seleccionado nada', );
  }

  rAnonimo.addEventListener("change", function() {
    // if (rAnonimo.checked) {
    //   nombre.style.display = "none";
    //   telefono.style.display = "none";
    //   correo.style.display = "none";
    // } else {
    //   nombre.style.display = "block";
    //   telefono.style.display = "block";
    //   correo.style.display = "block";
    // }
    if (rAnonimo.checkVisibility) {
      console.log('hola', rAnonimo);
    }

  });

  rIdentificado.addEventListener("change", () => {
    if (rIdentificado.checkVisibility) {
      console.log('hola', rIdentificado);
    }
  })
</script>

</html>