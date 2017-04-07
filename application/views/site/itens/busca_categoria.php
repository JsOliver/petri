<?php

$limit_ct = 18;

if(!isset($_POST['tipo'])):
    $_POST['tipo'] = $tipo;

endif;
if(!isset($_POST['categoria'])):
    $_POST['categoria'] = $categoria;
endif;
if(!isset($_POST['subcategoria'])):
    $_POST['subcategoria'] = $subcategoria;
endif;

if(!isset($_POST['sub_subcategoria'])):
    $_POST['sub_subcategoria'] = $sub_subcategoria;
endif;
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



    $this->db->from('categorias');
    $get = $this->db->get();
    $count1 = $get->num_rows();
    $total = ceil($count1 / $limit_ct);
    $pagepost = $pag;
    if (isset($pagepost)):
        if ($pagepost <= 1):
            $atual = 0;
            $atualpg = 1;
        else:
            $atual = $limit_ct * $pagepost - $limit_ct;
            $atualpg = $pagepost;

        endif;
    else:
        $atual = 0;
        $atualpg = 1;

    endif;



    $this->db->from('categorias');
    $this->db->order_by('acessos', 'desc', 'id_categoria', 'desc');
    $this->db->limit($limit_ct, $atual);
    $get = $this->db->get();
    $count = $get->num_rows();

    if ($count > 0):
        $result = $get->result_array();

        foreach ($result as $value) {

            $this->load->view('site/itens/categorias', $value);
        }

    else:
        echo '<h1>Nenhuma Categoria Encontrada.</h1>';

    endif;
    if($count > 0):
        if($total > 0):

        $this->Functions_Model->pagination($banco,$pag,$total,$this->uri->segment(0),$this->uri->segment(1),$this->uri->segment(2),'','',$_POST['tipo'],$div);
    endif;
    endif;

endif;




//Tipo de Busca DOIS


if ($_POST['tipo'] == '2'):
    $limit_ict = 30;

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

    $categoria = str_replace('-',' ',$_POST['categoria']);

    $this->db->from('categorias');
    $this->db->where('nome',$categoria);
    $gets = $this->db->get();
    $countc = $gets->num_rows();
    if($countc > 0):

        $id_cate = $gets->result_array();
    $this->db->from('leiloes');
    $this->db->where('categoria',$id_cate[0]['id_categoria']);
    $get = $this->db->get();
    $count1 = $get->num_rows();
    $total = ceil($count1 / $limit_ict);


    $pagepost = $pag;
    if (isset($pagepost)):
        if ($pagepost <= 1):
            $atual = 0;
            $atualpg = 1;
        else:
            $atual = $limit_ict * $pagepost - $limit_ict;
            $atualpg = $pagepost;

        endif;
    else:
        $atual = 0;
        $atualpg = 1;

    endif;

    $this->db->from('leiloes');
    $this->db->where('categoria',$id_cate[0]['id_categoria']);
    $this->db->order_by('acessos', 'desc', 'id_leilao', 'desc','rate','desc');
    $this->db->limit($limit_ict, $atual);
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
else:

    echo '<h1>Nenhum Leilão Encontrado.</h1>';

    endif;

    if($countc > 0):
        $this->Functions_Model->pagination($banco,$pag,$total,$this->uri->segment(0),'categoria',$_POST['categoria'],$_POST['subcategoria'],$_POST['sub_subcategoria'],$_POST['tipo'],$div);

    endif;
    endif;


//Tipo de Busca 3

if ($_POST['tipo'] == '3'):
    $limit_ict = 30;

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

    $subcategoria = str_replace('-',' ',$_POST['subcategoria']);

    $this->db->from('subcategorias');
    $this->db->where('nome',$subcategoria);
    $gets = $this->db->get();
    $countc = $gets->num_rows();
    if($countc > 0):

        $id_cate = $gets->result_array();
        $this->db->from('leiloes');
        $this->db->where('subcategoria',$id_cate[0]['id_subcategoria']);
        $get = $this->db->get();
        $count1 = $get->num_rows();
        $total = ceil($count1 / $limit_ict);


        $pagepost = $pag;
        if (isset($pagepost)):
            if ($pagepost <= 1):
                $atual = 0;
                $atualpg = 1;
            else:
                $atual = $limit_ict * $pagepost - $limit_ict;
                $atualpg = $pagepost;

            endif;
        else:
            $atual = 0;
            $atualpg = 1;

        endif;

        $this->db->from('leiloes');
        $this->db->where('subcategoria',$id_cate[0]['id_subcategoria']);
        $this->db->order_by('acessos', 'desc', 'id_leilao', 'desc','rate','desc');
        $this->db->limit($limit_ict, $atual);
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
    else:

        echo '<h1>Nenhum Leilão Encontrado.</h1>';

    endif;

    if($countc > 0):
        $this->Functions_Model->pagination($banco,$pag,$total,$this->uri->segment(0),'categoria',$_POST['categoria'],$_POST['subcategoria'],$_POST['sub_subcategoria'],$_POST['tipo'],$div);

    endif;
endif;


//Tipo de Busca 4

if ($_POST['tipo'] == '4'):
    $limit_ict = 30;

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

    $subcategoria = str_replace('-',' ',$_POST['subcategoria']);

    $this->db->from('subcategorias');
    $this->db->where('nome',$subcategoria);
    $this->db->like('sub-subcategoria',str_replace('_',' ',$_POST['sub_subcategoria']));

    $gets = $this->db->get();
    $countc = $gets->num_rows();
    if($countc > 0):

        $id_cate = $gets->result_array();
        $this->db->from('leiloes');
        $this->db->where('subcategoria',$id_cate[0]['id_subcategoria']);
        $this->db->like('sub-subcategoria',str_replace('_',' ',$_POST['sub_subcategoria']));
        $get = $this->db->get();
        $count1 = $get->num_rows();
        $total = ceil($count1 / $limit_ict);


        $pagepost = $pag;
        if (isset($pagepost)):
            if ($pagepost <= 1):
                $atual = 0;
                $atualpg = 1;
            else:
                $atual = $limit_ict * $pagepost - $limit_ict;
                $atualpg = $pagepost;

            endif;
        else:
            $atual = 0;
            $atualpg = 1;

        endif;

        $this->db->from('leiloes');
        $this->db->where('subcategoria',$id_cate[0]['id_subcategoria']);
        $this->db->like('sub-subcategoria',str_replace('_',' ',$_POST['sub_subcategoria']));
        $this->db->order_by('acessos', 'desc', 'id_leilao', 'desc','rate','desc');
        $this->db->limit($limit_ict, $atual);
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
    else:

        echo '<h1>Nenhum Leilão Encontrado.</h1>';

        if($countc > 0):
            $this->Functions_Model->pagination($banco,$pag,$total,$this->uri->segment(0),'categoria',$_POST['categoria'],$_POST['subcategoria'],$_POST['sub_subcategoria'],$_POST['tipo'],$div);

        endif;
    endif;

endif;



?>



