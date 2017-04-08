<?php $this->load->view('site/fixed_files/header'); ?>

<?php
$this->db->from('leiloes');
$this->db->where('id_leilao', $this->uri->segment(3));
$get = $this->db->get();
$count = $get->num_rows();
if ($count < 0):
    redirect(base_url(''));
endif;
$result = $get->result_array();

//Data Fim do Leilão
$data_completa = $result[0]['data_terminio'];
$ano = substr($data_completa, 0, 4);
$mes = substr($data_completa, 4, 2);
$dia = substr($data_completa, 6, 2);
$hora = substr($data_completa, 8, 2);
$min = substr($data_completa, 10, 2);
$seg = substr($data_completa, 12, 2);


?>
<?php
$replace = array('@', '#', '/', '|', '\'', '(', ')');

?>

<!-- Inicio Scripts JS da Pagina -->

<script>

    function lancemodal() {

        $("#lancemodal").html('<h1 style="text-align: center;">Carregando...</h1');

        $.ajax({
            type: "POST",
            url: DIR+"lance_janela",
            data: {leilao_id:'<?php echo $this->uri->segment(3);?>'},
            error: function(data){
                $("#lancemodal").html('<h1 style="text-align: center;">Erro</h1>');
            },
            success: function(data)
            {
                $("#lancemodal").html(data);

            }
        });

    }

</script>
<script>


    var intervalo = window.setInterval(function() {


        $.ajax({
            type: "POST",
            url: DIR+"ajaxvalor",
            data: {leilao_id:'<?php echo $this->uri->segment(3);?>'},
            error: function(data){
                $("#lanceatual").text(data);
                $("#lancemobile").text(data);
            },
            success: function(data)
            {
                $("#lanceatual").text(data);
                $("#lancemobile").text(data);

            }
        });

    }, 5000);
    window.setTimeout(intervalo, 3000);

</script>
<script>
    function active_vcs(tipo) {

        $(".actives").removeClass('actives');
        $("#npbs" + tipo + "").addClass('actives');

    }
</script>
<script>
    function sets(div) {

        if ($('#' + div + '').hasClass('in')) {


            $('#' + div + '').removeClass('in');


        } else {

            $('#' + div + '').addClass('in');

        }

    }
</script>
<script language="Javascript">
    var YY = <?php echo $ano;?>;
    var MM = <?php echo $mes;?>;
    var DD = <?php echo $dia;?>;
    var HH = <?php echo $hora;?>;
    var MI = <?php echo $min;?>;
    var SS = <?php echo $seg;?>;

    function atualizaContador()
    {
        var hoje = new Date();
        var futuro = new Date(YY,MM-1,DD,HH,MI,SS);
        var ss = parseInt((futuro - hoje) / 1000);
        var mm = parseInt(ss / 60);
        var hh = parseInt(mm / 60);
        var dd = parseInt(hh / 24);
        ss = ss - (mm * 60);
        mm = mm - (hh * 60);
        hh = hh - (dd * 24);
        var faltam = '';
        faltam += (dd && dd > 1) ? dd+' dias, ' : (dd==1 ? '1 dia, ' : '');
        faltam += (toString(hh).length) ? hh+' hr, ' : '';
        faltam += (toString(mm).length) ? mm+' min e ' : '';
        faltam += ss+' seg';

        if (dd+hh+mm+ss > 0)
        {
            document.getElementById('contador').innerHTML = '<b style="color: #6d2322;">Encerra em:</b><br> '+faltam;
            setTimeout(atualizaContador,1000);
        }
        else
        {
            document.getElementById('contador').innerHTML = 'CHEGOU!!!!';
            setTimeout(atualizaContador,1000);
        }
    }
</script>
<script>
    window.onload = function(){
        atualizaContador();
        lancemodal();
    }
</script>


<!-- Fim Scripts JS da Pagina -->

<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(''); ?>">Inicio</a></li>

        <li><a href="<?php echo base_url('leiloes'); ?>">Leilões</a></li>
        <li>
            <a href="<?php echo base_url('lojas/') . str_replace(' ', '-', str_replace($replace, '', strtolower($result[0]['loja']))) . '/' . $result[0]['id_loja']; ?>
"><?php echo $this->Functions_Model->limitarTexto($result[0]['loja'], 50); ?></a></li>
        <li><?php echo $this->Functions_Model->limitarTexto($result[0]['nome'], 50); ?></li>
    </ol><!--Breadcrumbs Close-->


    <style>


        #myCarousel .list-group {
            position: absolute;
            top: 0;
            right: 0;
        }

        #myCarousel .list-group-item {
            border-radius: 0px;
            cursor: pointer;
        }

        #myCarousel .list-group .actives {
            background-color: #eee;
            border: 1px solid #9f232a;
        }

        @media (min-width: 992px) {
            #myCarousel .carousel-controls {
                display: none;
            }
        }

        @media (max-width: 991px) {
            .carousel-caption p,
            #myCarousel .list-group {
                display: none;
            }
        }
    </style>

    <!--Catalog Grid-->
    <section class="catalog-grid">
        <div class="container">
            <h2 class="with-sorting"><?php echo $this->Functions_Model->limitarTexto($result[0]['nome'], 200); ?></h2>

            <div class="row">


                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="row">


                        <div id="myCarousel" class="carousel slide" data-ride="carousel">

                            <div class="col-sm-14" style="float: left;width: 120%;">
                                <div class="carousel-inner ">

                                    <?php

                                    $image = $result[0]['fotos'];
                                    $explode = explode('(<==>)', $image);

                                    $i = 1;
                                    foreach ($explode as $value) {

                                        if ($i <= 1):

                                            $class = 'active';
                                        else:
                                            $class = '';

                                        endif;
                                        ?>
                                        <div class="item <?php echo $class; ?>">

                                            <img style="width: 100%;height: 400px;"
                                                 src="<?php echo base_url('web/fotos/leiloes/') . $value; ?>">

                                        </div><!-- End Item -->
                                        <?php $i++;
                                    } ?>


                                </div><!-- End Carousel Inner -->

                            </div>

                            <ul class="list-group col-sm-2">
                                <?php


                                $n = 1;
                                foreach ($explode as $value) {

                                    if ($n <= 1):

                                        $class = 'actives';
                                    else:
                                        $class = '';

                                    endif;
                                    ?>
                                    <li data-target="#myCarousel" data-slide-to="<?php echo $n - 1; ?>"
                                        id="npbs<?php echo $n; ?>" onclick="active_vcs(<?php echo $n; ?>)"
                                        class="list-group-item <?php echo $class; ?>">
                                        <img style="height: 80px; width: 100%;"
                                             src="<?php echo base_url('web/fotos/leiloes/') . $value ?>"/>
                                    </li>
                                    <?php $n++;
                                } ?>

                            </ul>


                        </div><!-- End Carousel -->

                    </div>
                    <!-- Controls -->
                    <style>

                        @media screen and (max-width: 780px) {
                            .lancemobile {
                                display: block;
                            }
                        }

                        @media screen and (min-width: 779px) {
                            .lancemobile {
                                display: none;
                            }
                        }

                    </style>
                    <br>
                    <div class="lancemobile">
                        <h3>LANCE INICIAL
                            R$ <?php echo number_format($result[0]['lance_inicial'], 2, ',', '.'); ?></h3>
                        <h3>LANCE ATUAL
                            R$ <span id="lancemobile"><?php

                                $this->db->select('valor_lance');
                                $this->db->from('lances');
                                $this->db->where('id_leilao', $result[0]['id_leilao']);
                                $this->db->order_by('id_lance', 'desc', 'valor_lance', 'desc');
                                $this->db->limit(1, 0);
                                $getsa = $this->db->get();
                                $countsa = $getsa->num_rows();
                                if ($count > 0):
                                    $resultsa = $getsa->result_array();

                                    echo number_format($resultsa[0]['valor_lance'],2,',','.');

                                else:

                                    echo '0,00';

                                endif;
                                ?></span></h3>
                        <h6 style="width: 100%;"><a style="width: 100%;" data-toggle="modal" data-target="#<?php if($logado == true): echo 'lance'; else: echo 'loginModal'; endif; ?>" class="btn" onclick="lancemodal();">DE SEU LANCE</a></h6>
                    </div>

                    <div>
                        <style>
                            .nav-tabs li a:hover {
                                background: none;

                            }
                        </style>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" style="float:left;width:100%;">
                            <li role="presentation" class="active"><a style="font-size: 15pt;" href="#home"
                                                                      aria-controls="home" role="tab" data-toggle="tab">Descrição</a>
                            </li>
                            <?php if ($result[0]['id_lote'] > 0): ?>
                                <li role="presentation"><a style="font-size: 15pt;" href="#profile"
                                                           aria-controls="profile"
                                                           role="tab" data-toggle="tab">Lote</a></li>

                            <?php endif; ?>
                        </ul>
                        <br>
                        <br><br>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">

                                <div class="container">
                                    <div class="row">
                                        <h4 style="color: darkred;font-weight: bold;">Descricão do Produto</h4>

                                        <div class="collapse in" id="vermaisdescricaos">
                                            <?php

                                            $minch = 250;

                                            if(strlen($result[0]['descricao']) > $minch):
                                                echo $this->Functions_Model->limitarTexto(strip_tags($result[0]['descricao']), $minch);

                                                else:
                                                    echo $this->Functions_Model->limitarTexto($result[0]['descricao'], $minch);

                                            endif;
                                            ?>
                                        </div>
                                        <?php
                                        if(strlen($result[0]['descricao']) > $minch):
                                        ?>
                                        <div class="collapse" id="vermaisdescricao">

                                            <?php

                                            echo $result[0]['descricao'];

                                            ?>

                                        </div>
                                        <?php endif;?>

                                                    <?php
                                                    if(strlen($result[0]['descricao']) > $minch):
                                                    ?>
                                        <h1 style="text-align: center;font-size: 15pt;"><a
                                                style="text-decoration: none;color: darkred;font-weight: bold;"
                                                id="inout" onclick="sets('vermaisdescricaos');" data-toggle="collapse"
                                                href="#vermaisdescricao" aria-expanded="false"
                                                aria-controls="vermaisdescricao">
                                                Ver Mais
                                            </a></h1>

                                        <?php endif;?>


                                    </div>
                                </div>
                            </div>
                            <?php

                            $idlote = $result[0]['id_lote'];
                            if ($idlote > 0):
                                $this->db->from('lotes');
                                $this->db->where('id_lote', $result[0]['id_lote']);
                                $get = $this->db->get();
                                $count = $get->num_rows();

                                if ($count > 0):

                                    $resultlt = $get->result_array();
                                    if (!empty($resultlt[0]['descricao'])):
                                        ?>
                                        <div role="tabpanel" class="tab-pane" id="profile">

                                            <div class="container">
                                                <div class="row">
                                                    <h4 style="color: darkred;font-weight: bold;">Descricão do Lote</h4>

                                                    <?php echo $resultlt[0]['descricao']; ?>
                                                    <?php
                                                    $limit = 12;

                                                    $this->db->from('leiloes');
                                                    $get = $this->db->where('id_lote', $idlote);
                                                    $get = $this->db->where('status', '1');
                                                    $get = $this->db->or_where('status', '4');
                                                    $get = $this->db->order_by('acessos', 'desc', 'id_leilao', 'desc');
                                                    $get = $this->db->limit($limit, 0);
                                                    $get = $this->db->get();
                                                    $count = $get->num_rows();
                                                    if ($count > 0):
                                                        ?>
                                                        <!--Catalog Grid-->
                                                        <section class="catalog-grid">

                                                            <div class="container">
                                                                <br>
                                                                <div class="row">
                                                                    <h2>Produtos do Mesmo Lote</h2>
                                                                    <?php

                                                                    $result = $get->result_array();

                                                                    foreach ($result as $value) {
                                                                        $this->load->view('site/itens/leiloes', $value);
                                                                    } ?>
                                                                </div>
                                                            </div>
                                                        </section><!--Catalog Grid Close-->
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>
                <div class="filters-mobile col-lg-3 col-md-4 col-sm-6">

                    <div class="shop-filters">

                        <?php
                        $this->db->from('lojas');
                        $this->db->where('id_loja', $result[0]['id_loja']);
                        $getl = $this->db->get();
                        $countl = $getl->num_rows();
                        if ($countl < 0):
                            redirect(base_url(''));
                        endif;
                        $resultl = $getl->result_array();
                        ?>
                        <!--Price Section-->
                        <section class="filter-section">
                            <a href="<?php echo base_url('lojas/') . str_replace(' ', '-', str_replace($replace, '', strtolower($result[0]['loja']))) . '/' . $result[0]['id_loja']; ?>"
                               style="text-align: center;left:50%;"><img style="height: 90px;width: 100%;"
                                                                         src="<?php echo base_url('web/fotos/lojas/' . $resultl[0]['fotos']); ?>"></a>
                            <h5 style="text-align: center;"><?php echo $this->Functions_Model->limitarTexto($resultl[0]['nome'], 50); ?></h5>
                            <?php

                            if ($result[0]['status'] == '1'):

                                $data = date('D');

                                $semana = array(
                                    'Sun' => 'Domingo',
                                    'Mon' => 'Seg',
                                    'Tue' => 'Ter',
                                    'Wed' => 'Qua',
                                    'Thu' => 'Qui',
                                    'Fri' => 'Sex',
                                    'Sat' => 'Sab'
                                );


                                $mes_extenso = array(
                                    '01' => 'Jan',
                                    '02' => 'Fev',
                                    '03' => 'Mar',
                                    '04' => 'Abr',
                                    '05' => 'Mai',
                                    '06' => 'Jun',
                                    '07' => 'Jul',
                                    '08' => 'Ago',
                                    '09' => 'Nov',
                                    '10' => 'Set',
                                    '11' => 'Out',
                                    '12' => 'Dez'
                                );


                                ?>
                                <span style="text-align: center;font-size: 11pt;"><small><b style="color: #342020;"><i
                                                class="icon-clock"></i> Encerra <?php echo $semana["$data"] . ", {$dia}/" . $mes_extenso["$mes"] . "/{$ano} as " . $hora . "h" . $min . "m" . $seg . "s"; ?></b></small></span>
                            <?php endif; ?>
                            <br>
                            <br>
                            <h5 style="text-align: center;">LANCE INICIAL
                                R$ <?php echo number_format($result[0]['lance_inicial'], 2, ',', '.'); ?></h5>
                            <h5 style="text-align: center;">LANCE ATUAL
                                R$ <span id="lanceatual"><?php

                                    $this->db->select('valor_lance');
                                    $this->db->from('lances');
                                    $this->db->where('id_leilao', $result[0]['id_leilao']);
                                    $this->db->order_by('id_lance', 'desc', 'valor_lance', 'desc');
                                    $this->db->limit(1, 0);
                                    $get = $this->db->get();
                                    $count = $get->num_rows();
                                    if ($count > 0):
                                        $result = $get->result_array();

                                        echo number_format($result[0]['valor_lance'],2,',','.');

                                    else:

                                        echo '0,00';

                                    endif;
 ?></span></h5>
                            <h6 style="text-align: center;"><a data-toggle="modal" data-target="#<?php if($logado == true): echo 'lance'; else: echo 'loginModal'; endif; ?>" class="btn"
                                                               style="text-align: center;" onclick="lancemodal();">DE SEU LANCE</a></h6>





                            <h4 style="text-align: center;">

                            <i style="font-size: 30pt;" class="icon-clock"></i><br>
                              <p id="contador" style="font-size: 11pt;">Encerra em </p>



</h4>
                        </section>



                    </div>
                </div>


            </div>
        </div>
    </section><!--Catalog Grid Close-->

    <div class="modal fade" id="lance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Dar Lance</h4>
                </div>
                <div class="modal-body" id="lancemodal">

                </div>
            </div>
        </div>
    </div>

</div>

<?php $this->load->view('site/fixed_files/footer'); ?>
