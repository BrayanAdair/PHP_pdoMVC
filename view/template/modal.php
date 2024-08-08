<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="title-default-bold mb-none">Ingresar Sesión</div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="login-form" method="POST" action="php/login.php">
            <input class="main-input-box" type="text" name="correo" placeholder="Correo" required />
            <input class="main-input-box" type="password" name="contrasena" placeholder="Contraseña" required />
            <div class="inline-box mb-5 mt-4">
              <div class="checkbox checkbox-primary">
                <input id="checkbox1" type="checkbox">
                <label for="checkbox1">Recuérdame</label>
              </div>
              <label class="lost-password"><a href="#">¿Olvidaste tu contraseña?</a></label>
            </div>
            <div class="inline-box mb-5 mt-4">
              <button class="btn-fill" type="submit" value="Login">Iniciar Sesión</button>
              <a href="#" class="btn-register"><i class="fas fa-user"></i>Regístrate aquí!</a>
            </div>
          </form>
          <label>Ingresa sesión con tus redes sociales</label>
          <div class="login-box-social">
            <ul>
              <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="#" class="google"><i class="fab fa-google-plus-g"></i></a></li>
            </ul>
          </div>
          <?php
                // Muestra un mensaje de error si existe
                if (isset($error_message)) {
                    echo "<p style='color: red;'>$error_message</p>";
                }
                ?>
        </div>
      </div>
    </div>
  </div>