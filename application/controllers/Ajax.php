<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('sessionsverify_model');
        $this->load->model('cadastro_model');
        $this->load->model('Functions_Model');


    }


//Funções Gerais

    public function cadastro()
    {

        if ($this->sessionsverify_model->logver() == false):

            if (isset($_POST['email']) and isset($_POST['senha']) and isset($_POST['nome']) and isset($_POST['sobrenome'])):

                if ($this->cadastro_model->cadastro(1, $_POST['email'], $_POST['senha'], '', $_POST['nome'], $_POST['sobrenome']) == 11):
                    echo 11;
                else:
                    echo $data['errorReport'] = $this->cadastro_model->cadastro(1, $_POST['email'], $_POST['senha'], '', $_POST['nome'], $_POST['sobrenome']);

                    $this->load->view('site/acesso/logreg', $data);

                endif;

            else:
                echo $data['errorReport'] = 'Nenhum campo pode ficar vazio!';
                $this->load->view('site/acesso/logreg', $data);

            endif;
        endif;
    }

    public function login()
    {

        if ($this->sessionsverify_model->logver() == false):


            //FormLogin 1

            if (isset($_POST['typeLog']) and !empty($_POST['typeLog'])):

                //Login Pelo Site
                if ($_POST['typeLog'] == 1):

                    if (isset($_POST['emaill']) and isset($_POST['senhal']) and !empty($_POST['emaill']) and !empty($_POST['senhal'])):
                        if ($this->cadastro_model->login(1, $_POST['emaill'], $_POST['senhal'], '') == 11):
                            echo 11;
                        else:

                            echo $data['errorReport'] = $this->cadastro_model->login(1, $_POST['emaill'], $_POST['senhal'], '');


                        endif;
                    else:


                        echo 'Todos os Campos Tem que ser Preenchidos';


                    endif;


                endif;


            else:

                if (!isset($_POST['typeLogs'])):

                    echo 'Houve um Erro Tente Mais Tarde';

                endif;
            endif;

            //FormLogin 2
            if (isset($_POST['typeLogs']) and !empty($_POST['typeLogs'])):

                //Login Pelo Site
                if ($_POST['typeLogs'] == 1):

                    if (isset($_POST['emaills']) and isset($_POST['senhals']) and !empty($_POST['emaills']) and !empty($_POST['senhals'])):
                        if ($this->cadastro_model->login(1, $_POST['emaills'], $_POST['senhals'], '') == 11):
                            echo 11;
                        else:

                            echo $data['errorReport'] = $this->cadastro_model->login(1, $_POST['emaill'], $_POST['senhals'], '');


                        endif;
                    else:


                        echo 'Todos os Campos Tem que ser Preenchidos';


                    endif;


                endif;


            else:
                if (!isset($_POST['typeLog'])):

                    echo 'Houve um Erro Tente Mais Tarde';

                endif;
            endif;

        else:

            redirect(base_url('minha-conta'), 'refresh');

        endif;


    }

    public function logout()
    {
        if ($this->sessionsverify_model->logver() == false):

            echo 11;

        else:
            session_destroy();

            echo 11;

        endif;

    }

    public function errorLog($error)
    {


    }

    public function email($from, $fromname, $to, $toname, $headers, $assunto, $mensagem)
    {

        //echo 11;

    }

    //Funções Especificas

    //categorias Ajax

    public function divs_categorias()
    {


        $valor['tipo'] = $_POST['tipo'];
        $valor['pag'] = $_POST['pag'];
        $valor['banco'] = 'categorias';
        $valor['div'] = 'explorar_categorias';
        $valor['categoria'] = '';
        $valor['subcategoria'] = '';
        $valor['sub_subcategoria'] = '';
        $this->load->view('site/itens/busca_categoria', $valor);


    }

    public function divs_leiloes()
    {

        $explodecate = explode('?', $_POST['segment3']);

        $valor['tipo'] = 2;
        $valor['pag'] = $explodecate[0];
        $valor['banco'] = 'leiloes';
        $valor['div'] = 'buscar_por_categorias';
        $valor['categoria'] = $explodecate[0];
        $valor['subcategoria'] = '';
        $valor['sub_subcategoria'] = '';
        $this->load->view('site/itens/busca_categoria', $valor);


    }

    public function divs_leiloes_sub()
    {

        $explodecate = explode('?', $_POST['segment3']);
        $explodesubcate = explode('?', $_POST['segment4']);

        $valor['tipo'] = 3;
        $valor['pag'] = $explodecate[0];
        $valor['banco'] = 'leiloes_sub';
        $valor['div'] = 'buscar_por_sub_categorias';
        $valor['categoria'] = $explodecate[0];
        $valor['subcategoria'] = $explodesubcate[0];
        $valor['sub_subcategoria'] = '';
        $this->load->view('site/itens/busca_categoria', $valor);


    }

    public function divs_leiloes_sub_sub()
    {

        $explodecate = explode('?', $_POST['segment3']);
        $explodesubcate = explode('?', $_POST['segment4']);
        $explodesubsubcate = explode('?', $_POST['segment5']);

        $valor['tipo'] = 4;
        $valor['pag'] = $explodecate[0];
        $valor['banco'] = 'leiloes_sub_sub';
        $valor['div'] = 'buscar_por_sub_sub_categorias';
        $valor['categoria'] = $explodecate[0];
        $valor['subcategoria'] = $explodesubcate[0];
        $valor['sub_subcategoria'] = $explodesubsubcate[0];
        $this->load->view('site/itens/busca_categoria', $valor);


    }

    public function divs_busca()
    {

        $explodebusca = explode('=', $_POST['segment3']);
        $valor['tipo'] = 1;
        $valor['pag'] = $_POST['pag'];
        $valor['busca'] = $explodebusca[0];
        $this->load->view('site/itens/busca', $valor);


    }


    public function valor_atual_leilao()
    {


        if (isset($_POST['leilao_id']) and !empty($_POST['leilao_id'])):

            $this->db->select('valor_lance');
            $this->db->from('lances');
            $this->db->where('id_leilao', $_POST['leilao_id']);
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

        else:

            echo '0,00';

        endif;


    }


    public function comletecad()
    {
        if ($this->sessionsverify_model->logver() == false):

            echo '<script>window.location.href="' . base_url('entrar') . '"</script>';

        else:

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):

                $result = $get->result_array();
                if ($result[0]['situacao'] == 0):


                    if (isset($_POST['type'])):


                        if ($_POST['type'] == 1):

                            $this->db->where('id', $_SESSION['ID']);
                            $dado['cpf'] = $_POST['cpf'];
                            $dado['rg'] = $_POST['rg'];
                            $dado['data_nascimento'] = $_POST['ddn'];
                            $dado['sexo'] = $_POST['sexo'];
                            $dado['nacionalidade'] = $_POST['ncd'];
                            $dado['profissao'] = $_POST['ppr'];
                            $dado['endereco'] = $_POST['ec'];
                            $dado['tipo'] = $_POST['type'];
                            $dado['conheceu'] = $_POST['conheceu'];
                            $dado['situacao'] = 2;

                            if ($this->db->update('users', $dado)):

                                $dados['id_user'] = $_SESSION['ID'];
                                $dados['tipo_solicitacao'] = $_POST['type'];
                                $dados['data_solicitacao'] = date('YmdHis');
                                if ($this->db->insert('solicitacao_adm', $dados)):
                                    //Email para o cliente
                                    $mail = $this->email('', '', '', '', '', '', '');
                                    if ($mail == 11):
                                        echo 11;
                                    else:

                                        //Se Email para o cliente falhar, grava um LOG e Envia para o ADM um Email
                                        $this->errorLog($mail);
                                        $this->email('', '', '', '', '', '', '');


                                    endif;

                                endif;
                            endif;


                        else:


                            $dadol['cnpj'] = $_POST['cnpj'];
                            $dadol['razao'] = $_POST['razao'];
                            $dadol['inscricao_estadual'] = $_POST['ine'];
                            $dadol['inscricao_municipal'] = $_POST['inm'];
                            $dadol['nome_socio_diretor'] = $_POST['nsd'];
                            $dadol['cpf_socio_diretor'] = $_POST['nsd'];
                            $dadol['sexo_diretor'] = $_POST['nsd'];
                            $dadol['funcionario_contato'] = $_POST['nsd'];
                            $dadol['sexo_funcionario_contato'] = $_POST['nsd'];
                            $insere = $this->db->insert('lojas', $dadol);

                            if ($insere):

                                $this->db->where('id', $_SESSION['ID']);
                                $dado['id_loja'] = $insere;
                                $dado['conheceu'] = $_POST['conheceu'];
                                $dado['tipo'] = $_POST['tipo'];
                                $dado['situacao'] = 2;


                                if ($this->db->update('users', $dado)):

                                    $dados['id_user'] = $_SESSION['ID'];
                                    $dados['tipo_solicitacao'] = $_POST['type'];
                                    $dados['data_solicitacao'] = date('YmdHis');
                                    if ($this->db->insert('solicitacao_adm', $dados)):
                                        //Email para o cliente
                                        $mail = $this->email('', '', '', '', '', '', '');
                                        if ($mail == 11):
                                            echo 11;
                                        else:

                                            //Se Email para o cliente falhar, grava um LOG e Envia para o ADM um Email
                                            $this->errorLog($mail);
                                            $this->email('', '', '', '', '', '', '');


                                        endif;


                                    endif;
                                endif;
                            endif;
                        endif;
                    endif;


                else:


                endif;


            endif;
        endif;

    }

    public function janela_dados($leilao)
    {

        $this->load->view('ajax/completar_cadastro');

    }

    public function janela_analise($leilao)
    {

        echo '<h1>Cadastro em Analise</h1>';

    }

    public function ajaxlance()
    {

        if (isset($_POST['leilao_id']) and isset($_POST['valor']) and $this->sessionsverify_model->logver() == true):

            $this->db->from('leiloes');
            $this->db->where('id_leilao', $_POST['leilao_id']);
            $getln1 = $this->db->get();
            $countln1 = $getln1->num_rows();



            if ($countln1 > 0):

                $resultln1 = $getln1->result_array();


                $this->db->from('lances');
                $this->db->where('id_leilao', $_POST['leilao_id']);
                $this->db->order_by('id_lance', 'desc', 'valor_lance', 'desc');
                $this->db->limit(1, 0);
                $getln = $this->db->get();
                $countln = $getln->num_rows();





                if ($countln <= 0):

                    if(number_format((float)$_POST['valor'],2, '.', '') < number_format((float)$resultln1[0]['lance_inicial'],2, '.', '')):

                        echo 55;

                    else:

                        $dado['id_usuario'] = $_SESSION['ID'];
                        $dado['id_leilao'] = $_POST['leilao_id'];
                        $dado['data_lance'] = date('YmdHis');
                        $dado['valor_lance'] = number_format((float)$_POST['valor'], 2, '.', '');
                        if ($this->db->insert('lances', $dado)):


                            $this->db->from('lances');
                            $this->db->where('id_leilao', $_POST['leilao_id']);
                            $this->db->order_by('id_lance', 'desc', 'valor_lance', 'desc');
                            $get = $this->db->get();
                            $count = $get->num_rows();
                            if ($count > 0):
                                $result = $get->result_array();
                                foreach ($result as $value) {

                                    $mail = $this->email('', '', '', '', '', '', '');
                                    if ($mail == 11):
                                        $dado['id_usuario_to'] = $value['id_usuario'];
                                        $dado['id_lance'] = $value['id_lance'];
                                        $dado['data_lance_send'] = date('YmdHis');
                                        $dado['status'] = 1;

                                    else:
                                        $dado['id_usuario_to'] = $value['id_usuario'];
                                        $dado['id_lance'] = $value['id_lance'];
                                        $dado['data_lance_send'] = date('YmdHis');
                                        $dado['status'] = 0;

                                    endif;

                                }

                                $dado['mensagem'] = 'Lance Efetuado com Sucesso';
                                $dado['mensagem2'] = 'Você Recebera um E-mail de Confirmação do seu lance em breve.';
                                $this->load->view('ajax/sucessomensagem', $dado);


                            else:

                                $mail = $this->email('', '', '', '', '', '', '');
                                $this->load->view('ajax/sucessomensagem', $dado);

                            endif;


                        else:

                            //NÃO DEU LANCE, DEU ERRO

                            $this->errorLog('');
                            $dado['mensagem'] = 'Erro ao dar Lance';
                            $dado['mensagem2'] = 'Ocorreu um erro ao da seu lance, tente novamente.';
                            $this->load->view('ajax/erromensagem', $dado);


                        endif;

                    endif;
                else:

                    $this->db->from('lances');
                    $this->db->where('id_leilao', $_POST['leilao_id']);
                    $this->db->order_by('id_lance', 'desc', 'valor_lance', 'desc');
                    $this->db->limit(1, 0);
                    $getssp = $this->db->get();
                    $countssp = $getssp->num_rows();
                    if ($countssp > 0):

                        $resultssp = $getssp->result_array();
                        $minimo = number_format((float)$resultssp[0]['valor_lance'], 2, '.', '');
                    else:
                        $minimo = number_format((float)$resultln1[0]['lance_inicial'], 2, '.', '');

                    endif;
                    if(number_format((float)$_POST['valor'],2, '.', '') < number_format((float)$minimo,2, '.', '')):

                        echo 55;

                    else:

                        $dado['id_usuario'] = $_SESSION['ID'];
                        $dado['id_leilao'] = $_POST['leilao_id'];
                        $dado['data_lance'] = date('YmdHis');
                        $dado['valor_lance'] = number_format((float)$_POST['valor'], 2, '.', '');
                        if ($this->db->insert('lances', $dado)):


                            $this->db->from('lances');
                            $this->db->where('id_leilao', $_POST['leilao_id']);
                            $this->db->order_by('id_lance', 'desc', 'valor_lance', 'desc');
                            $get = $this->db->get();
                            $count = $get->num_rows();
                            if ($count > 0):
                                $result = $get->result_array();
                                foreach ($result as $value) {

                                    $mail = $this->email('', '', '', '', '', '', '');
                                    if ($mail == 11):
                                        $dado['id_usuario_to'] = $value['id_usuario'];
                                        $dado['id_lance'] = $value['id_lance'];
                                        $dado['data_lance_send'] = date('YmdHis');
                                        $dado['status'] = 1;

                                    else:
                                        $dado['id_usuario_to'] = $value['id_usuario'];
                                        $dado['id_lance'] = $value['id_lance'];
                                        $dado['data_lance_send'] = date('YmdHis');
                                        $dado['status'] = 0;

                                    endif;

                                }

                                $dado['mensagem'] = 'Lance Efetuado com Sucesso';
                                $dado['mensagem2'] = 'Você Recebera um E-mail de Confirmação do seu lance em breve.';
                                $this->load->view('ajax/sucessomensagem', $dado);


                            else:

                                if($this->email('', '', '', '', '', '', '') == 11):
                                    $this->load->view('ajax/sucessomensagem', $dado);

                                else:
                                    $this->load->view('ajax/sucessomensagem', $dado);
                                    $this->errorLog('');
                                endif;

                            endif;


                        else:

                            //NÃO DEU LANCE, DEU ERRO

                            $this->errorLog('');
                            $dado['mensagem'] = 'Erro ao dar Lance';
                            $dado['mensagem2'] = 'Ocorreu um erro ao da seu lance, tente novamente.';
                            $this->load->view('ajax/erromensagem', $dado);


                        endif;

                    endif;





                endif;


            else:

                $dado['mensagem'] = 'Erro ao dar Lance';
                $dado['mensagem2'] = 'Ocorreu um erro ao da seu lance, tente novamente.';
                $this->load->view('ajax/erromensagem', $dado);

            endif;







        else:

            $dado['mensagem'] = 'Erro ao dar Lance';
            $dado['mensagem2'] = 'Ocorreu um erro ao da seu lance, tente novamente.';
            $this->load->view('ajax/erromensagem', $dado);


        endif;


    }

    public function janela_lance($leilao)
    {
        $dados['logado'] = $this->sessionsverify_model->logver();
        $dados['leilao'] = $leilao;
        $this->load->view('ajax/lance', $dados);

    }


    public function lance_janela()
    {

        if ($this->sessionsverify_model->logver() == false):
            $this->load->view('ajax/login');
        else:
            if ($_POST['leilao_id']):
                $this->db->from('users');
                $this->db->where('id', $_SESSION['ID']);
                $get = $this->db->get();
                $count = $get->num_rows();

                if ($count < 0):

                    echo '<h1 style="text-align: center;">Indisponivel</h1>';
                else:
                    $result = $get->result_array();

                    $verify = $result[0]['situacao'];

                    if ($verify == 1):

                        echo $this->janela_lance($_POST['leilao_id']);

                    elseif ($verify == 2):

                        echo $this->janela_analise($_POST['leilao_id']);


                    else:

                        echo $this->janela_dados($_POST['leilao_id']);

                    endif;

                endif;

            else:

                echo $this->load->view('ajax/login');


            endif;


        endif;


    }

    public function locais()
    {


        if (isset($_POST['key'])):


            $this->db->select('nome', 'id');
            $this->db->from('localidade');
            $this->db->like('cidade', $_POST['key']);
            $this->db->or_like('estado', $_POST['key']);
            $this->db->or_like('uf', $_POST['key']);
            $this->db->limit(50, 0);
            $get = $this->db->get();
            if ($get->num_rows() > 0):

                $result = $get->result_array();

                foreach ($result as $value) {
                    echo '<li title="' . $value['nome'] . '" style="margin: 0;padding: 1% 1% 1% 0;"><a style="font-size: 12pt;text-align: center;">' . $value['nome'] . '</a></li>';
                }


            else:
                echo '<b style="padding: 2%;">Nenhum Resultado Encontrado.</b>';
            endif;

        endif;


    }
}
