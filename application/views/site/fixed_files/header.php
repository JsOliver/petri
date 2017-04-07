<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title><?php echo $metas['meta_title']; ?></title>
    <!--SEO Meta Tags-->
    <meta name="description" content="<?php echo $metas['meta_description']; ?>"/>
    <meta name="keywords"  content="<?php  echo $metas['meta_keywords'];  ?>"/>
    <meta name="author" content="8Guild"/>
    <!--Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?php
    echo $cogs['css'];
    echo $cogs['js_externo'];
    ?>
    <style>
        @media screen and (min-width: 480px) {
            .texto-carregando {
                display: none;
            }
        }
    </style>
</head>
<!--Body-->
<body>
<script>
    var DIR = '<?php echo base_url('');?>';
    </script>
<?php

if ($logado == false):
    ?>
    <!--Login Modal-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="fa fa-times"></i></button>
                    <h2>Entre ou <a href="<?php echo base_url('entrar'); ?>">Cadastre-se</a></h2>
                    <!--<p class="large">Use social accounts</p>
                    <div class="social-login">
                        <a class="facebook" href="#"><i class="fa fa-facebook-square"></i></a>
                        <a class="google" href="#"><i class="fa fa-google-plus-square"></i></a>
                        <a class="twitter" href="#"><i class="fa fa-twitter-square"></i></a>
                    </div>-->
                </div>
                <div class="modal-body">
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
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php endif; ?>
<!--Header-->
<header data-offset-top="500" data-stuck="600">
    <!--data-offset-top is when header converts to small variant and data-stuck when it becomes visible. Values in px represent position of scroll from top. Make sure there is at least 100px between those two values for smooth animation-->

    <!--Search Form-->
    <form class="search-form closed" method="get" role="form" action="<?php echo base_url('buscar');?>" autocomplete="off">
        <div class="container">
            <div class="close-search"><i class="icon-delete"></i></div>
            <div class="form-group">
                <label class="sr-only" for="search-hd">Buscar Leilão </label>
                <input type="text" class="form-control" name="q" id="search-hd" placeholder="Buscar Leilão" value="<?php if(isset($_GET['q'])): echo $_GET['q']; endif;?>">
                <button type="submit"><i class="icon-magnifier"></i></button>
            </div>
        </div>
    </form>

    <!--Split Background-->
    <div class="left-bg"></div>
    <div class="right-bg"></div>

    <div class="container">
        <a style="top:5%;" class="logo" href="<?php echo base_url(''); ?>"><img width="150" src="<?php echo base_url('web/img/logo.png'); ?>"
                                                                alt="Bushido"/></a>

        <!--
        <ul class="switchers">
            <li>$
                <ul class="dropdown">
                    <li><a href="#">&euro;</a></li>
                    <li><a href="#">$</a></li>
                </ul>
            </li>
            <li>En
                <ul class="dropdown">
                    <li><a href="#">En</a></li>
                    <li><a href="#">Fr</a></li>
                    <li><a href="#">Gr</a></li>
                </ul>
            </li>
        </ul> -->

        <!--Mobile Menu Toggle-->
        <div class="menu-toggle"><i class="fa fa-list"></i></div>
        <div class="mobile-border"><span></span></div>

        <!--Main Menu-->
        <nav class="menu">
            <ul class="main">
                <li class="has-submenu"><a href="<?php echo base_url('');?>">Home<i class="fa fa-chevron-down"></i></a>
                    <!--Class "has-submenu" for proper highlighting and dropdown-->
                </li>
                <li class="has-submenu"><a href="<?php echo base_url('leiloes-abertos') ?>">Leilões Abertos<i
                            class="fa fa-chevron-down"></i></a>

                    <?php

                    $dropdown_limit = 10;

                    $this->db->from('leiloes');
                    $get = $this->db->where('data_inicio <=', date('YmdHis'));
                    $get = $this->db->where('status', '1');
                    $get = $this->db->or_where('status', '4');
                    $get = $this->db->get();
                    $count = $get->num_rows();

                    if ($count > 0):
                        ?>
                        <ul class="submenu">
                            <?php
                            $this->db->from('leiloes');
                            $get = $this->db->where('data_inicio <=', date('YmdHis'));
                            $get = $this->db->where('status', '1');
                            $get = $this->db->or_where('status', '4');
                            $get = $this->db->order_by('acessos', 'desc', 'id_leilao', 'desc');
                            $get = $this->db->limit($dropdown_limit, 0);
                            $get = $this->db->get();
                            $count = $get->num_rows();
                            $result = $get->result_array();

                            foreach ($result as $value) {
                                ?>
                                <li>
                                    <a href="<?php echo base_url('leilao/') . str_replace(' ', '-', strtolower($value['loja'])) . '/' . $value['id_leilao']; ?>"><?php echo $value['nome']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php endif; ?>
                </li>
                <li class="has-submenu"><a href="<?php echo base_url('proximos-leiloes') ?>">Próximos Leilões<i
                            class="fa fa-chevron-down"></i></a>

                    <?php


                    $this->db->from('leiloes');
                    $get = $this->db->where('data_inicio >', date('YmdHis'));
                    $get = $this->db->where('status', '1');
                    $get = $this->db->or_where('status', '4');
                    $get = $this->db->get();
                    $count = $get->num_rows();

                    if ($count > 0):
                        ?>
                        <ul class="submenu">
                            <?php
                            $this->db->from('leiloes');
                            $get = $this->db->where('data_inicio >', date('YmdHis'));
                            $get = $this->db->where('status', '1');
                            $get = $this->db->or_where('status', '4');
                            $get = $this->db->order_by('acessos', 'desc', 'id_leilao', 'desc');
                            $get = $this->db->limit($dropdown_limit, 0);
                            $get = $this->db->get();
                            $count = $get->num_rows();
                            $result = $get->result_array();

                            foreach ($result as $value) {
                                ?>
                                <li>
                                    <a href="<?php echo base_url('leilao/') . str_replace(' ', '-', strtolower($value['loja'])) . '/' . $value['id_leilao']; ?>"><?php echo $value['nome']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php endif; ?>
                </li>
                <li class="hide-sm"><a href="<?php echo base_url('fale-conosco') ?>">Fale Conosco</a></li>
            </ul>

            <?php

            $this->db->from('categorias');
            $this->db->order_by('acessos', 'desc', 'id_categoria', 'desc');
            $this->db->limit(5, 0);
            $this->db->where('status', '1');
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):

                ?>

                <ul class="catalog">

                    <?php
                    $replace = array('@', '#', '/', '|', '\'', '(', ')');
                    $result = $get->result_array();
                    foreach ($result as $value) {


                        ?>

                        <li class="has-submenu"><a
                                href="<?php echo base_url('categoria/') . str_replace(' ', '-', str_replace($replace, '', strtolower($value['nome']))); ?>"><?php echo $value['nome']; ?>
                                <i
                                    class="fa fa-chevron-down"></i></a>

                            <?php
                            if ($value['tipo'] == 1):
                                ?>
                                <?php

                                $this->db->from('subcategorias');
                                $this->db->where('categoria_id', $value['id_categoria']);
                                $get = $this->db->get();
                                $count = $get->num_rows();

                                if ($count > 0):
                                    ?>
                                    <ul class="submenu" style="height: 250px;">

                                        <?php


                                        $result = $get->result_array();

                                        foreach ($result as $values) {
                                            ?>

                                            <?php if ($values['tipo'] == 0 or $values['tipo'] <> 1 and $values['tipo'] <> 2): ?>
                                                <li>
                                                    <a href="<?php echo base_url('categoria/') . str_replace(' ', '-', str_replace($replace, '', strtolower($value['nome']))) . '/' . str_replace(' ', '-', str_replace($replace, '', strtolower($values['nome']))); ?>"><?php echo $values['nome'] ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if ($values['tipo'] == 1): ?>
                                                <li class="has-submenu"><a
                                                        href="<?php echo base_url('categoria/') . str_replace(' ', '-', str_replace($replace, '', strtolower($value['nome']))) . '/' . str_replace(' ', '-', str_replace($replace, '', strtolower($values['nome']))); ?>"><?php echo $values['nome'] ?></a>
                                                    <ul class="sub-submenu">

                                                        <?php

                                                        $subsexplode = explode('<==>', $values['sub-subcategoria']);
                                                        $countarray = count($subsexplode);

                                                        if ($countarray > 0 and !empty($subsexplode[0])):
                                                            $subscts = 0;
                                                            foreach ($subsexplode as $subcategorias) {

                                                                if ($subscts < 5):
                                                                    ?>
                                                                    <li>
                                                                        <a href="<?php echo base_url('categoria/') . str_replace(' ', '-', str_replace($replace, '', strtolower($value['nome']))) . '/' . str_replace(' ', '-', str_replace($replace, '', strtolower($values['nome']))) . '/' . str_replace(' ', '_', str_replace($replace, '', strtolower($subcategorias))); ?>"><?php echo $subcategorias; ?></a>
                                                                    </li>

                                                                <?php endif;
                                                                $subscts++;
                                                            } endif; ?>

                                                    </ul>
                                                </li>
                                            <?php endif; ?>

                                            <?php
                                            $this->db->from('leiloes');
                                            $this->db->where('categoria', $value['id_categoria']);
                                            $this->db->where('subcategoria', $values['id_subcategoria']);
                                            $this->db->order_by('id_leilao', 'rand()', 'acessos', 'desc', 'rate', 'desc');
                                            $get = $this->db->get();
                                            $count = $get->num_rows();

                                            if ($count > 0):
                                                $result = $get->result_array();
                                                ?>
                                                <li class="offer">
                                                    <div class="col-1">
                                                        <p class="p-style2">
                                                            <?php

                                                            echo $this->Functions_Model->limitarTexto($result[0]['descricao'], 150);

                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-2">
                                                        <img src="<?php

                                                            if (empty($result[0]['fotos'])):

                                                                echo base_url('assets/img/noimage.gif');
                                                            else:

                                                                $explode_ft = explode('(<==>)',$result[0]['fotos']);
                                                                echo base_url('web/fotos/leiloes/').$explode_ft[0];
                                                            endif;

                                                            ?>
                                                         "
                                                            alt="Special Offer" style="width: 100%;height: 160px;object-fit: cover; object-position: center;"/>
                                                            <a class="btn btn-block" href="<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($result[0]['loja'])).'/'.$result[0]['id_leilao'];?>">Participar do Leilão</a>
                                                    </div>
                                                </li>

                                                <?php
                                            endif;

                                        }

                                        ?>
                                    </ul>

                                    <?php
                                endif;

                            endif; ?>
                        </li>
                    <?php } ?>
                </ul>

            <?php endif; ?>
        </nav>

        <!--Toolbar-->

        <?php
        if ($logado == true):
            ?>
            <div class="toolbar group">
                <button class="search-btn btn-outlined-invert"><i class="icon-magnifier"></i></button>
                <div class="middle-btns">
                    <a class="btn-outlined-invert" href="<?php echo base_url('minha-conta'); ?>"><i
                            class="icon-profile"></i> <span>Painel</span></a>
                    <a class="login-btn btn-outlined-invert" href="javascript:logout()"><i class="icon-sinth"></i>
                        <span>Sair</span></a>
                </div>

            </div>
        <?php else: ?>
            <div class="toolbar group">
                <button class="search-btn btn-outlined-invert"><i class="icon-magnifier"></i></button>
                <div class="middle-btns">
                    <a class="btn-outlined-invert" href="<?php echo base_url('entrar'); ?>"><i
                            class="icon-paper-pencil"></i> <span>Cadastro</span></a>
                    <a class="login-btn btn-outlined-invert" href="#" data-toggle="modal" data-target="#loginModal"><i
                            class="icon-profile"></i> <span>Entrar</span></a>
                </div>

            </div>
        <?php endif; ?>
        <!--Toolbar Close-->
    </div>
</header><!--Header Close-->
<div class="content-loading"></div>