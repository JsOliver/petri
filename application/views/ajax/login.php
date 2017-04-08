<form method="post" action="<?php echo base_url('LoginForm'); ?>" id="login-forms">
    <div class="form-group group">
        <label for="log-email">Email</label>
        <input type="email" class="form-control" name="emaill" id="log-email"
               placeholder="Entre com Seu E-mail" required>
        <!-- <a class="help-link" href="#">Forgot email?</a>-->
    </div>
    <div class="form-group group">
        <label for="log-password">Senha</label>
        <input type="text" class="form-control" name="senhal" id="log-password"
               placeholder="Entre com sua Senha" required>
        <a class="help-link" href="#">Esqueceu a Senha?</a>
    </div>
    <input type="hidden" name="typeLog" value="1">

    <!--  <div class="checkbox">
          <label><input type="checkbox" name="remember"> Lembre-me</label>
      </div>-->
    <input class="btn btn-success" type="submit" value="Login">
</form>