<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('sessionsverify_model');
        $this->load->model('cadastro_model');


    }
	public function index()
	{

                $this->load->view('site/home');

	}

	public function cadastro()
	{
        if($this->sessionsverify_model->logver() == false):
            $data['errorReport'] = '';
		$this->load->view('site/acesso/logreg',$data);
        else:
            redirect(base_url('home'), 'refresh');

        endif;
	}
}
