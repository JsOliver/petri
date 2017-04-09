<?php $this->load->view('site/fixed_files/header'); ?>
    <div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('');?>">Inicio</a></li>
        <li>Meus Lances: Informações Pessoais</li>
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
                        <section class="order-history extra-space-bottom col-sm-6">
                            <h2 class="text-center-mobile">Meus Lances</h2>

                            <div class="container col-sm-2">
                                <div class="inner">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th scope="col">Lance ID <span class="toggles"><i class="fa fa-caret-up"></i><i class="fa fa-caret-down"></i></span></th>
                                            <th scope="col">Produto <span class="toggles"><i class="fa fa-caret-up"></i><i class="fa fa-caret-down"></i></span></th>
                                            <th scope="col">Valor do Lance <span class="toggles"><i class="fa fa-caret-up"></i><i class="fa fa-caret-down"></i></span></th>
                                            <th scope="col">Status do Leilão <span class="toggles"><i class="fa fa-caret-up"></i><i class="fa fa-caret-down"></i></span></th>

                                        </tr>

                                        <?php

                                        if (!isset($_POST['pag'])):

                                            if (isset($_GET['pag'])):

                                                if ($_GET['pag'] <= 0):
                                                    $pag = 1;

                                                else:
                                                    $pag = $_GET['pag'];

                                                endif;
                                            else:
                                                $pag = 1;

                                            endif;
                                        else:
                                            $pag = $_POST['pag'];
                                        endif;

                                        $array = ([

                                            "pag" => $pag

                                        ]);

                                        $this->load->view('ajax/users/meus_lances',$array);

                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>


    </div>


<?php $this->load->view('site/fixed_files/footer'); ?>