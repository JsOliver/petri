<?php $this->load->view('site/fixed_files/header'); ?>

<div class="page-content">

    <?php


    $pagina = $this->uri->segment(1);

    if ($pagina == 'categoria'):

        $categoria = $this->uri->segment(2);
        $subcategoria = $this->uri->segment(3);
        $sub_subcategoria = $this->uri->segment(4);

        ?>

        <?php

        if (empty($categoria)):

            $limit = 18;


            ?>
            <section class="cat-tiles">
                <div class="container">
                    <h2>Explorar Categorias</h2>
                    <div class="row" id="explorar_categorias">


                        <?php

                        $array = array([

                            'tipo' => '1',
                            'categoria' => '',
                            'banco' => 'categorias',
                            'div' => 'explorar_categorias',
                            'subcategoria' => '',
                            'sub_subcategoria' => ''

                        ]);
                        $this->load->view('site/itens/busca_categoria', $array[0]);
                        ?>


                    </div>

                </div>
            </section>

            <?php

        endif;

        ?>

    <?php endif; ?>

    <?php
    if (!empty($categoria) and empty($subcategoria)):

        ?>
        <section class="catalog-grid">
            <div class="container">

                <h2>Buscar Pela Categoria de <b><?php echo ucwords(str_replace('-', ' ', $categoria)); ?></b></h2>
                <div class="row" id="buscar_por_categorias">


                    <?php

                    $array = array([

                        'tipo' => '2',
                        'banco' => 'leiloes',
                        'div' => 'buscar_por_categorias',
                        'categoria' => $categoria,
                        'subcategoria' => '',
                        'sub_subcategoria' => ''

                    ]);
                    $this->load->view('site/itens/busca_categoria', $array[0]);
                    ?>


                </div>

            </div>
        </section>

    <?php endif; ?>


    <?php
    if (!empty($categoria) and !empty($subcategoria) and empty($sub_subcategoria)):

        ?>
        <section class="catalog-grid">
            <div class="container">

                <h2>Buscar Pela Categoria de <b><?php echo ucwords(str_replace('-', ' ', $categoria)); ?> </b> >
                    <b><?php echo ucwords(str_replace('-', ' ', $subcategoria)); ?></b></h2>
                <div class="row" id="buscar_por_sub_categorias">


                    <?php

                    $array = array([

                        'tipo' => '3',
                        'banco' => 'leiloes_sub',
                        'div' => 'buscar_por_sub_categorias',
                        'categoria' => $categoria,
                        'subcategoria' => $subcategoria,
                        'sub_subcategoria' => ''

                    ]);
                    $this->load->view('site/itens/busca_categoria', $array[0]);
                    ?>


                </div>

            </div>
        </section>

    <?php endif; ?>


    <?php
    if (!empty($categoria) and !empty($subcategoria) and !empty($sub_subcategoria)):

        ?>
        <section class="catalog-grid">
            <div class="container">

                <h2>Buscar Pela Categoria de <b><?php echo ucwords(str_replace('-', ' ', $categoria)); ?> </b> >
                    <b><?php echo ucwords(str_replace('-', ' ', $subcategoria)); ?></b> >
                    <b><?php echo ucwords(str_replace('-', ' ', str_replace('_', ' ', $sub_subcategoria))); ?></h2>
                <div class="row" id="buscar_por_sub_sub_categorias">


                    <?php

                    $array = array([

                        'tipo' => '4',
                        'banco' => 'leiloes_sub_sub',
                        'div' => 'buscar_por_sub_sub_categorias',
                        'categoria' => $categoria,
                        'subcategoria' => $subcategoria,
                        'sub_subcategoria' => $sub_subcategoria

                    ]);
                    $this->load->view('site/itens/busca_categoria', $array[0]);
                    ?>


                </div>

            </div>
        </section>

    <?php endif; ?>

    <?php
    if ($pagina == 'buscar'):
        ?>


        <section class="catalog-grid">
            <div class="container">
                <h2>Resultados sobre <b><?php echo ucwords(strip_tags($_GET['q'])); ?></b></h2>
                <div class="filters-mobile col-lg-3 col-md-3 col-sm-3">

                    <div class="shop-filters">

                        <section class="filter-section">

                            <?php
                            if(!isset($_GET['sem_fim']) and !isset($_GET['com_fim'])):

                                $semfim = 'checked';
                                $comfim = 'checked';

                            else:
                                if(isset($_GET['sem_fim']) and !isset($_GET['com_fim'])):
                                    $semfim = 'checked';
                                    $comfim = '';

                                    elseif(!isset($_GET['sem_fim']) and isset($_GET['com_fim'])):
                                        $semfim = '';
                                        $comfim = 'checked';


                                else:
                                    $semfim = '';
                                    $comfim = '';

                                    endif;

                            endif;

                            ?>

                            <h3>Tipo</h3>
                            <label style="cursor: pointer;">
                                <div style="position: relative; float:left;cursor: pointer;">
                                    <input type="checkbox" name="colors" value="white" id="color_1"
                                           style="position: absolute; opacity: 0;" <?php echo $semfim;?>>
                                </div>
                                Leilões com Data Fim</label>
                            <br>
                            <label style="cursor: pointer;">
                                <div style="position: relative; float:left;">
                                    <input type="checkbox" name="colors" value="white" id="color_1"
                                           style="position: absolute; opacity: 0;" <?php echo $semfim;?>>
                                </div>
                                Leilões sem Data Fim</label>
                            <br>

                        </section>
                        <?php
                        $this->db->from('localidade');
                        $this->db->order_by('id','desc');
                        $get = $this->db->get();
                        $count = $get->num_rows();
                        if($count > 0):
                        $result = $get->result_array();
                        ?>
                        <section class="filter-section">
                            <h3>Localidade</h3>
                            <?php
                            $arrays = array([
                                "tipo" => 1,
                                "result" => $result,
                            ]);
                            $this->load->view('site/itens/busca_localidade', $arrays[0]);

                            ?>

                        </section>

                        <?php endif;?>

                        <?php
                        $limit_ct = 7;
                        $this->db->select('id_categoria');
                        $this->db->from('categorias');
                        $this->db->order_by('id_categoria', 'desc');
                        $get = $this->db->get();
                        $count = $get->num_rows();
                        if ($count > 0):
                            ?>
                            <section class="filter-section">
                                <h3>Categorias</h3>
                                <ul class="categories">

                                    <?php
                                    $this->db->from('categorias');
                                    $this->db->order_by('id_categoria', 'desc');
                                    $this->db->limit($limit_ct, 0);
                                    $gets = $this->db->get();
                                    $result = $gets->result_array();
                                    foreach ($result as $value) {

                                        $this->db->select('id_leilao');
                                        $this->db->from('leiloes');
                                        $this->db->where('categoria', $value['id_categoria']);
                                        $getccs = $this->db->get();
                                        $countccs = $getccs->num_rows();
                                        ?>
                                        <?php

                                        //Aqui ele conta quantos produtos existem nessa categoria

                                        $this->db->from('subcategorias');
                                        $this->db->where('categoria_id',$value['id_categoria']);
                                        $this->db->order_by('id_subcategoria', 'desc');
                                        $getss = $this->db->get();
                                        $countss = $getss->num_rows();
                                        ?>
                                        <?php
                                        if ($countss > 0):
                                            $results = $getss->result_array();
                                            ?>
                                            <li class="has-subcategory"><a href="#"><?php echo $value['nome'];?> (<?php echo number_format($countccs);?>)</a>
                                                <!--Class "has-subcategory" for dropdown propper work-->
                                                <ul class="subcategory">
                                                    <?php
                                                    foreach ($results as $values){

                                                        $this->db->select('subcategoria');
                                                        $this->db->from('leiloes');
                                                        $this->db->where('subcategoria', $values['id_subcategoria']);
                                                        $getccsa = $this->db->get();
                                                        $countccsa = $getccsa->num_rows();
                                                    ?>
                                                    <li><a href="#"><?php echo $values['nome'];?> (<?php echo number_format($countccsa);?>)</a></li>
                                                   <?php }?>
                                                </ul>
                                            </li>
                                        <?php else: ?>

                                            <li><a href="#"><?php echo $value['nome'];?> (<?php echo number_format($countccs);?>)</a></li>
                                        <?php endif; ?>

                                    <?php }
                                    if ($count > $limit_ct): ?>
                                        <li><a href="<?php echo base_url('categoria'); ?>"><b>Ver Mais</b></a></li>
                                    <?php endif; ?>
                                </ul>
                            </section>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row" id="busca_result">

                    <?php


                    if (isset($_GET['pag'])):

                        if ($_GET['pag'] < 1):
                            $pag = 1;

                        else:
                            $pag = $_GET['pag'];

                        endif;
                    else:
                        $pag = 1;

                    endif;

                    $array = array([
                        'tipo' => '1',
                        'busca' => $_GET['q'],
                        'pag' => $pag
                    ]);


                    $this->load->view('site/itens/busca', $array[0]);

                    ?>
                </div>
            </div>

        </section>
    <?php endif; ?>
</div>

<?php $this->load->view('site/fixed_files/footer'); ?>
