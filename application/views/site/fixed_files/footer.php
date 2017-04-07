<?php

$this->db->from('footer');
$this->db->order_by('id_footer', 'desc');
$this->db->limit(1, 0);
$get = $this->db->get();
$count = $get->num_rows();
if ($count > 0):
    $result = $get->result_array();
    $redes = $result[0]['redes_sociais'];
    $descricao = $result[0]['descricao'];
    $contato = $result[0]['contato'];
    $explode_rede = explode('(<==>)', $redes);
    $redes = $explode_rede;

else:
    $redes = '';
    $contato = '';
    $descricao = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.';


endif;
?>
<div class="sticky-btns">
    <form class="quick-contact ajax-form" method="post" name="quick-contact">
        <h3>Entre em Contato</h3>
        <p class="text-muted">Informe-nos sobre suas duvidas ou sujestões.</p>
        <?php
        if($logado == false):
        ?>
        <div class="form-group">
            <label for="qc-name">Nome Completo</label>
            <input class="form-control input-sm" type="text" name="name" id="qc-name" placeholder="Informe seu Nome Completo">
        </div>
        <div class="form-group">
            <label for="qc-email">E-mail</label>
            <input class="form-control input-sm" type="email" name="email" id="qc-email" placeholder="Informe seu e-mail">
        </div>
        <?php endif;?>
        <div class="form-group">
            <label for="qc-message">Sua Mensagem</label>
            <textarea class="form-control input-sm" name="message" id="qc-message"
                      placeholder="Digite Sua Mensagem"></textarea>
        </div>

        <div class="response-holder"></div>

        <input class="btn btn-success btn-sm btn-block" type="submit" value="Send">
    </form>
    <span id="qcf-btn"><i class="fa fa-envelope"></i></span>
    <span id="scrollTop-btn"><i class="fa fa-chevron-up"></i></span>
</div>
<!--Footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="info">
                    <a class="logo" href="<?php echo base_url(''); ?>"><img
                            src="<?php echo base_url('web/img/logo.png'); ?>" alt="<?php echo $cogs['meta_title']; ?>"/></a>
                    <p><?php echo $descricao; ?></p>
                    <div class="social">
                        <?php

                        //Redes Sociais

                        foreach ($redes as $value) {

                            echo $value;

                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h2>Participe dos Leilões</h2>
                <ul class="list-unstyled">

                    <?php

                    $this->db->from('leiloes');
                    $this->db->order_by('id_leilao', 'rand()');
                    $this->db->limit(7, 0);
                    $get = $this->db->get();
                    $count = $get->num_rows();

                    if ($count > 0):
                    $result = $get->result_array();
                        foreach ($result as $value){
                        ?>

                            <li><?php echo $value['nome'];?></li>


                        <?php } else: ?>
                        <li>Nenhum Leilão Encontrado</li>

                    <?php endif; ?>
                </ul>
            </div>
            <div class="contacts col-lg-3 col-md-3 col-sm-3">
                <h2>Contatos</h2>
                <?php
                //Contato

                echo $contato;
                ?>
            </div>
        </div>
        <div class="copyright">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <p>&copy; <?php echo date('Y') ?> MOSCA BRANCA. Todos os Direitos Reservados. Desenvolvido por <a
                            href="http://www.ncbrasil.com.br"
                            target="_blank">NCBrasil</a></p>
                </div>

            </div>
        </div>
    </div>
</footer><!--Footer Close-->

<?php

echo $cogs['js'];
?>

<script>
    function carregando() {

        var dado = '<div style="background:#f7f7f7;position: fixed;z-index: 10000000000000000;border:2px solid #5d5d5d;top: 50%;left: 42%;padding: 1%;float: left;"><h2 style="padding:0;margin:0;float: left; "><img style="float:left;" src="' + DIR + 'assets/img/loader.gif"><span id="texto-carregando">&nbsp; Carregando...</span></h2></div>';

        return dado;

    }

</script>


<?php
if ($logado == true):
    ?>

    <script>


        function logout() {

            $.ajax({
                type: "POST",
                url: DIR + "Ajax/logout",
                beforeSend: function () {
                    $('.content-loading').html(carregando());
                },
                error: function (data) {

                    $('.content-loading').html('');
                    alert('erro');
                },
                success: function (data) {
                    if (data == 11) {
                        $('.content-loading').html('');

                        window.location.reload();

                    } else {
                        $('.content-loading').html('');

                        $("#errorlog").html(data);
                    }
                }
            });

        }

    </script>

<?php endif; ?>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/966923546/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>

</body><!--Body Close-->
</html>