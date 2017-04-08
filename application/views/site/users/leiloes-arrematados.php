<?php $this->load->view('site/fixed_files/header'); ?>


    <div class="page-content">

        <!--Breadcrumbs-->
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('');?>">Inicio</a></li>
            <li>Leiloes Arrematados: Informações Pessoais</li>
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
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('site/fixed_files/footer'); ?>