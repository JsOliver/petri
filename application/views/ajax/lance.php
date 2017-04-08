<?php
$this->db->from('leiloes');
$this->db->where('id_leilao', $leilao);
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

<?php

$this->db->from('lances');
$this->db->where('id_leilao', $leilao);
$this->db->order_by('id_lance', 'desc', 'valor_lance', 'desc');
$this->db->limit(1,0);
$getln = $this->db->get();
$countln = $getln->num_rows();
if ($countln <= 0):
    $lancedispo = 1;
else:
    $resultln = $getln->result_array();

    if ($resultln[0]['id_usuario'] == $_SESSION['ID']):

        $lancedispo = 0;


    else:

        $lancedispo = 1;

    endif;
endif;


?>
<?php
if($lancedispo == 1):
?>
<script>
    $('#lance-mask').mask('000.000.000.000.000,00', {reverse: true});
</script>

<?php endif;?>
<!--Price Section-->
<section class="filter-section">
    <a href="<?php echo base_url('lojas/') . str_replace(' ', '-', str_replace($replace, '', strtolower($result[0]['loja']))) . '/' . $result[0]['id_loja']; ?>"
       style="text-align: center;left:50%;"><img style="height: 150px;width: 100%;"
                                                 src="<?php echo base_url('web/fotos/lojas/' . $resultl[0]['fotos']); ?>"></a>
    <h3 style="text-align: center;"><?php echo $this->Functions_Model->limitarTexto($resultl[0]['nome'], 50); ?></h3>
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
        <h5 style="text-align: center;">    <span style="text-align: center;font-size: 11pt;"><small><b
                        style="color: #342020;"><i
                            class="icon-clock"></i> Encerra <?php echo $semana["$data"] . ", {$dia}/" . $mes_extenso["$mes"] . "/{$ano} as " . $hora . "h" . $min . "m" . $seg . "s"; ?></b></small></span>
        </h5>
    <?php endif; ?>

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

                echo number_format($result[0]['valor_lance'], 2, ',', '.');

            else:

                echo '0,00';

            endif;
            ?></span></h5>


    <?php
    if($lancedispo == 1):
    ?>
    <script>
        function darlance() {

            $("#lancetexto1").html('Aguarde...');
            var lance = $("#lance-mask").val();


            $.ajax({
                type: "POST",
                url: DIR + "ajaxlance",
                data: {leilao_id: '<?php echo $leilao;?>', valor: lance},
                error: function (data) {

                    $("#lancetexto").text('Ocorreu um erro,tente mais tarde');
                    $("#lancetexto1").html('DE SEU LANCE');

                },
                success: function (data) {

                    if(data == 55){

                        $("#lancetexto").html('O valor do lance não pode ser menor que <b>R$ <?php   if ($count > 0):

                            echo number_format($result[0]['valor_lance'], 2, ',', '.');

                        else:

                            echo  number_format($result[0]['lance_inicial'], 2, ',', '.');

                        endif;?></b>');

                        $("#lancetexto1").html('DE SEU LANCE');

                    }else{

                        $("#lancemodal").html(data);


                    }





                }
            });
            return false;

        }
    </script>
    <form action="javascript:darlance();">
        <h5 style="text-align: center;">
            <div class="form-group group">
                <label for="log-password" style="font-size: 14pt;">Seu Lance</label>
                <input style="text-align: center;" type="text" class="form-control" name="lance" id="lance-mask"
                       placeholder="Informe um Lance Superior a <?php
                       if ($count > 0):

                           echo 'R$ ' . number_format($result[0]['valor_lance'], 2, ',', '.');

                       else:

                           echo  number_format($result[0]['lance_inicial'], 2, ',', '.');

                       endif;
                       ?>" required>
            </div>

        </h5>

        <h5 id="lancetexto" style="text-align: center;"></h5>


        <h6 style="text-align: center;"><a class="btn" style="text-align: center;" onclick="darlance();"><span
                    id="lancetexto1">DE SEU LANCE</span></a></h6>
    </form>
    <?php endif;?>

    <?php if($lancedispo == 0):?>

    <h6 style="text-align: center;"><a class="btn" style="text-align: center;"><span
                id="lancetexto1">AGUARDANDO LANCE</span></a></h6>
    <h6 style="text-align: center;">Você deu o ultimo lance.</h6>
<?php endif;?>
</section>
