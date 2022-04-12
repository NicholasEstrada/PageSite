<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmailModel;

class Email extends BaseController
{

    private $emailModel;

    public function __construct(){
        $this->emailModel = new EmailModel();
    }

    public function index()
    {
        return view('emails',[
            'emails'    => $this->emailModel->paginate(10),
            'pager'     => $this->emailModel->pager
        ]);
    }

    public function delete($id){
        if($this->emailModel->delete($id)){
            echo view('messages', [
                'message' => 'Excluido'
            ]);
        }else{
            echo "Erro.";
        }

    }

    public function edit($id){
        return view('form',[
            'email' => $this->emailModel->find($id)
        ]);
    }
}
