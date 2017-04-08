<?php $this->load->view('site/fixed_files/header'); ?>

<?php
$this->db->from('lojas');
$this->db->where('id_loja', $this->uri->segment(3));
$get = $this->db->get();
$count = $get->num_rows();
if ($count < 0):
    redirect(base_url(''));
endif;
$result = $get->result_array();


?>
<?php
$replace = array('@', '#', '/', '|', '\'', '(', ')');

?>
<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('home');?>">Inicio</a></li>
        <li><a href="<?php echo base_url('leiloes-abertos');?>">Leilões</a></li>
        <li>
            <a href="<?php echo base_url('lojas/') . str_replace(' ', '-', str_replace($replace, '', strtolower($result[0]['nome']))) . '/' . $result[0]['id_loja']; ?>
"><?php echo $this->Functions_Model->limitarTexto($result[0]['nome'], 50); ?></a></li>
    </ol><!--Breadcrumbs Close-->

    <!--Catalog Grid-->
    <section class="catalog-grid">
        <div class="container">
            <h2 class="with-sorting"><?php echo $this->Functions_Model->limitarTexto($result[0]['nome'], 150); ?></h2>


            <div class="row">

                <!--Filters-->
                <div class="filters-mobile col-lg-2 col-md-2 col-sm-2">

                    <div class="shop-filters">


                        <!--Categories Section-->
                        <section class="filter-section">
                            <h3>Categorias</h3>
                            <ul class="categories">
                                <li class="has-subcategory"><a href="#">iPhone cases (123)</a>
                                    <!--Class "has-subcategory" for dropdown propper work-->
                                    <ul class="subcategory">
                                        <li><a href="#">iPhone cases (1)</a></li>
                                        <li><a href="#">iPad cases (45)</a></li>
                                        <li><a href="#">MacBook cases (34)</a></li>
                                        <li><a href="#">Something (12)</a></li>
                                        <li><a href="#">Air cases (23)</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">iPad cases (34)</a></li>
                                <li><a href="#">MacBook cases (78)</a></li>
                                <li class="has-subcategory"><a href="#">Something (45)</a>
                                    <ul class="subcategory">
                                        <li><a href="#">Subcategory (1)</a></li>
                                        <li><a href="#">Subcategory (45)</a></li>
                                        <li><a href="#">Subcategory (23)</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Air cases (23)</a></li>
                            </ul>
                        </section>

                    </div>
                </div>
                <?php

                $this->db->from('leiloes');
                $this->db->where('id_loja',$result[0]['id_loja']);
                $gets = $this->db->get();
                $counts = $gets->num_rows();

                if($count > 0):
                ?>
                <!--Tiles-->
                <section class="catalog-grid">
                    <div class="container">
                        <div class="row" id="leiloesloja">

                 <?php
                 $results = $gets->result_array();
                 if (isset($_GET['pag'])):

                     if($_GET['pag'] < 1):
                         $pag = 1;

                     else:
                         $pag = $_GET['pag'];

                     endif;
                 else:
                     $pag = 1;

                 endif;
                 foreach ($results as $value){


                     $value['pag'] = $pag;

                     $this->load->view('site/itens/lojaitens', $value);

                 }
                 ?>

                    </div>

                </div>
                    </section>

                <?php endif;?>
            </div>
        </div>
    </section><!--Catalog Grid Close-->



</div>
<?php $this->load->view('site/fixed_files/footer'); ?>
