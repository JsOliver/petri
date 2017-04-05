<?php $this->load->view('site/fixed_files/header'); ?>


<!--Page Content-->
<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('');?>">Inicio</a></li>
        <li>Entrar/ Cadastrar</li>
    </ol><!--Breadcrumbs Close-->

    <!--Login / Register-->
    <section class="log-reg container">
        <h2>Entrar/ Cadastrar</h2>
        <!--<p class="large">Use social accounts</p>
        <div class="social-login">
            <a class="facebook" href="#"><i class="fa fa-facebook-square"></i></a>
            <a class="google" href="#"><i class="fa fa-google-plus-square"></i></a>
            <a class="twitter" href="#"><i class="fa fa-twitter-square"></i></a>
        </div>-->
        <div class="row">
            <!--Login-->
            <div class="col-lg-5 col-md-5 col-sm-5">
                <form method="post" action="<?php echo base_url('LoginForm');?>" id="login-forms2">
                    <div class="form-group group">
                        <label for="log-email2">Email</label>
                        <input type="email" class="form-control"  name="emaills" id="log-email"  placeholder="Entre com seu E-mail" required>
                        <a class="help-link" href="#">Esqueceu seu E-mail?</a>
                    </div>

                    <div class="form-group group">
                        <label for="log-password2">Senha</label>
                        <input type="password" class="form-control" name="senhals" id="log-password" placeholder="Entre com sua Senha" required>
                        <a class="help-link" href="#">Esqueceu sua Senha?</a>
                    </div>
                  <!--  <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Lembre-me</label>
                    </div>-->
                    <input type="hidden" name="typeLogs" value="1">

                    <input class="btn btn-success" type="submit" value="Login">
                </form>
            </div>
            <!--Registration-->
            <div class="col-lg-7 col-md-7 col-sm-7">
                <form method="post" action="<?php echo base_url('CadastroForm');?>" class="registr-form" id="registr-form">
                    <div class="form-group group">
                        <label for="rf-email">Nome</label>
                        <input type="text" class="form-control" name="nome" id="rf-nome" placeholder="Informe seu nome" required>
                    </div>

                    <div class="form-group group">
                        <label for="rf-email">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" id="rf-lastname" placeholder="Informe seu Sobrenome" required>
                    </div>


                    <div class="form-group group">
                        <label for="rf-email">Email</label>
                        <input type="email" class="form-control" name="email" id="rf-email" placeholder="Informe seu e-mail" required>
                    </div>
                    <div class="form-group group">
                        <label for="rf-password">Senha</label>
                        <input type="password" class="form-control" name="senha" id="rf-password" placeholder="Informe sua senha" required>
                    </div>

                    <div class="checkbox">
                        <label><input type="checkbox" name="agread" required> I have read and agree with the terms</label><br>
                        <b><?php echo $errorReport?></b>
                    </div>
                    <input class="btn btn-success" type="submit" value="Register">


                </form>
            </div>
        </div>
    </section><!--Login / Register Close-->

    <!--Brands Carousel Widget-->
    <section class="brand-carousel">
        <div class="container">
            <h2>Brands in our shop</h2>
            <div class="inner">
                <a class="item" href="#"><img src="img/brands/1.png" alt="1"/></a>
                <a class="item" href="#"><img src="img/brands/1.png" alt="1"/></a>
                <a class="item" href="#"><img src="img/brands/1.png" alt="1"/></a>
                <a class="item" href="#"><img src="img/brands/1.png" alt="1"/></a>
                <a class="item" href="#"><img src="img/brands/1.png" alt="1"/></a>
                <a class="item" href="#"><img src="img/brands/1.png" alt="1"/></a>
                <a class="item" href="#"><img src="img/brands/1.png" alt="1"/></a>
            </div>
        </div>
    </section><!--Brands Carousel Close-->

</div><!--Page Content Close-->

<?php $this->load->view('site/fixed_files/footer'); ?>
