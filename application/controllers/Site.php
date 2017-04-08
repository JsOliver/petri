<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('SessionsVerify_Model');
        $this->load->model('Cadastro_Model');
        $this->load->model('Functions_Model');


    }

    public function index()
    {

        $metas = $this->Functions_Model->metas('cogs');

        $dados['cogs'] = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));
        $dados['logado'] = $this->SessionsVerify_Model->logver();

        $dados['metas'] = $dados['cogs'];

        $this->load->view('site/home', $dados);


    }


    public function lojas()
    {


        $metas = $this->Functions_Model->metas('cogs');
        $dados['cogs'] = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));
        $dados['logado'] = $this->SessionsVerify_Model->logver();
        $dados['metas'] = $dados['cogs'];


        $this->load->view('site/loja', $dados);


    }
     public function leiloes()
    {


        $metas = $this->Functions_Model->metas('cogs');
        $dados['cogs'] = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));
        $metas2 = $this->Functions_Model->metas_personalizado('leiloes', 'id_leilao', 'id_leilao', $this->uri->segment(3));
        $dados['description'] = $metas2[0];
        $dados['logado'] = $this->SessionsVerify_Model->logver();
        $dados['metas'] = $dados['description'];


        $this->load->view('site/leilao', $dados);


    }

    public function buscar()
    {


        if (!isset($_GET['q']) or isset($_GET['q']) and empty($_GET['q'])):

            redirect(base_url(''));

        else:
            $metas = $this->Functions_Model->metas('cogs');
            $dados['cogs'] = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));


            $metasbusca = array([

                "meta_title" => "Resultados Sobre " . $_GET['q'] . " || Mosca Branca",
                "meta_description" => "Encontre leilões sobre " . ucwords($_GET['q']) . " no  Mosca Branca",
                "meta_keywords" => $dados['cogs']['meta_keywords'] . ' ' . $_GET['q'],
                "meta_author" => '',

            ]);

            $dados['description'] = $metasbusca[0];
            $dados['logado'] = $this->SessionsVerify_Model->logver();
            $dados['metas'] = $dados['description'];


            $this->load->view('site/busca_categorias', $dados);

        endif;
    }


    public function categoria()
    {


        $metas = $this->Functions_Model->metas('cogs');
        $dados['cogs'] = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));
        $metas2 = $this->Functions_Model->metas_personalizado('categorias', 'id_categoria', 'nome', $this->uri->segment(2));
        $dados['description'] = $metas2[0];
        $dados['logado'] = $this->SessionsVerify_Model->logver();
        $dados['metas'] = $dados['description'];


        $this->load->view('site/busca_categorias', $dados);


    }

    public function minha_conta()
    {
        if ($this->SessionsVerify_Model->logver() == true):

            $metas = $this->Functions_Model->metas('cogs');
            $dados['cogs'] = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));
            $dados['metas'] = $dados['cogs'];
            $dados['logado'] = $this->SessionsVerify_Model->logver();


            $this->load->view('site/users/minha-conta', $dados);

        else:
            redirect(base_url('entrar'), 'refresh');

        endif;

    }

    public function cadastro_login()
    {
        if ($this->SessionsVerify_Model->logver() == false):
            $metas = $this->Functions_Model->metas('cogs');
            $dados['cogs'] = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));
            $dados['metas'] = $dados['cogs'];
            $dados['logado'] = $this->SessionsVerify_Model->logver();
            $dados['errorReport'] = '';
            $this->load->view('site/acesso/logreg', $dados);
        else:
            redirect(base_url('minha-conta'), 'refresh');

        endif;
    }
}
