<?php

if (!isset($_POST['itemid']) and !isset($_POST['nome']) and !isset($_POST['loja']) and !isset($_POST['lojaid']) and !isset($_POST['imagem'])):

    $_POST['itemid'] = $id_leilao;
    $_POST['nome'] = $nome;
    $_POST['loja'] = $loja;
    $_POST['lojaid'] = $id_loja;
    $_POST['imagem'] = $fotos;

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
        <div class="badges">
            <span class="sale"></span>
        </div>
        <div class="price-label" id="prizeitem<?php echo $_POST['itemid'];?>">R$ 0,00</div>
        <a href="#"><img src="<?php echo  $foto; ?>"
                         alt="<?php echo $_POST['nome']; ?>"/></a>
        <div class="footer">
            <a href="#">
                <?php echo $this->Functions_Model->limitarTexto($_POST['nome'], 50) ?>
            </a>
            <span>por <b
                    onclick="window.location.href='<?php echo base_url('loja/') . str_replace(' ', '-', strtolower($_POST['loja'])) . '/' . $_POST['lojaid']; ?>'"><?php echo $_POST['nome']; ?></b></span>
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
                <a class="add-cart-btn" href="<?php echo base_url('leilao/'). str_replace(' ', '-', strtolower($_POST['loja'])).'/'.$_POST['itemid'];?>"><span>Participar</span><i class="icon-shopping-cart"></i></a>
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