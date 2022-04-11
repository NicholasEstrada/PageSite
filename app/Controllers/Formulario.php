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
             $this->form_validation->set_rules('nome', 'nome',
                  'required|min_length[5]|max_length[99]');
             $this->form_validation->set_rules('phone', 'phone', 'required|min_length[7]',
                   array('required' => 'Você deve preencher a %s.'));
             $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
             $this->form_validation->set_rules('mensagem', 'Confirmação de Senha', 'required|min_length[7]');

             if ($this->form_validation->run() == FALSE) {
                $erros = array('mensagens' => validation_errors());
                $this->load->view('cadastro/formulario', $erros);
            } else {
                echo "Formulário enviado com sucesso.";
            }
        }

}