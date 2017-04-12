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


$datafim = $_POST['data_terminio'];

if($datafim <= date('YmdHis') and $_POST['status'] == '1'):

    $data['status'] = 3;
    $this->db->where('id_leilao',$_POST['itemid']);
    $this->db->update('leiloes',$data);

else:

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

            if($_POST['status'] == '2'):
                echo '<small>TEMPO ILIMITADO</small>';

            endif;

            if($_POST['status'] == '3'):
                echo '<small>FINALIZADO</small>';
            endif;
            ?>




        </div>

        <a
            <?php if($_POST['status'] <> '3'): ?>
            href="<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>"
            <?php endif;?>

        ><img src="<?php echo  $foto; ?>"

                         alt="<?php echo $_POST['nome']; ?>"/></a>
        <div class="footer">
            <a
                <?php if($_POST['status'] <> '3'): ?>

                href="<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>"
            <?php endif;?>
            >
                <?php echo $this->Functions_Model->limitarTexto($_POST['nome'], 50); ?>
            </a>

            <span>por <b style="cursor: pointer;"
                    onclick="window.location.href='<?php echo base_url('loja/') . str_replace(' ', '-', strtolower($_POST['loja'])) . '/' . $_POST['lojaid']; ?>'"><?php echo $_POST['loja']; ?></b></span>

            <?php

            if($_POST['status'] == '1'):



            $data_completa = $_POST['data_terminio'];


                $dia = substr($data_completa,6,2);
                $ano = substr($data_completa,0,4);
                $mes = substr($data_completa,4,2);
                $data = strftime( '%A', strtotime( date( $ano.'-'.$mes.'-'.$dia ) ) );

            $semana = array(
                'Sunday' => 'Domingo',
                'Monday' => 'Segunda-Feira',
                'Tuesday' => 'Terca-Feira',
                'Wednesday' => 'Quarta-Feira',
                'Thursday' => 'Quinta-Feira',
                'Friday' => 'Sexta-Feira',
                'Saturday' => 'Sábado'
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
                <?php if($_POST['status'] <> '3'): ?>

                <!--Add To Cart Button-->
                <a class="add-cart-btn" href="<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>"><span>Participar</span><i class="icon-hammer"></i></a>
                <!--Share Button-->

                    <script>

                        function facebookshare(url) {

                            var width = 400;
                            var height = 250;

                            var left = 99;
                            var top = 99;

                            window.open('https://www.facebook.com/sharer/sharer.php?u='+url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

                        }

                        function twitter(twitter) {

                            var width = 400;
                            var height = 250;

                            var left = 99;
                            var top = 99;

                            window.open('https://twitter.com/intent/tweet?text='+twitter,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

                        }

                        function plus(plus) {

                            var width = 400;
                            var height = 250;

                            var left = 99;
                            var top = 99;

                            window.open('https://plus.google.com/share?url='+plus,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

                        }
                    </script>
                <div class="share-btn">
                    <div class="hover-state">
                        <a class="fa fa-facebook-square" href="javascript:facebookshare('<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>')"></a>
                        <a class="fa fa-twitter-square"  href="javascript:twitter('Venham Participar do Leilão de <?php echo $this->Functions_Model->limitarTexto($_POST['nome'], 25);?> no Mosca Branca. <?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>')"></a>
                        <a class="fa fa-google-plus-square" href="javascript:plus('<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>')"></a>
                    </div>
                    <i class="fa fa-share"></i>
                </div>
                <!--Add To Wishlist Button
                <a class="wishlist-btn" href="#">
                    <div class="hover-state">Wishlist</div>
                    <i class="fa fa-plus"></i>
                </a>-->
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php
endif;
    ?>