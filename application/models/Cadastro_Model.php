<?php

class Cadastro_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->reconnect();
        @session_start();
    }


    public function cadastro($type, $email, $pass, $idfacebook, $firstname, $lastname)
    {

        if ($type == 1):

            $this->db->from('users');
            $this->db->where('email', $email);
            $get = $this->db->get();
            $count = $get->num_rows();
            $result = $get->result_array();

            if ($count > 0):

                return 'Conta já cadastrada.';

            else:

                if (strlen($email) < 1):

                    return 'Informe o Email';
                else:
                    if (!preg_match('/^[0-9a-z\_\.\-]+\@[0-9a-z\_\.\-]*[0-9a-z\_\-]+\.[a-z]{2,3}$/i', $email)):
                        return 'Email Inválido';
                    else:

                        if(!preg_match('/^[0-9a-z]{6,25}$/i',$pass)):
                            return 'Senha Inválida';
                        else:



                            if(!empty($firstname) and !empty($lastname)):
                                $dados['firstname'] = $firstname;
                                $dados['lastname'] = $lastname;
                                $dados['email'] = $email;
                                $dados['pass'] = hash('whirlpool',md5(sha1($pass)));
                                $dados['status'] = 1;
                                $dados['verify'] = 0;
                                $dados['type'] = 1;
                                if($this->db->insert('users',$dados)):
                                    $_SESSION['Auth01'] = true;
                                    $_SESSION['NAME'] = $firstname.' '.$lastname;
                                    $_SESSION['EMAIL'] = $email;
                                    $_SESSION['PASS'] = hash('whirlpool',md5(sha1($pass)));
                                    $_SESSION['ID'] = $this->db->insert_id();
                                    return 11;
                                    else:
                                    return 0;
                                    endif;
                                else:
                                return 0;
                                endif;


                    endif;
                    endif;
                endif;


            endif;

        endif;

    }
}

?>