<?php
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
if (!empty($mensaje)) {
  echo "<script>alert('$mensaje');</script>";
}
?>

<?php include("../components/head.php") ?>

<body>
  <main class="main__login">
    <div class="main__login-blur">

      <article class="box__back">
        <section class="box__back-login">
          <h3>Ya tienes una cueneta?</h3>
          <p>inicia sesion para ingresar a la pagina</p>
          <button class="box__back-login--btn" onclick="login()">
            Iniciar sesion
          </button>
        </section>

        <section class="box__back-register">
          <h3>Ya tienes una cueneta?</h3>
          <p>Registrate para ingresar a la pagina</p>
          <button class="box__back-register--btn" onclick="register()">
            Registrate
          </button>
        </section>
      </article>

      <section class="container__login-register">
        <form action="./loginUsuario.php" method="post" class="form__login">
          <h3>Iniciar sesion</h3>
          <input type="email" name="loginEmail" id="" placeholder="hola@email.com">
          <input type="password" name="loginPass" id="" placeholder="Contraseña">
          <input type="submit" value="Iniciar sesion" class="container__login-register--sub">
        </form>

        <form action="./registrarUsuario.php" method="post" class="form__register">
          <h3>Registrate</h3>
          <input type="text" name="registerName" id="" placeholder="Nombre Completo">
          <input type="email" name="registerEmail" id="" placeholder="hola@email.com">
          <input type="password" name="registerPass" id="" placeholder="Contraseña">
          <input type="password" name="registerCodigo" id="" placeholder="Codigo">
          <input type="submit" value="Registrate" class="container__login-register--sub">
        </form>
      </section>
    </div>
  </main>
  <?php include("../components/footer.php") ?>

  <script>
    var conenedor_login_register = document.querySelector("container__login-register")
    var formulario__login = document.querySelector(".form__login")
    var formulario__register = document.querySelector(".form__register")
    var caja_trasera_login = document.querySelector("box__back-login")
    var caja_trasera_register = document.querySelector("box__back-register")

    // function login() {
    //   formulario__register.style.visibility = "hidden";
    //   formulario__login.style.visibility = "visible"
    //   formulario__login.style.right = "100%"
    // }


    // function register() {
    //   formulario__login.style.visibility = "hidden"
    //   formulario__register.style.visibility = "visible"
    //   formulario__register.style.left = "10%"
    // }
    function login() {
      formulario__register.style.visibility = "hidden";
      formulario__login.style.visibility = "visible";
      if (window.innerWidth <= 768) { // Si es un dispositivo móvil o tiene un ancho de pantalla menor o igual a 768px
        formulario__login.style.bottom = "100px";
        formulario__login.style.right = "30px";
      } else {
        formulario__login.style.right = "100%";
      }
    }

    function register() {
      formulario__login.style.visibility = "hidden";
      formulario__register.style.visibility = "visible";
      if (window.innerWidth <= 768) { // Si es un dispositivo móvil o tiene un ancho de pantalla menor o igual a 768px
        formulario__register.style.right = "30px";
        formulario__register.style.top = "-250px";
      } else {
        formulario__register.style.left = "10%";
      }
    }
  </script>
</body>

</html>