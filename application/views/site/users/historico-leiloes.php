<?php $this->load->view('site/fixed_files/header'); ?>


    <div class="page-content">

        <!--Breadcrumbs-->
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('');?>">Inicio</a></li>
            <li>Historico de Leilões: Informações Pessoais</li>
        </ol><!--Breadcrumbs Close-->


        <section>
            <div class="container">
                <div class="row space-top">
                    <div class="col-sm-12 space-bottom">
                        <?php
                        $this->load->view('site/users/fixed_files/menu');
                        ?>
                        <?php

                        $this->db->from('users');
                        $this->db->where('id',$_SESSION['ID']);
                        $get = $this->db->get();
                        $result = $get->result_array();



                        ?>

                       <?php $limit = 30;

                        $this->db->from('leiloes');

                        $get = $this->db->get();
                        $count = $get->num_rows();

                        if ($count > 0):
                        ?>
                        <!--Catalog Grid-->
                        <section class="catalog-grid">
                            <div class="container">
                                <h2 class="primary-color">Historico de Acesso de Leilões</h2>
                                <div class="row" id="leiloes">

                                    <?php


                                    $this->db->from('leiloes');
                                    $this->db->order_by('acessos', 'desc', 'id_leilao', 'desc');
                                    $this->db->limit($limit, 0);
                                    $get = $this->db->get();
                                    $count = $get->num_rows();
                                    $result = $get->result_array();

                                    foreach ($result as $value) {
                                        $this->load->view('site/itens/leiloes', $value);
                                    }

                                    ?>


                                </div>
                            </div>
                        </section>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $this->load->view('site/fixed_files/footer'); ?>