<?php namespace App\Controllers;
use CodeIgniter\Controller;

use CodeIgniter\Email\Email;
use CodeIgniter\HTTP\RequestInterface;

class Email extends BaseController{
    public function index($page = 'email')
    {
    $request = \Config\Services::request();
    if($request->getPost()){

      $nome       = $request->getVar('nome');
      $telefone   = $request->getVar('telefone');
      $emailform  = $request->getVar('email');
      $mensagem   = $request->getVar('mensagem');

      $email = \Config\Services::email();

      $config['mailType']       = 'html';

      $email->initialize($config);
      $email->setFrom('mail@dominio.com.br');
      $email->setTo('mail@dominio.com.br');

      $email->setSubject('Formulário de contato');
      $email->setMessage("<!DOCTYPE html>
                      <html lang='en' dir='ltr'>
                        <head>
                          <meta charset='utf-8'>
                          <title></title>
                        </head>
                        <body>
                        <strong>" . $nome . "</strong><br/>" .
                         "<strong>Telefone:</strong> " . $telefone . "<br/>" .
                         "<strong>E-mail:</strong> " . $emailform . "<br/>" .
                         "<strong>Mensagem:</strong> <br/>" . $mensagem .
                      "</body>
                    </html>");
        $email->setAltMessage("Nome: ".$nome."\n\Telefone: ".$telefone."\n\E-mail: ".$emailform."\n\Mensagem: ".$mensagem);

        $email->send();
        //$email->printDebugger();
    }

        echo view('template/header', $data);
        echo view('pages/' . $page, $data);
        echo view('template/footer', $data);
    }


}
?>