<?php


    $_POST['tipo'] = $tipo;
    $_POST['busca'] = $busca;
    $_POST['pag'] = $pag;


$limit = 28;

if ($_POST['tipo'] == '1'):

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
    $this->db->like('keywords',$_POST['busca']);
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
    $this->db->like('keywords',$_POST['busca']);
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

            $this->Functions_Model->pagination('busca',$_POST['pag'],$total,$this->uri->segment(0),$this->uri->segment(1),$_POST['busca'],'','',$_POST['tipo'],'busca_result');
        endif;
    endif;

endif;


?>



