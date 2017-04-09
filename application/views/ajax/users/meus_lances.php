<?php

$limit = 28;


if (!isset($_POST['pag'])):

    if (isset($_GET['pag'])):

        if ($_GET['pag'] <= 0):
            $pag = 1;

        else:
            $pag = $_GET['pag'];

        endif;
    else:
        $pag = 1;

    endif;
else:
    $pag = $_POST['pag'];
endif;


$this->db->select('id_lance');
$this->db->from('lances');
$this->db->where('id_usuario', $_SESSION['ID']);
$get = $this->db->get();
$count1 = $get->num_rows();
$total = ceil($count1 / $limit);
$pagepost = $pag;
if (isset($pagepost)):
    if ($pagepost <= 1):
        $atual = 0;
        $atualpg = 1;
    else:
        $atual = $limit * $pagepost - $limit;
        $atualpg = $pagepost;

    endif;
else:
    $atual = 0;
    $atualpg = 1;

endif;


$this->db->select('id_lance,id_leilao,valor_lance,data_lance');
$this->db->from('lances');
$this->db->where('id_usuario', $_SESSION['ID']);
$this->db->order_by('id_lance', 'desc');
$this->db->limit($limit, $atual);
$get = $this->db->get();
$count = $get->num_rows();
if ($count > 0):

    $result = $get->result_array();

    foreach ($result as $value) {


        $this->db->select('nome,loja,status');
        $this->db->from('leiloes');
        $this->db->where('id_leilao', $value['id_leilao']);
        $get2 = $this->db->get();
        $count2 = $get2->result_array();

        if ($count2 > 0):
            $result2 = $get2->result_array();
            ?>

            <tr>

                <td class="bold"><?php echo $value['id_lance']; ?></td>
                <?php
                $status = $result2[0]['status'];

                if ($status == 1 or $status == 2):
                    ?>

                    <td><a href="" target="_blank"><?php echo $this->Functions_Model->limitarTexto($result2[0]['nome'], 50); ?></a></td>

                <?php else:
                    ?>
                    <td><?php echo $this->Functions_Model->limitarTexto($result2[0]['nome'], 50); ?></td>

                <?php endif; ?>
                <td><?php echo number_format($value['valor_lance'], 2, ',', '.'); ?></td>

                <?php

                ?>
                <?php
                if ($status == 1 or $status == 2):

                    echo '<td class="status info" ><span style="background: #2b4580;">Em Disputa</span></td>';

                elseif ($status == 3):


                    $this->db->from('vencedor');
                    $get3 = $this->db->get();
                    $count3 = $get3->num_rows();


                    if ($count3 > 0):

                        $result3 = $get3->result_array();

                        if ($result3[0]['id_usuario'] == $_SESSION['ID']):

                            if ($result3[0]['valor_arremate'] == $value['valor_lance']):
                                echo '<td class="status primary"><span style="background: #35804c;">Arrematado</span></td>';

                            else:
                                echo '<td class="status primary"><span style="background: #35804c;">Finalizado</span></td>';

                            endif;


                        else:

                            echo '<td class="status primary "><span style="background: #2b4580;">Finalizado</span></td>';

                        endif;

                    else:

                        echo '<td class="status primary"><span>Não Disponivel</span></td>';

                    endif;


                else:

                    echo '<td class="status primary"><span>Não Disponivel</span></td>';

                endif;
                ?>
            </tr>

            <?php
        endif;


    }
else:

    echo '<h1>Nenhum lance encontrado.</h1>';

endif; ?>
