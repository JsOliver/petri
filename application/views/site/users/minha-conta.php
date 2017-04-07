<?php $this->load->view('site/fixed_files/header'); ?>
<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('');?>">Inicio</a></li>
        <li>Minha Conta: Informações Pessoais</li>
    </ol><!--Breadcrumbs Close-->

    <!--Account Personal Info-->
    <section>
        <div class="container">
            <div class="row space-top">

                <!--Items List-->
                <div class="col-sm-12 space-bottom">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="tile">

                            <a href="#"><img src="http://127.0.0.1:8080/projects/petri/assets/img/noimage.gif" alt="1"></a>
                            <h2 class="title">Minha Conta</h2>

                            <ul class="list-unstyled space-bottom">
                                <li><a class="large" href="order-history.html">Meus Lances</a></li>
                                <li><a class="large" href="wishlist.html">Historico de Leilões</a></li>
                                <li><a class="large" href="wishlist.html">Leilões Arrematados</a></li>
                                <li><a class="large" href="wishlist.html">Criar e Gerenciar Leilões</a></li>
                            </ul>
                        </div>
                    </div>

                    <?php

                    $this->db->from('users');
                    $this->db->where('id',$_SESSION['ID']);
                    $get = $this->db->get();
                    $result = $get->result_array();



                    ?>
                    <h3>Dados Cadastrais</h3>
                    <div class="row">
                        <form class="col-md-8 personal-info" method="post" novalidate="novalidate">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="api_first_name">Nome</label>
                                    <input value="<?php echo $result[0]['firstname'];?>" type="text" class="form-control" name="api_first_name" id="api_first_name"
                                           placeholder="Nome" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="api_last_name">Sobrenome</label>
                                    <input value="<?php echo $result[0]['lastname'];?>" type="text" class="form-control" name="api_last_name" id="api_last_name"
                                           placeholder="Sobrenome" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="api_email">Email</label>
                                    <input value="<?php echo $result[0]['email'];?>" type="email" disabled class="form-control" name="api_email" id="api_email"
                                           placeholder="Email" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="api_phone">Telefone</label>
                                    <input value="<?php echo $result[0]['telefone'];?>" type="text" class="form-control" name="api_phone" id="api_phone"
                                           placeholder="Telefone" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="api_password">Senha</label>
                                    <input  type="password" class="form-control" name="api_password" id="api_password"
                                           placeholder="Password" required="" pb-role="password">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="api_conf_password">Confirmar Senha</label>
                                    <input type="password" class="form-control" name="api_conf_password"
                                           id="api_conf_password" placeholder="Confirm password" required=""
                                           pb-role="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox custom">
                                    <label>
                                        <div class="icheckbox" style="position: relative;"><input type="checkbox"
                                                                                                  style="position: absolute; opacity: 0;">
                                            <ins class="iCheck-helper"
                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        Sign up for our newsletter!
                                    </label>
                                </div>
                                <div class="checkbox custom">
                                    <label>
                                        <div class="icheckbox" style="position: relative;"><input type="checkbox"
                                                                                                  style="position: absolute; opacity: 0;">
                                            <ins class="iCheck-helper"
                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        Receive special offers from our us.
                                    </label>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success" value="Alterar Dados Cadastrais">
                        </form>
                    </div>
                </div>

                <!--Sidebar-->
            </div>
        </div>
    </section><!--Account Personal Info Close-->

    <!--Catalog Grid-->
    <section class="catalog-grid">
        <div class="container">
            <h2 class="primary-color">Recently viewed</h2>
            <div class="row">
                <?php
                $limit = 4;

                $this->db->from('leiloes');
                $get = $this->db->where('status','1');
                $get = $this->db->or_where('status','4');
                $get = $this->db->order_by('acessos','desc','id_leilao','desc');
                $get = $this->db->limit($limit,0);
                $get = $this->db->get();
                $count = $get->num_rows();
                $result = $get->result_array();

                foreach ($result as $value){
                    $this->load->view('site/itens/leiloes',$value);
                } ?>
            </div>
        </div>
    </section><!--Catalog Grid Close-->

</div>
<?php $this->load->view('site/fixed_files/footer'); ?>

