<?php namespace App\Controllers;

class Formulario extends BaseController{
    public function index(){
            echo view('templates/header');
            echo view('pages/home');
            echo view('templates/footer');
    }

    public function view($page = 'form'){
    if(! is_file(APPPATH.'Views/pages/'.$page.'.php')){
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
            echo view('templates/header', $data);
            echo view('pages/' . $page, $data);
            echo view('templates/footer', $data);
    }

    public function cadastrar() {
             $this->load->library('form_validation');
             $this->form_validation->set_rules('usuario', 'Usuário',
                  'required|min_length[5]|max_length[12]');
             $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[7]',
                   array('required' => 'Você deve preencher a %s.'));
             $this->form_validation->set_rules('senhaconf', 'Confirmação de Senha',
                   'required|matches[senha]');
             $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

             if ($this->form_validation->run() == FALSE) {
                $erros = array('mensagens' => validation_errors());
                $this->load->view('cadastro/formulario', $erros);
            } else {
                echo "Formulário enviado com sucesso.";
            }
        }
}