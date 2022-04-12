<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EnviaModel;

class EditaEmail extends BaseController
{
    private $enviaModel;

    public function __construct(){
        $this->enviaModel = new EnviaModel();
    }

    public function index()
    {
        return view('edita',[
            'emailto'    => $this->enviaModel->findAll()
        ]);
    }

    public function delete($id){
        if($this->enviaModel->delete($id)){
            echo view('messages', [
                'message' => 'Excluido'
            ]);
        }else{
            echo "Erro.";
        }

    }

    public function edit($id){
        return view('form_email',[
            'emailto' => $this->enviaModel->find($id)
        ]);
    }

    public function store(){
        if($this->enviaModel->save($this->request->getPost())){
            return view("messages",[
                'message' => "Mensagem enviada com sucesso"
            ]);
        }else{
            echo "Ocorreu um erro";
        }
    }
}
