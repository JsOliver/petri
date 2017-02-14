<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('sessionsverify_model');
        $this->load->model('cadastro_model');

    }


    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function cadastro(){

        if($this->sessionsverify_model->logver() == false):

            if(isset($_POST['email']) and isset($_POST['senha']) and isset($_POST['nome']) and isset($_POST['sobrenome'])):

            if ($this->cadastro_model->cadastro(1, $_POST['email'], $_POST['senha'], '', $_POST['nome'], $_POST['sobrenome']) == 11):
                redirect(base_url('home'), 'refresh');
            else:
                $data['errorReport'] = $this->cadastro_model->cadastro(1, $_POST['email'], $_POST['senha'], '', $_POST['nome'], $_POST['sobrenome']);

                $this->load->view('site/acesso/logreg',$data);

            endif;

            else:
                $data['errorReport'] = 'Nenhum campo pode ficar vazio!';
                $this->load->view('site/acesso/logreg',$data);

            endif;
            endif;
        }
}
