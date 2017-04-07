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

                    if(isset($_POST['emaill']) and isset($_POST['senhal']) and !empty($_POST['emaill']) and !empty($_POST['senhal'])):
                        if ($this->cadastro_model->login(1, $_POST['emaill'], $_POST['senhal'],'') == 11):
                            echo 11;
                        else:

                            echo $data['errorReport'] = $this->cadastro_model->login(1, $_POST['emaill'], $_POST['senhal'],'');



                            endif;
                        else:


                        echo 'Todos os Campos Tem que ser Preenchidos';


                    endif;


                endif;


            else:

                if(!isset($_POST['typeLogs'])):

                echo 'Houve um Erro Tente Mais Tarde';

                endif;
            endif;

           //FormLogin 2
            if (isset($_POST['typeLogs']) and !empty($_POST['typeLogs'])):

                //Login Pelo Site
                if ($_POST['typeLogs'] == 1):

                    if(isset($_POST['emaills']) and isset($_POST['senhals']) and !empty($_POST['emaills']) and !empty($_POST['senhals'])):
                        if ($this->cadastro_model->login(1, $_POST['emaills'], $_POST['senhals'],'') == 11):
                            echo 11;
                        else:

                            echo $data['errorReport'] = $this->cadastro_model->login(1, $_POST['emaill'], $_POST['senhals'],'');



                            endif;
                        else:


                        echo 'Todos os Campos Tem que ser Preenchidos';


                    endif;


                endif;


            else:
                if(!isset($_POST['typeLog'])):

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


    //Funções Especificas

    //categorias Ajax

    public function divs_categorias(){


        $valor['tipo'] = $_POST['tipo'];
        $valor['pag'] = $_POST['pag'];
        $valor['banco'] = 'categorias';
        $valor['div'] = 'explorar_categorias';
        $valor['categoria'] = '';
        $valor['subcategoria'] ='';
        $valor['sub_subcategoria'] = '';
        $this->load->view('site/itens/busca_categoria', $valor);


    }

    public function divs_leiloes(){

        $explodecate = explode('?',$_POST['segment3']);

        $valor['tipo'] = 2;
        $valor['pag'] = $explodecate[0];
        $valor['banco'] = 'leiloes';
        $valor['div'] = 'buscar_por_categorias';
        $valor['categoria'] = $explodecate[0];
        $valor['subcategoria'] ='';
        $valor['sub_subcategoria'] = '';
        $this->load->view('site/itens/busca_categoria', $valor);


    }

    public function divs_leiloes_sub(){

        $explodecate = explode('?',$_POST['segment3']);
        $explodesubcate = explode('?',$_POST['segment4']);

        $valor['tipo'] = 3;
        $valor['pag'] = $explodecate[0];
        $valor['banco'] = 'leiloes_sub';
        $valor['div'] = 'buscar_por_sub_categorias';
        $valor['categoria'] = $explodecate[0];
        $valor['subcategoria'] = $explodesubcate[0];;
        $valor['sub_subcategoria'] = '';
        $this->load->view('site/itens/busca_categoria', $valor);


    }
    public function divs_leiloes_sub_sub(){

        $explodecate = explode('?',$_POST['segment3']);
        $explodesubcate = explode('?',$_POST['segment4']);
        $explodesubsubcate = explode('?',$_POST['segment5']);

        $valor['tipo'] = 4;
        $valor['pag'] = $explodecate[0];
        $valor['banco'] = 'leiloes_sub_sub';
        $valor['div'] = 'buscar_por_sub_sub_categorias';
        $valor['categoria'] = $explodecate[0];
        $valor['subcategoria'] = $explodesubcate[0];;
        $valor['sub_subcategoria'] = $explodesubsubcate[0];
        $this->load->view('site/itens/busca_categoria', $valor);


    }
    public function divs_busca(){

        $explodebusca = explode('=',$_POST['segment3']);
        $valor['tipo'] = 1;
        $valor['pag'] = $_POST['pag'];
        $valor['busca'] = $explodebusca[0];
        $this->load->view('site/itens/busca', $valor);


    }

}
