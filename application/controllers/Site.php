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

        $dados = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));
        $dados['logado'] = $this->SessionsVerify_Model->logver();


        $this->load->view('site/home', $dados);


    }

    public function minha_conta()
    {
        if ($this->SessionsVerify_Model->logver() == true):

            $metas = $this->Functions_Model->metas('cogs');

            $dados = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));
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

            $dados = str_replace("'.base_url('assets/').'", base_url('assets'), str_replace("<?php echo base_url(\'assets/\');?>", base_url('assets/'), $metas[0]));
            $dados['logado'] = $this->SessionsVerify_Model->logver();
            $dados['errorReport'] = '';
            $this->load->view('site/acesso/logreg', $dados);
        else:
            redirect(base_url('minha-conta'), 'refresh');

        endif;
    }
}
