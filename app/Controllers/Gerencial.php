<?php namespace App\Controllers;

class Formulario extends BaseController{
    public function index(){
            echo view('templates/header');
            echo view('pages/home');
            echo view('templates/footer');
    }

    public function view($page = 'gerencial'){
    if(! is_file(APPPATH.'Views/pages/'.$page.'.php')){
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
            echo view('templates/header', $data);
            echo view('pages/' . $page, $data);
            echo view('templates/footer', $data);
    }