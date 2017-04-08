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
                <div class="col-sm-12 space-bottom">
                <!--Items List-->

                    <?php
                    $this->load->view('site/users/fixed_files/menu');
                    ?>
                    <?php

                    $this->db->from('users');
                    $this->db->where('id',$_SESSION['ID']);
                    $get = $this->db->get();
                    $result = $get->result_array();



                    ?>
                <h3>Dados Cadastrais</h3>

                <div class="row">
                    <div class="col-md-8 personal-info" method="post" novalidate="novalidate">

                        <div class="tab-content">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Dados Cadastrais</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Alterar Senha</a></li>

                            </ul><br>
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                    <form class="col-md-8">
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
                                                <input value="<?php echo $result[0]['telefone'];?>" type="text" class="form-control" name="api_phone" id="api_phone" placeholder="Telefone" required="" minlength="15">
                                            </div>
                                        </div>


                                        <input type="submit" class="btn btn-success" value="Alterar Dados Cadastrais">
                                    </form>
                                </div>


                            </div>

                            <script>

                            </script>
                            <div role="tabpanel" class="tab-pane" style="wi" id="profile">

                                <div class="row">
                                    <form class="col-md-8" method="post">

                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="api_password">Senha Atual</label>
                                                <input  type="password" class="form-control" name="api_password_atual" id="senha_atual"
                                                        placeholder="Senha Atual" required="">
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="api_password">Nova Senha</label>
                                                <input  type="password" class="form-control" name="api_password_new" id="nova_senha"
                                                        placeholder="Nova Senha" required=""  minlength="6">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="api_conf_password">Confirmar Senha</label>
                                                <input type="password" class="form-control" name="api_password_new_again"
                                                       id="nova_senha_again" placeholder="Confirmar Senha" required="" minlength="6"
                                                >
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-success" value="Alterar Senha">
                                    </form>
                                </div>


                            </div>

                        </div>

                    </div>
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

