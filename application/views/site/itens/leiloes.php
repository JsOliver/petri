<?php

if (!isset($_POST['itemid']) and !isset($_POST['status']) and !isset($_POST['nome']) and !isset($_POST['loja']) and !isset($_POST['lojaid']) and !isset($_POST['imagem'])):

    $_POST['itemid'] = $id_leilao;
    $_POST['nome'] = $nome;
    $_POST['status'] = $status;
    $_POST['loja'] = $loja;
    $_POST['lojaid'] = $id_loja;
    $_POST['imagem'] = $fotos;
    $_POST['data_terminio'] = $data_terminio;

endif;


if(empty($_POST['imagem'])):

    $foto = base_url('assets/img/noimage.gif');

else:

    $explode_ft = explode('(<==>)',$_POST['imagem']);
    $foto = base_url('web/fotos/leiloes/').$explode_ft[0];

endif;

?>

<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="tile">

        <div class="price-label" style="<?php if($_POST['status'] == '4'): echo 'background:#3C8B5C;'; endif;?>" id="prizeitem<?php echo $_POST['itemid'];?>">

            <?php
            if($_POST['status'] == '1'):

            echo '<small>TEMPO LIMITADO</small>';
           endif;

            if($_POST['status'] == '4'):
                echo '<small>TEMPO ILIMITADO</small>';

            endif;
            ?>



        </div>

        <a href="<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>"><img src="<?php echo  $foto; ?>"
                         alt="<?php echo $_POST['nome']; ?>"/></a>
        <div class="footer">
            <a href="<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>">
                <?php echo $this->Functions_Model->limitarTexto($_POST['nome'], 50); ?>
            </a>

            <span>por <b style="cursor: pointer;"
                    onclick="window.location.href='<?php echo base_url('loja/') . str_replace(' ', '-', strtolower($_POST['loja'])) . '/' . $_POST['lojaid']; ?>'"><?php echo $_POST['loja']; ?></b></span>

            <?php

            if($_POST['status'] == '1'):

            $data_completa = $_POST['data_terminio'];
            $data = date('D');
            $ano = substr($data_completa,0,4);
            $mes = substr($data_completa,4,2);
            $dia = substr($data_completa,6,2);
            $semana = array(
                'Sun' => 'Domingo',
                'Mon' => 'Segunda-Feira',
                'Tue' => 'Terca-Feira',
                'Wed' => 'Quarta-Feira',
                'Thu' => 'Quinta-Feira',
                'Fri' => 'Sexta-Feira',
                'Sat' => 'Sábado'
            );



            $mes_extenso = array(
                '01' => 'Janeiro',
                '02' => 'Fevereiro',
                '03' => 'Marco',
                '04' => 'Abril',
                '05' => 'Maio',
                '06' => 'Junho',
                '07' => 'Julho',
                '08' => 'Agosto',
                '09' => 'Novembro',
                '10' => 'Setembro',
                '11' => 'Outubro',
                '12' => 'Dezembro'
            );


            ?>
            <span><small><b><i class="icon-calendar"></i> <?php    echo $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}";?></b></small></span>

            <?php endif;?>
            <div class="tools">
                <?php

                $this->db->select_sum('stars');
                $this->db->from('rate');
                $this->db->where('id_leilao', $_POST['itemid']);
                $get = $this->db->get();
                $count = $get->num_rows();

                if ($count <= 0): ?>
                    <div class="rate">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <?php else:

                    $result = $get->row()->stars;
                    $this->db->from('rate');
                    $this->db->where('id_leilao', $_POST['itemid']);
                    $get = $this->db->get();
                    $count1 = $get->num_rows();
                    $conta = ($result) / $count1;
                    $estrelas = number_format($conta,0,'','');

                    $nestrelas = 5 - $estrelas;
                    ?>
                    <div class="rate">
                        <?php

                        for($s=0;$s<$estrelas;$s++){
                        ?>
                            <span class="active"></span>

                        <?php }

                        for($ns=0;$ns<$nestrelas;$ns++){
                        ?>
                            <span></span>

                        <?php }?>

                    </div>

                <?php endif; ?>

                <!--Add To Cart Button-->
                <a class="add-cart-btn" href="<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>"><span>Participar</span><i class="icon-hammer"></i></a>
                <!--Share Button-->
                <div class="share-btn">
                    <div class="hover-state">
                        <a class="fa fa-facebook-square" href="#"></a>
                        <a class="fa fa-twitter-square" href="#"></a>
                        <a class="fa fa-google-plus-square" href="#"></a>
                    </div>
                    <i class="fa fa-share"></i>
                </div>
                <!--Add To Wishlist Button
                <a class="wishlist-btn" href="#">
                    <div class="hover-state">Wishlist</div>
                    <i class="fa fa-plus"></i>
                </a>-->
            </div>
        </div>
    </div>
</div>