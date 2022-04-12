<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmailModel;
use App\Models\EnviaModel;

class Envia extends BaseController
{
    private $emailModel;

    public function __construct(){
        $this->emailModel = new EmailModel();

        $this->enviaModel = new EnviaModel();
    }

    public function index(){
        return view('form');
    }

    public function store(){

        $email = \Config\Services::email();

        $email->setFrom($this->request->getPost('email'), $this->request->getPost('nome'));

        //foreach($this->enviaModel->emailto as $mail): 
            $email->setTo($this->enviaModel->emailto); 
        //endforeach;

        $email->setSubject('Email Test');
        $email->setMessage($this->request->getPost('mesagem'));

        if($email->send()){
            echo view('messages', [
                'message' => 'Enviado'
            ]);
        }else{
            echo view('messages', [
                'message' => 'Email Invalido'
            ]);
        }

        if($this->emailModel->save($this->request->getPost())){
            return view("messages",[
                'message' => "Mensagem enviada com sucesso"
            ]);
        }else{
            echo "Ocorreu um erro";
        }
    }
}
