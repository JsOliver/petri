<?php $this->load->view('site/fixed_files/header'); ?>


<!--Page Content-->

<div class="page-content">

    <?php

    $this->db->from('carrosel');
    $this->db->order_by('id_carrosel', 'desc');
    $this->db->limit(10, 0);
    $get = $this->db->get();
    $count = $get->num_rows();
    if ($count > 0):
        $result = $get->result_array();
        ?>
        <section class="hero-slider">
            <div class="master-slider" id="hero-slider">

                <?php foreach ($result as $value) { ?>
                    <div class="ms-slide" data-delay="7">
                        <div class="overlay"></div>
                        <img src="<?php echo base_url('web/fotos/carrosel/' . $value['foto']); ?>"
                             data-src="<?php echo base_url('web/fotos/carrosel/' . $value['foto']); ?>"
                             alt="<?php echo $value['nome'];?>"/>
                        <h2 style="width: 456px; left: 110px; top: 110px;" class="light-color ms-layer"
                            data-effect="top(50,true)" data-duration="700" data-delay="250" data-ease="easeOutQuad">
                            Nikon
                            D4S</h2>
                        <p style="width: 456px; left: 110px; top: 210px;" class="light-color ms-layer"
                           data-effect="back(500)"
                           data-duration="700" data-delay="500" data-ease="easeOutQuad">
                            <?php echo $this->Functions_Model->limitarTexto($value['descricao'], 250); ?>
                        </p>
                        <div style="left: 110px; top: 300px;" class="ms-layer button" data-effect="bottom(50,true)"
                             data-duration="600" data-delay="950" data-ease="easeOutQuad"><a class="btn btn-primary"
                                                                                             href="<?php echo strip_tags($value['link_botao']); ?>">  <?php echo $value['nome_botao']; ?>
                            </a></div>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php endif; ?>
    <!--Hero Slider Close-->
    <!--Categories-->
    <?php

    $this->db->from('categorias');
    $this->db->order_by('acessos', 'desc', 'id_categoria', 'desc');
    $this->db->limit(6, 0);
    $this->db->where('status', '1');
    $get = $this->db->get();
    $count = $get->num_rows();
    if ($count > 0):

        ?>
        <section class="cat-tiles">
            <div class="container">
                <h2>Explorar Categorias
                    <small style="cursor: pointer;" title="Ver Mais Categorias"
                           onclick="window.location.href='<?php echo base_url('categoria'); ?>'">(Ver Mais)
                    </small>
                </h2>
                <div class="row">
                    <?php

                    $result = $get->result_array();
                    foreach ($result as $value) {


                        if (empty($value['fotos'])):

                            $foto = base_url('assets/img/noimage.gif');

                        else:

                            $explode_ft = explode('(<==>)', $value['fotos']);
                            $foto = base_url('web/fotos/categorias/') . $explode_ft[0];

                        endif;

                        $replace = array('@', '#', '/', '|', '\'', '(', ')');

                        ?>

                        <div class="category col-lg-2 col-md-2 col-sm-4 col-xs-6">
                            <a href="<?php echo base_url('categoria/') . str_replace(' ', '-', str_replace($replace, '', strtolower($value['nome']))); ?>">
                                <img src="<?php echo $foto; ?>" style="width: 325px;height: 180px;" alt="1"/>
                                <p><?php echo $value['nome'] ?></p>
                            </a>
                        </div>
                        <?php

                    }

                    ?>

                </div>
            </div>
        </section><!--Categories Close-->
        <?php
    endif;
    $limit = 30;

    $this->db->from('leiloes');
    $get = $this->db->where('status', '1');
    $get = $this->db->or_where('status', '4');
    $get = $this->db->get();
    $count = $get->num_rows();

    if ($count > 0):
        ?>
        <!--Catalog Grid-->
        <section class="catalog-grid">
            <div class="container">
                <h2 class="primary-color">Principais Leilões</h2>
                <div class="row" id="leiloes">

                    <?php
                    $this->db->from('leiloes');
                    $this->db->where('status', '1');
                    $this->db->or_where('status', '4');
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
    <?php

    $this->db->from('leiloes');
    $this->db->where('status', '1');
    $this->db->or_where('status', '4');
    $this->db->get();
    $count = $get->num_rows();
    if ($count > 0):
        ?>
        <!--Tabs Widget-->
        <section class="catalog-grid">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" style="text-align: center;">
                <li class="active" style="left: 38%;"><a href="#bestsel" data-toggle="tab">
                        <small>Leilões com Limite de Tempo</small>
                    </a></li>
                <li style="left: 38%;"><a href="#onsale" data-toggle="tab">
                        <small>Leilões sem Limite de Tempo</small>
                    </a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="bestsel">
                    <div class="container">
                        <div class="row" id="leiloes">
                            <?php


                            $this->db->from('leiloes');
                            $this->db->where('status', '1');
                            $this->db->order_by('acessos', 'desc', 'id_leilao', 'desc');
                            $this->db->limit(6, 0);
                            $get = $this->db->get();
                            $count1 = $get->num_rows();
                            if ($count1 > 0):

                                $result = $get->result_array();

                                foreach ($result as $value) {
                                    $this->load->view('site/itens/leiloes', $value);
                                }
                            else: ?>

                                <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center;">
                                    <br>
                                    <h1>Nenhum Leilão Encontrado</h1>
                                </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="onsale">
                    <div class="container">
                        <div class="row" id="leiloes">
                            <?php

                            $this->db->from('leiloes');
                            $this->db->where('status', '4');
                            $this->db->order_by('acessos', 'desc', 'id_leilao', 'desc');
                            $this->db->limit(6, 0);
                            $get = $this->db->get();
                            $count1 = $get->num_rows();
                            if ($count1 > 0):

                                $result = $get->result_array();

                                foreach ($result as $value) {
                                    $this->load->view('site/itens/leiloes', $value);
                                }
                            else: ?>

                                <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center;">
                                    <br>
                                    <h1>Nenhum Leilão Encontrado</h1>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section><!--Tabs Widget Close-->
    <?php endif; ?>
    <?php
    $this->db->from('depoimentos');
    $this->db->order_by('id_depoimento', 'rand()');
    $this->db->limit(20, 0);
    $get = $this->db->get();
    $count = $get->num_rows();
    if ($count > 0)

        $result = $get->result_array();
    ?>
    <!--Gallery Widget-->
    <section class="gray-bg gallery-widget" style="background-color: #323840;">
        <div class="container">
            <h2 style="color: white;">Depoimentos</h2>
            <div class="filters">
                <a class="active" href="#" data-group="all">Todos</a>
                <a href="#" data-group="imagem">Imagens</a>
                <a href="#" data-group="video">Videos</a>
            </div>
            <div class="gallery-grid">
                <?php
                foreach ($result as $value) {
                    ?>

                    <?php
                    if ($value['tipo'] == 1):
                        ?>
                        <!--Item-->
                        <div class="gallery-item" data-groups='["imagem"]'
                             data-src="<?php echo base_url('web/fotos/depoimentos/') . $value['imagem']; ?>">
                            <a href="<?php echo base_url('web/fotos/depoimentos/') . $value['imagem']; ?>">
                                <div class="overlay"><span><i class="icon-expand"></i></span></div>
                                <img src="<?php echo base_url('web/fotos/depoimentos/') . $value['imagem']; ?>
                                 " alt="<?php echo $value['nome']; ?>"/>
                            </a>
                        </div>

                    <?php endif; ?>
                    <?php if ($value['tipo'] == 2):
                        ?>
                        <!--Item-->
                        <div class="gallery-item" data-groups='["video"]'
                             data-src="<?php echo $value['video']; ?>">
                            <a href="<?php echo $value['video']; ?>">
                                <div class="overlay"><span><i class="icon-music-play"></i></span></div>
                                <img src="<?php echo base_url('web/fotos/depoimentos/') . $value['imagem']; ?>"
                                     alt="<?php echo $value['nome']; ?>"/>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php
                }
                ?>
            </div>
    </section><!--Gallery Widget Close-->

    <?php
    $this->db->from('brands');
    $this->db->order_by('id_brand', 'desc');
    $get = $this->db->get();
    $row = $get->num_rows();

    if ($row > 0):
        $result = $get->result_array();
        ?>
        <!--Brands Carousel Widget-->
        <section class="brand-carousel">
            <div class="container">
                <h2>Marcas Parceiras em Nosso Site</h2>
                <div class="inner">

                    <?php
                    foreach ($result as $value) {
                        ?>
                        <a class="item" title="<?php echo $value['nome']; ?>" href="<?php echo $value['link']; ?>"
                           target="_blank"><img style="width: 50px; object-fit: cover; object-position: center;"
                                                src="<?php echo base_url('web/fotos/brands/') . $value['image']; ?>"
                                                alt="<?php echo $value['nome']; ?>"/></a>
                    <?php } ?>
                </div>
            </div>
        </section><!--Brands Carousel Close-->
    <?php endif; ?>
</div><!--Page Content Close-->


<?php
//Modulo de Newslatter
/*
$this->db->from('newslatter_modulo');
$this->db->order_by('id_newslatter','desc');
$this->db->limit(1,0);
$get = $this->db->get();
$count = $get->num_rows();

?>

<?php
if($count > 0):

    $result = $get->result_array();
?>
<!--Subscription Widget-->
<section class="subscr-widget">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8 col-sm-8">
                <h2 class="light-color"><?php echo $result[0]['nome'];?></h2>

                <!--Mail Chimp Subscription Form-->
                <form class="subscr-form" role="form"
                      action="//8guild.us3.list-manage.com/subscribe/post?u=168a366a98d3248fbc35c0b67&amp;id=d704057a31"
                      target="_blank" method="post" autocomplete="off">
                    <div class="form-group">
                        <label class="sr-only" for="subscr-name"><?php echo $result[0]['placeholder_nome'];?></label>
                        <input type="text" class="form-control" name="FNAME" id="subscr-name" placeholder="<?php echo $result[0]['placeholder_nome'];?>"
                               required>
                        <button class="subscr-next"><i class="icon-arrow-right"></i></button>
                    </div>
                    <div class="form-group fff" style="display: none">
                        <label class="sr-only" for="subscr-email"><?php echo $result[0]['placeholder_email'];?></label>
                        <input type="email" class="form-control" name="EMAIL" id="subscr-email"
                               placeholder="<?php echo $result[0]['placeholder_email'];?>" required>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;"><input type="text"
                                                                               name="b_168a366a98d3248fbc35c0b67_d704057a31"
                                                                               tabindex="-1" value=""></div>
                        <button type="submit" id="subscr-submit"><i class="icon-check"></i></button>
                    </div>
                </form>
                <!--Mail Chimp Subscription Form Close-->
                <p class="p-style2">Por Favor Preencha o campo para continuar.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1">
                <p class="p-style3"><?php echo $result[0]['descricao'];?></p>
            </div>
        </div>
    </div>
</section><!--Subscription Widget Close-->
<?php

endif;
*/
?>

<?php $this->load->view('site/fixed_files/footer'); ?>
