<?php

$_POST['pag'] = $pag;
if(!isset($_POST['lojaid'])):
    $_POST['id_loja'] = $id_loja;
endif;


$limit = 28;


    if (!isset($_POST['pag'])):

        if(isset($_GET['pag'])):

            if($_GET['pag']<=0):
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



    $this->db->from('leiloes');
$this->db->where('status', '1');
$this->db->or_where('status', '2');
    $this->db->like('id_loja',$_POST['id_loja']);
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



    $this->db->from('leiloes');
$this->db->where('status', '1');
$this->db->or_where('status', '2');
    $this->db->like('id_loja',$_POST['id_loja']);
    $this->db->order_by('acessos', 'desc', 'id_categoria', 'desc');
    $this->db->limit($limit, $atual);
    $get = $this->db->get();
    $count = $get->num_rows();

    if ($count > 0):
        $result = $get->result_array();

        foreach ($result as $value) {

            $this->load->view('site/itens/leiloes', $value);
        }

    else:
        echo '<h1>Nenhum Leilão Encontrado.</h1>';

    endif;
    if($count > 0):
        if($total > 0):

            $this->Functions_Model->pagination('loja',$_POST['pag'],$total,$this->uri->segment(0),$this->uri->segment(1),'','','','','busca_result');
        endif;
    endif;



?>



