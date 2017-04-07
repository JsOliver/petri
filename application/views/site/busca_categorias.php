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
                <div class="row" id="busca_result">

                    <?php


                    if (isset($_GET['pag'])):

                        if($_GET['pag'] < 1):
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
